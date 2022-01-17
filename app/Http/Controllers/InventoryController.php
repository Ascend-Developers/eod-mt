<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Item;
use App\Models\Inventory;
use App\Models\InventoryTransaction;
use Illuminate\Http\Request;
use Auth;
use App\Exports\InventoresExport;
use Excel;

class InventoryController extends Controller
{
    //
    public function submissions(Request $request)
    {
        $submissions = InventoryTransaction::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray())->paginate(20);
        return view('eods.index', compact('submissions'));
    }

    public function site(Request $request)
    {
        $size = $request->per_page ? (int)$request->per_page : 20;
        $sites = Site::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray())->get();
        return view('eods.sites', compact('sites'));
    }

    public function create(){
        $sites = Site::orderBy('created_at')->with('inventories')->get();
        $items = Item::all();
        return view('eods.create', compact('sites', 'items'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'site_id'=> ['required'],
            'item_id'=> ['required'],
            'test'=> ['required'],
            'newStock'=> ['required'],
            // 'shift'=> ['required'],
        ]);
        $site = Site::findOrFail($request->site_id);

        $eodStock = $request->startOfDayStock - $request->test;
        if($request->newStock){
            $eodStock = $eodStock + $request->newStock;
        }
        if($eodStock < 0){
            return back()->withErrors(['End_of_Day_Stack' => 'End of day stock cannot be negative']);
        }

        $inventory = Inventory::where( ['item_id' => $request->item_id, 'site_id' => $site->_id])->first();
        if($inventory){
            $inventory->stock = $eodStock;
            $inventory->save();
        }else{
            $data = [
                'item_id' => $request->item_id,
                'site_id' => $site->_id,
                'stock' => $eodStock,
            ];
            $inventory = Inventory::create($data);
        }
        // $site->inventories()->$inventory;

        //for history
        $data = [
            'inventory_id' => $inventory->_id,
            'site_id' => $site->_id,
            'item_id' => $inventory->item_id,
            'intialStock' => $request->startOfDayStock,
            'test' => $request->test,
            'shift' => $request->shift,
            'newStockRec' => $request->newStock,
            'eodStock' => $eodStock,
            'user_id' => Auth::user()->_id
        ];
        $transection = InventoryTransaction::create($data);
        // dd($transection, $inventory);
        return redirect()->route('eod.index');

    }

    public function export()
    {
        return Excel::download(new InventoresExport, 'eod.xlsx');
    }
}

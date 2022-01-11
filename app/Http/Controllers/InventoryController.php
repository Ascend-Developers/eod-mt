<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Item;
use App\Models\Inventory;
use App\Models\InventoryTransaction;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    //
    public function submissions(Request $request)
    {
        $size = $request->per_page ? (int)$request->per_page : 20;
        $submissions = InventoryTransaction::all();
        return view('eods.index', compact('submissions'));
    }

    public function site(Request $request)
    {
        $size = $request->per_page ? (int)$request->per_page : 20;
        $sites = Site::all();
        return view('eods.sites', compact('sites'));
    }

    public function create(){
        $sites = Site::all();
        $items = Item::all();
        return view('eods.create', compact('sites', 'items'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $site = Site::findOrFail($request->site_id);
        $eodStock = $request->startOfDayStock - $request->test;
        if($request->newStock){
            $eodStock = $eodStock - $request->newStock;
        }

        $inventory = Inventory::where( ['item_id' => $request->item_id, 'site_id' => $site->_id])->first();
        if($inventory){
            $inventory->stock = $eodStock;
            $inventory->save();
        }else{
            $data = [
                'item_id' => $request->item_id,
                'site_id' => $site->_id,
                'stock' => $request->eodStock,
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
            'newStockRec' => $request->newStock,
            'eodStock' => $eodStock,
        ];
        $transection = InventoryTransaction::create($data);
        // dd($transection, $inventory);

    }


}

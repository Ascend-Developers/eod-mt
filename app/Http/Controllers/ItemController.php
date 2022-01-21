<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Exports\ItemsExport;
use Excel;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $data = [
            'name' => $request->input('name'),
        ];
        $item = Item::create($data);

        return redirect()->route('item.index')->with('success', 'Item is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $item = Item::find($id);
        return view('items.Show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $item = Item::find($id);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $this->validate($request, [
            'name'=> ['required'],
        ]);

        $item = Item::find($id);

        $item->name =  $request->input('name');

        $item->save();

        return redirect()->route('item.index')->with('success','Item is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('item.index');
    }

    public function export()
    {
        return Excel::download(new ItemsExport, 'item.xlsx');
    }
}

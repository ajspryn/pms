<?php

namespace App\Http\Controllers\Inventory\stock;

use App\Http\Controllers\Controller;
use App\Models\inventory\category;
use App\Models\inventory\InventoryComponents;
use App\Models\inventory\InventoryParts;
use App\Models\inventory\InventoryUnits;
use App\Models\ship\Ship;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class NewStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();
        $part = InventoryParts::whereHas('component.unit.sub_group.group.main_group')->get();
        $unit      = InventoryUnits::whereHas('sub_group.group.main_group')->get();
        $component = InventoryComponents::whereHas('unit.sub_group.group.main_group')->get();
        $ship_id = Ship::where('uuid', session('ship_uuid'))->get()->first();
        return view('inventory.stock.index', compact('category','part','ship_id','unit','component'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ship_id'=> 'required',
            'code_category'=> 'required',
            'name_category'=> 'required',
            'stock'=> 'required',
            'used_stock'=> 'required',
            'minqty'=> 'required'
        ]);
        $input = $request->all();
        $input['uuid'] = Uuid::uuid4();
        category::create($input);
        return back()->with('success', 'Stock is Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = category::findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = category::findOrFail($request->id);
        $data->ship_id = $request->ship_id;
        $data->code_category = $request->code_category;
        $data->name_category = $request->name_category;
        $data->stock = $request->stock;
        $data->used_stock = $request->used_stock;
        $data->minqty = $request->minqty;
        $data->save();
        return redirect()->back()->with('success', 'Data has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::find($id)->delete();
        return redirect()->back()->with('success', 'Data has been delete');
    }
}

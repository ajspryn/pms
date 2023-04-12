<?php

namespace App\Http\Controllers\Inventory\exitingdata;

use App\Http\Controllers\Controller;
use App\Models\inventory\InventoryComponents;
use App\Models\inventory\InventoryGroups;
use App\Models\inventory\InventoryMainGroups;
use App\Models\inventory\InventoryParts;
use App\Models\inventory\InventorySubGroups;
use App\Models\inventory\InventoryUnits;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maingroup = InventoryMainGroups::with('ship')->get(); 
        $group    = InventoryGroups::whereHas('main_group')->get();
        $subgroup  = InventorySubGroups::whereHas('group.main_group')->get();
        $unit      = InventoryUnits::whereHas('sub_group.group.main_group')->get();
        $component = InventoryComponents::whereHas('unit.sub_group.group.main_group')->get();
        $part      = InventoryParts::whereHas('component.unit.sub_group.group.main_group')->get();
        return view('inventory.exitingdata.index', compact('maingroup','group','subgroup','unit','component','part'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

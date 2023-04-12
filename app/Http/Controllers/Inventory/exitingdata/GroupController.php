<?php

namespace App\Http\Controllers\Inventory\exitingdata;

use App\Http\Controllers\Controller;
use App\Models\inventory\InventoryGroups;
use App\Models\inventory\InventoryMainGroups;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maingroup = InventoryMainGroups::all();
        return view('inventory.exitingdata.group.create', compact('maingroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'main_group_id' => 'required',
            'code_group' => 'required|numeric|digits:1',
            'name' => 'required',
        ]);

        $input = $request->all();
        $input['uuid'] = Uuid::uuid4();

        InventoryGroups::create($input);

        return redirect()->route('exitingdata.index')
            ->with('success', 'Group created successfully');
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
        $group = InventoryGroups::findOrFail($id);
        return response()->json($group);
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
        $group = InventoryGroups::findOrFail($id);
        $group->main_group_id = $request->input('main_group_id');
        $group->code_group = $request->input('code_group');
        $group->name = $request->input('name');
        $group->save();
        return redirect()->route('exitingdata.index')
        ->with('success', 'Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InventoryGroups::find($id)->delete();
        return redirect()->route('exitingdata.index')
            ->with('success', 'deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Inventory\exitingdata;

use App\Http\Controllers\Controller;
use App\Models\inventory\InventoryGroups;
use App\Models\inventory\InventorySubGroups;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class SubGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups    = InventoryGroups::with('main_group')->paginate(2);
        return view('inventory.exitingdata.subgroup.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'group_id' => 'required',
            'code_sub_group' => 'required|numeric|digits:1',
            'name' => 'required',
        ]);

        $input = $request->all();
        $input['uuid'] = Uuid::uuid4();
        InventorySubGroups::create($input);

        return redirect()->route('exitingdata.index')
            ->with('success', 'Main Group created successfully');
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
        $subgroup = InventorySubGroups::findOrFail($id);
        return response()->json($subgroup);
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
        $subgroup = InventorySubGroups::findOrFail($id);
        $subgroup->group_id = $request->input('group_id');
        $subgroup->code_sub_group = $request->input('code_sub_group');
        $subgroup->name = $request->input('name');
        $subgroup->save();
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
        InventorySubGroups::find($id)->delete();
        return redirect()->route('exitingdata.index')
            ->with('success', 'deleted successfully');
    }
}

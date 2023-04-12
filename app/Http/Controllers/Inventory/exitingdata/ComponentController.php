<?php

namespace App\Http\Controllers\Inventory\exitingdata;

use App\Http\Controllers\Controller;
use App\Models\inventory\InventoryComponents;
use App\Models\inventory\InventoryUnits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ComponentController extends Controller
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
        $this->validate($request, [
            'unit_id' => 'required',
            'code_component' => 'required',
            // 'd_cc' => 'nullable',
            'name' => 'required',
            'item_code' => 'required',
            'list_no' => 'nullable',
            'drawing_no' => 'nullable',
            'vendor' => 'nullable',
            'type' => 'nullable',
            'serial' => 'nullable',
            'issue_by' => 'nullable',
            'start_job'=>'required',
            'end_job' => 'required',
            'certificate_no' => 'nullable',
            'specification_detail' => 'nullable',
            'maintenance_detail' => 'nullable',
            'number_approval' => 'nullable',
            'date_approval' => 'nullable',
            'pnd_place' => 'nullable',
            'pnd_date' => 'nullable',
            'validity' => 'nullable',
            'maker' => 'nullable',
            'image' => 'nullable',
        ]);

        $start_time = Carbon::parse($request->input('start_job'));
        $end_time = Carbon::parse($request->input('end_job'));
        $interval_hours = $start_time->diffInHours($end_time);
        
        $input = $request->all();
        $input['interval'] = $interval_hours;
        $input['uuid'] = Uuid::uuid4();

        InventoryComponents::create($input);

        return redirect()->route('exitingdata.index')
            ->with('success', 'create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = InventoryUnits::findOrFail($id);
        return response()->json($unit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = InventoryComponents::findOrFail($id);
        return response()->json($component);
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
        $this->validate($request, [
            'unit_id' => 'required',
            'code_component' => 'required',
            // 'd_cc' => 'nullable',
            'name' => 'required',
            'item_code' => 'required',
            'list_no' => 'nullable',
            'drawing_no' => 'nullable',
            'vendor' => 'nullable',
            'type' => 'nullable',
            'serial' => 'nullable',
            'issue_by' => 'nullable',
            'start_job'=>'required',
            'end_job' => 'required',
            'certificate_no' => 'nullable',
            'specification_detail' => 'nullable',
            'maintenance_detail' => 'nullable',
            'number_approval' => 'nullable',
            'date_approval' => 'nullable',
            'pnd_place' => 'nullable',
            'pnd_date' => 'nullable',
            'validity' => 'nullable',
            'maker' => 'nullable',
            'image' => 'nullable',
        ]);

        $start_time = Carbon::parse($request->input('start_job'));
        $end_time = Carbon::parse($request->input('end_job'));
        $interval_hours = $start_time->diffInHours($end_time);
        
        $input = $request->all();
        $input['interval'] = $interval_hours;
        $comp = InventoryComponents::findOrFail($id);
        $comp->update($input);

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
        InventoryComponents::find($id)->delete();
        return redirect()->route('exitingdata.index')
            ->with('success', 'deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\ship;

use App\Http\Controllers\Controller;
use App\Models\ship\Ship;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ship.index', [
            'ships' => Ship::all(),
        ]);
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
        // return $request;
        $request->validate([
            'name' => 'required|unique:ships,name',
            'categori' => 'required',
            'status' => 'required'
        ]);
        $input = $request->all();
        if ($request->file('photo')) {
            $input['photo'] = $request->file('photo')->store('ship-photo');
        }
        $input['uuid'] = Uuid::uuid4();
        Ship::create($input);
        return back()->with('success', 'Data is Successfully Saved');
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
        Ship::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data is Successfully Deleted');
    }
}

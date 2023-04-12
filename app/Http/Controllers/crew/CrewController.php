<?php

namespace App\Http\Controllers\crew;

use App\Models\User;
use App\Models\ship\Ship;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\crew\Crew;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crew.index', [
            'crews' => Ship::with('crew.user')->where('uuid', session('ship_uuid'))->get()->first(),
            'roles' => Role::whereNotIn('id', [1])->get(),
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
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            // 'roles[]' => 'required',
        ]);

        $avatar = 'avatar/avatar-' . $request['username'] . '.png';
        if (isset($request['avatar'])) {
            $avatar = $request['avatar']->store('avatar');
        } else {
            Avatar::create($request['name'])->save(storage_path(path: 'app/public/avatar/avatar-' . $request['username'] . '.png'));
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['avatar'] = $avatar;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $user_id = User::where('username', $request->username)->get()->first();
        $ship_id = Ship::where('uuid', session('ship_uuid'))->get()->first();
        $input['user_id'] = $user_id->id;
        $input['ship_id'] = $ship_id->id;
        Crew::create($input);
        return back()->with('success', 'Crew is Successfully Created');
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

<?php

namespace App\Http\Controllers;

use App\Models\ship\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(session('ship_uuid'));
        // dd(session());
        if (session('ship_uuid')) {
            return view('index', [
                'ship' => Ship::where('uuid', session('ship_uuid'))->get()->first(),
            ]);
        } else {
            return view('pilih_kapal', [
                'ships' => Ship::all(),
            ]);
        }
    }
}

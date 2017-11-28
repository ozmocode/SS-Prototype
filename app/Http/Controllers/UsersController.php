<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $role = Auth::user()->role_id;
        switch ($role) {
      case '1':
        return view('dashboard.user');
        break;
      case '2':
        return view('lptsi.user');
        break;
      case '3':
        return view('webadmin.user');
        break;
      case '4':
      $users = User::all();
      // $users = $role->user;
      // dd($users);
        return view('asprak.user', compact('users'));
        break;
        case '5':
          return view('praktikan.home');
          break;
      default:
      return back();
        break;
      }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Auth::user()->role_id;

        $data = Role::where('id', $id)->with('user')->first();
        return view('dashboard.userlist', compact('data'));
        switch ($role) {
      case '1':
        return view('dashboard.userlist');
        break;
      case '2':
        return view('lptsi.userlist');
        break;
      case '3':
        return view('webadmin.userlist');
        break;
      default:
      return back();
        break;
      }
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

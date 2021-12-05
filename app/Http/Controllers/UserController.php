<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('manage.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_induk' => $request->no_induk
        ]);

        return redirect()->route('manage.index');
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
        $user = User::find($id);

        return view('manage.edit', compact('user'));
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
        $pass = User::find($id)->password;
        if ($request->password) {
            User::find($id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'role' => $request->role,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'no_induk' => $request->no_induk
            ]);
        }else{
            User::find($id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'role' => $request->role,
                'password' => $pass,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'no_induk' => $request->no_induk
            ]);
        }

        return redirect()->route('manage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }
}

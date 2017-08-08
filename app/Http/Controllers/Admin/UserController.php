<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.users.create');
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
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => Rule::in(['admin', 'user', 'author', 'editor'])
        ]);

        $user = User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  bcrypt($request->password),
            'role'      =>  $request->role,

        ]);

        $request->session()->flash('success', 'Пользователь добавлен!');

        //return view('admin.users.show', compact('user'));
        return redirect()->route('users.show', $user->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
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
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users,email,'.$id,
            'password' => 'sometimes|required|string|min:6',
            'role' => Rule::in(['admin', 'user', 'author', 'editor'])
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        //$user->email = $request->email;
        if ($request->has('password')) {
            $user->password = bcrypt( $request->password );
        }
        $user->role = $request->role;

        $user->save();

        $request->session()->flash('success', 'Пользователь изменен!');

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $request->session()->flash('success', 'Пользователь '.$user->name.' удален!');

        return redirect()->route('users.index');
    }
}

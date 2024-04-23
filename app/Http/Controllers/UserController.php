<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct()
    {
        Paginator::useBootstrap();

    }
    public function index(Request $request)
    {


        $search = $request->get('search');
        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('admin.users.index', ['data' => $users]);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);

        if ($validated) {

            $password = Hash::make($data['password']);

            $create = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'role_id' => 2,
                'active' => 1
            ];
            User::create($create);
        }

        return redirect()->route('admin.user.index');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        //dd($data);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'same:password',
        ]);


        if ($validated) {


            $update = [
                'name' => $data['name'],
                'email' => $data['email']
            ];

            if ($data['password'] != null) {
                $update['password'] = bcrypt($data['password']);
            }



            User::find($id)->update($update);
        }
        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        //dd($id);
        User::destroy($id);
        return redirect()->route('admin.user.index');
    }


}

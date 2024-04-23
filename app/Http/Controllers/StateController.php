<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class StateController extends Controller
{

    public function __construct()
    {
        Paginator::useBootstrap();
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $states = State::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $states = State::paginate(10);
        }
        return view('admin.states.index', ['data' => $states]);
    }


    public function create()
    {
        return view('admin.states.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'uf' => 'required',
        ]);

        if ($validated) {
            State::create($data);
        }

        return redirect()->route('admin.state.index');

    }


    public function edit($id)
    {
        $state = State::find($id);

        return view('admin.states.edit', ['state' => $state]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'uf' => 'required'

        ]);

        if ($validated) {

            State::find($id)->update($data);

        }
        return redirect()->route('admin.state.index');
    }

    public function destroy($id)
    {
        //dd($id);
        State::destroy($id);
        return redirect()->route('admin.state.index');
    }

}

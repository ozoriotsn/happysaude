<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class CityController extends Controller
{

    public function __construct()
    {
        Paginator::useBootstrap();
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $cities = City::with('state')->where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $cities = City::with('state')->paginate(10);
        }
        return view('admin.cities.index', ['data' => $cities]);
    }


    public function create()
    {
        $states = State::all();
        return view('admin.cities.create', ['states' => $states]);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'state_id' => 'required',
        ]);

        if ($validated) {
            City::create($data);
        }

        return redirect()->route('admin.city.index');

    }


    public function edit($id)
    {
        $city = City::find($id);
        $states = State::all();

        return view('admin.cities.edit', ['city' => $city, 'states' => $states]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();


        $validated = $request->validate([
            'name' => 'required',
            'state_id' => 'required'

        ]);

        if ($validated) {

            City::find($id)->update($data);

        }


        return redirect()->route('admin.city.index');
    }

    public function destroy($id)
    {
        //dd($id);
        City::destroy($id);
        return redirect()->route('admin.city.index');
    }

}

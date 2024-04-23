<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Customer;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;

class CustomerController extends Controller
{

    public function __construct()
    {
        Paginator::useBootstrap();

    }
    public function index(Request $request)
    {


        $search = $request->get('search');
        if ($search) {
            $customers = Customer::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $customers = Customer::paginate(10);
        }
        return view('admin.customers.index', ['data' => $customers]);
    }


    public function create()
    {
        $states = State::all();
        return view('admin.customers.create', ['states' => $states]);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'birthdate' => 'required',
            'photo' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required'

        ]);

        if ($validated) {

            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension();

            // Note you have a typo in your example, you're using a `,` instead of a `.`
            $filename = time().'.'.$extension;

            // To store (move) the file to the 'public/image' folder, use this:
            $file->move('image', $filename);

            // To store the file to the 'storage/app/public/image' folder, use this:
            //$file->storeAs('public', $filename);

            $data['photo'] = $filename;


            Customer::create($data);
        }

        return redirect()->route('admin.customer.index');

    }


    public function show(Customer $customer)
    {
        //
    }


    public function edit($id)
    {
        $customer = Customer::find($id);
        $states = State::all();
        return view('admin.customers.edit', ['customer' => $customer, 'states' => $states]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'birthdate' => 'required',
            'photo' => 'same:photo',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);

        if ($validated) {

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('image', $filename);
                $data['photo'] = $filename;
            }

            Customer::find($id)->update($data);

        }
        return redirect()->route('admin.customer.index');
    }

    public function destroy($id)
    {
        //dd($id);
        Customer::destroy($id);
        return redirect()->route('admin.customer.index');
    }

    public function export()
{
    $customers = Customer::all();
    $csvFileName = 'customers.csv';

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $csvFileName . '"');

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        'Pragma' => 'no-cache',
        'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
        'Expires' => '0'
    ];

    $handle = fopen('php://output', 'w');
    fputcsv($handle, ['Nome', 'Telefone', 'Sexo', 'Data de Nascimento', 'Foto', 'CEP', 'Cidade', 'Estado']); // Add more headers as needed

    foreach ($customers as $customer) {
        fputcsv($handle, [
            $customer->name,
            $customer->phone,
            $customer->sex,
            $customer->birthdate,
            $customer->photo,
            $customer->zip_code,
            $customer->city,
            $customer->state
        ]); // Add more fields as needed
    }

    fclose($handle);

    return Response::make('', 200, $headers);
}

public function genertePdf(Request $request, $id)
{
    $customer = Customer::find($id);
    $pdf = Pdf::loadView('admin.customers.pdf', ['customer' => $customer]);
    return $pdf->download($customer->name.'-data.pdf');
   // return view('admin.customers.pdf', ['customer' => $customer]);

}

}

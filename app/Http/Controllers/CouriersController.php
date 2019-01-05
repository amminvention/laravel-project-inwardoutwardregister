<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CouriersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $couriers = Courier::all();
        return view('courier.index', compact('couriers'));
    }

    public function create()
    {
        return view('courier.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|unique:couriers',
            'email' => 'required|email',
            'mobile_no' => 'nullable|numeric',
            'website' => 'nullable|url'
        ]);

        $courier = new Courier;
        $courier->name = $request['name'];
        $courier->address = $request['address'];
        $courier->mobile = $request['mobile_no'];
        $courier->email = $request['email'];
        $courier->website = $request['website'];
        $courier->remarks = $request['remarks'];

        $courier->save();

        return back()->with('success', 'Data is inserted successfully');

    }

    public function edit($id)
    {
        $courier = Courier::findOrFail($id);
        return view('courier.edit', compact('courier'));
    }

    public function update(Request $request, $id)
    {
        $courier = Courier::findOrFail($id);

        $this->validate($request, [
            'name' => [
                'required',
                'min:3',
                Rule::unique('couriers')->ignore($courier->id),
            ],
            'email' => 'required|email',
            'mobile_no' => 'nullable|numeric',
            'website' => 'nullable|url'
        ]);


        $courier->name = $request['name'];
        $courier->address = $request['address'];
        $courier->mobile = $request['mobile_no'];
        $courier->email = $request['email'];
        $courier->website = $request['website'];
        $courier->remarks = $request['remarks'];

        $courier->update();

        return back()->with('success', 'Data is updated successfully');

    }

    public function delete($id)
    {
        try {
            $courier = Courier::findOrFail($id);
            $courier->delete();
            return back();

        }  catch (\Illuminate\Database\QueryException $e) {

            return back()->with('deleteerror', 'Cannot delete this row. There are references from other tables');
        }
    }
}

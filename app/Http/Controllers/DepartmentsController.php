<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDOException;


class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|unique:departments',
        ]);

        $department = new Department;
        $department->name = $request['name'];
        $department->remarks = $request['remarks'];

        $department->save();

        return back()->with('success', 'Data is inserted successfully');

    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $this->validate($request, [
            'name' => [
                'required',
                'min:3',
                Rule::unique('departments')->ignore($department->id),
            ],
        ]);


        $department->name = $request['name'];
        $department->remarks = $request['remarks'];

        $department->update();

        return back()->with('success', 'Data is updated successfully');

    }

    public function delete($id)
    {

        try {
            $department = Department::findOrFail($id);


            $department->delete();

            return back();

        }  catch (\Illuminate\Database\QueryException $e) {

            return back()->with('deleteerror', 'Cannot delete this row. There are references from other tables');
        }
    }


}

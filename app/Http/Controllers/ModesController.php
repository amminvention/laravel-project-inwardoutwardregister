<?php

namespace App\Http\Controllers;

use App\Mode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ModesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modes = Mode::all();
        return view('mode.index', compact('modes'));
    }

    public function create()
    {
        return view('mode.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|unique:modes',
        ]);

        $mode = new Mode;
        $mode->name = $request['name'];
        $mode->remarks = $request['remarks'];

        $mode->save();

        return back()->with('success', 'Data is inserted successfully');

    }

    public function edit($id)
    {
        $mode = Mode::findOrFail($id);
        return view('mode.edit', compact('mode'));
    }

    public function update(Request $request, $id)
    {
        $mode = Mode::findOrFail($id);

        $this->validate($request, [
            'name' => [
                'required',
                'min:3',
                Rule::unique('modes')->ignore($mode->id),
            ],
        ]);


        $mode->name = $request['name'];
        $mode->remarks = $request['remarks'];

        $mode->update();

        return back()->with('success', 'Data is updated successfully');

    }

    public function delete($id)
    {
        try {
            $mode = Mode::findOrFail($id);
            $mode->delete();
            return back();

        } catch (\Illuminate\Database\QueryException $e) {

            return back()->with('deleteerror', 'Cannot delete this row. There are references from other tables');
        }
    }
}

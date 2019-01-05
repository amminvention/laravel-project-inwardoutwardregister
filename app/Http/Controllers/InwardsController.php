<?php

namespace App\Http\Controllers;

use App\Courier;
use App\Department;
use App\Inward;
use App\Mode;
use App\Outward;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class InwardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [];
        $data['1'] = $request->from_letter_date;
        $data['2'] = $request->to_letter_date;
        $data['3'] = $request->mode_id;


        $inwards = Inward::search($data[1], $data[2], $data[3])->orderBy('inward_no')->get();

        $modes = Mode::all()->pluck('name', 'id');
        return view('inward.index', compact('inwards', 'modes'))->with('data', $data);
    }

    public function create()
    {
        $modes = Mode::all()->pluck('name', 'id');
        $departments = Department::all()->pluck('name', 'id');
        $couriers = Courier::all()->pluck('name', 'id');
        $outwards = Outward::all()->pluck('outward_no', 'id');
        return view('inward.create', compact('modes', 'departments', 'couriers', 'outwards'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'inward_no' => 'required|unique:inwards',
            'inward_date' => 'required',
            'receive_date' => 'required',
            'letter_date' => 'required',
            'letter_ref_no' => 'required|min:3',
            'subject' => 'required|min:3',
            'from_details_name' => 'required|min:3',
            'mode_id' => 'required|numeric',
            'department_id' => 'required|numeric',
            'courier_id' => 'nullable|numeric',
            'outward_id' => 'nullable|numeric'
        ],
            [
                'mode_id.required' => 'The mode field is required.',
                'department_id.required' => 'The department field is required.',
            ]
        );



        $inward = new Inward;
        $inward->inward_no = $request['inward_no'];
        $inward->inward_date = $request['inward_date'];
        $inward->receive_date = $request['receive_date'];
        $inward->letter_date = $request['letter_date'];
        $inward->subject = $request['subject'];
        $inward->letter_ref_no = $request['letter_ref_no'];
        $inward->from_details_name = $request['from_details_name'];
        $inward->from_details_address = $request['from_details_address'];
        $inward->to_details_person_name = $request['to_details_person_name'];
        $inward->courier_details_courier_name = $request['courier_details_courier_name'];
        $inward->courier_details_description = $request['courier_details_description'];
        $inward->mode_id = $request['mode_id'];
        $inward->outward_id = $request['outward_id'];
        $inward->department_id = $request['department_id'];
        $inward->courier_id = $request['courier_id'];


        $inward->save();

        return back()->with('success', 'Data is inserted successfully');
    }

    public function edit($id)
    {
        $inward = Inward::findOrFail($id);

        $modes = Mode::all()->pluck('name', 'id');
        $departments = Department::all()->pluck('name', 'id');
        $couriers = Courier::all()->pluck('name', 'id');
        $outwards = Outward::all()->pluck('outward_no', 'id');
        return view('inward.edit', compact('inward', 'modes', 'departments', 'couriers', 'outwards'));
    }

    public function upgrade(Request $request, $id)
    {
        $inward = Inward::findOrFail($id);

        $this->validate($request, [
            'inward_no' => [
                'required',
                Rule::unique('inwards')->ignore($inward->id),
            ],
            'inward_date' => 'required',
            'receive_date' => 'required',
            'letter_date' => 'required',
            'letter_ref_no' => 'required|min:3',
            'subject' => 'required|min:3',
            'from_details_name' => 'required|min:3',
            'mode_id' => 'required|numeric',
            'department_id' => 'required|numeric',
            'courier_id' => 'nullable|numeric',
            'outward_id' => 'nullable|numeric'

        ],
            [
                'mode_id.required' => 'The mode field is required.',
                'department_id.required' => 'The department field is required.',
            ]
        );

        $inward->inward_no = $request['inward_no'];
        $inward->inward_date = $request['inward_date'];
        $inward->receive_date = $request['receive_date'];
        $inward->letter_date = $request['letter_date'];
        $inward->subject = $request['subject'];
        $inward->letter_ref_no = $request['letter_ref_no'];
        $inward->from_details_name = $request['from_details_name'];
        $inward->from_details_address = $request['from_details_address'];
        $inward->to_details_person_name = $request['to_details_person_name'];
        $inward->courier_details_courier_name = $request['courier_details_courier_name'];
        $inward->courier_details_description = $request['courier_details_description'];
        $inward->mode_id = $request['mode_id'];
        $inward->outward_id = $request['outward_id'];
        $inward->department_id = $request['department_id'];
        $inward->courier_id = $request['courier_id'];

        $inward->update();

        return back()->with('success', 'Data is updated successfully');
    }

    public function delete($id)
    {
        try {
            $inward = Inward::findOrFail($id);
            $inward->delete();
            return back();

        }  catch (\Illuminate\Database\QueryException $e) {

            return back()->with('deleteerror', 'Cannot delete this row. There are references from other tables');
        }

    }
}

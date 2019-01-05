<?php

namespace App\Http\Controllers;

use App\Courier;
use App\Department;
use App\Inward;
use App\Mode;
use App\Outward;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OutwardsController extends Controller
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

        $outwards = Outward::search($data[1], $data[2], $data[3])->orderBy('outward_no')->get();

        $modes = Mode::all()->pluck('name', 'id');
        return view('outward.index', compact('outwards', 'modes'))->with('data', $data);
    }

    public function create()
    {
        $modes = Mode::all()->pluck('name', 'id');
        $departments = Department::all()->pluck('name', 'id');
        $couriers = Courier::all()->pluck('name', 'id');
        $inwards = Inward::all()->pluck('inward_no', 'id');
        return view('outward.create', compact('modes', 'departments', 'couriers', 'inwards'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'outward_no' => 'required|unique:outwards',
            'outward_date' => 'required',
            'mode_id' => 'required|numeric',
            'letter_date' => 'required',
            'letter_ref_no' => 'required|min:3',
            'inward_id' => 'nullable|numeric',
            'subject' => 'required|min:3',
            'department_id' => 'required|numeric',
            'to_details_name' => 'required|min:3',
            'courier_id' => 'nullable|numeric',
            'inward_id' => 'nullable|numeric'
        ],
            [
                'mode_id.required' => 'The mode field is required.',
                'department_id.required' => 'The department field is required.',
            ]
        );



        $outward = new Outward;
        $outward->outward_no = $request['outward_no'];
        $outward->outward_date = $request['outward_date'];
        $outward->letter_date = $request['letter_date'];
        $outward->letter_ref_no = $request['letter_ref_no'];
        $outward->subject = $request['subject'];
        $outward->from_details_person_name = $request['from_details_person_name'];
        $outward->to_details_name = $request['to_details_name'];
        $outward->to_details_place = $request['to_details_place'];
        $outward->to_details_address = $request['to_details_address'];
        $outward->courier_details_receipt_no = $request['courier_details_receipt_no'];
        $outward->courier_details_receipt_date = $request['courier_details_receipt_date'];
        $outward->courier_details_amount = $request['courier_details_amount'];
        $outward->courier_details_is_return = $request['courier_details_is_return'];
        $outward->courier_details_return_date = $request['courier_details_return_date'];
        $outward->courier_details_return_reason = $request['courier_details_return_reason'];
        $outward->courier_details_description = $request['courier_details_description'];
        $outward->mode_id = $request['mode_id'];
        $outward->inward_id = $request['inward_id'];
        $outward->department_id = $request['department_id'];
        $outward->courier_id = $request['courier_id'];


        $outward->save();

        return back()->with('success', 'Data is inserted successfully');
    }
//
    public function edit($id)
    {
        $outward = Outward::findOrFail($id);

        $modes = Mode::all()->pluck('name', 'id');
        $departments = Department::all()->pluck('name', 'id');
        $couriers = Courier::all()->pluck('name', 'id');
        $inwards = Inward::all()->pluck('inward_no', 'id');

        return view('outward.edit', compact('outward', 'modes', 'departments', 'couriers', 'inwards'));
    }

    public function upgrade(Request $request, $id)
    {
        $outward = Outward::findOrFail($id);

        $this->validate($request, [
            'outward_no' => [
                'required',
                Rule::unique('outwards')->ignore($outward->id),
            ],
            'outward_date' => 'required',
            'mode_id' => 'required|numeric',
            'letter_date' => 'required',
            'letter_ref_no' => 'required|min:3',
            'inward_id' => 'nullable|numeric',
            'subject' => 'required|min:3',
            'department_id' => 'required|numeric',
            'to_details_name' => 'required|min:3',
            'courier_id' => 'nullable|numeric',
            'inward_id' => 'nullable|numeric'
        ],
            [
                'mode_id.required' => 'The mode field is required.',
                'department_id.required' => 'The department field is required.',
            ]
        );

        $outward->outward_no = $request['outward_no'];
        $outward->outward_date = $request['outward_date'];
        $outward->letter_date = $request['letter_date'];
        $outward->letter_ref_no = $request['letter_ref_no'];
        $outward->subject = $request['subject'];
        $outward->from_details_person_name = $request['from_details_person_name'];
        $outward->to_details_name = $request['to_details_name'];
        $outward->to_details_place = $request['to_details_place'];
        $outward->to_details_address = $request['to_details_address'];
        $outward->courier_details_receipt_no = $request['courier_details_receipt_no'];
        $outward->courier_details_receipt_date = $request['courier_details_receipt_date'];
        $outward->courier_details_amount = $request['courier_details_amount'];
        $outward->courier_details_is_return = $request['courier_details_is_return'];
        $outward->courier_details_return_date = $request['courier_details_return_date'];
        $outward->courier_details_return_reason = $request['courier_details_return_reason'];
        $outward->courier_details_description = $request['courier_details_description'];
        $outward->mode_id = $request['mode_id'];
        $outward->inward_id = $request['inward_id'];
        $outward->department_id = $request['department_id'];
        $outward->courier_id = $request['courier_id'];

        $outward->update();

        return back()->with('success', 'Data is updated successfully');
    }

    public function delete($id)
    {
        try {
            $outward = Outward::findOrFail($id);
            $outward->delete();
            return back();

        }catch (\Illuminate\Database\QueryException $e) {

            return back()->with('deleteerror', 'Cannot delete this row. There are references from other tables');
        }

    }
}

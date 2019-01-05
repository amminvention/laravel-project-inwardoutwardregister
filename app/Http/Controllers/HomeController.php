<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Inward;
use App\Outward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $inwards = Inward::all()->count();
        $outwards = Outward::all()->count();

        $data = [];
        $data[1] = $request->inward_no;
        $data[2] = $request->outward_no;

        if($data[1] != ''){
            $this->validate($request, [
               'inward_no' => 'required'
            ]);
            $inwardsSearch = Inward::where('inward_no', $request->inward_no)->get();
            return view('dashboard', compact('inwards', 'outwards'))->with('data', $data)->with('inwardsSearch', $inwardsSearch);
        }
        if($data[2] != ''){
            $this->validate($request, [
                'outward_no' => 'required'
            ]);
            $outwardsSearch = Outward::where('outward_no', $request->outward_no)->get();
            return view('dashboard', compact('inwards', 'outwards'))->with('data', $data)->with('outwardsSearch', $outwardsSearch);

        }

        return view('dashboard', compact('inwards', 'outwards'))->with('data', $data);


    }

    public function changeProfile()
    {
        return view('profile.change_profile');
    }

    public function updateProfile(UserRequest $request)
    {
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];

        if($request['password'] != ""){
            if(!Hash::check($request['password'], Auth::user()->getAuthPassword())){
                return redirect()->back()->with('password', 'These credentials do not match our records.');
            }

            $user->password = bcrypt($request['new_password']);
            $user->save();

            return redirect()->back()->with('success', 'Password updated successfully.');
        }




        $user->save();

        return back()->with('success', 'Profile updated successfully.');




    }
}

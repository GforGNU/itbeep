<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Interest;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $interests = Interest::all();
        return view('userData', compact('services','interests'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'mobile'=> 'required|max:14',
        ]);

        $users = new User;

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->mobile = $request->input('mobile');
        $users->service_one = $request->input('service_one');
        $users->service_two = $request->input('service_two');
        $users->service_three = $request->input('service_three');
        $users->interest_level = $request->input('interest_level');

        $users->save();

        $s1 = "";
        $s2 = "";
        $s3 = "";


        if ($request->input('service_one') == 1){
            $s1 = 'service_one';
        }
        if ($request->input('service_two') == 1){
            $s2 = 'service_two';
        }
        if ($request->input('service_three') == 1){
            $s3 = 'service_three';
        }



        $data = ['name'=>$request->input('name'), 'service_one'=>$s1, 'service_two'=>$s2,'service_three'=>$s3, 'interest_level'=>$request->input('interest_level')];
        \Mail::to($request->input('email'))->send(new \App\Mail\NewMail($data));


        return redirect('/itbeep')->with('success', 'Data Saved');
    }

 
}

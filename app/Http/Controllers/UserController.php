<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function index()
    {
        return User::select('fullname','email','role')->get();
    }


    public function store(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required|unique:users',
            'role'=>'required'
        ]);
        User::create($request->post());
        // try{
        //     User::create($request->post());

        //     return response()->json([
        //         'message'=>'User Created Successfully!!'
        //     ]);
        // }catch(\Exception $e){
        //     \Log::error($e->getMessage());
        //     return response()->json([
        //         'message'=>'Something goes wrong while creating a user!!'
        //     ],500);
        // }
    }
}

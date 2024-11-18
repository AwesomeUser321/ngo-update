<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class testcontroller extends Controller
{
   public function register(Request $request){

    $validator= Validator::make($request->all(),[
        'applicant_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'cnic' => 'required|string|unique:users,cnic|max:15',
        'email_address' => 'required|string|email|max:255|unique:users,email_address',
        'password' => 'required|string|min:8|confirmed',
        'name_of_vswa' => 'required|string|max:255',
        'vswa_email' => 'required|string|email|max:255|unique:users,vswa_email',
        'short_name' => 'required|string|max:255',
        'vswa_phone' => 'required|string|max:15',
        'vswa_hq_id' => 'required|exists:vswa_head_quarters,id',
        'thematic_ids' => 'required|array|exists:thematic_areas,id', // Array of thematic IDs
    ]);

    
        // If validation fails, return error response

    

   }
}

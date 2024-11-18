<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    // public function register(Request $request)
    // {
    //     // Validation rules
    //     $validator = Validator::make($request->all(), [
    //         'name_of_agency' => 'required|string|max:255',
    //         'full_name' => 'required|string|max:255',
    //         'father_name' => 'required|string|max:255',
    //         'cnic_no' => 'required|string|unique:users,cnic_no|max:15',
    //         'applicant_phone' => 'required|string|max:15',
    //         'email_address' => 'required|string|email|max:255|unique:users,email_address',
    //         'password' => 'required|string|min:8|confirmed',
           
    //        'vswa_hq_id' => 'required|exists:vswa_head_quarters,id',
    //       'thematic_ids' => 'required|array|exists:thematic_areas,id',
    //       'nature_of_authorization_id' => 'required|exists:nature_of_authorizations,id', // Foreign key validation
    //     ]);
    
    //     // If validation fails, return error response
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }
    
    //     // Create the user
    //     $user = User::create([
    //         'name_of_agency' => $request->name_of_agency,
    //         'full_name' => $request->full_name,
    //         'father_name' => $request->father_name,
    //         'cnic_no' => $request->cnic_no,
    //         'applicant_phone' => $request->applicant_phone,
    //         'email_address' => $request->email_address,
    //         'password' => Hash::make($request->password), // Hash the password before saving
    //         'thematic_id' => $request->thematic_id,
    //         'vswa_hq_id' => $request->vswa_hq_id,
    //         'nature_of_authorization_id' => $request->nature_of_authorization_id ?? 1, // Default to 1 if not provided
    //     ]);

    //      // Attach thematic areas to the user
    //      $user->thematicAreas()->attach($request->thematic_ids);
    
    //     // Return success response with user data
    //     return response()->json([
    //         'message' => 'User registered successfully',
    //         'user' =>  $user->load('thematicAreas')  // Load thematic areas with user data
    //     ], 201);
    // }



}

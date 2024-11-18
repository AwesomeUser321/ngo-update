<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ThematicArea;
use App\Models\VswaHeadQuarter;
use App\Models\NatureOfAuthorization;





class RegistrationController extends Controller
{


    // Create a new thematic area.

    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'thematic_area_name' => 'required|string|max:255|unique:thematic_areas,thematic_area_name',  // Validate name
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new thematic area
        $thematicArea = ThematicArea::create([
            'thematic_area_name' => $request->thematic_area_name,  // Create thematic area with provided name
        ]);

        // Return success response with created thematic area data
        return response()->json([
            'message' => 'Thematic area created successfully',
            'data' => $thematicArea
        ], 201);
    }



    //  Get all thematic areas.

    public function index()
    {
        $thematicAreas = ThematicArea::all();  // Fetch all thematic areas from the database

        return response()->json([
            'message' => 'Thematic areas retrieved successfully',
            'data' => $thematicAreas
        ], 200);
    }



    /**
     * Get all VSWA Head Quarters.
     */
    // public function head_quarters()
    // {
    //     // Fetch all VSWA head quarters
    //     $vswaHeadQuarters = VswaHeadQuarter::all();

    //     // Return response with the fetched data
    //     return response()->json([
    //         'message' => 'VSWA Head Quarters retrieved successfully',
    //         'data' => $vswaHeadQuarters
    //     ], 200);
    // }


    /**
     * Get VSWA Head Quarter by ID
     */
    // public function show($id)
    // {
    //     // Find the VSWA Head Quarter by ID
    //     $vswaHeadQuarter = VswaHeadQuarter::with('users')->find($id);

    //     // If VSWA Head Quarter not found, return error response
    //     if (!$vswaHeadQuarter) {
    //         return response()->json([
    //             'message' => 'VSWA Head Quarter not found'
    //         ], 404);
    //     }

    //     // Return success response with VSWA Head Quarter data
    //     return response()->json([
    //         'message' => 'VSWA Head Quarter retrieved successfully',
    //         'data' => $vswaHeadQuarter
    //     ], 200);
    // }


    public function show($id)
    {
        // Find the VSWA Head Quarter by its ID and load its associated users
        $vswaHeadQuarter = VswaHeadQuarter::with(['users' => function ($query) use ($id) {
            $query->where('vswa_hq_id', $id); // Filter users related to this specific headquarter
        }])->find($id);

        // Check if the VSWA Head Quarter exists
        if (!$vswaHeadQuarter) {
            return response()->json([
                'message' => 'VSWA Head Quarter not found'
            ], 404);
        }

        // Return the headquarter data along with its related users
        return response()->json([
            'message' => 'VSWA Head Quarter retrieved successfully',
            'data' => $vswaHeadQuarter
        ], 200);
    }



    // Get all VSWA NatureOfAuthorization.

    public function NatureOfAuthorization()
    {
        // Fetch all VSWA head quarters
        $NatureOfAuthorization = NatureOfAuthorization::all();

        // Return response with the fetched data
        return response()->json([
            'message' => 'NatureOfAuthorization retrieved successfully',
            'data' => $NatureOfAuthorization
        ], 200);
    }





    public function register(Request $request)
    {

        // dd($request->all());
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name_of_agency' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'cnic_no' => 'required|string|unique:users,cnic_no|max:15',
            'applicant_phone' => 'required|string|max:15',
            'email_address' => 'required|string|email|max:255|unique:users,email_address',
            'password' => 'required|string|min:8|confirmed',
            'vswa_hq_id' => 'required|exists:vswa_head_quarters,id',
            'thematic_ids' => 'required|array|exists:thematic_areas,id',
            'nature_of_authorization_id' => 'required|exists:nature_of_authorizations,id', // Foreign key validation
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create the user
        $user = User::create([
            'name_of_agency' => $request->name_of_agency, 
            'full_name' => $request->full_name,
            'father_name' => $request->father_name,
            'cnic_no' => $request->cnic_no,
            'applicant_phone' => $request->applicant_phone,
            'email_address' => $request->email_address,
            'password' => Hash::make($request->password),
            'vswa_hq_id' => $request->vswa_hq_id,
            'nature_of_authorization_id' => $request->nature_of_authorization_id,
            'thematic_id' => $request->thematic_id,

        ]);

        // Attach thematic areas to the user
        $user->thematicAreas()->attach($request->thematic_ids);
        

        // Return success response with user data
        return response()->json([
            'message' => 'User registered successfully',
            'user' =>  $user->load('thematicAreas')  // Load thematic areas with user data
        ], 201);
    }
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email_address' => 'required|email|max:255', // Use email_address for validation
            'password' => 'required|string|min:8',
        ]);

        // Find user by email_address
        $user = User::where('email_address', $request->email_address)->first();

        // Check if user exists and password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // Generate API token
            $token = $user->createToken('API Token')->plainTextToken;

            // Return success response with token and user details (excluding password)
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user->makeHidden(['password']), // Hide password from response
            ], 200);
        }

        // Return error response if login fails
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

   //logout
     
//    public function logout(Request $request)
//    {
//        // Revoke the token that was used to authenticate the current request
//        $request->user()->currentAccessToken()->delete();

//        return response()->json([
//            'message' => 'Logged out successfully'
//        ], 200);
//    }

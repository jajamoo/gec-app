<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {

        ## Validate Submission
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'employee_id' => 'required|regex:/[A-Z]{2}-\d{4}/',

        ]);

        if ($validator->fails()) {
            $error = [
                'error_type' => 'Validation Error',
                'description' => $validator->errors()
            ];
            return response()->json($error, HttpStatus::BAD_REQUEST);
        }

        $user = new User();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->employee_id = $request['employee_id'];

        $user->save();

        return response()->json($user, HttpStatus::CREATED);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {

        ## Validate Submission
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'name' => 'sometimes|nullable|string',
            'email' => 'sometes|nullable|email',
            'employee_id' => 'sometimes|nullable|regex:/[A-Z]{2}-\d{4}/',
        ]);

        if ($validator->fails()) {
            $error = [
                'error_type' => 'Validation Error',
                'description' => $validator->errors()
            ];
            return response()->json($error, HttpStatus::BAD_REQUEST);
        }


        $user = User::where('id', $request['user_id']);

        if (isset($request['name']) && $request['name'] != null) {
            $user->name = $request['name'];
        }
        if (isset($request['email']) && $request['email'] != null) {
            $user->email = $request['email'];
        }
        if (isset($request['employee_id']) && $request['employee_id'] != null) {
            $user->employee_id = $request['employee_id'];
        }

        $user->save();

        return response()->json($user, HttpStatus::CREATED);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        try {
            $user = User::findOrFail($id);
        }catch (ModelNotFoundException $exception) {

            $error = [
                'error_type' => 'Validation Error',
                'description' => $exception->errors()
            ];
            return response()->json($error, HttpStatus::NOT_FOUND);
        }

        return response()->json($user->delete(), HttpStatus::OK);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id)
    {
        try {
            $user = User::findOrFail($id);
        }catch (ModelNotFoundException $exception) {

            $error = [
                'error_type' => 'Validation Error',
                'description' => $exception->errors()
            ];
            return response()->json($error, HttpStatus::NOT_FOUND);
        }

        return response()->json($user, HttpStatus::OK);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        return response()->json(User::all(), HttpStatus::OK);
    }
}

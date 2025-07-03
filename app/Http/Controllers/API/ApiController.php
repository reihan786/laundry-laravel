<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User; // Assuming you have a User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function getUsers()
    {
        $users = User::get();
        return response()->json(['data' => $users]);
    }

 public function editUsers($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['status'=>'success', 'message'=>'Request Success','data'=>$user]);

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }

            $users = User::create($request->all());
            return response()->json(['data' => $users, 'message' => 'Request success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'request failed', 'errors' => $th->getMessage()], 500);
        }

    }



    public function storeUsers(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }

            $users = User::create($request->all());
            return response()->json(['data' => $users, 'message' => 'Request success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'request failed', 'errors' => $th->getMessage()], 500);
        }

    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user= User::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }

            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')){
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return response()->json(['status' => 'success', 'message' => 'Request Update Success', 'data' => $user]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'request failed', 'errors' => $th->getMessage()], 500);
        }
    }


    public function deleteUsers($id)
    {
        try {
            $user= User::findOrFail($id);
            $user->delete();
            return response()->json(['status'=>'succes','message'=> 'Request Delete Success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Request failed', 'errors' => $th->getMessage()], 500);
        }
    }
}

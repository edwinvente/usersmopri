<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function save(Request $request){

        //return response()->json($request->all(), 200);
        try {
            DB::table('users')->insert([
                'name' => $request->email, 
                'email' => $request->email, 
                'password' => $request->password
            ]);
            return response()->json([
                'status' => true,
                'message' => "guardado exitoso",
                'request' => $request->all()
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'error' => $th,
                'request' => $request->all()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class APIUsersController extends Controller
{
	 // public function login()
  //   {
  //       if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
  //           $user = Auth::user();
  //           $success['token'] = $user->createToken('appToken')->accessToken;
  //           return response()->json([
  //             'success' => true,
  //             'token' => $success,
  //             'user' => $user
  //         ]);
  //       } else {
  //         return response()->json([
  //           'success' => false,
  //           'message' => 'Email atau Password salah',
  //       ], 401);
  //       }
  //   }

  //   public function register(Request $request)
  //   {
  //       $validator = Validator::make($request->all(), [
  //           'name' => 'required',
  //           // 'telepon' => 'required|unique:users|regex:/(0)[0-9]{10}/',
  //           'no_telp' => 'required|unique:users',
  //           'email' => 'required|email|unique:users',
  //           'password' => 'required',
  //       ]);
  //       if ($validator->fails()) {
  //         return response()->json([
  //           'success' => false,
  //           'message' => $validator->errors(),
  //         ], 401);
  //       }

  //       $input = $request->all();
  //       $input['password'] = bcrypt($input['password']);
  //       $user = User::create($input);
  //       $success['token'] = $user->createToken('appToken')->accessToken;
  //       return response()->json([
  //         'success' => true,
  //         'token' => $success,
  //         'user' => $user
  //     ]);
  //   }

    public function loginaku(Request $request)
    {
    	$email = $request->input('email');
        $password = $request->input('password');

        $data = User::select('name','email','id','foto','alamat','lat_pengirim','long_pengirim')
        ->where('email',$email)->where('password',$password)
        ->first();

        if ($data != null) 
        {
            $data['succ'] = true;    
        }
        else
        {
            $data['succ'] = false;
        }
        
        return response($data);
    }

    public function registaku(Request $request)
    {
    	//Rregist
        $data = new User();
        $data->name = $request->input('name');
        $data->password = $request->input('password');
        $data->no_telp = $request->input('no_telp');
        $data->email = $request->input('email');
        $data->jenis_kelamin = $request->input('jenis_kelamin');
        $data->alamat = $request->input('alamat');
        $data->foto = $request->input('foto');
        $data->saldo = 0;
        $data->tanggal_lahir = $request->input('tanggal_lahir'); 
        $data->status = 'NEW';

        $products = array();
        $products['succ'] = true;
        
        try
        {
            $data->save();
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $products['succ'] = false;
        }

        return response($products);
    }


     /**
     * Register api.
     *
     * @return \Illuminate\Http\Response
     */
    
}

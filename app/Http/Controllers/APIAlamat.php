<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelAlamat;
use DB;
use App\Quotation;

class APIAlamat extends Controller
{

    public function addAlamatPenerima(Request $request)
    {
            $data = new ModelAlamat();
            $data->id_user = $request->input('id_user');
            $data->nama_penerima = $request->input('namapenerima');
            $data->no_telp_penerima = $request->input('notelppenerima');
            $data->alamat_penerima = $request->input('alamatpenerima');

            // ini kecamatan jika mau digunakan aja, kalo nggak ya comment aja 
            $data->kecamatan = $request->input('kecamatan'); 

            $data->lat_penerima = $request->input('lat');
            $data->long_penerima =  $request->input('lng');

            try
            {
                $respon['succ'] = true;
                $data->save();
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                $respon['succ'] = false;
                echo $ex;
            }

            return response($respon);

    }

    public function getAlamatPenerima(Request $request)
    {
        // ini function untuk get alamat yang sudah di insert oleh pengirim sebelumnya 
        $id = $request->input('id_user');

        try
        {   
            $data = ModelAlamat::select('id_alamat','nama_penerima','no_telp_penerima','alamat_penerima','kecamatan')
            ->where('id_user', $id)
            ->orderBy('updated_at','DESC')
            ->first();

            $data['succ'] = true;
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $data['succ'] = false;
            echo $ex;
        }

        return response($data);

    }





}

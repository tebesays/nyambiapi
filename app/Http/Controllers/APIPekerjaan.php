<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelPekerjaan;
use DB;
use App\Quotation;


class APIPekerjaan extends Controller
{

/*
|--------------------------------------------------------------------------
| ============================ API PENGIRIM ===============================
|--------------------------------------------------------------------------
*/

	public function AddPekerjaan()
	{
		//input pekerjaan
		$data = new ModelUsers();
        $data->nama = $request->input('nama');
        $data->password = $request->input('password');
        $data->tlp = $request->input('tlp');
        $data->email = $request->input('email');
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

	// pilih metode pembayaran
	// menampilkan estimasi harganya 
	// menambahkan pekerjaan & 
	// konfirmasi pembayaran 
	// lihat history pekerjaan dengan statusnya
	// lihat detail pekerjaan termasuk bukti pengiriman
	// 


/*
|--------------------------------------------------------------------------
| ============================= API KURIR =================================
|--------------------------------------------------------------------------
*/

	public function ShowPekerjaanKurir(Request $request)
	{
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        //join : alamat, kategori
        //lanjutinnya masukin cara mensort berdasarkan jarak
        $data = ModelPekerjaan::join('alamat_penerima', 'pekerjaan.id_alamat', '=', 'alamat_penerima.id_alamat')
        ->join('kategori', 'pekerjaan.id_kategori','=','kategori.id_kategori')
        ->select('alamat_penerima.kecamatan','kategori.nama_kategori','harga','id_order','pekerjaan.status',DB::raw(" 

     ( 6371 * acos( cos( radians( ? ) ) * cos( radians( `lat_penerima` ) ) * cos( radians( `long_penerima` ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( `lat_penerima` ) ) ) ) AS jarak

             "))
            ->where('pekerjaan.status','WAC')
            ->orderBy('jarak','ASC')
            ->addBinding($lat, 'select')
            ->addBinding($lng, 'select')
            ->addBinding($lat, 'select')
            ->get();

        return response ($data);
	}

	public function TerimaPekerjaan(Request $request)
	{
		$id = $request->input('id_pekerjaan');
		$id_kurir = $request->input('id_kurir');

        $data = ModelPekerjaan::where('id_pekerjaan',$id)
        ->first();

        $data->id_kurir = $id_kurir;
        $data->status = "ITS";
        $data->save();

        $products = array();
        $products['succ'] = true;

        return response($products);
	}

	// ketika customer menerima baru lakukan load berikut ini
	public function ShowDetailPekerjaanKurir(Request $request)
	{
		$id_pekerjaan = $request->input('id_pekerjaan');

        $data = ModelPekerjaan::join('alamat_penerima', 'pekerjaan.id_alamat', '=', 'alamat_penerima.id_alamat')
        ->join('users','pekerjaan.id_user','=','users.id')
        ->select('users.name as nama_pengirim','users.no_telp as no_telp_pengirim','users.alamat as alamat_pengirim','lat_pengirim','long_pengirim','alamat_penerima.nama_penerima','no_telp_penerima','alamat_penerima.alamat_penerima','lat_penerima','long_penerima')
        ->where('id_pekerjaan',$id_pekerjaan)
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

	public function KonfirmasiSampai(Request $request)
	{
		$id = $request->input('id_pekerjaan');
		$diterima = $request->input('diterima_oleh');
		$bukti = $request->input('bukti_sampai');

        $data = ModelPekerjaan::where('id_pekerjaan',$id)
        ->first();

        $data->diterima_oleh = $diterima;
        $data->bukti_sampai = $bukti;
        $data->status = "ARV";
        $data->save();

        $products = array();
        $products['succ'] = true;

        return response($products);
	}



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelPekerjaan;
use App\Models\ModelKategori;
use App\Models\ModelAlamat;
use DB;
use App\Quotation;


class APIPekerjaan extends Controller
{

/*
|--------------------------------------------------------------------------
| ============================ API PENGIRIM ===============================
|--------------------------------------------------------------------------
*/

	public function AddPekerjaan(Request $request)
	{
        $berat = $request->input('berat');
        if ($berat <= 10) 
        {
            //input pekerjaan
            $data = new ModelPekerjaan();
            $data->id_user = $request->input('id_user');
            $data->id_alamat = $request->input('id_alamat');
            $data->id_kategori = $request->input('id_kategori');
            
            //Hitung total harga
            $data2 = ModelKategori::where('id_kategori', $request->input('id_kategori'))
            ->first();

            // Get latlong penerima
            $penerima = ModelAlamat::select('lat_penerima','long_penerima')
            ->where('id_alamat', $request->input('id_alamat'))
            ->first();

            //Get latlong pengirim
            $lat_pengirim = $request->input('lat_pengirim');
            $lng_pengirim = $request->input('lng_pengirim');
            $alamat_pengirim = $request->input('alamat_pengirim');

            //harga ongkir 
            $datajarak = $this->getDistancebyGoogle($penerima->lat_penerima, $penerima->long_penerima, $lat_pengirim, $lng_pengirim);
            $jarak = json_decode($datajarak)->rows[0]->elements[0]->distance->value;

            $km = $jarak/1000;
            $km = round($km, 0, PHP_ROUND_HALF_UP);

            if ($km > 1) {
                $totalharga = (($km - 1) * $data2->Harga_selanjutnya) + $data2->Harga_awal;
            }
            else{
                $totalharga = $data2->Harga_awal;
            }

            $data->harga = $totalharga;
            $data->jarak = $km;
            $data->berat = $berat;
            $data->status = 'NEW';

            $products = array();
            $products['succ'] = true;
            // show jumlah yang harus dibayarkan 
            
            try
            {
                $data->save();
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                $products['succ'] = $ex;
            }

        }
        else {
            $products['succ'] = false;
        }

        return response($products);
		
	}

    public function ShowPekerjaanPengirim(Request $request)
    {
        // butuh untuk menampilkan hitory pekerjaan yang 
        $id = $request->input('id_user');
        $data = ModelPekerjaan::join('alamat_penerima', 'pekerjaan.id_alamat', '=', 'alamat_penerima.id_alamat')
        ->join('kategori', 'pekerjaan.id_kategori','=','kategori.id_kategori')
        ->select('alamat_penerima.alamat_penerima','alamat_penerima.nama_penerima','alamat_penerima.no_telp_penerima','kategori.nama_kategori','id_pekerjaan','pekerjaan.status')
            ->where('pekerjaan.id_user', $id)
            ->orderBy('pekerjaan.created_at','DESC')
            ->get();

        return response ($data);
    }


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
        ->select('alamat_penerima.kecamatan','kategori.nama_kategori','harga','id_pekerjaan','pekerjaan.status',DB::raw(" 

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

    public function ShowHistoryKurir(Request $request)
	{
        $id = $request->input('id_user');

        $data = ModelPekerjaan::join('alamat_penerima', 'pekerjaan.id_alamat', '=', 'alamat_penerima.id_alamat')
        ->join('kategori', 'pekerjaan.id_kategori','=','kategori.id_kategori')
        ->select('alamat_penerima.kecamatan','kategori.nama_kategori','harga','id_pekerjaan','pekerjaan.status','jarak')
            ->where('id_kurir', $id)
            ->orderBy('created_at','ASC')
            ->get();

        return response ($data);
	}

    /*
|--------------------------------------------------------------------------
| ============================ API SERVICE ===============================
|--------------------------------------------------------------------------
*/

    public function getDistancebyGoogle($latsel,$lngsel,$latbuy,$lngbuy)
    {
        $KeyApi = "AIzaSyDRpemH3gIcOVfZMcs08NKHihzBRxauX-s";

      //Request Ke Google 
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='. $latsel .','. $lngsel .'&destinations='. $latbuy .','. $lngbuy .'&language=id&key='.$KeyApi.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
      ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } 
        else 
        {
          return $response;
        }
    }



}

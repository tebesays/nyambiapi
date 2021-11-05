<?php

namespace App\Http\Controllers;

use App\Models\ModelKategori;
use App\Models\ModelPekerjaan;
use Illuminate\Http\Request;
use DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelPekerjaan::orderBy('id_pekerjaan', 'DESC')->get();

        return view('transaction.courier.index', compact('data'));
    }

    public function getCourier(Request $request){
        if($request->ajax()){
            $data = ModelPekerjaan::all();
            return DataTables::of($data)
                                ->addIndexColumn()
                                ->addColumn('kurir', function(ModelPekerjaan $courier){
                                    return $courier->kurir->user->name;
                                })
                                ->addColumn('kategori', function(ModelPekerjaan $courier){
                                    return $courier->kategori->nama_kategori;
                                })
                                ->addColumn('pengirim', function(ModelPekerjaan $courier){
                                    return $courier->user->name;
                                })
                                ->addColumn('action', function(ModelPekerjaan $courier){
                                    $actionBtn = '<a href="'.url('transaction/courier/detail/'.$courier['id_pekerjaan']).'" class="btn btn-info btn-md">Detail</a>';
                                    return $actionBtn;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
        }

    }

    public function worker()
    {
        return view('transaction.worker.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ModelPekerjaan::where('id_pekerjaan', $id)->first();
        $kategori = ModelKategori::where('id_kategori', $data->id_kategori)->get();

        return view('transaction.courier.detail', compact('data', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateWAC($id_pekerjaan)
    {
        $data = ModelPekerjaan::where('id_pekerjaan', $id_pekerjaan)->first();
        $data->status = "WAC";
        $data->save();

        return redirect('transaction/courier/'.$id_pekerjaan);
    }

    public function updateFNS($id_pekerjaan)
    {
        $data = ModelPekerjaan::where('id_pekerjaan', $id_pekerjaan)->first();
        $data->status = "FNS";
        $data->save();

        return redirect('transaction/courier/'.$id_pekerjaan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

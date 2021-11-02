@extends('layouts.lib')
@section('title', ' Transaction Detail')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Transaction Detail #{{ $data->id_pekerjaan }}</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Transaction</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('transaction/courier') }}" class="breadcrumb-link">Courier</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail #{{ $data->id_pekerjaan }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card influencer-profile-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="text-center">
                            <img src="{{ url('assets/images/avatar-1.jpg') }}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="user-avatar-info">
                            <div class="m-b-20">
                                <div class="user-avatar-name">
                                    <h2 class="mb-1">{{ $data->kurir->user->name }}</h2>
                                </div>
                                <div class="rating-star  d-inline-block">
                                    <!-- <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <p class="d-inline-block text-dark">14 Reviews </p> -->
                                </div>
                            </div>

                            <div class="user-avatar-address">
                                <p class="border-bottom pb-3">
                                    <span class="d-xl-inline-block d-block mb-2">Joined date: {{date("d M Y", strtotime($data->kurir->created_at))}} </span>
                                    <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">Vehicle: {{ $data->kurir->jenis_kendaraan }}
                                    </span>
                                    <!-- <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">29 Year Old </span> -->
                                </p>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>{{ $data->lat_pengirim }} - {{ $data->lng_pengirim }} ({{ $data->jarak }} m)</span>
                                        <p>
                                            
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="badge badge-light mr-1">{{ $data->status }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" href="#">Nyambi</a>
                <div class="float-right">
                    <h3 class="mb-0">Transaction #{{ $data->id_pekerjaan }}</h3>
                    Date: {{date("d M Y", strtotime($data->created_at))}}
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">From:</h5>
                        <h3 class="text-dark mb-1">{{ $data->user->name }}</h3>
                        <div>{{ $data->alamat_pengirim }}</div>
                        <!-- <div>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7c15121a133c1b190e1d1018521f1311520c10">[email&#160;protected]</a></div> -->
                        <div>{{ $data->user->no_telp }}</div>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">To:</h5>
                        <h3 class="text-dark mb-1">{{ $data->alamat->nama_penerima }}</h3>
                        <div>{{ $data->alamat->alamat_penerima }}</div>
                        <div>{{ $data->alamat->no_telp_penerima }}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Kategori</th>
                                <th class="right">Berat</th>
                                <th class="right">Harga</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        <tbody>
                            <tr>
                                <td class="center">{{ $i++ }}</td>
                                <td class="left strong">Disini harusnya nama item yang dikirim</td>
                                <td class="left">{{ $data->kategori->nama_kategori }}</td>
                                <td class="right">{{ $data->berat }} Kg</td>
                                <td class="right">Rp. {{number_format($data->harga, 0, ',', '.')}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="center">
                                        <strong class="text-dark">Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark">Rp. {{number_format($data->harga, 0, ',', '.')}}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">Courier: {{ $data->kurir->user->name }}</p>
            </div>
        </div>
    </div>
</div>
</div>

</div>

@endsection
@section('scripts')
@endsection
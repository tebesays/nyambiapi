@extends('layouts.lib')
@section('title', 'Transaction')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Courier Transactions </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Transaction</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Courier</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5">#</th>
                        <th>ID</th>
                        <th>Kurir</th>
                        <th>Kategori</th>
                        <th>Pengirim</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->id_pekerjaan }}</td>
                        <td>{{ $d->kurir->user->name }}</td>
                        <td>{{ $d->kategori->nama_kategori }}</td>
                        <td>{{ $d->user->name }}</td>
                        <td>Rp. {{number_format($d->harga, 0, ',', '.')}}</td>
                        <td>{{ $d->status }}</td>
                        <td>
                        <a href="{{ url('transaction/courier/'.$d['id_pekerjaan']) }}" class="btn btn-info btn-md">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
        // $(function () {
        //   var table = $('.yajra-datatable').DataTable({
        //       processing: true,
        //       serverSide: true,
        //       ajax: "{{ route('courier.list') }}",
        //       columns: [
        //           {data: 'DT_RowIndex', name: 'DT_RowIndex'},   
        //           {data: 'id_pekerjaan', name: 'id_pekerjaan'},
        //           {data: 'kurir', name: 'kurir'},
        //           {data: 'kategori', name: 'kategori'},
        //           {data: 'pengirim', name: 'pengirim'},
        //           {data: 'harga', name: 'harga'},
        //           {
        //               data: 'action', 
        //               name: 'action', 
        //               orderable: true, 
        //               searchable: true
        //           },
        //       ]
        //   });
        // });
</script>
@endsection
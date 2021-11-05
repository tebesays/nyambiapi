@extends('layouts.lib')
@section('title', 'Courier')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Courier Detail</h2>
            <p class="pageheader-text">
                Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                amet vestibulum mi. Morbi lobortis pulvinar quam.
            </p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-link">User</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-link">Courier</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Courier #{{ $data->id_kurir }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="user-avatar text-center d-block">
                    <img src="{{ url('assets/images/avatar-1.jpg') }}" alt="User Avatar" class="rounded-circle user-avatar-xxl" />
                </div>
                <div class="text-center">
                    <h2 class="font-24 mb-0">{{ $data->user->name }}</h2>
                    <p> </p>
                </div>
            </div>
            <div class="card-body border-top">
                <h3 class="font-16">Contact Information</h3>
                <div class="">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-fw fa-envelope mr-2"></i><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cba6a2a8a3aaaea7a8a3b9a2b8bfb28baca6aaa2a7e5a8a4a6">{{ $data->user->email }}</a>
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-fw fa-phone mr-2"></i>{{ $data->user->no_telp }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="card-body border-top">
        <h3 class="font-16">Rating</h3>
        <h1 class="mb-0">4.8</h1>
        <div class="rating-star">
          <i class="fa fa-fw fa-star"></i>
          <i class="fa fa-fw fa-star"></i>
          <i class="fa fa-fw fa-star"></i>
          <i class="fa fa-fw fa-star"></i>
          <i class="fa fa-fw fa-star"></i>
          <p class="d-inline-block text-dark">14 Reviews</p>
        </div>
      </div>
      <div class="card-body border-top">
        <h3 class="font-16">Category</h3>
        <div>
          <a href="#" class="badge badge-light mr-1">Fitness</a
          ><a href="#" class="badge badge-light mr-1">Life Style</a
          ><a href="#" class="badge badge-light mr-1">Gym</a>
        </div>
      </div> -->
        </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">



        <div class="influence-profile-content pills-regular">
            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Campaign</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block">
                                <h3 class="section-title">My Campaign State</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">9</h1>
                                    <p>Campaign Invitations</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">35</h1>
                                    <p>Finished Campaigns</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">8</h1>
                                    <p>Accepted Campaigns</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">1</h1>
                                    <p>Declined Campaigns</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-block">
                        <h3 class="section-title">Campaign List</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="media influencer-profile-data d-flex align-items-center p-2">
                                        <div class="mr-4">
                                            <img src="{{ url('assets/images/slack.png') }}" alt="User Avatar" class="user-avatar-lg">
                                        </div>
                                        <div class="media-body ">
                                            <div class="influencer-profile-data">
                                                <h3 class="m-b-10">Your Campaign Title Here</h3>
                                                <p>
                                                    <span class="m-r-20 d-inline-block">Draft Due Date
                                                        <span class="m-l-10 text-primary">24 Jan 2018</span>
                                                    </span>
                                                    <span class="m-r-20 d-inline-block"> Publish Date
                                                        <span class="m-l-10 text-secondary">30 Feb 2018</span>
                                                    </span>
                                                    <span class="m-r-20 d-inline-block">Ends <span class="m-l-10  text-info">30 May, 2018</span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top card-footer p-0">
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">45k</h4>
                                <p>Jumlah Saldo saat ini</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">29k</h4>
                                <p>Total Saldo dicairkan</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                    <div class="card">
                        <h5 class="card-header">Campaign Reviews</h5>
                        <div class="card-body">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“Coming soon!”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold"> </span><small class="text-mute">  </small>
                            </div>
                        </div>
                        <!-- <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“Maecenas rutrum viverra augue. Nulla in eros vitae ante ullamcorper congue. Praesent tristique massa ac arcu dapibus tincidunt. Mauris arcu mi, lacinia et ipsum vel, sollicitudin laoreet risus.”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Luise M. Michet</span><small class="text-mute"> (Company name)</small>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
                            </div>
                        </div> -->
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link " href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
@endsection
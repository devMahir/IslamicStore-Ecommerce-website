@extends('admin.admin-master')
@section('dashboard') active @endsection 

@push('home_css')
  <link href="{{ asset('backend/') }}lib/rickshaw/rickshaw.min.css" rel="stylesheet">
@endpush


@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.home') }}">Islamic Store</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
          <div class="card pd-20 bg-primary">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
          <div class="card pd-20 bg-info">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-purple">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-sl-primary">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
      </div><!-- row -->

      {{-- USE FOR PIE CHART AND GRAPHS --}}
      
        

      {{-- End FOR PIE CHART AND GRAPHS --}}
    </div>
  </div>
  <!-- ########## END: MAIN PANEL ########## -->
@endsection


@push('home_links')

  <script src=" {{ asset('backend/lib/jquery-ui/jquery-ui.js') }}"></script>
  <script src=" {{ asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
  <script src=" {{ asset('backend/lib/d3/d3.js') }}"></script>
  <script src=" {{ asset('backend/lib/rickshaw/rickshaw.min.js') }}"></script>
  <script src=" {{ asset('backend/lib/chart.js/Chart.js') }}"></script>
  <script src=" {{ asset('backend/lib/Flot/jquery.flot.js') }}"></script>
  <script src=" {{ asset('backend/lib/Flot/jquery.flot.pie.js') }}"></script>
  <script src=" {{ asset('backend/lib/Flot/jquery.flot.resize.js') }}"></script>
  <script src=" {{ asset('backend/lib/flot-spline/jquery.flot.spline.js') }}"></script>
  <script src=" {{ asset('backend/js/ResizeSensor.js') }}"></script>
  <script src=" {{ asset('backend/js/dashboard.js') }}"></script>

@endpush
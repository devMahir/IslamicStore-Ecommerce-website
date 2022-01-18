<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Islamic Store</title>

    <!-- vendor css -->
    <link href="{{ asset('backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- dataTable css -->
    <link href=" {{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href=" {{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href=" {{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- textEditor css -->
    <link href=" {{  asset('backend') }}/lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href=" {{  asset('backend') }}/lib/medium-editor/default.css" rel="stylesheet">
    <link href=" {{  asset('backend') }}/lib/summernote/summernote-bs4.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="../css/starlight.css">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/starlight.css') }}">
    <!-- another page css -->

    @stack('home_css')

  </head>

  <body>
    @guest
    @else
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ route('admin.home') }}"><i class="icon ion-android-star-outline"></i> Islamic Store</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <div class="sl-sideleft-menu">
        <a href="{{ url('admin/home') }}" class="sl-menu-link @yield('dashboard')">
          <div class="sl-menu-item">
            <i class="fa fa-laptop menu-item-icon icon tx-22"></i>
            <span class="menu-item-label" style="margin-left: 20px;">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{ url('/') }}" target="_blank" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fa fa-globe menu-item-icon icon tx-22"></i>
            <span class="menu-item-label" style="margin-left: 20px;">Visit Site</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{ route('admin.category') }}" class="sl-menu-link @yield('category')">
          <div class="sl-menu-item">
            <i class="fa fa-navicon icon menu-item-icon tx-22"></i>
            <span class="menu-item-label" style="margin-left: 20px;">Category</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{ route('admin.brand') }}" class="sl-menu-link @yield('brand')">
          <div class="sl-menu-item">
            <i class="fa fa-shield menu-item-icon icon tx-22"></i>
            <span class="menu-item-label" style="margin-left: 20px;">Brand</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link @yield('products')">
          <div class="sl-menu-item">
            <i class="fa fa-cube menu-item-icon icon tx-22"></i>
            <span class="menu-item-label" style="margin-left: 20px;">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{ route('add_products') }}" class="nav-link @yield('add_products')">
              <span class="menu-item-label">Add Products</span>
            </a>
          </li>
          <li class="nav-item"><a href="{{ route('manage_products') }}" class="nav-link @yield('manage_products')">Manage Product</a></li>
        </ul>

        <a href="{{ route('admin.coupon') }}" class="sl-menu-link @yield('coupon')">
          <div class="sl-menu-item">
            <i class="fa fa-ticket menu-item-icon icon tx-22"></i>
            <span class="menu-item-label" style="margin-left: 20px;">Coupon</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{ route('admin.orders') }}" class="sl-menu-link @yield('orders')">
          <div class="sl-menu-item">
            <i class="fa fa-truck menu-item-icon icon tx-22"></i>
            <span class="menu-item-label" style="margin-left: 20px;">Orders</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

      </div><!-- sl-sideleft-menu -->
      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ Auth::user()->name }}<span class="hidden-md-down"></span></span>
              <img src=" {{ asset('backend/img/img3.jpg') }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->

    <!-- ########## END: RIGHT PANEL ########## --->
    @endguest

    <!-- ########## START: MAIN PANEL ########## -->
    @yield('admin_content')
    <!-- ########## END: MAIN PANEL ########## -->

    <script src=" {{ asset('backend/lib/jquery/jquery.js') }}"></script>
    <script src=" {{ asset('backend/lib/popper.js/popper.js') }}"></script>
    <script src=" {{ asset('backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src=" {{ asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src=" {{ asset('backend/js/starlight.js') }}"></script>


    {{-- script for data table --}}
    <script src=" {{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src=" {{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src=" {{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src=" {{ asset('backend') }}/lib/select2/js/select2.min.js"></script>


    {{-- script for text editor --}}
    <script src=" {{ asset('backend') }}/lib/medium-editor/medium-editor.js"></script>
    <script src=" {{ asset('backend') }}/lib/summernote/summernote-bs4.min.js"></script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
        $('#summernote2').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

    
    @stack('home_links')

  </body>
</html>    
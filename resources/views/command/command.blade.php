<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BootLeaf</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
    <link rel="stylesheet" href="{{ asset('/bootleaf/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.css') }}">
    <link rel="stylesheet" href="{{ asset('/bootleaf/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/micromodal.css') }}">

    {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/bootleaf/assets/img/favicon-76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/bootleaf/assets/img/favicon-120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon-152.png">
    <link rel="icon" sizes="196x196" href="{{ asset('/bootleaf/assets/img/favicon-196.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/bootleaf/assets/img/favicon.ico') }}"> --}}

  </head>

  <body>
    <div class="navbar navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <div class="navbar-icon-container">
            <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
            <a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a>
          </div>
          <a class="navbar-brand" href="#">
            <a class="navbar-left" href="#">
              <img src="{{ asset('assets/images/logo(2).png') }}" width="200" style="margin-bottom: 2px" alt="">
            </a>
           
          </a>

        </div>
        <div class="navbar-collapse collapse">
          {{-- <form class="navbar-form navbar-right" role="search">
            <div class="form-group has-feedback">
                <input id="searchbox" type="text" placeholder="Search" class="form-control">
                <span id="searchicon" class="fa fa-search form-control-feedback"></span>
            </div>
          </form> --}}
          <ul class="nav navbar-nav">
             <li style="margin-right: 50px" view-data="maps-view" class="content-view view-active"><p>Maps View</p></li>
            <li style="margin-right: 50px" view-data="tables-view" class="content-view"><p>Table View</p></li>

          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

   <div id="container">
      <div id="sidebar">
        <div class="sidebar-wrapper">
          <div class="panel panel-default" id="features">
            <div class="panel-heading">
              <h3 class="panel-title">Points of Monitoring CCTV</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-8 col-md-8">
                  <input type="text" id="filter-input" class="form-control search" placeholder="Filter" oninput="showSidebarContent(this.value)"/>
                </div>
                {{-- <div class="col-xs-4 col-md-4">
                  <button type="button" class="btn btn-primary pull-right sort" data-sort="feature-name" id="sort-btn"><i class="fa fa-sort"></i>&nbsp;&nbsp;Sort</button>
                </div> --}}
              </div>
            </div>
            <div class="sidebar-table">
              <table class="table table-hover" id="feature-list">
                <thead class="hidden">
                  <tr>
                    <th>Icon</th>
                  <tr>
                  <tr>
                    <th>Name</th>
                  <tr>
                  <tr>
                    <th>Chevron</th>
                  <tr>
                </thead>
                <tbody class="list" id="sidebar-table"></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="map" class=""></div>
      <div id="table-view" class="hidden" style="overflow-x: hidden;overflow-y: scroll; height: 100%;">
         <div class="container mt-5">
            <div id="cctv-list-table-view" class="mt-5">
               
            </div>
        </div>
      </div>

   </div>
    

    <!-- SET MICROMODAL -->

<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
   <div class="modal__overlay" tabindex="-1" data-micromodal-close>
     <div
       class="modal__container"
       role="dialog"
       aria-modal="true"
       aria-labelledby="modal-1-title"
     >
       <header class="modal__header">
         <h2 class="modal__title" id="modal-1-title">
           CCTV List
         </h2>
         <button
           class="modal__close"
           aria-label="Close modal"
           data-micromodal-close
         />
       </header>
       <main class="modal__content" id="modal-1-content">
         
         
         {{-- MODAL CONTENT --}}

            <ul id="modal-content">

            </ul>

         {{-- MODAL CONTENT END --}}


       </main>
       <footer class="modal__footer">
         <button
           class="modal__btn"
           data-micromodal-close
           aria-label="Close this dialog window"
         >
           Close
         </button>
       </footer>
     </div>
   </div>
 </div>

<!-- END SET MICROMODAL -->


<div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
   <div class="modal__overlay" tabindex="-1" data-micromodal-close>
     <div
       class="modal__container"
       role="dialog"
       aria-modal="true"
       aria-labelledby="modal-2-title"
     >
       <header class="modal__header">
         <h2 class="modal__title" id="modal-2-title">
           Stream CCTV
         </h2>
         <button
           class="modal__close"
           aria-label="Close modal"
           data-micromodal-close
         />
       </header>
       <main class="modal__content" id="modal-1-content">
         
         
         {{-- MODAL CONTENT --}}

            <ul id="modal-stream-content">
               <video id="stream-cctv" width="500" height="500" controls autoplay></video>
            </ul>

         {{-- MODAL CONTENT END --}}


       </main>
       <footer class="modal__footer">
         <button
           class="modal__btn"
           data-micromodal-close
           aria-label="Close this dialog window"
         >
           Close
         </button>
       </footer>
     </div>
   </div>
</div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.5/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
    <script src="{{ asset('/bootleaf/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js') }}"></script>

    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

    <script>
    </script>

   <script src="{{ asset('/bootleaf/assets/js/app.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/hls.js/0.8.2/hls.min.js"></script>
  </body>
</html>
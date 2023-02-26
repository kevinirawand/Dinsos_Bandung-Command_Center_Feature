@extends('adminlte::page')
@section('content')
<link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/adminlte/pages/leaflet/leaflet.min.css') }}">
<link rel="stylesheet" href="{{ asset('/adminlte/pages/leaflet/leaflet.css') }}">
<style>
    video {
            max-width: 100%;
            height: auto;
            }
</style>
    {{-- <div class="container" > --}}
        <div class="col d-flex justify-content-center text-center mt-4">
            <div class="info-box">
              {{-- <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span> --}}

              <div class="info-box-content">
                <h1 class="info-box-text">Point Monitoring</h1>
              
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        {{-- <div class="row">
            <div class="card m-2 col-12">
                <div class="card-header">
                    <h3 class="card-title">Point Monitoring</h3>
                </div>
                <div class="card-body">
                    <div id="map-marker" style="height: 400px;"></div>
                </div>
            </div>
        </div> --}}
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Simpang Lima</h3>
              </div>
              <div class="card-body">
                      <video id="video1" width="500" controls></video>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">PasirKoja</h3>
              </div>
              <div class="card-body">
                <video id="video" width="500" controls></video>
              </div>
            </div>
          </div>
          {{-- <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kiaracondong</h3>
              </div>
              <div class="card-body">
                <video id="video2" width="500" controls></video>
              </div>
            </div>
          </div> --}}
          <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Merdeka </h3>
              </div>
              <div class="card-body">
                <video id="video3" width="500"  height='auto' controls></video>
              </div>
            </div>
          </div>
          <div class="col-sm-6 justify-center">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cikapayang-Dago</h3>
              </div>
              <div class="card-body">
                <video id="video4" width="500" controls></video>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="row">
            <div class="card m-2">
                <div class="card-header">
                  <h3 class="card-title">Simpang Lima</h3>
                </div>
                  <div class="card-body">
                    <video id="video1" width="500" controls></video>
                  </div>
            </div>
            <div class="card m-2">
                <div class="card-header">
                  <h3 class="card-title">PasirKoja</h3>
                </div>
                  <div class="card-body">
                    <video id="video" width="500" controls></video>
                  </div>
            </div>
            <div class="card m-2">
              <div class="card-header">
                <h3 class="card-title">Kiaracondong</h3>
              </div>
                <div class="card-body">
                  <video id="video2" width="500" controls></video>
                </div>
          </div>
        </div> --}}
    {{-- </div> --}}
    {{-- <script src="assets/vendors/js/base/jquery.min.js"></script>
    <script src="assets/vendors/js/base/core.min.js"></script> --}}

{{-- <script src="{{ asset('leaflet/maps-leaflet.js') }}"></script> --}}
{{-- <script src="{{asset('js/app.js')}}"></script> --}}


<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script>
        var mymap = L.map('map-marker').setView([-6.9034495, 107.6431575], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            id: 'mapbox.streets'
        }).addTo(mymap);

        // custom popup image + text
        const customPopup =
        '<div class="customPopup"><figure><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/A-10_Sukiennice_w_Krakowie_Krak%C3%B3w%2C_Rynek_G%C5%82%C3%B3wny_MM.jpg/1920px-A-10_Sukiennice_w_Krakowie_Krak%C3%B3w%2C_Rynek_G%C5%82%C3%B3wny_MM.jpg"><figcaption>Source: wikipedia.org</figcaption></figure><div>Kraków,[a] also written in English as Krakow and traditionally known as Cracow, is the second-largest and one of the oldest cities in Poland. Situated on the Vistula River in Lesser Poland Voivodeship... <a href="https://en.wikipedia.org/wiki/Krak%C3%B3w" target="_blank">→ show more</a></div></div>';

        // specify popup options
        const customOptions = {
        minWidth: "220", // set max-width
        keepInView: true, // Set it to true if you want to prevent users from panning the popup off of the screen while it is open.
        };

        L.marker([-6.9034495, 107.6431575]).addTo(mymap)
            .bindPopup("Pasirkoja").openPopup();

        // L.marker([-6.9231887,107.6450072]).addTo(mymap)
        //     .bindPopup("Samsat").openPopup();

        L.marker([-6.9098384186935595, 107.6105150450839]).addTo(mymap)
            .bindPopup("merdeka").openPopup();
        
        L.marker([-6.922210187454272, 107.61766072596647]).addTo(mymap)
            .bindPopup("Simpang Lima").openPopup();
        
        L.marker([ -6.898739655290335, 107.6128735555913]).addTo(mymap)
            .bindPopup("Ciakapayang dago").openPopup();

           
        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }

        mymap.on('click', onMapClick);

</script>
<script>
    if(Hls.isSupported()) {
      var video = document.getElementById('video');
      var hls = new Hls();
      hls.loadSource('http://45.118.114.26:80/camera/PasirKoja.m3u8');
      hls.attachMedia(video);
      hls.on(Hls.Events.MANIFEST_PARSED,function() {
        video.play();
    });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
    else if (video.canPlayType('application/vnd.apple.mpegurl')) {
      video.src = 'http://45.118.114.26:80/camera/PasirKoja.m3u8';
      video.addEventListener('canplay',function() {
        video.play();
      });
    }

    if(Hls.isSupported()) {
      var video1 = document.getElementById('video1');
      var hls1 = new Hls();
      hls1.loadSource('http://45.118.114.26:80/camera/SimpangLima.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED,function() {
        video1.play();
    });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
    else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'http://45.118.114.26:80/camera/SimpangLima.m3u8';
      video1.addEventListener('canplay',function() {
        video1.play();
      });
    }
    if(Hls.isSupported()) {
      var video1 = document.getElementById('video2');
      var hls1 = new Hls();
      hls1.loadSource('http://45.118.114.26:80/camera/Samsat.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED,function() {
        video1.play();
    });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
    else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'http://45.118.114.26:80/camera/Samsat.m3u8';
      video1.addEventListener('canplay',function() {
        video1.play();
      });
    }
    if(Hls.isSupported()) {
      var video1 = document.getElementById('video3');
      var hls1 = new Hls();
      hls1.loadSource('http://45.118.114.26:80/camera/MerdekaAceh.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED,function() {
        video1.play();
    });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
    else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'http://45.118.114.26:80/camera/MerdekaAceh.m3u8';
      video1.addEventListener('canplay',function() {
        video1.play();
      });
    }
    if(Hls.isSupported()) {
      var video1 = document.getElementById('video4');
      var hls1 = new Hls();
      hls1.loadSource('http://45.118.114.26:80/camera/Cikapayang1.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED,function() {
        video1.play();
    });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
    else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'http://45.118.114.26:80/camera/Cikapayang1.m3u8';
      video1.addEventListener('canplay',function() {
        video1.play();
      });
    }
    
</script>
@endsection
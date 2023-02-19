@extends('adminlte::page')
@section('content')
<link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/adminlte/pages/leaflet/leaflet.min.css') }}">
<link rel="stylesheet" href="{{ asset('/adminlte/pages/leaflet/leaflet.css') }}">

<link rel="stylesheet" href="{{ asset('/assets/css/micromodal.css') }}">
<style>
   .agile__list {
        touch-action: none
   }

   .sortable-handler{
      touch-action: none
   }
</style>

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> --}}

    <div class="container" >
        <div class="pull-left">
            <h2>Maps</h2>
        </div>
        <div class="row">
            <div class="card m-2 col-12 .agile__list">
                <div class="card-header">
                    <h3 class="card-title">Point Monitoring</h3>
                </div>
                <div class="card-body .agile__list">
                    <div id="map-marker" class=".agile__list" style="height: 400px;"></div>
                </div>
            </div>
        </div>
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
                <video id="video3" width="500" controls></video>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
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
    </div>
    {{-- <script src="assets/vendors/js/base/jquery.min.js"></script>
    <script src="assets/vendors/js/base/core.min.js"></script> --}}

{{-- <script src="{{ asset('leaflet/maps-leaflet.js') }}"></script>
<script src="{{asset('js/app.js')}}"></script> --}}


{{-- <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script> --}}







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
           Micromodal
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
         <button class="modal__btn modal__btn-primary">Continue</button>
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
               <video id="stream-cctv" width="500" height="500" controls></video>
            </ul>

         {{-- MODAL CONTENT END --}}


       </main>
       <footer class="modal__footer">
         <button class="modal__btn modal__btn-primary">Continue</button>
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





{{-- KEVIN  --}}

<!-- JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- MAP REQUIREMENT -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
   integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
   integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>


<!-- MODAL REQUIREMENT -->
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- <script src="/assets/script/micromodal.js"></script> -->



<!-- HLS REQUIREMENT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/hls.js/0.8.2/hls.min.js"></script>



{{-- PASSIVE EVENT HANDLER--}}
<script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>


{{-- <script id="MAP_MODEL">
   class MapModel {
      constructor() {
         this.map = null;
      }

      this.markers = [];
      
      createMap() {
         this.map = L.map('map-marker').setView([-6.9034495, 107.6431575], 13);
         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
            id: 'mapbox.streets'
         }).addTo(this.map);
      }
      
      addMarker(lat, lon) {
         const marker = L.marker([lat, lon]).addTo(this.map);
         this.markers.push(marker);
      }

      getAllMarker() {
         return this.markers;
      }
      // this.drawnItems = new L.FeatureGroup();
      // this.map.addLayer(drawnItems);
   }
</script> --}}

<script>
   
   // const map = new MapModel('map-marker');

   // map.createMap();

   const mymap = L.map('map-marker').setView([-6.9034495, 107.6431575], 10);

   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
      id: 'mapbox.streets'
   }).addTo(mymap);


   MicroModal.init();


</script>

<script>
   $(document).ready(() => {
      
      
      showAllCctvLocation();
   })

   
   const utilsFunction = {
      customPopup(lat, lng) {
         let cctvId = null;
         MicroModal.show('modal-1');

         if ($('#modal-1').hasClass('is-open')) {

            $.ajax({
               url: "http://localhost:1337/cctv/cctv-location/list/" + lat + '&' + lng,
               type: 'get',
               dataType: 'JSON',
               async: false,
               success: function(data) {
                  content = '';
                  data.data.cctvList.forEach(utilsFunction.modalContentLoop);
                  document.getElementById("modal-content").innerHTML = content;
                  
                  $(".cctv-list-anchor").each((index, element) => {
                     $(element).on('click', () => {
                        showCctvStream($(element).attr("url-data"))
                     })
                  })
               },
               error: function(err) {
                  console.error(err)
               }
            });
         }
      },
   
      modalContentLoop(item) {
         content += `<li class="cctv-list-anchor" url-data="${item.stream}"><p>${item.nama_cctv}</p>`
      }
   }

   const showAllCctvLocation = () => {
      let locations = null;

      $.ajax({
         url: "http://localhost:1337/cctv/cctv-location",
         type: 'get',
         dataType: 'JSON',
         async: false,
         success: function(data) {
            locations = data.data.cctvLocationArr;
         },
         error: function(err) {
            console.error(err)
         }
      });
      

      for (let i = 0; i < locations.length; i++) {
         marker = new L.marker([locations[i].latitude, locations[i].longitude])
         .addTo(mymap);
      }

      mymap.eachLayer((l) => {
            l.on('click', () => {
               utilsFunction.customPopup(l._latlng.lat, l._latlng.lng)
            });

            l.on('mouseover', function() {
               const getMarkerLocation = l.getLatLng();

               let locationName = "";
               let lat_location = "";
               let lon_location = "";
               for (const location in locations) {
                  if (getMarkerLocation.lat == locations[location].latitude) {
                     locationName = locations[location].nama_lokasi;
                     lat_location = locations[location].latitude;
                     lon_location = locations[location].longitude;
                  }
               }
               l.bindPopup(locationName).openPopup();
            })
      })

      
   }

   const showCctvStream = (url) => {
      $.ajax({
         type: "GET",
         headers: {
            'Content-Type': 'application / x -mpegURL',
            'Access-Control-Allow-Credentials': true,
            'Access-Control-Allow-Origin': "*",
            'Access-Control-Allow-Headers': 'Content-Type',
            'Access-Control-Allow-Methods': 'PUT, GET, HEAD, POST, DELETE, OPTIONS'
         },
         url: url,
         processData: false,
         success: function (data) {
            const video = document.getElementById('stream-cctv');

            var hls = window.hls = new Hls({
               capLevelToPlayerSize: true,
               debug: true,
            });
            hls.loadSource(url);
            hls.attachMedia(video);

            const setNewSource = () => {
               hls.on(Hls.Events.MEDIA_DETACHED, () => {
                  hls.attachMedia(video);
                  hls.loadSource(url);
               });
               console.log(hls.autoLevelCapping);
               hls.detachMedia();
            };

            const onManifestParsedOnce = () => {
               hls.off(Hls.Events.MANIFEST_PARSED, onManifestParsedOnce);
               setTimeout(setNewSource, 1000);
            };

            hls.on(Hls.Events.MANIFEST_PARSED, onManifestParsedOnce);
         }
      });

      MicroModal.show('modal-2');
   }
   

   
   

</script>

{{-- <script>
   if (Hls.isSupported()) {
      var video = document.getElementById('video');
      var hls = new Hls();
      hls.loadSource('https://atcs-dishub.bandung.go.id:1990/PasirKoja/index.m3u8');
      hls.attachMedia(video);
      hls.on(Hls.Events.MANIFEST_PARSED, function () {
         video.play();
      });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
   else if (video.canPlayType('application/vnd.apple.mpegurl')) {
      video.src = 'https://atcs-dishub.bandung.go.id:1990/Buahbatu/index.m3u8';
      video.addEventListener('canplay', function () {
         video.play();
      });
   }

   if (Hls.isSupported()) {
      var video1 = document.getElementById('video1');
      var hls1 = new Hls();
      hls1.loadSource('https://atcs-dishub.bandung.go.id:1990/Cibeureum/index.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED, function () {
         video1.play();
      });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
   else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'https://atcs-dishub.bandung.go.id:1990/TolPasteur/index.m3u8';
      video1.addEventListener('canplay', function () {
         video1.play();
      });
   }
   if (Hls.isSupported()) {
      var video1 = document.getElementById('video2');
      var hls1 = new Hls();
      hls1.loadSource('http://45.118.114.26:80/camera/Samsat.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED, function () {
         video1.play();
      });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
   else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'https://atcs-dishub.bandung.go.id:1990/TolPasteur/index.m3u8';
      video1.addEventListener('canplay', function () {
         video1.play();
      });
   }
   if (Hls.isSupported()) {
      var video1 = document.getElementById('video3');
      var hls1 = new Hls();
      hls1.loadSource('https://pelindung.bandung.go.id:3443/video/HIKSVISION/DrDjunjunanBTCdua.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED, function () {
         video1.play();
      });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
   else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'https://atcs-dishub.bandung.go.id:1990/TolPasteur/index.m3u8';
      video1.addEventListener('canplay', function () {
         video1.play();
      });
   }
   if (Hls.isSupported()) {
      var video1 = document.getElementById('video4');
      var hls1 = new Hls();
      hls1.loadSource('https://atcs-dishub.bandung.go.id:1990/Cikapayang1/index.m3u8');
      hls1.attachMedia(video1);
      hls1.on(Hls.Events.MANIFEST_PARSED, function () {
         video1.play();
      });
   }
   // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
   // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
   // This is using the built-in support of the plain video element, without using hls.js.
   else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
      video1.src = 'https://atcs-dishub.bandung.go.id:1990/TolPasteur/index.m3u8';
      video1.addEventListener('canplay', function () {
         video1.play();
      });
   }
</script> --}}
@endsection
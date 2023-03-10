const mymap = L.map('map').setView([-6.9034495, 107.6431575], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
   maxZoom: 18,
   attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
   id: 'mapbox.streets'
}).addTo(mymap);

MicroModal.init();


$(document).ready(() => {
   let sidebarContent;

   showSidebarContent("");
   showAllCctvLocation();
})


const utilsFunction = {
   customPopup(lat, lng) {
      let cctvId = null;
      MicroModal.show('modal-1');

      if ($('#modal-1').hasClass('is-open')) {
         const closeModal = document.querySelectorAll('.modal__close');
         const theModals = document.querySelectorAll('.micromodal-slide');

         closeModal.forEach(element => {
            element.addEventListener('click', () => {
               theModals.forEach((modalLayer) => {
                  modalLayer.classList.remove("is-open");
               });
            });
         });


         $.ajax({
            url: "http://localhost:1337/cctv/cctv-location/list/" + lat + '&' + lng,
            type: 'get',
            dataType: 'JSON',
            async: false,
            success: function (data) {
               content = '';
               data.data.cctvList.forEach(utilsFunction.modalContentLoop);
               document.getElementById("modal-content").innerHTML = content;

               $(".cctv-list-anchor").each((index, element) => {
                  $(element).on('click', () => {
                     showCctvStream($(element).attr("url-data"))
                  })
               })
            },
            error: function (err) {
               console.error(err)
            }
         });
      }
   },

   modalContentLoop(item) {
      content += `<div class="card text-center" style="width: 35rem; background-color: #e2e3e5;">
                     <div class="d-flex justify-content-center mt-4">
                        <img class="card-img-top cctv-list-anchor " src="{{ asset('assets/images/video-play.png') }}" url-data="${item.stream}" alt="Card image cap" style="max-width: 100px;">
                     </div>
                  
                     <div class="card-body">
                        <div class="cctv-list-anchor text-center" url-data="${item.stream}"><p>${item.nama_cctv}</p></div>
                     </div>
                  </div>`
   },

   sidebarContentLoop(item) {
      sidebarContent += `<tr class="feature-row" lat-data="${item.latitude}" lng-data="${item.longitude}"><td style="vertical-align: middle;"><img width="16" height="18" src=""></td><td class="feature-name">${item.nama_lokasi}</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>`
   },

   getCctvLocations() {
      let results = null;

      $.ajax({
         url: "http://localhost:1337/cctv/cctv-location",
         type: 'get',
         dataType: 'JSON',
         async: false,
         success: function (data) {
            results = data.data.cctvLocationArr;
         },
         error: function (err) {
            console.error(err)
         }
      });

      return results;
   },

   syncSidebarContent(locations) {
      sidebarContent = '';
      locations.forEach(utilsFunction.sidebarContentLoop);
      document.getElementById("sidebar-table").innerHTML = sidebarContent;

      const sidebarContentElement = document.querySelectorAll(".feature-row");
      sidebarContentElement.forEach((element) => {

         element.addEventListener('click', () => {
            utilsFunction.customPopup($(element).attr("lat-data"), $(element).attr("lng-data"));
         });
      });
   }
}

const showAllCctvLocation = () => {

   const locations = utilsFunction.getCctvLocations();

   const imagesPath = window.location.host.toString() + "/assets/images/CCTV/CCTV48.svg";

   // console.info(window.location.host);

   const cctvIcon = L.divIcon({
      html: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:#0cb8d8;}</style></defs><title>CCTV 98</title><g id="Layer_2" data-name="Layer 2"><g id="google_site" data-name="google site"><rect class="cls-1" width="96" height="96" rx="17.76"/><path class="cls-2" d="M13,55.81A1.88,1.88,0,0,1,14.83,55c1.45.06,2.91,0,4.37,0,1,0,1.49.46,1.5,1.5V58.9a6.57,6.57,0,0,1,4.45,3.46.66.66,0,0,0,.48.26c5.49,0,11,0,16.46,0a1.54,1.54,0,0,0,.28-.07V61.36c0-1.58,0-3.15,0-4.72a1.21,1.21,0,0,0-.36-.79,5.05,5.05,0,0,1-1.44-5.59c.27-.77.56-1.53.87-2.38l-3.21-1.19-8.38-3.07c-1.12-.41-1.37-1-1-2.11L30,38.3c-.32-.13-.61-.25-.89-.35l-4.87-1.79a1.29,1.29,0,0,1-.88-1.88q2.76-7.56,5.54-15.1c.38-1,1-1.26,2.06-.86l21.92,8.12,28.7,10.64.38.14a1.26,1.26,0,0,1,1,1.19,1.27,1.27,0,0,1-.81,1.24L75.66,43l-1,.56a7.7,7.7,0,0,1-8.39,10.64c-.12.29-.23.58-.34.87-.43,1.18-1,1.45-2.15,1l-9.47-3.48-.89-.31c-.28.73-.56,1.44-.81,2.17a5.5,5.5,0,0,1-2.19,2.79,1.13,1.13,0,0,0-.36.84c0,4.3,0,8.6,0,12.9a5.68,5.68,0,0,1-.22,1.75,3.78,3.78,0,0,1-7.37-1c0-.45,0-.91,0-1.43-.29,0-.53,0-.77,0H25.9a.92.92,0,0,0-.94.55,5.88,5.88,0,0,1-3.61,2.94.77.77,0,0,0-.66,1c0,.59,0,1.19,0,1.78a1.24,1.24,0,0,1-1.33,1.39c-1.66,0-3.32,0-5,0A1.56,1.56,0,0,1,13,77ZM26.18,34.08l.11.11q12.51,4.59,25,9.17A.83.83,0,0,0,52,43.2c1-.92,2-1.84,3-2.8a1.61,1.61,0,0,1,1.91-.4c3.47,1.3,7,2.55,10.42,3.85a1.44,1.44,0,0,0,1.28-.07c2.8-1.46,5.61-2.9,8.42-4.35l1.52-.79L31,21ZM66.41,46.22c-3.29-1.21-6.48-2.38-9.69-3.53a.74.74,0,0,0-.62.18c-1,.9-2,1.8-2.94,2.75a1.7,1.7,0,0,1-2,.42c-5.15-1.92-10.32-3.8-15.48-5.7l-3.21-1.17-.87,2.38L63.78,53.38Zm-19,21.45V65.19H25.89v2.48ZM18.13,75.3V57.57h-2.5V75.3ZM51,51.39l-7.16-2.63c-.19.52-.37,1-.53,1.4s-.34.85-.45,1.29a2.47,2.47,0,0,0,1.43,2.87,28.94,28.94,0,0,0,2.74,1,2.42,2.42,0,0,0,2.9-1.21C50.32,53.27,50.61,52.36,51,51.39Zm21.26-6.64a7.68,7.68,0,0,1-.76.38,4.68,4.68,0,0,0-3.36,3.75,22.77,22.77,0,0,1-1,2.8A5,5,0,0,0,72.24,44.75ZM20.72,71.28a3.35,3.35,0,0,0,2.36-2.61,17.6,17.6,0,0,0,0-4.47,3.31,3.31,0,0,0-2.36-2.62ZM44.94,57.36v5.22h2.47V58Zm-.06,12.92c.07.9-.24,1.8.7,2.33A1.15,1.15,0,0,0,47,72.48c.71-.62.44-1.43.46-2.2Z"/><path class="cls-2" d="M43.73,37.88,41.37,37l.86-2.39,2.38.88Z"/><path class="cls-2" d="M47,36.39l2.38.87-.87,2.38-2.38-.87Z"/><path class="cls-2" d="M39.84,33.75,39,36.13l-2.37-.86.86-2.38Z"/></g></g></svg>`,
      iconSize: [24, 28],
      iconAnchor: [12, 28],
      popupAnchor: [0, -25]
   });

   for (let i = 0; i < locations.length; i++) {
      marker = new L.marker([locations[i].latitude, locations[i].longitude], {
         icon: cctvIcon
      })
         .addTo(mymap);
   }

   mymap.eachLayer((l) => {
      l.on('click', () => {
         utilsFunction.customPopup(l._latlng.lat, l._latlng.lng)
      });

      l.on('mouseover', function () {
         const getMarkerLocation = l.getLatLng();

         let locationName = "";
         for (const location in locations) {
            if (getMarkerLocation.lat == locations[location].latitude) {
               locationName = locations[location].nama_lokasi;
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

const showSidebarContent = (nama_lokasi) => {
   let locations = null;
   const result = utilsFunction.getCctvLocations();
   if (nama_lokasi == null || nama_lokasi == '') {
      locations = result;

      utilsFunction.syncSidebarContent(locations);
   } else {
      let filteredLocations = result.filter(location => location.nama_lokasi.toLowerCase().replace(/\s/g, '').includes(nama_lokasi.toLowerCase().replace(/\s/g, '')));

      utilsFunction.syncSidebarContent(filteredLocations);
   }


   // let locations = result;
   // utilsFunction.syncSidebarContent();

   // $('#filter-input').keyup(function () {
   //    if ($(this).val() == '' || $(this).val() == null) {
   //       locations = result;
   //    } else {
   //       filteredLocations = result.filter(location => location.nama_lokasi === $(this).val());
   //       locatioons = filteredLocations;
   //    }

   // });

   // document.getElementById("sidebar-table").innerHTML = '';

   // result.map(location => {
   //    nama_lokasi.split(" ").map(word => {
   //       if (location.nama_lokasi.toLowerCase().indexOf(word.toLowerCase()) != -1) {
   //          // sidebarContent = '';
   //          // locations.forEach(utilsFunction.sidebarContentLoop);
   //          document.getElementById("sidebar-table").innerHTML += utilsFunction.sidebarContentLoop(location);
   //       }
   //    })
   // })
}


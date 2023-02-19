<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Sistem Terpadu Layanan Sosial Satu Pintu</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slider/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slider/css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
</head>
<style>
    .lingkaran1{
	width: 30px;
	height: 30px;
	background: #dac52c;
	border-radius: 100%;
    padding-top: 5px;
}
    .center {
        margin: auto;
        width: 60%;
        padding: 10px;
        text-align: left;
    }
</style>
    <body>
       <!--########################### Header Starts Here ###################### -->
        <div class="home-screen container-fluid">
          <div class="home-cover">
                <div id="menu-jk" class="header">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-3 logo">
                               <img class="logo-wt" src="{{ asset('assets/images/logo(2).png') }}" alt="">
                               <img class="logo-gry" src="{{ asset('assets/images/logo(2).png') }}" alt="">
                               
                               <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                           </div>
                           <div id="menu" class="col-md-9 d-none d-md-block">
                               <ul>
                                   <li><a href="#">Home</a></li>
                                   <li><a href="#Penerima_Bantuan">Penerima Bantuan</a></li>
                                   <li><a href="/command-center/landing-Page">Command Center</a></li>
                                   <li><a href="http://login-soca.dinsos.bandung.go.id">Login</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
                <div class="container">
                   <div class="row home-detail">
                      <div class="col-md-5 animated bounceInLeft hom-img">
                          <img src="assets/images/yana.png" alt="" download="false">
                      </div>
                      <div class="col-md-7 animated bounceInRight homexp">
                           <h5>Selamat Datang Di</h5>
                           <h2>Sistem Terpadu</h2>
                           <span><a>Layanan Sosial Satu Pintu</a> </span>
                           <p>Kesejahteraan Sosial dari, oleh, dan untuk Masyarakat menuju Bandung yang Bebas Penyandang Masalah Kesejahteraan Sosial (PMKS).</p>
                         
                           <ul class="socil-icon">
                                {{-- <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li> --}}
                                <li>
                                    <a href="https://twitter.com/dinsosbdg?lang=en"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/dinsosbdg/?hl=en"><i class="fab fa-instagram"></i></a> 
                                </li>
                               <li>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                                {{-- <li>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                </li> --}}
                           </ul>
                       </div>
                     
                   </div>

                </div>
          </div>
        </div>
        
        
        <!--########################### About US Starts Here ###################### -->
        
        <div id="Penerima_Bantuan" class="about-us container-fluid">
           <div class="container">
               <div class="session-title row">
                    <h2>Penerima Bantuan</h2>
                    <p>Silakan pilih pencarian berdasarkan NIK </p>
                    <div class="heading-line"></div>
                </div>
                <div class="about-row row">
                   <div class="detail-col col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3 ">
                                  
                                        <select class="form-select text-center" aria-label="Default select example" name="filter_field[]" id='cari' style="width: auto; height: auto;">
                                            <div class="">
                                                        <option class="text-center" value='' disabled>-- cari berdasarkan --</option>
                                                        {{-- <option value='u.Nama'>Nama</option> --}}
                                                        {{-- <option value='u.Kecamatan'>Kecamatan</option> --}}
                                                        <option value='u.Nik' selected >NIK</option>
                                            </div>
                                        </select>
                                    <input name="filter_field_search[]" type="text" id="filter" class="form-control" onkeyup="manage(this)"> 
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered nowrap text-center"  hidden id="emptableid" style="width:100%">
                                    {{-- <table class="table" > --}}
                                        <thead>
                                        <tr>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Kecamatan</th>
                                            <th>Bansos</th>
                                            <th>UHC</th>
                                            <th>Dapodik</th>
                                            {{-- <th>action</th> --}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>
                                
                                    </table>
                                </div>
                            </div>
                        </div>            
                   </div>
                </div>
           </div>    
            
        </div>
        <section id="cntact_us" class="contact-us-single">
            <div class="session-title row">
                <h2>About us</h2>
                <div class="heading-line"></div>
            </div>
            <div class="row w-100">
                
                <div class="col-lg-6">
                    <div class="center">
                        <h2 class="text-center mt-2">Maps Location</h2>
                        <div class="heading-line"></div>
                    </div>
                    <div class="mt-2">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.3590960664!2d107.59372783449834!3d-6.904207382184811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e68e1cf3ec2b%3A0xe7a41c0ef31fab4f!2sSocial%20Office%20Bandung!5e0!3m2!1sen!2sid!4v1671548052301!5m2!1sen!2sid"
                            class="w-100" height="400" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                        <div class="center">
                            <h2 class="text-center mt-6">Contact</h2>
                            <div class="heading-line"></div>
                        </div>
                        <div class="center">
                                <div class="d-flex">
                                    <img src="{{ asset('images/logo_dinso_bdg.png') }}" alt="" download="false" style="max-width: 100px;">
                                    <h4 class="mt-2" style="
                                    margin-left: 20px;
                                    font-weight:bold;
                                    color:black;
                                    ">Dinas Sosial Kota bandung</h4>
                                </div>
                                <div class="row mt-4 d-flex">
                                    <div class="col-1">
                                        <svg style="width:50px;height:50px; color:#8B008B;" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,12.5A1.5,1.5 0 0,1 10.5,11A1.5,1.5 0 0,1 12,9.5A1.5,1.5 0 0,1 13.5,11A1.5,1.5 0 0,1 12,12.5M12,7.2C9.9,7.2 8.2,8.9 8.2,11C8.2,14 12,17.5 12,17.5C12,17.5 15.8,14 15.8,11C15.8,8.9 14.1,7.2 12,7.2Z" />
                                        </svg>
                                    </div>
                                    <div class="col-11 mt-10">
                                        <div class="ml-4">
                                            <span class=""> 
                                                Jl. Babakan Karet Belakang Rusunawa Rancacili
                                            Derwati, Rancasari, Kota Bandung 40292
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-1">
                                        <svg style="width:50px;height:50px; color:#8B008B;" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M5,3A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3H5M6.4,6.5H17.6C18.37,6.5 19,7.12 19,7.9V16.1A1.4,1.4 0 0,1 17.6,17.5H6.4C5.63,17.5 5,16.87 5,16.1V7.9C5,7.12 5.62,6.5 6.4,6.5M6,8V10L12,14L18,10V8L12,12L6,8Z" />
                                        </svg>
                                    </div>
                                    <div class="col-11">
                                        <div class="ml-4">
                                            <span>
                                                Hotline WA &nbsp;&nbsp;: 0812-2174-2841 <br>
                                                Email &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: dinsos@bandung.go.id
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-1">
                                        <svg style="width:50px;height:50px; color:#8B008B;" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                                        </svg>
                                    </div>
                                    <div class="col-11">
                                        <div class="ml-4">
                                        <h5 style="
                                        font-weight:bold;
                                        color:black;
                                    ">Media Sosial</h5>
                                        
                                            <span>
                                                Twitter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<a href="https://twitter.com/dinsosbdg?lang=en"> @dinsosbdg</a> <br>
                                                Instagram&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <a href="https://www.instagram.com/dinsosbdg/?hl=en"> @dinsosbdg</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>  
                </div>
              </div>
        </section>   
    </body>


    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slider/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
      
        $(document).ready(function() {
  
            var empTable = $("#emptableid").DataTable({
                     processing: true,
                     serverSide: true,
                      serverSide: true,
                      searching: false,
                      ordering: false,
                      info: false,
                      paging: false,
                      responsive: true,
                      ajax: {
                          url: '{{url('/')}}',
                          data: function (data) {
                                data.search = $('#search').val(),
                                data.carikecamatan = $('#carikecamatan').val(),
                                data.Nik = $('#Nik').val(),
                                data.cari = $('#cari').val(),
                                data.filter = $('#filter').val(),
                                data.tempat = $('#tempat').val()
                            }
                      },
                     
                      columns: [
                          {data: "Nik", className: 'Nik'},
                          {data: "Nama", className: 'Nama'},
                          {data: "Kecamatan", className: 'Kecamatan'},
                          {data: "Bansos", className: 'Bansos'},
                          {data: "Uhc", className: 'UHC'},
                          {data: "Dapodik", className: 'Dapodik'},
                          // {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]  
                });
                $('#search').change(function(){
                        empTable.draw();
                    });
                
                    $('#tempat').change(function(){
                        empTable.draw();
                    });
            
                $('#Nik').keyup(function(){
                    empTable.draw();
                });
                $('#filter').keyup(function(){
                    
                    empTable.draw();
                });
                /*------------------------------------------
          --------------------------------------------
          Click to Edit Button
          --------------------------------------------
          --------------------------------------------*/
        });
  
      </script>
      <script>
        function manage(filter) {
            var bt = document.getElementById('emptableid');
            if (filter.value != '') {
              var input, filter, ul, li, a, i, filterValue;
              input = document.getElementById("filter");
              filter = input.value.toUpperCase();
              ul = document.getElementById("emptableid");
              li = ul.getElementsByTagName("li");
              for (i = 0; i < li.length; i++) {
                  a = li[i].getElementsByTagName("a")[0];
                  filterValue = a.textContent || a.innerText;
                  if (filterValue.toUpperCase().indexOf(filter) > -1) {
                      li[i].style.display = "";
                  } else {
                      li[i].style.display = "none";
                  }
              }
              bt.hidden = false;
            }
            else {
              var input, filter, ul, li, a, i, filterValue;
              input = document.getElementById("filter");
              filter = input.value.toUpperCase();
              ul = document.getElementById("emptableid");
              li = ul.getElementsByTagName("li");
              for (i = 0; i < li.length; i++) {
                  a = li[i].getElementsByTagName("a")[0];
                  filterValue = a.textContent || a.innerText;
                  if (filterValue.toUpperCase().indexOf(filter) > -1) {
                      li[i].style.display = "";
                  } else {
                      li[i].style.display = "none";
                  }
              }
              bt.hidden = true;
            }
        }    
    
    </script>
    
    <script type='text/javascript'>
        $('img').bind('contextmenu', function(e){
            return false;
        });
    </script>
</html>

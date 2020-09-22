@extends('layout.master_frontend')

@section('content')



       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card-header card-header-image">
              <img class="img" src="{{asset('admin/assets_frontend/img/IMG_2166.jpg')}}" alt="First slide" style="height: 700px;object-fit:cover;opacity: 0.8;" width="100%">
              <div class="carousel-caption d-none d-md-block">
                 <!--  <h3>Kalbis Institute </h3> -->
                <p>...</p>
              </div>
            </div>
            </div>

            <div class="carousel-item">
              <div class="card-header card-header-image">
                <img class="img" src="{{asset('admin/assets/img/IMG_2148.jpg')}}" alt="Second slide" style="height: 700px;object-fit:cover; opacity: 0.8;" width="100%">
             
              <div class="carousel-caption d-none d-md-block">
                  <!-- <h3>Kalbis Institute </h3> -->
                <p>...</p>
              </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card-header card-header-image">
                <img class="img" src="{{asset('admin/assets_frontend/img/IMG_2173.jpg')}}" alt="Third slide slide" style="height: 700px;object-fit:cover;opacity: 0.8;" width="100%">
        
              <div class="carousel-caption d-none d-md-block">
                  <!-- <h3>Kalbis Institute </h3> -->
                <p>...</p>
              </div>
              </div>
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
            
          </div>
           <div class="card">
                <div class="container">
                    
                      <div class="card-title">
                       <h2 style="text-align: center;">Kegiatan Ormawa</h2>
                          <div class="row">
                              <div class="col-md-4">
                                <div class="card-header-image">
                                  <img class="d-block w-100" src="{{asset('gambar_keg.jpg')}}">
                                </div>
                              </div>
                              
                              <div class="col-md-4">
                                <div class="card-header-image">
                                  <img class="d-block w-100" style="max-height: 230px;" src="{{asset('gambar_keg1.jpg')}}">
                                </div>
                              </div>

                              <div class="col-md-4">
                                  <img class="d-block w-100" src="{{asset('gambar_keg2.jpg')}}">
                              </div>

                           </div>
                      </div>
                    </div>
          


          <div class="container">
           
              <h2 style="text-align: center;">Prestasi</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <img class="d-block w-100" src="{{asset('gambar_keg.jpg')}}">
                            <br>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <img class="d-block w-100" src="{{asset('gambar_keg2.jpg')}}">
                        </div>
                    </div>
                  </div>
          </div>
        

    

@endsection
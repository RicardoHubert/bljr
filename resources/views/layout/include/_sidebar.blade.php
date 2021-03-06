

<div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="/" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
              
            
            <!-- @if(auth()->user()->role == 'student')
            @else -->
           <!--  masukkin dalamnya  -->
            <!--  @endif -->
           @if(auth()->user()->role == 'Ormawa')
                        <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Ormawa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                              <ul class="nav">
                                <li><a href="{{action('OrmawaController@index')}}" class="">Ormawa</a></li>
                                <li><a href="{{action('KegiatanController@index')}}" class="">Kegiatan</a></li>
                                <li><a href="{{action('KegiatanController@data_anggota_ormawa_index')}}" class="">Input Data Kegiatan</a></li>
                              </ul>
                            </div>
                        </li>
            @elseif(auth()->user()->role == 'student')
                <li>
                <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Kalbiser</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages2" class="collapse ">
                  <ul class="nav">
                    <li><a href="{{action('KalbiserController@index')}}" class="">Data Saya</a></li>
                    <li><a href="{{action('KompetisiinternalController@index')}}"class="">Kompetisi</a></li>
                    <li><a href="{{action('SkpiController@index')}}"  class="">SKPI</a></li>
                  </ul>
                </div>
            </li>  
            @elseif(auth()->user()->role == 'admin')
              <li>
                  <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Ormawa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages" class="collapse ">
                    <ul class="nav">
                      <li><a href="{{action('OrmawaController@index')}}"class="">Data Ormawa</a></li>
                      <li><a href="{{action('KegiatanController@index')}}"class="">Data Kegiatan</a></li>
                      <li><a href="{{action('KegiatanController@data_anggota_ormawa_index')}}" class="">Input Data Kegiatan</a></li>
                      <li><a href="{{action('KegiatanController@tabelnosertif')}}" class="">Nomor E-Sertif</a></li>
                    </ul>
                  </div>
              </li>


              <li>
                <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Kalbiser</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages2" class="collapse ">
                  <ul class="nav">
                    <li><a href="{{action('KalbiserController@index')}}" class="">Data Kalbiser</a></li>
                    <li><a href="{{action('KompetisiinternalController@index')}}" class="">Kompetisi</a></li>
                    <li><a href="{{action('SkpiController@index')}}" class="">SKPI</a></li>
                  </ul>
                </div>
            </li>  
              
             <li>
                <a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Approval CSD</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages3" class="collapse ">
                  <ul class="nav">
                    <li><a href="{{action('KompetisiinternalController@approveindex')}}"class="">Approval Kompetisi</a></li>
                    <li><a href="{{action('KegiatanController@approveindex')}}"class="">Approval Kegiatan</a></li>
                    <li><a href="{{action('SkpiController@approveindex')}}"class="">Approval SKPI</a></li>

                  </ul>
                </div>
            </li>
            
            <li><a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Prodi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages4" class="collapse ">
                  <ul class="nav">
                  <li><a href="{{action('ProdiController@index')}}"class="">Data Prodi</a></li>
                  </ul>
                </div>
            </li>

            <li>
              <a href="#subPages5" data-toggle="collapse" class="collapsed">
                <i class="lnr lnr-users"></i> <span>Custom</span> 
                <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages5" class="collapse ">
                  <ul class="nav">
                    <li><a href="{{ route('background_images.index') }}" class="">Custom Background Frontend</a></li>
                  </ul>
                </div>
              </li>

             @elseif(auth()->user()->role == 'Prodi')
             <li>
                <a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Approval Prodi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages3" class="collapse ">
                  <ul class="nav">
                    
                    <li><a href="{{url('/approveprodi/')}}" class="">Approval SKPI</a></li>
                    
                  </ul>
                </div>
            </li>
            @elseif(auth()->user()->role == 'ao')
            <li><a href="{{action('KalbiserController@index')}}"class="">Data Kalbiser</a></li>
            <li><a href="{{action('SkpiController@index')}}"class="">SKPI</a></li>
            @endif

            <!-- <li><a href="/kalbiser" class=""><i class="lnr lnr-user"></i> <span>Data Kalbiser</span></a></li> -->
            <!-- @if(auth()->user()->role == 'admin' && 'student') -->
            <!-- <li><a href="/kompetisiinternal" class=""><i class="lnr lnr-user"></i> <span>Kompetisi Internal</span></a></li>

            <li><a href="/skpi" class=""><i class="lnr lnr-user"></i> <span>SKPI</span></a></li> -->
            
          <!--  @endif -->

            

          </ul>
        </nav>
      </div>
    </div>
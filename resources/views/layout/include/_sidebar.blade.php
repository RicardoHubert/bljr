

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
                                <li><a href="/ormawa" class="">Ormawa</a></li>
                                <li><a href="/kegiatan" class="">Kegiatan</a></li>
                                <li><a href="/kegiatan_anggota" class="">Anggota Ormawa</a></li>                              </ul>
                            </div>
                        </li>
            @elseif(auth()->user()->role == 'student')
                <li>
                <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Kalbiser</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages2" class="collapse ">
                  <ul class="nav">
                    <li><a href="/kalbiser" class="">Data Saya</a></li>
                    <li><a href="/kompetisiinternal" class="">Kompetisi</a></li>
                    <li><a href="/skpi" class="">SKPI</a></li>
                  </ul>
                </div>
            </li>  
            @elseif(auth()->user()->role == 'admin')
              <li>
                  <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Ormawa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages" class="collapse ">
                    <ul class="nav">
                      <li><a href="/ormawa" class="">Data Ormawa</a></li>
                      <li><a href="/kegiatan" class="">Data Kegiatan</a></li>
                      <li><a href="/kegiatan_anggota" class="">Anggota Ormawa</a></li>
                    </ul>
                  </div>
              </li>

              <li>
                <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Kalbiser</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages2" class="collapse ">
                  <ul class="nav">
                    <li><a href="/kalbiser" class="">Data Kalbiser</a></li>
                    <li><a href="/kompetisiinternal" class="">Kompetisi</a></li>
                    <li><a href="/skpi" class="">SKPI</a></li>
                  </ul>
                </div>
            </li>  
              
             <li>
                <a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Approval CSD</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                <div id="subPages3" class="collapse ">
                  <ul class="nav">
                    <li><a href="/approvekompetisi" class="">Approval Kompetisi</a></li>
                    <li><a href="/approvekegiatan" class="">Approval Kegiatan</a></li>
                    <li><a href="/approveskpi" class="">Approval SKPI</a></li>

                  </ul>
                </div>
            </li>
            @endif

						<!-- <li><a href="/kalbiser" class=""><i class="lnr lnr-user"></i> <span>Data Kalbiser</span></a></li> -->
						<!-- @if(auth()->user()->role == 'admin' && 'student') -->
						<!-- <li><a href="/kompetisiinternal" class=""><i class="lnr lnr-user"></i> <span>Kompetisi Internal</span></a></li>

						<li><a href="/skpi" class=""><i class="lnr lnr-user"></i> <span>SKPI</span></a></li> -->
						
					<!-- 	@endif -->

            

					</ul>
				</nav>
			</div>
		</div>
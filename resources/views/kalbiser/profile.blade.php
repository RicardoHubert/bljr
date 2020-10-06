@extends('layout.master')

@section('content')
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
									<!-- 	 -->
										<h3 class="name">{{$kalbiser->nama}}</h3>

									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Personal Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Nama <span>{{$kalbiser->nama}}</span></li>
											<li>Nim <span>{{$kalbiser->nim}}</span></li>
											<li>Prodi <span>{{$kalbiser->prodi}}</span></li>
											<li>Email <span>{{$kalbiser->email}}</a></span></li>
										</ul>
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Document SKPI <span class="badge"></span></a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left2">
											<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Judul Sertifikat</th>
														<th>Tanggal Dokumen</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>

													@foreach ($kalbiser->skpi->all() as $skpi)
                                                        <tr>
                                                            <td>{{$skpi->judul_sertifikat}}</td>
                                                            <td>{{$skpi->tanggal_dokumen}}</td>
                                                            <td>
                                                                <span class="alert alert-{{$skpi->status == null ? 'warning' : 'success'}}">
                                                                    {{$skpi->status == null ? "Belum" : "Sudah"}} Diapprove
                                                                </span>
                                                            </td>
                                                        </tr>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="margin-top-30 text-center">
                                            <a href="{{$kalbiser->skpi()->count("status", "<>", null) > 0 ? route('skpi.printlist', ['id' => $kalbiser->id]) : '#'}}" class="btn btn-primary btn-md" >Download File Word</a>
										</div>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>

@stop

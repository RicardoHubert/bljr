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

													@foreach ($dokumenkalbiser as $dokumenkalbiser)
													@foreach ($Skpi as $skpi)
														@if($dokumenkalbiser->kalbiser_id == $kalbiser->user_id && $dokumenkalbiser->skpi_id == $skpi->id)
													<tr>												
														<td>{{$skpi->judul_sertifikat}}</td>
														<td>{{$skpi->tanggal_dokumen}}</td>
														<td>@if($skpi->status == '0' || $skpi->status == null)
															<span class="badge badge-danger">Belum Di Approve</span>
														@elseif($skpi->status == '1')
															<span class="badge badge-success">Sudah Di Approve</span>
														@endif

													</td>

													
<!-- 														<td>Spot Media</td>
														<td><span class="label label-success">ACTIVE</span></td> -->
													</tr>
													@endif
													@endforeach
													@endforeach 	
												</tbody>
											</table>
										</div>
											<form action="/kalbiser/profile/{id}/downloadword" method="POST">
											@csrf
										<div class="margin-top-30 text-center">
										<button type="submit" class="btn btn-primary btn-md">Download File Word</button>
										</div>
										</form>
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
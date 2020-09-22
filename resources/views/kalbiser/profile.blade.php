@extends('layout.master')

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="row">
								<div class="col-md-2">

								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img class="img-circle" alt="FOTO KALBISER" src="" style="max-height: 200px; max-width: 150px;">
										<h3 class="name">Ricardo</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-12 stat-item">
												Jumlah Dokumen<span>23</span>
											</div>
									
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Kalbiser</h4> 
										<ul class="list-unstyled list-justify">
											<li>Nama	:</li>
											<li>Ricardo Hubert</li>
											<li>Nim		:</li>
											<li>2017103655</li>
											<li>No Hp	:</li>
											<li>081511035069</li>
											<li>Email	:</li> 
											<li>ricardohub681@gmail.com</li>										
										</ul>
									</div>
									
									<div class="text-center"><a class="btn btn-warningf" href="">Edit Profile</a></div>
								</div>
								</div>
								<!-- END PROFILE DETAIL -->
							
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							
								<div class="col-md-10">		
							<!-- BORDERED TABLE -->
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">Dokumen yang dimiliki</h3>
										</div>
										<div class="panel-body">
											<table class="table table-bordered">
												<thead>
													<tr>													
														<th>Nama Dokumen</th>
														<th>Jenis Dokumen</th>
														<th>Deskripsi Dokumen</th>
														<th>File Unggah</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														
														<td>International Speech Competition</td>
														<td>Sertifikat</td>
														<td></td>
														<td></td>
														<td><button class="btn btn-warning">edit</button>
														<button class="btn btn-danger">Delete</button>
														</td>
													</tr>
													<tr>
														
														<td>Bisnis Planku</td>
														<td>Proposal</td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														
														<td>Bisnis Plannya</td>
														<td>SK</td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
							
							<!-- END BORDERED TABLE -->
						
								</div>
								
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
		</div>
			<!-- END MAIN CONTENT -->
	</div>

@stop
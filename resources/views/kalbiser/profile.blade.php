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
									<div class="profile-main" style="background-image: url('{{asset('fotokalbiser/'. $kalbiser->foto) }}'); height: 250px; max-height: 100%; width: 100%">
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-12 stat-item">
												{{$kalbiser->nama}}
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail" style="background-color: white">
									<div class="profile-info">
										<h4 class="heading">Personal Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Nama <span>{{$kalbiser->nama}}</span></li>
											<li>NIM <span>{{$kalbiser->nim}}</span></li>
											<li>Program Studi <span>{{$kalbiser->prodi}}</span></li>
											<li>Student Email <span>{{$kalbiser->email}}</a></span></li>
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
											<table class="table project-table data">
												<thead>
													<tr>
														<th>Judul Sertifikat</th>
														<th>Tanggal Dokumen</th>
														<th>Status</th>
														@if(auth()->user()->role == 'admin' || auth()->user()->role == 'Prodi' || auth()->user()->role == 'Ormawa')
														<th>Aksi</th>
														<th>Approved/Disapproved by</th>
														@elseif(auth()->user()->role == 'ao' || auth()->user()->role == 'student' )
														<th>Approved/Disapproved by</th>
														@endif
													</tr>
												</thead>
												<tbody>

													@foreach ($kalbiser->skpi->all() as $skpi)
                                                        <tr>
                                                            <td>{{$skpi->judul_sertifikat}}</td>
                                                            <td>{{$skpi->tanggal_dokumen}}</td>

                                                            <td>

                                                                <span class="alert-{{$skpi->status == null || $skpi->status == 0 ? 'warning' : 'success'}}">
                                                                    {{$skpi->status == null || $skpi->status == 0 ? "Belum" : "Sudah"}} Diapprove
                                                                </span>
	                                                            </td>
	                                                           @if(auth()->user()->role == 'admin' || auth()->user()->role == 'Prodi' || auth()->user()->role == 'Ormawa')
	                                                         <td>@if($skpi->status != '1')
																<a href="/approveskpi/{{$skpi->id}}" class="btn btn-sm btn-warning">approve</a>
															@else
																<a href="/approveskpi2/{{$skpi->id}}" class="btn btn-sm btn-danger">disapprove</a>
															@endif
															@endif
															</td>
															<td>
															@foreach($users as $user)
																@if($skpi->approvedby == $user->id)
																	{{$user->name}}
																@endif
															@endforeach
															</td>
                                                        </tr>
													@endforeach
												</tbody>
												<tfoot>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
												</tfoot>
											</table>
										</div>
										@if(auth()->user()->role != 'student')
										<div class="margin-top-30 text-center">
                                            <a href="{{$kalbiser->skpi()->count("status", "<>", null) > 0 ? route('skpi.printlist', ['id' => $kalbiser->id]) : '#'}}" class="btn btn-primary btn-md" >Download File Word</a>
										</div>
										@endif
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

	<script type="text/javascript">
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
    	$('.data tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

		});

		  var table = $('.data').DataTable( {
         "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]]
    	} );

		 $(".data tfoot input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    	});
	});
	</script>
@stop

@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Kegiatan Ormawa</h3>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
							<div class="panel-body">
								<div class="table-responsive">
								<table class="table table-hover data">
									<thead>
											<tr>
												<th>Poster</th>
												<th>Nama Kegiatan</th>
												<th>Ormawa</th>
												<th>Deskripsi Kegiatan</th>
												<th>Tanggal Kegiatan</th>
												<th>Status</th>
												<th>Aksi {{auth()->user()->id}}</th>
												
											</tr>
									</thead>
									<tbody>
											@foreach($data_kegiatan as $kegiatan)	
												@foreach($data_ormawa as $ormawa)
													@if($ormawa->user_id == auth()->user()->id && $kegiatan->ormawa_id == $ormawa->id || auth()->user()->role == 'admin' && $kegiatan->ormawa_id == $ormawa->id)
													<tr>
														<td><img style="height: 50px;" src="posterkegiatan/{{$kegiatan->poster}}" /></td>
														<td>{{$kegiatan->nama_kegiatan}}</td>
														<td>
																{{$ormawa->nama_ormawa}}
														</td>

														<td>{{$kegiatan->deskripsi_kegiatan}}</td>
														<td>{{$kegiatan->tanggal_kegiatan}}</td>
														<td>@if($kegiatan->status == '0' || $kegiatan->status == null)
															<span class="badge badge-danger">blm di approve</span>
														@else
															<span class="badge badge-success">approve</span>
														@endif
														
													</td>

													<td>
													@if($kegiatan->status != '1')
														<a href="/approvekegiatan/{{$kegiatan->id}}" class="btn btn-sm btn-warning">approve</a>
													@else
														<span>Sudah di approve</span>
													@endif
													</td>
													</tr>
													@endif
												@endforeach
											@endforeach
									</tbody>
								</table>
							</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script type="text/javascript">
	$(document).ready(function() {
	$('.data').DataTable();
	});
	</script>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Input Data Kegiatan</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <div class="modal-body">
				      		<form action="/kegiatan/create" method="POST" enctype="multipart/form-data">
				      			{{csrf_field()}}
				      		

				      		<div class="form-group">
							    <label for="exampleInputEmail1">Nama Ormawa</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="ormawa_id">
							      <option value="">"------Pilih-------"</option>
							      @foreach($data_ormawa as $ormawa)
							      <option value="{{$ormawa->id}}">{{$ormawa->nama_ormawa}}</option>
							      @endforeach
							    </select>
							 </div>

				      		 <div class="form-group">
							    <label for="exampleInputEmail1">Poster</label>
							    <input type="file" name="poster" class="form-control" >
							  </div>	

							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama Kegiatan</label>
							    <input type="text" name="nama_kegiatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							  </div>

							   <div class="form-group">
							    <label for="exampleModalleInputEmail1">Deskripsi Kegiatan</label>
							    <textarea id="konten" class="form-control" name="deskripsi_kegiatan" rows="10" cols="50"></textarea>	
							   </div>
							   
							  <div class="form-group">
							    <label for="exampleInputEmail1">Tanggal Kegiatan</label>
							    <input type="date" name="tanggal_kegiatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							    <input type="hidden" name="status" value="0">
							  </div>

				      </div>

				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="" class="btn btn-success"> Request to Admin</a>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
				<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
					<script>
 						var konten = document.getElementById("konten");
    					CKEDITOR.replace(konten,{language:'en-gb'});
 						CKEDITOR.config.allowedContent = true;
 					</script>		
@stop
@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Kompetisi</h3>
								
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i> Create New Kompetisi 	</button>
									</div>
								</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-hover data">

											<thead>
												<tr>	
													<th>Poster Kompetisi</th>
													<th>Ormawa</th>
													<th>Program Studi</th>
													<th>Nama Mahasiswa</th>
													<th>NIM</th>
													<th>Nama kompetisi</th>
													<th>Jenis Kompetisi</th>		
													<th>URL</th>
													<th>Judul Sertifikat</th>
													<th>File Unggah</th>
													<th>Skala</th>
													<th>Pencapaian</th>
													<th>Nama Kegiatan</th>
													<th>Tanggal Kegiatan</th>
													<th>Penyelenggara</th>
													<th>status</th>
													<th>Aksi</th>
												
												</tr>
										</thead>
										<tbody>
											
												@foreach($kompetisiinternals as $kompetisiinternal)	
												@foreach($kalbisers as $kalbiser)
												@foreach($ormawas as $ormawa)
													@if($kalbiser->user_id == auth()->user()->id && $kompetisiinternal->user_id == $kalbiser->user_id && $kompetisiinternal->ormawa_id == $ormawa->id || auth()->user()->role == 'admin' && $kompetisiinternal->user_id == $kalbiser->user_id && $kompetisiinternal->ormawa_id == $ormawa->id )

													
												<tr>
													<td><img style="height: 50px;" src="posterkompetisi/{{$kompetisiinternal->poster}}" /></td>
													<td>{{$ormawa->nama_ormawa}}</td>
													<td>{{$kalbiser->prodi}}</td>
													<td>{{$kalbiser->nama}}</td>
													<td>{{$kalbiser->nim}}</td>
													<td>{{$kompetisiinternal->nama_kompetisi}}</td>
													<td>{{$kompetisiinternal->jenis_kompetisi}}</td>
													<td>{{$kompetisiinternal->url}}</td>
													<td>{{$kompetisiinternal->sertifikat}}</td>
													<td><img style="height: 50px;" src="file_sertifikat/{{$kompetisiinternal->file_sertifikat}}" /></td>
													<td>{{$kompetisiinternal->skala}}</td>
													<td>{{$kompetisiinternal->pencapaian}}</td>
													<td>{{$kompetisiinternal->nama_kegiatan}}</td>
													<td>{{$kompetisiinternal->tanggal_kegiatan}}</td>
													<td>{{$kompetisiinternal->penyelenggara}}</td>
													<td>@if($kompetisiinternal->status == '0' || $kompetisiinternal->status == null)
															<span class="badge badge-danger">Belum Di Approve</span>
														@else
															<span class="badge badge-success">Sudah Di Approved</span>
														@endif
														
													</td>


													<td>
													@if(auth()->user()->role == 'admin'|| auth()->user()->role == 'student' && $kalbiser->user_id == auth()->user()->id)
														<a href="/kompetisiinternal/{{$kompetisiinternal->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
														<a href="/kompetisiinternal/{{$kompetisiinternal->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Jika data ini dihapus maka dapat menghilangkan seluruh kompetisiinternal didalamnya, Apakah anda yakin ingin menghapus data ini??')">Delete</a>
													@endif
													</td>
												</tr>
													@endif
													@endforeach
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
				        <h5 class="modal-title" id="exampleModalLabel">Input Data kompetisi</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      		<form action="/kompetisiinternal/create" method="POST" enctype="multipart/form-data">
				      			{{csrf_field()}}

				      		 <div class="form-group">
							    <label for="exampleInputEmail1">Poster Kompetisi</label>
							    <input type="file" name="poster" class="form-control" >
							  </div>	

							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama kompetisi</label>
							    <input type="text" name="nama_kompetisi" class="form-control" aria-describedby="emailHelp">
							  </div>

 							 <div class="form-group">
							   <label for="exampleInputEmail1">Nama Mahasiswa</label>
							    <select class="form-control" id="mySelect2" name="user_id">
							      <option value="">"------Pilih-------"</option>

									@foreach($kalbisers as $kalbiser)
									@if($kalbiser->user_id == auth()->user()->id|| auth()->user()->role == 'admin')
							      <option value="{{$kalbiser->user_id}}">{{$kalbiser->nama}} <span>{{$kalbiser->nim}}</span></option>

							      	@endif
							     	@endforeach
							     </select>
							 </div>

							 <div class="form-group">
							    <label for="exampleInputEmail1">Nama Ormawa</label>
							    <select class="form-control" name="ormawa_id">
							      <option value="">"------Pilih-------"</option>
							      @foreach($ormawas as $ormawa)
							      <option value="{{$ormawa->id}}">{{$ormawa->nama_ormawa}}</option>
							      @endforeach
							    </select>
							 </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Jenis kompetisi</label>
							    <select class="form-control" name="jenis_kompetisi">
							      <option value="">"------Pilih Jenis kompetisi-------"</option>
							      <option value="Internal">Internal</option>
							      <option value="Eksternal">Eksternal</option>
							    </select>
							 </div>

							   <div class="form-group">
							    <label for="exampleInputEmail1">URL</label>
							    <input type="text" name="url" class="form-control">	  
							</div>

							<div class="form-group">
							    <label for="exampleInputEmail1">Judul Sertifikat</label>
							    <input type="text" name="sertifikat" class="form-control" aria-describedby="emailHelp">
							 </div>


				      		 <div class="form-group">
							    <label for="exampleInputEmail1">File Unggah Sertifikat</label>
							    <input type="file" name="file_sertifikat" class="form-control" >
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Skala</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="skala">
							      <option value="">"------Pilih skala-------"</option>
							      <option value="Wilayah">Wilayah</option>
							      <option value="Nasional">Nasional</option>
							      <option value="Internasional">Internasional</option>
							    </select>
							 </div>

							 <div class="form-group">
							    <label for="exampleInputEmail1">Pencapaian</label>
							    <input type="text" name="pencapaian" class="form-control" aria-describedby="emailHelp">
							 </div>

							<div class="form-group">
							    <label for="exampleInputEmail1">Nama Kegiatan</label>
							    <input type="text" name="nama_kegiatan" class="form-control" aria-describedby="emailHelp">
							 </div>

							 <div class="form-group">
							    <label for="exampleInputEmail1">Tanggal Kegiatan</label>
							    <input type="date" name="tanggal_kegiatan" class="form-control" aria-describedby="emailHelp">
							 </div>

							 <div class="form-group">
							    <label for="exampleInputEmail1">Penyelenggara</label>
							    <input type="text" name="penyelenggara" class="form-control" aria-describedby="emailHelp">
							 </div>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
						
						</form>
				      </div>
				    </div>
				  </div>
				</div>
					

					<script>
 	$(document).ready(function() {
    $('mySelect2').select2();
    dropdownParent: $('#exampleModal')
	});

 					</script>		
@stop
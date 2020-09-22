@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Kalbiser</h3>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
							<div class="panel-body">
									 <table class="table table-hover data">
									 	<thead>
												<tr>
													<th>Foto</th>
													<th>Nama</th>
													<th>Nim</th>
													<th>Prodi</th>
													<th>Tahun Akademik</th>
													<th>Aksi</th>
												</tr>
										</thead>
										<tbody>
												@foreach($data_kalbiser as $kalbiser)	
							      				@if($kalbiser->user_id == auth()->user()->id || auth()->user()->role == 'admin')
												<tr>
													<td><img style="height: 50px;" src="fotokalbiser/{{$kalbiser->foto}}"></a></td>						
													<td><a href="/kalbiser/{{$kalbiser->id}}/profile">{{$kalbiser->nama}}</td></a>
													<td>{{$kalbiser->nim}}</td>
													<td>{{$kalbiser->prodi}}</td>
													<td>{{$kalbiser->tahun_akademik}}</td>
													
													<td>
														<a href="/kalbiser/{{$kalbiser->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
														<a href="/kalbiser/{{$kalbiser->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Jika data ini dihapus maka dapat menghilangkan seluruh kegiatan didalamnya, Apakah anda yakin ingin menghapus data ini??')">Delete</a>
													</td>
												
												</tr>
												@endif
												
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

	<script type="text/javascript">
	$(document).ready(function() {
	$('.data').DataTable();
	});
	</script>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Input Data </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      		<form action="/kalbiser/create" method="POST" enctype="multipart/form-data">
				      			{{csrf_field()}}

				      		 <div class="form-group">
							    <label for="exampleInputEmail1">Foto</label>
							    <input type="file" name="foto" class="form-control">
							  </div>	

							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama Kalbiser</label>
							    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kalbiser">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">NIM</label>
							    <input type="text" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Ormawa</label>
							    <input type="text" name="ormawa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ormawa">
							  </div>

							<div class="form-group">
							    <label for="exampleInputEmail1">Prodi</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="prodi">
							      <option value="">"------Pilih Prodi-------"</option>
							      <option value="Informatika">Informatika</option>
							      <option value="Managemen">Managemen</option>
							      <option value="Akuntansi">Akuntansi</option>
							      <option value="SI">Sistem Informasi</option>
							      <option value="DKVq">Desain Komunikasi Visual</option>
							    </select>
							 </div>

							 <div class="form-group">
							    <label for="exampleInputEmail1">Tahun Akademik</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="tahun_akademik">
							      <option value="">"------Pilih Tahun Akademik-------"</option>
							      <option value="2017">2017</option>
							      <option value="2018">2018</option>
							      <option value="2019">2019</option>
							      <option value="2020">2020</option>
							      <option value="2021">2021</option>
							    </select>
							 </div>
  

							    <div class="form-group">
							    <label for="exampleInputEmail1">No.Hp</label>
							    <input type="text" name="nohp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NO.Handphone">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Email</label>
							    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
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
	@stop
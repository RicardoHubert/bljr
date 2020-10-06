@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Ormawa</h3>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>Create New Kegiatan</button>
									</div>
								</div>
							<div class="panel-body">
									 <table class="table table-hover data">
									 	<thead>
												<tr>
													<th>Logo Ormawa</th>
													<th>Nama Ormawa</th>
													<th>Kategori Ormawa</th>
													<th>Visi</th>
													<th>Misi</th>
													<th>Email</th>		
													<th>Aksi</th>
												</tr>
										</thead>
										<tbody>
												@foreach($data_ormawa as $ormawa)
												<tr>						
													<td><img style="height: 50px;" src="logo/{{$ormawa->logo_ormawa}}"/><a href="/ormawa/{{$ormawa->id}}/profile"></a></td>
													<td><a href="/ormawa/{{$ormawa->id}}/profile">{{$ormawa->nama_ormawa}}</td></a>
													<td>{{$ormawa->kategori_ormawa}}</td>
													<td>{{$ormawa->visi}}</td>
													<td>{{$ormawa->misi}}</td>
													<td>{{$ormawa->email}}</td>
													@if(auth()->user()->role == 'admin')
													<td>
														<a href="/ormawa/{{$ormawa->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
														<a href="/ormawa/{{$ormawa->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Jika data ini dihapus maka dapat menghilangkan seluruh kegiatan didalamnya, Apakah anda yakin ingin menghapus data ini??')">Delete</a>
													</td>
													@endif
												</tr>
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
				        <h5 class="modal-title" id="exampleModalLabel">Input Data Ormawa</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      		<form action="/ormawa/create" method="POST" enctype="multipart/form-data">
				      			{{csrf_field()}}

				      		 <div class="form-group">
							    <label for="exampleInputEmail1">Logo Ormawa</label>
							    <input type="file" name="logo_ormawa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Logo Ormawa">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Background Ormawa</label>
							    <input type="file" name="bg_ormawa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Background Ormawa">
							  </div>	

							  <div class="form-group">
							  
							    <input type="hidden" name="user_id" value="Ormawa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama Ormawa</label>
							    <input type="text" name="nama_ormawa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ormawa">
							  </div>

							   <div class="form-group">
							    <label for="exampleInputEmail1">Kategori Ormawa</label>
							    <input type="text" name="kategori_ormawa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kategori Ormawa">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Visi</label>
							    <input type="text" name="visi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Visi">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Misi</label>
							    <input type="text" name="misi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Misi">
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


@endsection
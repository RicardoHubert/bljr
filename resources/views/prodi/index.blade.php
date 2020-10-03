@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Prodi</h3>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
							<div class="panel-body">
									 <table class="table table-hover data">
									 	<thead>
												<tr>
													<th>Nama Prodi</th>
													<th>Email</th>
												</tr>
										</thead>
										<tbody>
												@foreach($data as $prodi)
												<tr>						
													<td>{{$prodi->nama_prodi}}</td>
													<td>{{$prodi->user->email}}</td>
													@if(auth()->user()->role == 'admin')
													<td>
														<a href="/prodi/{{$prodi->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
														<a href="/prodi/{{$prodi->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Jika data ini dihapus maka dapat menghilangkan seluruh kegiatan didalamnya, Apakah anda yakin ingin menghapus data ini??')">Delete</a>
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
				      		<form action="/prodi/create" method="POST" enctype="multipart/form-data">
				      			{{csrf_field()}}

							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama Prodi</label>
							    <input type="text" name="nama_prodi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Prodi">
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
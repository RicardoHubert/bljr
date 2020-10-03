@extends('layout.master')

@section('content')
<div class="main">
	<div class="main-control">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						<h3 class="panel-title">Edit Data Prodi</h3>
						</div>
						<div class="panel-body">
							<form action="/prodi/{{$prodi->id}}/update" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="form-group">
						<label for="exampleInputEmail1">Nama Prodi</label>
						<input type="text" name="nama_prodi" value="{{$prodi->nama_prodi}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
						</div>

						<div class="form-group">
							<input type="hidden" name="email" class="form-control" id="exampleInputEmail1" value="{{$prodi->user->email}}" aria-describedby="emailHelp" placeholder="Email">
						</div>

							<button type="submit" class="btn btn-warning">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
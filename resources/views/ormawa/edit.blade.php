@extends('layout.master')

@section('content')
<div class="main">
	<div class="main-control">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						<h3 class="panel-title">Edit Data Ormawa</h3>
						</div>
						<div class="panel-body">
							<form action="/ormawa/{{$ormawa->id}}/update" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="form-group">
						<label for="exampleInputEmail1">Logo Ormawa</label>
						<input type="file" name="logo_ormawa" value="{{$ormawa->logo_ormawa}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">Nama Ormawa</label>
						<input type="text" name="nama_ormawa" value="{{$ormawa->nama_ormawa}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Kategori Ormawa</label>
							<input type="text" name="kategori_ormawa" value="{{$ormawa->kategori_ormawa}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kategori Ormawa">
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Visi</label>
							<input type="text" name="visi" class="form-control" id="exampleInputEmail1" value="{{$ormawa->visi}}" aria-describedby="emailHelp" placeholder="Visi">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Misi</label>
							<input type="text" name="misi" class="form-control" id="exampleInputEmail1" value="{{$ormawa->misi}}" aria-describedby="emailHelp" placeholder="Misi">
						</div>

						<div class="form-group">
							<input type="hidden" name="email" class="form-control" id="exampleInputEmail1" value="{{$ormawa->email}}" aria-describedby="emailHelp" placeholder="Email">
						</div>

						<div class="form-group">
							<input type="hidden" name="password" class="form-control" id="exampleInputEmail1" value="{{$ormawa->password}}" aria-describedby="emailHelp" placeholder="Password">
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
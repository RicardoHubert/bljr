@extends('layout.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
<!-- 									<div class="left">
										<form method="Get" action="/kegiatan">
										<label for="nama_ormawa">Program Studi</label>
										<input type="search" name="cari">
										<button class="btn btn-outline-success my-2 my-sm-0" type="submit">search</button>
										</form>
									</div> -->
									<h5 class="panel-title" id="exampleModalLabel">Input Data Kegiatan</h5>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>Create New</button> 

									</div>

								</div>
								
								

				      <div class="modal-body">
				      		<form enctype="multipart/form-data">

				      		<div class="form-group">
							    <label for="exampleInputEmail1">Nama Ormawa</label>
							    <select class="form-control select2" id="exampleFormControlSelect1" name="ormawa_id">
							      <option value="">"------Pilih-------"</option>
							      @foreach($ormawas as $ormawa)
							      <option value="{{$ormawa->id}}" {{ request('ormawa_id') == $ormawa->id ? 'selected' : null }}>{{$ormawa->nama_ormawa}}</option>
							      @endforeach
							    </select>
							 </div>
							 <button>check</button>

							@if(request('ormawa_id'))
				      		<div class="form-group">
							    <label for="exampleInputEmail1">Nama Kegiatan</label>
							    <select class="form-control select2" id="exampleFormControlSelect1" name="kegiatan_id">
							      <option value="">"------Pilih-------"</option>
							      @foreach($kegiatan_anggotas as $kegiatan)
							      <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan }}</option>
							      @endforeach
							    </select>
							 </div>

				      		<div class="form-group">
							    <label for="exampleInputEmail1">Nama Mahasiswa</label>
							    <select class="form-control select2" id="exampleFormControlSelect1" name="kalbiser_id">
							      <option value="">"------Pilih-------"</option>
							      @foreach($users as $user)
							      <option value="{{ $user->id }}">{{ $user->nama }} - {{ $user->nim }}		</option>
							      @endforeach
							    </select>
							 </div>

							 <div class="form-group">
							    <label for="exampleInputEmail1">Jenis Dokumen</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="jenis_dokumen">
							      <option value="">"------Pilih-------"</option>
							      <option value="jkk">JKK</option>
							      <option value="seminar">Seminar</option>
							      <option value="piagam">Piagam</option>
							      <option value="kompetisi eksternal">Kompetisi Eksternal</option>
							    </select>
							</div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Tanggal Dokumen</label>
							    <input type="text" name="tanggal_dokumen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="dd/mm/yyyy">
							  </div>

							   <div class="form-group">
							    <label for="exampleInputEmail1">Tahun Dokumen</label>
							    <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Dokumen">
							    Sesuai dengan tanggal dokumen
							  </div>

							 @endif


				      </div>

				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						<button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
						
						</form>
				      </div>
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

	$(document).ready(function() {
	    $('.select2').select2();
	});
	</script>
@endsection
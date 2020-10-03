@extends('layout.master')

@section('content')

<div class="main">
	<div class="main-control">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						<h3 class="panel-title">Edit Data Skpi</h3>

						</div>
						<div class="panel-body">
							<form action="/skpi/{{$data_skpi->id}}/update" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

							
				      		  <div class="form-group">
							   <label for="exampleInputEmail1">Nama Mahasiswa</label>
							    <select class="form-control select2" id="exampleFormControlSelect1" name="user_id">
							      <option value="">"------Pilih-------"</option>

									@foreach($data_kalbiser as $kalbiser)
									@if($kalbiser->user_id == auth()->user()->id|| auth()->user()->role == 'admin')
							      <option value="{{$kalbiser->user_id}}">{{$kalbiser->nama}} <span>{{$kalbiser->nim}}</span></option>

							      	@endif
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
								<input readonly type="text" name="tanggal_dokumen" class="form-control datepicker date" id="tanggaldokumen" aria-describedby="emailHelp" placeholder="dd/mm/yyyy" />
						</div>

						<div class="form-group">
							    <label for="exampleInputEmail1">Tahun Dokumen</label>
							    <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Dokumen">
							    Sesuai dengan tanggal dokumen
						</div>

						<div class="form-group">
							    <label for="exampleInputEmail1">Judul Sertifikat</label>
							    <input type="text" name="judul_sertifikat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{$data_skpi->judul_sertifikat}}">
							  </div>

						<div class="form-group">
							    <label for="exampleInputEmail1">Penyelenggara</label>
							    <input type="text" name="penyelenggara" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{$data_skpi->penyelenggara}}">
						</div>

					

					 <input type="hidden" name="status" value="0">
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
    	$('.select2').select2();
		});

		$(".datepicker.date").datepicker({
			dateFormat: "yy-mm-dd"
		});

</script>
@stop
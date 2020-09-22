
@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">SKPI</h3>
									<div class="left">
										<input type="checkbox" onclick="toggle(this);" />Select All

										<form action="/approveskpiall" id="form">
												<button type="submit" class="button btn-xl" style="background-color: yellow;" value="Approve All">Approve All</button>
										</form>
									</div>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
							<div class="panel-body">
									 <table class="table table-hover data">
									 	<thead>
												<tr>
													<th></th>
													<th>Gambar</th>
													<th>Nim</th>
													<th>Nama Mahasiswa</th>	
													<th>Prodi</th>					
													<th>Jenis Dokumen</th>
													<th>Tanggal Dokumen</th>
													<th>Judul Sertifikat</th>
													<th>Status</th>		
											</tr>
										</thead>
										<tbody>


												<tr>										
												@foreach($data_skpi as $skpi)
												@foreach($data_kalbiser as $kalbiser)
														@if($kalbiser->user_id == $skpi->user_id && $skpi->user_id == auth()->user()->id || auth()->user()->role == 'admin' && $kalbiser->user_id == $skpi->user_id)	
															<td>
																<input form="form" type="checkbox" name="approveId[]" value="{{ $skpi->id }}">
															</td>
															<td><img style="height: 50px;" src="fileskpi/{{$skpi->file_skpi}}" /></td>
														
															<td>{{$kalbiser->nim}}</td>
															<td>{{$kalbiser->nama}}</td>
															<td>{{$kalbiser->prodi}}</td>
														


													<td>{{$skpi->jenis_dokumen}}</td>
													<td>{{$skpi->tanggal_dokumen}}</th>
													<th>{{$skpi->judul_sertifikat}}</th>
													<td>
													@if($skpi->status != '1')
														<a href="/approveskpi/{{$skpi->id}}" class="btn btn-sm btn-warning">approve</a>
													@else
														<span>Sudah di approve</span>
													@endif
													</td>
													</tr>
													
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
	
	<script type="text/javascript">
	$(document).ready(function() {
	$('.data').DataTable();
	});
	</script>






	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Input Data SKPI</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      		<form action="/skpi/create" method="POST" enctype="multipart/form-data">
				      			{{csrf_field()}}

				      		  <div class="form-group">
							    <label for="exampleInputEmail1">File Unggah</label>
							    <input type="file" name="file_skpi" class="form-control" >
							  </div>

				      		  <div class="form-group">									   	
							   <label for="exampleInputEmail1">Nama Mahasiswa</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="user_id">
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
							    <input type="text" name="tanggal_dokumen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="dd/mm/yyyy">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Judul Sertifikat</label>
							    <input type="text" name="judul_sertifikat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
							  </div>
<!-- 					  <br>
					  	<div class="form-check form-check-inline">
						  <input class="form-check-input " type="radio" name="kegiatan_id" id="kegiatan_radio" value="kegiatan">
						  <label class="form-check-labl" for="inlineRadio1">Kegiatan</label>
						  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						  <input class="form-check-input " type="radio" name="kegiatan_id" id="kompetisi_radio" value="kompetisi">
						  <label class="form-check-label" for="inlineRadio1">Kompetisi</label>
						</div>
						<br> -->

						
<!-- 
					  <div class="form-group kegiatan_radio_hasil">
				
					    	<label for="exampleInputEmail1">Kegiatan</label>
							     <select class="form-control" id="exampleFormControlSelect1" name="kegiatan_id">
							      <option value="">"------Pilih-------"</option>
							      <option value="">tess</option>
							    </select>
					    
					  </div>

  					  <div class="form-group kompetisi_radio_hasil">
				
					    	<label for="exampleInputEmail1">Kompetisi</label>
							     <select class="form-control" id="exampleFormControlSelect1" name="kompetisi_id">
							      <option value="">"------Pilih-------"</option>
							      <option value="">tes</option>
							    </select>
					    
					  </div> -->
					

				
					  <input type="hidden" name="status" value="0">
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>




			


<script>
	function toggle(source) {
	    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
	    for (var i = 0; i < checkboxes.length; i++) {
	        if (checkboxes[i] != source)
	            checkboxes[i].checked = source.checked;
	    }
	}

	$(document).ready(function(){
		$('#search_text').keyup(function(){
			var txt = $(this).val();
			if(txt != '')
			{

			}
			else{
				$('#result').html('');
				$.ajax({
					url:'index',
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data){
						$('#result').html(data);
					}
				});
			}
		});
	});
</script>
@stop
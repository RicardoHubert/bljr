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
									</div>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
							<div class="panel-body">
								<div class="table-responsive">
									 <table class="table table-hover data" id="tableexcel">
									 	<thead>
												<tr>
													<th>Gambar</th>
													<th>Nim</th>
													<th>Nama Mahasiswa</th>
													<th>Prodi</th>
													<th>Jenis Dokumen</th>
													<th>Tanggal Dokumen</th>
													<th>Tahun Dokumen</th>
													<th>Judul Sertifikat</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
										</thead>
										<tbody>


												<tr>
												@foreach($data_skpi as $skpi)
												@foreach($data_kalbiser as $kalbiser)
														@if($kalbiser->user_id == $skpi->user_id && $skpi->user_id == auth()->user()->id || auth()->user()->role == 'admin' && $kalbiser->user_id == $skpi->user_id)
												<td><img style="height: 50px;" src="{{$skpi->file_skpi}}" /></td>

															<td>{{$kalbiser->nim}}</td>
															<td>{{$kalbiser->nama}}</td>
															<td>{{$kalbiser->prodi}}</td>



													<td>{{$skpi->jenis_dokumen}}</td>
													<td>{{$skpi->tanggal_dokumen}}</th>
													<th>{{$skpi->tahun}}</th>
													<th>{{$skpi->judul_sertifikat}}</th>

													<td>@if($skpi->status == '0' && $skpi->user_id == auth()->user()->id || $skpi->status == null && $skpi->user_id == auth()->user()->id || $skpi->status == '0' && auth()->user()->role == 'admin' || $skpi->status == null && auth()->user()->role == 'admin')
															<span class="badge badge-danger">Belum Di Approve</span>
														@elseif($skpi->status == '1' && $skpi->user_id == auth()->user()->id || $skpi->status == null && $skpi->user_id == auth()->user()->id || $skpi->status == '1' && auth()->user()->role == 'admin')
															<span class="badge badge-success">Sudah Di Approve</span>
														@endif

													</td>

													@if(auth()->user()->role == 'admin' && $skpi->user_id == auth()->user()->id|| auth()->user()->role == 'student'&& $skpi->user_id == auth()->user()->id || auth()->user()->role == 'admin')
													<td>
														<button id="buttonViewModal" type="button" class="btn btn-primary" data-toggle="modal" data-id="{{ asset($skpi->file_skpi) }}" data-target="#viewModal">
														  View file
														</button>

														<a href="/skpi/{{$skpi->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
														<a href="/skpi/{{$skpi->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Jika data ini dihapus maka dapat menghilangkan seluruh kegiatan didalamnya, Apakah anda yakin ingin menghapus data ini??')">Delete</a>
													</td>
													@endif
													</tr>

												</tr>
												@endif
													@endforeach
												@endforeach
										</tbody>
										<tfoot>
													<td></td>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<td></td>
										</tfoot>
									</table>
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>

	<!-- Modal -->
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body-view-file"></div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
	$(document).on("click", "#buttonViewModal", function(){
		var skpiId = $(this).data('id');
		var bodyElement = $('.modal-body-view-file');
		bodyElement.html('');
		var domImage = `<img src="${skpiId}" style="width:80%" />`

		bodyElement.append(domImage)
	})



	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('.data tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    	$('#tableexcel').DataTable({
    	dom:'Bfrtip',
    	buttons: [
            'excel',
        ],
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });

    //  $('#example').DataTable( {
    //     responsive: {
    //         details: {
    //             display: $.fn.dataTable.Responsive.display.modal( {
    //                 header: function ( row ) {
    //                     var data = row.data();
    //                     return 'Details for '+data[0]+' '+data[1];
    //                 }
    //             } ),
    //             renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
    //                 tableClass: 'table'
    //             } )
    //         }
    //     }
    // } );

    //  $('#pks_id').on('change', function(){
    //  	var nopolID = $(this).val();
    //  	if(nopolID){
    //  		$.ajax({

    //  			url: '{{url("/backend/addendum/ajax")}}'+"/"+nopolID,
    //  			type: "GET",
    //  			dataType: "json",

    //  			success:function(data){
    //  				$('#tgl_pks').val('');

    //  				$('#nama_kontrak_pks').val('');

    //  				$.each(data, function(key, value){

    //  					$('#tgl_pks').val(value.tgl_pks);

    //  					$('#nama_kontrak_pks').val(value.nama_kontrak_pks);

    //  				});
    //  			}

    //  		});
    //  	}else{
    //  		$('#harga_driver_ajax').empty();
    //  	}

    //  });

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
							 (Maksimal dokumen 5 MB & format JPEG)

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
							    <label for="exampleInputEmail1">Tahun Dokumen</label>
							    <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Dokumen">
							    Sesuai dengan tanggal dokumen
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Judul Sertifikat</label>
							    <input type="text" name="judul_sertifikat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
							  </div>



					  <input type="hidden" name="status" value="0">
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>







<script>
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

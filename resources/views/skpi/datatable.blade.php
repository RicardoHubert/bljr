@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
                                    @if ($errors->has("file_skpi"))
                                        <div style="position: absolute;top: 20%;left: 30%" class="alert alert-danger alert-dismissible col-md-5" role="alert">
                                            Ukuran file lebih dari <strong>2MB</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @endif
									<h3 class="panel-title">SKPI</h3>
<!-- 									<div class="left">
										<form action="skpi/downloadword" method="POST">
											@csrf
											<button type="submit" style="background-color: indigo; color: white; padding: 15px; border-radius: 10px;">Word</button>
										</form>
									</div> -->
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i> Create New SKPI </button>
									</div>
								</div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        {!! $dataTable->table() !!}
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
	    </div>
	  </div>
	</div>
</div>
<script type="text/javascript">
	$(document).on("click", "#buttonViewModal", function(){
		var skpiId = $(this).data('id');
		var bodyElement = $('.modal-body-view-file');
        let [sertifPath, fileName] = skpiId.split("/");
        var APP_URL = {!! json_encode(url('/')) !!}
        bodyElement.html('');

        var isThumbExists = true;
        let thumbImg = document.createElement("img");
        thumbImg.onerror = () => (isThumbExists = false);
        thumbImg.src = `${APP_URL}/${sertifPath}/thumb-${fileName}`;
        let src = isThumbExists ? thumbImg.src : `${APP_URL}/${sertifPath}/${fileName}` ;

		var domImage = `<div class="col-md-12"><img onerror="this.src='{{url('/fallback.png')}}'" src="${src}" style="width:100%" /></div>`

		bodyElement.append(domImage);
	});

	// $(document).ready(function() {
    // // Setup - add a text input to each footer cell
    // $('.data tfoot th').each( function () {
        // var title = $(this).text();
        // $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );
// });
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
                <form action="{{route('skpi.create')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <x-form.wrapper title="File Unggah" required="true">
                    <x-form.file name="file_skpi" required />
                    Sertifikat, Piagam, dsb
                </x-form.wrapper>


                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Mahasiswa</label>
                    <select class="form-control select2" id="mySelect2" name="user_id" required>
                        <option value="">"------Pilih-------"</option>

					</select>
                    </div>


                <x-form.wrapper title="Jenis Dokumen" required="true">
                    <select class="form-control" name="jenis_dokumen" required>
                        <option value="">"------Pilih-------"</option>
                        <option value="SK">Surat Keputusan (SK)</option>
                        <option value="SERTIFIKAT">Sertifikat</option>
                        <option value="STU">Surat Tugas (STU)</option>
                        <option value="PIAGAM">Piagam</option>
                    </select>
                </x-form.wrapper>

                <x-form.wrapper title="Tanggal Dokumen" required="true">
                    <input readonly type="text" name="tanggal_dokumen" class="form-control datepicker date" aria-describedby="emailHelp" placeholder="dd/mm/yyyy">
                </x-form.wrapper>

                <x-form.wrapper title="Tahun Dokumen" required="true">
                    <x-form.input name="tahun" required placeholder="Tahun" />
                    Sesuai dengan tanggal dokumen
                </x-form.wrapper>

                    <x-form.wrapper title="Judul Sertifikat" required="true">
                    <x-form.input name="judul_sertifikat" required placeholder="Judul Sertifikat" />
                </x-form.wrapper>

                <x-form.wrapper title="Penyelenggara" required="true">
                    <x-form.input name="penyelenggara" required placeholder="Penyelenggara" />
                    Nama Institusi penyelenggara / Organisasi Mahasiswa Kalbis Institute
                </x-form.wrapper>



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

		$(".datepicker.date").datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
      		changeYear: true
		});

		        //UNTUK SELECT 2
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select2').select2({
            ajax: {
                url: `{{route("ajax.datas")}}`,
                dataType: 'json',
                data: function(params){
                    return {
                        type: "kalbiser",
                        q: params.term
                    }
                },
                processResults: function (data) {
                    console.log(this.$element[0].id);
					return processResults.users(data);
                }
            },
            minimumInputLength: 1,
			dropdownParent: $('#exampleModal')
        });

        const processResults = {
            users: (data) => {
                return {
                    results: data.map(u => {
                        return {id: u.user_id, text: u.nama + " - " + u.nim};
                    })
                };
            }
        }

	});
</script>
@stop

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

@extends('layouts.master')

@section('title', 'Logistik Keluar')

@section('content')
    <div class="content">
        <div class="panel-header bg-dark-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2 justify-content-center">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KODE</th>
                                            <th>CUSTOMER</th>
                                            <th>GRAND TOTAL</th>
                                            <th class="text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logistikkeluar as $e=>$item)
                                        <tr>
                                            <td>{{ $e+1 }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->customer->nama }}</td>
                                            <td style="text-align: end;">{{ number_format($item->grand_total) }}</td>
                                            <td class="text-center">
                                               
                                                <a href="#" data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-info btn-shadow mr-2 mt-2 mb-2 btn-detail">
                                                    <i class="fas fa-list-ul"></i>
                                                    <span class="align-middle">DETAIL</span>
                                                </a>

                                                    <a class="swal-confirm btn btn-sm btn-danger btn-shadow mt-2 mb-2" data-id="{{ $item->id }}" href="#">DELETE
                                                        <form action="{{ route('hapus-logistik-keluar', $item->id) }}"
                                                                id="delete{{ $item->id }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                        </form>
                                                    </a>
                                            </td>
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
    <div class="custom-template">
			<div class="custom-toggle" style="background:#1A2035 !important;" href="#insert" data-toggle="modal">
				<i class="fas fa-plus-circle"></i>
			</div>
    </div>
    
    {{-- Insert --}}
    <div id="insert" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">TAMBAH DATA LOGISTIK</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">×</button>
                </div>
                <form class="form form-vertical" method="post" enctype="multipart/form-data"
                    action="{{ route('save-logistik-keluar') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="kode" @error('kode') class="text-danger" @enderror>KODE TRANSAKSI LOGISTIK KELUAR @error('kode')
                                        | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control form-control-sm shadow" value="{{ $kode }}"
                                        name="kode" placeholder="-" style="height: 28px;" readonly>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="customer" @error('customer') class="text-danger" @enderror>CUSTOMER @error('customer')
                                        | {{ $message }}
                                        @enderror</label>
                                        <select id="customer" name="customer" class="js-states form-control" style="width: 100%">
                                            <option value=""></option>
                                           @foreach ($customer as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                           @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><b>NAMA</b></th>
                                            <th><b>HARGA</b></th>
                                            <th><b>QTY</b></th>
                                            <th><b>AKSI</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="produk-ajax">
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="logistik" @error('logistik') class="text-danger" @enderror>Pilih Item Untuk Tambah Logistik @error('logistik')
                                        | {{ $message }}
                                        @enderror</label>
                                   <select id="logistikkeluar" class="js-states form-control" style="width: 100%" name="logistik">
                                    <option value=""></option>
                                   @foreach ($logistik as $item)
                                       <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                   @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-dark shadow">Simpan</button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- last Insert --}}

     {{-- Detail --}}
     <div id="detail" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">DETAIL LOGISTIK MASUK</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">×</button>
                </div>
                    <div class="modal-body">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
                    </div>
            </div>
        </div>
    </div>
    {{-- last Detail --}}

@endsection

@push('js')
<script >
   $(document).ready(function() {
			$('#basic-datatables').DataTable({
			});
		});
</script>
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
    
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa             = split[0].length % 3,
        rupiah             = split[0].substr(0, sisa),
        ribuan             = split[0].substr(sisa).match(/\d{3}/gi);
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>
<script>
     $("#customer").select2({
        placeholder: "Pilih Customer",
        allowClear: true
    });
</script>
<script>
    $('#logistikkeluar').select2();
   $('#logistikkeluar').on('select2:select', function (e) { 
       console.log('select event');
               var id = $(this).val();
               var url = "{{ url('logistikkeluar/ajax') }}"+'/'+id;
               var _this= $(this);
               $.ajax({
                   type:'get',
                   dataType: 'json',
                   url:url,
                   success : function(data){
                       console.log(data);
                       _this.val('');
                       var nilai = '';
                       nilai +='<tr>';
                           
                       nilai +='<td style="width:300px;" style="height:40px;">';
                       nilai +=data.data.nama;
                       nilai +='<input type="hidden" class="form-control form-control-sm" name="nama[]" value="'+data.data.id+'"></input>';
                       nilai +='</td>';
                       nilai +='<td class="harga" style="height:40px;">';
                       nilai +='<input type="number" class="form-control form-control-sm" name="harga_jual[]" value="'+data.data.harga_jual+'" style="width: auto;"></input>';
                       nilai +='</td>';
                       nilai +='<td hidden style="height:40px;">';
                       nilai +='<input type="number" class="form-control form-control-sm" name="stok[]" value="'+data.data.stok+'" style="width: auto;"></input>';
                       nilai +='</td>';
                       nilai +='<td style="height:40px;">';
                       nilai +='<input type="number" class="form-control form-control-sm" name="qty[]" value="1" style="width: 70px;"></input>';
                       nilai +='</td>';
                       nilai +='<td style="height:40px;">';
                       nilai +='<button class="btn btn-sm btn-danger hapus">Hapus</button>';
                       nilai +='</td>';
                       
                       nilai +='</tr>';
                       $('.produk-ajax').append(nilai);
                   }
               })      
      
   });
   $('body').on('click', '.hapus', function(e){
       e.preventDefault();
       $(this).closest('tr').remove();
   })
   $("#logistikkeluar").select2({
       placeholder: "Cari Logistik",
       allowClear: true
   });
</script>
<script>
      $('.btn-detail').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/detail-logkeluar`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    $('#detail').find('.modal-body').html(data)
                    $('#detail').modal('show')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })

        $('.btn-update').on('click', function() {
            // console.log($(this).data('id'))
            let id = $('#form-edit').find('#id_data').val()
            let formData = $('#form-edit').serialize()
            console.log(formData)
            $.ajax({
                url: `/logistik/update/${id}`,
                method: "PATCH",
                data:formData,
                success: function(data) {
                    // console.log(data)
                    $('#edit').modal('hide')
                    window.location.assign('/logistik')
                },
                error: function(err) {
                    console.log(err.responseJSON)
                    let err_log = err.responseJSON.errors;
                    if (err.status == 422){
                        if (typeof(err_log.satuan) !== 'undefined'){
                            $('#edit').find('[name="divisi"]').prev().html('<span style="color:red">Divisi | '+err_log.divisi[0]+'</span>')
                        }else{
                            $('#edit').find('[name="divisi"]').prev().html('<span>Divisi</span>')
                        }
                    }
                }
            })
        })

        @if ($errors->any()) {
            $('#insert').modal('show')
        }
        @endif

        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            Swal.fire({
                    title: 'YAKIN MAU HAPUS DATA?',
                    text: "Data Akan Dihapus Permanen",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'YA, HAPUS!'
                    })
                .then((result) => {
                    if (result.isConfirmed) {
                       
                        $(`#delete${id}`).submit();
                    } else {
                        // swal("Data ini batal dihapus!");
                    }
                });
        });
</script>
@endpush
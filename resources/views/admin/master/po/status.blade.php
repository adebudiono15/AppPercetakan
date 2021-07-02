@extends('layouts.master')

@section('title', 'TIME LINE STATUS PO')

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
                                            <th style="font-size: 10px !important;">KODE</th>
                                            <th style="font-size: 10px !important;">NAMA</th>
                                            <th style="font-size: 10px !important;">PRA CETAK</th>
                                            <th style="font-size: 10px !important;">CETAK</th>
                                            <th style="font-size: 10px !important;">LAMINATING</th>
                                            <th style="font-size: 10px !important;">POLLY</th>
                                            <th style="font-size: 10px !important;">POND</th>
                                            <th style="font-size: 10px !important;">MESIN LEM</th>
                                            <th style="font-size: 10px !important;">KOPEK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($poline as $e=>$item)
                                        <tr>
                                            <td style="font-size: 10px !important;">{{ $item->kode }}</td>
                                            <td  style="font-size: 10px !important;">{{ $item->nama->nama }}</td>
                                            @if ($item->status == 1)
                                            <td class="text-center" style="color: #31CE36; "><i class="far fa-check-circle"></i></td>
                                            <td class="text-center">  
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-dark shadow btn-shadow mr-2 mt-2 mb-2 btn-update1">
                                                <span class="align-middle">UPDATE</span>
                                                </a>
                                            </td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            @endif

                                            @if ($item->status == 2)
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center">  
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-dark shadow btn-shadow mr-2 mt-2 mb-2 btn-update2">
                                                <span class="align-middle">UPDATE</span>
                                                </a>
                                            </td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            @endif
                                            @if ($item->status == 3)
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center">  
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-dark shadow btn-shadow mr-2 mt-2 mb-2 btn-update3">
                                                <span class="align-middle">UPDATE</span>
                                                </a>
                                            </td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            @endif
                                            @if ($item->status == 4)
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center">  
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-dark shadow btn-shadow mr-2 mt-2 mb-2 btn-update4">
                                                <span class="align-middle">UPDATE</span>
                                                </a>
                                            </td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            @endif
                                            @if ($item->status == 5)
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center">  
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-dark shadow btn-shadow mr-2 mt-2 mb-2 btn-update5">
                                                <span class="align-middle">UPDATE</span>
                                                </a>
                                            </td>
                                            <td class="text-center" style="color: #F25961;"><i class="fas fa-recycle"></i></td>
                                            @endif
                                            @if ($item->status == 6)
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center">  
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-dark shadow btn-shadow mr-2 mt-2 mb-2 btn-update6">
                                                <span class="align-middle">UPDATE</span>
                                                </a>
                                            </td>
                                            @endif
                                            @if ($item->status == 7)
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center">  
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-dark shadow btn-shadow mr-2 mt-2 mb-2 btn-update7">
                                                <span class="align-middle">UPDATE</span>
                                                </a>
                                            </td>
                                            @endif
                                            @if ($item->status == 8)
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
                                            <td class="text-center" style="color: #31CE36;"><i class="far fa-check-circle"></i></td>
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

@endsection

@push('js')
<script >
   $(document).ready(function() {
			$('#basic-datatables').DataTable({
			});
		});
</script>

<script>
       $('.btn-update1').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/update1-po`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Diupdate',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location.assign('/cek-status')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
       $('.btn-update2').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/update2-po`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Diupdate',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location.assign('/cek-status')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
        $('.btn-update3').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/update3-po`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Diupdate',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location.assign('/cek-status')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
        $('.btn-update4').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/update4-po`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Diupdate',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location.assign('/cek-status')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
        $('.btn-update5').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/update5-po`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Diupdate',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location.assign('/cek-status')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
        $('.btn-update6').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/update6-po`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Diupdate',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location.assign('/cek-status')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
        $('.btn-update7').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/update7-po`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Diupdate',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location.assign('/cek-status')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
</script>
@endpush
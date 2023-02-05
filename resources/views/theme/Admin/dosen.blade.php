@extends('theme.components.main')
@section('title', 'SIMATA - Dosen')
@section('content')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Dosen</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Pages</li>
                                <li class="breadcrumb-item active">Dosen</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <nav class="navbar navbar-light bg-secondary rounded mb-3" style="justify-content: end">
                                <button type="button" class="btn btn-success mr-3"data-toggle="modal" data-target="#AddData">Add Data</button>
                                <button class="btn btn-danger" id="delete_record">Delete Data</button>
                            </nav>
                            {{-- <input type="button" id='delete_record' value='Delete' > --}}

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id="select_all"> Check All </th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>TTL</th>
                                        <th>No Telephone</th>
                                        <th>Prodi</th>
                                        <th>Angkatan</th>
                                    </tr>
                                </thead>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container-fluid -->
    </div>







    <!-- Modal -->
    <div class="modal fade" id="AddData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddDataLabel">Add Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddData">
                    <div class="modal-body">
                        @csrf
                        {{-- @method('POST') --}}

                        <div class="form-group">
                            <label for="nip">NIP<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nip') }}" placeholder="1203210093">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Fahril Refiandi">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group">
                            <label for="tempatLahir">Tempat Lahir<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Blitar">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group">
                            <label for="noTlpn">Nomor Telepon<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="noTlpn" name="no_tlpn" value="{{ old('no_tlpn') }}" placeholder="0821********">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat<span class="text-danger">*</span> </label>
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Jl. Suko Aji No 19 Kota Malang.">{{ old('alamat') }}</textarea>
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select class="form-control" id="jenisKelamin" name="jenis_kelamin">
                                <option selected value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prodi">Program Studi<span class="text-danger">*</span></label>
                            <select class="form-control" id="prodi" name="prodi">
                                <option selected value="Informatika">Informatika</option>
                                <option value="Data Sains">Data Sains</option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="angkatan">Tahun Masuk<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk') }}" placeholder="{{ date('Y') }}">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






@endsection

@push('css')
    <link href="{{ asset('theme') }}/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme') }}/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme') }}/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme') }}/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/buttons.flash.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/dataTables.select.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('theme') }}/plugins/datatables/vfs_fonts.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable-buttons').DataTable({
                // buttons: ['copy', 'print', 'pdf'],
                dom: 'Bfrtip',
                // lengthChange: false,
                "ajax": {
                    url: "{{ url('/api/dosen') }}",
                    type: 'GET',
                },
                "columns": columns,

                buttons: [{
                        extend: 'pageLength',
                    },
                    {
                        extend: 'copy',
                    },
                    {
                        extend: 'pdf',
                    },
                    {
                        extend: 'print',
                        // hidden columns 0
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7]
                        },
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend('<div class="row border-bottom"><div class="col-4"><a class="logo" style="font-size: 40px"><i style="font-size: 40px" class="mdi mdi-album"></i> <span>Simata</span> </a><p style= "text-align: start"> Telp: 086-555-5555. <br> Email: itts@ac.id. <br> Address: Jl Ahmad Yani No 157. <br> </p></div><div class="col" style="text-align: end"><h4 style="margin-bottom: 22px"> {{ strtoupper('Data Dosen') }} </h4><h5> Printed on: {{ \Carbon\Carbon::now()->isoFormat('dddd,DD MMMM YYYY, HH:mm') }}. </h5></div></div>');
                        },
                    },

                ],
                "language": {
                    "paginate": {
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>"
                    }
                },
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                },
            });
            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');






            $("#select_all").click(function() {
                $(".checkbox").prop("checked", $(this).prop("checked"));
            });

            // delete all selected checkbox
            $("#delete_record").click(function() {
                var id = [];
                $(".checkbox:checked").each(function(i) {
                    id[i] = $(this).val();
                });
                if (id.length > 0) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Data will be deleted",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#e74c3c",
                        cancelButtonColor: "#2ecc71",

                        cancelButtonText: '<span style="color: #fff">Cancel</span>',
                        confirmButtonText: '<span style="color: #fff">Yes, delete it!</span>',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                headers: {
                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                                },
                                url: "{{ url('/admin/dosen/destroy') }}",
                                type: "DELETE",
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr("content"),
                                    _method: "DELETE",
                                    id: id,
                                },

                                success: function(data) {
                                    $("#datatable-buttons").DataTable().ajax.reload();
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "The data you selected has been successfully deleted",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timerProgressBar: true,
                                        timer: 2000
                                    });
                                },
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Oops...",
                        text: "You have to select the data!",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            });




            $("#save").click(function() {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: "{{ url('/admin/dosen') }}",
                    type: "POST",
                    // get data from id formAddData
                    data: $("#formAddData").serialize(),

                    success: function(data, status, xhr) {
                        $("#datatable-buttons").DataTable().ajax.reload();
                        $("#AddData").modal("hide");
                        Swal.fire({
                            title: "Added!",
                            text: "Data has been successfully added",
                            icon: "success",
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 2000
                        });

                    },
                });

            });



        });
        var columns = [{
                data: 'id',
                name: 'id',
                render: function(data, type, row, meta) {
                    return '<div class="form-check text-center"><input class="form-check-input checkbox" type="checkbox" value="' + data + '" id="flexCheckDefault"></div>';
                }
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'jenis_kelamin',
                name: 'jenis_kelamin'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: null,
                name: 'ttl',
                render: function(data, type, row, meta) {
                    return data.tempat_lahir + ', ' + data.tanggal_lahir;
                }
            },
            {
                data: 'no_tlpn',
                name: 'no_tlpn'
            },
            {
                data: 'prodi',
                name: 'prodi'
            },
            {
                data: 'tahun_masuk',
                name: 'angkatan'
            },

        ];
    </script>
@endpush

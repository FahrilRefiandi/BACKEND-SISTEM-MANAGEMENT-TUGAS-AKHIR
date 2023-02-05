@extends('theme.components.main')
@section('title', 'SIMATA - Tugas Akhir')
@section('content')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Tugas Akhir</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Pages</li>
                                <li class="breadcrumb-item active">Tugas Akhir</li>
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

                            {{-- <nav class="navbar navbar-light bg-secondary rounded mb-3" style="justify-content: end">
                                <button type="button" class="btn btn-success mr-3"data-toggle="modal" data-target="#AddData">Add Data</button>
                                <button class="btn btn-danger" id="delete_record">Delete Data</button>
                            </nav> --}}
                            {{-- <input type="button" id='delete_record' value='Delete' > --}}

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th><input type="checkbox" name="" id="select_all"> Check All </th> --}}
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Judul TA</th>
                                        <th>Bidang TA</th>
                                        <th>URL TA</th>
                                        <th>Proposal</th>
                                        <th>Tugas Akhir</th>
                                        <th>Nilai</th>
                                        <th>Tanggal Pengumpulan</th>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#datatable-buttons').DataTable({
                // buttons: ['copy', 'print', 'pdf'],
                dom: 'Bfrtip',
                // lengthChange: false,
                "ajax": {
                    url: "{{ url('/api/tugas-akhir') }}",
                    type: 'GET',
                },
                "columns": columns,

                buttons: [{
                        extend: 'pageLength',
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1, 2, 3,7, 8]
                        },
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1, 2, 3,7, 8]
                        },
                    },
                    {
                        extend: 'print',
                        // hidden columns 0
                        exportOptions: {
                            columns: [0,1, 2, 3,7, 8]
                        },
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend('<div class="row border-bottom"><div class="col-4"><a class="logo" style="font-size: 40px"><i style="font-size: 40px" class="mdi mdi-album"></i> <span>Simata</span> </a><p style= "text-align: start"> Telp: 086-555-5555. <br> Email: itts@ac.id. <br> Address: Jl Ahmad Yani No 157. <br> </p></div><div class="col" style="text-align: end"><h4 style="margin-bottom: 22px"> {{ strtoupper('Data Mahasiswa') }} </h4><h5> Printed on: {{ \Carbon\Carbon::now()->isoFormat('dddd,DD MMMM YYYY, HH:mm') }}. </h5></div></div>');
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












            $("#save").click(function() {
                // set header modal labelInsertNilai from data-nama




                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: "{{ url('/dosen/tugas-akhir') }}/"+$(this).attr("data-id"),
                    type: "PUT",
                    // get data from id formAddData
                    data: $("#insertNilaiForm").serialize(),

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
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'prodi',
                name: 'prodi'
            },
            {
                data: 'judul_ta',
                name: 'judul_ta'
            },
            {
                data: 'bidang_ta',
                name: 'bidang_ta'
            },
            {
                data: 'url_ta',
                name: 'url_ta',
                render: function(data, type, row) {
                    if (data) {
                        return '<a href="' + data + '" target="_blank">Link</a>';
                    } else {
                        return '-';
                    }
                }
            },
            {
                data: 'proposal_ta',
                name: 'proposal_ta',
                render: function(data, type, row) {
                    return '<a href="' + data + '" target="_blank"><i class="far fa-eye"></i> Show </a>';
                }
            },
            {
                data: 'file_ta',
                name: 'file_ta',
                render: function(data, type, row) {
                    // console.log(data);
                    return '<a href="' + data + '"><i class="fas fa-cloud-download-alt"></i> Dowload</a>';
                }

            },
            {
                data: null,
                name: 'nilai',
                render: function(data, type, row) {
                    if (data.nilai) {
                        return data.nilai;
                    } else {
                        return '-';
                    }
                }
            },
            {
                data: 'tanggal_upload',
                name: 'tanggal_upload',
                render: function(data, type, row) {
                    return moment(data).format('HH:mm DD MMMM YYYY');
                }
            },


        ];

    </script>
@endpush

@extends('theme.components.main')
@section('title', 'SIMATA - Users')
@section('content')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Pages</li>
                                <li class="breadcrumb-item active">Users</li>
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
                                        <th>Avatar</th>
                                        <th>No Identitas</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Bergabung Sejak</th>
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
                    url: "{{ url('/api/users') }}",
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
                            columns: [0,1, 2, 3, 4],
                            stripHtml: false,
                        },
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend('<div class="row border-bottom"><div class="col-4"><a class="logo" style="font-size: 40px"><i style="font-size: 40px" class="mdi mdi-album"></i> <span>Simata</span> </a><p style= "text-align: start"> Telp: 086-555-5555. <br> Email: itts@ac.id. <br> Address: Jl Ahmad Yani No 157. <br> </p></div><div class="col" style="text-align: end"><h4 style="margin-bottom: 22px"> {{ strtoupper('Data Users') }} </h4><h5> Printed on: {{ \Carbon\Carbon::now()->isoFormat('dddd,DD MMMM YYYY, HH:mm') }}. </h5></div></div>');
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






            // $("#select_all").click(function() {
            //     $(".checkbox").prop("checked", $(this).prop("checked"));
            // });

            // // delete all selected checkbox
            // $("#delete_record").click(function() {
            //     var id = [];
            //     $(".checkbox:checked").each(function(i) {
            //         id[i] = $(this).val();
            //     });
            //     if (id.length > 0) {
            //         Swal.fire({
            //             title: "Are you sure?",
            //             text: "Data will be deleted",
            //             icon: "warning",
            //             showCancelButton: true,
            //             confirmButtonColor: "#e74c3c",
            //             cancelButtonColor: "#2ecc71",

            //             cancelButtonText: '<span style="color: #fff">Cancel</span>',
            //             confirmButtonText: '<span style="color: #fff">Yes, delete it!</span>',
            //         }).then((result) => {
            //             if (result.isConfirmed) {
            //                 $.ajax({
            //                     headers: {
            //                         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            //                     },
            //                     url: "{{ url('/admin/dosen/destroy') }}",
            //                     type: "DELETE",
            //                     data: {
            //                         _token: $('meta[name="csrf-token"]').attr("content"),
            //                         _method: "DELETE",
            //                         id: id,
            //                     },

            //                     success: function(data) {
            //                         $("#datatable-buttons").DataTable().ajax.reload();
            //                         Swal.fire({
            //                             title: "Deleted!",
            //                             text: "The data you selected has been successfully deleted",
            //                             icon: "success",
            //                             showConfirmButton: false,
            //                             timerProgressBar: true,
            //                             timer: 2000
            //                         });
            //                     },
            //                 });
            //             }
            //         });
            //     } else {
            //         Swal.fire({
            //             title: "Oops...",
            //             text: "You have to select the data!",
            //             icon: "error",
            //             showConfirmButton: false,
            //             timer: 1500,
            //         });
            //     }
            // });




            // $("#save").click(function() {
            //     $.ajax({
            //         headers: {
            //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            //         },
            //         url: "{{ url('/admin/dosen') }}",
            //         type: "POST",
            //         // get data from id formAddData
            //         data: $("#formAddData").serialize(),

            //         success: function(data, status, xhr) {
            //             $("#datatable-buttons").DataTable().ajax.reload();
            //             $("#AddData").modal("hide");
            //             Swal.fire({
            //                 title: "Added!",
            //                 text: "Data has been successfully added",
            //                 icon: "success",
            //                 showConfirmButton: false,
            //                 timerProgressBar: true,
            //                 timer: 2000
            //             });

            //         },
            //     });

            // });



        });
        var columns = [
            // {
            //     data: 'id',
            //     name: 'id',
            //     render: function(data, type, row, meta) {
            //         return '<div class="form-check text-center"><input class="form-check-input checkbox" type="checkbox" value="' + data + '" id="flexCheckDefault"></div>';
            //     }
            // },
            {
                data: 'avatar',
                name: 'avatar',
                render: function(data, type, row, meta) {
                    return '<img src="' + data + '" alt="image" class="rounded" width="40" >';
                }
            },
            {
                data: 'no_identitas',
                name: 'no_identitas'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'role',
                name: 'role'
            },
            {
                data: 'created_at',
                name: 'bergabung_sejak',
                render: function(data, type, row, meta) {
                    if (data) {
                        return moment(data).format('DD MMMM YYYY');
                    } else {
                        return '-';
                    }
                }
            },

        ];
    </script>
@endpush

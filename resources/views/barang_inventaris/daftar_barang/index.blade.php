@extends('layouts.layout')
@push('title')
    Daftar Barang
@endpush
@push('styles')
    <link rel="apple-touch-icon" href="{{ asset('app-assets') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets') }}/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <!-- END: Vendor CSS -->

    <!-- BEGIN: Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS -->

    <!-- BEGIN: Page CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/pickers/form-flat-pickr.css">
    <!-- END: Page CSS -->

    <!-- BEGIN: Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/style.css">
    <!-- END: Custom CSS -->
@endpush

@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Barang Inventaris</a>
                        </li>
                        <li class="breadcrumb-item active">Daftar Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Basic table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Jenis Barang</th>
                                <th>User</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Terima</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->br_kode }}</td>
                                    <td>{{ $item->jenisBarang->jns_brg_nama }}</td>
                                    <td>{{ ucwords($item->user->user_nama) }}</td>
                                    <td>{{ $item->br_nama }}</td>
                                    <td>{{ $item->br_tgl_terima }}</td>
                                    <td>{{ $item->br_tgl_entry }}</td>
                                    <td>{{ $item->br_status == 1 ? 'Dipinjam' : 'Tersedia' }}</td>
                                    <td>
                                        <button class="btn btn-sm edit-btn btn-primary" data-id="{{ $item->br_kode }}"
                                            data-nama="{{ $item->br_nama }}" data-jenis="{{ $item->jns_brg_kode }}"
                                            data-tglterima="{{ $item->br_tgl_terima }}"
                                            data-tglmasuk="{{ $item->br_tgl_entry }}" data-status="{{ $item->br_status }}"
                                            data-bs-toggle="modal" data-bs-target="#inlineForm">
                                            <i data-feather="edit"></i>
                                        </button>

                                        <form action="{{ route('daftar-barang.destroy', $item->br_kode) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--/ Basic table -->

    @include('barang_inventaris.daftar_barang.modal')
@endsection

@push('scripts')
    <!-- BEGIN: Vendor JS -->
    <script src="{{ asset('app-assets') }}/vendors/js/vendors.min.js"></script>
    <!-- END: Vendor JS -->

    <!-- BEGIN: Page Vendor JS -->
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/pickers/pickadate/legacy.js"></script>
    <!-- END: Page Vendor JS -->

    <!-- BEGIN: Theme JS -->
    <script src="{{ asset('app-assets') }}/js/core/app-menu.js"></script>
    <script src="{{ asset('app-assets') }}/js/core/app.js"></script>
    <!-- END: Theme JS -->

    <!-- BEGIN: Page JS -->
    <script src="{{ asset('app-assets') }}/js/scripts/forms/form-validation.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/forms/pickers/form-pickers.js"></script>

    <!-- END: Page JS -->

    <!-- BEGIN: Page JS-->

    {{-- <script src="{{ asset('app-assets') }}/js/scripts/tables/table-datatables-basic.js"></script> --}}
    <script>
        // Edit
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                // Ambil data dari tombol
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                let jenis = $(this).data('jenis'); // Pastikan ini adalah kode jenis barang
                let tglterima = $(this).data('tglterima');
                let tglmasuk = $(this).data('tglmasuk');
                let status = $(this).data('status');

                // Set nilai pada form modal
                $('#br_nama').val(nama);
                $('#br_jenis').val(jenis).change(); // Gunakan .change() agar select ter-update
                $('#br_tgl_terima').val(tglterima);
                $('#br_tgl_masuk').val(tglmasuk);
                $('#br_status').val(status).change();

                // Update form action
                $('#form-validate').attr('action', `/daftar-barang/${id}`);
                $('#formMethod').val('PUT');
            });

            // Reset form ketika modal ditutup
            $('#inlineForm').on('hidden.bs.modal', function() {
                $('#br_nama').val('');
                $('#br_jenis').val('').change();
                $('#br_tgl_terima').val('');
                $('#br_tgl_masuk').val('');
                $('#br_status').val('1').change(); // Kembali ke default "Aktif"

                // Reset form action
                $('#form-validate').attr('action', "{{ route('daftar-barang.store') }}");
                $('#formMethod').val('POST');
            });
        });

        $(document).ready(function() {
            'use strict';

            var dt_basic_table = $('.datatables-basic');

            if (dt_basic_table.length) {
                dt_basic_table.DataTable({
                    paging: true, // Aktifkan paginasi
                    pageLength: 5, // Default jumlah data per halaman
                    lengthMenu: [5, 10, 25, 50, 75, 100], // Pilihan jumlah data per halaman
                    ordering: true, // Aktifkan fitur sorting di header
                    order: [
                        [0, 'asc']
                    ], // Urutan default berdasarkan kolom ke-2 (Nama)
                    dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>>' +
                        '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        't' +
                        '<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [{
                            text: feather.icons['plus'].toSvg({
                                class: 'me-50 font-small-4'
                            }) + 'Tambah Barang',
                            className: 'create-new btn btn-primary',
                            attr: {
                                'data-bs-toggle': 'modal',
                                'data-bs-target': '#inlineForm'
                            },
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        },
                        {
                            extend: 'collection',
                            className: 'btn btn-outline-secondary dropdown-toggle me-2',
                            text: feather.icons['share'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Export',
                            buttons: [{
                                    extend: 'print',
                                    text: feather.icons['printer'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Print',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    } // Menyesuaikan kolom yang diekspor
                                },
                                {
                                    extend: 'csv',
                                    text: feather.icons['file-text'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                },
                                {
                                    extend: 'excel',
                                    text: feather.icons['file'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: feather.icons['clipboard'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                },
                                {
                                    extend: 'copy',
                                    text: feather.icons['copy'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Copy',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                }
                            ]
                        }
                    ],
                    responsive: true,
                    language: {
                        paginate: {
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });
                $('div.head-label').html('<h6 class="mb-0">Daftar Barang</h6>');
            }
        });

        $(document).ready(function() {
            $('#form-validate').validate({
                rules: {
                    br_nama: {
                        required: true,
                        minlength: 3
                    },
                    jns_brg_kode: {
                        required: true
                    },
                    br_tgl_terima: {
                        required: true
                    }
                },
                messages: {
                    br_nama: {
                        required: "Nama Barang harus diisi.",
                        minlength: "Nama Barang minimal 3 karakter."
                    },
                    jns_brg_kode: {
                        required: "Jenis Barang harus diisi."
                    },
                    br_tgl_terima: {
                        required: "Tanggal Terima harus diisi.",
                        date: "Format tanggal tidak valid"
                    }
                },
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback text-right");
                    element.closest(".mb-1").append(error);
                    element.addClass("is-invalid");
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid");
                    $(element).next(".invalid-feedback").text('');
                }
            });
        });

        $(document).ready(function() {
            $(".flatpickr-human-friendly").flatpickr({
                dateFormat: "Y-m-d", // Sesuai placeholder yang digunakan
                allowInput: true // Memungkinkan pengguna mengetik langsung
            });
        });
    </script>
    <!-- END: Page JS-->
@endpush

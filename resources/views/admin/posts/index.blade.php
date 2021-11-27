@extends('admin.layout')

@push('plugincss')
<!-- plugin css -->
<link href="/sheruadmin/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/sheruadmin/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/sheruadmin/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/sheruadmin/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('header')
    <nav aria-label="breadcrumb" class="float-right mt-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio <i data-feather="home" class="icon-xs"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Posts <i data-feather="eye" class="icon-xs"></i></li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title mt-0">Ver todas las publicaciones</h4>
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#bs-example-modal-xl"><i data-feather="plus" class="icon-xs"></i> Nuevo post </button>
                <p class="sub-header">Se reflejaran todos los posts hasta el origen del tiempo</p>

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Extracto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>
                                <a href="" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="left" title="Ver">
                                    <i data-feather="eye" class="icon-xs"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Editar">
                                    <i data-feather="edit" class="icon-xs"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Eliminar">
                                    <i data-feather="x-circle" class="icon-xs"></i>
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
@endsection

@push('pluginjs')
<!-- datatable js -->
<script src="/sheruadmin/libs/datatables/jquery.dataTables.min.js"></script>
<script src="/sheruadmin/libs/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/sheruadmin/libs/datatables/dataTables.responsive.min.js"></script>
<script src="/sheruadmin/libs/datatables/responsive.bootstrap4.min.js"></script>
<script src="/sheruadmin/libs/datatables/dataTables.buttons.min.js"></script>
<script src="/sheruadmin/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="/sheruadmin/libs/datatables/buttons.html5.min.js"></script>
<script src="/sheruadmin/libs/datatables/buttons.flash.min.js"></script>
<script src="/sheruadmin/libs/datatables/buttons.print.min.js"></script>

<script src="/sheruadmin/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="/sheruadmin/libs/datatables/dataTables.select.min.js"></script>

<!-- Datatables init -->
{{-- <script src="/sheruadmin/js/pages/datatables.init.js"></script> --}}
<script>
    $("#datatable-buttons").DataTable({
        lengthChange: !1,
        language: {
            paginate: {
                previous: "<i class='uil uil-angle-left'>",
                next: "<i class='uil uil-angle-right'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });
</script>

<div class="modal fade" id="bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store') }}" class="needs-validation" novalidate>
    @csrf()
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Agregar título a la publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tituloPublic">Título de la publicación</label>
                        <input name="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="tituloPublic"
                        aria-describedby="titleHelp"
                        placeholder="ingrese el título de la publicación"
                        value="{{ old('title') }}"
                        required>
                        @error('title') <div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Crear publicación</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endpush
@extends('layouts/master')

@section('content')
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ url('/harga/create') }}" class="btn btn-primary">Tambah</a></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('backend.component.pesan')
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 160.312px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 204.156px;">Nominal</th>
                                                <th class="sorting d-inline" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 137.646px;">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody><?php
                                        $i = 1;
                                        ?>
                                            @foreach ($data as $data)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $i++ }}</td>
                                                    <td>{{ $data->nominal }}</td>

                                                    <td class="action">
                                                        <a href="{{ url('harga/' . $data->id_kamar . '/edit') }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form onsubmit="return confirm('Yakin akan menghapus data')"
                                                            class="d-inline" method="POST"
                                                            action="{{ url('harga/' . $data->id_kamar) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" name="submit" class="btn btn-danger "
                                                                style="margin-left: 5px">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@endsection

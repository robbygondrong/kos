@extends('layouts/master')

@section('content')
    <section class="content-header">
        <h1>
            {{ $title }}
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

        <!-- De fault box -->
        <div class="box">
            @include('backend.component.pesan')
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form role="form" method="POST" action="{{ url('fasilitas/' . $data->id_fasilitas) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_fasilitas">Nama Fasilitas</label>
                            <input type="text" name="nama_fasilitas" class="form-control" id="nama_fasilitas"
                                placeholder="tulikan fasilitan lainnya" value="{{ $data->nama_fasilitas }}">
                        </div>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/fasilitas') }}" class="btn btn-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection

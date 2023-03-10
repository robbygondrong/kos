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

        <!-- Default box -->
        <div class="box">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                @include('backend.component.pesan')
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ url('/user') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="varchar" name="nama" class="form-control" id="nama"
                                value="{{ old('nama') }}" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="ktp">No KTP</label>
                            <input type="number" name="ktp" class="form-control" id="ktp" placeholder="Nomor KTP"
                                value="{{ old('ktp') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input type="number" name="telepon" class="form-control" id="telepon" placeholder="Telp"
                                value="{{ old('telepon') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level</label>
                            <input type="number" name="level" class="form-control" id="level" placeholder="level"
                                value="{{ old('level') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="********">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/user') }}" class="btn btn-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection

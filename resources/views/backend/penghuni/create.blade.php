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
                <form role="form" method="POST" action="{{ url('/penghuni') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select name="user_id" id="">
                                <option value="">--pilih penghuni--</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id_user }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/penghuni') }}" class="btn btn-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection

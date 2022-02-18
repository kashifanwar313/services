@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sevices
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Service</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Service</h3>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('services.update', [$service]) }}" enctype="multipart/form-data" role="form">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Service Name" value="{{ $service->name }}">
                            </div>

                            @if($service->image)
                                <img class="img img-responsive" style="height: 100px; width: 200px;"
                            src="{{ $service->fullImage }}" alt="{{ $service->name }}">
                            @endif
                            <div class="form-group">
                                <label for="image">Service Image</label>
                                <input type="file" id="image" name="image">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Plan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create Plan</li>
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
                        <h3 class="box-title">Create Plan</h3>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('plans.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="service_type">Select Service Type</label>
                                <select name="service_type" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plan_name">Plan Name</label>
                                <input type="text" class="form-control" id="plan_name" name="plan_name"
                                    placeholder="Enter Plan Name" value="{{ old('plan_name', '') }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="feature">Feature</label>
                                        <input type="text" class="form-control" id="feature" name="features[]"
                                            placeholder="Enter Feature" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="feature">Status?</label>
                                        <input type="checkbox" class="flat-red" id="status" name="status[]"
                                            value="1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>More</label>
                                        <button id="add" onclick="addMoreFeatures()" type="button" class="btn btn-sm btn-primary">+</button>
                                    </div>
                                </div>
                            </div>
                            <div id="dynamic_features"></div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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

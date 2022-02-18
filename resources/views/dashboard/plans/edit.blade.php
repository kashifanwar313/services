@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Plan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Plan</li>
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
                        <h3 class="box-title">Update Plan</h3>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('plans.update', [$plan]) }}">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="service_type">Select Service Type</label>
                                <select name="service_type" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($services as $service)
                                        <option @if($plan->service_id==$service->id) selected @endif value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plan_name">Plan Name</label>
                                <input type="text" class="form-control" id="plan_name" name="plan_name"
                                    placeholder="Enter Plan Name" value="{{ old('plan_name', $plan->plan_name) }}" required>
                            </div>

                            @foreach (json_decode($plan->features) as $key => $feature)
                            <div class="row" @if($key!=0) id="row-{{$key}}" @endif>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="feature">Feature</label>
                                        <input type="text" class="form-control" id="feature" name="features[]"
                                            placeholder="Enter Feature" value="{{ $feature->feature }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="feature">Status?</label>
                                        <input type="checkbox" class="flat-red" id="status" name="status[]"
                                            value="1" @if($feature->status==1) checked @endif>
                                    </div>
                                </div>
                                @if($key==0)
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>More</label>
                                            <button id="add" onclick="addMoreFeatures()" type="button" class="btn btn-sm btn-primary">+</button>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Remove</label>
                                            <button id="{{ $key }}" type="button" class="btn btn-sm btn-danger btn_remove">x</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                            <div id="dynamic_features"></div>
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

@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Price Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create Price Sheet</li>
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
                        <h3 class="box-title">Create Price Sheet</h3>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('price.sheet.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="square_foot_id">Select Square Foot</label>
                                <select name="square_foot_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($square_foots as $square_foot)
                                        <option value="{{ $square_foot->id }}">{{ $square_foot->square_foot }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="story_id">Select Story</label>
                                <select name="story_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($stories as $story)
                                        <option value="{{ $story->id }}">{{ $story->story }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plan_id">Select Plan</label>
                                <select name="plan_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Enter Price" value="{{ old('price') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control" id="time" name="time"
                                    placeholder="Enter Time" value="{{ old('time') }}" required>
                            </div>

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

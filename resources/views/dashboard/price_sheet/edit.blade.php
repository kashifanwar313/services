@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Price Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Price Sheet</li>
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
                        <h3 class="box-title">Update Price Sheet</h3>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('price.sheet.update', [$price_sheet]) }}">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="square_foot_id">Select Square Foot</label>
                                <select name="square_foot_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($square_foots as $square_foot)
                                        <option @if($square_foot->id==$price_sheet->square_foot_id) selected @endif value="{{ $square_foot->id }}">{{ $square_foot->square_foot }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="story_id">Select Story</label>
                                <select name="story_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($stories as $story)
                                        <option @if($story->id==$price_sheet->story_id) selected @endif value="{{ $story->id }}">{{ $story->story }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plan_id">Select Plan</label>
                                <select name="plan_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($plans as $plan)
                                        <option @if($plan->id==$price_sheet->plan_id) selected @endif value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Enter Price" value="{{ old('price', $price_sheet->price) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control" id="time" name="time"
                                    placeholder="Enter Time" value="{{ old('time', $price_sheet->time) }}" required>
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

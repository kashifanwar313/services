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
                    <form method="post" action="{{ route('driveway.price.sheet.update', [$driveway_price_sheet]) }}">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="driveway_sidewalk_patio_id">Select Driveway</label>
                                <select name="driveway_sidewalk_patio_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($driveways as $driveway)
                                        <option @if($driveway->id==$driveway_price_sheet->driveway_sidewalk_patio_id) selected @endif value="{{ $driveway->id }}">{{ $driveway->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nu_of_car_id">Select Number Of Cars</label>
                                <select name="nu_of_car_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($no_of_cars as $no_of_car)
                                        <option @if($no_of_car->id==$driveway_price_sheet->nu_of_car_id) selected @endif value="{{ $no_of_car->id }}">{{ $no_of_car->nu_of_cars }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plan_id">Select Plan</label>
                                <select name="plan_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($plans as $plan)
                                        <option @if($plan->id==$driveway_price_sheet->plan_id) selected @endif value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Enter Price" value="{{ old('price', $driveway_price_sheet->price) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control" id="time" name="time"
                                    placeholder="Enter Time" value="{{ old('time', $driveway_price_sheet->time) }}" required>
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

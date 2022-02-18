@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Question
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Question</li>
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
                        <h3 class="box-title">Update Question</h3>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('questions.update', [$question]) }}">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <h3 class="text-center">Question Data</h3><hr>
                            <div class="form-group">
                                <label for="service_id">Select Service</label>
                                <select name="service_id" id="service_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($services as $service)
                                        <option @if($question->service_id==$service->id) selected @endif value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="question">Enter Question</label>
                                <input type="text" class="form-control" id="question" name="question"
                                    placeholder="Enter Question" value="{{ old('question', $question->question) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="type">Select Type</label>
                                <select name="type_id" class="form-control" required>
                                    <option value="">Select</option>
                                    <option @if($question->type_id==1) selected @endif value="1">Text Field</option>
                                    <option @if($question->type_id==2) selected @endif value="2">Text Area</option>
                                    <option @if($question->type_id==3) selected @endif value="3">Dropdown</option>
                                    <option @if($question->type_id==4) selected @endif value="4">Radio Button</option>
                                    <option @if($question->type_id==5) selected @endif value="5">Checkbox</option>
                                </select>
                            </div>

                            <hr>
                            <h3 class="text-center">Options Data</h3><hr>
                            @foreach($question->options as $key => $options)
                            <div class="row" @if($key!=0) id="row-{{$key}}" @endif>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="options">Option</label>
                                        <input type="text" class="form-control" id="options" name="options[]"
                                            placeholder="Enter Option" value="{{ $options->option }}">
                                    </div>
                                </div>
                                @if($key==0)
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>More</label>
                                            <button id="add" onclick="addMoreOptions()" type="button" class="btn btn-sm btn-primary">+</button>
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

                            <hr>
                            <h3 class="text-center">Select If Options as Data</h3><hr>

                            <div class="form-group">
                                <label for="options_type_id">Select Options Type if any(optional)</label>
                                <select name="options_type_id" id="options_type_id" class="form-control">
                                    <option value="">Select</option>
                                    <option @if($question->options[0]->type_id==1) selected @endif value="1">Text Field</option>
                                    <option @if($question->options[0]->type_id==2) selected @endif value="2">Text Area</option>
                                    <option @if($question->options[0]->type_id==3) selected @endif value="3">Dropdown</option>
                                    <option @if($question->options[0]->type_id==4) selected @endif value="4">Radio Button</option>
                                    <option @if($question->options[0]->type_id==5) selected @endif value="5">Checkbox</option>
                                </select>
                            </div>


                            <div @if($question->options[0]->data_type==3 || $question->options[0]->data_type==4 || $question->options[0]->data_type==5) style="display:block;" @endif class="form-group" id="options_data_div">
                                <label for="options_data">Select Options Data to show if any(optional)</label>
                                <select name="options_data" id="options_data" class="form-control">
                                    <option value="">Select</option>
                                    <option @if($question->options[0]->data_type=='stories') selected @endif value="stories">Stories</option>
                                    <option @if($question->options[0]->data_type=='square_foot') selected @endif value="square_foot">Square Foot</option>
                                </select>
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

@extends('layouts.dashboard')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Number of Cars
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Number of Cars</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Number of Cars</h3>
                        <a href="{{ route('nu.of.cars.create') }}" class="btn btn-primary pull-right">Add New</a>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Number Of cars</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nu_of_cars as $nu_of_car)
                                    <tr>
                                        <td>{{ $nu_of_car->id }}</td>
                                        <td>{{ $nu_of_car->nu_of_cars }}</td>
                                        <td>
                                            <a href="{{ route('nu.of.cars.edit', [$nu_of_car]) }}"
                                                class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                                title="" data-original-title="Edit">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>

                                            <button type="submit" class="btn btn-sm btn-danger js-tooltip-enabled"
                                                data-toggle="tooltip" title="" data-original-title="Delete"
                                                onclick="handleDelete({{ $nu_of_car->id }})">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Number of cars</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <form action="" method="POST" id="deleteNuOfCarsForm">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Number Of cars</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go
                                                Back</button>
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                        {{-- Modal End --}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': true
            });
        });
    </script>

    <!-- DataTables -->
    <script src="{{ asset('dashboard-assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}">
    </script>

    <script>
        function handleDelete(id) {
            let form = document.getElementById('deleteNuOfCarsForm');
            form.action = '/nu-of-cars/' + id;
            $("#deleteModal").modal('show');
        }
    </script>
@endsection

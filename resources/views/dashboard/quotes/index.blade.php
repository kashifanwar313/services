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
            Quotes
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Quotes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Quotes</h3>
                    </div>
                    @include('dashboard.partials.success-error')
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-xs-4">
                            <form action="" method="GET" id="planForm">
                                <select name="plan" id="plan" class="form-control">
                                    <option value="">Select Type</option>
                                    <option @if(request()->plan==2) selected @endif value="2">Planed Quotes</option>
                                    <option @if(request()->plan==1) selected @endif value="1">Unplaned Quotes</option>
                                    <option @if(request()->plan==3) selected @endif value="3">Scheduled Quotes</option>
                                </select>
                            </form>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ URL::to('/quote/pdf') }}">Export to Excel</a>
                        </div>

                        <br><br><br>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Contact Detail</th>
                                    <th>Number Of Floor</th>
                                    <th>Square Foot</th>
                                    <th>Services</th>
                                    <th>Estimated Time</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotes as $quote)
                                    <tr>
                                        <td>{{ $quote->id }}</td>
                                        <td>
                                            <a style="cursor: pointer;" onclick="handleDetail({{ $quote->id }})">
                                                Contact Detail
                                            </a>
                                        </td>
                                        <td>{{ $quote->story->story }}</td>
                                        <td>{{ $quote->houseSquareFootageKnow ? $quote->houseSquareFootageKnow : $quote->square_foot->square_foot }}</td>
                                        <td>
                                            @for($i=0; $i<count($quote->Services); $i++)
                                                {{"=> ".App\Models\Service::where('id', $quote->Services[$i])->first()->name }}<br>
                                            @endfor
                                        </td>
                                        <td>{{ $quote->total_estimated_time }}</td>
                                        <td>{{ $quote->total_amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Contact Detail</th>
                                    <th>Number Of Floor</th>
                                    <th>Square Foot</th>
                                    <th>Services</th>
                                    <th>Estimated Time</th>
                                    <th>Total Amount</th>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Modal -->
                        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Quote Details</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
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
        function handleDetail(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var request = $.ajax({
                url: "/quote-details",
                type: "POST",
                data: {id : id},
                dataType: "html"
            });

            request.done(function(msg) {
                $(".modal-body").html(msg);
                $("#detailModal").modal('show');
            });

        }

        $("#plan").on('change', function(){
            let form = document.getElementById('planForm');
            form.action = '/quotes';
            form.submit();
        });
    </script>

    <!-- DataTables -->
    <script src="{{ asset('dashboard-assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endsection

{{--
    @if ($quote->quote_status == 1) {{ "Without Plan Selected" }}
    @elseif($quote->quote_status == 2) {{ "Plan Selected" }}
    @elseif($quote->quote_status == 3) {{ "Not Scheduled" }}
    @endif
--}}

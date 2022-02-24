<div class="col-xs-12">
    <div class="box">
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th>ID#</th>
              <th>Quote Status</th>
              <th>Stories</th>
              <th>Square Foot</th>
              <th>House Wash</th>
              <th>Services</th>
              <th>Note</th>
              <th>Roof</th>
              <th>Driveway</th>
              <th>Contact Details</th>
              <th>Signature</th>
              <th>Total Estimated Time</th>
              <th>Total Amount</th>

            </tr>
            @foreach($quotes as $quote)
                <tr>
                    <td>{{ $quote->id }}</td>
                    <td>
                        @if ($quote->quote_status == 1) {{ " Unplan Quote" }}
                        @elseif($quote->quote_status == 2) {{ "Planed Quote" }}
                        @elseif($quote->quote_status == 3) {{ "Scheduled Quote" }}
                        @endif
                    </td>
                    <td>{{ $quote->story->story }}</td>
                    <td>{{ $quote->houseSquareFootageKnow ? $quote->houseSquareFootageKnow : $quote->square_foot->square_foot }}</td>
                    <td>
                        @foreach(json_decode($quote->houseWash) as $key => $houseWash)
                            {{ ++$key }}:{{ $houseWash }}
                        @endforeach
                    </td>
                    <td>
                        @foreach($quote->Services as $key =>  $service)
                            {{ ++$key.".".App\Models\Service::where('id', $service)->first()->name }}
                        @endforeach
                    </td>
                    <td>{{ $quote->note }}</td>
                    <td>
                        @foreach(json_decode($quote->roof) as $key => $roof)
                            {{ $key }}:{{ $roof }}
                        @endforeach
                    </td>
                    <td>
                        @foreach(json_decode($quote->driveway) as $key => $driveway)
                            @if($key=='selectedDrivewayOptions')
                            '=>selectedDrivewayOptions':
                                {
                                    @foreach ($driveway as $key => $driveway )
                                        {{ $key }} : {{ $driveway }}
                                    @endforeach
                                }
                            @else
                                {{ $key }}:{{ $driveway }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach(json_decode($quote->contact) as $key => $contact)
                            {{ $key }}:{{ $contact }}
                        @endforeach
                    </td>
                    <td>{{ $quote->signature }}</td>
                    <td>{{ $quote->total_estimated_time }}</td>
                    <td>{{ $quote->total_amount }}</td>
                </tr>
            @endforeach
          </table>
        </div>
      </div>
  </div>

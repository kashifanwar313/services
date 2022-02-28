<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Details</h3>
    </div>
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th>Label</th>
          <th>Value</th>
        </tr>
        @foreach ($details as $contact)
        @foreach (json_decode($contact->contact) as $key => $value)
        <tr>
          <td>{{ $key }}</td>
          <td>{{ $value }}</td>
        </tr>
        @endforeach
        <tr>
          <td>signature</td>
          <td>{{ $contact->signature }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

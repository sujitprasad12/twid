<!DOCTYPE html>
<html lang="en">
<head>
    <title>TWID</title>
    <style type="text/css">

    </style>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body class="container-fluid">
   @if(Session::has('message'))
   <span style="color:orange">{!! Session::get('message') !!}</span>
   @endif
   <form action="{!! route('upload') !!}" method="post" enctype="multipart/form-data">
      @csrf
      <br/>
      <input type="file" name="file" class="btn btn-info" id="file">
      <br/>
      <input type="submit" class="btn btn-primary" value="Submit">
      <br/>
   </form>

@if(count($pincodes))

   {!! $pincodes->links() !!} 
   Total - {!! $pincodes->total() !!} records
   <br/><br/>
   <table class="table table-bordered table-responsive">
      <thead>
         <tr>
            <th>Pincode</th>
            <th>Office</th>
            <th>Office Type</th>
            <th>Delivery Status</th>
            <th>Division</th>
            <th>Region</th>
            <th>Circle</th>
            <th>Taluk</th>
            <th>District</th>
            <th>State</th>
         </tr>
      </thead>
   @foreach($pincodes as $pincode) 
      <tbody>
         <tr>
            <td>{!! $pincode->pincode !!}</td>
            <td>{!! $pincode->office !!}</td>
            <td>{!! $pincode->office_type !!}</td>
            <td>{!! $pincode->delivery_status !!}</td>
            <td>{!! $pincode->division !!}</td>
            <td>{!! $pincode->region !!}</td>
            <td>{!! $pincode->circle !!}</td>
            <td>{!! $pincode->taluk !!}</td>
            <td>{!! $pincode->district !!}</td>
            <td>{!! $pincode->state !!}</td>
         </tr>
      </tbody>
   @endforeach
   </table>
   {!! $pincodes->links() !!}

@endif

</body>
</html>
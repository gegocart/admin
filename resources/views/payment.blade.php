<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.4 - Payment gateway using Paytm</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container">
    <div class="panel panel-primary" style="margin-top:30px;">
        <div class="panel-heading"><h2 class="text-center">Laravel 5.4 - Payment gateway using Paytm</h2></div>
        <div class="panel-body">
            <form action="{{ url('payment') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


                {!! csrf_field() !!}


                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="row">
                    <div class="col-md-12">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-12">
                        <strong>Mobile No:</strong>
                        <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No.">
                    </div>
                    <div class="col-md-12">
                        <strong>Address:</strong>
                        <textarea class="form-control" placeholder="Address" name="address"></textarea>
                    </div>
                    <div class="col-md-12">
                        <br/>
                        <div class="btn btn-info btn-block">
                            Event Fee : 50 Rs/-
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br/>
                        <button type="submit" class="btn btn-success btn-block">Pay to PatTM</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


</body>
</html>
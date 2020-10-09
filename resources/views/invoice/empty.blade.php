
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Label</title>
</head>
<body>
   
@foreach($pages as $page)
    <div style="page-break-after:always;">
        {!! $page !!}
    </div>
@endforeach
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($departments as $department)

    <h4>{{ $department->name }}</h4>
<div>
   {{$department->code}}
</div>

    @endforeach
</body>
</html>
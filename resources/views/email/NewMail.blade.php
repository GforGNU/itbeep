<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> This is a test email -  itBeep </h3>

    <h3> Hello {{ $data['name'] }} </h3>
    <h3> You have chosen the following services:   </h3>
    <ul>
    @if($data['service_one'] != "")
    <li>{{ $data['service_one'] }}</li>
    @endif

    @if($data['service_two'] != "")
    <li>{{ $data['service_two'] }}</li>
    @endif

    @if($data['service_three'] != "")
    <li>{{ $data['service_three'] }}</li>
    @endif
    </ul>
    <h3> With this interest level:  {{ $data['interest_level'] }}  </h3>
</body>
</html>
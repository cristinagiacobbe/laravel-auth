<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Lead Message</title>
</head>

<body>
    <p>You received a new message:
    <h3>from:</h3> {{ $lead->name }}
    </p>
    <p>
    <h3>mail:</h3> {{ $lead->mail }}
    </p>
    <p>
    <h3>message:</h3> {{ $lead->message }}
    </p>
</body>

</html>

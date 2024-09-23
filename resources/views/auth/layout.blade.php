<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('app.css') }}">
    <title>Auth</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            max-width: 90%;
            width: 400px;
            background-color: white;
            padding: 1.5rem;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
            border-radius: 18px;
        }

        button {
            width: 100%;
        }

        a {
            margin-top: 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: deeppink;
        }
    </style>
</head>

<body>

    @if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @session('success')
    <div class="success">
        {{ $value }}
    </div>
    @endsession


    @yield("content")
</body>

</html>
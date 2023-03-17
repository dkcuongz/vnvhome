<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 Erro</title>
    <link href="{{asset('asset/javascript/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen"/>
    <style>
        .full-auto {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-content: center;
            width: 100vw;
        }

        .full-width {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="full-auto">
    <div class="alert alert-danger text-center full-width">
        <h1 class="display-3">500</h1>
        <br>
        <p class="display-5">Oops! Something went wrong.</p>
    </div>
</div>
</body>
</html>

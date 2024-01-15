<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if (auth()->check())
        <script>
            window.Laravel = {!!
                    json_encode([
                        'isloggedin' => true,
                        'user' => auth()->user(),
                        'token' => session('token')
                    ])
                !!}
        </script>
    @else
        <script>
            window.Laravel = {!!
                    json_encode([
                        'isloggedin' => false
                    ])
                !!}
        </script>
    @endif

        <div id="app">

        </div>
    @vite('resources/js/vue/main.js')
</body>
</html>
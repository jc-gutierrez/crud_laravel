<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | @yield("titulo")</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/producto">CRUD PRODUCTOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        
    </nav>

    @yield("contenedor")


    <script src="{{ asset('js/jquery.js') }}"> </script>
    <script src="{{ asset('js/bootstrap.js') }}"> </script>
</body>

</html>
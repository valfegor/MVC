<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <h2>Listado de Productos</h2>
                <br /><br />
                <table border="1">
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>precio</th>
                    </tr>
                    @if (count($productos) < 1)
                        <tr>
                            <td colspan="6">No existen productos registrados</td>
                        </tr>
                    @elseif (count($productos) >= 1)
                        @foreach ($productos as $i => $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->name }}</td>
                            <td>{{ $producto->description }}</td>
                            <td>{{ $producto->brand }}</td>
                            <td>{{ $producto->category }}</td>
                            <td>{{ $producto->price }}</td>
                        </tr>
                        @endforeach
                    @endif
                </table>
                <br /><br />

                h2>Adicionar Producto</h2>

{!! Form::open([ 'route' => [ 'producto' ], 
                'files' => true, 
                'enctype' => 'multipart/form-data',  
                "method" => "POST", "class" => "form-horizontal",
                "id" => "register-frm",
                "accept-charset" => "UTF-8"]) 
!!}
    <table border="1">
        <tr>
            <td>Nombre: <input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Descripción: <input type="text" name="description"></td>
        </tr>
        <tr>
            <td>Marca: <input type="text" name="brand"></td>
        </tr>  
        <tr>  
            <td>Categoria: <input type="text" name="category"></td>
        </tr>
        <tr>
            <td>precio: <input type="number" name="price"></td>
        </tr>
        <tr>

    </table>
    <input type="submit" value="Registrar">
{!! Form::close() !!}
            </div>
        </div>
    </body>
</html>
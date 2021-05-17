<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <a href="{{ url('add-data') }}" class="btn btn-primary my-3">Add New</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add modal
        </button>
        @if (Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif <table class="table">
                <tr>
                    <td>ID</td>
                    <td>NOME:</td>
                    <td>IDADE</td>
                    <td>ACOES</td>
                </tr>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>
                            <a href="{{ url('/edit-data/' . $cliente->id) }}" class="btn btn-success">Editar</a>
                            <a href="{{ url('/delete/' . $cliente->id) }}" class="btn btn-danger">Apagar</a>
                            <a href="{{ url('/') }}" class="btn btn-danger">Show</a>
                        </td>
                    </tr>
                @endforeach
            </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome">
                            @error('nome')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <a href="{{asset('books/create')}}" class="btn btn-primary mt-3">Dodaj nową książkę</a>
            <table class="table table-active mt-5">
                <thead>
                    <th>Id</th>
                    <th>Nazwa</th>
                    <th>Autor</th>
                    <th>Cena</th>
                    <th>Rok wydania</th>
                    <th>Typ wydania</th>
                    <th>Edycja</th>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book['ID']}}</td>
                            <td>{{$book['BookName']}}</td>
                            <td>{{$book['Author']}}</td>
                            <td>{{$book['Price']}}</td>
                            <td>{{$book['Year']}}</td>
                            <td>{{$book['Type']}}</td>
                            <td><a href="{{asset('books/edit/'.$book['ID'])}}" class="btn btn-dark">Edycja</a></td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>

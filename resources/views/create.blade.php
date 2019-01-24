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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <a href="{{ route('books') }}" id="back" class="btn btn-dark return float-right"><span class="fa fa-arrow-left"></span> Powrót</a>

                {!! Form::open(['route' => ["book.store"]]) !!}

                <div class="col-lg-6 offset-3">
                    {{ Form::label('title', "Tytuł książki")}}
                    {{ Form::text('title', '', ['class' => 'form-control']) }}
                </div>

                <div class="col-lg-6 offset-3">
                    {{ Form::label('author', "Autor")}}
                    {{ Form::text('author', '', ['class' => 'form-control']) }}
                </div>

                <div class="col-lg-6 offset-3">
                    {{ Form::label('year', "Rok wydania")}}
                    {{ Form::number('year', '', ['class' => 'form-control']) }}
                </div>

                <div class="col-lg-6 offset-3">
                    {{ Form::label('price', "Cena")}}
                    {{ Form::text('price', '', ['class' => 'form-control']) }}
                </div>

                <div class="col-lg-6 offset-3">
                    {{ Form::label('type', "Rodzaj wydania")}}
                    {{ Form::select('type', ['Audiobook' => 'Audiobook', 'Papier' => 'Papier', 'PDF' => 'PDF'],'', ['class' => ['form-control', 'selecticker']]) }}
                </div>

                <div class="col-lg-2 offset-3 mt-5">
                    {{ Form::button('<span class="glyphicon glyphicon-send"></span> Zapisz', ['class' => 'btn btn-success', 'name' => 'submit-btn', 'type' => 'submit', 'id' => 'submit-btn']) }}
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>

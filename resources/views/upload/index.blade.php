@extends('layouts.main')

@section('content')
    <h1>Загрузка файлов</h1>

    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif

    <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="file" name="file" id="file">

        <br>
        <input class="button-primary" value="Добавить" type="submit">
    </form>

    <p>
        @foreach ($files as $file)
            <a href="/uploads/{{$file->getFilename()}}" target="_blank">{{$file->getFilename()}}</a><br>
        @endforeach
    </p>
@endsection

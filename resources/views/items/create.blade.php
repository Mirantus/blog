@extends('layouts.main')

@section('content')
    <h1>Добавление</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/items">
        {{ csrf_field() }}

        <label for="title">Заголовок</label>
        <input id="title" type="text" name="title" value="{{ old('title') }}" required class="u-full-width">

        <label for="text">Текст</label>
        <textarea id="text" name="text" required class="u-full-width">{{ old('text') }}</textarea>

        <label for="tags">Метки</label>
        <textarea id="tags" name="tags" class="u-full-width">{{ old('tags') }}</textarea>

        @include('items.tags_edit')

        <label>
            <input type="checkbox" name="published" {{ old('published', true) ? 'checked' : '' }}> Опубликовать
        </label>

        <br>
        <input class="button-primary" value="Добавить" type="submit">
    </form>
@endsection

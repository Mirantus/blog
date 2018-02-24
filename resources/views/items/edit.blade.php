@extends('layouts.main')

@section('content')
    <h1>Редактирование</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/items/{{ $item->id  }}">
        {{ csrf_field() }}

        <input name="_method" type="hidden" value="PUT">

        <label for="title">Заголовок</label>
        <input id="title" type="text" name="title" value="{{ old('title', $item->title) }}" required class="u-full-width">

        <label for="text">Текст</label>
        <textarea id="text" name="text" required class="u-full-width">{{ old('text', $item->text) }}</textarea>

        <label for="tags">Метки</label>
        <textarea id="tags" name="tags" class="u-full-width">{{ old('tags', $item->tags) }}</textarea>

        @include('items.tags_edit')

        <label>
            <input type="checkbox" name="published" {{ old('published', $item->published) ? 'checked' : '' }}> Опубликовать
        </label>

        <br>
        <input class="button-primary" value="Сохранить" type="submit">
    </form>

    <? $isHtml = strip_tags($item->text) != $item->text; ?>

    @if($isHtml || $item->text == '')
        @include('items.wysiwyg')
    @endif
@endsection

@extends('layouts.main')

@section('content')
    <h1>{{ $item->title }}</h1>

    <p>
        @foreach(explode("\n", $item->tags) as $key => $tag)
            <? $tag = trim($tag); ?>
            <a href="{{ URL::to('/tag/' . $tag) }}">{{ $tag }}</a> &nbsp;
        @endforeach
    </p>

    <?
            $isHtml = strip_tags($item->text) != $item->text;
            $style = $isHtml ? '' : 'style="white-space: pre-line"';
    ?>

    <div <?=$style?>>
        {!! $item->text !!}
    </div>

    <p>
        <br>
        <time>{{ $item->date }}</time>
    </p>
@endsection



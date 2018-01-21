@extends('layouts.main')

@section('content')
    @include('items.tags')
    <hr>
    {{--<div>--}}
        {{--<hr>--}}
        {{--<a href="{{ URL::to('/create') }}">добавить</a>--}}
    {{--</div>--}}
    @include('items.items')
@endsection


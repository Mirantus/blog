@extends('layouts.main')

@section('content')
    @include('items.tags')
    <hr>
    @auth
        <div>
            <a href="{{ URL::to('/items/create') }}">добавить</a>
            <hr>
        </div>
    @endauth
    @include('items.items')
@endsection


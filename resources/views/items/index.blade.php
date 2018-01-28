@extends('layouts.main')

@section('content')
    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
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


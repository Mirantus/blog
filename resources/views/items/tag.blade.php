@extends('layouts.main')

@section('content')
    <h1>{{ $tag }}</h1>
    @include('items.items')
@endsection

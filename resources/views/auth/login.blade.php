@extends('layouts.main')

@section('content')
<h1>Вход</h1>
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <label for="username">Логин</label>
    <input id="username" type="text" name="username" value="{{ old('username') }}" required>

    @if ($errors->has('username'))
        {{ $errors->first('username') }}
    @endif

    <label for="password">Пароль</label>
    <input id="password" type="password" name="password" required>
    @if ($errors->has('password'))
        {{ $errors->first('password') }}
    @endif

    <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
    </label>

    <input class="button-primary" value="Войти" type="submit">
</form>
@endsection

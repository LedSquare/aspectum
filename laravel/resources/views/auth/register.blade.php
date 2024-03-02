@extends('layouts.app')

@section('content')
<div class="form-box">
    <div class="form-value">
        <form action="{{ route('register') }}" method="POST"> @csrf
            <h2>Регистрация</h2>
                <x-auth.input id="username" type="username" name="username">Логин:</x-auth.input>
                <x-auth.input id="email" type="email" name="email">Почта:</x-auth.input>
                <x-auth.input id="phone" type="phone" name="phone">Телефон:</x-auth.input>
                <x-auth.input id="password" type="password" name="password">Пароль:</x-auth.input>
                <x-auth.input id="firstname" type="firstname" name="firstname">Имя:</x-auth.input>
                <x-auth.input id="lastname" type="lastname" name="lastname">Фамилия:</x-auth.input>
                <x-auth.input id="fathername" type="fathername" name="fathername">Отчество:</x-auth.input>
                <x-auth.input id="gender" type="gender" name="gender">Пол:</x-auth.input>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</div>
@endsection

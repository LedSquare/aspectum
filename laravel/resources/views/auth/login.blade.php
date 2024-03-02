@extends('layouts.app')

@section('content')
<div class="form-box">
    <div class="form-value">
        <form action="{{ route('login') }}" method="POST"> @csrf
            <h2>Авторизация</h2>
            <div class="input-group">
                <ion-icon name="mail-outline"></ion-icon>
                <x-input id="email" type="email" name="email">Почта:</x-input>
            </div>
            <div class="input-group">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <x-input id="password" type="password" name="password">Пароль:</x-input>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox">Запомнить<a href="#">, забыли пароль?</a></label>
            </div>
            <button type="submit">Войти</button>
            <div class="register-box">
                <p> <a href="#">Зарегистрироваться</a></p>
            </div>
        </form>
    </div>
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection

<header class="flex-c">

<div>
    <nav>

        <ul>
            <li><x-link>Домой</x-link></li>
            <li><x-link>Контакты</x-link></li>
        </ul>

        @if ($user = auth()->user())
            <div> Пользователь:{{ " $user->firstname, $user->lastname" }} </div>
        @endif

        <ul class="auth-ul">

            <li>
                {{-- TODO: Добавить разные роуты --}}
                <x-link route='login'>Личный кабинет</x-link>
            </li>
        </ul>
    </nav>
</div>

</header>

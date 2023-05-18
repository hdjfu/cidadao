<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="inputItem" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="input">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="inputItem" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="terms">
                <label for="remember_me" class="divTerms">
                    <x-checkbox class="inputCheck"  id="remember_me" name="remember" />
                    <span cclass="termsText">{{ __('Lembrar de mim') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="forgPass" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Entrar') }}
                </x-button>
                <x-button class="ml-4">
                    <a href="/register">Registra-se</a>
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

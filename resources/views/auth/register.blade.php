<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors />

        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            
            <div class="input">
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="inputItem" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="input">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="inputItem" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <div class="input">
                <label for="email" value="label" >Cep</label>
                <input  class="inputItem" >
            </div>
            <div class="input">
                <x-label for="email" value="{{ __('Username') }}" />
                <x-input id="email" class="inputItem" type="text" name="username" :value="old('username')" required autocomplete="username" />
            </div>

            <div class="input">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="inputItem" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="input">
                <x-label for="password_confirmation" value="{{ __('Confirmar senha') }}" />
                <x-input id="password_confirmation" class="inputItem" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="terms">
                    <x-label for="terms">
                        <div class="divTerms">
                            <x-checkbox class="inputCheck" name="terms" id="terms" required />

                            <div class="termsText">
                                {!! __('Eu li e aceito os :terms_of_service e :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Termos de serviço').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de privacidade').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="alreadyHas">
                <a class="alreadyHasLink" href="{{ route('login') }}">
                    {{ __('Já tem uma conta?') }}
                </a>

                <x-button class="register">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

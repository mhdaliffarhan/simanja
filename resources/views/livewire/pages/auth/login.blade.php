<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="Logo" class="h-full max-h-16 object-contain">
                                <span class="d-none d-lg-block">Sistem Informasi Database Pengadaan Barang dan
                                    Jasa</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                </div>

                                <form wire:submit.prevent="login" class="row g-3 needs-validation" novalidate>

                                    <!-- Username Address -->
                                    <div class="col-12">
                                        <x-input-label for="username" :value="__('Username')" />
                                        <x-text-input wire:model="form.username" id="username" class="form-control"
                                            type="text" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('form.username')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="col-12 mb-3">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input wire:model="form.password" id="password" class="form-control"
                                            type="password" required autocomplete="current-password" />
                                        <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                                    </div>

                                    {{-- <!-- Remember Me -->
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input wire:model="form.remember" id="remember" type="checkbox"
                                                class="form-check-input" name="remember">
                                            <label class="form-check-label"
                                                for="remember">{{ __('Ingat saya') }}</label>
                                        </div>
                                    </div> --}}

                                    <div class="col-12 mb-5">
                                        <button class="btn btn-primary w-100"
                                            type="submit">{{ __('Masuk') }}</button>
                                    </div>

                                    {{-- <div class="col-12">
                                        <p class="small mb-0">Don't have an account? <a
                                                href="{{ route('register') }}">Create an account</a></p>
                                    </div> --}}
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>

</div>

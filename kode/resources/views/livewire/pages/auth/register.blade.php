<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
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
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div><!-- End Logo -->
    
                        <div class="card mb-3">
    
                            <div class="card-body">
    
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>
    
                                <form wire:submit.prevent="register" class="row g-3 needs-validation" novalidate>
    
                                    <!-- Name -->
                                    <div class="col-12">
                                        <x-input-label for="name" :value="__('Your Name')" />
                                        <x-text-input wire:model="name" id="name" class="form-control" type="text" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
    
                                    <!-- Email Address -->
                                    <div class="col-12">
                                        <x-input-label for="email" :value="__('Your Email')" />
                                        <x-text-input wire:model="email" id="email" class="form-control" type="email" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
    
                                    <!-- Password -->
                                    <div class="col-12">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input wire:model="password" id="password" class="form-control" type="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
    
                                    <!-- Confirm Password -->
                                    <div class="col-12">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-text-input wire:model="password_confirmation" id="password_confirmation" class="form-control" type="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
    
                                    <!-- Accept Terms -->
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">
                                                I agree and accept the <a href="#">terms and conditions</a>
                                            </label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">{{ __('Create Account') }}</button>
                                    </div>
    
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                                    </div>
                                </form>
    
                            </div>
                        </div>
    
                        <div class="credits">
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
    
                    </div>
                </div>
            </div>
    
        </section>
    
    </div>
</div>

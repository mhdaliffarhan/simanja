<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $username = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->username = Auth::user()->username;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        $user->save();

        $this->dispatch('profile-updated', username: $user->username);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h5 class="card-title">
            {{ __('Informasi Profil') }}
        </h5>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div class="row-mb-3">
            <div class="col-12 col-md-10">
                <x-action-message class="me-3 mb-3" on="profile-updated">
                    {{ __('Profil berhasil diperbarui.') }}
                </x-action-message>
                <x-input-error class="me-3 mb-3" :messages="$errors->get('username')" />
            </div>
        </div>
        <div class="row mb-3">
            <x-input-label for="username" :value="__('username')" />
            <div class="col-sm-12">
                <x-text-input wire:model="username" id="username" username="username" type="text"
                    class="mt-1 block w-full" required autofocus autocomplete="username" />
            </div>
        </div>

        {{-- <div class="row mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <div class="col-sm-12">
                <x-text-input wire:model="email" id="email" username="email" type="email" class="mt-1 block w-full"
                    required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div> --}}

        <div class="row justify-content-start">
            <div class="col-12 col-md-10 mb-3">
                <x-primary-button>
                    {{ __('Simpan') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</section>

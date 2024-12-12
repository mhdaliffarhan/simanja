<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section>
    <header>
        <h5 class="card-title mb-0">
            {{ __('Perbarui Password') }}
        </h5>
    </header>

    <form wire:submit="updatePassword" class="space-y-6">
        <div class="row mb-3">
            <div class="col-12 col-md-12">
                <x-action-message class="me-3" on="password-updated">
                    {{ __('Password berhasil diperbarui!') }}
                </x-action-message>
                <x-input-error :messages="$errors->get('current_password')" class="" />
                <x-input-error :messages="$errors->get('password')" class="" /> 
                <x-input-error :messages="$errors->get('password_confirmation')" class="" />
            </div>
        </div>
        <div class="row mb-3">
            <x-input-label for="update_password_current_password" :value="__('Password Sekarang')" />
            
            <div class="col-sm-12">
                <x-text-input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            </div>
        </div>

        <div class="row mb-3">
            <x-input-label for="update_password_password" :value="__('Password Baru')" />
            <div class="col-sm-12">
                <x-text-input wire:model="password" id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            </div>
        </div>

        <div class="row mb-3">
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password')" />
            <div class="col-sm-12">
                <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            </div>
        </div>

        <div class="row justify-content-start">
            <div class="col-12 col-md-10 mb-3">
                <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            </div>
        </div>
    </form>
</section>

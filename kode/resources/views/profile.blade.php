<x-app-layout>
    <x-slot name="breadcrumb"><div class="row pagetitle">
        <h1>Profil</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profil</li>
          </ol>
        </nav>
      </div>
    </x-slot>

    <section>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <livewire:profile.update-profile-information-form />
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <livewire:profile.update-password-form />
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:profile.delete-user-form />
                    </div>
                </div>
            </div>
        </div> --}}
    
    </section>
</x-app-layout>

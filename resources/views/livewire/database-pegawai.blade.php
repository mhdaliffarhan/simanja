<x-slot name="breadcrumb">
  <div class="row pagetitle">
    <h1>Database Pegawai</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item  active">Database Pegawai</li>
      </ol>
    </nav>
  </div>
</x-slot>

<section>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            @include('components.data-pegawai.datatables')
          </div>
        </div>
      </div>
    </div>
  </section>
<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item  active">Transaksi</li>
            </ol>
        </nav>
    </div>
</x-slot>
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            @include('components.transaksi.datatable')
        </div>
    </div>
</section>

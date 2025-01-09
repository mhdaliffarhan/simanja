<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Daftar Pengentri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Pengentri</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto me-auto">
                            <h5 class="card-title">Daftar Pengentri</h5>
                        </div>
                        <div class="col-auto mt-3 mb-3">
                            @include('components.daftar-admin.modal-add')
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $index => $item)
                                    <tr class="text-center align-middle">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>
                                            @include('components.daftar-admin.modal-delete')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

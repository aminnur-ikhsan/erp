<div>
    {{-- Button Actions Card --}}
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Akun
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-file-earmark-excel me-1"></i> Export
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-printer me-1"></i> Cetak
                </button>
            </div>
        </div>
    </div>

    {{-- Account Type Cards --}}
    <div class="row g-3 mb-4">
        {{-- Left Column --}}
        <div class="col-lg-6">
            {{-- Harta (Debet) --}}
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Harta (Debet)</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 15%">Ref</th>
                                    <th style="width: 60%">Nama Akun</th>
                                    <th style="width: 25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts['assets'] as $account)
                                <tr>
                                    <td>{{ $account['ref'] }}</td>
                                    <td>{{ $account['name'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle px-3" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="edit('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger"
                                                        wire:click.prevent="delete('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Beban (Debit) --}}
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">Beban (Debit)</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 15%">Ref</th>
                                    <th style="width: 60%">Nama Akun</th>
                                    <th style="width: 25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts['expense'] as $account)
                                <tr>
                                    <td>{{ $account['ref'] }}</td>
                                    <td>{{ $account['name'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle px-3" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="edit('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger"
                                                        wire:click.prevent="delete('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column --}}
        <div class="col-lg-6">
            {{-- Hutang (Kredit) --}}
            <div class="card mb-3">
                <div class="card-header bg-warning text-dark">
                    <h5 class="card-title mb-0">Hutang (Kredit)</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 15%">Ref</th>
                                    <th style="width: 60%">Nama Akun</th>
                                    <th style="width: 25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts['liabilities'] as $account)
                                <tr>
                                    <td>{{ $account['ref'] }}</td>
                                    <td>{{ $account['name'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle px-3" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="edit('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger"
                                                        wire:click.prevent="delete('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Modal (Kredit) --}}
            <div class="card mb-3">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Modal (Kredit)</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 15%">Ref</th>
                                    <th style="width: 60%">Nama Akun</th>
                                    <th style="width: 25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts['equity'] as $account)
                                <tr>
                                    <td>{{ $account['ref'] }}</td>
                                    <td>{{ $account['name'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle px-3" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="edit('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger"
                                                        wire:click.prevent="delete('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Pendapatan (Kredit) --}}
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0">Pendapatan (Kredit)</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 15%">Ref</th>
                                    <th style="width: 60%">Nama Akun</th>
                                    <th style="width: 25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts['revenue'] as $account)
                                <tr>
                                    <td>{{ $account['ref'] }}</td>
                                    <td>{{ $account['name'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle px-3" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="edit('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger"
                                                        wire:click.prevent="delete('revenue', '{{ $account['ref'] }}')"
                                                        href="#">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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
</div>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Pegawai</h1>

    <div class="row">
        <!-- START FORM -->
        <div class="my-2 p-3 bg-body rounded shadow-sm col-8">
            <form>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" wire:model="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="address">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        @if (!$isEdit)
                            <button type="button" class="btn btn-primary" name="submit" wire:click="save">
                                SIMPAN
                            </button>
                        @else
                            <button type="button" class="btn btn-success" name="submit" wire:click="update">
                                UPDATE
                            </button>
                        @endif
                            <button type="button" class="btn btn-light" name="submit" wire:click="resetAll">
                                CLEAR
                            </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        <!-- START ALERT -->
        <div class="col-4">
            @if (session()->has('success'))
                <div class="my-3 alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="my-3 alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <!-- START ALERT -->
    </div>

    <!-- START DATA -->
    <div class="row">
        <div class="my-2 p-3 bg-body rounded shadow-sm">
            <h1>Data Pegawai</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Nama</th>
                        <th class="col-md-3">Email</th>
                        <th class="col-md-2">Alamat</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" wire:click="edit({{ $key }})">Edit</button>
                            <button
                                type="button"
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                wire:click="confirmToDelete({{ $key }})"
                            ><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!-- AKHIR DATA -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:click.outside="resetAll">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="resetAll"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click="delete" data-bs-dismiss="modal">Iya</button>
                <button type="button" class="btn btn-secondary" wire:click="resetAll" data-bs-dismiss="modal">Tidak</button>
            </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
</div>

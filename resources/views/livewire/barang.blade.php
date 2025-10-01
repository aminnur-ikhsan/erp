<div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Barang</h1>

        @if (!$isDetailShow)
        <!-- DASHBOARD -->
        <div>
            <!-- START ALERT -->
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
            <!-- START ALERT -->

            <!-- Navigation Card -->
            <div class="card my-2 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="d-flex align-items-center btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahBarang" wire:click="clearAll">
                            <i class="fas fa-plus me-1"></i>
                            Tambah
                        </button>
                        <input type="text" wire:model.live.debounce.300ms="keySearch" class="form-control" placeholder="Cari barang">
                    </div>
                </div>
            </div>
            <!-- Navigation Card END -->

            <!-- Products Grid -->
            <div class="container pb-4">
                <!-- Pagination Top -->
                {{ $itemList->links() }}
                <!-- Item List -->
                <div class="row">
                    @foreach ($itemList as $key => $item)
                        <div class="col-6 col-sm-2 p-2">
                            <div class="card bg-transparent border-0 mb-2" style="cursor: pointer" wire:click="showDetail('{{ $item->id_stock }}')">
                                <img src="/images/default-image.jpg" class="card-img-top rounded-3">
                                <div class="card-body text-center p-0 pt-1">
                                    {{ $item->item_name }}
                                    <p class="card-text"><small class="text-muted">{{ $item->item_key_number }}</small></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination Bottom -->
                {{ $itemList->links() }}
            </div>
            <!-- Products Grid END -->
        </div>
        <!-- DASHBOARD END -->
        @else
        <!-- DETAIL -->
        <div>
            <div class="container bg-white pt-3">
                <!-- Nama Produk -->
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-default" wire:click="backToDashboard">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </button>
                    <h2 class="text-xl font-bold mb-4">{{ $dataDetail['item_name'] }}</h2>
                </div>

                <div class="row pb-4">
                    <!-- Gambar Produk (Kiri) -->
                    <div class="col-md-5">
                        <img src="/images/default-image.jpg"
                             class="img-fluid rounded" alt="Headphone Sony">
                    </div>

                    <!-- Data Produk (Kanan) -->
                    <div class="col-md-7">
                        <div class="card border-0">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Kode Produk</td>
                                            <td>: {{ $dataDetail['item_key_number'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Kategori</td>
                                            <td>: {{ $dataDetail['item_category'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Stok</td>
                                            <td>: {{ $dataDetail['item_stock'] }} unit</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Harga</td>
                                            <td>: Rp {{ number_format($dataDetail['item_price'], 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Status</td>
                                            <td>:
                                                <span class="badge bg-{{ $dataDetail['item_status'] == 'Aktif' ? 'success' : 'danger' }}">
                                                    {{ $dataDetail['item_status'] == 'Aktif' ? 'Tersedia' : 'Tidak Tersedia' }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Tombol Aksi -->
                                <div class="d-flex gap-2 mt-4">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit me-1"></i> Ubah
                                    </button>
                                    <button class="btn btn-danger" wire:click="archive('{{ $dataDetail['id_stock'] }}')">
                                        <i class="fa-solid fa-archive me-1"></i> Arsipkan
                                    </button>
                                    <button class="btn btn-success">
                                        <i class="fas fa-shopping-cart me-1"></i> Buat Pengadaan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- DETAIL END -->
        @endif

        <!-- Modal -->
        <div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="tambahBarangLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBarangLabel">Menambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama barang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" wire:model="dataStore.item_name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nomor kemasan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" wire:model="dataStore.item_barcode">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="store">Simpan</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal END -->
    </div>
</div>

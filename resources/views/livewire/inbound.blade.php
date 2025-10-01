<div>
    <div class="my-2 p-3 bg-body rounded shadow-sm">
        {{-- Navigation Start --}}
        <div class="my-2 p-3">
            <div class="d-flex row">
                <div class="col-lg-2 my-1">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="1" wire:click="changeShow(1)">1 baris</option>
                        <option value="2" wire:click="changeShow(2)">2 baris</option>
                        <option value="10" wire:click="changeShow(10)">10 baris</option>
                        <option value="25" wire:click="changeShow(25)">25 baris</option>
                        <option value="50" wire:click="changeShow(50)">50 baris</option>
                    </select>
                </div>
                <div class="col-lg-7 my-1">
                    <input type="text" class="form-control form-control-sm w-full" placeholder="Cari..."
                        wire:model="search">
                </div>
                <div class="col-lg-1 my-1">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Aksi Kolektif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><button class="dropdown-item">Terima</button></li>
                            <li><button class="dropdown-item">Tolak</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- Navigation End --}}

        {{-- Table Start --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kode Inbound</th>
                    <th scope="col">Kode Origin</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody style="font-size: 14px !important;">
                @foreach($dataTable as $key => $item)
                <tr wire:key="{{ $item['id'] }}">
                    <td class="text-center">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td>{{ $item['date'] }}</td>
                    <td>{{ $item['inbound_code'] }}</td>
                    <td>{{ $item['origin_code'] }}</td>
                    <td>
                        @php
                        $statusMap = [
                            'requested' => [
                                'class' => 'warning',
                                'text' => 'Diajukan',
                            ],
                            'received' => [
                                'class' => 'primary',
                                'text' => 'Diterima',
                            ],
                            'rejected' => [
                                'class' => 'danger',
                                'text' => 'Ditolak',
                            ],
                            'processed' => [
                                'class' => 'info',
                                'text' => 'Diproses',
                            ],
                            'done' => [
                                'class' => 'success',
                                'text' => 'Selesai',
                            ],
                        ];
                        $status = $statusMap[strtolower($item['status'])] ?? [
                            'class' => 'secondary',
                            'text' => $item['status'],
                        ];
                        @endphp
                        <span class="badge badge-sm bg-{{ $status['class'] }} text-white rounded-pill">
                            {{ $status['text'] }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-secondary">Detail</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Table End --}}
    </div>
</div>

<div @class(['col-md-3', 'd-none' => !$isOpen])>
    @php
    $map = [
        [
            'headName' => 'Penjualan',
            'icon' => 'fas fa-tag',
            'list' => [
                [
                    'subName' => 'Kasir',
                    'url' => '/kasir',
                ],
            ],
        ],
        [
            'headName' => 'Keuangan',
            'icon' => 'fa-solid fa-wallet',
            'list' => [
                [
                    'subName' => 'Laporan',
                    'url' => '/laporan',
                ],
            ],
        ],
        [
            'headName' => 'Gudang',
            'icon' => 'fas fa-boxes',
            'list' => [
                [
                    'subName' => 'Barang',
                    'url' => '/barang',
                ],
                [
                    'subName' => 'Inbound',
                    'url' => '/wh/inbound',
                ],
            ],
        ],
        [
            'headName' => 'Pengadaan',
            'icon' => 'fas fa-shopping-cart',
            'list' => [
                [
                    'subName' => 'Pembelian',
                    'url' => '/pembelian',
                ],
            ],
        ],
        [
            'headName' => 'Kepegawaian',
            'icon' => 'fas fa-user',
            'list' => [
                [
                    'subName' => 'Pegawai',
                    'url' => '/pegawai',
                ],
            ],
        ],
    ];
    @endphp

    <div class="accordion mb-3" id="accordionExample">
        <div class="accordion-item">
            <a href="{{ url('/beranda') }}" class="btn btn-default text-start my-2" style="width:100%; text-decoration:none; padding-inline: 20px;">
                <i class="fas fa-home"></i>
                Beranda
            </a>
        </div>

        @foreach ($map as $key => $head)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $key }}">
                    <button class="accordion-button collapsed gap-2" type="button"
                        data-bs-toggle="collapse"
                        aria-expanded="false"

                        data-bs-target="#collapse{{ $key }}"
                        aria-controls="collapse{{ $key }}"
                    >
                        <i class="{{ $head['icon'] }}"></i>
                        {{ $head['headName'] }}
                    </button>
                </h2>
                <div
                    id="collapse{{ $key }}"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"

                    aria-labelledby="heading{{ $key }}"
                >
                    @foreach ($head['list'] as $itemSub)
                        <div class="accordion-item">
                            <a href="{{ url($itemSub['url']) }}" class="btn btn-default text-start my-1" type="button"
                                style="width:100%; padding-left: 3rem;">
                                {{ $itemSub['subName'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

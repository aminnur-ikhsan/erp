<?php

namespace App\Livewire;

use Livewire\Component;

class Inbound extends Component
{
    public $show = 1;
    public $search = '';

    public function render()
    {
        $this->show = session()->get('show', 1);

        $dataTable = collect([
            ['id' => 1, 'date' => '2023-01-01', 'inbound_code' => 'INB001', 'origin_code' => 'ORI001', 'status' => 'requested'],
            ['id' => 2, 'date' => '2023-01-02', 'inbound_code' => 'INB002', 'origin_code' => 'ORI002', 'status' => 'received'],
            ['id' => 3, 'date' => '2023-01-03', 'inbound_code' => 'INB003', 'origin_code' => 'ORI003', 'status' => 'rejected'],
            ['id' => 4, 'date' => '2023-01-04', 'inbound_code' => 'INB004', 'origin_code' => 'ORI004', 'status' => 'processed'],
            ['id' => 5, 'date' => '2023-01-05', 'inbound_code' => 'INB005', 'origin_code' => 'ORI005', 'status' => 'done'],
        ]);

        $dataTable = $dataTable->filter(function ($item) {
            return str_contains(strtolower($item['inbound_code']), strtolower($this->search));
        });

        $dataTable = $dataTable->take($this->show);

        return view('livewire.inbound', compact('dataTable'));
    }

    function changeShow($value)
    {
        $this->show = $value;
        session()->put('show', $value);
    }
}

<?php

namespace App\Livewire;

use App\Models\Warehouse\IndboundModel;
use Livewire\Component;

class Inbound extends Component
{
    public $show = 10;
    public $search = '';

    // Default Action
    public function render()
    {
        $queries = IndboundModel::select(
            'created_at as date',
            '*'
        );

        if ($this->search) {
            $search = $this->search;
            $queries = $queries->where(function ($query) use ($search) {
                $query->where('inbound_code', 'ilike', '%' . $search . '%')
                    ->orWhere('origin_code', 'ilike', '%' . $search . '%');
            });
        }

        $dataTable = $queries->orderBy('id', 'desc')->paginate($this->show);

        return view('livewire.inbound', compact('dataTable'));
    }
}

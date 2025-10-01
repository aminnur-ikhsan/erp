<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\ItemStorageModel as ItemModel;

class Barang extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $dataStore = [];
    public $dataDetail = [];
    public $keySearch = '';
    public $isDetailShow = false;

    public function render()
    {
        $itemList = $this->getItemStorage();
        return view('livewire.barang', compact('itemList'));
    }

    function store()
    {
        $this->validate([
            'dataStore.item_name' => 'required|string',
            'dataStore.item_barcode' => 'required|string',
        ], [
            'dataStore.item_name.required' => 'Nama barang harus diisi',
            'dataStore.item_barcode.required' => 'Nomor kemasan harus diisi',
        ]);

        $this->dataStore['item_category'] = ItemModel::CATEGORY['Elektronik'];
        $newItem = ItemModel::createOne($this->dataStore);
        $newItem->save();

        session()->flash('success', 'Data berhasil disimpan');
        $this->clearAll();
    }

    function getItemStorage()
    {
        return ItemModel::search($this->keySearch)
            ->select([
                'id_stock',
                'item_key_number',
                'item_name',
            ])
            ->orderBy('id', 'desc')->paginate(30);
    }

    function showDetail($idStock)
    {
        $this->dataDetail = ItemModel::query()->where('id_stock', $idStock)->first();
        $this->isDetailShow = true;
    }

    function archive($idStock)
    {
        ItemModel::query()->where('id_stock', $idStock)->delete();

        session()->flash('success', 'Data berhasil diarsipkan');
        $this->backToDashboard();
    }

    function clearAll()
    {
        $this->reset([
            'dataStore',
            'dataDetail',
            'keySearch',
        ]);
        $this->resetErrorBag();
    }

    function backToDashboard()
    {
        $this->dataDetail = [];
        $this->isDetailShow = false;
        $this->clearAll();
    }
}

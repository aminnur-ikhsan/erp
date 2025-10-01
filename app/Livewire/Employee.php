<?php

namespace App\Livewire;

use Livewire\Component;

class Employee extends Component
{
    public $nama;
    public $email;
    public $address;
    public $isEdit = false;
    public $key = null;

    public $data = [
        [
            "nama" => "Andrew",
            "email" => "andrew@example.com",
            "address" => "Jalan Raya No. 1",
        ]
    ];

    public function render()
    {
        return view('livewire.employee');
    }

    function resetAll()
    {
        $this->reset(['nama', 'email', 'address']);
        $this->isEdit = false;
        $this->key = null;
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $this->data[] = [
            "nama" => $this->nama,
            "email" => $this->email,
            "address" => $this->address,
        ];

        $this->resetAll();
        session()->flash('success', 'Data berhasil disimpan');
    }

    function edit($key)
    {
        // format condition
        $this->key = $key;
        $this->isEdit = true;
        $getData = $this->data[$key];

        // show data
        $this->nama = $getData['nama'];
        $this->email = $getData['email'];
        $this->address = $getData['address'];
    }

    function update()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // rewrite data
        $this->data[$this->key]['nama'] = $this->nama;
        $this->data[$this->key]['email'] = $this->email;
        $this->data[$this->key]['address'] = $this->address;

        $this->resetAll();
        session()->flash('success', 'Data berhasil diupdate');
    }

    function confirmToDelete($key)
    {
        $this->resetAll();
        $this->key = $key;
    }

    function delete()
    {
        unset($this->data[$this->key]);
        $this->data = array_values($this->data);
        $this->resetAll();
        session()->flash('success', 'Data berhasil dihapus');
    }
}

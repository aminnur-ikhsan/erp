<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HumanResource\DataEmplpoyeesModel;
use Illuminate\Validation\ValidationException;

class Employee extends Component
{
    public $nama;
    public $email;
    public $address;
    public $isEdit = false;
    public $key = null;
    public $data = [];

    public function render()
    {
        $this->showAll();
        return view('livewire.employee');
    }

    function showAll()
    {
        $this->data = DataEmplpoyeesModel::select('id', 'name as nama', 'email', 'address')->orderBy('id', 'desc')->get();
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
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|unique:data_employees,email',
            'address' => 'required|string',
        ], [
            'nama.required'    => 'Nama karyawan wajib diisi.',
            'email.required'   => 'Alamat email tidak boleh kosong.',
            'email.email'      => 'Format email yang Anda masukkan tidak valid.',
            'email.unique'     => 'Email ini sudah terdaftar di sistem, silakan gunakan email lain.',
            'address.required' => 'Alamat lengkap wajib diisi.',
        ]);

        $employee = new DataEmplpoyeesModel;
        $employee['name'] = $this->nama;
        $employee['email'] = $this->email;
        $employee['address'] = $this->address;
        $employee->save();

        $this->showAll();
        $this->resetAll();
        session()->flash('success', 'Data berhasil disimpan');
    }

    function edit($key)
    {
        // format condition
        $this->key = $key;
        $this->isEdit = true;
        $getData = DataEmplpoyeesModel::find($key);

        // Validation
        if (empty($getData)) {
            throw ValidationException::withMessages([
                'message' => 'Data pegawai tidak ditemukan.',
            ]);
        }

        // show data
        $this->nama = $getData['name'];
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

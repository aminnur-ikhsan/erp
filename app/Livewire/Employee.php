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
    public $dataEdit = null;

    // Default Action
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
        $this->dataEdit = null;
        $this->resetErrorBag();
    }

    // Blade Action
    public function save()
    {
        $this->validate([
            'email'   => 'unique:data_employees,email',
        ], [
            'email.unique'     => 'Email ini sudah terdaftar di sistem, silakan gunakan email lain.',
        ]);

        $this->createOrUpdate();
    }

    function edit($key)
    {
        // format condition
        $this->key = $key;
        $this->isEdit = true;
        $this->dataEdit = DataEmplpoyeesModel::find($key);

        // Validation
        if (empty($this->dataEdit)) {
            throw ValidationException::withMessages([
                'message' => 'Data pegawai tidak ditemukan.',
            ]);
        }

        // show data
        $this->nama = $this->dataEdit['name'];
        $this->email = $this->dataEdit['email'];
        $this->address = $this->dataEdit['address'];
    }

    function update()
    {
        $this->createOrUpdate($this->dataEdit);
    }

    function confirmToDelete($key)
    {
        $this->resetAll();
        $this->key = $key;
    }

    // DB Action
    private function createOrUpdate($dataEdit = null)
    {
        $this->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email',
            'address' => 'required|string',
        ], [
            'nama.required'    => 'Nama karyawan wajib diisi.',
            'email.required'   => 'Alamat email tidak boleh kosong.',
            'email.email'      => 'Format email yang Anda masukkan tidak valid.',
            'address.required' => 'Alamat lengkap wajib diisi.',
        ]);

        if ($dataEdit) {
            $employee = $this->dataEdit;
        } else {
            $employee = new DataEmplpoyeesModel;
        }

        $employee['name'] = $this->nama;
        $employee['email'] = $this->email;
        $employee['address'] = $this->address;
        $employee->save();

        $this->showAll();
        $this->resetAll();
        session()->flash('success', 'Data berhasil disimpan');
    }

    function delete()
    {
        // Get Data
        $employee = DataEmplpoyeesModel::find($this->key);

        // Validation
        if (empty($employee)) {
            $this->resetAll();
            throw ValidationException::withMessages([
                'message' => 'Data pegawai tidak ditemukan.',
            ]);
        }

        // Soft Delete
        $employee->delete();

        // Return
        $this->resetAll();
        session()->flash('success', 'Data berhasil dihapus');
    }
}

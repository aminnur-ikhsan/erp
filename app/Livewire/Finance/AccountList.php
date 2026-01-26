<?php

namespace App\Livewire\Finance;

use Livewire\Component;

class AccountList extends Component
{
   public $accounts = [
      'assets' => [
         ['ref' => '1100', 'name' => 'Kas'],
         ['ref' => '1200', 'name' => 'Bank'],
         ['ref' => '1300', 'name' => 'Piutang Usaha'],
         ['ref' => '1400', 'name' => 'Persediaan Barang'],
         ['ref' => '1500', 'name' => 'Perlengkapan Kantor'],
      ],
      'liabilities' => [
         ['ref' => '2100', 'name' => 'Hutang Usaha'],
         ['ref' => '2200', 'name' => 'Hutang Bank'],
         ['ref' => '2300', 'name' => 'Hutang Gaji'],
      ],
      'equity' => [
         ['ref' => '3100', 'name' => 'Modal Pemilik'],
         ['ref' => '3200', 'name' => 'Prive'],
         ['ref' => '3300', 'name' => 'Laba Ditahan'],
      ],
      'revenue' => [
         ['ref' => '4100', 'name' => 'Pendapatan Jasa'],
         ['ref' => '4200', 'name' => 'Pendapatan Usaha'],
         ['ref' => '4300', 'name' => 'Pendapatan Lain-lain'],
      ],
      'expense' => [
         ['ref' => '5100', 'name' => 'Beban Gaji'],
         ['ref' => '5200', 'name' => 'Beban Listrik'],
         ['ref' => '5300', 'name' => 'Beban Sewa'],
         ['ref' => '5400', 'name' => 'Beban Perlengkapan'],
      ],
   ];

   public function edit($type, $ref)
   {
      // Logic untuk edit account
      $this->dispatch('alert', ['message' => "Edit account $ref dari $type"]);
   }

   public function delete($type, $ref)
   {
      // Logic untuk delete account
      $this->dispatch('alert', ['message' => "Delete account $ref dari $type"]);
   }

   public function render()
   {
      return view('livewire.finance.account-list');
   }
}

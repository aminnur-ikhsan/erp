<?php

namespace App\Http\Controllers\Warehouse;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\ItemStorageModel as ItemModel;

class ItemController extends Controller
{
    public function getItem()
    {
        $items = ItemModel::orderBy('item_name', 'asc')->paginate(10);
        return $items;
    }
}

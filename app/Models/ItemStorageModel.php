<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ItemStorageModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'warehouse.item_storages';
    protected $primaryKey = 'id';
    protected $softDelete = true;
    protected $fillable = [
        'id_stock',         // unique
        'item_key_number',  // unique
        'item_category',
        'item_status',
        'item_name',
        'item_barcode',     // nullable
        'item_stock',
        'item_price',
    ];

    public const CATEGORY = [
        'Elektronik' => 'Elektronik',
        'Perabotan' => 'Perabotan',
        'Peralatan' => 'Peralatan',
    ];

    public const CATEGORY_CODE = [
        self::CATEGORY['Elektronik'] => 'EL',
        self::CATEGORY['Perabotan'] => 'PRB',
        self::CATEGORY['Peralatan'] => 'PRT',
    ];

    public const STATUS = [
        'Aktif' => 'Aktif',
        'Tidak Aktif' => 'Tidak Aktif',
    ];

    public static function createOne($fill = [])
    {
        // declare
        $fill = collect($fill);
        $category = $fill->get('item_category');
        $newItem = new self();

        // default value
        $newItem->id_stock = Str::uuid();
        $newItem->item_key_number = self::CATEGORY_CODE[$category] . '-' . time();
        $newItem->item_status = self::STATUS['Aktif'];
        $newItem->item_stock = 0;
        $newItem->item_price = $fill->get('item_price') ?? 0;

        // fill all data
        $fill->forget([
            'id_stock',
            'item_key_number',
            'item_status',
            'item_stock',
            'item_price',
        ]);
        $newItem->fill($fill->toArray());

        // return query
        return $newItem;
    }

    public static function search($keySearch = null)
    {
        return self::query()
            ->when($keySearch, function ($query, $findSearch) {
                $query->whereAny([
                    'item_name',
                    'item_key_number',
                    'item_barcode',
                ], 'like', "%{$findSearch}%");
            });
    }
}

<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBoundModel extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'warehouse.detail_bound';
    protected $primaryKey = 'id';
    protected $softDelete = true;
    protected $fillable = [
        'bound_id',
        'bound_type',
        'item_id',
        'item_price_buy',
        'item_stock',
        'loker_code',
        'status',
    ];

    public const STATUS_HOLD        = 'hold';
    public const STATUS_PROCESSED   = 'processed';
    public const STATUS_DONE        = 'done';
}

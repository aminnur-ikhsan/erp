<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndboundModel extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $table = 'warehouse.inbounds';
    protected $primaryKey = 'id';
    protected $softDelete = true;
    protected $fillable = [
        'inbound_id',       // unique
        'inbound_code',
        'origin_code',
        'status',
    ];
}

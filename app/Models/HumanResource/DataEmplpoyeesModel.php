<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataEmplpoyeesModel extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $table = 'humanresource.data_employees';
    protected $primaryKey = 'id';
    protected $softDelete = true;
    protected $fillable = [
        'name',
        'email',
        'address',
    ];
}

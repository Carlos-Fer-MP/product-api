<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;


    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'uuid',
        'name',
        'price',
        'availability',
        'type',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'availability',
        'type',
    ];

    protected $dateFormat = 'Y-m-d';
}

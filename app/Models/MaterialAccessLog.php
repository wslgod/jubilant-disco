<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialAccessLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'material_id', 'accessed_at', 'ip_address'];

    public $timestamps = false;

    protected $casts = [
        'accessed_at' => 'datetime',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'title',
        'type',
        'summary_content',
        'file_path',
        'file_name',
        'uploaded_by',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}

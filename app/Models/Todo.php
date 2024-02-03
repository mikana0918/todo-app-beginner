<?php

namespace App\Models;

use Database\Factories\TodoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property bool $is_completed
 */
class Todo extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'is_completed',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_completed' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
     
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory() 
    {
        return TodoFactory::new();
    }
}



<?php

namespace App\Models;

use Carbon\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property bool $is_completed
 */
class Todo
{
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
}



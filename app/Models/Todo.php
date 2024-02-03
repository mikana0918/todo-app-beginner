<?php

namespace App\Models;

class Todo
{
    public int $id;
    public string $title;
    public bool $is_completed;
    public string $created_at;
    public string $updated_at;

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
    ];
}



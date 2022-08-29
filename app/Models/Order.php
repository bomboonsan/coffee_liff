<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'line_displayName', 'line_userId', 'line_thumbnailUrl', 'name', 'order_name', 'order_option', 'sweet_level', 'order_note'
    ];
}

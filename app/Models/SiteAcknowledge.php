<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteAcknowledge extends Model
{
    use HasFactory;

    protected $table = 'site_acknowledge';

    protected $primaryKey = 'site_name';

    public $incrementing = false;
    protected $keyType = 'string';

    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'site_name',
        'renstra',
        'perolehan',
        'pemanfaatan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}

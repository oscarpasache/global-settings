<?php

namespace OscarPasache\GlobalSettings\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $payload
 */
class GlobalSettingsModel extends Model
{
    protected $table = 'global_settings';

    protected $guarded = [];

    protected $casts = [
        'locked' => 'boolean',
    ];
}

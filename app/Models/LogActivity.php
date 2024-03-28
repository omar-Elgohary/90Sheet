<?php

namespace App\Models;

class LogActivity extends BaseModel
{

    const searchAttributes = ['subject'];
    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(admin::class, 'admin_id', 'id');
    }

}

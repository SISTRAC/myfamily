<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function leaves_in()
    {
        return $this->hasOne(LivesIn::class);
    }

    public function work_in()
    {
        return $this->hasOne(WorkIn::class);
    }
}

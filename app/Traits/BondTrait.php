<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
Use Ramsey\Uuid\Uuid;

trait HasUuid {
    public static function bootHasUuid() 
    {
        static::creating(function (Model $model)
        {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}


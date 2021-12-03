<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ModelReembolso extends Model
{
    use HasFactory, HasRoles;

    protected $table='reembolsos';
    protected $fillable=['type','user_id','name_user','date','value','description','refund_image'];  

    public function relUsers()
    {
        return $this->hasOne('App\Models\User', 'id','user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesTeam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'manager_id', 'fullname', 'email', 'telephone', 'route_id', 'joined_at', 'comment' ];

    public function route() {
        return $this->belongsTo(Route::class);
    }

    public function scopeMyteam($query) {
        return $query->where('manager_id', auth()->id());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //mendefinisikan nama tabel
    protected $primaryKey = 'user_id'; //mendefinisikan primary key

    protected $fillable = ['level_id', 'username', 'nama', 'password'];
    public $timestamps = true;
    
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}

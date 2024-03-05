<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['follower_id', 'followee_id'];

    /**
     * Get the follower user.
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /**
     * Get the followee user.
     */
    public function followee()
    {
        return $this->belongsTo(User::class, 'followee_id');
    }
}

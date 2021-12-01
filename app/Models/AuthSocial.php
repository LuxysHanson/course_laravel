<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthSocial extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'auth_social';
    protected $fillable = [
        'user_id',
        'social_id',
        'type'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->created_at = Carbon::now()->format('Y-m-d H:i:s');
    }

   public function getUser()
   {
       return $this->belongsTo(User::class);
   }

}

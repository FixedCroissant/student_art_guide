<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  /**
   * The database table used by the model.
   */
  protected $table  = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'user_id'
    ];

  // DEFINE RELATIONSHIPS -------------------------------------------------->
  /**
     * Get the user that owns the role.
     */
     public function users()
     {
       return $this->belongsToMany(User::class);
     }

}

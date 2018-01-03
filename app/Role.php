<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  /**
   * The database table used by the model.
   */
  protected $table  = 'roles';
  // DEFINE RELATIONSHIPS -------------------------------------------------->
  /**
     * Get the user that owns the role.
     */
     public function users()
     {
       return $this->belongsToMany(User::class);
     }

}

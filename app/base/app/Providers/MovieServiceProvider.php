<?php
namespace App\Providers;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
  /**
   * Get a User's movie collection
   */
   public function movies()
   {
     return $this->belongsTo('App\User');
   }
}
 ?>

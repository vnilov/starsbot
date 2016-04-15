<?php
/**
 * Date: 14.04.16
 * Time: 17:06
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TBot extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bot';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'token'];
}
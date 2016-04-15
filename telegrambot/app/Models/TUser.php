<?php
/**
 * Date: 14.04.16
 * Time: 17:06
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bot_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['telegram_id', 'user_name', 'first_name', 'second_name'];
}
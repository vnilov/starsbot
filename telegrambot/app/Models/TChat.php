<?php
/**
 * Date: 14.04.16
 * Time: 17:05
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TChat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bot_chats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['telegram_id', 'type', 'bot_id'];
    
    
    public function getByTelegramID()
    {
        
    }
    
    public function getByBotID()
    {
        
    }
    
    public function messages()
    {
        $this->hasMany('App\Models\Messages', 'chat_id', 'telegram_id');
    }
}
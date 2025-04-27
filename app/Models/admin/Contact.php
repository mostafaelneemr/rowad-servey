<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;
    protected $table = "contacts";
    protected $fillable = ['name','email', 'phone', 'message', 'created_at', 'updated_at'];

    // protected $recipient;
    // protected $email;
    
    // public function __construct() {
    //     //   $this->recipient = config('recipient.name');
    //       $this->email = config('recipient.email');
    // }
}

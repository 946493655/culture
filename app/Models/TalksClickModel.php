<?php
namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class TalksClickModel extends BaseModel
{
    protected $table = 'bs_talks_click';
    protected $fillable = [
        'id','talkid','uid','created_at',
    ];
}
<?php
namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class TalksShareModel extends BaseModel
{
    protected $table = 'bs_talks_share';
    protected $fillable = [
        'id','talkid','shareid','uid','otherid','created_at',
    ];
}
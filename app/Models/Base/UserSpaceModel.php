<?php
namespace App\Models\Base;

use App\Models\PicModel;

class UserSpaceModel extends BaseModel
{
    /**
     * 这是用户空间设置表
     */

    protected $table = 'users_space';
    protected $fillable = [
        'id','uid','top_bg_img','created_at','updated_at',
    ];

    public function getTopBg()
    {
        $pic_id = $this->top_bg_img ? $this->top_bg_img : 0;
        $picModel = PicModel::find($pic_id);
        return $picModel ? $picModel->url : '';
    }

    public function pics($uid)
    {
        return PicModel::where('uid',$uid)->get();
    }

    public function getPicUrl()
    {
        $picModel = PicModel::find($this->top_bg_img);
        return $picModel ? $picModel->url : '';
    }
}
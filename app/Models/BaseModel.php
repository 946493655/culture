<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $timestamps = false;

    /**
     * 创建时间转换
     */
    public function createTime()
    {
        return $this->created_at ? date("Y年m月d日 H:i", $this->created_at) : '';
    }

    /**
     * 更新时间转换
     */
    public function updateTime()
    {
        return $this->updated_at ? date("Y年m月d日 H:i", $this->updated_at) : '未更新';
    }

    /**
     * 拼接地区名称字符串
     */
    public function getAreaName($area=null)
    {
        $areaid = $this->area ? $this->area : 0;
        if (!$areaid && $area) { $areaid = $area; }
        $areaModel = AreaModel::find($areaid);
        $areaName = '';
        //本级
        if ($areaModel) {
            $areaName = $areaName ? $areaName.','.$areaModel->cityname : $areaModel->cityname;
        }
        //上一级
        if ($areaModel&&$areaModel->parentid) {
            $areaModel2 = AreaModel::find($areaModel->parentid);
            $areaName = $areaModel2 ? $areaName.','.$areaModel2->cityname : $areaName;
        }
        //上上级
        if (isset($areaModel2)&&$areaModel2->parentid) {
            $areaModel3 = AreaModel::find($areaModel2->parentid);
            $areaName = $areaModel3 ? $areaName.','.$areaModel3->cityname : $areaName;
        }
        return $areaName;
    }

    public function isshow()
    {
        return $this->isshow==1 ? '前台显示' : '前台不显示';
    }

    /**
     * 发布方名称：bs_order，bs_order_pro，bs_order_firm
     */
    public function getSellName()
    {
        $userModel = $this->getUser($this->seller);
        return $userModel ? $userModel->username : '';
    }

    /**
     * 申请方名称
     */
    public function getBuyName()
    {
        $userModel = $this->getUser($this->buyer);
        return $userModel ? $userModel->username : '';
    }

    /**
     * 由uid得到 用户信息
     */
    public function getUser($uid=null)
    {
        $userInfo = UserModel::find($uid);
        return $userInfo ? $userInfo : '';
    }

    public function getUserName()
    {
       return $this->getUser() ? $this->getUser()->username : '';
    }

    /**
     * 价格：bs_storyboard，bs_designs，bs_goods，bs_ideas，bs_rents，bs_staffs，
     */
    public function money()
    {
        return $this->money ? $this->money.'元' : '未定';
    }

    /**
     * 获得某个会员的所有图片
     */
    public function getUserPics($uid=null)
    {
        if ($uid) {
            $datas = PicModel::where('uid',$uid)->get();
        } else {
            $datas = PicModel::all();
        }
        return $datas;
    }
}
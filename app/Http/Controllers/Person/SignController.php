<?php
namespace App\Http\Controllers\Person;

use App\Api\ApiUser\ApiSign;
use App\Models\Base\WalletModel;
use App\Models\BaseModel;

class SignController extends BaseController
{
    /**
     * 个人后台 用户签到
     */

    protected $curr = 'sign';
    protected $fromtime;    //当天凌晨0点
    protected $totime;    //当天晚上24点
    protected $fromMonth;    //当月1号凌晨0点
    protected $toMonth;    //当月最后一天晚上24点

    public function __construct()
    {
        parent::__construct();
        $this->fromtime = date('Ymd',time()).'000000';    //当天凌晨0点
        $this->totime = date('Ymd',time()).'235959';    //当天晚上24点
        $this->fromMonth = date('Ym',time()).'00000000';    //当天凌晨0点
        //计算当月天数
        $yuefen = date('m',time());
        if ($yuefen==2) {
            $month = date('Y',time())%4==0 ? 29 : 28;
        } elseif (in_array($yuefen,[1,3,5,7,8,10,12])) {
            $month = 31;
        } elseif (in_array($yuefen,[4,6,9,11])) {
            $month = 30;
        }
        $month = (isset($month)&&$month) ? $month : 30;
        $this->toMonth = date('Ym',time()).$month.'235959';    //当天晚上24点
    }

    public function index($date='')
    {
        $pageCurr = isset($_POST['pageCurr'])?$_POST['pageCurr']:1;
        $prefix_url = DOMAIN.'person/sign';
        $result = [
            'datas'=> $this->query($pageCurr,$prefix_url,$date),
            'month'=> $this->getMonth(),
            'model'=> new BaseModel(),
            'prefix_url'=> $prefix_url,
            'user'=> $this->user,
            'links'=> $this->links,
            'curr'=> $this->curr,
            'uid'=> $this->userid,
            'd'=> $date,
        ];
        return view('person.sign.index', $result);
    }

    public function add($day)
    {
        if ($this->getDaySign()) {
            echo "<script>alert('今天已经签到过了！');history.go(-1);</script>";exit;
        }
        if (ltrim(date('d',time()),'0')!=$day) {
            echo "<script>alert('点击的不是今天签到日期！');history.go(-1);</script>";exit;
        }
        $reward = rand(1,10);
        $data = [
            'uid'=> $this->userid,
            'reward'=> $reward,
            'created_at'=> time(),
        ];
        UserSignModel::create($data);
        //奖励加入总数
        $userParam = WalletModel::where('uid',$this->userid)->first();
        WalletModel::where('id',$userParam->id)->update(['sign'=> $userParam->sign+$reward]);
        return redirect(DOMAIN.'person/sign');
    }





    /**
     * 当天、月、总签到的用户
     */
    public function query($pageCurr,$prefix_url,$date='')
    {
//        if ($date=='') {
//            $datas = UserSignModel::where('created_at','>',strtotime($this->fromtime))
//                ->where('created_at','<',strtotime($this->totime))
//                ->orderBy('id','desc')
//                ->paginate($this->limit);
//        } elseif ($date=='month') {
//            $datas = UserSignModel::where('created_at','>',strtotime($this->fromMonth))
//                ->where('created_at','<',strtotime($this->toMonth))
//                ->orderBy('id','desc')
//                ->paginate($this->limit);
//        } elseif ($date=='all') {
//            $datas = UserSignModel::orderBy('id','desc')
//                ->paginate($this->limit);
//        }
//        $datas->hasDay = $this->getDaySign() ? 1 : 0;
//        $datas->limit = $this->limit;
//        if ($date=='') {
//            $from = strtotime($this->fromtime);
//            $to = strtotime($this->totime);
//        } elseif ($date=='month') {
//            $from = strtotime($this->fromMonth);
//            $to = strtotime($this->toMonth);
//        } elseif ($date=='all') {
            $from = 0;
            $to = 0;
//        }
        $rst = ApiSign::getSignListByTime($this->limit,$pageCurr,$this->userid,$from,$to);
        $datas = $rst['code']==0?$rst['data']:[];
        $datas['pagelist'] = $this->getPageList($datas,$prefix_url,$this->limit,$pageCurr);
        $datas['pagelist']['hasDay'] = $this->getDaySign() ? 1 : 0;
        return $datas;
    }

    /**
     * 查询当前用户当天签到情况
     */
    public function getDaySign()
    {
//        $userSign = UserSignModel::where('uid',$this->userid)
//            ->where('created_at','>',strtotime($this->fromtime))
//            ->where('created_at','<',strtotime($this->totime))
//            ->first();
//        return $userSign ? $userSign : '';
        $rst = ApiSign::getSignsByUid($this->userid,$this->fromtime,$this->totime);
        return $rst['code']==0 ? $rst['data'] : [];
    }

    /**
     * 计算当前月天数
     */
    public function getMonth()
    {
        $monthStr = date('Y-m',time());       //当前年月
        $arr = explode('-',$monthStr);
        $nianfen = $arr[0];
        $yuefen = ltrim($arr[1],'0');
        if ($yuefen==2) {
            $month = $nianfen%4==0 ? 29 : 28;
        } elseif (in_array($yuefen,[1,3,5,7,8,10,12])) {
            $month = 31;
        } elseif (in_array($yuefen,[4,6,9,11])) {
            $month = 30;
        }
        return array(
            'count'=> (isset($month)&&$month) ? $month : 30,
            'date'=> date('Y-m',time()),
            'day'=> ltrim(date('d',time()),'0'),
            'week'=> date('w',time()),
        );
    }
}
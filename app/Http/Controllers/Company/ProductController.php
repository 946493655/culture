<?php
namespace App\Http\Controllers\Company;

use App\Api\ApiBusiness\ApiGoods;

class ProductController extends BaseController
{
    /**
     * 企业后台产品
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function index($cid,$cate=0)
    {
        $list['func']['name'] = '产品';
        $list['func']['url'] = 'product';
        $company = $this->company($cid,$list['func']['url']);
        $cid = $company['company']['id'];
        $pageCurr = isset($_GET['page']) ? $_GET['page'] : 1;
        $apiGoods = ApiGoods::index($this->limit,$pageCurr,$company['company']['uid'],0,$cid,0,2);
        if ($apiGoods['code']!=0) {
            $datas = array(); $total = 0;
        } else {
            $datas = $apiGoods['data']; $total = $apiGoods['pagelist']['total'];
        }
        $pagelist = $this->getPageList($total,$this->prefix_url,$this->limit,$pageCurr);
        $result = [
            'datas' => $datas,
            'pagelist' => $pagelist,
            'prefix_url' => $this->prefix_url,
            'model' => $this->getModel(),
            'curr' => $list['func']['url'],
            'cate' => $cate,
        ];
        return view('company.product.index', $result);
    }

    /**
     * 获取 model
     */
    public function getModel()
    {
        $apiModel = ApiGoods::getModel();
        return $apiModel['code']==0 ? $apiModel['model'] : [];
    }
}
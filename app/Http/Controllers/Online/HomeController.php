<?php
namespace App\Http\Controllers\Online;

use App\Models\ProductAttrModel;
use App\Models\ProductConModel;
use App\Models\ProductLayerAttrModel;
use App\Models\ProductLayerModel;
use App\Models\ProductModel;

class HomeController extends BaseController
{
    /**
     * 在线创作窗口主页
     */

    public function index($productid=1)
    {
        $urls = explode('/',$_SERVER['REQUEST_URI']);
        $restart = $urls[count($urls)-1]=='restart'?1:0;
        $result = [
            'data'=> $this->product($productid),
            'attrs'=> $this->attrs($productid),
            'attrModel'=> new ProductAttrModel(),
            'layerModel'=> new ProductLayerModel(),
            'layerAttrModel'=> new ProductLayerAttrModel(),
            'conModel'=> new ProductConModel(),
            'restart'=> $restart,
        ];
//        return view('online.home.index', $result);
        return view('online.home.demo1', $result);
    }




    /**
     * 以下是要展示的数据
     */

    public function product($id)
    {
        return ProductModel::find($id);
    }

    public function attrs($productid)
    {
        $uid = $this->userid ? $this->userid : 0;
        return ProductAttrModel::where('productid',$productid)
            ->where('del',0)
            ->where('uid',$uid)
            ->get();
    }
}
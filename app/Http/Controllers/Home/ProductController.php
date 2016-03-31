<?php
namespace App\Http\Controllers\Home;

class ProductController extends BaseController
{
    /**
     * 网站首页产品样片
     */

    public function index()
    {
        $result = [
            'menus'=> $this->list,
            'curr'=> 'product',
        ];
        return view('home.product.index', $result);
    }
}
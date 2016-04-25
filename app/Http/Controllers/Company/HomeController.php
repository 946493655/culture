<?php
namespace App\Http\Controllers\Company;

class HomeController extends BaseController
{
    /**
     * 企业后台首页
     */

    public function __construct()
    {
        $this->list['func']['name'] = '企业首页';
        $this->list['func']['url'] = '';
    }

    public function index()
    {
        $result = [
            'topmenus'=> $this->topmenus,
            'curr'=> 'home',
        ];
        return view('company.home.index', $result);
    }
}
<?php
namespace App\Http\Controllers\Home;

class AboutController extends BaseController
{
    /**
     * 网站前台租赁频道
     */

    public function index($genre=0)
    {
        $result = [
            'menus'=> $this->list,
            'curr'=> 'about',
        ];
        return view('home.about.index', $result);
    }
}
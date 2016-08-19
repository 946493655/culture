<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ActionModel;
use App\Models\AdPlaceModel;

class AdPlaceController extends BaseController
{
    /**
     * 系统后台广告管理
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new AdPlaceModel();
        $this->crumb['']['name'] = '广告位列表';
        $this->crumb['category']['name'] = '广告位管理';
        $this->crumb['category']['url'] = 'place';
    }

    public function index()
    {
        $curr['name'] = $this->crumb['']['name'];
        $curr['url'] = $this->crumb['']['url'];
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'admin/place',
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.adplace.index', $result);
    }

    public function create()
    {
        $curr['name'] = $this->crumb['create']['name'];
        $curr['url'] = $this->crumb['create']['url'];
        $result = [
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.adplace.create', $result);
    }

    public function store(Request $request){}

    public function edit($id)
    {
        $curr['name'] = $this->crumb['edit']['name'];
        $curr['url'] = $this->crumb['edit']['url'];
        $result = [
            'data'=> AdPlaceModel::find($id),
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.adplace.edit', $result);
    }

    public function update(Request $request, $id){}

    public function show($id)
    {
        $curr['name'] = $this->crumb['show']['name'];
        $curr['url'] = $this->crumb['show']['url'];
        $result = [
            'data'=> AdPlaceModel::find($id),
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.adplace.show', $result);
    }





    /**
     * =================
     * 以下是公用方法
     * =================
     */

    public function query()
    {
        $datas = AdPlaceModel::where('del',0)
            ->orderBy('id','desc')
            ->paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }

    /**
     * 收集数据
     */
}
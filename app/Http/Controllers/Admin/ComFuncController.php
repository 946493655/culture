<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company\ComModuleModel;
use App\Tools;
use Illuminate\Http\Request;
use App\Models\Company\ComFuncModel;

class ComFuncController extends BaseController
{
    /**
     * 系统后台企业模块 Company Module
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new ComFuncModel();
        $this->crumb['category']['name'] = '企业功能管理';
        $this->crumb['category']['url'] = 'comfunc';
        $this->crumb['']['name'] = '企业功能列表';
    }

    public function index()
    {
        $curr['name'] = $this->crumb['']['name'];
        $curr['url'] = $this->crumb['']['url'];
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'admin/comfunc',
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.comfunc.index', $result);
    }

    public function create()
    {
//        //记录数限制
//        if (count(ComFuncModel::all())>$this->firmNum-1) {
//            echo "<script>alert('已满".$this->firmNum."条记录！');history.go(-1);</script>";exit;
//        }
        $curr['name'] = $this->crumb['create']['name'];
        $curr['url'] = $this->crumb['create']['url'];
        $result = [
            'modules'=> ComModuleModel::all(),
            'model'=> $this->model,
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.comfunc.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = time();
        //处理缩略图
        $rstThumb = Tools::getAddrByUploadImg($request,$this->uploadSizeLimit);
        if (!$rstThumb) {
            echo "<script>alert('没有图片！');history.go(-1);</script>";exit;
        }
        $data['img'] = $rstThumb;
        ComFuncModel::create($data);
        return redirect(DOMAIN.'admin/comfunc');
    }

    public function edit($id)
    {
        $curr['name'] = $this->crumb['edit']['name'];
        $curr['url'] = $this->crumb['edit']['url'];
        $result = [
            'data'=> ComFuncModel::find($id),
            'modules'=> ComModuleModel::all(),
            'model'=> $this->model,
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.comfunc.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        //处理缩略图
        $model = ComModuleModel::find($id);
        $rstImg = Tools::getAddrByUploadImg($request,$this->uploadSizeLimit);
        if (!$rstImg) {
            $img = $model->img;
        } else {
            $img = $rstImg;
            if ($model->img) {
                unlink(ltrim($model->img,'/'));
            }
        }
        $data['img'] = $img;
        ComFuncModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'admin/comfunc');
    }

    public function show($id)
    {
        $curr['name'] = $this->crumb['show']['name'];
        $curr['url'] = $this->crumb['show']['url'];
        $result = [
            'data'=> ComFuncModel::find($id),
            'modules'=> ComModuleModel::all(),
            'model'=> $this->model,
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.comfunc.show', $result);
    }

    public function forceDelete($id)
    {
        ComFuncModel::where('id',$id)->delete();
        return redirect(DOMAIN.'admin/comfunc');
    }




    /**
     * 收集数据
     */
    public function getData(Request $request)
    {
        if (!$request->intro) { echo "<script>alert('内容必填！');history.go(-1);</script>";exit; }
        if ($request->small && mb_substr($request->small,-1,1,'utf-8')!='|') { $request->small = $request->small.'|'; }
        $data = [
            'name'=> $request->name,
            'type'=> $request->type,
            'module_id'=> $request->module_id,
            'intro'=> $request->intro,
            'small'=> $request->small,
            'sort'=> $request->sort,
            'isshow'=> $request->isshow,
        ];
        return $data;
    }

    /**
     * 查询方法
     */
    public function query()
    {
        $datas = ComFuncModel::orderBy('id','desc')
            ->paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }
}
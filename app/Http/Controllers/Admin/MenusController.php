<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\MenusModel;

class MenusController extends BaseController
{
    /**
     * 权限管理
     */

    public function __construct()
    {
        $this->model = new MenusModel();
        $this->crumb['category']['name'] = '前台控制菜单';
        $this->crumb['category']['url'] = 'menus';
        $this->crumb['']['name'] = '前台菜单列表';
    }

    public function index($type=0)
    {
        $curr['name'] = $this->crumb['']['name'];
        $curr['url'] = $this->crumb['']['url'];
        $result = [
            'datas'=> $this->query($type),
            'prefix_url'=> '/admin/menus',
            'types'=> $this->model['types'],
            'type_curr'=> $type,
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.menus.index', $result);
    }

    public function create($pid=0)
    {
        $curr['name'] = $this->crumb['create']['name'];
        $curr['url'] = $this->crumb['create']['url'];
        $result = [
            'pids'=> $this->parents(),
            'types'=> $this->model['types'],
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.menus.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = date('Y-m-d H:m:s', time());
        MenusModel::create($data);
        return redirect('/admin/menus');
    }

    public function show($id)
    {
        $curr['name'] = $this->crumb['show']['name'];
        $curr['url'] = $this->crumb['show']['url'];
        $result = [
            'data'=> MenusModel::find($id),
            'types'=> $this->model['types'],
            'crumb'=> $this->crumb,
        ];
        return view('admin.menus.show', $result);
    }

    public function edit($id)
    {
        $curr['name'] = $this->crumb['edit']['name'];
        $curr['url'] = $this->crumb['edit']['url'];
        $result = [
            'data'=> MenusModel::find($id),
            'pids'=> $this->parents(),
            'types'=> $this->model['types'],
            'crumb'=> $this->crumb,
            'curr'=> $curr,
        ];
        return view('admin.menus.edit', $result);
    }

    public function update(Request $request, $id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = date('Y-m-d H:m:s', time());
        MenusModel::where('id',$id)->update($data);
        return redirect('/admin/menus');
    }

    public function forceDelete($id)
    {
        MenusModel::find($id)->delete();
    }





    /**
     * ==========================
     * 一下是公用方法
     * ==========================
     */

    /**
     * 收集数据
     */
    public function getData(Request $request)
    {
        $data = $request->all();
        if (!$data['style_class']) { $data['style_class'] = ''; }
        if (!$data['intro']) { $data['intro'] = ''; }
        $data = [
            'name'=> $data['name'],
            'type'=> $data['type'],
            'intro'=> $data['intro'],
            'namespace'=> $data['namespace'],
            'controller_prefix'=> substr($data['controller_prefix'],0,-10),
            'url'=> $data['url'],
            'action'=> $data['action'],
            'style_class'=> $data['style_class'],
            'pid'=> $data['pid'],
            'isshow'=> $data['isshow'],
        ];
        return $data;
    }

    /**
     * 第一级菜单
     */
    public function parents()
    {
        return MenusModel::where('pid',0)->get();
    }

//    /**
//     * 得到父操作
//     */
//    public function parent($pid)
//    {
//        if ($pid) {        //获取上级操作名称
//            $pname = MenusModel::where('id',$pid)->first()->name;
//        } else {
//            $pname = '0级操作';
//        }
//        $parent['id'] = $pid;
//        $parent['name'] = $pname;
//        return $parent;
//    }

    /**
     *查询方法
     */
    public function query($type=0)
    {
        if ($type) {
            $datas =  MenusModel::where('type',$type)->paginate($this->limit);
        } else {
            $datas =  MenusModel::paginate($this->limit);
        }
        return $datas;
    }
}
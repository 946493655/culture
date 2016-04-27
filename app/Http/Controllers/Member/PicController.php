<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\PicModel;

class PicController extends BaseController
{
    /**
     * 会员后台图片管理
     */

    public function __construct()
    {
        parent::__construct();
        $this->lists['func']['name'] = '我的图片';
        $this->lists['func']['url'] = 'pic';
        $this->lists['create']['name'] = '添加图片';
        $this->model = new PicModel();
    }

    public function index()
    {
        $result = [
            'datas'=> $this->query($del=0),
            'prefix_url'=> '/member/pic',
            'lists'=> $this->lists,
            'curr_list'=> '',
        ];
        return view('member.pic.index', $result);
    }

    public function trash()
    {
        $result = [
            'datas'=> $this->query($del=1),
            'prefix_url'=> '/member/pic/trash',
            'lists'=> $this->lists,
            'curr_list'=> 'trash',
        ];
        return view('member.pic.index', $result);
    }

    public function create()
    {
        $result = [
//            'categorys'=> $this->model->categorys(),
            'lists'=> $this->lists,
            'curr_list'=> 'create',
        ];
        return view('member.pic.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = date('Y-m-d H:i:s', time());
        PicModel::create($data);
        return redirect('/member/pic');
    }

    public function edit($id)
    {
        $result = [
            'data'=> PicModel::find($id),
            'lists'=> $this->lists,
            'curr_list'=> 'edit',
        ];
        return view('member.pic.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = date('Y-m-d H:i:s', time());
        PicModel::where('id',$id)->update($data);
        return redirect('/member/pic');
    }

    public function show($id)
    {
        $result = [
            'data'=> PicModel::find($id),
            'lists'=> $this->lists,
            'curr_list'=> 'show',
        ];
        return view('member.pic.show', $result);
    }

    public function destroy($id)
    {
        PicModel::where('id',$id)->update(['del'=> 1]);
        return redirect('/member/pic');
    }

    public function restore($id)
    {
        PicModel::where('id',$id)->update(['del'=> 0]);
        return redirect('/member/pic/trash');
    }

    public function forceDelete($id)
    {
        PicModel::where('id',$id)->delete();
        return redirect('/member/pic/trash');
    }



    public function getData(Request $request)
    {
        $data = [
            'uid'=> $this->userid,
            'name'=> $request->name,
            'intro'=> $request->intro,
            'url'=> $request->url,
        ];
        return $data;
    }

    public function query($del)
    {
        return PicModel::where('del',$del)
            ->where('uid',\Session::get('user.uid'))
            ->paginate($this->limit);
    }
}
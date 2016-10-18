<?php
namespace App\Http\Controllers\Member;

use App\Models\RentModel;
use Illuminate\Http\Request;

class RentController extends BaseController
{
    /**
     * 会员后台租赁供求管理
     * rent 器材租赁
     */

    public function __construct()
    {
        parent::__construct();
        $this->lists['func']['name'] = '租赁供求';
        $this->lists['func']['url'] = 'rent';
        $this->lists['create']['name'] = '租赁发布';
        $this->model = new RentModel();
    }

    public function index($genre=0)
    {
        $curr['name'] = $this->lists['']['name'];
        $curr['url'] = $this->lists['']['url'];
        $result = [
            'datas'=> $this->query($del=0,$genre),
            'genre'=> $genre,
            'lists'=> $this->lists,
            'curr'=> $curr,
        ];
        return view('member.rent.index', $result);
    }

    public function trash($genre=0)
    {
        $curr['name'] = $this->lists['trash']['name'];
        $curr['url'] = $this->lists['trash']['url'];
        $result = [
            'datas'=> $this->query($del=1,$genre),
            'genre'=> $genre,
            'lists'=> $this->lists,
            'curr'=> $curr,
        ];
        return view('member.rent.index', $result);
    }

    public function create()
    {
        $curr['name'] = $this->lists['create']['name'];
        $curr['url'] = $this->lists['create']['url'];
        $result = [
            'model'=> $this->model,
            'lists'=> $this->lists,
            'curr'=> $curr,
        ];
        return view('member.rent.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = time();
        RentModel::create($data);

        //插入搜索表
        $rentModel = RentModel::where($data)->first();
        \App\Models\Home\SearchModel::change($rentModel,8,'create');

        return redirect(DOMAIN.'member/rent');
    }

    public function edit($id)
    {
        $curr['name'] = $this->lists['edit']['name'];
        $curr['url'] = $this->lists['edit']['url'];
        $result = [
            'data'=> RentModel::find($id),
            'model'=> $this->model,
            'lists'=> $this->lists,
            'curr'=> $curr,
        ];
        return view('member.rent.edit', $result);
    }

    public function update(Request $request, $id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        RentModel::where('id',$id)->update($data);

        //更新搜索表
        $rentModel = RentModel::where('id',$id)->first();
        \App\Models\Home\SearchModel::change($rentModel,8,'update');

        return redirect(DOMAIN.'member/rent');
    }

    public function show($id)
    {
        $curr['name'] = $this->lists['show']['name'];
        $curr['url'] = $this->lists['show']['url'];
        $result = [
            'data'=> RentModel::find($id),
            'lists'=> $this->lists,
            'curr'=> $curr,
        ];
        return view('member.rent.show', $result);
    }

    public function destroy($id)
    {
        RentModel::where('id',$id)->update(['del'=> 1]);
        return redirect(DOMAIN.'member/rent');
    }

    public function restore($id)
    {
        RentModel::where('id',$id)->update(['del'=> 0]);
        return redirect(DOMAIN.'member/rent/trash');
    }

    public function forceDelete($id)
    {
        RentModel::where('id',$id)->delete();
        return redirect(DOMAIN.'member/rent/trash');
    }





    /**
     * 收集数据
     */
    public function getData(Request $request)
    {
        $data = $request->all();
        //uid暂时为0
        $data['uid'] = 0;
        $rent = [
            'name'=> $data['name'],
            'genre'=> $data['genre'],
            'type'=> $data['type'],
            'intro'=> $data['intro'],
            'uid'=> $data['uid'],
            'money'=> $data['price'],
        ];
        return $rent;
    }

    /**
     * 查询方法
     */
    public function query($del,$genre,$type)
    {
        if ($genre) {
            $datas = RentModel::where('del',$del)
                ->where('genre',$genre)
                ->where('type',$type)
                ->orderBy('id','desc')
                ->paginate($this->limit);
        } else {
            $datas = RentModel::where('del',$del)
                ->where('genre',$genre)
                ->orderBy('id','desc')
                ->paginate($this->limit);
        }
        $datas->limit = $this->limit;
        return $datas;
    }
}
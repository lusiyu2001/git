<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Category;
class IndexController extends Controller
{
    public function index(){
        $goods_model=new Goods;
        $res=$goods_model->limit(4)->get();
        // dd($res);
        //猜你喜欢
        $arr=Goods::where('self_price',200)->get();
        //分类
        $data=Category::where('cate_navshow',1)->get();
        //获取展示栏的顶级分类
        $cate_model=new Category;
        $where=[
            'pid'=>0
        ];
        $pid=$cate_model->where($where)->get()->toArray();

        return view('index',['res'=>$res,'pid'=>$pid,'arr'=>$arr,'data'=>$data]);
    }
    //全部商品
    public function allshop(Request $request){
        // $url_id = substr($request->getRequestUri(),'10');
        // dd($url_id);die;
        $cate_model=new Category;
        $where=[
            'pid'=>0
        ];
        $cateInfo=$cate_model->get()->toArray();
        $res=$this->getCateInfo($cateInfo);
        $pid=$cate_model->where($where)->get()->toArray();
        // dd($pid);
        $id=$request['id'];
        if($id!=0){
            $cate_id=$this->getSonCateId($cateInfo,$id);
            $goodsInfo =Goods::whereIn('cate_id',$cate_id)->get();
        }else{
            $goodsInfo=Goods::all();
        }
        return view("/allshop",['res'=>$res,'pid'=>$pid,'goodsInfo'=>$goodsInfo,'cate_id'=>$id]);
    }
    //递归
    public function getCateInfo($cateInfo,$pid=0){
        static $arr=[];
        foreach($cateInfo as $k=>$v){
            if($v['pid']==$pid){
                $arr[]=$v;
                self::getCateInfo($cateInfo,$v['cate_id']);    
            }
        }
        // dd($arr);
        return $arr;
    }
    //购物车
    public function shopcart(){
        $ser=session('user_tel');
        if($ser!=''){
            $res=Goods::where('is_up',2)->get();
            $add=Goods::where('self_price',200)->get();
             return view("shopcart",['res'=>$res,'add'=>$add]);
        }
       
    }
    //我的
    public function userpage(){
        return view("userpage");
    }
     /**
     * 获取所有子类的id
     * $cateInfo 所有分类信息
     * $pid  父类id
     *  */
    public function getSonCateId($cateInfo,$pid){
        static $cate_id=[];
        foreach($cateInfo as $k=>$v){
            if($v['pid']==$pid){
                $cate_id[]=$v['cate_id'];
                self::getSonCateId($cateInfo,$v['cate_id']);
            }
        }
        // dd($cate_id);
        return $cate_id;
    }
    
}

<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Goods;
use App\Model\Category;
class ShopController extends Controller
{
    //
    public function shopcate(Request $request){
        $pid=$request['cate_id'];
        $goods_model=new Goods();
        // dd($goods_model);
        $cate_model=new Category();
        $cateInfo=$cate_model->all()->toArray();
        //获取所有的子类id
        $cate_id=$this->getSonCateId($cateInfo,$pid);
        //获取所有子类下的id
        $goodsInfo=$goods_model->whereIn('cate_id',$cate_id)->get();
        // dd($goodsInfo);
        return view('shop/getallshop',['goodsInfo'=>$goodsInfo]);

    }
    //根据最新查询
    public function shopnew(Request $request){
        $pid=$request['cate_id'];
        $goods_model=new Goods();
        // dd($goods_model);
        $cate_model=new Category();
        $cateInfo=$cate_model->all()->toArray();
         //获取所有的子类id
         $cate_id=$this->getSonCateId($cateInfo,$pid);
         if($pid==0){
            $goodsInfo=$goods_model->orderBy('create_time','desc')->get();
        }else{
            $goodsInfo=$goods_model->whereIn('cate_id',$cate_id)->orderBy('create_time','desc')->take(5)->get();
         }
        //   dd($goodsInfo);
          return view('shop/getallshop',['goodsInfo'=>$goodsInfo]);
        
    }

    //根据价值排序
    public function shopup(Request $request){
        $pid=$request['cate_id'];
        $goods_model=new Goods();
        // dd($goods_model);
        $cate_model=new Category();
        $cateInfo=$cate_model->all()->toArray();
         //获取所有的子类id
         $cate_id=$this->getSonCateId($cateInfo,$pid);
        //  dd($cate_id);
         if($pid==0){
            $catesInfo=$goods_model->orderBy('create_time','desc')->get();
            // dd($goodsInfo);
        }else{
            $catesInfo=$goods_model->whereIn('cate_id',$cate_id)->orderBy('self_price','desc')->take(5)->get();
         }
        //   dd($goodsInfo);
          return view('shop/addallshop',['catesInfo'=>$catesInfo]);
    }
    //根据价值降序
    public function shopdown(Request $request){
        $pid=$request['cate_id'];
        $goods_model=new Goods();
        // dd($goods_model);
        $cate_model=new Category();
        $cateInfo=$cate_model->all()->toArray();
         //获取所有的子类id
         $cate_id=$this->getSonCateId($cateInfo,$pid);
         if($pid==1){
            $catesInfo=$goods_model->orderBy('create_time','asc')->get();
        }else{
            $catesInfo=$goods_model->whereIn('cate_id',$cate_id)->orderBy('self_price','asc')->take(5)->get();
         }
        //   dd($goodsInfo);
          return view('shop/getaaddallshopllshop',['catesInfo'=>$catesInfo]);
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
    //商品详情
    public function shopcontent(Request $request){
        $data=$request->all();
        $where=[
            'goods_id'=>$data['goods_id'],
        ];
        $res=Goods::where($where)->first();
       
        return view('shop.shopcontent',['res'=>$res]);
    }
}

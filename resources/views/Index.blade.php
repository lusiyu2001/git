﻿@extends("header")
@section("title",'乐美')
@section("content")

        <!-- 焦点图 -->
        <div class="hotimg-wrapper">
            <div class="hotimg-top"></div>
            <section id="sliderBox" class="hotimg">
        		<ul class="slides" style="width: 600%; transition-duration: 0.4s; transform: translate3d(-828px, 0px, 0px);">
        			<li style="width: 414px; float: left; display: block;" class="clone">
        				<a href="#">
        					<img src="https://img1.360buyimg.com/pop/jfs/t1/17291/18/9818/93643/5c80e6cbE43ee9034/f337c07c31785c6e.jpg" alt="">
        				</a>
        			</li>
        			<li class="" style="width: 414px; float: left; display: block;">
        				<a href="#">
        					<img src="https://img1.360buyimg.com/da/jfs/t1/11557/4/11354/90703/5c87cde1E02d1d433/5996e4d0b7a30114.jpg" alt="">
        				</a>
        			</li>
        			<li style="width: 414px; float: left; display: block;" class="flex-active-slide">
        				<a href="#"><img src="https://img1.360buyimg.com/pop/jfs/t1/28761/6/2278/81807/5c1a7ae9Ecbc6ea6f/d6b1409405497ad4.jpg" alt="">
        				</a>
        			</li>
        			<li style="width: 414px; float: left; display: block;" class="">
        				<a href="#"><img src="https://m.360buyimg.com/babel/jfs/t1/32158/37/5387/90078/5c85cbceE88e63b1d/d1b08bab5c4a05d8.jpg" alt=""></a>
        			</li>
        		</ul>
            </section>
        </div>
        <script src="{{url('js/jquery-1.8.3.min.js')}}"></script>   
        <script src="http://cdn.bootcss.com/flexslider/2.6.2/jquery.flexslider.min.js"></script>
        <script>
        	$(function () {  
        		$('.hotimg').flexslider({   
        			directionNav: false,   //是否显示左右控制按钮   
        			controlNav: true,   //是否显示底部切换按钮   
        			pauseOnAction: false,  //手动切换后是否继续自动轮播,继续(false),停止(true),默认true   
        			animation: 'slide',   //淡入淡出(fade)或滑动(slide),默认fade
        			slideshowSpeed: 3000,  //自动轮播间隔时间(毫秒),默认5000ms
        			animationSpeed: 150,   //轮播效果切换时间,默认600ms   
        			direction: 'horizontal',  //设置滑动方向:左右horizontal或者上下vertical,需设置animation: "slide",默认horizontal   
        			randomize: false,   //是否随机幻切换   
        			animationLoop: true   //是否循环滚动  
        		});  
        		setTimeout($('.flexslider img').fadeIn()); 
        	}); 
        </script>
        <!--分类-->
        <div class="index-menu thin-bor-top thin-bor-bottom">
            <ul class="menu-list">
				@foreach($data as $k=>$v)
                <li>
                    <a href="allshop/{{$v['cate_id']}}" id="btnNew">
                        <i class="xinpin ctgr" ></i>
                        <span class="title" cate_id="{{$v['cate_id']}}">{{$v['cate_name']}}</span>
                    </a>
				</li>
				@endforeach
            </ul>
        </div>
        <!--导航-->
        <div class="success-tip">
        	<div class="left-icon"></div>
        	<ul class="right-con">
				<li>
					<span style="color: #4E555E;">
						<a href="./index.php?i=107&amp;c=entry&amp;id=10&amp;do=notice&amp;m=weliam_indiana" style="color: #4E555E;">恭喜<span class="username">啊啊啊</span>获得了<span>iphone7 红色 128G 闪耀你的眼</span></a>
					</span>
				</li>
				<li>
					<span style="color: #4E555E;">
						<a href="./index.php?i=107&amp;c=entry&amp;id=10&amp;do=notice&amp;m=weliam_indiana" style="color: #4E555E;">恭喜<span class="username">啊啊啊</span>获得了<span>iphone7 红色 128G 闪耀你的眼</span></a>
					</span>
				</li>
				<li>
					<span style="color: #4E555E;">
						<a href="./index.php?i=107&amp;c=entry&amp;id=10&amp;do=notice&amp;m=weliam_indiana" style="color: #4E555E;">恭喜<span class="username">啊啊啊</span>获得了<span>iphone7 红色 128G 闪耀你的眼</span></a>
					</span>
				</li>
			</ul>
        </div>
  
        <!-- 热门推荐 -->
        <div class="line hot">
        	<div class="hot-content">
        		<i></i>
        		<span>商品列表</span>
        		<div class="l-left"></div>
        		<div class="l-right"></div>
        	</div>
        </div>
        <div class="goods-wrap marginB">
            <ul id="ulGoodsList" class="goods-list clearfix">
        @foreach($res as $k=>$v)
            	<li id="23558" codeid="12751965" goodsid="23558" codeperiod="28436">
            		<a href="javascript:;" class="g-pic">
            			<img class="lazy" name="goodsImg" src="/storage/goodsImg/{{$v->goods_img}}" width="136" height="136">
            		</a>
            		<p class="g-name">{{$v->goods_name}}</p>
            		<ins class="gray9">价值：￥<span>{{$v->self_price}}</span>.00</ins>
            		<div class="Progress-bar">
            			<p class="u-progress">
            				<span class="pgbar" style="width: 96.43076923076923%;">
            					<span class="pging"></span>
            				</span>
            			</p>
            		</div>
            		<div class="btn-wrap" name="buyBox" limitbuy="0" surplus="58" totalnum="1625" alreadybuy="1567">
            			<a href="javascript:;" class="buy-btn" codeid="12751965">立即购买</a>
            			<div class="gRate" codeid="12751965" canbuy="58">
            				<a href="javascript:;"></a>
            			</div>
            		</div>
            	</li>
            @endforeach
            </ul>
        </div> 
        <!-- 猜你喜欢 -->
        <div class="line guess">
        	<div class="hot-content">
        		<i></i>
        		<span>猜你喜欢</span>
        		<div class="l-left"></div>
        		<div class="l-right"></div>
        	</div>
        </div>
        <!--商品列表-->
        <div class="hot-wrapper">
        	<ul class="clearfix">
			@foreach($arr as $v)
            	<li id="23558" codeid="12751965" goodsid="23558" codeperiod="28436">
					<a href="javascript:;" class="g-pic">
						<img src="/storage/goodsImg/{{$v->goods_img}}" width="136" height="136" name="goodsImg" class="lazy">
					</a>
					
            		<p class="g-name">{{$v->goods_name}}</p>
            		<ins class="gray9">价值：￥{{$v->self_price}}</ins>
            		<div class="Progress-bar">
            			<p class="u-progress">
            				<span class="pgbar" style="width: 96.43076923076923%;">
            					<span class="pging"></span>
            				</span>
            			</p>
						@endforeach
            		</div>
            	</li>
        	</ul>
			<div class="loading clearfix"><b></b>正在加载</div>
        </div>
@endsection
@extends('footer')
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>

<script>  
    @yield('my-js')
</script>
<script>
$(function(){
	$(document).on('click','.ctgr',function(){
		var cate_id=$(this).next().attr('cate_id');
		// console.log(cate_id);
		$.ajax({
                method: "GET",
                url: "showtop",
                data: {cate_id:cate_id}
            }).done(function(res) {
				console.log(res);
            });
	})
})
</script>

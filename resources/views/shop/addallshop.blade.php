@foreach($catesInfo as $k=>$v)
    <li id="23468">    
        <span class="gList_l fl">        
            <img class="lazy" data-original="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" src="/storage/goodsImg/{{$v->goods_img}}">
        </span>    
        <div class="gList_r">        
            <h3 class="gray6">{{$v->goods_name}}</h3>        
            <em class="gray9">价值：￥<span>{{$v->self_price}}</span>.00</em>
            <div class="gRate">            
                <div class="Progress-bar">    
                    <p class="u-progress">
                        <span style="width: 91.91286930395593%;" class="pgbar">
                            <span class="pging"></span>
                        </span>
                    </p>                
                    <ul class="Pro-bar-li">
                        <li class="P-bar01"><em>7342</em>已参与</li>
                        <li class="P-bar02"><em>7988</em>总需人次</li>
                        <li class="P-bar03"><em>646</em>剩余</li>
                    </ul>            
                </div>           
                <a codeid="12785750" class="" canbuy="646"><s></s></a>        
            </div>    
        </div>
    </li>
@endforeach
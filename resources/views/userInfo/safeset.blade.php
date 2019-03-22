@extends("header")
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">安全设置</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>

    <div class="wallet-con">
        <div class="w-item">
            <ul class="w-content clearfix">
                <li>
                    <em class="login"></em>
                    <a href="resetpassword">登录密码</a>
                    <s class="fr"><a href="resetpassword"></a></s>
                    <span class="fr">修改</span>
                </li>
                <li>
                    <em class="pay"></em>
                    <a href="">支付密码</a>
                    <s class="fr"></s>
                    <span class="fr">已开启</span>
                </li>
                <li>
                    <em class="card"></em>
                    <a href="">银行卡</a>
                    <s class="fr"></s>
                </li>           
            </ul>     
        </div>
    </div>
</body>
</html>

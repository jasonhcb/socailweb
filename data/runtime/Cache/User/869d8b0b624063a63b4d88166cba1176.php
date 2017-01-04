<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<meta name="author" content="ThinkCMF">
	<?php  function _sp_helloworld(){ echo "hello ThinkCMF!"; } function _sp_helloworld2(){ echo "hello ThinkCMF2!"; } function _sp_helloworld3(){ echo "hello ThinkCMF3!"; } ?>
	<?php $portal_index_lastnews="1,2"; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX2.1.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.1.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.1.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
	<meta name="author" content="ThinkCMF">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

   	<!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
	<link rel="icon" href="/socailsys/themes/simplebootx/Public/images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/socailsys/themes/simplebootx/Public/images/favicon.ico" type="image/x-icon">
    <link href="/socailsys/themes/simplebootx/Public/simpleboot/themes/simplebootx/theme.min.css" rel="stylesheet">
 	<link href="./Public/css/AdminLTE.css" rel="stylesheet">
 	<link href="./Public/css/AdminLTE.min.css" rel="stylesheet">
    <link href="/socailsys/themes/simplebootx/Public/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/socailsys/themes/simplebootx/Public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<!--[if IE 7]>
	<link rel="stylesheet" href="/socailsys/themes/simplebootx/Public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<link href="/socailsys/themes/simplebootx/Public/css/style.css" rel="stylesheet">
	<style>
		/*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
		#backtotop{position: fixed;bottom: 50px;right:20px;display: none;cursor: pointer;font-size: 50px;z-index: 9999;}
		#backtotop:hover{color:#333}
		#main-menu-user li.user{display: none}
	</style>
	
</head>
<body class="body-white" id="top">
	<?php echo hook('body_start');?>
<div class="navbar navbar-fixed-top">
   <div class="navbar-inner" style="background: #08c;">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="/socailsys/"><img src="/socailsys/themes/simplebootx/Public/images/logo1.png" style="width: 200px;" /></a>
       <div class="nav-collapse collapse" id="main-menu">
       	<?php
 $effected_id="main-menu"; $filetpl="<a href='\$href' target='\$target' style='color:white;text-shadow:none;'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
		
		<ul class="nav pull-right" id="main-menu-user">
			<li class="dropdown user login">
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#" style='color:white;text-shadow:none;'>
	            <img src="/socailsys/themes/simplebootx//Public/images/headicon.png" class="headicon" id="avatar_small"/>
	            <!-- <span class="user-nicename"></span><b class="caret"></b></a> -->
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo U('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo U('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
	            </ul>
          	</li>
          	<li class="dropdown user offline">
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#" style='color:white;text-shadow:none;'>
	           		<img src="/socailsys/themes/simplebootx//Public/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li>
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li>
	               <li><a href="<?php echo leuu('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo leuu('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>
	            </ul>
          	</li>
		</ul>
		<div class="pull-right">
        	<form method="post" class="form-inline" action="<?php echo U('portal/search/index');?>" style="margin:18px 0;">
				 <input type="text" class="" placeholder="Search" name="keyword" value="<?php echo I('get.keyword');?>"/>
				 <input type="submit" class="btn btn-info" value="Go" style="margin:0"/>
			</form>
		</div>
       </div>
     </div>
   </div>
 </div>

		<div class="container tc-main">
                <div class="row">
                    <div class="span3">
	                    <div class="list-group">
	<a class="list-group-item" href="<?php echo U('user/profile/edit');?>"><i class="fa fa-list-alt fa-fw"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo U('user/profile/password');?>"><i class="fa fa-lock fa-fw"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo U('user/profile/avatar');?>"><i class="fa fa-user fa-fw"></i> 编辑头像</a>
	<a class="list-group-item" href="<?php echo U('user/profile/bang');?>"><i class="fa fa-exchange fa-fw"></i> 绑定账号</a>
	<a class="list-group-item" href="<?php echo U('user/favorite/index');?>"><i class="fa fa-star-o fa-fw"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo U('comment/comment/index');?>"><i class="fa fa-comments-o fa-fw"></i> 我的评论</a>
	<a class="list-group-item" href="<?php echo U('user/profile/apoint');?>"><i class="fa fa-comments-o fa-fw"></i> 我的预约</a>
</div>
                    </div>
                    <div class="span9">
                          <form class="js-ajax-form" action="" method="post">
<!--       <div class="table-actions">
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/listorders');?>"><?php echo L('SORT');?></button>
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/check',array('check'=>1));?>" data-subcheck="true">审核</button>
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/check',array('uncheck'=>1));?>" data-subcheck="true">取消审核</button>
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/top',array('top'=>1));?>" data-subcheck="true">置顶</button>
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/top',array('untop'=>1));?>" data-subcheck="true">取消置顶</button>
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/recommend',array('recommend'=>1));?>" data-subcheck="true">推荐</button>
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/recommend',array('unrecommend'=>1));?>" data-subcheck="true">取消推荐</button>
        <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/delete');?>" data-subcheck="true" data-msg="你确定删除吗？"><?php echo L('DELETE');?></button>
        <button class="btn btn-primary btn-small js-articles-move" type="button">批量移动</button>
      </div> -->
      <table class="table table-hover table-bordered table-list">
        <thead>
          <tr>
            <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
<!--             <th width="50"><?php echo L('SORT');?></th> -->
            <th>预约商家</th>
            <th width="80">预约人</th>
            <th width="80">联系号码</th>
            <th width="70">预约时间</th>
            <th width="50"><?php echo L('STATUS');?></th>
            <th width="70"><?php echo L('ACTIONS');?></th>
          </tr>
        </thead>
        <?php $status=array("1"=>"已审核","0"=>"未审核"); $top_status=array("1"=>"已置顶","0"=>"未置顶"); $recommend_status=array("1"=>"已推荐","0"=>"未推荐"); ?>
        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
          <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["tid"]); ?>" title="ID:<?php echo ($vo["tid"]); ?>"></td>
<!--           <td><input name="listorders[<?php echo ($vo["tid"]); ?>]" class="input input-order" type="text" size="5" value="<?php echo ($vo["sort"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td> -->
          <td><a href="<?php echo U('portal/article/index',array('id'=>$vo['id']));?>" target="_blank"> <span><?php echo ($vo["server_name"]); ?></span></a></td>
          <td><?php echo ($vo["user_name"]); ?></td>
          <td><?php echo ($vo["user_mobile"]); ?></td>
          <td><?php echo ($vo["apoint_time"]); ?></td>
          <td><?php echo ($status[$vo['status']]); ?><br><?php echo ($top_status[$vo['istop']]); ?><br><?php echo ($recommend_status[$vo['recommended']]); ?>
          </td>
          <td>
            <a href="#"><?php echo L('EDIT');?></a> | 
            <a href="#"><?php echo L('DELETE');?></a></td>
        </tr><?php endforeach; endif; ?>
      </table>
      <div class="pagination"><?php echo ($Page); ?></div>
    </form>
                    </div>
                </div>

		<br>
<br>
<br>
<!-- Footer ================================================== -->
<hr>
<?php echo hook('footer');?>
<div id="footer">
	<div class="links">
		<?php $links=sp_getlinks(); ?>
		<?php if(is_array($links)): foreach($links as $key=>$vo): ?><a href="" target="<?php echo ($vo["link_target"]); ?>">社区后台管理</a><?php endforeach; endif; ?>
	</div>
	<p>
		Made by <a href="http://www.thinkcmf.com" target="_blank">社区后台管理系统</a>
		Code licensed under the 
		<a href="http://www.apache.org/licenses/LICENSE-2.0" rel="nofollow" target="_blank">Apache License v2.0</a>.
		<br />
		Based on 
		<a href="http://getbootstrap.com/2.3.2/" target="_blank">Bootstrap</a>.
		Icons from 
		<a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">Font Awesome</a>
	</p>
</div>
<div id="backtotop">
	<i class="fa fa-arrow-circle-up"></i>
</div>
<?php echo ($site_tongji); ?>


	</div>
	<!-- /container -->

	<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/socailsys/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/socailsys/public/js/jquery.js"></script>
    <script src="/socailsys/public/js/wind.js"></script>
    <script src="/socailsys/themes/simplebootx/Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script src="/socailsys/public/js/frontend.js"></script>
	<script>
	$(function(){
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		
		$("#main-menu li.dropdown").hover(function(){
			$(this).addClass("open");
		},function(){
			$(this).removeClass("open");
		});
		
		$.post("<?php echo U('user/index/is_login');?>",{},function(data){
			if(data.status==1){
				if(data.user.avatar){
					$("#main-menu-user .headicon").attr("src",data.user.avatar.indexOf("http")==0?data.user.avatar:"/socailsys/data/upload/avatar/"+data.user.avatar);
				}
				
				$("#main-menu-user .user-nicename").text(data.user.user_nicename!=""?data.user.user_nicename:data.user.user_login);
				$("#main-menu-user li.login").show();
				
			}
			if(data.status==0){
				$("#main-menu-user li.offline").show();
			}
			
		});	
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>


</body>
</html>
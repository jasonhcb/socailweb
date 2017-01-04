<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html>
	<head>
		<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($site_seo_description); ?>">
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
	
		<link href="/socailsys/themes/simplebootx/Public/css/slippry/slippry.css" rel="stylesheet">
		<style>
			.caption-wraper{position: absolute;left:50%;bottom:2em;}
			.caption-wraper .caption{
			position: relative;left:-50%;
			background-color: rgba(0, 0, 0, 0.54);
			padding: 0.4em 1em;
			color:#fff;
			-webkit-border-radius: 1.2em;
			-moz-border-radius: 1.2em;
			-ms-border-radius: 1.2em;
			-o-border-radius: 1.2em;
			border-radius: 1.2em;
			}
			@media (max-width: 767px){
				.sy-box{margin: 12px -20px 0 -20px;}
				.caption-wraper{left:0;bottom: 0.4em;}
				.caption-wraper .caption{
				left: 0;
				padding: 0.2em 0.4em;
				font-size: 0.92em;
				-webkit-border-radius: 0;
				-moz-border-radius: 0;
				-ms-border-radius: 0;
				-o-border-radius: 0;
				border-radius: 0;}
			}
		</style>
	</head>
<body class="body-white">
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
<div class="callout callout-info" style="margin-top: 5px;margin-bottom: 0px;background-color: #428BCA !important;">
            <h4 style="color:white;">社区列表</h4>
            <p>
            	<?php if(is_array($socail)): $i = 0; $__LIST__ = array_slice($socail,0,14,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('index',array('id'=>$vo[id]));?>" style="text-decoration:none;margin-left: 20px;"><span value="<?php echo ($vo["socail_name"]); ?>"><?php echo ($vo["socail_name"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
				<a href="<?php echo U('index',array('id'=>"all"));?>" style="text-decoration:none;margin-left: 20px;"><span value="">更多...</span></a>
            </p>
</div>
<div class="row-fluid" style="margin-top: 5px;">
<div class="span4" style="margin-left: 5px;margin-right: 5px;">
<div class="list-group">
  <a href="#" class="list-group-item active" style="background-color:#39668C;border-color:#39668C;">
    社区公告 <span style="float: right;">更多</span>
  </a>

  <?php if(is_array($adv)): $i = 0; $__LIST__ = $adv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="" class="list-group-item" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo ($vo["adv_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>
<div class="span5" style="margin-left:0px; ">
  <a href="#" class="list-group-item active" style="background-color:#39668C;border-color:#39668C;">
    社区动态
  </a>
<?php $home_slides=sp_getslide("S_index"); $home_slides=empty($home_slides)?$default_home_slides:$home_slides; ?>
<ul id="homeslider" class="unstyled">
	<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li>
		<div class="caption-wraper">
			<div class="caption"><?php echo ($vo["slide_name"]); ?></div>
		</div>
		<a href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt=""></a>
	</li><?php endforeach; endif; ?>
</ul>
</div>

<div class="span3" style="margin-left: 5px;margin-right: 5px;float: left;max-width:340px;width: 340px;">
<div class="list-group">
  <!-- Nav tabs -->
  <a href="#" class="list-group-item active" style="background-color:#39668C;border-color:#39668C;">
    快捷服务
  </a>

  <!-- Tab panes -->
  <div class="tab-content">
  <table class="bianmintable" cellpadding="0" cellspacing="0" border="0" id="chongzhitable" style="display: block;text-align: center;">
	<tbody>
	<tr>
                <td>
                <div class="info-box" style="margin-right: 2px;">
      				<a href="https://jiaofei.alipay.com/jiaofei.htm?_pdType=aecfbbfgeabbifdfdieh" target="_blank">
      				<!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_01h.png"> -->
      				<span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-flash"></i></span>
      				<div class="caption"><span >水电气缴费</span></div>
	 				</a>
	 			</div>
                </td>

                <td>					
                <div class="info-box" style="margin-right: 2px;">
                    <a class="bianminA10" href="http://wt.taobao.com/" target="_blank">
                    	<span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-mobile"></i></span>
                        <!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_02h.png"> -->
                        <div class="caption"><span>手机充值</span></div>
      				</a>
      				</div>
                </td>
                <td>
                	<div class="info-box" style="margin-right: 2px;">
                    <a class="bianminA11" href="https://ebppprod.alipay.com/traffic.htm?_pdType=bbcjbfefaciiiieiijgj" target="_blank">
                        <!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_03.png"> -->
                        <span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-car"></i></span>
                    <div class="caption"><span>交通罚款</span></div>
                     </a>
                    </div>
                </td>
                <td>					
                <div class="info-box" style="margin-right: 2px;">
                    <a class="bianminA12" href="http://sc.189.cn/cms/udw/0128/service/beforelogin/index.php" target="_blank">
                        <span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-wifi"></i></span>
                        <!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_04.png"> -->
                    <div class="caption"><span>宽带缴费</span> </div></a>
                </div>
                </td>
                </tr>
                <tr>
                <td>
                <div class="info-box" style="margin-right: 2px;">
      				<a href="http://tools.2345.com/kuaidi.htm" target="_blank">
      				<!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_01h.png"> -->
      				<span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-bicycle"></i></span>
      				<div class="caption"><span>快递查询</span></div>
	 				</a>
	 			</div>
                </td>

                <td>					
                <div class="info-box" style="margin-right: 2px;">
                    <a class="bianminA10" href="http://www.weather.com.cn/" target="_blank">
                    	<span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-cloud"></i></span>
                        <!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_02h.png"> -->
                        <div class="caption"><span>天气查询</span></div>
      				</a>
      				</div>
                </td>
                <td>
                	<div class="info-box" style="margin-right: 2px;">
                    <a class="bianminA11" href="http://tools.2345.com/zhishi/" target="_blank">
                        <!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_03.png"> -->
                        <span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-hand-paper-o"></i></span>
                    <div class="caption"><span>生活百科</span></div>
                     </a>
                    </div>
                </td>
                <td>					
                <div class="info-box" style="margin-right: 2px;">
                    <a class="bianminA12" href="http://tools.2345.com/rili.htm" target="_blank">
                        <span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa fa-calendar-check-o"></i></span>
                        <!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_04.png"> -->
                    <div class="caption"><span>日历查询</span> </div></a>
                    </div>
                </td>
                </tr>

               	<tr>
               		<td>					
                <div class="info-box" style="margin-right: 2px;">
                    <a class="bianminA12" href="http://tools.2345.com/life.htm" target="_blank">
                        <span class="info-box-icon bg-aqua" style="margin-top: 6px;width: 80px;height: 80px;"><i class="fa  fa-search"></i></span>
                        <!-- <img style="width:60px;" src="/socailsys/themes/simplebootx/Public/images/chongzhi_04.png"> -->
                    <div class="caption"><span>其他服务</span> </div></a>
                    </div>
                </td>
               	</tr>
        </tbody>
        </table>
  </div>
</div>
</div>
</div>


<div class="container" style="margin-left: 5px;margin-right: 5px;width:100%;">

<div class="row-fluid">
		<div class="span4" style="width: ">
						<div class="list-group">
  <a href="#" class="list-group-item active" style="background-color:#39668C;border-color:#39668C;">
    社区活动<span style="float: right;">更多</span>
  </a>
  <a href="#" class="list-group-item">关爱空巢老人</a>
  <a href="#" class="list-group-item">2014-11-8邮拱局社区家庭教育指导中心教育活动</a>
  <a href="#" class="list-group-item">文明劝导员</a>
  <a href="#" class="list-group-item">阳光相伴老年活动</a>
  <a href="#" class="list-group-item">邮拱局社区组织志愿者关爱辖区留守儿童</a>
  <a href="#" class="list-group-item">红色义工进社区活动</a>
  <a href="#" class="list-group-item">南津路街道办事处召开安全大检查安排会</a>
  <a href="#" class="list-group-item">南津路街道办加强春季消防安全培训</a>
</div>
</div>
		<div class="span8" style="margin-left: 5px;">
			<div class="list-group">
  <a href="#" class="list-group-item active" style="background-color:#39668C;border-color:#39668C;">
    社区新闻<span style="float: right;">更多</span>
  </a>
  <?php if(is_array($posts)): $i = 0; $__LIST__ = $posts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('article/index',array('id'=>$vo['id'],'cid'=>$vo['term_id']));?>" class="list-group-item" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo ($vo["post_title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
		</div>
</div>

<!-- 	<div>
		<h1 class="text-center">最新资讯</h1>
		<h3 class="text-center">Last News</h3>
	</div>
	<?php $lastnews=sp_sql_posts("cid:$portal_index_lastnews;field:post_title,post_excerpt,tid,smeta;order:listorder asc;limit:4;"); ?>
	<div class="row">
		<?php if(is_array($lastnews)): foreach($lastnews as $key=>$vo): $smeta=json_decode($vo['smeta'],true); ?>
		<div class="span3">
			<div class="tc-gridbox">
				<div class="header">
					<div class="item-image">
						<a href="<?php echo leuu('article/index',array('id'=>$vo['tid'],'cid'=>$vo['term_id']));?>">
							<?php if(empty($smeta['thumb'])): ?><img src="/socailsys/themes/simplebootx/Public/images/default_tupian1.png" class="img-responsive" alt="<?php echo ($vo["post_title"]); ?>"/>
							<?php else: ?> 
								<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" class="img-responsive img-thumbnail" alt="<?php echo ($vo["post_title"]); ?>" /><?php endif; ?>
						</a>
					</div>
					<h3><a href="<?php echo leuu('article/index',array('id'=>$vo['tid'],'cid'=>$vo['term_id']));?>"><?php echo ($vo["post_title"]); ?></a></h3>
					<hr>
				</div>
				<div class="body">
					<p><a href="<?php echo leuu('article/index',array('id'=>$vo['tid'],'cid'=>$vo['term_id']));?>"><?php echo msubstr($vo['post_excerpt'],0,32);?></a></p>
				</div>
			</div>
		</div><?php endforeach; endif; ?>
	</div> -->
<div class="timeline-item">
                    <!-- <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span> -->
                    <h3 class="timeline-header"><a href="#">社区</a>热点站</h3>
                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
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


<script src="/socailsys/themes/simplebootx/Public/js/slippry.min.js"></script>
<script>
$(function() {
	var demo1 = $("#homeslider").slippry({
		transition: 'fade',
		useCSS: true,
		captions: false,
		speed: 1000,
		pause: 3000,
		auto: true,
		preload: 'visible'
	});
});
</script>
<?php echo hook('footer_end');?>
</body>
</html>
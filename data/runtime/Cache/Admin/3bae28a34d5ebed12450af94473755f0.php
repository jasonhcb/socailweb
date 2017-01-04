<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/socailsys/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/socailsys/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/socailsys/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/socailsys/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/socailsys/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
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
    <script src="/socailsys/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('Convenience/lease',array('term_id'=>$_GET['term_id']));?>"><?php echo L('CON_LEASE');?></a></li>
			<!-- <li><a href="<?php echo U('Hospital/edit');?>"><?php echo L('HOSPITAL_UPDATE');?></a></li> -->
		</ul>
    <form class="well form-search" method="post" id="cid-form">
      <select class="select_2" name="tid" style="width: 100px;" id="selected-cid">
        <option value=''>请选择</option>
        <?php if(is_array($term)): foreach($term as $key=>$vo): if(($vo["term_id"]) == $cid): ?><option value="<?php echo ($vo["term_id"]); ?>" selected><?php echo ($vo["name"]); ?></option>
        <?php else: ?>
        <option value="<?php echo ($vo["term_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
      </select>
    </form>
    
    <!-- <?php if(k%3==0): ?>-->
		<div class="row-fluid">
    <!--<?php endif; ?> -->
    <?php if(is_array($result)): foreach($result as $k=>$vo): ?><!-- <?php echo ($k % 3); ?> -->
            <?php if($k % 3==0){ ?>
            <ul class="thumbnails">
              <?php if(is_array($result)): $i = 0; $__LIST__ = array_slice($result,$k,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li class="span4">
                <div class="thumbnail">
                  <img alt="300x200" src="<?php echo sp_get_asset_upload_path($co['con_img']);?>" style="width: 300px; height: 200px;">
                  <div class="caption">
                    <h3><?php echo ($co["con_name"]); ?></h3>
                    <p><?php echo ($co["con_mobile"]); ?></p>
                    <!-- <p><?php echo ($co["hos_description"]); ?></p> -->
                    <p>
                      <a href="<?php echo U('Convenience/edit',array('id'=>$co['id']));?>" class="btn btn-primary">查看</a>
                      <a href="<?php echo U('Convenience/delete',array('id'=>$co['id']));?>" class="btn btn-danger">删除</a>
                      <a href="<?php echo U('Convenience/ban',array('id'=>$co['id']));?>" class="btn btn-info"><?php if($co['status']==0){ echo "显示";}else{echo "隐藏";} ?></a>
                      <a href="<?php echo U('Convenience/edit',array('id'=>$co['id']));?>" class="btn btn-success">修改</a>
                    </p>
                  </div>
                </div>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php } ?>
            <?php $k = $k+3; endforeach; endif; ?>
    </div>



		<div class="pagination"><?php echo ($page); ?></div>
	</div>
	<script src="/socailsys/public/js/common.js"></script>
  <script>
    setCookie('refersh_time', 0);
    function refersh_window() {
      var refersh_time = getCookie('refersh_time');
      if (refersh_time == 1) {
        window.location.reload();
      }
    }
    setInterval(function() {
      refersh_window()
    }, 3000);
    $(function() {
      $("#selected-cid").change(function() {
        $("#cid-form").submit();
      });
    });
  </script>
</body>
</html>
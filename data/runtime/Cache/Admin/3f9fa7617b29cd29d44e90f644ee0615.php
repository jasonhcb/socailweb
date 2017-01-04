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
<!-- 		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;"><?php echo L('ADS_ALL');?></a></li>
			<li><a href="<?php echo U('Property/ads_add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>" target="_self"><?php echo L('ADS_ADD');?></a></li>
		</ul> -->
		      <table class="table table-hover table-bordered table-list">
        <thead>
          <tr>
            <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
<!--             <th width="50"><?php echo L('SORT');?></th> -->
            <th>预约商家</th>
            <th>预约内容</th>
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
          <td><a href="#" target="_blank"> <span><?php echo ($vo["server_name"]); ?></span></a></td>
          <td><?php echo ($vo["apoint_content"]); ?></td>
          <td><?php echo ($vo["user_name"]); ?></td>
          <td><?php echo ($vo["user_mobile"]); ?></td>
          <td><?php echo ($vo["apoint_time"]); ?></td>
          <td><?php echo ($status[$vo['status']]); ?><br><?php echo ($top_status[$vo['istop']]); ?><br><?php echo ($recommend_status[$vo['recommended']]); ?>
          </td>
          <td>
            <a href="<?php echo U('admin/socailfind/edit',array('id'=>$vo['id']));?>"><?php echo L('EDIT');?></a> | 
            <a href="<?php echo U('admin/socailfind/delete',array('id'=>$vo['id']));?>"><?php echo L('DELETE');?></a></td>
        </tr><?php endforeach; endif; ?>
      </table>
	</div>
	<script src="/socailsys/public/js/common.js"></script>
	<script>
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location = "<?php echo U('AdminPost/index',$formget);?>";
			}
		}
		setInterval(function() {
			refersh_window();
		}, 2000);
		$(function() {
			setCookie("refersh_time", 0);
			Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
				//批量移动
				$('.js-articles-move').click(function(e) {
					var str = 0;
					var id = tag = '';
					$("input[name='ids[]']").each(function() {
						if ($(this).attr('checked')) {
							str = 1;
							id += tag + $(this).val();
							tag = ',';
						}
					});
					if (str == 0) {
						art.dialog.through({
							id : 'error',
							icon : 'error',
							content : '您没有勾选信息，无法进行操作！',
							cancelVal : '关闭',
							cancel : true
						});
						return false;
					}
					var $this = $(this);
					art.dialog.open("/socailsys/index.php?g=portal&m=AdminPost&a=move&ids="+ id, {
						title : "批量移动",
						width : "80%"
					});
				});
			});
		});
	</script>
</body>
</html>
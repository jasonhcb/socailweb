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
			<li><a href="<?php echo U('rbac/index');?>"><?php echo L('ADMIN_RBAC_INDEX');?></a></li>
			<li><a href="<?php echo U('rbac/roleadd');?>"><?php echo L('ADMIN_RBAC_ROLEADD');?></a></li>
		</ul>
		<form class="form-horizontal js-ajax-form" action="<?php echo U('Rbac/roleedit_post');?>" method="post">
			<fieldset>
				<div class="control-group">
					<label class="control-label"><?php echo L('ROLE_NAME');?></label>
					<div class="controls">
						<input type="text" name="name" value="<?php echo ($data["name"]); ?>">
						<span class="form-required">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('ROLE_DESCRIPTION');?></label>
					<div class="controls">
						<textarea name="remark" rows="2" cols="20" style="height: 100px; width: 500px;"><?php echo ($data["remark"]); ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('STATUS');?></label>
					<div class="controls">
						<?php $active_true_checked=($data['status']==1)?"checked":""; ?>
						<label class="radio inline" for="active_true">
							<input type="radio" name="status" value="1" <?php echo ($active_true_checked); ?> id="active_true"/><?php echo L('ENABLED');?>
						</label>
						<?php $active_false_checked=($data['status']==0)?"checked":""; ?>
						<label class="radio inline" for="active_false">
							<input type="radio" name="status" value="0" id="active_false"<?php echo ($active_false_checked); ?>><?php echo L('DISABLED');?>
						</label>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"/>
				<button type="submit" class="btn btn-primary  js-ajax-submit"><?php echo L('SAVE');?></button>
				<a class="btn" href="<?php echo U('rbac/index');?>"><?php echo L('BACK');?></a>
			</div>
		</form>
	</div>
	<script src="/socailsys/public/js/common.js"></script>
</body>
</html>
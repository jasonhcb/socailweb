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
<style type="text/css">
.pic-list li {
	margin-bottom: 5px;
}
</style>
<script type="text/javascript">
	$(function(){
		$("select[name='province']").change(function(){
			var city_id = $(this).children('option:selected').val();
			$.post("<?php echo U('hospital/getcity');?>",{parent_id:city_id},function(data,status){
				var op = eval('(' + data + ')');
				var ht = "<option value=''>请选择</option>";
				$.each(op,function(name,obj){
					ht = ht + "<option value='"+obj.area_id+"'>"+obj.area_name+"</option>";
				})
				$("select[name='city']").empty();
				$("select[name='area']").empty();
				$("select[name='stress']").empty();
				$("select[name='city']").append(ht);
			})
		})

		$("select[name='city']").change(function(){
			var province_id = $(this).children('option:selected').val();
			$.post("<?php echo U('hospital/getcity');?>",{parent_id:province_id},function(data,status){
				var op = eval('(' + data + ')');
				var ht = "<option value=''>请选择</option>";
				$.each(op,function(name,obj){
					ht = ht + "<option value='"+obj.area_id+"'>"+obj.area_name+"</option>";
				})
				$("select[name='area']").empty();
				// $("select[name='city']").empty();
				$("select[name='area']").append(ht);
			})
		})

		$("select[name='area']").change(function(){
			var area_id = $(this).children('option:selected').val();
			$.post("<?php echo U('hospital/getcity');?>",{parent_id:area_id},function(data,status){
				var op = eval('(' + data + ')');
				var ht = "<option value=''>请选择</option>";
				$.each(op,function(name,obj){
					ht = ht + "<option value='"+obj.area_id+"'>"+obj.area_name+"</option>";
				})
				$("select[name='stress']").empty();
				// $("select[name='city']").empty();
				$("select[name='stress']").append(ht);
			})
		})

		$("select[name='term_id']").change(function(){
			var term_id = $(this).children('option:selected').val();
			$.post("<?php echo U('Convenience/getdetail');?>",{term_id:term_id},function(data,status){
				// alert(data);
				var op = eval('(' + data + ')');
				var ht = "<option value=''>请选择</option>";
				$.each(op,function(name,obj){
					ht = ht + "<option value='"+obj.term_id+"'>"+obj.name+"</option>";
				})
				$("select[name='detail_id']").empty();
				// $("select[name='city']").empty();
				$("select[name='detail_id']").append(ht);
			})
		})

	})
</script>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<!-- <li><a href="<?php echo U('AdminPost/index');?>"><?php echo L('HOSPOTIAL_ALL');?></a></li> -->
			<li class="active"><a href="<?php echo U('Convenience/addserver',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>" target="_self"><?php echo L('CON_ADD');?></a></li>
		</ul>
		<form action="<?php echo U('Convenience/add_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered">
						<!-- <tr> -->
							<!-- <th width="80">栏目</th> -->
<!-- 							<td>
								<select multiple="multiple" style="max-height: 100px;" name="term[]"><?php echo ($taxonomys); ?></select>
								<div>windows：按住 Ctrl 按钮来选择多个选项,Mac：按住 command 按钮来选择多个选项</div>
							</td> -->
						<!-- </tr> -->
						<tr>
							<th><b>缩略图</b></th>
								<td>
									<div>
										<input type="hidden" name="hos_img" id="thumb" value="">
										<a href="javascript:void(0);" onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
										<img src="/socailsys/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png" id="thumb_preview" width="135" style="cursor: hand" />
										</a>
										<input type="button" class="btn btn-small" onclick="$('#thumb_preview').attr('src','/socailsys/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;" value="取消图片">
									</div>
								</td>
						</tr>
						<tr>
							<th width="100">服务分类</th>
							<td>
								<select name="term_id" required>
								<option value="">请选择</option>
								<?php if(is_array($term)): $i = 0; $__LIST__ = $term;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["term_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>

								<select name="detail_id" required>
								</select>
							</td>
						</tr>
						<tr>
							<th width="100">服务名称</th>
							<td>
								<input type="text" style="width:400px;" name="hos_name" id="title" required value="" placeholder="请输入标题"/>
								<span class="form-required">*</span>
							</td>
						</tr>
						<tr>
							<th>联系方式</th>
							<td><input type="text" name="hos_mobile" id="keywords" value="" style="width: 400px" placeholder="请输入联系方式"></td>
						</tr>
						<tr>
						<th>地区：</th>
						<td>
							<select name="province" id="province">
								<option value="">请选择</option>
								<?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["area_id"]); ?>"><?php echo ($vo["area_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<select name="city">
							</select>
							<select name="area" >
							</select>
							<select name="stress">
							</select>
						</td>
					</tr>
						<tr>
							<th>服务详细地址</th>
							<td>
								<input type="text" style="width: 400px" name="hos_add" id=""  placeholder="机构详细地址">
							</td>
						</tr>
						<tr>
							<th>排序</th>
							<td>
								<input type="text" style="width: 400px" name="sort" id="description"  placeholder="排序">
							</td>
						</tr>
						<tr>
							<th>服务介绍</th>
							<td>
								<script type="text/plain" id="content" name="hos_des"></script>
							</td>
						</tr>
<!-- 						<tr>
							<th>机构相册</th>
							<td>
								<fieldset>
									<legend>图片列表</legend>
									<ul id="photos" class="pic-list unstyled"></ul>
								</fieldset>
								<a href="javascript:;" onclick="javascript:flashupload('albums_images', '图片上传','photos',change_images,'10,gif|jpg|jpeg|png|bmp,0','','','')" class="btn btn-small">选择图片</a>
							</td>
						</tr> -->
					</table>
				</div>
<!-- 				<div class="span3">
					<table class="table table-bordered">
						
						<tr>
							<th><b>发布时间</b></th>
						</tr>
						<tr>
							<td><input type="text" name="post[post_modified]" value="<?php echo date('Y-m-d H:i:s',time());?>" class="js-datetime" style="width: 160px;"></td>
						</tr>
						<tr>
							<th><b>状态</b></th>
						</tr>
						<tr>
							<td>
								<label class="radio"><input type="radio" name="post[post_status]" value="1" checked>审核通过</label>
								<label class="radio"><input type="radio" name="post[post_status]" value="0">待审核</label>
							</td>
						</tr>
						<tr>
							<td>
								<label class="radio"><input type="radio" name="post[istop]" value="1">置顶</label>
								<label class="radio"><input type="radio" name="post[istop]" value="0" checked>未置顶</label>
							</td>
						</tr>
						<tr>
							<td>
								<label class="radio"><input type="radio" name="post[recommended]" value="1">推荐</label>
								<label class="radio"><input type="radio" name="post[recommended]" value="0" checked>未推荐</label>
							</td>
						</tr>
					</table>
				</div> -->
			</div>
			<div class="form-actions">
				<button class="btn btn-primary js-ajax-submit" type="submit">提交</button>
				<a class="btn" href="<?php echo U('AdminPost/index');?>">返回</a>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/socailsys/public/js/common.js"></script>
	<script type="text/javascript" src="/socailsys/public/js/content_addtop.js"></script>
	<script type="text/javascript">
		//编辑器路径定义
		var editorURL = GV.DIMAUB;
	</script>
	<script type="text/javascript" src="/socailsys/public/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/socailsys/public/js/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$(".js-ajax-close-btn").on('click', function(e) {
				e.preventDefault();
				Wind.use("artDialog", function() {
					art.dialog({
						id : "question",
						icon : "question",
						fixed : true,
						lock : true,
						background : "#CCCCCC",
						opacity : 0,
						content : "您确定需要关闭当前页面嘛？",
						ok : function() {
							setCookie("refersh_time", 1);
							window.close();
							return true;
						}
					});
				});
			});
			/////---------------------
			Wind.use('validate', 'ajaxForm', 'artDialog', function() {
				//javascript

				//编辑器
				editorcontent = new baidu.editor.ui.Editor();
				editorcontent.render('content');
				try {
					editorcontent.sync();
				} catch (err) {
				}
				//增加编辑器验证规则
				jQuery.validator.addMethod('editorcontent', function() {
					try {
						editorcontent.sync();
					} catch (err) {
					}
					return editorcontent.hasContents();
				});
				var form = $('form.js-ajax-forms');
				//ie处理placeholder提交问题
				if ($.browser.msie) {
					form.find('[placeholder]').each(function() {
						var input = $(this);
						if (input.val() == input.attr('placeholder')) {
							input.val('');
						}
					});
				}

				var formloading = false;
				//表单验证开始
				form.validate({
					//是否在获取焦点时验证
					onfocusout : false,
					//是否在敲击键盘时验证
					onkeyup : false,
					//当鼠标掉级时验证
					onclick : false,
					//验证错误
					showErrors : function(errorMap, errorArr) {
						//errorMap {'name':'错误信息'}
						//errorArr [{'message':'错误信息',element:({})}]
						try {
							$(errorArr[0].element).focus();
							art.dialog({
								id : 'error',
								icon : 'error',
								lock : true,
								fixed : true,
								background : "#CCCCCC",
								opacity : 0,
								content : errorArr[0].message,
								cancelVal : '确定',
								cancel : function() {
									$(errorArr[0].element).focus();
								}
							});
						} catch (err) {
						}
					},
				});
			});
			////-------------------------
		});
	</script>
</body>
</html>
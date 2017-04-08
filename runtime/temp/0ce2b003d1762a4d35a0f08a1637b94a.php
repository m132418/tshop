<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"./application/admin/view2/article\article.html";i:1490352994;s:44:"./application/admin/view2/public\layout.html";i:1490352994;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__PUBLIC__/static/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/css/page.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="__PUBLIC__/static/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>

<script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<script type="text/javascript" src="__PUBLIC__/static/js/admin.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/flexigrid.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.mousewheel.js"></script>
<script src="__PUBLIC__/js/myFormValidate.js"></script>
<script src="__PUBLIC__/js/myAjax2.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
    <script type="text/javascript">
    function delfunc(obj){
    	layer.confirm('确认删除？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
    		    // 确定
   				$.ajax({
   					type : 'post',
   					url : $(obj).attr('data-url'),
   					data : {act:'del',del_id:$(obj).attr('data-id')},
   					dataType : 'json',
   					success : function(data){
   						if(data==1){
   							layer.msg('操作成功', {icon: 1});
   							$(obj).parent().parent().parent().remove();
   						}else{
   							layer.msg(data, {icon: 2,time: 2000});
   						}
//   						layer.closeAll();
   					}
   				})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }
    
    function selectAll(name,obj){
    	$('input[name*='+name+']').prop('checked', $(obj).checked);
    }   
    
    function get_help(obj){
        layer.open({
            type: 2,
            title: '帮助手册',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: $(obj).attr('data-url'), 
        });
    }
    
    function delAll(obj,name){
    	var a = [];
    	$('input[name*='+name+']').each(function(i,o){
    		if($(o).is(':checked')){
    			a.push($(o).val());
    		}
    	})
    	if(a.length == 0){
    		layer.alert('请选择删除项', {icon: 2});
    		return;
    	}
    	layer.confirm('确认删除？', {btn: ['确定','取消'] }, function(){
    			$.ajax({
    				type : 'get',
    				url : $(obj).attr('data-url'),
    				data : {act:'del',del_id:a},
    				dataType : 'json',
    				success : function(data){
    					if(data == 1){
    						layer.msg('操作成功', {icon: 1});
    						$('input[name*='+name+']').each(function(i,o){
    							if($(o).is(':checked')){
    								$(o).parent().parent().remove();
    							}
    						})
    					}else{
    						layer.msg(data, {icon: 2,time: 2000});
    					}
    					layer.closeAll();
    				}
    			})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);	
    }
</script>  

</head>
<script type="text/javascript">
    window.UEDITOR_Admin_URL = "__ROOT__/public/plugins/Ueditor/";
    var URL_upload = "<?php echo $URL_upload; ?>";
    var URL_fileUp = "<?php echo $URL_fileUp; ?>";
    var URL_scrawlUp = "<?php echo $URL_scrawlUp; ?>";
    var URL_getRemoteImage = "<?php echo $URL_getRemoteImage; ?>";
    var URL_imageManager = "<?php echo $URL_imageManager; ?>";
    var URL_imageUp = "<?php echo $URL_imageUp; ?>";
    var URL_getMovie = "<?php echo $URL_getMovie; ?>";
    var URL_home = "<?php echo $URL_home; ?>";    
</script>

<script type="text/javascript" src="__ROOT__/public/plugins/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="__ROOT__/public/plugins/Ueditor/ueditor.all.js"></script>
<script src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>

<style type="text/css">
html, body {
	overflow: visible;
}
</style>  
<body style="background-color: #FFF; overflow: auto;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>文章管理 - 新增文章</h3>
        <h5>网站系统文章索引与管理</h5>
      </div>
    </div>
  </div>
  <form class="form-horizontal" action="<?php echo U('Article/aticleHandle'); ?>" id="add_post" method="post">    
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label><em>*</em>标题</label>
        </dt>
        <dd class="opt">
          <input type="text" value="<?php echo $info['title']; ?>" name="title" class="input-txt">
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="cate_id"><em>*</em>所属分类</label>
        </dt>
        <dd class="opt">
        <select class="small form-control" name="cat_id" id="cat_id">
            <option value="0">选择分类</option>
            <?php echo $cat_select; ?> 
        </select>        
          <span class="err"></span>
          <p class="notic">当选择发布"商城公告"时，还需要设置下面的"出现位置"项</p>
        </dd>
      </dl>    
	  <dl class="row">
        <dt class="tit">
          <label for="articleForm">seo关键字</label>
        </dt>
        <dd class="opt">
          <input type="text" name="keywords"  value="<?php echo $info['keywords']; ?>" class="input-txt">
          <span class="err"></span>
          <p class="notic">用于seo 搜索引擎友好</p>
        </dd>
      </dl>        
      <dl class="row">
        <dt class="tit">
          <label for="articleForm">链接</label>
        </dt>
        <dd class="opt">
          <input type="text" name="link"  value="<?php echo $info['link']; ?>" class="input-txt">
          <span class="err"></span>
          <p class="notic">当填写"链接"后点击文章标题将直接跳转至链接地址，不显示文章内容。链接格式请以http://开头</p>
        </dd>
      </dl>
	  <dl class="row">
        <dt class="tit">
          <label for="articleForm">发布时间</label>
        </dt>
        <dd class="opt">
            <input type="text" class="input-txt" id="publish_time" name="publish_time"  value="<?php echo date("Y-m-d",$info['publish_time']); ?>">        
            <span class="add-on input-group-addon">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
            </span> 
          <span class="err"></span>
        </dd>
      </dl>       
      <dl class="row">
        <dt class="tit">
          <label>显示</label>
        </dt>
        <dd class="opt">
          <div class="onoff">
            <label for="article_show1" class="cb-enable <?php if($info[is_open] == 1): ?>selected<?php endif; ?>">是</label>
            <label for="article_show0" class="cb-disable <?php if($info[is_open] == 0): ?>selected<?php endif; ?>">否</label>
            <input id="article_show1" name="is_open" value="1" type="radio" <?php if($info[is_open] == 1): ?> checked="checked"<?php endif; ?>>
            <input id="article_show0" name="is_open" value="0" type="radio" <?php if($info[is_open] == 0): ?> checked="checked"<?php endif; ?>>
          </div>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">网页描述</dt>
        <dd class="opt">
	      <textarea class="input-txt" id="post_description" name="description" title=""><?php echo $info['description']; ?></textarea>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label><em>*</em>文章内容</label>
        </dt>
        <dd class="opt">          
            <textarea class="span12 ckeditor" id="post_content" name="content" title="">
                <?php echo $info['content']; ?>
            </textarea>          
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
        <dl class="row">
            <dt class="tit">
                <label>图片上传</label>
            </dt>
            <dd class="opt">
                <div class="input-file-show">
                        <span class="show">
                            <a id="img_a" class="nyroModal" rel="gal" href="<?php echo $info['thumb']; ?>">
                                <i id="img_i" class="fa fa-picture-o" onmouseover="layer.tips('<img src=<?php echo $info['thumb']; ?>>',this,{tips: [1, '#fff']});" onmouseout="layer.closeAll();"></i>
                            </a>
                        </span>
           	            <span class="type-file-box">
                            <input type="text" id="thumb" name="thumb" value="<?php echo $info['thumb']; ?>" class="type-file-text">
                            <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                            <input class="type-file-file" onClick="GetUploadify(1,'','article','img_call_back')" size="30" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                </div>
                <span class="err"></span>
                <p class="notic">请上传图片格式文件</p>
            </dd>
        </dl>
      <div class="bot"><a href="JavaScript:void(0);" onClick="checkForm()" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
        <input type="hidden" name="act" value="<?php echo $act; ?>">
        <input type="hidden" name="article_id" value="<?php echo $info['article_id']; ?>"></label>    
  </form>
</div>
<script type="text/javascript">
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js 中
        var options = {
            zIndex: 999,
            initialFrameWidth: "70%", //初化宽度
            initialFrameHeight: 300, //初化高度            
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true
         /*   autotypeset: {
                mergeEmptyline: true,        //合并空行
                removeClass: true,           //去掉冗余的class
                removeEmptyline: false,      //去掉空行
                textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
                imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
                pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
                clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
                clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
                removeEmptyNode: false,      //去掉空节点
                                             //可以去掉的标签
                removeTagNames: {"font": 1},
                indent: false,               // 行首缩进
                indentValue: '0em'           //行首缩进的大小
            }*/
        };
        editor = new UE.ui.Editor(options);
        editor.render("post_content");
      
        $('#publish_time').layDate(); 
     
    });
	
	function checkForm(){
		if($('input[name="title"]').val() == ''){
			alert("请填写文章标题！");
			return false;
		}
		if($('#cat_id').val() == '' || $('#cat_id').val() == 0){
			alert("请选择文章类别！");
			return false;
		}
		if($('#post_content').val() == ''){
			alert("请填写文章内容！");
			return false;
		}
		$('#add_post').submit();
	}

    <!-- 系统保留分类 start-->
    var article_main_system_id = <?php echo json_encode($article_main_system_id); ?>;
    $("#cat_id").change(function(){
        var v = parseInt($(this).val());
        if(jQuery.inArray(v, article_main_system_id) != -1){
            alert("系统保留分类，不允许在该分类添加文章");
            $(this).val(0);
        }

    });

    $("#cat_id2").change(function(){
        var v = parseInt($(this).val());
        if(jQuery.inArray(v, article_main_system_id) != -1){
            alert("系统保留分类，不允许在该分类添加文章");
            $(this).val(0);
        }

    });
    function img_call_back(fileurl_tmp)
    {
        $("#thumb").val(fileurl_tmp);
        $("#img_a").attr('href', fileurl_tmp);
        $("#img_i").attr('onmouseover', "layer.tips('<img src="+fileurl_tmp+">',this,{tips: [1, '#fff']});");
    }
    
</script>
</body>
</html>
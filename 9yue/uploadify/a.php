
<!DOCTYPE html>
<html>
<head>
	<title>My Uploadify Implementation</title>
	<link rel="stylesheet" type="text/css" href="uploadify.css">
	<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="jquery.uploadify.min.js"></script>
	<script type="text/javascript">
	$(function() {
		$('#file_upload').uploadify({
			'id'       : jQuery(this).attr('file_upload'), // 根据页面上绑定的对象来给uploadify设置id
			'swf'      : 'uploadify.swf', // uploadify的上传功能是通过flash 来实现的，swf 是用来设置这个flash 的位置，这个flash 可以在下载的插件包里找到
			'uploader' : 'uploadify.php', // 这个参数是当文件上传完以后调用的ＰＨＰ代码的地址
			// Your options here
			'method'   : 'post',
    		'formData' : { 'someKey' : 'file_upload' },
			'onSelectError':function(file, errorCode, errorMsg){
		            switch(errorCode) {
		                case -100:
		                    alert("上传的文件数量已经超出系统限制的"+$('#file_upload').uploadify('settings','queueSizeLimit')+"个文件！");
		                    break;
		                case -110:
		                    alert("文件 ["+file.name+"] 大小超出系统限制的"+$('#file_upload').uploadify('settings','fileSizeLimit')+"大小！");
		                    break;
		                case -120:
		                    alert("文件 ["+file.name+"] 大小异常！");
		                    break;
		                case -130:
		                    alert("文件 ["+file.name+"] 类型不正确！");
		                    break;
		            }
		        },
		        'onUploadSuccess':function(file, data, response){
				            console.log(file);
				            alert(data);
				            alert(response);
				        }

		});
	});
	</script>
</head>
<body>
<input type="file" name="file_upload" id="file_upload" />
</body>
</html>
<script>
	 // $("#file_upload").uploadify({
	 //        height        : 30,
	 //        swf           : 'uploadify.swf',
	 //        uploader      : 'uploadify.php',
	 //        width         : 120
	 //    });
// $(function() {
//     $("#file_upload").uploadify({
//         //开启调试
//         // 'debug' : false,
//         //是否自动上传
//         // 'auto':false,
//         // //超时时间
//         // 'successTimeout':99999,
//         // //附带值
//         // // 'formData':{
//         // //     'userid':'用户id',
//         // //     'username':'用户名',
//         // //     'rnd':'加密密文'
//         // // },
//         // //flash
//         'uploader' : 'uploadify.php',
//         'swf': "uploadify.swf",
//         // //不执行默认的onSelect事件
//         // 'overrideEvents' : ['onDialogClose'],
//         // //文件选择后的容器ID
//         // 'queueID':'uploadfileQueue',
//         // //服务器端脚本使用的文件对象的名称 $_FILES个['upload']
//         'fileObjName':'upload',
//         // //上传处理程序
//         // 'uploader':'imageUpload.php',
//         // //浏览按钮的背景图片路径
//         // // 'buttonImage':'upbutton.gif',
//         // //浏览按钮的宽度
//         // 'width':'100',
//         // //浏览按钮的高度
//         // 'height':'32',
//         // //expressInstall.swf文件的路径。
//         // // 'expressInstall':'expressInstall.swf',
//         // //在浏览窗口底部的文件类型下拉菜单中显示的文本
//         // 'fileTypeDesc':'支持的格式：',
//         // //允许上传的文件后缀
//         // 'fileTypeExts':'*.jpg;*.jpge;*.gif;*.png',
//         // //上传文件的大小限制
//         // 'fileSizeLimit':'3MB',
//         // //上传数量
//         // 'queueSizeLimit' : 25,
//         //每次更新上载的文件的进展
//         // 'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
//         //      //有时候上传进度什么想自己个性化控制，可以利用这个方法
//         //      //使用方法见官方说明
//         // },
//         //选择上传文件后调用
//         'onSelect' : function(file) {

//         },
//         //返回一个错误，选择文件的时候触发
//         'onSelectError':function(file, errorCode, errorMsg){
//             switch(errorCode) {
//                 case -100:
//                     alert("上传的文件数量已经超出系统限制的"+$('#file_upload').uploadify('settings','queueSizeLimit')+"个文件！");
//                     break;
//                 case -110:
//                     alert("文件 ["+file.name+"] 大小超出系统限制的"+$('#file_upload').uploadify('settings','fileSizeLimit')+"大小！");
//                     break;
//                 case -120:
//                     alert("文件 ["+file.name+"] 大小异常！");
//                     break;
//                 case -130:
//                     alert("文件 ["+file.name+"] 类型不正确！");
//                     break;
//             }
//         },
//         //检测FLASH失败调用
//         'onFallback':function(){
//             alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
//         },
//         //上传到服务器，服务器返回相应信息到data里
//         'onUploadSuccess':function(file, data, response){
//             alert(data);
//         }
//     });
// });
</script>
<!DOCTYPE html>
<html>
<head>
	<title>My Uploadify Implementation</title>
	<link rel="stylesheet" type="text/css" href="uploadify.css">
</head>
<body>
<input type="file" name="file_upload" id="file_upload" />
</body>
</html>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery.uploadify.min.js"></script>
<script type="text/javascript">
$(function() {
	$('#file_upload').uploadify({
		'swf'      : 'uploadify.swf',
		'uploader' : 'uploadify.php'
		// Your options here
	});
});
</script>
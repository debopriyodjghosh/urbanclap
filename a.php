
<html>
<head>
	<title></title>
</head>
<body>
	<input type="hidden" name="s_name" value="<?php echo $_post['s_name']?>">
</body>
</html>
<?php 
echo $_post['s_name'];
header('Location: urbancart.php')?>
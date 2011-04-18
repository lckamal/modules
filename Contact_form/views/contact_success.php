<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="REFRESH" content="5; URL=<?= $_SERVER['HTTP_REFERER'] ?>">
<title><?= lang('module_contact_form_redirecting') ?></title>
<style>
	#redirecting
	{
		height: 100px;
		width: 650px;
		border: 5px solid #ccc;
		margin-top: 30px;
		margin-right: auto;
		margin-bottom: 0px;
		margin-left: auto;
		text-align:right;
		padding:20px;
	}
</style>
<script type="text/javascript"> 
var newCount;
	function timer(position,count)
	{
		if (position == 'start') {
			document.getElementById("timer").innerHTML=count
			newCount = count - 1
			setTimeout("timer('go',newCount)",1000)
		}
		
		if (position == 'go') {
			document.getElementById("timer").innerHTML=count
			newCount--;
			setTimeout("timer('go',newCount)",1000)
		}
	}
</script>
</head>
<body onload="timer('start',5);">
	<div id="redirecting">
		<span style="font-size:30px; color:green;"><?= lang('module_contact_form_send_success') ?></span><br /><br />
		<span id="timer"></span><span style="font-size:16px; color:black;"><?= lang('module_contact_form_redirecting_info') ?>, <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><?= lang('module_contact_form_do_not_wait') ?></a></span>
	</div>
</body>
</body>
</html>
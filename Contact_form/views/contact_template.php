<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title><?= lang('module_contact_form_site_name') ?></title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<p><h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;"><?= lang('module_contact_form_have_message') ?>!</h2></p>
	<b><?= lang('module_contact_form_sender') ?> : </b> <?= $first_name ?> <?= $last_name ?><br />
	<b><?= lang('module_contact_form_email') ?> : </b> <?= $email ?><br />
	<b><?= lang('module_contact_form_date_time') ?> : </b> <?= $date_time ?><br />
	<b><?= lang('module_contact_form_sender') ?> : </b> <?= $subject ?><br />
	<b><?= lang('module_contact_form_message') ?> : </b> <?= $message ?><br />
	<p></p>
</td>
</tr>
</table>
</div>
</body>
</html>
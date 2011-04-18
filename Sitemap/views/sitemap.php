<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= lang('module_sitemap_title') ?></title>

<link href="<?= base_url() ?>/modules/Sitemap/lib/styles/main.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?= base_url() ?>/modules/Sitemap/lib/styles/style-1.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="<?= base_url() ?>modules/Sitemap/lib/javascripts/sitemap.js"></script>

</head>

<body>
<div id="container">
    <div id="content">
        <noscript><p><strong><?= lang('module_sitemap_javaerror') ?></strong></p></noscript>
        <label><?php foreach(Settings::get_languages() as $l): ?> <a href="<?= base_url().$l['lang'] ?>/sitemap"><img src="<?= base_url() ?>modules/Sitemap/lib/images/world_flags/flag_<?= $l['lang'] ?>.gif" />&nbsp;<?= $l['name'] ?></a>&nbsp;&nbsp;<?php endforeach; ?></label>
        <label><h2><?= lang('module_sitemap_title') ?></h2></label>
        <ul id="sitemap">
            <?= $sitemap ?>
        </ul>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?= lang('module_sitemap_welcome') ?></title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<h1><?= lang('module_sitemap_welcome') ?></h1>
<p>
    @author&nbsp;&nbsp;UKYO - İskender TOTOĞLU<br />
    @website <a href="http://www.6ve1.com" target="_blank" title="ALTI VE BIR BILISIM TEKNOLOJILERI">http://www.6ve1.com</a><br />
    @ionize_community <a href="http://www.ionizecms.com" target="_blank" title="Ionize CMS">Ionize CMS</a>
</p>

<p><?= lang('module_sitemap_usage') ?> <strong><?= lang('module_sitemap_remove_slash') ?></strong></p>
<p><?= lang('module_sitemap_css_style') ?><strong>"modules/Sitemap/lib/styles/"</strong> <?= lang('module_sitemap_folder') ?></p>
<p><?= lang('module_sitemap_images') ?><strong>"modules/Sitemap/lib/images/"</strong> <?= lang('module_sitemap_folder') ?></p>
<p><?= lang('module_sitemap_javascripts') ?> <strong>"modules/Sitemap/lib/javascripts/"</strong> <?= lang('module_sitemap_folder') ?></p>
<code>
	<\ion:sitemap><br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\ion:tree /><br />
	<\/ion:sitemap><br />
</code>
<p><?= lang('module_sitemap_structure') ?> </p>
<code>
<ul id="sitemap">
    <li><a href="#">First link</a>
        <ul>
            <li><a href="#">First link</a>
                <ul>
                    <li><a href="#">First link</a></li>
                    <li><a href="#">Second link</a></li>
                    <li><a href="#">Third link</a></li>
                    <li><a href="#">Fourth link</a></li>
                    <li><a href="#">Fifth link</a></li>
                </ul>
            </li>
            <li><a href="#">Second link</a></li>
            <li><a href="#">Third link</a>
                <ul>
                    <li><a href="#">First link</a></li>
                    <li><a href="#">Second link</a></li>
                    <li><a href="#">Third link</a></li>
                    <li><a href="#">Fourth link</a></li>
                    <li><a href="#">Fifth link</a></li>
                </ul>
            </li>
            <li><a href="#">Fourth link</a>
                <ul>
                    <li><a href="#">First link</a></li>
                    <li><a href="#">Second link</a></li>
                    <li><a href="#">Third link</a></li>
                    <li><a href="#">Fourth link</a></li>
                    <li><a href="#">Fifth link</a></li>
                </ul>
            </li>
            <li><a href="#">Fifth link</a></li>
        </ul>
    </li>
</ul>
</code>
<p><?= lang('module_sitemap_note') ?></p>
<h1></h1>
<?= lang('module_sitemap_elapsed_time') ?> {elapsed_time} <?= lang('module_sitemap_seconds') ?>

</body>
</html>
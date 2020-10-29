<?php
/**
 * Open Source Social Network
 *
 * @package   (softlab24.com).ossn
 * @author    OSSN Core Team <info@softlab24.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
$sitename = ossn_site_settings('site_name');
$sitelanguage = ossn_site_settings('language');
if (isset($params['title'])) {
    $title = $params['title'] . ' : ' . $sitename;
} else {
    $title = $sitename;
}
if (isset($params['contents'])) {
    $contents = $params['contents'];
} else {
    $contents = '';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $sitelanguage; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo ossn_add_cache_to_url(ossn_theme_url().'images/favicon.ico');?>" type="image/x-icon" />
</head>

<body>
 <?php echo $contents; ?>
</body>
</html>

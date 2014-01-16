<?php
//注意，请不要在这里配置SAE的数据库，配置你本地的数据库就可以了。
return array(
    //'配置项'=>'配置值'
    '__PUBLIC__'=>'__APP__/../Public/',
    'URL_HTML_SUFFIX'=>'.html',
    'SHOW_PAGE_TRACE' =>true,
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_NAME'=>'ulttor',
	'DB_USER'=>'root',
	'DB_PWD'=>'root',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'ul_',
	'DB_FIELDTYPE_CHECK'=>true,
	'DEFALUT_FILTERS'=>'htmlspecialchars,strip_tags',
);
?>
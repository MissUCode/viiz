<?php
return array(
//'配置项'=>'配置值'
	'APP_GROUP_LIST' => 'Home,Zoneadmin,Members',
	'DEFAULT_GROUP' => 'Home',
	// 'APP_GROUP_MODE' => 1,
	// 'APP_GROUP_PATH' => 'Modules',
	'SESSION_AUTO_START' => true,
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'vii_zone',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => 'vii_',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        => false,
    'URL_MODEL'   => 2,
    'DB_MASTER_NUM'         => 1, // 读写分离后 主服务器数量
    'DB_SQL_BUILD_CACHE'    => true, // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_LENGTH'   => 20, // SQL缓存的队列长度
    'TMPL_TEMPLATE_SUFFIX'  => '.html',
    'URL_HTML_SUFFIX'=>'html',
    'IMG_PATH'=>'index.php/Public/',
    'LOG_RECORD'=>false, 
);
?>
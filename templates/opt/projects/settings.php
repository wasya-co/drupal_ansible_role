<?php

$databases = [];

$settings['hash_salt'] = '9YwvU9AEWMn906IkwgRJthuElKP7eqSXffqGb4bM4Sfoh1o8vybX9fYmgyLIePUR_9-iekSZVg';

$settings['update_free_access'] = FALSE;

$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

$settings['entity_update_batch_size'] = 50;

$settings['entity_update_backup'] = TRUE;

$settings['migrate_node_migrate_type_classic'] = FALSE;

if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}
$databases['default']['default'] = array (
  'host'      => '{{ site.mysql.hostname }}',
  'database'  => '{{ site.mysql.db_name }}',
  'password'  => '{{ site.mysql.password }}',

  'username'  => '{{ site.mysql.username }}',
  'prefix'    => '',
  'port'      => '3306',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'driver'    => 'mysql',
  'autoload'  => 'core/modules/mysql/src/Driver/Database/mysql/',
);
$settings['config_sync_directory'] = 'sites/default/files/config_qsqM4eTPO701kTqgwX_SrZLyMsgCrIWSEyUA6KmOYI_F26WmkVAO5adSJe8p-R_bEwucDagH8w/sync';

$settings['s3fs.use_s3_for_public']  = TRUE;
$settings['s3fs.use_s3_for_private'] = TRUE;
$settings['file_private_path']       = '/var/www/html/private';
$settings['s3fs.access_key']         = '{{ site.s3.key }}';
$settings['s3fs.secret_key']         = '{{ site.s3.secret }}';
$config['s3fs.settings']['bucket']   = '{{ site.s3.bucket }}';



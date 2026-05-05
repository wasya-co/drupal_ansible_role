<?php

$base_url = 'https://{{ origin }}';  // NO trailing slash!

$databases = [];
$settings['hash_salt'] = 'pi_9YwvU9AEWMn906IkwgRJthuElKP7SXffqGb4bM4Sfoh1o8vybX9fYmgyLIePUR_9-iekSZVg';
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
  'database'  => '{{ mysql_db }}',
  'username'  => '{{ mysql_user }}',
  'password'  => '{{ mysql_password }}',
  'prefix'    => '',
  'host'      => '{{ mysql_host }}',
  'port'      => '3306',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'driver'    => 'mysql',
  'autoload'  => 'core/modules/mysql/src/Driver/Database/mysql/',
);

$settings['s3fs.use_s3_for_public']  = TRUE;
$settings['s3fs.use_s3_for_private'] = TRUE;
$settings['file_private_path']       = '/var/www/html/private';
$config['s3fs.settings']['bucket']   = '{{ s3_bucket }}';
$settings['s3fs.access_key']         = '{{ s3_key }}';
$settings['s3fs.secret_key']         = '{{ s3_secret }}';

$settings['reverse_proxy'] = TRUE;
$settings['reverse_proxy_addresses'] = array($_SERVER['REMOTE_ADDR']);
$settings['reverse_proxy_trusted_headers'] = \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_FOR | \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PROTO | \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PORT;

<?php
/*
Plugin Name: toracommu admin
Plugin URI: http://www.uribozu.net/plugin
Description: 日本ブログ村 トラコミュ簡単入力
Version: 0.1
Author: uribozu
Author URI: http://www.uribozu.net/
*/

$wp_root = dirname(dirname(dirname(dirname(__FILE__)))) . '/';
$plugin_root_tora= $wp_root."wp-content/plugins/toracommu-admin/";
$toracommu_path=$plugin_root_tora."lib/toracommu_list.txt";

require_once($plugin_root_tora."lib/co.php");
require_once($plugin_root_tora."lib/toracommu_calss.php");
$toracommu_calssObj=new toracommu_calss();
$formDataTora=$toracommu_calssObj->makeForm($toracommu_path);

add_action('admin_menu', 'blog_mura_toracommu');
add_action('admin_menu', 'toracommu_add_custom_box');
//add_action('save_post', 'myplugin_save_postdata');
function toracommu_add_custom_box() {
  if( function_exists( 'add_meta_box' )) {
    add_meta_box( 'toracommu_sectionid', __( 'トラコミュ選択', 'toracommu_textdomain' ), 
                'toracommu_inner_custom_box', 'post', 'advanced' );
   }
}
function toracommu_inner_custom_box() {
  echo '<input type="hidden" name="blog_mura_toracommu" id="blog_mura_toracommu" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  echo 'トラコミュを選択してください';
  echo $GLOBALS['formDataTora'];
}

function blog_mura_toracommu() {
	add_options_page('日本ブログ村 トラコミュ簡単入力', 'トラコミュ簡単入力', 8, 'blog_mura_toracommu', 'toracommu_start');
}
?>

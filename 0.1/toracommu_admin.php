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
$plugin_root= $wp_root."wp-content/plugins/toracommu-admin/";
$torracommu_path=$plugin_root."lib/toracommu_list.txt";

require_once($plugin_root."lib/co.php");
require_once($plugin_root."lib/toracommu_calss.php");
$toracommu_calssObj=new toracommu_calss();
$formData=$toracommu_calssObj->makeForm($torracommu_path);

add_action('admin_menu', 'blog_mura_toracommu');
add_action('admin_menu', 'toracommu_add_custom_box');
//add_action('save_post', 'myplugin_save_postdata');
function toracommu_add_custom_box() {
  if( function_exists( 'add_meta_box' )) {
    add_meta_box( 'myplugin_sectionid', __( 'トラコミュ選択', 'toracommu_textdomain' ), 
                'toracommu_inner_custom_box', 'post', 'advanced' );
   }
}
function toracommu_inner_custom_box() {
  echo '<input type="hidden" name="blog_mura_toracommu" id="blog_mura_toracommu" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  echo 'トラコミュを選択してください';
  echo $GLOBALS['formData'];
}
function blog_mura_toracommu() {
	add_options_page('日本ブログ村 トラコミュ簡単入力', 'トラコミュ簡単入力', 8, 'blog_mura_toracommu', 'toracommu_start');
}
?>

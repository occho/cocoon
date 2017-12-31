<?php //関係の関数

//テーブルのバージョン
define('AFFILIATE_TAGS_TABLE_VERSION', DEBUG_MODE ? rand(0, 99) : '0.0');
define('AFFILIATE_TAGS_TABLE_NAME',  $wpdb->prefix . THEME_NAME . '_affiliate_tags');

//移動用URL
define('AT_LIST_URL',   add_query_arg(array('action' => false,   'id' => false)));
define('AT_NEW_URL',    add_query_arg(array('action' => 'new',   'id' => false)));


//テーブルのバージョン取得
define('OP_AFFILIATE_TAGS_TABLE_VERSION', 'affiliate_tags_table_version');
if ( !function_exists( 'get_affiliate_tags_table_version' ) ):
function get_affiliate_tags_table_version(){
  return get_theme_option(OP_AFFILIATE_TAGS_TABLE_VERSION);
}
endif;

//テーブルが存在するか
if ( !function_exists( 'is_affiliate_tags_table_exist' ) ):
function is_affiliate_tags_table_exist(){
  return is_db_table_exist(AFFILIATE_TAGS_TABLE_NAME);
}
endif;

//初期データの入力
if ( !function_exists( 'add_default_affiliate_tag_records' ) ):
function add_default_affiliate_tag_records(){
  $posts = array();
  $posts['title'] = __( 'アフィリエイトタグサンプル', THEME_NAME );
  $posts['text'] = '<a href="https://wp-simplicity.com/">Simplicity | 内部SEO施策済みのシンプルな無料Wordpressテーマ</a>';
  $posts['visible'] = 1;
  insert_affiliate_tag_record($posts);
}
endif;

//テーブルの作成
if ( !function_exists( 'create_affiliate_tags_table' ) ):
function create_affiliate_tags_table() {
  $add_default_records = false;
  //テーブルが存在しない場合初期データを挿入（テーブル作成時のみ挿入）
  if (!is_affiliate_tags_table_exist()) {
    $add_default_records = true;
  }
  // SQL文でテーブルを作る
  $sql = "CREATE TABLE ".AFFILIATE_TAGS_TABLE_NAME." (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    modified datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    title varchar(126) NOT NULL,
    text text NOT NULL,
    visible bit(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (id),
    INDEX (title)
    )";
  $res = create_db_table($sql);

  //初期データの挿入
  if ($res && $add_default_records) {
    //データ挿入処理
    add_default_affiliate_tag_records();
  }

  set_theme_mod( OP_AFFILIATE_TAGS_TABLE_VERSION, AFFILIATE_TAGS_TABLE_VERSION );
  return $res;
}
endif;

//テーブルのアップデート
if ( !function_exists( 'update_affiliate_tags_table' ) ):
function update_affiliate_tags_table() {

  // オプションに登録されたデータベースのバージョンを取得
  $installed_ver = get_affiliate_tags_table_version();
  $now_ver = AFFILIATE_TAGS_TABLE_VERSION;
  if (is_update_db_table($installed_ver, $now_ver)) {
    create_affiliate_tags_table();
  }

}
endif;

//テーブルのアンインストール
if ( !function_exists( 'uninstall_affiliate_tags_table' ) ):
function uninstall_affiliate_tags_table() {
  uninstall_db_table(AFFILIATE_TAGS_TABLE_NAME);
  remove_theme_mod(OP_AFFILIATE_TAGS_TABLE_VERSION);
}
endif;

//レコードの取得
if ( !function_exists( 'get_affiliate_tags' ) ):
function get_affiliate_tags( $keyword = null, $order_by = null ) {
  update_affiliate_tags_table();
  $table_name = AFFILIATE_TAGS_TABLE_NAME;
  return get_db_table_records($table_name, 'title', $keyword, $order_by);
}
endif;

//レコードの取得
if ( !function_exists( 'get_affiliate_tag' ) ):
function get_affiliate_tag( $id ) {
  $table_name = AFFILIATE_TAGS_TABLE_NAME;
  $record = get_db_table_record( $table_name, $id );
  if (!empty($record->title))
    $record->title = esc_attr(stripslashes_deep($record->title));

  if (!empty($record->text))
    $record->text = wpautop(stripslashes_deep($record->text));

  return $record;
}
endif;

//レコードの削除
if ( !function_exists( 'delete_affiliate_tag' ) ):
function delete_affiliate_tag( $id ) {
  $table_name = AFFILIATE_TAGS_TABLE_NAME;
  return delete_db_table_record( $table_name, $id );
}
endif;

//レコードを追加
if ( !function_exists( 'insert_affiliate_tag_record' ) ):
function insert_affiliate_tag_record($posts){
  $table = AFFILIATE_TAGS_TABLE_NAME;
  $now = current_time('mysql');
  $data = array(
    'date' => $now,
    'modified' => $now,
    'title' => $posts['title'],
    'text' => $posts['text'],
    'visible' => isset($posts['visible']) ? $posts['visible'] : 1,
  );
  $format = array(
    '%s',
    '%s',
    '%s',
    '%s',
    '%d',
  );
  return insert_db_table_record($table, $data, $format);
}
endif;

//レコードの編集
if ( !function_exists( 'update_affiliate_tag_record' ) ):
function update_affiliate_tag_record($id, $posts){
  $table = AFFILIATE_TAGS_TABLE_NAME;
  $now = current_time('mysql');
  $data = array(
    'modified' => $now,
    'title' => $posts['title'],
    'text' => $posts['text'],
    'visible' => isset($posts['visible']) ? $posts['visible'] : 1,
  );
  $where = array('id' => $id);
  $format = array(
    '%s',
    '%s',
    '%s',
    '%d',
  );
  $where_format = array('%d');
  return update_db_table_record($table, $data, $where, $format, $where_format);
}
endif;

//ショートコード関数
add_shortcode('atag', 'affiliate_tag_shortcode');
if ( !function_exists( 'affiliate_tag_shortcode' ) ):
function affiliate_tag_shortcode($atts) {
  extract(shortcode_atts(array(
    'id' => 0,
  ), $atts));
  if ($id) {
    if ($recode = get_affiliate_tag($id)) {
      global $post;
      $atag = $recode->text;
      $post_id = null;
      if (isset($post->ID)) {
        $post_id = 'data-post-id="'.$post->ID.'" ';
      }
      //計測用の属性付与
      $atag = str_replace('<a ', '<a data-atag-id="'.$id.'" '.$post_id, $atag);
      return $atag;
    }
  }

}
endif;

if ( !function_exists( 'get_affiliate_tag_shortcode' ) ):
function get_affiliate_tag_shortcode($id) {
  return "[atag id={$id}]";
}
endif;
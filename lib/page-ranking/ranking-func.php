<?php //ランキング関係の関数

//関数テキストテーブルのバージョン
define('SPEECH_BALLOONS_TABLE_VERSION', DEBUG_MODE ? rand(0, 99) : '0.0');
define('SPEECH_BALLOONS_TABLE_NAME',  $wpdb->prefix . THEME_NAME . '_speech_balloons');

//関数テキスト移動用URL
define('SB_LIST_URL',   add_query_arg(array('action' => false,   'id' => false)));
define('SB_NEW_URL',    add_query_arg(array('action' => 'new',   'id' => false)));

//吹き出しテーブルのバージョン取得
define('OP_SPEECH_BALLOONS_TABLE_VERSION', 'speech_balloons_table_version');
if ( !function_exists( 'get_speech_balloons_table_version' ) ):
function get_speech_balloons_table_version(){
  return get_theme_option(OP_SPEECH_BALLOONS_TABLE_VERSION);
}
endif;

//吹き出しテーブルが存在するか
if ( !function_exists( 'is_speech_balloons_table_exist' ) ):
function is_speech_balloons_table_exist(){
  return is_db_table_exist(SPEECH_BALLOONS_TABLE_NAME);
}
endif;

//レコードを追加
if ( !function_exists( 'insert_speech_balloon_record' ) ):
function insert_speech_balloon_record($posts){
  $table = SPEECH_BALLOONS_TABLE_NAME;
  $now = current_time('mysql');
  //_v($posts);
  $data = array(
    'date' => $now,
    'modified' => $now,
    'title' => $posts['title'],
    'name' => $posts['name'],
    'icon' => $posts['icon'],
    'style' => $posts['style'],
    'position' => $posts['position'],
    'iconstyle' => $posts['iconstyle'],
    'visible' => isset($posts['visible']) ? $posts['visible'] : 1,
  );
  $format = array(
    '%s',
    '%s',
    '%s',
    '%s',
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
if ( !function_exists( 'update_speech_balloon_record' ) ):
function update_speech_balloon_record($id, $posts){
  $table = SPEECH_BALLOONS_TABLE_NAME;
  $now = current_time('mysql');
  $visible = $posts['visible'] ? 1 : 0;
  $data = array(
    'modified' => $now,
    'title' => $posts['title'],
    'name' => $posts['name'],
    'icon' => $posts['icon'],
    'style' => $posts['style'],
    'position' => $posts['position'],
    'iconstyle' => $posts['iconstyle'],
    'visible' => isset($posts['visible']) ? $posts['visible'] : 1,
  );
  $where = array('id' => $id);
  $format = array(
    '%s',
    '%s',
    '%s',
    '%s',
    '%s',
    '%s',
    '%s',
    '%d',
  );
  $where_format = array('%d');
  return update_db_table_record($table, $data, $where, $format, $where_format);
}
endif;

//初期データの入力
if ( !function_exists( 'add_default_speech_balloon_records' ) ):
function add_default_speech_balloon_records(){
  $posts = array();
  $posts['title'] = __( '[SAMPLE 01] 男性（左）', THEME_NAME );
  $posts['name']  = __( '太郎', THEME_NAME );
  $posts['icon']  = SB_DEFAULT_MAN_ICON;
  $posts['style'] = SBS_STANDARD;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 02] 女性（右）', THEME_NAME );
  $posts['name']  = __( '花子', THEME_NAME );
  $posts['icon']  = SB_DEFAULT_WOMAN_ICON;
  $posts['style'] = SBS_STANDARD;
  $posts['position'] = SBP_RIGHT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 03] 少年（左）', THEME_NAME );
  $posts['name']  = __( 'たけし', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/boy.png';
  $posts['style'] = SBS_LINE;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 04] 少女（右）', THEME_NAME );
  $posts['name']  = __( 'えり', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/girl.png';
  $posts['style'] = SBS_LINE;
  $posts['position'] = SBP_RIGHT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 05] おじさん（左）', THEME_NAME );
  $posts['name']  = __( '一郎', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/ojisan.png';
  $posts['style'] = SBS_FLAT;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 06] おばさん（左）', THEME_NAME );
  $posts['name']  = __( 'よし江', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/obasan.png';
  $posts['style'] = SBS_FLAT;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 07] 男性医師（左）', THEME_NAME );
  $posts['name']  = __( '主治医', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/doctor-man.png';
  $posts['style'] = SBS_LINE;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_SQUARE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 08] 女性医師（右）', THEME_NAME );
  $posts['name']  = __( '主治医', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/doctor-woman.png';
  $posts['style'] = SBS_LINE;
  $posts['position'] = SBP_RIGHT;
  $posts['iconstyle'] = SBIS_SQUARE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 09] どや顔男性（左）', THEME_NAME );
  $posts['name']  = __( 'どや男', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/doya.png';
  $posts['style'] = SBS_STANDARD;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 10] 熊（左）', THEME_NAME );
  $posts['name']  = __( 'くま', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/bear.png';
  $posts['style'] = SBS_STANDARD;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 11] 猫（右）', THEME_NAME );
  $posts['name']  = __( 'ねこ', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/cat.png';
  $posts['style'] = SBS_STANDARD;
  $posts['position'] = SBP_RIGHT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 12] 犬（左）', THEME_NAME );
  $posts['name']  = __( 'いぬ', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/dog.png';
  $posts['style'] = SBS_FLAT;
  $posts['position'] = SBP_LEFT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);

  $posts['title'] = __( '[SAMPLE 13] ウサギ（右）', THEME_NAME );
  $posts['name']  = __( 'うさぎ', THEME_NAME );
  $posts['icon']  = get_template_directory_uri().'/images/rabbit.png';
  $posts['style'] = SBS_FLAT;
  $posts['position'] = SBP_RIGHT;
  $posts['iconstyle'] = SBIS_CIRCLE_BORDER;
  $posts['visible'] = 1;
  insert_speech_balloon_record($posts);
}
endif;

//吹き出しテーブルの作成
if ( !function_exists( 'create_speech_balloons_table' ) ):
function create_speech_balloons_table() {
  $add_default_records = false;
  //テーブルが存在しない場合初期データを挿入（テーブル作成時のみ挿入）
  if (!is_speech_balloons_table_exist()) {
    $add_default_records = true;
  }
  // SQL文でテーブルを作る
  $sql = "CREATE TABLE ".SPEECH_BALLOONS_TABLE_NAME." (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    modified datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    title varchar(126),
    name varchar(36) DEFAULT '".SB_DEFAULT_NAME."' NOT NULL,
    icon varchar(256) DEFAULT '".SB_DEFAULT_MAN_ICON."' NOT NULL,
    style varchar(20) DEFAULT '".SBS_STANDARD."' NOT NULL,
    position varchar(20) DEFAULT '".SBP_LEFT."' NOT NULL,
    iconstyle varchar(20) DEFAULT '".SBIS_CIRCLE_BORDER."' NOT NULL,
    visible bit(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (id)
  )";
  $res = create_db_table($sql);

  //初期データの挿入
  if ($res && $add_default_records) {
    //データ挿入処理
    add_default_speech_balloon_records();
  }

  set_theme_mod( OP_SPEECH_BALLOONS_TABLE_VERSION, SPEECH_BALLOONS_TABLE_VERSION );
  return $res;
}
endif;
create_speech_balloons_table();


//吹き出しテーブルのアップデート
if ( !function_exists( 'update_speech_balloons_table' ) ):
function update_speech_balloons_table() {
  // オプションに登録されたデータベースのバージョンを取得
  $installed_ver = get_speech_balloons_table_version();
  $now_ver = SPEECH_BALLOONS_TABLE_VERSION;
  if ( is_update_db_table($installed_ver, $now_ver) ) {
    create_speech_balloons_table();
  }
}
endif;
//update_speech_balloons_table();


//吹き出しテーブルのアンインストール
if ( !function_exists( 'uninstall_speech_balloons_table' ) ):
function uninstall_speech_balloons_table() {
  uninstall_db_table(SPEECH_BALLOONS_TABLE_NAME);
  remove_theme_mod(OP_SPEECH_BALLOONS_TABLE_VERSION);
}
endif;


//吹き出しテーブルレコードの取得
if ( !function_exists( 'get_speech_balloons' ) ):
function get_speech_balloons( $keyword = null, $order_by = null ) {

  $table_name = SPEECH_BALLOONS_TABLE_NAME;
  return get_db_table_records($table_name, 'title', $keyword, $order_by);

  // update_speech_balloons_table();
  // global $wpdb;
  // $table_name = SPEECH_BALLOONS_TABLE_NAME;
  // $where = null;
  // if ($keyword) {
  //   $where = $wpdb->prepare(" WHERE title LIKE %s", '%'.$keyword.'%');
  //   //$where = (" WHERE title LIKE %%$keyword%%");
  // }
  // if ($order_by) {
  //   $order_by = esc_sql(" ORDER BY $order_by");
  // }
  // $query = "SELECT * FROM {$table_name}".
  //             $where.
  //             $order_by;

  // $records = $wpdb->get_results( $query );

  // return $records;
}
endif;


//吹き出しテーブルレコードの取得
if ( !function_exists( 'get_speech_balloon' ) ):
function get_speech_balloon( $id ) {
  $table_name = SPEECH_BALLOONS_TABLE_NAME;
  $record = get_db_table_record( $table_name, $id );
  $record->title = !empty($record->title) ? $record->title : '';
  $record->name = !empty($record->name) ? $record->name : SB_DEFAULT_NAME;
  $record->icon = !empty($record->icon) ? $record->icon : SB_DEFAULT_MAN_ICON;
  $record->style = !empty($record->style) ? $record->style : SBS_FLAT;
  $record->position = !empty($record->position) ? $record->position : SBP_LEFT;
  $record->iconstyle = !empty($record->iconstyle) ? $record->iconstyle : SBIS_CIRCLE_BORDER;
  $record->visible = !empty($record->visible) ? 1 : 0;

  return $record;
}
endif;

//関数テキストレコードの削除
if ( !function_exists( 'delete_peech_balloon' ) ):
function delete_peech_balloon( $id ) {
  $table_name = SPEECH_BALLOONS_TABLE_NAME;
  return delete_db_table_record( $table_name, $id );
}
endif;

//吹き出しHTMLを生成
if ( !function_exists( 'generate_speech_balloon_tag' ) ):
function generate_speech_balloon_tag($record, $voice){?>
<div class="speech-wrap sb-id-<?php echo esc_html($record->id); ?> sbs-<?php echo esc_html($record->style); ?> sbp-<?php echo esc_html($record->position); ?> sbis-<?php echo esc_html($record->iconstyle); ?> cf">
  <div class="speech-person">
    <figure class="speech-icon"><img src="<?php echo esc_html($record->icon); ?>" alt="<?php echo esc_html($record->name); ?>" class="speech-icon-image"></figure>
    <div class="speech-name"><?php echo esc_html($record->name); ?></div>
  </div>
  <div class="speech-balloon"><?php echo esc_html($voice); ?></div>
</div>
<?php
}
endif;
<?php //カテゴリ関係

///////////////////////////////////////
// 拡張カテゴリ設定
///////////////////////////////////////

//define('CATEGORY_META_PREFIX', 'category_meta_');

if ( !function_exists( 'get_category_meta_key' ) ):
function get_category_meta_key($cat_id){
  return 'category_meta_'.$cat_id;
}
endif;

//カテゴリメタ情報の取得
if ( !function_exists( 'get_category_meta' ) ):
function get_category_meta($cat_id = null){
  if (empty($cat_id) && is_category()) {
    //カテゴリがないときはカテゴリIDを取得
    $cat_id = get_query_var('cat');
  }
  //カテゴリIDが正常な場合
  if ($cat_id) {
    $res = get_term_meta( $cat_id, get_category_meta_key($cat_id), true );
    //_v($res);
    if (is_array($res)) {
      return $res;
    } else {
      return array();
    }


  }
}
endif;

//カテゴリ色の取得
if ( !function_exists( 'get_category_color' ) ):
function get_category_color($cat_id = null){
  $meta = get_category_meta($cat_id);
  if (!empty($meta['color']))
    return $meta['color'];
}
endif;

//カテゴリタイトルの取得
if ( !function_exists( 'get_category_title' ) ):
function get_category_title($cat_id = null){
  $meta = get_category_meta($cat_id);
  if (!empty($meta['title']))
    return $meta['title'];
}
endif;

//カテゴリ本文の取得
if ( !function_exists( 'get_category_content' ) ):
function get_category_content($cat_id = null){
  if (!$cat_id) {
    $cat_id = get_query_var('cat');
  }
  $meta = get_category_meta($cat_id);
  if (!empty($meta['content']))
    $content = $meta['content'];
  else
    $content = category_description();

  $content = wpautop($content);
  $content = apply_filters( 'the_category_content', $content );
  return $content;
}
endif;

//カテゴリ色の取得
if ( !function_exists( 'get_category_eye_catch' ) ):
function get_category_eye_catch($cat_id = null){
  $meta = get_category_meta($cat_id);
  if (!empty($meta['eye_catch']))
    return $meta['eye_catch'];
}
endif;

//カテゴリ色の取得
if ( !function_exists( 'get_category_description' ) ):
function get_category_description($cat_id = null){
  $meta = get_category_meta($cat_id);
  if (!empty($meta['description']))
    return $meta['description'];
}
endif;

//カテゴリ色の取得
if ( !function_exists( 'get_category_keywords' ) ):
function get_category_keywords($cat_id = null){
  $meta = get_category_meta($cat_id);
  if (!empty($meta['keywords']))
    return $meta['keywords'];
}
endif;

//拡張カテゴリ編集フォーム
add_action ( 'edit_category_form_fields', 'extra_category_fields');
if ( !function_exists( 'extra_category_fields' ) ):
function extra_category_fields( $tag ) {
    $cat_id = $tag->term_id;
    $cat_meta = get_category_meta($cat_id);
    //_v($cat_meta);
?>
<tr class="form-field">
  <th><label for="color"><?php _e( 'カテゴリ色', THEME_NAME ) ?></label></th>
  <td><?php
    $color = !empty($cat_meta['color']) ? $cat_meta['color'] : '';
    generate_color_picker_tag('cat_meta[color]',  $color, '');
  ?>
    <p class="description"><?php _e( 'カテゴリの色を指定します。', THEME_NAME ) ?></p>
  </td>
</tr>
<tr class="form-field">
  <th><label for="title"><?php _e( 'カテゴリタイトル', THEME_NAME ) ?></label></th>
  <td>
    <input type="text" name="cat_meta[title]" id="title" size="25" value="<?php if(isset ( $cat_meta['title'])) echo esc_html($cat_meta['title']) ?>" placeholder="<?php _e( 'カテゴリページのタイトル', THEME_NAME ) ?>" />
    <p class="description"><?php _e( 'カテゴリページのタイトルを指定します。カテゴリページのタイトルタグにここで入力したテキストが適用されます。', THEME_NAME ) ?></p>
  </td>
</tr>
<tr class="form-field">
  <th><label for="content"><?php _e( 'カテゴリ本文', THEME_NAME ) ?></label></th>
  <td><?php
    $content = isset($cat_meta['content']) ? $cat_meta['content'] : '';
    generate_visuel_editor_tag('cat_meta[content]', $content, 'content');
   ?>
    <p class="description"><?php _e( 'カテゴリページで表示されるメインコンテンツを入力してください。', THEME_NAME ) ?></p>
   </td>
</tr>
<tr class="form-field">
  <th><label for="eye_catch"><?php _e( 'アイキャッチ', THEME_NAME ) ?></label></th>
  <td><?php
    $eye_catch = isset($cat_meta['eye_catch']) ? $cat_meta['eye_catch'] : '';
    generate_upload_image_tag('cat_meta[eye_catch]', $eye_catch, 'eye_catch');
   ?>
    <p class="description"><?php _e( 'タイトル下に表示されるアイキャッチ画像を選択してください。', THEME_NAME ) ?></p>
   </td>
</tr>
<tr class="form-field">
  <th><label for="description"><?php _e( 'メタディスクリプション', THEME_NAME ) ?></label></th>
  <td>
    <?php
    $description = isset($cat_meta['description']) ? $cat_meta['description'] : '';
    generate_textarea_tag('cat_meta[description]', $description, __( 'カテゴリページの説明文を入力してください', THEME_NAME ), 3) ;
     ?>
    <p class="description"><?php _e( 'カテゴリページの説明を入力します。ここに入力したテキストはメタディスクリプションタグとして利用されます。', THEME_NAME ) ?></p>
  </td>
</tr>
<tr class="form-field">
  <th><label for="keywords"><?php _e( 'メタキーワード', THEME_NAME ) ?></label></th>
  <td>
    <input type="text" name="cat_meta[keywords]" id="keywords" size="25" value="<?php if(isset ( $cat_meta['keywords'])) echo esc_html($cat_meta['keywords']) ?>" placeholder="<?php _e( 'キーワード1,キーワード2,キーワード3', THEME_NAME ) ?>" />
    <p class="description"><?php _e( 'カテゴリページのメタキーワードをカンマ区切りで入力してください。※現在はあまり意味のない設定となっています。', THEME_NAME ) ?></p>
  </td>
</tr>
<?php
}
endif;

//拡張カテゴリ情報の保存
add_action ( 'edited_term', 'save_extra_category_fileds');
if ( !function_exists( 'save_extra_category_fileds' ) ):
function save_extra_category_fileds( $term_id ) {
  if ( isset( $_POST['cat_meta'] ) ) {
    // //_v($_POST['cat_meta']);
    $cat_id = $term_id;
    $cat_meta = $_POST['cat_meta'];
    // //_v($cat_id);
    // $cat_meta = get_category_meta($cat_id);
    // $cat_keys = array_keys($_POST['cat_meta']);
    // //_v($cat_meta);
    // foreach ($cat_keys as $key){
    //   if (isset($_POST['cat_meta'][$key])){
    //     $cat_meta[$key] = $_POST['cat_meta'][$key];
    //   }
    // }
    update_term_meta( $cat_id, get_category_meta_key($cat_id), $cat_meta );
  }
}
endif;


//カテゴリ説明文をビジュアルエディターにするカスタマイズ
/*
// remove the html filtering
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

add_filter('edit_category_form_fields', 'cat_description');
if ( !function_exists( 'cat_description' ) ):
function cat_description($tag){
  ?>
    <table class="form-table">
      <tr class="form-field">
        <th scope="row" valign="top"><label for="description"><?php _e('Description'); ?></label></th>
        <td>
        <?php
          $settings = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description' );
          wp_editor(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'cat_description', $settings);
        ?>
        <br />
        <span class="description"><?php _e('The description is not prominent by default; however, some themes may show it.'); ?></span>
        </td>
      </tr>
    </table>
  <?php
}
endif;


*/

//デフォルトのカテゴリ説明文を削除
//add_action('admin_head', 'remove_default_category_description');
if ( !function_exists( 'remove_default_category_description' ) ):
function remove_default_category_description(){
  global $current_screen;
  if ( $current_screen->id == 'edit-category' )
  {
  ?>
    <script type="text/javascript">
    jQuery(function($) {
        $('textarea#description').closest('tr.form-field').remove();
    });
    </script>
  <?php
  }
}
endif;

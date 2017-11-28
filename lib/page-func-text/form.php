<form name="form1" method="post" action="" class="admin-settings">
  <?php

  if (isset($_GET['id'])) {
    $action = 'new';
    $id = isset($_GET['id']) ? intval($_GET['id']) : '';
    $query = "SELECT date, modified, title, text FROM {FUNCTION_TEXTS_TABLE_NAME} WHERE id = {$id}";
    $result = $wpdb->get_row( $query );
    $title = isset($result->title) ? $result->title : '';
    $text = isset($result->text) ? stripslashes_deep($result->text) : '';

  } else {
    $action = 'new';
    $id = '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $text = isset($_POST['text']) ? stripslashes_deep($_POST['text']) : '';
  }

  echo '<h2>'.__( 'タイトル', THEME_NAME ).'</h2>';
  generate_textbox_tag('title', $title, __( 'タイトルの入力（126文字まで）', THEME_NAME ));
  generate_tips_tag(__( '表示ラベルとなるタイトルを入力してください。タイトルは一覧表示用です。', THEME_NAME ));

  _v($_POST);
  $editor_id = 'func-mext'; //エディターを区別するために、IDを指定する
  $settings = array( 'textarea_name' => 'text' ); //配列としてデータを渡すためname属性を指定する
   echo '<h2>'.__( '内容', THEME_NAME ).'</h2>';
   wp_editor( $text, $editor_id, $settings );
   generate_tips_tag(__( '関数化するテキストを入力してください。', THEME_NAME )); ?>
  <input type="hidden" name="action" value="<?php echo $action; ?>">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="hidden" name="<?php echo HIDDEN_FIELD_NAME; ?>" value="Y">
   <?php submit_button(__( '保存', THEME_NAME )); ?>
</form>
<?php
//var_dump($_POST);
$keyword = !empty($_POST['s']) ? $_POST['s'] : null;
$order_by = isset($_POST['order']) ? $_POST['order'] : 'date DESC, id DESC';
//var_dump($order_by);
$records = get_item_rankings($keyword, $order_by);
//var_dump($records);
//並び替えオプション
generate_sort_options_tag($keyword, $order_by);
?>
<!-- メッセージ -->
<?php if ($records): ?>
  <p class="op-message"><?php _e( '設定を変更したり不要なものは削除してご利用ください。新しいものは「新規作成」ボタンから追加できます。', THEME_NAME ) ?></p>
<?php else: ?>
  <p class="op-message"><?php _e( '「ランキング」を作成するには「新規作成」リンクをクリックしてください。', THEME_NAME ) ?></p>
<?php endif ?>

<div id="ir-list" class="postbox" style="max-width: 980px; margin-top: 20px;">
  <h2 class="hndle"><?php _e( 'ランキング一覧', THEME_NAME ) ?></h2>
  <div class="inside">

<table class="ir-list" style="width: 100%;">
  <?php foreach ($records as $record):
  //var_dump($record);
  $edit_url   = add_query_arg(array('action' => 'edit',   'id' => $record->id));
  $delete_url = add_query_arg(array('action' => 'delete', 'id' => $record->id));
   ?>
  <tr style="margin-bottom: 20px">
    <td>
      <?php if ($record->title): ?>
      <div>
        <a href="<?php echo $edit_url; ?>"><?php echo $record->title; ?></a>
      </div>
      <?php endif ?>
    </td>
    <td class="list-option" style="width: 50px;">
      <p><a href="<?php echo $edit_url; ?>"><?php _e( '編集', THEME_NAME ) ?></a></p>
      <p><a href="<?php echo $delete_url; ?>"><?php _e( '削除', THEME_NAME ) ?></a></p>
    </td>
  </tr>
  <?php endforeach ?>
</table>

  </div>
</div>
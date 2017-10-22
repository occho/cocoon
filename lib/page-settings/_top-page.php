
<?php //オリジナル設定ページ

// ユーザーが何か情報を POST したかどうかを確認
// POST していれば、隠しフィールドに 'Y' が設定されている
if( isset($_POST[HIDDEN_FIELD_NAME]) &&
    $_POST[HIDDEN_FIELD_NAME] == 'Y' ):
  //var_dump($_POST[OP_RESET_ALL_SETTINGS]);

  ///////////////////////////////////////
  // 設定の保存
  ///////////////////////////////////////
  //全体
  require_once 'all-posts.php';
  //ヘッダー
  require_once 'header-posts.php';
  //グローバルナビ
  require_once 'navi-posts.php';
  //広告
  require_once 'ads-posts.php';
  //タイトル
  require_once 'title-posts.php';
  //SEO
  require_once 'seo-posts.php';
  //アクセス解析
  require_once 'analytics-posts.php';
  //インデックス
  require_once 'index-posts.php';
  //投稿
  require_once 'single-posts.php';
  //固定ページ
  require_once 'page-posts.php';
  //目次
  require_once 'toc-posts.php';
  //SNSシェア
  require_once 'sns-share-posts.php';
  //SNSフォロー
  require_once 'sns-follow-posts.php';
  //コメント
  require_once 'comment-posts.php';
  //ソースコード
  require_once 'code-posts.php';
  //画像
  require_once 'image-posts.php';
  //OGP
  require_once 'ogp-posts.php';
  //内部ブログカード
  require_once 'blogcard-in-posts.php';
  //外部ブログカード
  require_once 'blogcard-out-posts.php';
  //フッター
  require_once 'footer-posts.php';
  //管理画面
  require_once 'admin-posts.php';
  //リセット
  require_once 'reset-posts.php';

//画面に「設定は保存されました」メッセージを表示
?>
<div class="updated">
  <p>
    <strong>
      <?php
      if ($_POST[OP_RESET_ALL_SETTINGS] && $_POST[OP_CONFIRM_RESET_ALL_SETTINGS]) {
         _e('設定はリセットされました。', THEME_NAME );
       } else {
         _e('設定は保存されました。', THEME_NAME );
       } ?>
    </strong>
  </p>
</div>
<?php
endif;

///////////////////////////////////////
// 入力フォーム
///////////////////////////////////////
?>
<div class="wrap">
<h1><?php _e( SETTING_NAME_TOP, THEME_NAME ) ?></h1>
<?php //var_dump($_POST) ?>
<form name="form1" method="post" action="" class="admin-settings">

<!-- タブ機能の実装 -->
<div id="tabs">
  <ul>
    <li class="all"><?php _e( '全体', THEME_NAME ) ?></li>
    <li class="theme-header"><?php _e( 'ヘッダー', THEME_NAME ) ?></li>
    <li class="ads"><?php _e( '広告', THEME_NAME ) ?></li>
    <li class="title"><?php _e( 'タイトル', THEME_NAME ) ?></li>
    <li class="seo"><?php _e( 'SEO', THEME_NAME ) ?></li>
    <li class="analytics"><?php _e( 'アクセス解析', THEME_NAME ) ?></li>
    <li class="index-page"><?php _e( 'インデックス', THEME_NAME ) ?></li>
    <li class="single-page"><?php _e( '投稿', THEME_NAME ) ?></li>
    <li class="page-page"><?php _e( '固定ページ', THEME_NAME ) ?></li>
    <li class="page-page"><?php _e( '目次', THEME_NAME ) ?></li>
    <li class="sns-share"><?php _e( 'SNSシェア', THEME_NAME ) ?></li>
    <li class="sns-follow"><?php _e( 'SNSフォロー', THEME_NAME ) ?></li>
    <li class="comment"><?php _e( 'コメント', THEME_NAME ) ?></li>
    <li class="code"><?php _e( 'コード', THEME_NAME ) ?></li>
    <li class="image"><?php _e( '画像', THEME_NAME ) ?></li>
    <li class="ogp"><?php _e( 'OGP', THEME_NAME ) ?></li>
    <li class="blog-card-in"><?php _e( 'ブログカード', THEME_NAME ) ?></li>
    <li class="footer"><?php _e( 'フッター', THEME_NAME ) ?></li>
    <li class="admin"><?php _e( '管理者画面', THEME_NAME ) ?></li>
    <li class="reset"><?php _e( 'リセット', THEME_NAME ) ?></li>
    <li class="amp"><?php _e( 'AMP', THEME_NAME ) ?></li>
    <li class="speed"><?php _e( '高速化', THEME_NAME ) ?></li>
    <li class="skin"><?php _e( 'スキン', THEME_NAME ) ?></li>
    <li class="content"><?php _e( 'コンテンツ', THEME_NAME ) ?></li>
    <li class="sidebar"><?php _e( 'サイドバー', THEME_NAME ) ?></li>
    <li class="other"><?php _e( 'アピールエリア', THEME_NAME ) ?></li>
    <li class="other"><?php _e( 'カルーセル', THEME_NAME ) ?></li>
    <li class="to-top"><?php _e( 'トップに戻る', THEME_NAME ) ?></li>
    <li class="heading"><?php _e( '見出し', THEME_NAME ) ?></li>
    <li class="heading"><?php _e( '関連記事', THEME_NAME ) ?></li>
    <li class="heading"><?php _e( 'レイアウト', THEME_NAME ) ?></li>
    <li class="heading"><?php _e( '目次', THEME_NAME ) ?></li>
    <li class="heading"><?php _e( 'エントリーカード', THEME_NAME ) ?></li>
    <li class="other"><?php _e( 'その他', THEME_NAME ) ?></li>
  </ul>

  <?php submit_button(__( '変更をまとめて保存', THEME_NAME )); ?>

  <!-- 全体タブ -->
  <div class="all metabox-holder">
    <?php require_once 'all-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- ヘッダータブ -->
  <div class="theme-header metabox-holder">
    <?php require_once 'header-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- 広告タブ -->
  <div class="ads metabox-holder">
    <?php require_once 'ads-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- タイトルタブ -->
  <div class="title metabox-holder">
    <?php require_once 'title-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- SEOタブ -->
  <div class="seo metabox-holder">
    <?php require_once 'seo-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- アクセス解析 -->
  <div class="analytics metabox-holder">
    <?php require_once 'analytics-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- インデックス -->
  <div class="index-page metabox-holder">
    <?php require_once 'index-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- 投稿 -->
  <div class="single-page metabox-holder">
    <?php require_once 'single-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- 固定ページ -->
  <div class="page-page metabox-holder">
    <?php require_once 'page-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- 目次 -->
  <div class="toc-page metabox-holder">
    <?php require_once 'toc-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- SNSシェアタブ -->
  <div class="sns-share metabox-holder">
    <?php require_once 'sns-share-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- SNSフォロータブ -->
  <div class="sns-follow metabox-holder">
    <?php require_once 'sns-follow-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- コメントタブ -->
  <div class="comment metabox-holder">
    <?php require_once 'comment-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- コードタブ -->
  <div class="code metabox-holder">
    <?php require_once 'code-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- 画像タブ -->
  <div class="image metabox-holder">
    <?php require_once 'image-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- OGP -->
  <div class="ogp metabox-holder">
    <?php require_once 'ogp-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- 内部・外部ブログカード -->
  <div class="blog-card-in metabox-holder">
    <?php require_once 'blogcard-in-forms.php'; ?>
    <?php require_once 'blogcard-out-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- フッター -->
  <div class="admin metabox-holder">
    <?php require_once 'footer-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- 管理画面 -->
  <div class="admin metabox-holder">
    <?php require_once 'admin-forms.php'; ?>
  </div><!-- /.metabox-holder -->

  <!-- リセット -->
  <div class="reset metabox-holder">
    <?php require_once 'reset-forms.php'; ?>
  </div><!-- /.metabox-holder -->


</div><!-- /#tabs -->
<input type="hidden" name="<?php echo HIDDEN_FIELD_NAME; ?>" value="Y">
<input type="hidden" id="<?php echo SELECT_INDEX_NAME; ?>" name="<?php echo SELECT_INDEX_NAME; ?>" value="<?php echo ($_POST && $_POST[SELECT_INDEX_NAME] ? $_POST[SELECT_INDEX_NAME] : 0); ?>">

<?php submit_button(__( '変更をまとめて保存', THEME_NAME )); ?>


</form>
</div>

<style type="text/css">
  <?php get_template_part('tmp/css-custom'); ?>
</style>
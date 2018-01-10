<!DOCTYPE html>
<html amp>
<head>
<meta charset="utf-8">
<title><?php echo wp_get_document_title(); ?></title>
<link rel="canonical" href="<?php the_permalink() ?>" />
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<?php if ( is_facebook_ogp_enable() ) //Facebook OGPタグ挿入がオンのとき
get_template_part('tmp/header-ogp');//Facebook OGP用のタグテンプレート?>
<?php if ( is_twitter_card_enable() ) //Twitterカードタグ挿入がオンのとき
get_template_part('tmp/header-twitter-card');//Twitterカード用のタグテンプレート?>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<?php
//投稿・固定ページのページ内容全てを取得する
$all_content = get_the_singular_content();
$elements = array(
  //'amp-analytics' => 'amp-analytics-0.1.js',
  'amp-facebook' => 'amp-facebook-0.1.js',
  'amp-youtube' => 'amp-youtube-0.1.js',
  'amp-vine' => 'amp-vine-0.1.js',
  'amp-twitter' => 'amp-twitter-0.1.js',
  'amp-instagram' => 'amp-instagram-0.1.js',
  'amp-social-share' => 'amp-social-share-0.1.js',
  'amp-ad' => 'amp-ad-0.1.js',
  'amp-iframe' => 'amp-iframe-0.1.js',
);

//var_dump($the_content);
foreach( $elements as $key => $val ) {
  if( strpos($all_content, '<'.$key) !== false ) {
    echo '<script async custom-element="'.$key.'" src="https://cdn.ampproject.org/v0/'.$val.'"></script>'.PHP_EOL;

  }
}

//AMP Analytics・Google Tag Manager用のライブラリ
if ( !is_user_admin() && (get_google_analytics_tracking_id() || get_google_tag_manager_tracking_id()) )  {
  echo '<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>'.PHP_EOL;
}
//Font Awesome様のスタイルの読み込み
echo '<link rel="stylesheet" href="'.FONT_AWESOME_CDN_URL.'">'.PHP_EOL;
//Google Fontsスタイルの読み込み
if (!is_site_font_family_local()) {
  echo '<link rel="stylesheet" href="'.get_site_font_source_url().'">'.PHP_EOL;
}
 ?>
<?php //JSON-LDの読み込み
get_template_part('json-ld'); ?>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

<?php //AMP用スタイルの出力
  generate_style_amp_custom_tag(); ?>
</head>
<body <?php body_class('amp'); ?> itemscope itemtype="http://schema.org/WebPage">

  <?php //AMP用のGoogle Tag Managerコード
  get_template_part('tmp/amp-tagmanager') ?>

  <?php //AMP用のAnalyticsコード
  get_template_part('tmp/amp-analytics') ?>

  <?php //サイトヘッダーからコンテンツまでbodyタグ最初のHTML
  get_template_part('tmp/body-top'); ?>
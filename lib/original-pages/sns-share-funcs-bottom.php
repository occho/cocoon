<?php //SNS設定に必要な定数や関数


///////////////////////////////////////
// SNSシェアボタンの設定
///////////////////////////////////////

//シェアボタンの表示
define('OP_SNS_SHARE_BUTTONS_VISIBLE', 'sns_share_buttons_visible');
if ( !function_exists( 'is_sns_share_buttons_visible' ) ):
function is_sns_share_buttons_visible(){
  return get_option(OP_SNS_SHARE_BUTTONS_VISIBLE, 1);
}
endif;

//SNSシェアメッセージ
define('OP_SNS_SHARE_MESSAGE', 'sns_share_message');
if ( !function_exists( 'get_sns_share_message' ) ):
function get_sns_share_message(){
  return get_option(OP_SNS_SHARE_MESSAGE, 'シェアする');
}
endif;

//Twitterシェアボタンの表示
define('OP_TWITTER_SHARE_BUTTON_VISIBLE', 'twitter_share_button_visible');
if ( !function_exists( 'is_twitter_share_button_visible' ) ):
function is_twitter_share_button_visible(){
  return get_option(OP_TWITTER_SHARE_BUTTON_VISIBLE, 1);
}
endif;

//Facebookシェアボタンの表示
define('OP_FACEBOOK_SHARE_BUTTON_VISIBLE', 'facebook_share_button_visible');
if ( !function_exists( 'is_facebook_share_button_visible' ) ):
function is_facebook_share_button_visible(){
  return get_option(OP_FACEBOOK_SHARE_BUTTON_VISIBLE, 1);
}
endif;

//はてなブックマークシェアボタンの表示
define('OP_HATEBU_SHARE_BUTTON_VISIBLE', 'hatebu_share_button_visible');
if ( !function_exists( 'is_hatebu_share_button_visible' ) ):
function is_hatebu_share_button_visible(){
  return get_option(OP_HATEBU_SHARE_BUTTON_VISIBLE, 1);
}
endif;

//Google+シェアボタンの表示
define('OP_GOOGLE_PLUS_SHARE_BUTTON_VISIBLE', 'google_plus_share_button_visible');
if ( !function_exists( 'is_google_plus_share_button_visible' ) ):
function is_google_plus_share_button_visible(){
  return get_option(OP_GOOGLE_PLUS_SHARE_BUTTON_VISIBLE, 1);
}
endif;

//Pocketシェアボタンの表示
define('OP_POCKET_SHARE_BUTTON_VISIBLE', 'pocket_share_button_visible');
if ( !function_exists( 'is_pocket_share_button_visible' ) ):
function is_pocket_share_button_visible(){
  return get_option(OP_POCKET_SHARE_BUTTON_VISIBLE, 1);
}
endif;

//LINE@シェアボタンの表示
define('OP_LINE_AT_SHARE_BUTTON_VISIBLE', 'line_at_share_button_visible');
if ( !function_exists( 'is_line_at_share_button_visible' ) ):
function is_line_at_share_button_visible(){
  return get_option(OP_LINE_AT_SHARE_BUTTON_VISIBLE, 1);
}
endif;

//SNSシェアボタンカラー
define('OP_SNS_SHARE_BUTTON_COLOR', 'sns_share_button_color');
if ( !function_exists( 'get_sns_share_button_color' ) ):
function get_sns_share_button_color(){
  return get_option(OP_SNS_SHARE_BUTTON_COLOR, 'brand_color');
}
endif;

//SNSシェアボタンのカラム数
define('OP_SNS_SHARE_COLUMN_COUNT', 'sns_share_column_count');
if ( !function_exists( 'get_sns_share_column_count' ) ):
function get_sns_share_column_count(){
  return get_option(OP_SNS_SHARE_COLUMN_COUNT, 3);
}
endif;

//SNSシェアボタンのロゴとキャプションの位置
define('OP_SNS_SHARE_LOGO_CAPTION_POSITION', 'sns_share_logo_caption_position');
if ( !function_exists( 'get_sns_share_logo_caption_position' ) ):
function get_sns_share_logo_caption_position(){
  return get_option(OP_SNS_SHARE_LOGO_CAPTION_POSITION, 'left_and_right');
}
endif;
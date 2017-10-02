<?php //定数をまとめて定義

//テーマ名
define('THEME_NAME', 'cocoon');
//テーマ名（最初の一文字だけ大文字）
define('THEME_NAME_CAMEL', ucfirst(THEME_NAME));
//ウィジェット名プレフィックス
define('WIDGET_NAME_PREFIX', '['.substr(THEME_NAME_CAMEL, 0, 1).'] '); //ex.[C]
//トップレベルオリジナル設定名
define('SETTING_NAME_TOP', THEME_NAME_CAMEL.__( ' 設定', THEME_NAME ));

//ウィジェットのエントリータイプ
define('ET_DEFAULT',        'defalt');
define('ET_LARGE_THUMB',    'large_thumb');
define('ET_LARGE_THUMB_ON', 'large_thumb_on');
//ウィジェットモードデフォルト
define('WM_DEFAULT', 'all');

//アドセンスID名
define('DATA_AD_CLIENT', 'data-ad-client');
define('DATA_AD_SLOT',   'data-ad-slot');
//レスポンシブ広告の表示フォーマット
define('DATA_AD_FORMAT_AUTO', 'auto'); //おまかせ
define('DATA_AD_FORMAT_RECTANGLE', 'rectangle'); //正方形に近い長方形
define('DATA_AD_FORMAT_HORIZONTAL', 'horizontal'); //横長
define('DATA_AD_FORMAT_VERTICAL', 'vertical'); //縦長
//Googleで定義されていないフォーマットはDATA_無し
define('AD_FORMAT_SINGLE_RECTANGLE', 'single-rectangle'); //シングルレクタングル
define('AD_FORMAT_DABBLE_RECTANGLE', 'dabble-rectangle'); //ダブルレクタングル

//管理設定画面の隠しフィールド名
define('HIDDEN_FIELD_NAME', THEME_NAME.'_submit_hidden');
define('SELECT_INDEX_NAME', 'select_index');

//入力ボックスの横幅
define('DEFAULT_INPUT_COLS', 60);
//入力ボックスの縦幅
define('DEFAULT_INPUT_ROWS', 10);

//SNSシェアオプション
define('SS_TOP', 'ss-top');
define('SS_BOTTOM', 'ss-bottom');

//URLの正規表現
define('URL_REG', '/(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)/');

//Font AwesomeのCDN
define('FONT_AWESOME_CDN_URL', 'https://max'.'cdn.boot'.'strapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


//インポートファイルの読み込み
require_once '_imports.php';
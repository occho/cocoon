<?php //SNSシェア設定をデータベースに保存

//トップシェアボタンの設定保存
require_once 'sns-share-posts-top.php';
//ボトムシェアボタンの設定保存
require_once 'sns-share-posts-bottom.php';

//ツイートにメンションを含める
update_theme_option(OP_TWITTER_ID_INCLUDE);
//ツイート後にフォローを促す
update_theme_option(OP_TWITTER_RELATED_FOLLOW_ENABLE);

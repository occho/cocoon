<!-- 本文下シェアボタン -->
<div id="sns-share-bottom" class="postbox">
  <h2 class="hndle"><?php _e( '本文下シェアボタン', THEME_NAME ) ?></h2>
  <div class="inside">
    <p><?php _e( '本文下シェアボタンの表示に関する設定です。', THEME_NAME ) ?></p>
    <table class="form-table">
      <tbody>

        <!-- プレビュー画面 -->
        <tr>
          <th scope="row">
            <label><?php _e( 'プレビュー', THEME_NAME ) ?></label>
          </th>
          <td>
            <div class="demo">
            <?php //テンプレートの読み込み
              if (is_sns_follow_buttons_visible())
                get_template_part_with_option('tmp/sns-share-buttons', SS_BOTTOM); ?>
            </div>
          </td>
        </tr>

        <!-- 本文下シェアボタンの表示 -->
        <tr>
          <th scope="row">
            <?php genelate_label_tag(OP_SNS_SHARE_BUTTONS_VISIBLE, __( '本文下シェアボタンの表示', THEME_NAME )); ?>
          </th>
          <td>
            <?php
            genelate_checkbox_tag( OP_SNS_SHARE_BUTTONS_VISIBLE, is_sns_share_buttons_visible(), __( 'メインカラム本文下シェアボタンを表示', THEME_NAME ));
            genelate_tips_tag(__( '投稿・固定ページのメインカラムにある本文下シェアボタンの表示を切り替えます。', THEME_NAME ));
            ?>
          </td>
        </tr>

        <!-- シェアメッセージ -->
        <tr>
          <th scope="row">
            <?php genelate_label_tag(OP_SNS_SHARE_MESSAGE, __( 'シェアメッセージ', THEME_NAME )); ?>
          </th>
          <td>
            <?php
            genelate_textbox_tag(OP_SNS_SHARE_MESSAGE, get_sns_share_message(), __( 'シェアメッセージの入力', THEME_NAME ));
            genelate_tips_tag(__( '訪問者にシェアを促すメッセージを入力してください。', THEME_NAME ));
            ?>
          </td>
        </tr>

        <!-- 表示切替 -->
        <tr>
          <th scope="row">
            <?php genelate_label_tag('', __( '表示切替', THEME_NAME )); ?>
          </th>
          <td>
            <p><?php _e( '個々のシェアボタンの表示切り替え。', THEME_NAME ) ?></p>
            <ul>
              <li>
                <?php genelate_checkbox_tag(OP_TWITTER_SHARE_BUTTON_VISIBLE, is_twitter_share_button_visible(), __( 'Twitter', THEME_NAME )); ?>
              </li>
              <li>
                <?php genelate_checkbox_tag(OP_FACEBOOK_SHARE_BUTTON_VISIBLE, is_facebook_share_button_visible(), __( 'Facebook', THEME_NAME )); ?>
              </li>
              <li>
                <?php genelate_checkbox_tag(OP_HATEBU_SHARE_BUTTON_VISIBLE, is_hatebu_share_button_visible(), __( 'はてなブックマーク', THEME_NAME )); ?>
              </li>
              <li>
                <?php genelate_checkbox_tag(OP_GOOGLE_PLUS_SHARE_BUTTON_VISIBLE, is_google_plus_share_button_visible(), __( 'Google', THEME_NAME )); ?>
              </li>
              <li>
                <?php genelate_checkbox_tag(OP_POCKET_SHARE_BUTTON_VISIBLE, is_pocket_share_button_visible(), __( 'Pocket', THEME_NAME )); ?>
              </li>
              <li>
                <?php genelate_checkbox_tag(OP_LINE_AT_SHARE_BUTTON_VISIBLE, is_line_at_share_button_visible(), __( 'LINE@', THEME_NAME )); ?>
              </li>
            </ul>
            <p><?php _e( '本文下に表示するシェアボタンを選択してください。', THEME_NAME ) ?></p>
          </td>
        </tr>


        <!-- ボタンカラー -->
        <tr>
          <th scope="row">
            <?php genelate_label_tag(OP_SNS_SHARE_BUTTON_COLOR, __( 'ボタンカラー', THEME_NAME )); ?>
          </th>
          <td>
            <?php
            $options = array(
              'monochrome' => 'モノクロ',
              'brand_color' => 'ブランドカラー',
              'brand_color_white' => 'ブランドカラー（白抜き）',
            );
            genelate_selectbox_tag(OP_SNS_SHARE_BUTTON_COLOR, $options, get_sns_share_button_color());
            genelate_tips_tag(__( '本文下シェアボタンの配色を選択してください。', THEME_NAME ));
            ?>
          </td>
        </tr>

        <!-- カラム数 -->
        <tr>
          <th scope="row">
            <?php genelate_label_tag(OP_SNS_SHARE_COLUMN_COUNT, __( 'カラム数', THEME_NAME )); ?>
          </th>
          <td>
            <?php
            $options = array(
              '1' => '1列',
              '2' => '2列',
              '3' => '3列',
              '4' => '4列',
              '5' => '5列',
              '6' => '6列',
            );
            genelate_selectbox_tag(OP_SNS_SHARE_COLUMN_COUNT, $options, get_sns_share_column_count());
            genelate_tips_tag(__( '本文下シェアボタンのカラム数を選択してください。', THEME_NAME ));
            ?>
          </td>
        </tr>

        <!-- ロゴ・キャプション配置 -->
        <tr>
          <th scope="row">
            <?php genelate_label_tag(OP_SNS_SHARE_LOGO_CAPTION_POSITION, __( 'ロゴ・キャプション配置', THEME_NAME )); ?>
          </th>
          <td>
            <?php
            $options = array(
              'left_and_right' => 'ロゴ・キャプション 左右',
              'high_and_low_lc' => 'ロゴ・キャプション 上下',
              'high_and_low_cl' => 'キャプション・ロゴ 上下',
            );
            genelate_selectbox_tag(OP_SNS_SHARE_LOGO_CAPTION_POSITION, $options, get_sns_share_logo_caption_position());
            genelate_tips_tag(__( '本文下シェアボタンのロゴとキャプションの配置を選択してください。', THEME_NAME ));
            ?>
          </td>
        </tr>

      </tbody>
    </table>

  </div>
</div>
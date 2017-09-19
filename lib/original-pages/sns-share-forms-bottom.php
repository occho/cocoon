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
            <label for="<?php echo OP_SNS_SHARE_BUTTONS_VISIBLE; ?>"><?php _e( '本文下シェアボタンの表示', THEME_NAME ) ?></label>
          </th>
          <td>
             <input type="checkbox" name="<?php echo OP_SNS_SHARE_BUTTONS_VISIBLE; ?>" value="1"<?php the_checkbox_checked(is_sns_share_buttons_visible()); ?>><?php _e("メインカラム本文下シェアボタンを表示",THEME_NAME ); ?>
            <p class="tips"><?php _e( '投稿・固定ページのメインカラムにある本文下シェアボタンの表示を切り替えます。', THEME_NAME ) ?></p>
          </td>
        </tr>

        <!-- シェアメッセージ -->
        <tr>
          <th scope="row">
            <label for="<?php echo OP_SNS_SHARE_MESSAGE; ?>"><?php _e( 'シェアメッセージ', THEME_NAME ) ?></label>
          </th>
          <td>
            <input type="text" name="<?php echo OP_SNS_SHARE_MESSAGE; ?>" size="<?php echo DEFAULT_INPUT_COLS; ?>" value="<?php echo get_sns_share_message(); ?>" placeholder="<?php _e( 'シェアメッセージの入力', THEME_NAME ); ?>">
            <p class="tips"><?php _e( '訪問者にシェアを促すメッセージを入力してください。', THEME_NAME ) ?></p>
          </td>
        </tr>

        <!-- 表示切替 -->
        <tr>
          <th scope="row">
            <label><?php _e( '表示切替', THEME_NAME ) ?></label>
          </th>
          <td>
            <p><?php _e( '個々のシェアボタンの表示切り替え。', THEME_NAME ) ?></p>
            <ul>
              <li><input type="checkbox" name="<?php echo OP_TWITTER_SHARE_BUTTON_VISIBLE; ?>" value="1"<?php the_checkbox_checked(is_twitter_share_button_visible()); ?>><?php _e( 'Twitter', THEME_NAME ) ?></li>
              <li><input type="checkbox" name="<?php echo OP_FACEBOOK_SHARE_BUTTON_VISIBLE; ?>" value="1"<?php the_checkbox_checked(is_facebook_share_button_visible()); ?>><?php _e( 'Facebook', THEME_NAME ) ?></li>
              <li><input type="checkbox" name="<?php echo OP_HATEBU_SHARE_BUTTON_VISIBLE; ?>" value="1"<?php the_checkbox_checked(is_hatebu_share_button_visible()); ?>><?php _e( 'Google+', THEME_NAME ) ?></li>
              <li><input type="checkbox" name="<?php echo OP_GOOGLE_PLUS_SHARE_BUTTON_VISIBLE; ?>" value="1"<?php the_checkbox_checked(is_google_plus_share_button_visible()); ?>><?php _e( 'はてなブックマーク', THEME_NAME ) ?></li>
              <li><input type="checkbox" name="<?php echo OP_POCKET_SHARE_BUTTON_VISIBLE; ?>" value="1"<?php the_checkbox_checked(is_pocket_share_button_visible()); ?>><?php _e( 'Pocket', THEME_NAME ) ?></li>
              <li><input type="checkbox" name="<?php echo OP_LINE_AT_SHARE_BUTTON_VISIBLE; ?>" value="1"<?php the_checkbox_checked(is_line_at_share_button_visible()); ?>><?php _e( 'LINE@', THEME_NAME ) ?></li>
            </ul>
            <p><?php _e( '本文下に表示するシェアボタンを選択してください。', THEME_NAME ) ?></p>
          </td>
        </tr>


        <!-- ボタンカラー -->
        <tr>
          <th scope="row">
            <label for="<?php echo OP_SNS_SHARE_BUTTON_COLOR; ?>"><?php _e( 'ボタンカラー', THEME_NAME ) ?></label>
          </th>
          <td>
            <select name="<?php echo OP_SNS_SHARE_BUTTON_COLOR; ?>">
              <option value="monochrome"<?php the_option_selected('monochrome', get_sns_share_button_color()); ?>>モノクロ</option>
              <option value="brand_color"<?php the_option_selected('brand_color', get_sns_share_button_color()); ?>>ブランドカラー</option>
              <option value="brand_color_white"<?php the_option_selected('brand_color_white', get_sns_share_button_color()); ?>>ブランドカラー（白抜き）</option>
            </select>
            <p class="tips"><?php _e( 'シェアボタンの配色を選択してください。', THEME_NAME ) ?></p>
          </td>
        </tr>



        <!-- カラム数 -->
        <tr>
          <th scope="row">
            <label for="<?php echo OP_SNS_SHARE_COLUMN_COUNT; ?>"><?php _e( 'カラム数', THEME_NAME ) ?></label>
          </th>
          <td>
            <select name="<?php echo OP_SNS_SHARE_COLUMN_COUNT; ?>">
              <option value="1"<?php the_option_selected(1, get_sns_share_column_count()); ?>>1列</option>
              <option value="2"<?php the_option_selected(2, get_sns_share_column_count()); ?>>2列</option>
              <option value="3"<?php the_option_selected(3, get_sns_share_column_count()); ?>>3列</option>
              <option value="4"<?php the_option_selected(4, get_sns_share_column_count()); ?>>4列</option>
              <option value="5"<?php the_option_selected(5, get_sns_share_column_count()); ?>>5列</option>
              <option value="6"<?php the_option_selected(6, get_sns_share_column_count()); ?>>6列</option>
            </select>
            <p class="tips"><?php _e( '本文下シェアボタンのカラム数を選択してください。', THEME_NAME ) ?></p>
          </td>
        </tr>


        <!-- ロゴ・キャプション配置 -->
        <tr>
          <th scope="row">
            <label for="<?php echo OP_SNS_SHARE_LOGO_CAPTION_POSITION; ?>"><?php _e( 'ロゴ・キャプション配置', THEME_NAME ) ?></label>
          </th>
          <td>
            <select name="<?php echo OP_SNS_SHARE_LOGO_CAPTION_POSITION; ?>">
              <option value="left_and_right"<?php the_option_selected('left_and_right', get_sns_share_logo_caption_position()); ?>>ロゴ・キャプション 左右</option>
              <option value="high_and_low_lc"<?php the_option_selected('high_and_low_lc', get_sns_share_logo_caption_position()); ?>>ロゴ・キャプション 上下</option>
              <option value="high_and_low_cl"<?php the_option_selected('high_and_low_cl', get_sns_share_logo_caption_position()); ?>>キャプション・ロゴ 上下</option>
            </select>
            <p class="tips"><?php _e( '本文下シェアボタンのロゴとキャプションの配置を選択してください。', THEME_NAME ) ?></p>
          </td>
        </tr>


      </tbody>
    </table>

  </div>
</div>
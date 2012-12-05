<?php

// {{{ 1. SMTPサーバ設定        SMTP Server Configuration
/**
 * SMTPサーバー
 *
 * SMTP server. Host name or IP address.
 */
define('SMTP_SERVER', '');
/**
 * SMTPサーバーのポート番号。25または587(OP25B)など
 * 
 * SMTP port number.
 * Generally 25.
 */
define('SMTP_PORT', 25);
/**
 * SMTP認証の方法。 (Ver.0.3-)
 * PEAR::Net/SMTPが受け入れる値
 * 例： 'DIGEST-MD5', 'CRAM-MD5', 'LOGIN', 'PLAIN'
 *
 * SMTP-AUTH Method. (Ver.0.3-)
 * eg. 'DIGEST-MD5', 'CRAM-MD5', 'LOGIN', 'PLAIN'
 */
define('SMTP_AUTH', 'LOGIN');
/**
 * SMTP認証で使用するユーザ名 (Ver.0.3-)
 *
 * An username for SMTP-AUTH. (Ver.0.3-)
 */
define('SMTP_USERNAME', '');
/**
 * SMTP認証で使用するパスワード (Ver.0.3-)
 *
 * An password for SMTP-AUTH. (Ver.0.3-)
 */
define('SMTP_PASSWORD', '');
// }}}

// {{{ 2. 控えメール設定          Mail Configuration
/**
 * 控えメールをユーザに送信するか (Ver.0.3-)
 * 0: 送信しない、1:送信する
 *
 * Allow or not to send a mail to a user. (Ver.0.3-)
 * 0: Disallow, 1: Allow
 */
define('SEND_USERMAIL', 1);
/**
 * 送信先メールアドレス
 *
 * Destination mail address which copy mail send to.
 */
define('MAIL_SENDTO',  'soudan@adhoc.or.jp');
/**
 * From:に表示するメールアドレス
 *
 * Mail address for From header.
 */
define('MAIL_FROM',    'soudan@adhoc.or.jp');
/**
 * 控えメール(管理者向け、ユーザ向け共通)の件名
 *
 * Copy mail's subject. 
 */
define('MAIL_SUBJECT', '【スマフォ】無料相談承りました。');
/**
 * メールエンコーディング (Ver.0.21-)
 * 'UTF-8': 多言語対応メール、'ISO-2022-JP': 日本語メール
 *
 * A mail encoding. (Ver.0.21-)
 * 'UTF-8' is for a multilingual message.
 */
define('MAIL_ENCODING', 'UTF-8');
// }}}

/**
 * 管理者パスワード
 * Webでメッセージを閲覧するときに使用。空欄の場合、閲覧機能は使用不可
 *
 * Administrator's password for viewing messages.
 * If the password is empty, the functionality is disabled.
 */
define('ADMIN_PASSWORD', '19760728');
/**
 * (Ver.0.23b-) gzip転送の可否 (0: しない、1: する)
 * 転送内容を圧縮して帯域を節約する。XREAでは1にできません(2007-11現在)
 */
define('GZIP_ENCODING', 0);

// {{{ 3. エラーメッセージ          Error messages.
/**
 * (Ver.0.21-) 必須項目が入力されなかったときのエラーメッセージ
 *
 * (Ver.0.21-) Error message if the required field is empty.
 */
define('ERRMSG_REQUIRED', '必須項目を入力してください');
// }}}

// {{{ 4. タイムゾーン、日時表示の設定          Timezone setting and Date&time format.
/**
 * タイムゾーン (Ver.0.24-)
 * 世界標準時(GMT)との時差を時間単位で指定する。日本時間(JST):+9.0、太平洋時間(PST):-8.0
 */
define('TIMEZONE_HOURS', +9.0);
/**
 * 時刻フォーマット。
 * phpのdate()関数のフォーマット文字列を受け付ける。
 * 参照: 
 *
 * Date & time format string.
 * See; 
 */
define('APP_TIMEFORMAT', 'Y-m-d H:i:s');
// }}}

// {{{ 対スパム設定          Antispam settings.
/**
 * スパム投稿を受けたときの処理
 * 1: ログを記録のみ、2: ログを記録し、リクエストを拒否(403 Forbidden)
 *
 * Processing mode when the form script recieved spam messages.
 * 1: Save log only  2: Save log and reject the request by 403 Forbidden.
 */
define('ANTISPAM_LEVEL', 1); // 
// }}}

// {{{ フォーム設置先アドレス(URL)
/**
 * スクリプト設置アドレス Ver.0.34-)
 * 共用SSLで正常動作しない場合は、この値を設定してください
 */
define('SCRIPT_URL', ''); // 設定例) https://www.examle.com/jform.php
// }}}

// {{{ 5. データファイル設定        Data File Configuration.

define('MAILFORM_DATAFILE', 'data/mailform.txt');
define('ANTISPAM_HOSTFILE', 'data/antispam_host.txt');
define('ANTISPAM_LOGFILE',  'data/antispam_log.txt');
define('ANTISPAM_LOCKFILE', 'data/antispam.lock');
// }}}

// {{{ 6. テンプレートファイル        Template Files Configuration.
/* 
 * Following constans define the path of template html files.
 * It is needless to make template files public,
 * So hiding these files may be better thing.
 */
define('HTML_DEFAULT', '_1default.html');
define('HTML_CONFIRM', '_2confirm.html');
define('HTML_THANKS',  '_3thanks.html');
define('HTML_VIEW',    '_4view.html');
// }}}
/**
 * 送信メールテンプレート (Ver.0.3-)
 *
 * A mail template. (Ver.0.3-)
 */
define('MAIL_ADMIN',   '_5mail_admin.txt');
define('MAIL_USER',    '_6mail_user.txt');
// }}}

// {{{ 7. ビジネスライセンス        Business License.
/**
 * シリアルキー文字列 (Ver.0.31-)
 *
 * A serial key string. (Ver.0.31-)
 */
define('SERIAL_KEY', '');
// }}}
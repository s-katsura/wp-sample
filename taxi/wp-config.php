<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'sakura');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '1175abcd');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', 'utf8_general_ci');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9}z+0y$Ll*~[kbQg_>ZU*|v6g7iIN`Wvg(gt=hitxSo;ln9c&}Mo5pR@*qaNy77&');
define('SECURE_AUTH_KEY',  '+EtJw,(+er,S7#VPhaiu@%3E%h`C yczWMLhD3nE~y`gM#^|qSxZ3+{IxzpwNJFY');
define('LOGGED_IN_KEY',    'Est%xcoY*wc+MB/w9VvODgWJFqATIc?Yvq9EIEKz^~Keoe;6:<26$@KFR-6O/dH3');
define('NONCE_KEY',        '5eF/k/szy7M(F+x>?>N2=0*=~JO7Ea5[6sui1Khp10(F[xp8p|j[2OR>4+ySlAd%');
define('AUTH_SALT',        'Y6{RJ=EF*O}>P|V>{oMX73PEev7rCHMffq1lG!s*{jYv$.Y*Zud?b3JG#+aMz|xn');
define('SECURE_AUTH_SALT', 'xNIlzVQ+b+}b-t1]3UgCnq70.vsZ9m-Bne.ED@sGy%z4VOHbWbIRx,.K$4Jd1W B');
define('LOGGED_IN_SALT',   '@oR<CoMq1[`Q;S(:M-uWC3!uNZG&^EGN`D3xCPGY+V.:DE6|Vw<YrM;)dTYZOz_4');
define('NONCE_SALT',       '>8uv1L)X}(UIDLEh;Y#v,a;gI(HHVa::Tsg^.+m%:tdHi0+>Qc-tnDR-U4da-Z,@');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'sakura_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', true);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

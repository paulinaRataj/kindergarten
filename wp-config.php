<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy i ABSPATH. Więcej informacji
 * znajduje się na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'kindergarten');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'root');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', '');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'localhost');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|Lt`H5N9v;<>zfg]}I:-pd!dQ7 w0gJxx@vfaK8^/M{@.8lt]`EzckUn<J2|WtE]');
define('SECURE_AUTH_KEY',  'g[{+^E$HW![e30q[j/}O $1B&6gF!nHCR]3kXAB%-bRbn-SBn9U)v.tURVCd7c|(');
define('LOGGED_IN_KEY',    'gfPw^-Y?5]1<nWI-q_72TlCt#xo;$2CkrzFA%-x?2Vj^/9>}c:.1(dm-2sjir2he');
define('NONCE_KEY',        '&i6+W4?3ic2N;_Aaa5$+OOcD6)dO !s!bQ6QNf+jdHW@`QNE:+xY]pL]*+c^a@c;');
define('AUTH_SALT',        'mz`!/U=Dl,NFT;4X ~v4OE,~.NC{I?1*8rQ;hvX|[Ua#,P+/IeG|2kOU+e2pGUYe');
define('SECURE_AUTH_SALT', 'UL+9qyl&AcMrx:A9/a}p$rB;*}vP-?H/pSqhCWBlhximx59-nZ {PC`bJlA}oh^-');
define('LOGGED_IN_SALT',   '>z~Gi?f6jUP[{S[K.3Y^S-2MR}H<f7JjFJg-U<]wnU+-7kV|`6-r-z+Qld36wAjy');
define('NONCE_SALT',       'Q-GUs_l:19rFyIi+M+E-Rs1.w;{n@4~5/:!L)Scs&:7%9*@Y<z#* #>z+-L3?;zG');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'wp_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');

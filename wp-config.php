<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'care4u_dev');

/** Имя пользователя MySQL */
define('DB_USER', 'Ahmed');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Ahmadbigboss229');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'qy4M;sYbtc]N<.wK!KZZgKtFP&C/9[>c-<Y0,a6pA>0+j]KJt%7OrRui~)<A%L4 ');
define('SECURE_AUTH_KEY',  'X#WXSTVK.ErTn]K|g&:U:<v*Ft_L:|XNf ?+/6h|-5|D#b<u4>@LaHUT8o5--9_U');
define('LOGGED_IN_KEY',    'nhY.N<~3_dnb.9jm]|{N(&tC-+vw-PI-@a/6V:S}QU,upB}86hC m7J:9?Eg%+5h');
define('NONCE_KEY',        'QqyjnH!-2O6Ss_@[8R=q`eu?7$x_S~2)*l6505x-!;5:e+IZ?|2b$qEUp$X4BC[w');
define('AUTH_SALT',        '9qY:phPpq|U_IH*nKm|pJBddCc}oFJ:9+_gN6-5vVaO(mz_Os%dq@e||0lCB &+i');
define('SECURE_AUTH_SALT', '3#AbQ=%>L@u;QIfHrso|?U(Z}H]uzAFP/Doxg/PWQ?_7RBt!)g/ 5p|8HcB=Vg|C');
define('LOGGED_IN_SALT',   '{gf5sHmN@&w}+4Q2PEz0DNP/9iqZ.QymiXzQiZ*0R*gT .!J?Pz2L$-zl#@,Qg.{');
define('NONCE_SALT',       '%Q|j>x#3jc*w-a[rx|<iT[kxIJgwD`:},H-+yn}>%&?[|+%14x-B-[nbfv;cDR{(');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

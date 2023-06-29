<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'plugin' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'wordpress' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'wordpress' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6}k<,r/w/V/y{pjm1.$SkuZ@*xO^~@s*xpO&?caAUexfdJ~z5{r~uWS^JQpi/vt%' );
define( 'SECURE_AUTH_KEY',  '1-DYKF&QB#UCkNYq.?a 6{:?RaBBh8GC.^[|+}sWg_TBOmSLxes#^BM][n+J<P[]' );
define( 'LOGGED_IN_KEY',    '`}pckE|q!M&)A1E@#j-ciO&i/N< @Z$I<G5WQf.kf}^y]%#IYj]Q;>_S{gYy<Q[+' );
define( 'NONCE_KEY',        'QJMIq_m@^m$C>Z$mK%J#$q<>A,[1r^c{UxJ&eU6M+7[r{VK/LUkfEr}4_l&gSD@N' );
define( 'AUTH_SALT',        'FV7yu9ReUICSxbgzER],549B:!A=s%:MPzo;O_y1iBFv(50DB*~jGD|vl:~@Yrx>' );
define( 'SECURE_AUTH_SALT', 'cA`]j(@>NO5[RsVy<:/7;i,CVzo6$h~7{nb3,8Ee4]4r(+=e4f*Q05b$cV~&=+GR' );
define( 'LOGGED_IN_SALT',   '6&mu?f4Q|Or-vTl2^&BFYl0c(Q;{g[~n?c]54@Vg$~*)V}$C<@$H(qJ<5SunjObm' );
define( 'NONCE_SALT',       '7}S;4LMwE#[Ebgiyn<w`VT}|WqH~BgD76>3jpMT Fc>dzd!GjASLvU*Jq,&IN7oF' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

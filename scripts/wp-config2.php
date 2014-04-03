<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'carsale');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'a485618455b4d7471a4e708157096232');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Qy!9?H9$P1miTh^)D*P^K>oa~If_:|h4_R@)&?@zie-o+g8EiH4PourdY hNcVUj');
define('SECURE_AUTH_KEY',  '9&yK|Sf|MD!XOmme~#I|D*7-a+pg`$)O3%8o^=@WlSPRRy7mLDz(+u--9x+w`536');
define('LOGGED_IN_KEY',    'o+Z#`RP9_m+:C0C@(N5:2mmI0H?gEm6=+K>|-uFx~F|-o&q(Hg!;[]|3]`( L-&X');
define('NONCE_KEY',        'Ictt!(lXK]n^X)8sZwr+^Z+1b(pfVw6.bkRZ1;=obiD[%[)#M^_g{A`2O8c(|Cd#');
define('AUTH_SALT',        'B#+-+.REYk7l0`Ia#BheP AsqmOJY_/i7p`L5`g`U;Ua,7!GK/O,n0T+q61~!!v ');
define('SECURE_AUTH_SALT', 'jx(]76^SOgI5{A@z&U-|5aQ$r:Jb+VH7|]RdcmR,JQn`z8b+7lk_-k4K?T=[#zI8');
define('LOGGED_IN_SALT',   'X<e6%ko*FH=;6!d{2r*%b-ERmVMWU>4duB).Ws?rwoFxw]FWo/~u9ZJgXJ~zTlRA');
define('NONCE_SALT',       '.Tgle/hJ$08=s>~:3iF!`7B:K(IjAQlRWKX|Ggp2Uxa)#Y2@@;yoC|Duh^%DfY=M');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_novo';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');

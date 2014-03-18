<?php
/**
 * RSS 0.92 Feed Template for displaying RSS 0.92 Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<materias>

<?php while (have_posts()) : the_post(); ?>
<?php 
	$dia = get_the_date('d' );
	$mes = get_the_date('m' );
	$ano = get_the_date('Y' );
	$hora = get_the_date('H' );
	$minuto = get_the_date('i' );
?>
	<materia>
		<data>
			<dia><?php echo $dia; ?></dia>
			<mes><?php echo $mes; ?></mes>
			<ano><?php echo $ano; ?></ano>
			<hora><?php echo $hora; ?></hora>
			<minuto><?php echo $minuto; ?></minuto>
		</data>
		<url><?php the_permalink_rss() ?></url>
		<titulo><?php the_title_rss() ?></titulo>
		<texto><?php the_permalink_rss() ?></texto>
		<linkExterno>S</linkExterno>
	</materia>

<?php endwhile; ?>
</materias>

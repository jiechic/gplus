<?php if (!gplus_is_pjax()) { get_header();?>
<div id="content">
<?php };?>
	<?php the_post(); $options = gplus_get_options(); ?>
	<section class="post-page">
		<h2 class="title"><?php the_title() ?></h2>
		<div class="entry">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page_link"><strong>' . __( 'Pages:' , 'gplus') . '</strong>' , 'after' => '</div>' ) ); ?>
		</div>
	</section>
<?php if (!gplus_is_pjax()) {?>
</div>
<<<<<<< HEAD
<?php get_sidebar() ?>
<?php get_footer() ?>
<?php };?>
=======
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php };?>
>>>>>>> welefen/master

<?php
/*
Template Name: Links
*/
if (!gplus_is_pjax()) { get_header();?>
<div id="content">
<?php };?>
	<?php the_post(); $options = gplus_get_options(); ?>
	<section class="post-page">
		<h2 class="title"><?php the_title() ?></h2>
		<div class="entry">
			<?php wp_list_bookmarks('categorize=1&category_orderby=id&before=<li>&after=</li>&show_images=0&show_description=1&orderby=name&title_before=<h3>&title_after=</h3>'); ?>
			<?php the_content(__('Read more &raquo;','gplus'));?>
			<?php wp_link_pages( array( 'before' => '<div class="page_link"><strong>' . __( 'Pages:' , 'gplus') . '</strong>' , 'after' => '</div>' ) ); ?>
		</div>
	</section>
	<?php comments_template( '', true ); ?>
	
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

<?php 
/*
Template Name: Guestbook
*/
if (!gplus_is_pjax()) { get_header(); ?>
<div id="content">
<?php };?>
	<?php the_post(); $options = gplus_get_options(); ?>
	<section class="post-page">
		<h2 class="title"><?php the_title() ?></h2>
		<div class="entry">		
		<div class="readerwallmain">		
		<!-- start 读者墙  Edited By iSayme-->
			<?php
				$query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 24 MONTH ) AND user_id='0' AND comment_author_email != 'admin@yourdomain.com' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 33";//大家把管理员的邮箱改成你的,最后的这个39是选取多少个头像，大家可以按照自己的主题进行修改,来适合主题宽度
				$wall = $wpdb->get_results($query);
				$maxNum = $wall[0]->cnt;
				foreach ($wall as $comment){
					$width = round(40 / ($maxNum / $comment->cnt),2);//此处是对应的血条的宽度
					if( $comment->comment_author_url )
					$url = $comment->comment_author_url;
					else $url="#";
					$tmp = "<li><a target=\"_blank\" href=\"".$comment->comment_author_url."\"><span class=\"pic\" style=\"background: url(http://www.gravatar.com/avatar/".md5(strtolower($comment->comment_author_email))."?s=36&d=monsterid&r=G) no-repeat;\">pic</span><span class=\"num\">".$comment->cnt."</span><span class=\"name\">".$comment->comment_author."</span></a><div class='active-bg'><div class='active-degree' style='width:".$width."px'></div></div></li>";
					$output .= $tmp;
				}
				$output = "<div class=\"readerwall\">".$output."<div class=\"clear\"></div></div>";
				echo $output ;
			?>
			<!-- end 读者墙 -->
			</div>
			<?php the_content(__('Read more &raquo;','gplus'));?>
			<?php wp_link_pages( array( 'before' => '<div class="page_link"><strong>' . __( 'Pages:' , 'gplus') . '</strong>' , 'after' => '</div>' ) ); ?>
		</div>
	</section>
	<?php comments_template( '', true ); ?>
<?php if (!gplus_is_pjax()) {?>
</div>
<?php get_sidebar() ?>
<?php get_footer() ?>
<?php };?>

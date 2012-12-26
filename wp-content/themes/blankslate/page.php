	<?php get_header(); ?>
	
	<article id="content">
		<?php the_post(); ?>
		<?php if ( is_page('5') ): ?> 
			<div class="flexslider">
				<a class="next">Next</a>
				<div class="left_mask"></div>
				<div class="scrollable">
					<ul>
						<?php
							$argsThumb = array(
								'order'          => 'ASC',
								'post_type'      => 'attachment',
								'numberposts'    => -1,
								'post_parent'    => $post->ID,
								'post_mime_type' => 'image',
								'post_status'    => null
							);
							$attachments = get_posts($argsThumb);
							if ($attachments) {
								foreach ($attachments as $attachment) {
									//echo apply_filters('the_title', $attachment->post_title);
									echo '<li><img src="'.wp_get_attachment_url($attachment->ID, 'fullsize', false, false).'" /></li>';
								}
							}
						?>
					</ul>
				</div>
				<div class="right_mask"></div>
				<a class="prev">Prev</a>
			</div>
			<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.tools.min.js"></script>
			<script>
				/* <![CDATA[ */
				jQuery(document).ready(function($) { 
					$(function() {
						var $scrollables = $('.scrollable').scrollable({
							circular: true,
							speed: 700
						});
						$scrollables.each(function() {
							var $itemsToClone = $(this).scrollable().getItems().slice(1);
							var $wrap = $(this).scrollable().getItemWrap();
							var clonedClass = $(this).scrollable().getConf().clonedClass;
							$itemsToClone.each(function() {
								$(this).clone(true).appendTo($wrap)
									.addClass(clonedClass + ' hacked-' + clonedClass);
							})
						});	
					});
					function masks() {
						var windowWidth = $(window).width(),
							halfWidth = windowWidth / 2,
							offset = halfWidth - 395;
						$('.left_mask').css({
							'width' : offset
						});
						$('.right_mask').css({
							'width' : offset
						});
					}

					function arrows()  {
						var windowWidth = $(window).width(),
							halfWidth = windowWidth / 2,
							offset = halfWidth - 395;
						$('.prev').css({
							'left' : offset - 70
						});
						$('.next').css({
							'right' : offset - 70
						});
					}
					function slider()  {
						var windowWidth = $(window).width(),
							halfWidth = windowWidth / 2,
							offset = halfWidth - 395;
						$('.scrollable ul').css({
							'margin-left' : offset + 23
						});
					}

					$(window).load(function() {
						masks();
						arrows();
						slider();
					});

					$(window).resize(function() {
						masks();
						arrows();
						slider();
					});

				});
				/* ]]> */
			</script>
		<?php endif; ?>
		<?php if ( is_page('7') ): ?> 
			<div class="content_wrap">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="gallery_wrap">
					<span class="filter">Filter By:</span>
					<ul class="tabs">
						<li><a href="#all" title="" class="current">All</a></li>
						<li><a href="#people" title="">People</a></li>
						<li><a href="#places" title="">Places</a></li>
						<li><a href="#homes" title="">Homes</a></li>
					</ul>
					<div class="panes">
						<div id="all" style="display:block;">
							<?php echo do_shortcode('[gallery id="20, 22, 24" link="file" columns="4"]'); ?>	
						</div>
						<div id="people">
							<?php echo do_shortcode('[gallery id="20" link="file" columns="4"]'); ?>	
						</div>
						<div id="places">
							<?php echo do_shortcode('[gallery id="22" link="file" columns="4"]'); ?>	
						</div>
						<div id="homes">
							<?php echo do_shortcode('[gallery id="24" link="file" columns="4"]'); ?>	
						</div>
					</div>
					<a class="show_more">Load More</a>
				</div>
				<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.tools.min.js"></script>
				<script>
					/* <![CDATA[ */
					jQuery(document).ready(function($) { 
						// setup ul.tabs to work as tabs for each div directly under div.panes
						$("ul.tabs").tabs("div.panes > div", {effect: 'fade', fadeOutSpeed: 400});
						//handle overflow content
						var listingHeight = $('div.panes > div:visible .gallery').height();
                        $('div.panes > div').height(608).css({overflow: 'hidden'});
                        var displayHeight = $('div.panes > div').height();
                        if (displayHeight > listingHeight) {
                            $('.show_more').hide();
                        };
                        $('.show_more').click(function(){    
                            if (displayHeight < listingHeight) {
                                var adjustedHeight = displayHeight + 205;
                                $('div.panes > div, div.panes').animate({height: adjustedHeight}, 500);
                                displayHeight = adjustedHeight;
                            } else {
                                //$(this).css({
                                //	'cursor': 'default',
                                //	'opacity': 0.3
                                //});
                            }
                        });
                        //reset if a tab is clicked
                        $("ul.tabs > li").click(function(){
                        	$('div.panes > div').height(608);
                        	$('div.panes').animate({height: 608}, 500);
                        	displayHeight = $('div.panes > div').height();
                        	listingHeight = $('div.panes > div:visible .gallery').height();
                        	if (displayHeight < listingHeight) {
                        		$('.show_more').fadeIn(500);
                        	};
                        });
					});
				</script>
			</div>
		<?php endif; ?>
		<?php if ( is_page('9') ): ?> 
			<div class="content_wrap">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="will_wrap">
					<?php if (get_field('left_column_images') != '') { ?>
						<div class="left_images"><?php the_field('left_column_images'); ?></div>
					<?php }; ?>
					<div class="will_center">
						<?php the_content(); ?>
					</div>
					<?php if (get_field('right_column_quick_facts') != '') { ?>
						<div class="will_right">
							<h4>Quick Facts</h4>
							<?php the_field('right_column_quick_facts'); ?>
						</div>
					<?php }; ?>
				</div>
			</div>	
		<?php endif; ?>
		<?php if ( is_page('14') ): ?> 
			<div class="content_wrap">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="contact_wrap">
					<div class="contact_left">
						<?php the_content(); ?>
						<div class="contact_form">
							<h2>Send Will a Message</h2>
							<?php echo do_shortcode('[xyz-cfm-form id=1]'); ?>
						</div>
					</div>
					<div class="contact_right">
						<iframe width="432" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=503+Faulconer+Drive,+Suite+5+Charlottesville,+VA,+22903&amp;aq=&amp;sll=35.435148,-80.861282&amp;sspn=2.190723,3.80127&amp;ie=UTF8&amp;hq=&amp;hnear=503+Faulconer+Dr+%235,+Charlottesville,+Virginia+22903&amp;t=m&amp;ll=38.050254,-78.524437&amp;spn=0.02298,0.036993&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
						<div class="location">
							<div class="address">
								<h4>Address</h4>
								<?php if (get_field('address') != '') { ?>
									<p><?php the_field('address'); ?></p>
								<?php }; ?>
							</div>
							<div class="phone">
								<h4>Phone</h4>
								<?php if (get_field('phone') != '') { ?>
									<p><?php the_field('phone'); ?></p>
								<?php }; ?>
								<h4>Fax</h4>
								<?php if (get_field('fax') != '') { ?>
									<p><?php the_field('fax'); ?></p>
								<?php }; ?>
							</div>
						</div>
					</div>
				</div>
			</div>	
		
		<?php endif; ?>
	</article>
	
	<?php get_footer(); ?>
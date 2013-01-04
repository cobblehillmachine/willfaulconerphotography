
			</div>
		</div>
		<footer>
			<nav>
				<a href="<?php echo get_page_link(7); ?>" title="Portfolio" <?php if ( is_page('7') ) { ?> class="active" <?php }; ?>>Portfolio</a>
				<a href="<?php echo get_page_link(9); ?>" title="Meet Will" <?php if ( is_page('9') ) { ?>  class="active" <?php }; ?>>Meet Will</a>
				<a href="http://www.centralvapropertyexpert.com" title="Real Estate" target="_self">Real Estate</a>
				<a href="http://www.centralvapropertyexpert.com/blog" title="Blog" target="_self">Blog</a>
				<a href="<?php echo get_page_link(14); ?>" title="Contact" <?php if ( is_page('14') ) { ?>  class="active" <?php }; ?>>Contact</a>
			</nav>
			<ul class="social">
				<li><a href="https://www.twitter.com/willfaulconer" title="Will Faulconer on Twitter" class="tw" target="_blank">Will Faulconer on Twitter</a></li>
				<li><a href="http://www.facebook.com/CentralVARealtor" title="Will Faulconer on Facebook" class="fb" target="_blank">Will Faulconer on Facebook</a></li>
				<li><a href="http://www.instagram.com//jwfaulconer" title="Will Faulconer on Instagram" class="in" target="_blank">Will Faulconer on Instagram</a></li>
			</ul>
			<a href="http://www.cobblehilldigital.com" title="cobble hill digital" class="cb" target="_blank">site by cobble hill</a>
		</footer>
		<script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-37354511-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
		<?php wp_footer(); ?>
	</body>
</html>
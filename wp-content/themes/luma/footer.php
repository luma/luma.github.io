<footer class="pageFooter">
<div class="lf w6c">
<div class="lu w3c first-child">
<h3>SEARCH</h3>
<?php get_search_form(); ?>
<!--/.lu .w2c--></div>
<div class="lu w1c vcard">
<h3>CONTACT</h3>
<span class="fn">Rolly Fordham</span><br />
<a class="email" href="mailto:rolly@luma.co.nz">rolly@luma.co.nz<br /></a>
<span class="tel">+64-21-265-2749</span><br />
<a class="url" href="<?php bloginfo('siteurl'); ?>/contact/">Contact</a>
<!--/.lu .w1c--></div>
<div class="lu w1c">
<h3>MEET ME ON</h3>
<ul>
<li><a href="http://twitter.com/rollyfordham"><img src="<?php bloginfo('template_url'); ?>/img/footer_externalservice_twitter.gif" alt="twitter" /></a></li>
<li><a href="http://www.linkedin.com/companies/luma_777675"><img src="<?php bloginfo('template_url'); ?>/img/footer_externalservice_linkedin.png" alt="LinkedIn" /></a></li>
</ul>
<!--/.lu .w1p--></div>
<div class="lu w1c">
<h3>CODE</h3>
<ul>
<li><a href="http://github.com/luma/">http://github.com/luma/</a></li>
<li><a href="http://github.com/luma/exchange-rates-generator">Exchange Rate Generator</a></li>
</ul>
<!--/.lu .w1p--></div>
<!--/.lf .w6c--></div>
<div class="footerBottom">
<nav class="footerNav">
<ul>
<li<?php if (is_home()) { ?> class='current-page'<?php } ?>><a href="<?php bloginfo('siteurl'); ?>/">Home</a></li>
<li class='first-item<?php if (is_page('Who Are We')) { ?> current-page<?php } ?>'><a href="<?php bloginfo('siteurl'); ?>/who-are-we/">Who Are We</a></li>
<li<?php if (is_page('What We Do')) { ?> class='current-page'<?php } ?>><a href="<?php bloginfo('siteurl'); ?>/what-we-do/">What We Do</a></li>
<li<?php if (is_category('Portfolio') || in_category('7') && !is_single()) { ?> class='current-page'<?php } ?>><a href="<?php bloginfo('siteurl'); ?>/portfolio/">Our Work</a></li>
<li>
	<?php if ( is_page('Our Thoughts') ) {?>
	<li><em><a href="<?php bloginfo('siteurl'); ?>/thoughts/">Our Thoughts</a></em></li>
	<?php }else{?>
	<li><a href="<?php bloginfo('siteurl'); ?>/thoughts/">Our Thoughts</a></li>
	<?php }?>
</li>
<li class='last-item<?php if (is_page('Contact')) { ?> current-page<?php } ?>'><a href="<?php bloginfo('siteurl'); ?>/contact/">Get in Touch</a></li>
</ul>
</nav>

<div class="copyright">&copy; Luma Ltd 2010.</div>
<!-- /.footerBottom --></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
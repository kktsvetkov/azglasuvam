﻿
	</div>

	<div id="footer">

		<ul class="top">
			<li><a href="<?php echo get_option('home'); ?>/">Начало</a></li>
			<li><a href="/za-proekta/">За проекта</a></li>
			<li><a href="/blog/">Блог</a></li>
			<li><a target="_blank" href="http://twitter.com/azglasuvam">Twitter</a></li>
			<li><a target="_blank" href="http://www.facebook.com/pages/Az-Glasuvam/95123228487">Facebook</a></li>
			<li><a target="_blank" href="http://bulgariaenasha.blogspot.com/">България е наша!</a></li>
			
		</ul>

		<p class="copyright">
			<a href="http://creativecommons.org/licenses/by-sa/2.5/bg/"
				rel="license" class="license"><img
					src="http://creativecommons.org/images/public/somerights20.png"
					alt="Creative Commons License"/></a>
		При изготването на проекта са използвани мненията на хора, които
		запазват авторските права върху изпратените ни текстове. Ако желаете
		да ги използвате, свържете се с автора, или ако това ви затруднява,
		обърнете се към нас за да ви съдействаме в осъществяването на
		контакт. Всички остнали текстове в проекта са под Криейтив Комънс лиценз <a
			href="http://creativecommons.org/licenses/by-sa/2.5/bg/"
			rel="license">&quot;Признание-Споделяне на споделеното&quot;</a>.
		</p>

		<ul class="middle">
			<li><a href="/poslaniya/">Всички послания</a></li>
			<li><a href="/baneri/">Банери + Значки</a></li>
			<li><a href="/razprostrani-poslaniyata/">Разпространи посланията</a></li>
			<li><a href="/napishi-poslanie/">Изпрати послание</a></li>
		</ul>
		
		<ul class="bottom">
			<li class="first"><a href="http://az-glasuvam.com" title="Аз Гласувам!"><img
				src="<?php bloginfo('stylesheet_directory'); ?>/9.png" alt="Аз Гласувам!"/></a>
				e проект на <a href="http://kaloyan.info/">Калоян К. Цветков</a></li>
			<li><a title="Изграден благодарение на WordPress" href="http://wordpress.org/">WordPress <?php echo $wp_version; ?></a></li>
			<li>Версия <?php echo $GLOBALS['az_glasuvam']->version; ?></li>
		</ul>
		
	</div>
</div></div>

<div id="void">
	
	<?php wp_footer(); ?>

	<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->

</div>

</body>
</html>
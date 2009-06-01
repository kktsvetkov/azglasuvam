 -->
	<div id="sidebar">

		<div class="block">
			<h4 id="za_proekta">За проекта</h4>

			<p>Научете повече за идеите и целите на проекта за насърчаване на гласуването на предстоящите парламентарни избори и избори за европейски парламент.</p>

			<ul>
				<li><a href="/za-proekta/">научете повече&hellip;</a></li>
				<li><a href="/poslaniya/">вижте всички послания</a></li>
				<li><a href="/blog/">разгледайте блога</a></li>
			</ul>

		</div>
		
		<div class="block">
			<h4 id="podkrepete_proekta">Подкрепете проекта!</h4>

			<p>Ако желаете да подкрепите идеята и да помогнете на проекта,
			ето няколко различни начина да го направите: може да поставите
			специален код на сайта ви който представя посланията, може да
			сложете банер или значка на вашия блог, или просто може да
			публикувате връзка към "Аз Гласувам!".</p>

			<ul>
				<li><a href="/razprostrani-poslaniyata/#HTML">HTML код за посланията</a></li>
				<li><a href="/razprostrani-poslaniyata/#WordPress">WordPress плъгин за посланията</a></li>
				<li><a href="/baneri/#baneri">галерия с банери</a></li>
				<!-- li><a href="#">галерия със значки</a></li -->
				<li><a href="/razprostrani-poslaniyata/">научете повече&hellip;</a></li>
			</ul>
		</div>
		
		<div class="block">
			<h4 id="uchastvajte_v_proekta">Участвайте в проекта!</h4>
			<p>
			Проектът е отворен за всички, които са споделят идеята на проекта и искат да помогнат.
			Ето няколко начина по които може да го направите
			</p>

			<ul>
				<li><a href="/napishi-poslanie/">напишете послание</a></li>
				<li><a href="/napravi-baner/">направете банер или значка</a></li>
				<li><a href="http://www.facebook.com/pages/Az-Glasuvam/95123228487">споделете вашето мнение</a></li>
				<li><a href="http://www.facebook.com/group.php?gid=61202997957">участвайте в "България е наша"</a></li>
				<li><a href="http://www.facebook.com/group.php?gid=35856346796">участвайте в "Аз ще гласувам!"</a></li>
				<li><a href="http://www.facebook.com/group.php?gid=55856583982">участвайте в "Гласувай за България"</a></li>
			</ul>
		</div>
		
		<div class="block">
			<h4 id="sledete_kakvo_stava">Следете какво става</h4>
			<p>Ако желаете да следите какво става използвайте следните варианти:</p>
			<ul class="blog">
				<li><a href="http://favit.bg/groups/v/izbori-2009/">Избори 2009 @ Favit</a></li>
				<li><a href="http://svejo.net/home/channel/izbori_2009">Избори 2009 @ Svejo.net</a></li>
				<li><a href="http://is.gd/wRI3">Twitter #izbori2009</a></li>
				<li><a href="http://is.gd/wRJ0">Edno23 #izbori2009</a></li>
				<li><a href="http://izbori.biz/">Избори 2009 | izbori.biz</a></li>
				<li><a href="http://izbori2009.eu/">Izbori2009.eu</a></li>
				
			</ul>
		</div>

		<div class="block">
			<h4 id="posledno_v_bloga">Последно в блога</h4>

			<p>Разгледайте последното и най-новото около събитията и новинита за проекта.</p>

			<ul>
			<?php global $az_glasuvam; $wp_query = new WP_Query('posts_per_page=10'); while (have_posts()) : the_post(); ?>
				<li>
				<a href="<?php the_permalink(); ?>" rel="bookmark"
						title="<?php printf(__('Permanent Link to %s', 'kubrick'), $t = the_title_attribute('echo=0')); ?>">
					<?php echo $az_glasuvam->utf8_truncate($t, 32); ?></a>
				</li>
			<?php endwhile; ?>
			</ul>

		</div>


	</div>
<? // временное для запрета входа для всех юзеров
	if (!isset($_COOKIE['auth_key']) OR !trim($_COOKIE['auth_key']))
	{
	     if (isset($_POST['f_pass']) AND ($_POST['f_pass']=='passgeek36found;'))
	     {
	        setcookie('auth_key', time(), time() + 60*60*24);
	        Header('Location: http://nikbelikov.ru');
	     }
	     die('<html><head><title>AUTH</title></head><body><h3>Auth required</h3><form action="" method="post"><input type="password" name="f_pass" value="" /><input type="submit" value="Enter"></form></body></html>');
	}
	else
	{
	     if (isset($_GET['bye']) AND ($_GET['bye']=='bye'))
	     {
	        setcookie('auth_key', NULL, -1);
	        Header('Location: http://nikbelikov.ru');
	     }
	}
?>

<?php get_header(); ?>

		<section class="main-container contacts-container">
			<section id="contacts">
				<div class="close">&times;</div>
				<div class="content">
					<div class="block">
						<h1>Написать мне</h1>
						<?php echo do_shortcode( '[contact-form-7 id="32" title="Написать мне"]' ); ?>
					</div>
					<div class="block">
						<h1>Контакты</h1>
						<iframe width="547" height="349" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ru/?ie=UTF8&amp;t=m&amp;ll=54.213861,48.405762&amp;spn=4.484577,11.99707&amp;z=6&amp;output=embed"></iframe>
					</div>
				</div>
				<hr>
				<div class="copyright"><? echo date('Y'); ?> (c) - nikbelikov.ru</div>
			</section>
		</section>

		<section id="wrapper" class="bg01">
			<section class="main-container">
				<header id="header">
					<a href="/" id="sitename">nikbelikov.ru</a>

					<nav>
						<ul>
							<li><span id="menu-portfolio">Портфолио</span>
							<?/*<li><span id="menu-blog">Блог</span>*/?>
							<li><span id="menu-contacts">Контакты</span>
						</ul>
					</nav>

					<div id="icon-refresh" class="icon-refresh"></div>
				</header><!-- #header-->

				<section id="content">
					<i id="icon-angle-down" class="icon-angle-down"></i>
					<div id="frontend" class="frontend"><span>Front.</span>End</div>
					<div class="vert-line white"></div>
				</section><!-- #content-->
			</section>
		</section><!-- #wrapper -->

		<section class="main-container portfolio-container">
			<section id="portfolio">
				<div class="close">&times;</div>
				<div class="content">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="block">
							<h1><?php the_title(); ?></h1>
							<span class="desc"><?php the_content(); ?></span>
							<a href="
							<?php
								$link = get_post(get_post_thumbnail_id())->post_excerpt;
								if($link != ''){
									echo $link;
								}
								else{
									echo 'javascript:void(0);';
								}
							?>
							" target="_blank"><?php the_post_thumbnail('large'); ?></a>
							<div class="about-work">
								<? /*
									<i class="icon-puzzle-piece"></i>Часть верстки и скриптов
									<i class="icon-bug"></i>Исправления багов
									<i class="icon-coffee"></i>Разработка
									<i class="icon-pencil"></i>Дизайн
									<i class="icon-bolt"></i>Скрипты
									<i class="icon-th"></i>Верстка
								*/ ?>
								<? $thumb_title = get_post(get_post_thumbnail_id($id))->post_title;
									echo $thumb_title; ?>
							</div>
						</div>
					<?php endwhile;?>
					<?php endif; ?>

				</div>
				<hr>
				<div class="copyright"><? echo date('Y'); ?> (c) - nikbelikov.ru</div>
			</section>
		</section>

		<img id="hidden-img" src="/wp-content/themes/twentyten/img/summer/bg1.jpg" alt="hidden-img">

<?php get_footer(); ?>
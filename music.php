<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
		$song_count = 5678;
		$song_hours = 123;
		echo
			"I love music.
			I have $song_count total songs,
			which is over $song_hours hours of music!"
		 ?>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

			<ol>
				<?php
				$date = array("2019-11", "2019-10", "2019-09", "2019-08", "2019-07");
				if (isset($_GET['newspages'])==0) {
					for ($news_pages=201911, $i = 0; $news_pages >= 201907; $news_pages--) {
						echo "<li><a href=\"https://www.billboard.com/archive/article/$news_pages\">$date[$i]</a></li>";
						$i = $i + 1;
					}
				} else if (isset($_GET['newspages'])!=0) {
					for ($news_pages=201911, $i = 0; $news_pages >= 201907 + (count($date) - (int)$_GET['newspages']); $news_pages--) {
						echo "<li><a href=\"https://www.billboard.com/archive/article/$news_pages\">$date[$i]</a></li>";
						$i = $i + 1;
					}
				}
				 ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
				$favorite_songs =file("favorite.txt");
				sort($favorite_songs);
				for ($i=0; $i < count($favorite_songs); $i++) {
				echo "<li><a href=\"http://en.wikipedia.org/wiki/$favorite_songs[$i]\">$favorite_songs[$i]</a></li>";
				}
				 ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$list = glob("lab5/musicPHP/songs/*.mp3");
				for ($i=0; $i < count($list); $i++) {
					$filesize = floor(filesize($list[$i])/1024);
					echo "<li class=\"mp3item\"><a href=$list[$i] download>".basename($list[$i])."</a>".' ('.$filesize.'KB)'."</li>";
				}
				$play_list = glob("lab5/musicPHP/songs/*.m3u");
				foreach ($play_list as $listname) {
					echo "<li class=\"playlistitem\">".basename($listname)."</li>";
				}
				?>

				<!-- Exercise 8: Playlists (Files) -->

			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>

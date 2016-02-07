<?php
	// PONGSOCKET TWEET ARCHIVE
	// twtxt format export
	
	require "inc/preheader.php";

	header('Content-type: text/plain; charset=utf-8');
	$q = $db->query("SELECT `".DTP."tweets`.*, `".DTP."tweetusers`.`screenname`, `".DTP."tweetusers`.`realname`, `".DTP."tweetusers`.`profileimage` FROM `".DTP."tweets` LEFT JOIN `".DTP."tweetusers` ON `".DTP."tweets`.`userid` = `".DTP."tweetusers`.`userid` ORDER BY `".DTP."tweets`.`time` DESC");

	while($tweet = $db->fetch($q)){
		$date = date(DATE_ISO8601, $tweet['time']);
		$text = str_replace("\n", ' ', $tweet['text']);
		printf("%s\t%s\n", $date, $text);
	}
?>

<?php

/*
$redis = new Redis;
$redis->connect('127.0.0.1', 6379);
$redis->set("myfirst", 200);

$result = $redis->get('myfirst');
var_dump($result);
*/

$times = 200;
while($times-- > 0){
	$pid = pcntl_fork();
	if($pid > 0){
		test();
		exit;
	}
	
}

function test(){
	usleep(50000);
	$redis = new Redis;
	$redis->connect('127.0.0.1', 6379);
	$left = $redis->get("myfirst");
	if($left > 0){
		$redis->decr('myfirst');
		echo 'succ'."\n";
	}else{
		echo 'failed'."\n";
	}
	exit();
}



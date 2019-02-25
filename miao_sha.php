<?php

/*
version 1
手动设置redis的key，myfirst为10，也就是模拟200个人抢10个商品
发现结果中有超过10个succ，也就是超发了
*/

/*
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
*/


/*

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
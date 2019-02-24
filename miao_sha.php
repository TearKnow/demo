<?php


$redis = new Redis;
$redis->connect('127.0.0.1', 6379);
$redis->set("myfirst", 'myfirstvalue');

$result = $redis->get('myfirst');
var_dump($result);

$times = 5;
while($times-- > 0){
	$pid = pcntl_fork();
	if($pid > 0){
		test();
		exit;
	}
	
}

function test(){
	sleep(5);
	echo 123;
}
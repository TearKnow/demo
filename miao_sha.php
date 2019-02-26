<?php

/*
version 1
手动设置redis的key，myfirst为10，也就是模拟200个人抢10个商品
发现结果中有超过10个succ，也就是超发了
乐观锁 就是watch后被修改，就会失败
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
 version 2
使用redis的事物 加redis的乐观锁。这里有个有趣的事情，反而会还剩库存，因为200个进程里成功的只有8个，所以还有2个库存
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
    
    $redis->watch("myfirst");
    
    //sleep(5);
    
    $redis->multi();
    $redis->decr('myfirst');
    if($redis->exec() && $left > 0){
        echo 'succ'."\n";
    }else{
        echo 'failed'."\n";
    }
    
    
	exit();
}
*/
    
    
//如何解决 version 2 中的问题呢
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
    
    $redis->watch("myfirst");
    
    $left = $redis->get("myfirst");
    
    echo $left."\n";
    
    $redis->multi();
    $redis->decr('myfirst');
    if($redis->exec() && $left > 0){
        echo 'succ'."\n";
    }else{
        echo 'failed'."\n";
    }
    
    
    exit();
}
    

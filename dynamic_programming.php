<?php
//动态规划的例子
/**
	1 2 4 1 7 8 3 要求在这几个数据中取的和最大，但是每两个之间不能在一起，必须要相隔至少一个
	
	选第n个，那么选opt(n-2) +v(n)，如果不选n，那么opt(n-1)。在这2个之间选一个最大值
	
	这个属于重叠子问题，不必要算重复的项，所以没有用递归来做，反过来算，从小的来算
*/

$arr = array(1, 2, 4, 1, 7, 8, 3);

$opt[0] = $arr[0];
$opt[1] = max($arr[0], $arr[1]);

for($i = 2; $i < count($arr); $i++){
	$select = $opt[$i - 2] + $arr[$i];
	$notSelect = $opt[$i - 1];
	$max = max($select, $notSelect);
	$opt[$i] = $max;
}

//var_dump($opt);


//例子二，这是一个递归的方法，在 [3, 34, 12, 4, 2, 5, 11] 中找到是否存在组合为 9 的情况
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!每次都依赖上一个!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//也用选和不选，还有一个就是要找出口
$arr = [3, 34, 12, 4, 2, 5];
function test($arr, $i, $target){
	if($target == 0){//下面是2个出口
        return true;
	}
	if($i == 0){
        return $arr[0] == $target;
	}

	return test($arr, $i - 1, $target - $arr[$i]) || test($arr, $i - 1, $target);
}

$result = test($arr, 5, 26);
var_dump($result);

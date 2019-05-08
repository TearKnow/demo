<?php
    //动态规划的例子
    //都是先求出小的问题，由小的问题来解决大的问题
    
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
    //$result = test($arr, 5, 26);
    //var_dump($result);

    
    //例子三 用动态规划的方法来做例子二(/Users/jack/videos/algorithm 动态规划 第二讲)
    //主要思想就是判断sub(5, 9)是否为true，从0开始的，0至5，这个表达式的意思就是在6个数字中判断是否存在和为9的数字

    
    $arr = [3, 34, 12, 4, 2, 5];
    $map[0][0] = true;
    $map[0][3] = true;
    $map[1][0] = $map[2][0] = $map[3][0] = $map[4][0] = $map[5][0] = true;
    
    function sub($i, $target){
        global $arr;
        global $map;
        for($m = 1; $m<=$i; $m++){
            for($n = 1; $n<=$target; $n++){
                $a = isset($map[$m-1][$n-$arr[$m]]) && $map[$m-1][$n-$arr[$m]] ? true : false;//选
                $b = isset($map[$m-1][$n]) && $map[$m-1][$n] ? true : false;//不选
                $map[$m][$n] = $a || $b;
                
            }
        }
        return $map;
    }

    $result = sub(5, 9);
    var_dump($result);

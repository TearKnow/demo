<?php

    //斐波那契数列的实现

    //此方法会计算很多重复项
    function fib($n){
        if($n == 0){
            return 0;
        }if($n == 1){
            return 1;
        }else{
            return fib($n - 1) + fib($n - 2);
        }
    }
    
    //echo fib(17);//12=>144, 17=>1597
    

    //算fib（10） 的时候，从fib（0） fib（1） 依次累加上去。不然从fib（10） fib（9） 这样计算有很多重复的
    function fib_optimize($n){
        $first = 0;
        $two = 1;
        for($i = 0; $i <= $n - 2; $i++){
            $result = $first + $two;
            $first = $two;
            $two = $result;
            echo $result."\n";
        }
    }

    echo fib_optimize(17);

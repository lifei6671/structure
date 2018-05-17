<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 15:55
 */


/***
 * 有一对兔子,从出生后第3个月起每个月都生一对兔子,小兔子长到第三个月后每个月又生一对兔子,假如兔子都不死,请编程输出两年内每个月的兔子总数为多少?
 * @param int $month
 */
function rabbit($month)
{
    $one = 1;
    $two = 1;
    $sum = 0;
    if ($month < 3) {
        return;
    }
    for ($i = 2; $i < $month; $i++) {
        $sum = $one + $two;
        $one = $two;
        $two = $sum;
    }
    echo $month . '个月后共有' . $sum . '对兔子';
}


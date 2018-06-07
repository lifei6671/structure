<?php
/**
 * Created by PhpStorm.
 * User: minho
 * Date: 2018/6/7
 * Time: 17:47
 */

/**
 * 对数组排序
 * @param $arr
 * @param $left
 * @param $right
 * @return mixed
 */
function division(&$arr,$left,$right){
    $base = $arr[$left];

    while ($left < $right){
        while ($left < $right && $arr[$right] <= $base){
            $right--;
        }
        $arr[$left] = $arr[$right];
        while ($left < $right && $arr[$left] >= $base){
            $left ++;
        }
        $arr[$right] = $arr[$left];
    }
    $arr[$left] = $base;
    return $left;
}

function fastSort(&$arr,$left,$right){

    if($left < $right){
        $base = division($arr,$left,$right);

        fastSort($arr,$left,$base - 1);
        fastSort($arr,$base + 1, $right);
    }

}

$arr = array(6,3,8,6,4,2,9,5,1);

fastSort($arr,0,count($arr));
print_r($arr);
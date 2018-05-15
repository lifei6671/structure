<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 16:20
 */

/**
 * 二分法查找
 * @param array $array
 * @param int $value
 * @return bool|float|int
 */
function binary_search($array,$value){
    $left = 0;
    $right = count($array) - 1;

    while ($left <= $right){
        $mid = intval(($left + $right)/2);
        echo sprintf('v = %s, left = %s, mid = %s, right = %s',$array[$mid],$left, $mid ,$right),PHP_EOL;
        //如果中间位置的值大于查找的值，说明值在左侧
        if($array[$mid] > $value){
            $right = $mid - 1;
        }elseif ($array[$mid] < $value){
            $left = $mid + 1;
        }else{
            return $mid;
        }
    }
    return false;
}

//docker exec -it docker_php7phalcon_1 php /mnt/hgfs/structure/binary_search.php


$arr = array(0,1,2,3,4,5,6,7,8,9);

var_dump(binary_search($arr,5));
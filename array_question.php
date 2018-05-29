<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 8:51
 */

/**
 * 使用递归数组求和
 * 给定一个含有n个元素的整型数组a，求a中所有元素的和。
 * @param array $array
 * @param int $n
 * @return int
 */
function sum(array &$array,$n){
    return $n ? 0 : sum($array,$n - 1) + $array[$n - 1];
}

/**
 * 求数组的最大值和最小值
 * 给定一个含有n个元素的整型数组a，找出其中的最大值和最小值
 * @param array $array
 * @return array|bool
 */
function searchMaxAndMinValue(array $array){
    if(empty($array)){
        return false;
    }
    $len = count($array);
    if($len == 1){
        return array('max' => $array[0],'min' => $array[0]);
    }
    $max = $array[0];
    $min = $array[0];

   for($i = 1; $i < $len ; $i ++){
       if($array[$i] > $max){
           $max = $array[$i];
       }
       if($array[$i] < $min){
           $min = $array[$i];
       }
   }

   return array('max' => $max,'min' => $min);
}

/**
 * 求数组中出现次数超过一半的元素
 * 给定一个n个整型元素的数组a，其中有一个元素出现次数超过n / 2，求这个元素。据说是百度的一道题
 * @param array $array
 * @return int
 */
function find(array $array){

    $len = count($array);

    for($i = 1;$i < $len; $i++){
        $temp = $array[$i];
        for($j = $i - 1; $j >= 0 && $array[$j] > $temp; $j--){
            $array[$j + 1] = $array[$j];
        }
        $array[$j + 1] = $temp;
    }

    return $array[intval($len / 2)];
}


/**
 * 求两个有序数组的共同元素
 * 给定两个含有n个元素的有序（非降序）整型数组a和b，求出其共同元素，比如
 * a = 0, 1, 2, 3, 4
 * b = 1, 3, 5, 7, 9
 * 输出 1, 3
 *
 * @param array $array1
 * @param array $array2
 * @return array
 */
function arrayIntersect(array $array1, array $array2){
    $i = 0;
    $j = 0;
    $array3 = array();
    while ($i < count($array1) && $j < count($array2)){
        if($array1[$i] > $array2[$j]){
            $j ++;
        }elseif ($array1[$i] == $array2[$j]){
            $array3[] = $array2[$j];
            $i ++;
            $j ++;
        }else{
            $i++;
        }
    }
    return $array3;
}
//docker exec -it docker_php7phalcon_1 php /mnt/hgfs/github.com/structure/array_question.php


/**
 * 最大子段和
 * 给定一个整型数组a，求出最大连续子段之和，如果和为负数，则按0计算，比如1， 2， -5， 6， 8则输出6 + 8 = 14
 * @param array $array
 * @param int $len
 * @return int|mixed
 */
function continuousMaxSum(array $array,$len){
    $curSum = 0;
    $maxSum = 0;

    for($i = 0; $i < $len; $i ++){
        if($curSum + $array[$i] < 0){
            $curSum = 0;
        }else{
            $curSum += $array[$i];
            $maxSum = max($curSum,$maxSum);
        }
    }
    return $maxSum;
}


function continuousMaxProduct(array $array,$n){
    $curProduct = 1;
    $maxProduct = 1;

    for($i = 0; $i < $n; $i++){
       if($array[$i] < 0){

       }
    }
    return $maxProduct;
}

function printArrayTree($array,$level = 1){
       foreach ($array as $item){
           echo str_pad(' ',$level) , $item['name'],PHP_EOL;
           if(empty($item['children'])){
               printArrayTree($item['children'],$level++);
           }
       }
}






















<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 14:52
 */

/**
 * Fisher–Yates随机置乱算法也被称做高纳德置乱算法，通俗说就是生成一个有限集合的随机排列。
 * Fisher-Yates随机置乱算法是无偏的，所以每个排列都是等可能的，当前使用的Fisher-Yates随机置乱算法是相当有效的，需要的时间正比于要随机置乱的数，不需要额为的存储空间开销。
 * @param array $array
 * @return array
 * docker exec -it docker_php7phalcon_1 php /mnt/hgfs/github.com/structure/shuffle.php
 */
function array_shuffle(array $array){
    $i = 0;
    $len = count($array);

    while ($i < $len){
        $index = rand($i,$len - 1);
        $temp = $array[$index];
        $array[$index] = $array[$i];
        $array[$i] = $temp;
        $i ++;
    }
    return $array;
}

$arr = range(1,52);

print_r(array_shuffle($arr));
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 15:22
 */

/***
 * 从n个数中选取m（m<=n）个数按照一定的顺序进行排成一个列，叫作从n个元素中取m个元素的一个排列。由排列的定义，显然不同的顺序是一个不同的排列。从n个元素中取m个元素的所有排列的个数，称为排列数。从n个元素取出n个元素的一个排列，称为一个全排列。全排列的排列数公式为n!，通过乘法原理可以得到。
 * @param array $array
 * @param array $result
 * @param int $index
 * @param int $end
 */
function fullPermutation(array $array,array &$result, $index, $end)
{
    //递归最重要的是输出或者结束条件，当index到达最后，说明所有值以交换一遍
    if ($index == $end) {
        $result[] = $array;
    }
    for ($i = $index; $i <= $end; $i++) {
        //index位置和i位置交换
        list($array[$i], $array[$index]) = array($array[$index], $array[$i]);
        fullPermutation($array, $result,$index + 1, $end);
        //换回，不影响其他递归的继续
        list($array[$i], $array[$index]) = array($array[$index], $array[$i]);
    }
}

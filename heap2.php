<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11 0011
 * Time: 16:10
 */


function swap(&$a,&$b)
{
    $a = $a ^ $b;
    $b = $a ^ $b;
    $a = $a ^ $b;
}

function adjustNode(&$array ,$parent,$length)
{
    $child = $parent * 2 + 1;

    if($child + 1 < $length && $array[$child] < $array[$child + 1]){
        $child++;
    }
    if($array[$child] > $array[$parent]){
        swap($array[$child],$array[$parent]);
        adjustNode($array,$child,$length);
    }
}

function headSort(&$array)
{
    // 最后一个蒜素位
    $last = count($array);
    // 堆排序中常忽略$arr[0]
    array_unshift($array, 0);
    // 最后一个非叶子节点
    $i = $last>>1;
    // 整理成最大堆，最大的数放到最顶，并将最大数和堆尾交换，并在之后的计算中，忽略数组最后端的最大数(last)，直到堆顶（last=堆顶）
    while(true){
        adjustNode($i, $last, $array);
        if( $i>1 ){
            // 移动节点指针，遍历所有节点
            $i--;
        }
        else{
            // 临界点$last=1，即所有排序完成
            if( $last==1 ){
                break;
            }
            swap($array[$last],$array[1]);
            $last--;
        }
    }
    // 弹出第一个元素
    array_shift($array);
}

$array = [16,14,10,8,7,9,3,2,4,1];

headSort($array);

echo implode(' ',$array);















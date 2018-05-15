<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 13:10
 */

//快速排序
class QuickSort
{
    protected $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function sort()
    {
        return $this->quickSort($this->array);
    }

    private function quickSort($arr)
    {
        if(!is_array($arr)){
            return false;
        }
        if(count($arr) <= 1){
            return $arr;
        }

        $left = $right = array();
        for($i = 1,$len = count($arr);$i < $len;$i++){
            if($arr[$i] < $arr[0]){
                $left[] = $arr[$i];
            }else{
                $right[] = $arr[$i];
            }
        }
        $left = $this->quickSort($left);
        $right = $this->quickSort($right);

        $left[] = $arr[0];

        return array_merge($left,$right);
    }
}

//docker exec -it docker_php7phalcon_1 php /mnt/hgfs/structure/quick_sort.php

$arr = array(6,3,8,6,4,2,9,5,1);

$quick = new QuickSort($arr);

echo implode(' ',$quick->sort());
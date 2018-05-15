<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11 0011
 * Time: 10:58
 */

/**
 * 归并排序
 */
class MergeSort
{
    protected $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function merge($low,$mid,$high)
    {
        fwrite(STDOUT,sprintf('$low = %s $mid = %s $high = %s', $low ,$mid,$high . "\n"));

        $i = $low;
        $j = $mid + 1;
        $k = 0;
        $tempArray = array();

        while ($i <= $mid && $j <= $high){
            if($this->array[$i] <= $this->array[$j]) {
                $tempArray[$k] = $this->array[$i];
                $i++;
                $k++;
            }else{
                $tempArray[$k] = $this->array[$j];
                $j++;
                $k++;
            }
        }

        while ($i <= $mid){
            $tempArray[$k] = $this->array[$i];
            $i++;
            $k++;
        }
        while ($j <= $high){
            $tempArray[$k] = $this->array[$j];
            $j++;
            $k++;
        }
        for($i = $low,$k = 0;$i <= $high;$i++,$k++){
            $this->array[$i] = $tempArray[$k];
        }
    }
    public function sort()
    {
        $length = count($this->array);

        for ($gap = 1; $gap < $length; $gap += $gap ) {
            // 归并gap长度的两个相邻子表
            for ($i = 0; $i + 2 * $gap - 1 < $length; $i = $i + 2 * $gap) {
                $this->merge( $i, $i + $gap - 1, $i + 2 * $gap - 1);
            }

            // 余下两个子表，后者长度小于gap
            if ($i + $gap - 1 < $length) {
                fwrite(STDOUT,"aaa=".$i ."gap=" .$gap. "\n");
                $this->merge($i, $i + $gap - 1, $length - 1);
            }
        }

    }

    public function printAll()
    {
        foreach ($this->array as $value){
            fwrite(STDOUT,$value . "\t");
        }
        fwrite(STDOUT,"\n");
    }
}
//docker exec -it docker_php7phalcon_1 php /mnt/hgfs/structure/heap.php

$array = array(4,3,7,9,2,8,6,5,11,1);

$merge = new MergeSort($array);

$merge->sort();

$merge->printAll();











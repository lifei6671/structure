<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 13:29
 */

class SelectionSort
{
    protected $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function sort()
    {
        $len = count($this->array);

        for($i = 0;$i < $len - 1; $i++){
            $m = $i;
            for($j = $i + 1; $j < $len; $j++){
                if($this->array[$m] > $this->array[$j]){
                    $m = $j;
                }
            }
            if($m != $i){
                $temp = $this->array[$m];
                $this->array[$m] = $this->array[$i];
                $this->array[$i] = $temp;
            }
        }

        return $this->array;
    }

    public function __toString()
    {
        return implode(' ',$this->array);
    }
}

/**
 * 选择排序
 * @param array $array
 * @return mixed
 */
function selectSort($array){
    for($i = 0,$len = count($array); $i < $len; $i ++){
        $current = $i;

        for($j = $i + 1; $j < $len; $j++){
            if($array[$current] > $array[$j]){
                $current = $j;
            }
        }
        if($current != $i){
            $temp = $array[$current];
            $array[$current] = $array[$i];
            $array[$i] = $temp;
        }
    }
    return $array;
}


//docker exec -it docker_php7phalcon_1 php /mnt/hgfs/structure/selection_sort.php


$array = array(9, 1, 2, 5, 7, 4,52,15,64,12,54,254);

print_r(selectSort($array));





























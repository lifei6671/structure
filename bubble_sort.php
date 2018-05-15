<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 13:22
 */

/**
 * 冒泡排序
 */
class BubbleSort
{
    protected $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function sort()
    {
        $len = count($this->array);

        for($i = 0;$i < $len;$i++){
            for($j = $i + 1;$j < $len; $j ++){

                if($this->array[$i] > $this->array[$j]){
                    $temp = $this->array[$i];
                    $this->array[$i] = $this->array[$j];
                    $this->array[$j] = $temp;
                }
            }
        }
        return $this->array;
    }

    public function __toString()
    {
       return implode(' ',$this->array);
    }
}

//docker exec -it docker_php7phalcon_1 php /mnt/hgfs/structure/bubble_sort.php


$array = array(9, 1, 2, 5, 7, 4);

$bubble = new BubbleSort($array);

$bubble->sort();

echo $bubble;

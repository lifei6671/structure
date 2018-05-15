<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11 0011
 * Time: 14:28
 */

/**
 * 希尔排序
 */
class ShellSort
{
    protected $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function sort()
    {
        $h = 0;
        $len = count($this->array);

        //找到合适的步长
        while ($h <= $len){
            $h = 3 * $h + 1;
        }

        while ($h >= 1){
            for($i = $h; $i < $len; $i ++){
                $j = $i - $h;
                $get = $this->array[$i];

                while ($j >= 0 && $this->array[$j] > $get){
                    $this->array[$i] = $this->array[$j];
                    //？
                    $j = $j - $h;
                }
                $this->array[$j + $h] = $get;
            }
            //？
            $h = ($h - 1) / 3;
        }

        return $this->array;
    }

    public function __toString()
    {
        return implode(' ',$this->array);
    }
}



//docker exec -it docker_php7phalcon_1 php /mnt/hgfs/structure/insert.php


$array = array(5,15,20,55,9, 1, 2, 5, 7, 4);

$bubble = new ShellSort($array);

$bubble->sort();

echo $bubble;
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11 0011
 * Time: 14:39
 */

class InsertSort
{
    protected $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function sort()
    {

        for ($i=1,$len=count($this->array);$i < $len;$i++){
           $temp = $this->array[$i];
           for($j = $i - 1;$j >= 0 && $temp < $this->array[$j]; $j --){
                $this->array[$j + 1] = $this->array[$j];
           }

           $this->array[$j + 1] = $temp;
        }
    }

    public function __toString()
    {
        return implode(' ',$this->array);
    }
}

$array = array(9, 1, 2, 5, 7, 4);

$insert = new InsertSort($array);

$insert->sort();

echo $insert;
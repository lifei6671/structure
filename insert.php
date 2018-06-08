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

/**
 * 插入排序
 * @param array $array
 */
function insertSort(&$array){
    for($i = 1,$len = count($array); $i < $len; $i++){
        $temp = $array[$i];
        for($j = $i - 1; $j >= 0 && $array[$j] > $temp; $j --){
            $array[$j + 1] = $array[$j];
        }
        $array[$j + 1] = $temp;
    }
}

$array = array(9, 1, 2, 5, 7, 4,52,15,64,12,54,254);

//$insert = new InsertSort($array);
//
//$insert->sort();
//
//echo $insert;

insertSort($array);

print_r($array);




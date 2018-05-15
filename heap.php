<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11 0011
 * Time: 8:52
 */

class HeapSort
{
    public function HeapAdjust(&$arr ,$parent,$len)
    {
        $temp = $arr[$parent];
        $child = 2 * $parent + 1;

        while ($child < $len){
            if($child + 1 < $len && $arr[$child] < $arr[$child + 1]){
                $child++;
            }
            if($temp >= $arr[$child]){
                break;
            }
            $arr[$parent] = $arr[$child];
            $parent = $child;
            $child = 2 * $child + 1;

        }
        $arr[$parent] = $temp;

    }

    public function heapFastSort(&$array)
    {
        // 循环建立初始堆
        for ($i = count($array) / 2; $i >= 0; $i--) {
            $this->HeapAdjust($array, $i, count($array));
        }

        // 进行n-1次循环，完成排序
        for ($i = count($array) - 1; $i > 0; $i--) {
        // 最后一个元素和第一元素进行交换
            $temp = $array[$i];
            $array[$i] = $array[0];
            $array[0] = $temp;

            // 筛选 R[0] 结点，得到i-1个结点的堆
            $this->HeapAdjust($array, 0, $i);

            fwrite(STDOUT,"第 ". (count($array) - $i) ." 趟: \t" );
            $this->printPart($array, 0, count($array) - 1);
        }
    }

    public function printPart($array,$begin,$end)
    {
        for($i = 0; $i < $begin;$i++){
            fwrite(STDOUT,"\t");
        }
        for ($i = $begin; $i <= $end; $i++) {
            fwrite(STDOUT,$array[$i] . "\t");
        }
        fwrite(STDOUT,"\n");
    }
}



// docker exec -it docker_php7phalcon_1 php /mnt/hgfs/structure/heap.php
// 初始化一个序列
$array = [110,11,12,15, 3, 4, 5, 2, 6, 9, 7, 8,120];
//
//// 调用快速排序方法
$heap = new HeapSort();
//fwrite(STDOUT,"排序前:\t");
//
//$heap->printPart($array, 0, count($array) - 1);
//
$heap->HeapAdjust($array,0,count($array));
echo implode(' ',$array);
//
//fwrite(STDOUT,"排序后:\t");
//$heap->printPart($array, 0, count($array) - 1);

class HeapFastSort
{
    public function adjustHeap(array $array,$parent,$len)
    {
        $temp = $array[$parent];
        $child = $parent * 2 + 1;

        while ($child < $len){
            if($child + 1 < $len && $array[$child] < $array[$child + 1]){
                $child ++;
            }
            if($array[$child] < $temp){
                break;
            }
            $array[$parent] = $array[$child];
            $parent = $child;
            $child = $child * 2 + 1;
        }

        $array[$parent] = $temp;

        return $array;
    }

    public function heapSort($array)
    {
        $len = count($array);
        for($i = $len/2 - 1;$i >= 0;$i--){
            $array = $this->adjustHeap($array,$i,$len);
        }
        for($i = $len - 1; $i > 0;$i --){
            $temp = $array[$i];
            $array[$i] = $array[0];
            $array[0] = $temp;

            $array = $this->adjustHeap($array,0,$i);

            fwrite(STDOUT,"第 ". ($len - $i) ." 趟: \t" );
            $this->printPart($array,0,$len-1);
        }
        return $array;
    }

    public function printPart($array,$begin,$end)
    {
        for($i = 0; $i < $begin;$i++){
            fwrite(STDOUT,"\t");
        }
        for ($i = $begin; $i <= $end; $i++) {
            fwrite(STDOUT,$array[$i] . "\t");
        }
        fwrite(STDOUT,"\n");
    }

}


//$array = [1,11,12,15, 3, 4, 5, 2, 6, 9, 7, 8, 0];
//
//// 调用快速排序方法
//$heap = new HeapFastSort();
//
//fwrite(STDOUT,"排序前:\t");
//
//for($i = count($array)/2 - 1 ;$i >= 0; $i --){
//    $array = $heap->adjustHeap($array,$i,count($array));
//}
//
//
//$heap->printPart($array, 0, count($array) - 1);
//
//$array = $heap->heapSort($array);
//
//$heap->printPart($array,0,count($array) - 1);
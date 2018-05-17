<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 14:12
 */


function writeFile($fileName,$content){
    if($fp=fopen($fileName,'a')){
        $startTime=microtime();
        do{
            $canWrite=flock($fp,LOCK_EX);
            if(!$canWrite){
                usleep(round(rand(0,100)*1000));
            }
        }while((!$canWrite)&&((microtime()-$startTime)<1000));
        if($canWrite){
            fwrite($fp,$content);
        }
        fclose($fp);
    }

}







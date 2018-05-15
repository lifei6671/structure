<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 15:28
 */

class Node
{
    protected $leftChild;
    protected $rightChild;
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class BinaryTree
{
    protected $root;

}
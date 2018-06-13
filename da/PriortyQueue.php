<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13/013
 * Time: 11:30
 */

class PriortyQueue {
    private $maxheap;
    public function __construct() {
        $this->maxheap = new MaxHeap();
    }
    public function getsize(){
        return $this->maxheap->size;
    }
    public function getfront(){
        return $this->maxheap->getfront();
    }
    public function enqueue($data){
        $this->maxheap->add($data);
    }
    public function dequeue(){
        return $this->maxheap->extractmax();
    }
}
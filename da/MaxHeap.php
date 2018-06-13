<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12/012
 * Time: 11:43
 */

class MaxHeap {
    public $data = array();
    public $size = 0;
    private $type = 0;//0，大顶，1小顶
    public function __construct($type=0) {
        if($type){
            $this->type = $type;
        }
    }

    public function add($data){
        array_push($this->data,$data);
        $this->size++;
        $this->siftup($this->size-1);
    }
    public function leftchild($index){
        $left = $index*2+1;
        if($left<$this->size){
            return $left;
        }else{
            return false;
        }
    }
    public function rightchild($index){
        $right = ($index+1)*2;
        if($right<$this->size){
            return $right;
        }else{
            return false;
        }
    }
    public function parent($index){
        if($index==0){
            return false;
        }
        return floor(($index-1)/2);
    }

    public function swap(&$a,&$b){
        $tmp = $a;
        $a = $b;
        $b=$tmp;
    }
    private function siftup($index){
        if($this->type){
            while($index>0 & $this->data[$index]<$this->data[$this->parent($index)]){
                $this->swap($this->data[$index],$this->data[$this->parent($index)]);
                $index = $this->parent($index);
            }
        }else{
            while($index>0 & $this->data[$index]>$this->data[$this->parent($index)]){
                $this->swap($this->data[$index],$this->data[$this->parent($index)]);
                $index = $this->parent($index);
            }
        }

    }
    private function siftdown($index){
        while($this->leftchild($index)){
                $tmp = 0;
            if($this->type){
                if($this->rightchild($index) && $this->data[$this->rightchild($index)]<$this->data[$this->leftchild($index)]){
                    $tmp = $this->rightchild($index);
                }else{
                    $tmp = $this->leftchild($index);
                }

                if($this->data[$index]<$this->data[$tmp]){
                    $this->swap($this->data[$index],$this->data[$tmp]);
                    $index = $tmp;
                }else{
                    break;
                }
            }else{
                if($this->rightchild($index) && $this->data[$this->rightchild($index)]<$this->data[$this->leftchild($index)]){
                    $tmp = $this->rightchild($index);
                }else{
                    $tmp = $this->leftchild($index);
                }

                if($this->data[$index]<$this->data[$tmp]){
                    $this->swap($this->data[$index],$this->data[$tmp]);
                    $index = $tmp;
                }else{
                    break;
                }
            }

        }
    }
    public function getfront(){
        return $this->data[0];
    }
    public function extractmax(){
        $res = $this->data[0];
        $this->data[0] = array_pop($this->data);
        $this->size--;
        $this->siftdown(0);
    }
    public function heapify($arr){
        $this->data = $arr;
        $this->size = count($arr);
        $lastindex = $this->parent($this->size-1);
        for($i=$lastindex-1;$i>=0;$i++){
            $this->siftdown($i);
        }
    }
    public function replace($data){
        $res = $this->data[0] = $data;
        $this->siftdown(0);
        return $res;
    }
    public function isempty(){

    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1/001
 * Time: 10:37
 */

class LinkedList{
    public $head = null;
    public $bottom = null;
    public $length = 0;
    public function __construct($data) {
        $node = new LinkedNode($data);
        $this->bottom = $this->head = $node;
        $this->length++;
    }

    public function push($data){
        $this->bottom = new LinkedNode($data,null,$this->bottom);
        $this->bottom->prev->next = $this->bottom;
        $this->length++;
    }

    public function unshift($data){
        $this->head = new LinkedNode($data,$this->head);
        $this->head->next->prev = $this->head;
        $this->length++;
    }

    public  function pop(){
        if($this->bottom){
            $data = $this->bottom->data;
        }else{
            return false;
        }
        if($this->length>1){
            $this->bottom = $this->bottom->prev;
            $this->bottom->next = null;
        }else{
            $this->head = $this->bottom = null;
        }
        $this->length --;
        return '#'.$data."#\n";
    }

    public function shift(){
        if($this->head){
            $data = $this->head->data;
        }else{
            return false;
        }
        if($this->length>1){
            $this->head = $this->head->next;
            $this->head->prev = null;
        }else{
            $this->head = $this->bottom = null;
        }
        $this->length --;
        return '#'.$data."#\n";
    }

    public function traversal(){
        $node = $this->head;
        while($node->next){
            echo $node->data."\n";
            $node = $node->next;
        }
        echo $node->data."\n";
    }




}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1/001
 * Time: 10:43
 */

class LinkedNode {
    public $data;
    public $prev = null;
    public $next = null;

    function __construct($data,$next=null,$prev=null) {
        $this->data = $data;
        $this->next = $next;
        $this->prev = $prev;
    }

}
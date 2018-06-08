<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6/006
 * Time: 11:02
 */

class TreeNode {
    public $data;
    public $left = null;
    public $right = null;

    public function __construct($data) {
        $this->data = $data;
    }
}
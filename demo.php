<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1/001
 * Time: 10:34
 */
/*include './da/LinkedList.php';
include './da/LinkedNode.php';*/

include "./da/TreeNode.php";
include "./da/BinarySearchTree.php";
$tree = new BinarySearchTree(7);

$tree->add(5);
$tree->add(10);

$tree->add(3);
$tree->add(6);
$tree->add(9);
$tree->add(11);
$tree->add(2);
$tree->add(4);
$tree->add(8);
$tree->diyinorder();
echo "\n";
//$tree->preorder();
$tree->output();
exit();
$link = new LinkedList('1');
$link->push('2');
$link->push('3');
/*$link->push('4');
$link->push('5');
$link->push('6');
$link->push('7');
$link->push('8');*/
$link->unshift('9');
$link->unshift('10');
$link->traversal();
echo $link->pop();
echo $link->shift();
$link->traversal();
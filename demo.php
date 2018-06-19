<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1/001
 * Time: 10:34
 */
/*include './da/LinkedList.php';
include './da/LinkedNode.php';*/
$arr1 = [8,2,6,3,20,1,9,11,7,5];
$arr2 = [2,3,1];
function quick_sort(&$arr,$start,$end){
    if($start>=$end){
        return;
    }
    $key = $start;
    $tmp = $arr[$key];
    for($i=$start+1;$i<$end;$i++){
        if($arr[$i]<$tmp){
            $tmp1 = $arr[$i];
            $arr[$i] = $arr[$key];
            $arr[$key] = $tmp1;
            $key++;
        }
    }
    $tmp = $arr[$key];
    $arr[$start] = $arr[$key];
    $arr[$key] = $tmp;
   quick_sort($arr,$key+1,$end);
   quick_sort($arr,$start,$key-1);

}
quick_sort($arr1,0,count($arr1));
print_r($arr1);
exit();
include "./da/TreeNode.php";
include "./da/MaxHeap.php";
$tree = new MaxHeap(1);

$tree->add(9);
$tree->add(5);
$tree->add(4);
$tree->add(8);
$tree->add(10);
$tree->add(3);
var_dump($tree->data);

exit();
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
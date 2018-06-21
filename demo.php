<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1/001
 * Time: 10:34
 */
/*include './da/LinkedList.php';
include './da/LinkedNode.php';*/
$arr1 = [8,2,6,3,20,1,9,11,7,5,5,5,5,5,5,5];
$arr2 = [2,3,1];
$arr1 = range(1,100000);
$time1 = time();
function dswamp(&$a,&$b){
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}
function quick_sort(&$arr){
    _quick_sort_two($arr,0,count($arr));;
}
function _quick_sort(&$arr,$start,$end){
    if($start>=$end){
        return;
    }
    $key = $start;
    $tmp = $arr[$key];
    for($i=$start+1;$i<$end;$i++){
        if($arr[$i]<$tmp){
            dswamp($arr[$key+1],$arr[$i]);
            $key++;
        }
    }

    dswamp($arr[$key],$arr[$start]);
    _quick_sort($arr,$key+1,$end);
    _quick_sort($arr,$start,$key-1);
}
function _quick_sort_randkey(&$arr,$start,$end){
    if($start>=$end){
        return;
    }
    $rand = mt_rand($start,$end-1);
    dswamp($arr[$rand],$arr[$start]);
    $key = $start;
    $tmp = $arr[$key];
    for($i=$start+1;$i<$end;$i++){
        if($arr[$i]<$tmp){
            dswamp($arr[$key+1],$arr[$i]);
            $key++;
        }
    }
    dswamp($arr[$key],$arr[$start]);
    _quick_sort_randkey($arr,$key+1,$end);
    _quick_sort_randkey($arr,$start,$key-1);
}
function _quick_sort_two(&$arr,$start,$end){
    if($start>=$end){
        return;
    }
    $rand = mt_rand($start,$end-1);
    dswamp($arr[$rand],$arr[$start]);
    $key = $start;
    $tmp = $arr[$key];
    $l = $start+1;
    $r = $end-1;
    while(true){
        while($l<=$r && $arr[$l]<$tmp){
            $l++;
        }
        while($l<=$r && $arr[$r]>$tmp){
            $r--;
        }
        if($l>$r){
            break;
        }
        dswamp($arr[$l],$arr[$r]);
        $l++;
        $r--;
    }
    dswamp($arr[$start],$arr[$r]);
    _quick_sort_two($arr,$start,$r);
    _quick_sort_two($arr,$r+1,$end);

}
function merge_sort(&$arr){
    _merge_sort($arr,0,count($arr)-1);
}
function _merge_sort(&$arr,$start,$end){
    if($start>=$end){
        return;
    }

    $mid = floor(($start+$end)/2);
    _merge_sort($arr,$start,$mid);
    _merge_sort($arr,$mid+1,$end);
    if($arr[$mid]<=$arr[$mid+1]){
        return;
    }
    $tmp = array();
    for($i=$start;$i<=$end;$i++){
        $tmp[] = $arr[$i];
    }
    $l = $start;
    $r = $mid+1;
    for($k=$start;$k<=$end;$k++){
        if($l>$mid){
            $arr[$k] = $tmp[$r-$start];
            $r++;
        }else if($r>$end){
            $arr[$k] = $tmp[$l-$start];
            $l++;
        }else if($tmp[$l-$start]>$tmp[$r-$start]){
            $arr[$k] = $tmp[$r-$start];
            $r++;
        }else if($tmp[$l-$start]<=$tmp[$r-$start]){
            $arr[$k] = $tmp[$l-$start];
            $l++;
        }
    }
}

quick_sort($arr1);
echo $time1 - time();
//print_r($arr1);
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
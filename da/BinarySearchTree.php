<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6/006
 * Time: 11:03
 */

class BinarySearchTree {
     public $size;
     public $root = null;

     public function __construct($data) {
        $this->root = new TreeNode($data);
        $this->size++;
     }
     private function _add($data,$node){
         if($node == null){
             $this->size++;
             return new TreeNode($data);
         }
         if($data>$node->data){
             $node->right = $this->_add($data,$node->right);
         }elseif($data<$node->data){
             $node->left = $this->_add($data,$node->left);
         }
         return $node;
     }
     public function add($data){
         $this->_add($data,$this->root);
     }
     private function _contains($data,$node){
         if($node == null){
             return false;
         }
         if($data == $node->data){
             return true;
         }
         if($data<$node->data){
             return $this->_contains($data,$node->left);
         }
         if($data>$node->data){
             return $this->_contains($data,$node->right);
         }
     }
     public function contains($data){
         return $this->_contains($data,$this->root);
     }

     public function preorder(){
         $this->_preorder($this->root);
     }
     private function _preorder($node){
         if($node == null){
             return;
         }
         echo $node->data."#";
         $this->_preorder($node->left);
         $this->_preorder($node->right);
     }

     public function inorder(){
        $this->_inorder($this->root);
     }
     private function _inorder($node){
         if($node == null){
             return;
         }
         $this->_inorder($node->left);
         echo $node->data."#";
         $this->_inorder($node->right);
     }

    public function nextorder(){
        $this->_nextorder($this->root);
    }
    private function _nextorder($node){
        if($node == null){
            return;
        }
        $this->_nextorder($node->left);
        $this->_nextorder($node->right);
        echo $node->data."#";
    }
    public function diypreorder(){
         $stack = array($this->root);
         while(count($stack)>0){
             $node = array_pop($stack);
             echo $node->data;
             if($node->right){
                 $stack[] = $node->right;
             }
             if($node->left){
                 $stack[] = $node->left;
             }
         }
    }

    public function diyinorder(){
         $curent = $this->root;
         $stack = array($curent);
         while($stack){
            if($curent->left){
                $curent = $stack[]=$curent->left;
            }else{
                array_pop($stack);
            }
         }
    }
    public function levelorder(){

    }
    public function diyinorder1(){
        $stack = array($this->root);
        $arr = array($this->root);
        $arrout = array();
        while(count($stack)>0){
            $node = end($stack);
           // echo $node->data;
            if($node->left && !in_array($node->left,$arrout)){
                $stack[] = $node->left;
                $arr[] = $node->data;
            }else{
                $nodel = array_pop($stack);
                echo $nodel->data;
                $arrout[] = $nodel;
               if($nodel->right){
                   $stack[] = $nodel->right;
               }
            }
        }
        //var_dump($arr);
    }

    public function output(){
        $deep = 0;
        $queue = array();
        $queue[$deep] = array(
            array('type'=>'root','node'=>$this->root,'parent'=>0),
        );
        while(1){
            $queue[$deep+1] = array();
            foreach($queue[$deep] as $node){
                if($node['parent']){
                    echo "【{$node['parent']}=>{$node['type']}】:";
                }
                echo $node['node']->data;
                if($node['node']->left){
                    $queue[$deep+1][]= array('type'=>'left','node'=>$node['node']->left,'parent'=>$node['node']->data);
                }
                if($node['node']->right){
                    $queue[$deep+1][]= array('type'=>'right','node'=>$node['node']->right,'parent'=>$node['node']->data);
                }
            }
            echo "\n";
            if(count($queue[$deep+1])==0){
                return;
            }else{
                $deep = $deep+1;
            }
        }
     }

     public function add1($data,$node=null){
         if($this->root == null){
             $this->root = new TreeNode($data);
             $this->size++;
             return;
         }
         if(!$node){
             $node = $this->root;
         }

         if($node->data == $data){
             return;
         }
         if($data<$node->data){
             if($node->left==null){
                 $node->left = new TreeNode($data);
                 $this->size++;
                 return;
             }else{
                 $this->add($data,$node->left);
             }

         }else{
             if($node->right==null){
                 $node->right = new TreeNode($data);
                 $this->size++;
                 return;
             }else{
                 $this->add($data,$node->right);
             }
         }
     }


}
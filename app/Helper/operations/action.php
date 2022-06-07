<?php

$action = [];

function apply_action($hook, $args){
   global $action;
   $action[$hook]['args'] = $args;
   return doa_action($hook, $args);
}

function add_action($hook, $func){
   global $action;
   $action[$hook]['funcs'][] = $func;
}

function doa_action($hook,$args){
   global $action;
   if(isset($action[$hook]['funcs'])){
       foreach($action[$hook]['funcs'] as $k => $func){
           call_user_func_array($func, $args);
      }
   }
   
}
<?php


if(!function_exists('str_to_arr')){
  function str_to_arr(&$arr, $string, $value = '', $separator = '.'){

    $keys = explode($separator, $path);

    foreach ($keys as $key) {
      $arr = &$arr[$key];
    }
    if($value != '')  $arr = $value;
    
    return $arr;
  }
}

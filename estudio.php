<?php

function test(){
   static $a=0;
   return $a++; 
}

echo (test());
echo (test());
echo (test());
?>
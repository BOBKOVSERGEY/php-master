<?php
function debug($array)
{
  echo '<pre style="font-size: 10px">';
  print_r($array);
  echo '</pre>';
}

function debugVarDump($array)
{
  echo '<pre>';
  var_dump($array);
  echo '</pre>';
}
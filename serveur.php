<?php
//$time_pre = microtime(true);
session_start();

if (!isset($_SESSION['listBin'])) {
  //$_SESSION['listBin'] = [];
  InitializeArray();
}
else if($_POST["Delete"])
{
  InitializeArray();
}
else if(!$_POST["Delete"])
{

  $listBin = $_SESSION['listBin'];

  $listBin = ListSetter($listBin,TestSetter($_POST["Button"]));

  $_SESSION['listBin'] = $listBin;
  //var_dump($listBin);
}


$_SESSION['solution'] = ['A', 'F'];
$_SESSION['hex'] = GetHexFromList($listBin);

Redirect();


function InitializeArray()
{
  for ($i=0; $i < 8; $i++) {
    $_SESSION['listBin'][$i] = '0';
  }
}

function TestSetter($btnValue)
{
  if (isset($btnValue))
  {
    if ($btnValue == 0 || $btnValue == 1)
    {
      return $btnValue;
    }


  }
  Redirect();
}

function ListSetter($listBin,$value)
{

  array_push($listBin,$value);
  while (count($listBin) > 8)
  {
    array_shift($listBin);
  }

  return $listBin;
}

function Redirect()
{
  header('Location: index.php');
}

function GetHexFromList($listBin)
{
  $bin[0] = substr(implode("",$listBin),0,4);
  $bin[1] = substr(implode("",$listBin),4,4);
  $hex[0] = strtoupper(dechex(bindec($bin[0])));
  $hex[1] = strtoupper(dechex(bindec($bin[1])));
  return $hex;
  //var_dump($hex);

}


?>

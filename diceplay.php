<?php

include("diceclasses.inc.php");

$faces = $_GET["faces"];
$throws = $_GET["throws"];
$material = $_GET['material'];

$results = array();
$average = array();


// make dice
if(!isset($_GET['material'])) {///////////// crates a dice
    $dice = new Dice($faces);
    for ($i = 1; $i <= $throws; $i++) {
        $res = $dice->cast();
        $results[] = array('id' => strval($i), 'res' => strval($res));
        $average_arr = $dice->avg();//////////////////////////
        array_push($average, $res);
    }
}/////
else{/////// creates a physical dice
    $dice_physical = new PhysicalDice($faces);/////
    for ($i = 1; $i <= $throws; $i++) {/////
        $res = $dice_physical->cast();////
        $results[] = array('id' => strval($i), 'res' => strval($res));
        $average_arr = $dice_physical->avg();//////////////////////////
        array_push($average, $res);/////
    }/////
}////////
$average = array_sum($average) / count($average);

$freqs = array();
for ($i = 1; $i<=$faces; $i++) {
    $freqs[] = array ('eyes' => strval($i), 'frequency' => strval($dice->getFreq($i)));
}
echo json_encode(array('faces'=>$faces,'results'=>$results,'frequencies'=>$freqs, 'average'=>$average));

//echo json_encode(array('frequencies'=>$freqs, 'average'=>$average));


?>

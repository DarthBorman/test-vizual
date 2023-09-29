<?php
$host = '127.0.0.1';
$dbname = '***';
$username = '***';
$password = '***';
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password, $opt);

$sql = $pdo->query('SELECT p.ID, (SELECT pm.meta_value FROM wp_postmeta pm WHERE pm.post_id = p.ID AND pm.meta_key = "building_type") AS building_type,  (SELECT pm.meta_value FROM wp_postmeta pm WHERE pm.post_id = p.ID AND pm.meta_key = "number_of_floors") AS number_of_floors FROM wp_posts p WHERE p.post_type = "real_estate_object" AND p.post_status = "publish"');
$myArr = [];
$myArrResult = [];
while ($row = $sql->fetch())
{
    array_push($myArr, $row );
}
$numOfFloors = $_POST['number-of-floors'];
$houseType = $_POST['house-type'];

if($_POST['number-of-floors'] == '0' && $_POST['house-type'] == "0"){
    for($i=0; $i<count($myArr); $i++){
        array_push($myArrResult, $myArr[$i]['ID']);
    }
}elseif($_POST['number-of-floors'] != '0' && $_POST['house-type'] != "0"){
    for($i=0; $i<count($myArr); $i++){
        if($myArr[$i]['number_of_floors'] == $numOfFloors && $myArr[$i]['building_type'] == $houseType){
            array_push($myArrResult, $myArr[$i]['ID']);
        }
    }
}elseif($_POST['number-of-floors'] != '0' && $_POST['house-type'] == "0"){
    for($i=0; $i<count($myArr); $i++){
        if($myArr[$i]['number_of_floors'] == $numOfFloors){
            array_push($myArrResult, $myArr[$i]['ID']);
        }
    }
}elseif($_POST['number-of-floors'] == '0' && $_POST['house-type'] != "0"){
    for($i=0; $i<count($myArr); $i++){
        if($myArr[$i]['building_type'] == $houseType){
            array_push($myArrResult, $myArr[$i]['ID']);
        }
    }
}
echo json_encode($myArrResult);







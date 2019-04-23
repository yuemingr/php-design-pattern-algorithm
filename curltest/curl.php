<?php
echo "curl test";
function curlTest() {
    $data = array("name" => "hagrid", "age" => "36");
    $dataString = json_encode($data);

    $ch = curl_init("http://localhost/test2/curltest/curl.php");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
	'Content-Length: ' . strlen($dataString))
    );

    $result = curl_exec($ch);
    return $result;
}

function main() {
   if(isset($_GET['type'])){
       echo "type = ok";
       if($_GET['type'] == 'post') {
           $result = curlTest();
           var_dump($result);
       }
   } 

//   if(!empty($_POST)) {
  //      var_dump($_POST);
  // }

   echo "nosing!";

}

main();



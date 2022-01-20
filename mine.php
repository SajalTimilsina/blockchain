<?php
session_start();
header( "refresh:12;url=http:main.php" );
if ($_SERVER["REQUEST_METHOD"] =="GET"){
  
  $url_send = $_SESSION["node"].":5001/mine";
  $data = 
          [ "address" => [$_SESSION["address"]]

          ];

// $data = 
//         [  "sender" => ["$sender"],
//           "recipient"=> ["$recipient"],
//           "amount"=> ["$amount"]
//          ];

  $str_data = json_encode($data);
 function sendPostData($url, $post){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
      'Content-Type: application/json',                                                                                
      'Content-Length: ' . strlen($post)));  
    $result = curl_exec($ch); 
    curl_close($ch);  // Seems like good practice /transactions/new
    return $result;
  }
   // ------------------ call function --------------
      $sagar = sendPostData($url_send, $str_data);//send garako
     // $char1 = json_decode($sagar, JSON_PRETTY_PRINT); // read garako
      //echo $sagar;
    // foreach ($char1 as $value => $xvalue) {
    //   echo "<br>".$value." = ".$xvalue;
    //  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Full Chain</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    html{
      background-color: antiquewhite;
    }
    h1 {
      font-family: 'Amita';
      font-size: 32px;
      text-align: center;
    }

  </style>
</head>
<body>
  <h1><?php if ($_SERVER["REQUEST_METHOD"] =="GET"){echo $sagar;} ?></h1>

</body>
</html>

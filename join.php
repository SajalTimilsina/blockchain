<?php
  session_start();
  header( "refresh:8;url=http:main.php" );

      function get_client_ip() {
          $ipaddress = '';
          if (getenv('HTTP_CLIENT_IP'))
              $ipaddress = getenv('HTTP_CLIENT_IP');
          else if(getenv('HTTP_X_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
          else if(getenv('HTTP_X_FORWARDED'))
              $ipaddress = getenv('HTTP_X_FORWARDED');
          else if(getenv('HTTP_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_FORWARDED_FOR');
          else if(getenv('HTTP_FORWARDED'))
             $ipaddress = getenv('HTTP_FORWARDED');
          else if(getenv('REMOTE_ADDR'))
              $ipaddress = getenv('REMOTE_ADDR');
          else
              $ipaddress = 'UNKNOWN';
           //echo "ip:".$ipaddress; 
          return $ipaddress;
      }


      function get_client_mac() {
       $ipAddress=$_SERVER['REMOTE_ADDR'];
       $macAddr=false;

       #run the external command, break output into lines
       $arp=`arp -a $ipAddress`;
       $lines=explode("\n", $arp);

        #look for the output line describing our IP address
        foreach($lines as $line)
        {
         $cols=preg_split('/\s+/', trim($line));
         if ($cols[0]==$ipAddress)
         {
             $macAddr=$cols[1];
         }

        }
        //echo "sa:".$macAddr;
        return $macAddr;
      }

     $sender="".get_client_mac()." (".get_client_ip().")";
   //  echo "sennder".$sender;
     $url_send =$_SESSION["node"].":5001/join";
   $data = 
        [  "client" => get_client_ip()
          
         ];
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
      $char1 = json_decode($sagar, true); // read garako
  
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
<h1><?php echo $sagar; ?><br> Thank You For Joining Our Network.. :)</h1>

</body>
</html>


<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] =="GET"){

    $recipient=$_GET['value'];
    $url_send = $_SESSION["node"].":5001/show/transactions";
    $data = 
            [ "client" => $recipient

            ];

  // $data = 
  //         [  "sender" => ["$sender"],
  //           "recipient"=> ["$recipient"],
  //           "amount"=> ["$amount"]
  //          ];
  function multiexplode($delimiters,$string){
    $ready = str_replace($delimiters, $delimiters[4], $string);

    $launch = explode($delimiters[4], $ready);
    
    return $launch;
  }

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
        $char1 = (array) json_decode($sagar, true); // read garako
        
       //echo $sagar;

   }
?>

<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Transactions Of <?php echo $recipient; ?></title>
 <style type="text/css">
      html{
        background-color: antiquewhite;
      }
      h2{
        font-family: 'Amita';
        font-size: 60px;
        text-align: center;
        margin-top: -1%;
      }
      p{
        font-family: times;
        font-size: 20px;
      }
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;}

      td, th {
          border: 1px solid #dddddd;
          border-radius: 6px;
          text-align: center;
          padding: 8px;}
        th{
          background-color: indigo;
          color: white;}
      tr:nth-child(odd) {
          background-color: lightgrey;}
        caption{
          font-size: 20px;
        }
    </style>
  </head>
<body>
  <h2>आर्थिक कारोवार​</h2>
  <p>User ID : <?php echo $recipient; ?> </p>
  
  <br>
   <table>
    <caption>Transactions</caption>
    <tr>
      <th>Transaction ID</th>
      <th>Amount</th>
      <th>Recipient</th>
      <th>Incoming/Outgoing</th>
    </tr>
    <tr>
      <td colspan="4"> <?php echo $sagar;?></td>
    </tr>
    <tr>
       
    </tr>

  </table>



  </script> -->
</body>
</html>
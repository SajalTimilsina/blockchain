<!DOCTYPE HTML >
<html>
	<head>
  		<title>पारदर्शी कारोवार</title>
		    <meta charset="UTF-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
		    <link rel="stylesheet" href = "/bootstrap/css/bootstrap.min.css"> 



<?php
session_start();
//$serverip =  $_SERVER['SERVER_ADDR'];
$_SESSION["node"] = $_SERVER['SERVER_ADDR'];

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
   //echo "sennder".$sender;

$_SESSION["senderinfo"] = $sender;
$_SESSION["address"] = get_client_ip();
$_SESSION["mac"] = get_client_mac();

//------------------------------------------------
  $url_send = $_SESSION["node"].":5001/nodesinfo"; 
  //$url_send = "http://192.168.100.43:5001/nodesinfo";
  $data1 = 23;
  $str_data = json_encode($data1);

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
       // echo $sagar;
  
        //$url_send1 = "http://192.168.100.43:5001/showAmount";
        $url_send1 = $_SESSION["node"].":5001/showAmount"; 
        echo "here ::";
        echo $url_send1;
        $dataamt = [ "Account_holder" => get_client_ip() ];
            
       $dataamtstr = json_encode($dataamt);
       $amt1 = sendPostData($url_send1,$dataamtstr);
       $char2 = json_decode($amt1, true);
      // print $char2;
       if (!empty($char2)) {      
         foreach ($char2 as $value => $xvalue) {
         $amt = $xvalue;   
           }
        }

?>
   
  


		<style type="text/css">
		        

		                  
		          /*
		              Note: It is best to use a less version of this file ( see http://css2less.cc
		              For the media queries use @screen-sm-min instead of 768px.
		              For .omb_spanOr use @body-bg instead of white.
		          */

		          @media (min-width: 768px) {
		              .omb_row-sm-offset-3 div:first-child[class*="col-"] {
		                  margin-left: 25%;
		              }
		          }

		          .omb_login .omb_authTitle {
		              text-align: center;
		            line-height: 300%;
		          }
		            
		          .omb_login .omb_socialButtons a {
		            color: white; // In yourUse @body-bg 
		            opacity:0.9;
		            
		          }
		          .omb_login .omb_socialButtons a:hover {
		              color: white;
		            opacity:1;      
		          }
		          /*.omb_login .omb_socialButtons .omb_btn-facebook {background: #4CAF50;
		            }
		          .omb_login .omb_socialButtons .omb_btn-google {background: #4CAF50;}
		*/
		              .fa-user {text-align: center;}
		              .omb_login .omb_loginOr {
		                position: relative;
		                font-size: 1.5em;
		                color: #aaa;
		                margin-top: 1em;
		                margin-bottom: 1em;
		                padding-top: 0.5em;
		                padding-bottom: 0.5em;
		              }
		              .omb_login .omb_loginOr .omb_hrOr {
		                background-color: #cdcdcd;
		                height: ;
		                margin-top: 0px !important;
		                margin-bottom: 0px !important;
		              }
		              .omb_login .omb_loginOr .omb_spanOr {
		                display: block;
		                position: relative;
		                left: 50%;
		                top: -0.6em;
		                margin-left: -1.5em;
		                background-color: white;
		                width: 3em;
		                text-align: center;
		              }     

		              .omb_login .omb_loginForm .input-group.i {
		                width: 2em;
		              }
		              .omb_login .omb_loginForm  .help-block {
		                  color: red;
		              }

		                
		              @media (min-width: 768px) {
		                  .omb_login .omb_forgotPwd {
		                      text-align: right;
		                  margin-top:10px;
		                }   
		              }

		            .mine{
		                background-color: #4CAF50;
		                color: white;
		                padding: 15px 32px;
		                text-align: center;
		                text-decoration: none;
		                display: inline-block;
		                font-size: 16px;
		                cursor: pointer;
		                border-radius: 5px;
		            }
		            .mine:hover, .mine:focus
		            {
		              background-color: #3e8e41;
		            }
		            #mineit{
		                background-color: #4CAF50;
		                border: none;
		                color: white;
		                padding: 15px 32px;
		                text-align: center;
		                text-decoration: none;
		                display: inline-block;
		                font-size: 16px;
		                cursor: pointer;
		              
		            }
		            h1{color: antiquewhite;
		                font-family: 'Amita', serif;
		                font-size: 39px; text-align: center;
		                clear: both;
		              }
		             
		            html,body{background-color: #235; height: 100%; padding:0; margin:0;}
		            form{ width:30em;height:9em; margin:-5em auto 0 auto; position: relative; top:10%; padding:.25em;}
		            fieldset{ background-color: #240; height:220%; margin:0;   border:0;padding:0; border-radius: 5px;}
		            legend{ float:left; font-size: 40px; text-align: center; color:white; font-weight: bold; border-bottom: 1px solid blue; width:15em;  padding:0; }
		            label, label+ input { font-size: 22px; display:inline; float:left;margin-top:1em; border-radius: 5px; }
		            label{font-family: Times; font-size: 8px; color: gold; text-align: center; width:28%; clear: left; margin-top:.8em; }
		            label+ input{background-color: Moccasin; font-family: 'Bell MT'; font-weight: bold; height:18%;width:60%; padding:.25em; ; margin-left:.5em; border: 1px black;  margin-left: }
		            h2{font-size: 20px;
		                color: lightgrey;
		                text-align: center;
		            }
		            h2 a{
		              background-color: #4CAF50;
		              border: none;
		              color: white;
		              padding: 15px 32px;
		              text-align: center;
		              text-decoration: none;
		              display: inline-block;
		              font-size: 16px;
		              cursor: pointer; 
		            }
		            #sub{  margin-top:1em; position: relative; float:left;clear: left; margin-left: 29%; background-color: silver; color: darkred; border: 3px solid darkred; border-radius: 25px; height: 17%; width: 20%; font-size:20px; transition: all 0.5s; cursor: pointer; box-shadow: 0 5px darkslategrey;}
		            #sub:hover{ background-color: green; }
		            #sub:active{ background-color: seagreen; box-shadow: 0 3px seagreen; transform: translateY(5px);}
		            .dropbtn {
		                background-color: #4CAF50;
		                color: white;
		                padding: 16px;
		                font-size: 16px;
		                border: none;
		                cursor: pointer;
		                border-radius: 4px;}

		            .dropbtn:hover, .dropbtn:focus {
		                background-color: #3e8e41;}

		            #myInput {
		                border-box: box-sizing;
		                background-image: url('searchicon.png');
		                background-position: 14px 12px;
		                background-repeat: no-repeat;
		                font-size: 16px;
		                padding: 14px 20px 12px 45px;
		                border: none;
		                border-bottom: 1px solid #ddd;}

		            #myInput:focus {outline: 3px solid #ddd;}

		            .dropdown {
		                position: relative;
		                display: inline-block;}

		            .dropdown-content {
		                display: none;
		                position: absolute;
		                background-color: #f6f6f6;
		                min-width: 230px;
		                overflow: auto;
		                border: 1px solid #ddd;
		                z-index: 1;}

		            .dropdown-content a {
		                color: black;
		                padding: 12px 16px;
		                text-decoration: none;
		                display: block;}

		            .dropdown a:hover {background-color: #ddd}

		            .show {display:block;}
		</style>
	</head>
<body>
			 <div class="row">
			    <header>
			    <h2>Account number: <?php echo $sender; ?><br>
			    Amount Remaining : Rs. <?php echo $amt  ?></h2>
			    
			    </header>
			    
			</div>

    <div class=" row dropdown col-sm-12 ">
        <button onclick="myFunction()" class="dropbtn">  Select Client To View Transaction</button>
        <div id="myDropdown" class="dropdown-content">
            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">

             <?php
              if (!empty($char1)){
             foreach ($char1 as $value => $xvalue) {
             ?>
            <a href="<?php echo"tran.php?value=$value";?>"><?php echo $value; ?></a>
            <?php
             }
             }
             ?>
            
        </div>
    </div>
    <br>

    <div class = " row col-sm-12 col-xs-11">
         <h1>गर्नुहोस् पारदर्शी कारोवार</h1>
    </div>

    
<div class="container">
 	<div class="row omb_login">
 		<div class="col-xs-12 col-sm-12">
      	  <h3 class="omb_authTitle"><a href="Join.php" style="color: #4CAF50 ">Join The Network</a></h3>
      
    	</div>
    </div>


  	<div class="row omb_login">
   
	    <div class="col-xs-6 col-sm-6" style="padding-left:0px" >  
	      <div  class="omb_socialButtons " >
	        <a href="chain.php" class="btn btn-block omb_btn-facebook">
	        	<span class="mine">View Full Chain</span>
	        </a>
	       </div>
	    </div>
	        
	      <div class="col-xs-6 col-sm-6" style="padding-left:0px" >  
	    	  <div  class="omb_socialButtons " > 
	      		    <a align="right" href="mine.php" class="btn btn-block omb_btn-google col-xs-3">
	       		       <span class="mine" style="background: #c32f10">Mine Current Block</span>
	       			</a>
	        	</div>
	     	</div>    
    </div>
    

	<div class="row  ">
    	<div class="col-xs-12 col-sm-12">
       		 <hr class="omb_hrOr">
       		 <span class="omb_spanOr"></span>
      	</div>
    </div>
	<br>

		<br><br>

    <div class="row omb_row-sm-offset-3">
      <div class="col-xs-4 col-sm-6">  
        	<form class="omb_loginForm" action="get.php" autocomplete="on" method="POST">
         		<div class="input-group">
           			<span class="input-group-addon"><i class="fa-user">Recipient:</i></span>
           			<input type="text" class="form-control" name="recepient" placeholder="Who you want to send to...">
        	 	</div>
        
                    
            <div class="input-group" style="margin-top: 4px">
            	<span class="input-group-addon"><i class="fa fa-lock">Amount:</i></span>
            	<input  type="" class="form-control" name="amount" placeholder="Amount to be transferred...">
            </div>
                    
   <br>
        			<button class="btn btn-lg btn-primary btn-block" type="submit">SEND</button>
            </form>
        </div>

    </div>

 	</div>




    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");}

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";}
            }
        }
    </script>
    
</body>
</html>

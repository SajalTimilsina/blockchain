<?php
session_start();
$_SESSION['node'] = $_SERVER['SERVER_ADDR'];
$addr ="/main.php";
?>




<!DOCTYPE html>
<html>
<head>
  <title>
    Authentication
  </title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
	 
  <div class="container">
	<div class="container__item">
		<h1>Authentication Portal</h1>
		<form class="form">
			<input type="number" class="form__field" placeholder="Your National ID" id="idListCheck"/>
			<button onclick="handlers.compareList()" type="button" class="btn btn--primary btn--inside uppercase">Send</button>
		</form>
	</div>
	
	
</div>
  
  <p id="demo"></p>
  </section>
  

  <script>
      
    var idList = ["123","456","789","908"];

    function compare(idlistvalue){
      
      if (idlistvalue == 0) {
        alert("Enter your ID");
      }

      else if (idlistvalue != 0){
        var count = 0;
        for (var i = 0; i < idList.length; i++) {
           if(idList[i] === idlistvalue){
              window.location.href = "<?php echo $addr ?>";
              
              break;
           }
            else{
              count++;
            }
          
          }
      }

      if (count > 0) {
        alert("Sorry You're Not Registered");
      }
      
    };

    var handlers= {
      compareList: function(){
        var addList = document.getElementById('idListCheck');
        compare(addList.value);
        addList.value = '';
      }
    };
    </script>

</body>
</html>
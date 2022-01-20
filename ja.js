var invocation = new XMLHttpRequest();
var url = 'http://192.168.1.7:5000/chain';
   
function callOtherDomain() {
  if(invocation) {    
    invocation.open('GET', url, true);
    invocation.onreadystatechange = handler;
    invocation.send(); 
  }

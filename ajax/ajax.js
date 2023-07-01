

  function addProduct(){
    console.log("Is pressed");
      var xhr = new XMLHttpRequest();
      
      xhr.open('POST','./adminview/addproduct.php',true);
      xhr.onreadystatechange = function() {
        console.log("THIS IS AND READY STATE");
       
      }
      xhr.onload=function(){
        var response = xhr.responseText;
        // Process the response as needed
        console.log(response);
        // Update the view product section with the received data
        document.querySelector('.Section').innerHTML = response;
  
      }
      xhr.send();
    }

    function Viewproduct(){
      console.log("Is pressed");
        var xhr = new XMLHttpRequest();
        
        xhr.open('POST','./adminview/view.php',true);
        xhr.onreadystatechange = function() {
          console.log("THIS IS AND READY STATE");
         
        }
        xhr.onload=function(){
          var response = xhr.responseText;
          // Process the response as needed
          console.log(response);
          // Update the view product section with the received data
          document.querySelector('.Section').innerHTML = response;
    
        }
        xhr.send();
      }
    
  


 
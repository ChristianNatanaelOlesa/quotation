  <?php  
 $connect = mysqli_connect("localhost", "root", "", "quotation");  
 $number = count($_POST["description"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["description"][$i] != ''))  
           {  
                $sql = "INSERT INTO trx_top(description) VALUES('".mysqli_real_escape_string($connect, $_POST["description"][$i])."')";  
                mysqli_query($connect, $sql);  
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter DEscription";  
 }  
 ?> 
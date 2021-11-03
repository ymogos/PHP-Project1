<?php
  $conn =mysqli_connect("localhost","root","","test");
  session_start();
  if($conn){
    if(isset($_POST['save'])){
      $file = $_FILES['csvfile']["tmp_name"];
      if($file){
       $handle = fopen($file,"r");
       $i=0;
       while(($column=fgetcsv($handle,1000,","))!==false){
          
             if($column[0]!==0 && $column[2]!==''){
               if($i==0){
            
                $query="CREATE TABLE IF NOT EXISTS result (id int(50),section_id int(50),name VARCHAR(100),title VARCHAR(100),created datetime)";
                
                 mysqli_query($conn,$query);
               }
               else{
                 
               $dateTime = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$column[4])));
                
                $query = "INSERT INTO result ( id, section_id ,name, title, created) VALUES ('$column[0]','$column[1]','$column[2]','$column[3]', '$dateTime')";
                 mysqli_query($conn,$query);
               }
               $i++;
             }
            } 
           
       }
       $_SESSION['message'] = "record has been saved.";
       header("location:index.php");
      }
  }else {

    echo "connection failed";
  }

?>
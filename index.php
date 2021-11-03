<html>
   <head>
     <title>Import Csv</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
  <?php require_once 'insertReasult.php'; ?>

    
  
<div class="container">
  <div class="row col-sm-12">
    <?php 
     if(isset($_SESSION['message'])): ?>

    <div class="alert alert-success">
       <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
       ?>

    </div>
    <?php endif ?>
  <h2>Import CSV file into MySql using PHP</h2>
      <form  form-inline action="insertReasult.php" method="POST" name="frmCSVImport" enctype="multipart/form-data" class="form-horizontal">
     
     
  <div class="row form-group ">
    <label class="sr-only" for="file">Import CSV:</label>
    <input type="file" name="csvfile" class="form-control" accept=".csv"/>
  </div>

      
      <button type="submit" name="save" class="btn btn-success">
         Import
        </button>
              
      </form>

      <?php 
        $mysqli = new mysqli("localhost","root","","test");
        $result = $mysqli->query("SELECT * FROM result ORDER BY created DESC LIMIT 10")
        ?>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>sectio Id</th>
        <th>Name</th>
        <th>Title</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($result && ($row = $result->fetch_assoc())): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['section_id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['created']; ?></td>
        </tr>

        <?php endwhile; ?>

      
    </tbody>
  </table>

       
  


      <div>


       </div>
  </div>

    
</div>
     
   </body>

</html>



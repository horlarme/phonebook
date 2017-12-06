<?php
error_reporting(0);
//Opening SQLite Database
$db = new PDO("sqlite:phonebook.sqlite");

//Checking if table already exist
if($db->query("SELECT * FROM phonebook") === false){
    echo "Database table doesn't exit.. creating a new table with the name 'Phonebook'";
    //Creating Tables into Database
    $db->exec("CREATE TABLE phonebook (id INTEGER PRIMARY KEY, fullname TEXT, number TEXT, mail TEXT)");
    $db->exec("INSERT INTO phonebook (fullname, number, mail) VALUES ('Lawal Oladipupo', '08149108989', 'lawboi4love@gmail.com')");
}

if($_REQUEST['action'] === 'delete'){
    $id = $_REQUEST['id'];
    
    $db->query("DELETE FROM phonebook WHERE id = '$id'");
    $message = "The user have been successfuly deleted";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Phone Number Contacts</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta charset="UTF-8" />
    <script type='text/javascript' src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <meta name="author" content="Lawal Oladipupo" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <header>
      <h1><i class="glyphicon glyphicon-book"></i> My Phone Numbers</h1>
        <ul class="nav nav-tabs">
          <li>
            <a href="index.php" class="btn btn-primary">Homepage</a>
          </li>
          <li>
            <a href="add" class="btn">Add New</a>
          </li>
          <li>
            <a href="list" class="btn">Contacts</a>
          </li>
          <li>
            <a href="index.php#about" class="btn">About</a>
          </li>
        </ul>
    </header>
    <div class="container">
      
      <div class="row">
        <h1>Phonebook List</h1>
        <div class="bg-success text-success"><?php echo $message; ?></div>
        <table class="table table-stripped table-bordered">
          <thead>
            <tr>
              <td>Name</td>
              <td>Number</td>
              <td>E-Mail</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            <?php
                //Listing the contents in the table 
                $contacts = $db->query("SELECT * FROM phonebook ORDER BY fullname DESC");
                foreach($contacts as $c){
                    ?>
            <tr>
              <td><?php echo $c['fullname']; ?></td>
              <td><?php echo $c['number']; ?></td>
              <td><?php echo $c['mail']; ?></td>
              <td>
                <a href="<?php echo $_SERVER["PHP_SELF"] . "?action=delete&id=" . $c['id']; ?>">Delete</a> / 
                <a href="<?php echo "edit.php?id=" . $c['id']; ?>">Edit</a>
              </td>
            </tr>                    
                    <?php
                }
                $db = null;                
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <footer>
      <p>My Phonebook | <a href="//facebook.com/blessedhorlar">Facebook</a></p>
    </footer>
  </body>
</html>
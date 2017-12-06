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

//Adding to phonebook
if($_REQUEST['action'] === 'add'){
    try{
        $fullname = $_REQUEST['name'];
        $mail = $_REQUEST['mail'];
        $number = $_REQUEST['number'];
        
        $db->query("INSERT INTO phonebook(fullname,number,mail) VALUES('$fullname','$number','$mail')");
        $message = "<strong>$fullname</strong> has been successfull added to your contact list.";
        
    }catch(PDOException $error){
        $message = "There's something wrong adding the number, please try reloading the page or re-entering the iniformation to the form!<br/>";
        $message .= $error->getMessage();
    }
}
elseif($_REQUEST['action'] === 'delete'){
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

      <div class="new-job container">
      <h1>Add New Contact</h1>
      <div class="bg-success text-success"><?php echo $message; ?></div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" onsubmit="verifyContact();">
        <div class="form-group col-sm-6">
          <div class="row">
            <label for="Name">Name</label>
            <input type="text" name="name" class="name form-control">
          </div>
          <div class="row">
            <label for="number">Number</label>
            <input name="number" type="text" class="number form-control" cols="25" rows="5" />
          </div>
          <div class="row">
            <label for="mail">E-Mail</label>
            <input type="e-mail" name="mail" class="mail form-control">
          </div>
          <div class="row">
            <input type="hidden" name="action" value="add" />
            <input name="add" type="submit" class="btn btn-submit col-sm-12 add_job" value="Add Contact">
          </div>
        </div>
        </form>
      </div>

    <footer>
      <p>My Phonebook | <a href="//facebook.com/blessedhorlar">Facebook</a></p>
    </footer>
  </body>
</html>

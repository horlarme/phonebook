<?php
error_reporting(0);
//Opening SQLite Database
$db = new PDO("sqlite:phonebook.sqlite");

//Adding to phonebook
if($_REQUEST['action'] === 'edit'){
    try{
        $fullname = $_REQUEST['name'];
        $mail = $_REQUEST['mail'];
        $number = $_REQUEST['number'];
        
        $db->query("UPDATE phonebook set fullname = '$fullname', number = '$number', mail = '$mail' WHERE id = '" . $_REQUEST['id'] . "'");
        $message = "<strong>$fullname</strong> has been successfull edited.";
    }catch(PDOException $error){
        $message = "There's something wrong adding the number, please try reloading the page or re-entering the iniformation to the form!<br/>";
        $message = $error->getMessage();
        die();
    }
    //header('location: index.php');
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

      <div class="new-job container" style="display: inline;">
        <?php
        $contact = $db->query("SELECT * FROM phonebook WHERE id = '" . $_REQUEST['id'] . "'")->fetch();
            ?>
        <h3>Edit <?php echo $contact['fullname']; ?></h3>
        <div class="bg-success text-success"><?php echo $message; ?></div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="form-group col-sm-6">
          <div class="row">
            <label for="Name">Name</label>
            <input type="text" name="name" class="name form-control" value="<?php echo $contact['fullname']; ?>">
          </div>
          <div class="row">
            <label for="number">Number</label>
            <input name="number" type="text" class="number form-control" cols="25" rows="5"  value="<?php echo $contact['number']; ?>" />
          </div>
          <div class="row">
            <label for="mail">E-Mail</label>
            <input type="mail" name="mail" class="mail form-control" value="<?php echo $contact['mail']; ?>">
          </div>
          <div class="row">
            <input type="hidden" name="action" value="edit" />
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
            <input name="add" type="submit" class="btn btn-submit col-sm-12 add_job" value="Edit Contact">
          </div>
        </div>
        </form>
      </div>

    <footer>
      <p>My Phonebook | <a href="//facebook.com/blessedhorlar">Facebook</a></p>
    </footer>
  </body>
</html>

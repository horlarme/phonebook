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
            <a href="#about" class="btn">About</a>
          </li>
        </ul>
    </header>
    <div class="container-fluid content">
      <div class="welcome-panel">
        <i class="glyphicon glyphicon-book" style="font-size: 60pt;"></i>
        <h1 class="welcome-header">Welcome to my phonebook web application.</h1>
        <p>A simple web application phonebook with PHP and SQLite Database.</p>
      </div>

      <div class="about" id="about">
        <h1>About</h1>
        <p>This is application is created by <strong>Lawal Oladipupo</strong> as a PHP application. It is designed to store phone numbers, e-mail and full name of a contact. It is designed with the following languages and frameworks:
        <ul>
          <li>JQuery (Javascript)</li>
          <li>Bootstrap (CSS)</li>
          <li>PHP</li>
          <li>CSS (stylesheet)</li>
          <li>HyperText MarkUp Language (HTML)</li>
          <li>SQLite (Database)</li>
        </ul>
        </p>
        <h1>Usage</h1>
        <p>
          This application is designed to keep records.
          <pre>Note: This application doesn't require any mean of authentication before <strong><em>any</em></strong> user can open and read the contents stored in the database. So don't use for reproduction!</pre>
        </p>
        <h1>Features</h1>
        <div class="jumbotron col-md-3">
          <p>Add New Contacts</p>
        </div>
        <div class="jumbotron col-md-3">
          <p>Edit Contact</p>
        </div>
        <div class="jumbotron col-md-3">
          <p>Delete Contact</p>
        </div>
        <div class="jumbotron col-md-3">
          <p>Easy Interface</p>
        </div>
      </div>
    </div>
    <footer>
      <p>My Phonebook | <a href="//facebook.com/blessedhorlar">Facebook</a></p>
    </footer>
  </body>
</html>
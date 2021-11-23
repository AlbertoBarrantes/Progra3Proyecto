<?php
// Las funciones para facilitar las conecciones en las distintas paginas
  require_once('db_connect.php');



  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
  }

  function confirm_db_connect() {
    if ($db) {
      echo "<p>Connection successful.</p>";
  } elseif (isset($error)) {
      echo "<p>$error</p>";
  }
  }

  function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }

?>

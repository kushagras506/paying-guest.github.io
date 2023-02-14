<?php
  if(!empty($_GET['tid'] && !empty($_GET['description']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $description = $GET['description'];
  } else {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Thank You</title>
</head>
<body>
  <div class="container mt-4">
    <h2><?php echo $description; ?></h2>
    <hr>
    <p>Your transaction ID is <?php echo $tid; ?></p>
    <p><a href="index.php" class="btn btn-light mt-2">Go Back</a></p>
  </div>
</body>
<script>
    window.location.hash = "no-back-button";

    // Again because Google Chrome doesn't insert
    // the first hash into the history
    window.location.hash = "Again-No-back-button"; 

    window.onhashchange = function(){
        window.location.hash = "no-back-button";
    }
</script>
</html>
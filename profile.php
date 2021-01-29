<?php

include_once('functions/Profile.function.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Log Results</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar navbar-dark bg-secondary">
        <a href="#" class="navbar-brand">                <img src="assets/images/logo.svg" alt="logo" class="logo">
</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse1">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse1">
            <div class="navbar-nav">
                <a href="<?=baseUrl()?>profile" class="nav-item nav-link active">Profile</a>
            </div>
            <form class="form-inline ml-auto">
                <button type="submit" class="btn btn-outline-light" name="logout" value="true">Log Out</button>
            </form>
        </div>
    </nav>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Results of logs</h2>
            <h6><?= date("l jS \of F Y"); ?></h6>
        </div>
        <div class="col-md-6">
        <h4 class="text-right">Total : <span class="badge bg-secondary text-white"><?= $logs->getAllNumber() ?></span>
 <br>
Total Today: <span class="badge bg-secondary text-white"> <?= $logs->getActualToday() ?> </span></h4></div>
    </div>
  
  <table class="table table-bordered">
    <thead class="bg-secondary text-white">
      <tr>
        <th><b>ID.</b> </th>
        <th>Buton ID</th>
        <th>Year</th>
        <th>Month</th>
        <th>IP</th>
        <th>Count Clicks <a href="?orderCount=<?=$orderType; ?>" class="text-white"><i class="fa fa-fw fa-sort<?=$orderIcon?>"></i></a></th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($allLogs as $singleLog){ ?>
      <tr>
        <td><?= $singleLog['id']; ?></td>
        <td><?= $singleLog['buton_id']; ?></td>
        <td><?= date('Y', strtotime($singleLog['datetime'])); ?></td>
        <td><?= date('M', strtotime($singleLog['datetime'])); ?></td>
        <td><?= $singleLog['user_ip']; ?></td>
        <td><?= $singleLog['clicks']; ?></td>
      </tr>
    <?php } ?>
     
    </tbody>
  </table>
</div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
</body>
</html>

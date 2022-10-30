<?php
include('dbconn.php');
include_once('countryController.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP OOPS - Fetch Data from database in php mysql using oops</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>



  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>country View single</h4>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>country name</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $getid = $_GET['id'];
                  //echo $getid;

                  $country = new countryController;
                  $result = $country->index_single($getid);
                  if ($result) {
                    foreach ($result as $row) {
                  ?>
                      <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['country_name'] ?></td>



                      </tr>
                  <?php
                    }
                  } else {
                    echo "No Record Found";
                  }
                  ?>

                </tbody>
              </table>
            </div>
            <a href="country-index.php" class="btn btn-success">Enter Country</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
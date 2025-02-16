<html lang="en">
<head>
    <title>Testing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Charlie Chavez">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="dashboard.css" rel="stylesheet">
    <title>Dashboard</title>
  
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">Inventory</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="items.php">Items</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
    <!-- Dashboard Cards -->
    <div class="row my-4">
        <!-- Total Items Card -->
        <div class="col-md-3 mb-4" id="total-items">
            <div class="card bg-gradient-primary text-white shadow-sm p-3 rounded hover-scale">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <?php
                        require_once("config.php");
                        $sql="SELECT * FROM items";
                        $result = $conn->query($sql);
                        $totalItems = $result->num_rows
                        ?>
                        <h3 class="fs-2"><?= $totalItems ?></h3>
                        <p class="fs-5 mb-0">Total Items</p>
                    </div>
                    <div class="icon-circle bg-light text-primary">
                        <i class="fa-solid fa-microchip fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="col-md-3 mb-4" id="total-users">
            <div class="card bg-gradient-info text-white shadow-sm p-3 rounded hover-scale">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <?php 
                        $sql_users="SELECT * FROM users";
                        $result_users = $conn->query($sql);
                        $totalUsers = $result_users->num_rows
                        ?>
                        <h3 class="fs-2"><?= $totalUsers ?></h3>
                        <p class="fs-5 mb-0">Total Users</p>
                    </div>
                    <div class="icon-circle bg-light text-info">
                        <i class="fa-solid fa-server fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- OLT Result Card -->
        <div class="col-md-3 mb-4" id="olt-result">
            <div class="card bg-gradient-danger text-white shadow-sm p-3 rounded hover-scale">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fs-2">Loading...</h3>
                        <p class="fs-5 mb-0">Loading..</p>
                    </div>
                    <div class="icon-circle bg-light text-danger">
                        <i class="fa-solid fa-microchip fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bucket Result Card -->
        <div class="col-md-3 mb-4" id="bucket-result">
            <div class="card bg-gradient-warning text-white shadow-sm p-3 rounded hover-scale">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fs-2">Loading...</h3>
                        <p class="fs-5 mb-0">Loading...</p>
                    </div>
                    <div class="icon-circle bg-light text-warning">
                        <i class="fa-solid fa-server fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-12">
            <div class="card bg-light text-dark shadow-sm p-4 rounded">
                <h4>Latest Updates</h4>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="fa-solid fa-circle text-success me-2"></i> Update User</li>
                    <li class="mb-2"><i class="fa-solid fa-circle text-warning me-2"></i> Update Dashboard</li>

                </ul>
            </div>
        </div>
    </div>

<?php $conn->close();
?>
</div>
</body>
</html>
<?php

require_once('connect.php');

$result = $conn->query("SELECT * from `practice_crud` WHERE `id` = {$_GET['id']} LIMIT 1;");

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="p-3 mb-2 bg-dark text-white">
  <a href="./">
    <button class="btn btn-primary mb-3" type="button">Back</button>
  </a>
  <p>
    ID: <?= $row['id'] ?>
  </p>
  <p>
    Name: <?= $row['name'] ?>
  </p>
  <?php if (!empty($row['image'])) : ?>
    <div>
      Image: <img alt="<?= $row['name'] ?>" height="200" src="<?= $row['image'] ?>" />
    </div>
  <?php endif ?>
  <div>
    <a href="edit.php?id=<?= $row['id'] ?>">
      <button class="btn btn-warning mb-3" type="button">
        Edit
      </button>
    </a>
    <a href="delete.php?id=<?= $row['id'] ?>">
      <button class="btn btn-danger mb-3" type="button">
        Delete
      </button>
    </a>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
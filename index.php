<?php

require_once('connect.php');

$result = $conn->query("SELECT * from `practice_crud`;");

$rows = $result->fetch_all(MYSQLI_ASSOC);

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
  <a href="create.php">
    <button class="btn btn-primary mb-3" type="button">Create</button>
  </a>
  <table class="table">
    <thead>
      <tr class="table-primary">
        <th scope="col">
          ID
        </th>
        <th scope="col">
          Name
        </th>
        <th scope="col">
          Image
        </th>
        <th scope="col">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
        <tr class="table-info">
          <th scope="col">
            <?= $row['id'] ?>
          </th>
          <th scope="col">
            <?= $row['name'] ?>
          </th>
          <th scope="col">
            <?php if (!empty($row['image'])) : ?>
              <img alt="<?= $row['name'] ?>" height="25" src="<?= $row['image'] ?>" />
            <?php endif ?>
          </th>
          <th scope="col">
            <a href="view.php?id=<?= $row['id'] ?>">
              <button class="btn btn-success mb-3" type="button">
                View
              </button>
            </a>
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
          </th>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
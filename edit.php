<?php

require_once('connect.php');

$result = $conn->query("SELECT * from `practice_crud` WHERE `id` = {$_GET['id']} LIMIT 1;");

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = uniqid(rand(), true);
  $ext = end((explode(".", $_FILES['image']['name'])));
  $image = "images/{$name}.{$ext}";
  // $image = "images/{$_FILES['image']['name']}";
  if (move_uploaded_file($_FILES['image']['tmp_name'], $image) && $conn->query("UPDATE `practice_crud` SET `name` = '{$_POST['name']}', `image` = '{$image}' WHERE `id` = {$_GET['id']};")) {
    header('location: ./');
  }
}

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
  <form action="edit.php?id=<?= $row['id'] ?>" enctype="multipart/form-data" method="post">
    <label>
      <span>Name: </span>
      <input name="name" type="text" value="<?= $row['name'] ?>" />
    </label>
    <label>
      <span>Image: </span>
      <input name="image" type="file" />
    </label>
    <button class="btn btn-warning mb-3" type="submit">
      Submit
    </button>
  </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>

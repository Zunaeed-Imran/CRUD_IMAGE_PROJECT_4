<?php

require_once('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = uniqid(rand(), true);
  $ext = end((explode(".", $_FILES['image']['name'])));
  $image = "images/{$name}.{$ext}";
  // $image = "images/{$_FILES['image']['name']}";  //it is simple way like no explode and uniq use here
  if (move_uploaded_file($_FILES['image']['tmp_name'], $image) && $conn->query("INSERT INTO `practice_crud` (`name`, `image`) VALUES ('{$_POST['name']}', '{$image}');")) {
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
  <form action="create.php" enctype="multipart/form-data" method="post">
    <div class="mb-3">
      <label class="form-label">
        <span>Name: </span>
        <input class="form-control" name="name" type="text" />
      </label>
    </div>
    <div class="mb-3">
      <label class="form-label">
        <span>Image: </span>
        <input class="form-control" name="image" type="file" />
      </label>
    </div>
    <button class="btn btn-warning mb-3" type="submit">
      Submit
    </button>
  </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="undefined" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="undefined"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../component/navbar.css">
</head>

<body >
  <?php include("../component/navbar.html"); ?>
  <div class="container d-flex flex-column align-items-center">
    <table class="table border-5 rounded-3 overflow-hidden ">
      <colgroup>
        <col span="1" style="width: 5%;">
        <col span="1" style="width: 70%;">
        <col span="1" style="width: 25%;">
      </colgroup>
      <thead>
        <tr>
          <th scope="col">
            <p class="text-primary mb-2">#</p>
          </th>
          <th scope="col">
            <p class="text-primary mb-2">CV Title</p>
          </th>
          <th scope="col">
            <p class="text-primary mb-2">Last Modified</p>
          </th>
        </tr>
      </thead>
      <tbody id="tableBody">
      </tbody>
    </table>
    <button type="button" class="btn btn-primary">Show more</button>
  </div>
  <script src="addTable.js" defer></script>
</body>

</html>
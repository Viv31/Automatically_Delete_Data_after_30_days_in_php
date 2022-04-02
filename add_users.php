<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Register User</h2>
  <form action="register_user.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="email">Username:</label>
      <input type="email" class="form-control" id="username" placeholder="Enter email" name="username">
    </div>
    <button type="submit" class="btn btn-primary" name="insert" id="insert">Insert User</button>
  </form>
</div>
</body>
</html>

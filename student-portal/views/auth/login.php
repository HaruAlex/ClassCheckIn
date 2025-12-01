<?php require_once '../../includes/session.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Đăng nhập</title>
  <!-- thêm tiền tố /student-portal vào đường dẫn CSS -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
  <?php include '../../includes/sidebar.php'; ?>
 <main class="main">
  <div class="form-center">
    <h3>Đăng nhập sinh viên</h3>
    <form method="post" action="/student-portal/controllers/AuthController.php">
      <input type="hidden" name="action" value="login">
      <label>Tài khoản</label>
      <input class="input" name="username" required>
      <label>Mật khẩu</label>
      <input class="input" type="password" name="password" required>
      <div style="margin-top:12px; text-align:center;">
        <button class="button">Đăng nhập</button>
      </div>
    </form>
  </div>
</main>

</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>

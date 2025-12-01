<?php 
require_once '../../includes/session.php'; 
requireStudent(); 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Đổi mật khẩu</title>
  <!-- thêm tiền tố /student-portal vào đường dẫn CSS -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
<?php include '../../includes/sidebar.php'; ?>
<main class="main">
  <div class="form-center">
    <h3>Đổi mật khẩu</h3>
    <form method="post" action="/student-portal/controllers/AuthController.php">
      <input type="hidden" name="action" value="change_password">
      <label>Mật khẩu cũ</label>
      <input class="input" type="password" name="old_password" required>
      <label>Mật khẩu mới</label>
      <input class="input" type="password" name="new_password" required>
      <div style="margin-top:12px; text-align:center;">
        <button class="button">Xác nhận</button>
      </div>
    </form>
  </div>
</main>

</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>

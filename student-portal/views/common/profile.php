<?php require_once '../../includes/session.php'; requireStudent(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Thông tin cá nhân</title>
  <!-- thêm tiền tố /student-portal vào đường dẫn CSS -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
<?php include '../../includes/sidebar.php'; ?>
<main class="main">
  <div class="profile-center">
    <h3>Thông tin cá nhân</h3>
    <table class="table">
      <tr><th>Họ tên</th><td><?= htmlspecialchars($_SESSION['user']['full_name'] ?? '') ?></td></tr>
      <tr><th>Tài khoản</th><td><?= htmlspecialchars($_SESSION['user']['username'] ?? '') ?></td></tr>
      <tr><th>Vai trò</th><td>Sinh viên</td></tr>
    </table>
    <div style="margin-top:12px; text-align:center;">
      <a class="button" href="/student-portal/views/common/profile_edit.php">Cập nhật thông tin</a>
      <a class="button ghost" href="/student-portal/views/auth/change_password.php">Đổi mật khẩu</a>
    </div>
  </div>
</main>

</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>

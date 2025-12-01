<?php require_once '../../includes/session.php'; requireStudent(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Cập nhật thông tin</title>
  <!-- thêm tiền tố /student-portal vào đường dẫn CSS -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
<?php include '../../includes/sidebar.php'; ?>
<main class="main">
  <div class="form-center">
    <h3>Cập nhật thông tin</h3>
    <form method="post" action="#">
      <label>Họ tên</label>
      <input class="input" value="<?= htmlspecialchars($_SESSION['user']['full_name'] ?? '') ?>">
      <label>Email</label>
      <input class="input" placeholder="sv001@university.edu">
      <label>Số điện thoại</label>
      <input class="input" placeholder="09xxxxxxxx">
      <div style="margin-top:12px; text-align:center;">
        <button class="button">Lưu</button>
        <a class="button ghost" href="/student-portal/views/common/profile.php">Hủy</a>
      </div>
    </form>
  </div>
</main>

</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>

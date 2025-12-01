<?php require_once '../../includes/session.php'; requireStudent(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Chi tiết điểm danh</title>
  <!-- thêm tiền tố /student-portal vào đường dẫn CSS -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
<?php include '../../includes/sidebar.php'; ?>
<main class="main">
  <div class="card" style="max-width:720px;">
    <h3>Chi tiết buổi điểm danh</h3>
    <?php if (isset($_GET['success'])): ?>
      <div class="badge success">Điểm danh thành công</div>
    <?php endif; ?>
    <table class="table">
      <tr><th>Mã điểm danh</th><td><?= htmlspecialchars($_GET['id'] ?? '') ?></td></tr>
      <tr><th>Lớp</th><td>CT101</td></tr>
      <tr><th>Môn</th><td>Cấu trúc dữ liệu</td></tr>
      <tr><th>Ngày</th><td>27/11/2025</td></tr>
      <tr><th>Thời gian QR</th><td>08:00 - 08:10</td></tr>
      <tr><th>Trạng thái</th><td><span class="badge success">Có mặt</span></td></tr>
    </table>
  </div>
</main>
</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>

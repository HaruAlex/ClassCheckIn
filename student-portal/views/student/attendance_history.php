<?php require_once '../../includes/session.php'; requireStudent(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Lịch sử điểm danh</title>
  <!-- thêm tiền tố /student-portal vào CSS và JS -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
  <script defer src="/student-portal/assets/js/filters.js"></script>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
<?php include '../../includes/sidebar.php'; ?>
<main class="main">
  <div class="card">
    <h3>Lịch sử điểm danh</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Môn học</th><th>Lớp</th><th>Ngày</th><th>Thời gian</th><th>Trạng thái</th><th>Mã</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Cấu trúc dữ liệu</td>
          <td>CT101</td>
          <td>27/11/2025</td>
          <td>08:00 - 08:10</td>
          <td><span class="badge success">Có mặt</span></td>
          <td>DD101</td>
        </tr>

</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>

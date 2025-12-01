<?php require_once '../../includes/session.php'; requireStudent(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Trang chủ sinh viên</title>
  <!-- thêm tiền tố /student-portal vào CSS và JS -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
  <script defer src="/student-portal/assets/js/app.js"></script>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
  <?php include '../../includes/sidebar.php'; ?>
  <main class="main">
    <div class="row">
      <div class="card col-6">
        <h3 style="margin:0 0 8px;">Điểm danh nhanh bằng QR</h3>
        <p class="muted">Quét mã QR tại lớp hoặc nhập mã phiên.</p>
        <div style="display:flex; gap:8px; margin-top:8px;">
          <!-- thêm tiền tố /student-portal -->
          <a class="button" href="/student-portal/views/student/qr_checkin.php">Quét QR</a>
          <a class="button ghost" href="/student-portal/views/student/attendance_history.php">Xem lịch sử</a>
        </div>
      </div>
      <div class="card col-6">
        <h3 style="margin:0 0 8px;">Tổng quan chuyên cần</h3>
        <div style="display:flex; gap:12px;">
          <span class="badge success">Có mặt: 12</span>
          <span class="badge warning">Muộn: 2</span>
          <span class="badge danger">Vắng: 1</span>
        </div>
      </div>
    </div>

    <div class="card">
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <h3 style="margin:0;">Lịch sử điểm danh theo học kỳ</h3>
        <div style="display:flex; gap:8px;">
          <select class="select" id="semesterSelect" style="width:180px;">
            <option value="2025-1">HK1 2025</option>
            <option value="2025-2">HK2 2025</option>
          </select>
          <input class="input" id="searchInput" placeholder="Tìm theo lớp/môn...">
        </div>
      </div>
      <table class="table" id="historyTable">
        <thead>
          <tr>
            <th>Môn học</th><th>Lớp</th><th>Ngày</th><th>Thời gian</th><th>Trạng thái</th><th>Chi tiết</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Cấu trúc dữ liệu</td>
            <td>CT101</td>
            <td>27/11/2025</td>
            <td>08:00 - 08:10</td>
            <td><span class="badge success">Có mặt</span></td>
            <!-- thêm tiền tố /student-portal -->
            <td><a class="button ghost" href="/student-portal/views/student/attendance_detail.php?id=DD101">Xem</a></td>
          </tr>
          <tr>
            <td>Lập trình Web</td>
            <td>WB202</td>
            <td>20/11/2025</td>
            <td>13:30 - 13:40</td>
            <td><span class="badge warning">Muộn</span></td>
            <!-- thêm tiền tố /student-portal -->
            <td><a class="button ghost" href="/student-portal/views/student/attendance_detail.php?id=DD245">Xem</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>

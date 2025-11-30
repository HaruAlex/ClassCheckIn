<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giảng viên - Hệ thống điểm danh</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef1f7;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: #2d8cf0;
            padding: 20px;
            position: fixed;
            color: white;
        }

        .sidebar a, .dropbtn {
            display: block;
            padding: 10px 0;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .sidebar a:hover, .dropbtn:hover {
            background: rgba(255,255,255,0.2);
            border-radius: 6px;
            padding-left: 14px;
        }

        .content {
            margin-left: 290px;
            padding: 25px;
            animation: fadeIn 0.4s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
            margin-bottom: 20px;
        }

        /* Dropdown */
        .dropdown-content {
            display: none;
            margin-left: 12px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Button style for functions */
        .func-button {
            display: inline-block;
            margin: 5px 5px 5px 0;
            padding: 8px 12px;
            background-color: #2d8cf0;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
        }

        .func-button:hover {
            background-color: #1b6fd1;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #2d8cf0;
            color: white;
        }

        input, select {
            padding: 6px;
            margin: 5px 0;
            width: 100%;
        }

        #qrCode {
            width: 150px;
            height: 150px;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>

</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>GIẢNG VIÊN</h2>

    <a onclick="loadPage('home')">🏠 Trang chủ</a>
    <a onclick="loadPage('history')">📅 Lịch sử điểm danh</a>
    <a onclick="loadPage('class')">📚 Lớp học phần</a>

    <div class="dropdown">
        <div class="dropbtn">🟦 Điểm danh QR ▼</div>
        <div class="dropdown-content">
            <a onclick="loadPage('createQR')">Tạo buổi điểm danh</a>
            <a onclick="loadPage('listQR')">Danh sách buổi điểm danh</a>
        </div>
    </div>

    <div class="dropdown">
        <div class="dropbtn">⚙️ Cài đặt tài khoản ▼</div>
        <div class="dropdown-content">
            <a onclick="loadPage('profile')">Thông tin cá nhân</a>
            <a onclick="loadPage('password')">Đổi mật khẩu</a>
        </div>
    </div>

    <a onclick="loadPage('logout')">🚪 Đăng xuất</a>
</div>

<!-- CONTENT -->
<div class="content" id="mainContent">
    <div class="card">
        <h2>👋 Chào mừng giảng viên!</h2>
        <p>Chọn chức năng ở menu bên trái để xem nội dung chi tiết.</p>
    </div>
</div>

<!-- JAVASCRIPT -->
<script>
function loadPage(page) {
    let content = document.getElementById("mainContent");

    function createButton(icon, label, action) {
        return `<button class="func-button" onclick="${action}">${icon} ${label}</button>`;
    }

    switch(page) {

        case "home":
            content.innerHTML = `
                <div class="card">
                    <h2>🏠 Trang chủ</h2>
                    <p>Chọn chức năng nhanh:</p>
                    ${createButton('📅','Lịch sử điểm danh',"loadPage('history')")}
                    ${createButton('📚','Lớp học phần',"loadPage('class')")}
                    ${createButton('🟦','Tạo buổi QR',"loadPage('createQR')")}
                    ${createButton('📝','Danh sách buổi QR',"loadPage('listQR')")}
                    ${createButton('👤','Thông tin cá nhân',"loadPage('profile')")}
                    ${createButton('🔐','Đổi mật khẩu',"loadPage('password')")}
                    ${createButton('🚪','Đăng xuất',"loadPage('logout')")}
                </div>`;
            break;

        case "history":
            content.innerHTML = `
                <div class="card">
                    <h2>📅 Lịch sử điểm danh</h2>
                    ${createButton('👀','Xem buổi điểm danh','showAttendanceHistory()')}
                    ${createButton('🔍','Lọc ngày/lớp','showFilterOptions()')}
                    <div id="historyContent"></div>
                </div>`;
            break;

        case "class":
            content.innerHTML = `
                <div class="card">
                    <h2>📚 Lớp học phần</h2>
                    ${createButton('📋','Danh sách môn','showSubjects()')}
                    ${createButton('👥','Số lượng sinh viên','showStudentCount()')}
                    ${createButton('🕒','Lịch học / 🏫 Phòng học','showSchedule()')}
                    ${createButton('✏','Quản lý sinh viên','manageStudents()')}
                    <div id="classContent"></div>
                </div>`;
            break;

        case "createQR":
            content.innerHTML = `
                <div class="card">
                    <h2>🟦 Tạo buổi điểm danh QR</h2>
                    ${createButton('📌','Chọn lớp','chooseClass()')}
                    ${createButton('⏰','Chọn thời gian','chooseTime()')}
                    ${createButton('📱','Tạo QR','generateQR()')}
                    <div id="qrContent"></div>
                </div>`;
            break;

        case "listQR":
            content.innerHTML = `
                <div class="card">
                    <h2>📝 Danh sách buổi điểm danh</h2>
                    ${createButton('📋','Xem danh sách buổi','listSessions()')}
                    <div id="listQRContent"></div>
                </div>`;
            break;

        case "profile":
            content.innerHTML = `
                <div class="card">
                    <h2>👤 Thông tin cá nhân</h2>
                    ${createButton('📧','Email','editEmail()')}
                    ${createButton('📞','Số điện thoại','editPhone()')}
                    ${createButton('🖼','Ảnh đại diện','editAvatar()')}
                    <div id="profileContent"></div>
                </div>`;
            break;

        case "password":
            content.innerHTML = `
                <div class="card">
                    <h2>🔐 Đổi mật khẩu</h2>
                    ${createButton('🔑','Mật khẩu cũ','showOldPasswordInput()')}
                    ${createButton('🆕','Mật khẩu mới','showNewPasswordInput()')}
                    ${createButton('✅','Xác nhận','changePassword()')}
                    <div id="passwordContent"></div>
                </div>`;
            break;

        case "logout":
            content.innerHTML = `
                <div class="card">
                    <h2>🚪 Đăng xuất</h2>
                    ${createButton('❗','Xác nhận','alert("Đã đăng xuất!")')}
                    ${createButton('❌','Hủy','alert("Hủy thao tác")')}
                </div>`;
            break;
    }
}

// --- Demo functions cho nút ---
function showAttendanceHistory() {
    document.getElementById('historyContent').innerHTML = `
        <table>
            <tr><th>Buổi</th><th>Lớp</th><th>Ngày</th><th>Sinh viên điểm danh</th></tr>
            <tr><td>1</td><td>CT101</td><td>27/11/2025</td><td>30/32</td></tr>
            <tr><td>2</td><td>CT102</td><td>26/11/2025</td><td>28/30</td></tr>
        </table>`;
}

function showFilterOptions() {
    document.getElementById('historyContent').innerHTML = `
        <label>Chọn lớp:</label>
        <select><option>CT101</option><option>CT102</option></select>
        <label>Chọn ngày:</label>
        <input type="date">`;
}

function showSubjects() {
    document.getElementById('classContent').innerHTML = `
        <ul>
            <li>CT101 - Lập trình C#</li>
            <li>CT102 - Cơ sở dữ liệu</li>
        </ul>`;
}

function showStudentCount() {
    document.getElementById('classContent').innerHTML = `<p>Số sinh viên hiện tại: 32</p>`;
}

function showSchedule() {
    document.getElementById('classContent').innerHTML = `<p>Lịch học: T2/T4 8:00-10:00 | Phòng A101</p>`;
}

function manageStudents() {
    document.getElementById('classContent').innerHTML = `<p>Chức năng thêm/xóa/sửa sinh viên.</p>`;
}

function chooseClass() {
    document.getElementById('qrContent').innerHTML = `<select><option>CT101</option><option>CT102</option></select>`;
}

function chooseTime() {
    document.getElementById('qrContent').innerHTML = `<input type="datetime-local">`;
}

function generateQR() {
    document.getElementById('qrContent').innerHTML = `<div id="qrCode">QR CODE</div>`;
}

function listSessions() {
    document.getElementById('listQRContent').innerHTML = `
        <table>
            <tr><th>Buổi</th><th>Trạng thái</th></tr>
            <tr><td>1</td><td>Đã mở</td></tr>
            <tr><td>2</td><td>Đã đóng</td></tr>
        </table>`;
}

function editEmail() {
    document.getElementById('profileContent').innerHTML = `<input type="email" placeholder="Nhập email mới">`;
}

function editPhone() {
    document.getElementById('profileContent').innerHTML = `<input type="text" placeholder="Nhập số điện thoại">`;
}

function editAvatar() {
    document.getElementById('profileContent').innerHTML = `<input type="file">`;
}

function showOldPasswordInput() {
    document.getElementById('passwordContent').innerHTML = `<input type="password" placeholder="Nhập mật khẩu cũ">`;
}

function showNewPasswordInput() {
    document.getElementById('passwordContent').innerHTML = `<input type="password" placeholder="Nhập mật khẩu mới">`;
}

function changePassword() {
    alert("Mật khẩu đã được thay đổi!");
}

</script>

</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách lớp học phần</title>
    <link rel="stylesheet" href="../CSS/GiangVien.css">
    <?php include('GiangVien.php'); ?>
<style>


    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

#searchInput {
    width: 100%;
    max-width: 400px;
    padding: 10px;
    margin: 0 auto 20px auto;
    display: block;
    border-radius: 5px;
    border: 1px solid #ccc;
}


    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #2d8cf0;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
</style>
</head>
<body>

<h2>Danh sách lớp học phần</h2>

<input type="text" id="searchInput" placeholder="Tìm kiếm lớp học phần...">

<table id="classTable">
    <thead>
        <tr>
            <th>Mã lớp HP</th>
            <th>Môn học</th>
            <th>Thứ</th>
            <th>Tiết</th>
            <th>Phòng</th>
            <th>Học kỳ</th>
            <th>Năm học</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>CT101</td>
            <td>Lập trình C</td>
            <td>2</td>
            <td>1-3</td>
            <td>A102</td>
            <td>HK1</td>
            <td>2024-2025</td>
        </tr>
        <!-- Bạn có thể thêm các dòng khác ở đây -->
    </tbody>
</table>

<script>
const searchInput = document.getElementById('searchInput');
const table = document.getElementById('classTable').getElementsByTagName('tbody')[0];

searchInput.addEventListener('keyup', function() {
    const filter = searchInput.value.toLowerCase();
    const rows = table.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let match = false;
        for (let j = 0; j < cells.length; j++) {
            if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                match = true;
                break;
            }
        }
        rows[i].style.display = match ? '' : 'none';
    }
});
</script>

</body>
</html>

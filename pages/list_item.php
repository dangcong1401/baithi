<?php
include '../config.php';

// Lấy danh sách sản phẩm từ database
$sql = "SELECT * FROM item_sale";
$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}

// Xử lý thêm sản phẩm nếu có request POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $expired_date = $_POST['expired_date'];
    $note = $_POST['note'];

    $sql_insert = "INSERT INTO item_sale (item_code, item_name, quantity, expired_date, note) 
                   VALUES ('$item_code', '$item_name', '$quantity', '$expired_date', '$note')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='list_item.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .action-icons a {
            margin: 0 5px;
            font-size: 1.2rem;
            transition: 0.3s;
        }
        .action-icons a:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center text-primary mt-3">Danh sách sản phẩm</h3>
        <div class="text-end mb-3">
            <a href="add_item.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
        </div>
        <div class="table-container">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Hạn Sử Dụng</th>
                        <th>Ghi Chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['item_code'] ?></td>
                                <td><?= $row['item_name'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= date('d/m/Y', strtotime($row['expired_date'])) ?></td>
                                <td><?= $row['note'] ?></td>
                                <td class="action-icons">
                                    <a href="edit_item.php?id=<?= $row['id'] ?>" class="text-warning" data-bs-toggle="tooltip" title="Chỉnh sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete_item.php?id=<?= $row['id'] ?>" class="text-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" data-bs-toggle="tooltip" title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } 
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-danger'>Không có sản phẩm nào!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

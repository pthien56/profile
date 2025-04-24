<?php
session_start();

$khachSan = [
    [
        'id' => 'KS1',
        'name' => 'Khach San A',
        'address' => 'Thanh Hoa',
        'price_one' => '1000',
        'price_two' => '2000'
    ],
    [
        'id' => 'KS2',
        'name' => 'Khach San B',
        'address' => 'Ha Noi',
        'price_one' => '2000',
        'price_two' => '3000'
    ],
];

$ksSearch = $khachSan;
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['search'])) {
    $ksSearch = [];
    foreach ($ksSearch as $ks) {
        if ($ks['name'] == $_GET['search'] || $ks['address'] == $_GET['search']) {
            $ksSearch[] = $ks;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <h2>Danh sach khach san</h2>
    <form method="get">
        <input type="text" name="search" id="search" placeholder="Nhap ten khach san ..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit" class="btn btn-primary">Tim kiem</button>
        <a href="khachsan.php" class="btn btn-secondary">Reset</a>
    </form>
    <table class="table table-bordered">
        <th>ID</th>
        <th>Tên Khách sạn</th>
        <th>Địa chỉ</th>
        <th>Giá phòng đơn</th>
        <th>Giá phòng đôi</th>
        </tr>


        <?php


        if (empty($ksSearch)) {
            echo 'Không tìm thấy khách sạn phù hợp.';
        };
        ?>

        <?php foreach ($ksSearch as $kh) : ?>

            <tr>
                <td><?= $kh['id'] ?></td>
                <td><?= $kh['name'] ?></td>
                <td><?= $kh['address'] ?></td>
                <td><?= $kh['price_one'] ?></td>
                <td><?= $kh['price_two'] ?>
                </td>
                <td>

                </td>
            </tr>

        <?php endforeach ?>
    </table>

    <h4>
        <a href="logout.php">Đăng xuất</a>
    </h4>
</body>

</html>
<?php

$stdate = (isset($_GET['stdate']))?$_GET['stdate']:date("Y-m-d");
$endate = (isset($_GET['endate']))?$_GET['endate']:date("Y-m-d");

if (isset($_GET['rmid'])) {
    $rmid = $_GET['rmid'];
    $bkin = $_GET['bkin'];
    $bkstatus = $_GET['bkstatus'];
    require 'config/config.php';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองห้องพัก</title>
</head>
<body>
    <form action="books_list.php" method="GET">
    <label>เข้าพักวันที่</label>
        <input type="date" name="stdate" value="<?php echo $stdate; ?> " required/>
        <label>ถึง</label>
        <input type="date" name="endate" value="<?php echo $endate; ?> " required/>
        <button type="sumit">ค้นหา</button>
        <a href="books_list.php">วันนี้</a>
        <a href="books_range.php">ทำรายการจอง</a>
    </form>
    <table border="1" cellspacing="1" cellpadding="2">
        <thead>
            <tr>
                <th>จัดการ</th>
                <th>เลขที่ห้อง</th>
                <th>ประเภท</th>
                <th>วันเข้า</th>
                <th>วันออก</th>
                <th>จำนวนวัน</th>
                <th>ค่าที่พัก</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        $sql = "SELECT * FROM books
        LEFT JOIN rooms ON books.rmid=rooms.rmid
        LEFT JOIN roomtype ON rooms.rmtype=roomtype.rmtype
        WHERE books.bkin BETWEEN '$stdate' AND '$endate' AND books.bkstatus = '1'";

        $result = $conn->query($sql);

             while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
                $sumprice = $dats * (int)$row['rmprice'];
            ?>
            <tr>
                <td>
                    <a href="javascript:bookstatus('<?php echo $row['rmid']?>','<?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?>','0')">
                    ยกเลิก</a>
                    <a href="javascript:bookstatus('<?php echo $row['rmid']?>','<?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?>','2')">
                    เข้าพัก</a>
                </td>
                <td><?php echo $row['rmid']?></td>
                <td><?php echo $row['tpname']?></td>
                <td><?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?></td>
                <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
                <td><?php echo $days?></td>
                <td align="right"><?php echo number_format($sumprice,0);?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
    var vurl = "books_list.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";

    function bookstatus(v1, v2, v3) {
        var v4 = vurl + "&rmid=" + v1 + "&bkin=" + v2 + "&bkstatus=" + v3;
        window.location.replace(v4);
    }
</script>


</body>
</html>
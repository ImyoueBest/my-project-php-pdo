<?php 

    $nowdate = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองหัองพัก</title>
</head>
<body>
    <form action="books_form.php" method="get">
        <label>เข้าพักวันที่</label>
        <input type="date" name="bkin" value="<?php echo $nowdate; ?> " required/>
        <label>ถึง</label>
        <input type="date" name="bkout" value="<?php echo $nowdate; ?> " required/>
        <button type="sumit">ตกลง</button>
        <a href="books_list.php">ย้อนกลับ</a>
    </form>
</body>
</html>
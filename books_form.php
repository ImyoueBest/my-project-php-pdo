    <?php
    require 'config/config.php';

    $bkin = (isset($_GET['bkin'])) ? $_GET['bkin'] : date("Y-m-d");
    $bkout = (isset($_GET['bkout'])) ? $_GET['bkout'] : date("Y-m-d");
    $bkcust = (isset($_GET['bkcust'])) ? $_GET['bkcust'] : "";
    $bktel = (isset($_GET['bktel'])) ? $_GET['bktel'] : "";
    $q = (int)(isset($_GET['q'])) ? $_GET['q'] : 0;

    

    $days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');

    if ($days < 1) {
        header("location: books_range.php");
        exit();
    }

    if (isset($_GET['rmid'])) {
        $rmid = $_GET['rmid'];
        $bkstatus = 0;
        require 'books_status.php';
    }

    if ($q > 0) {
        $kw = " AND roomtype.rmtype='$q'";
    } else {
        $kw = "";
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
        <!-- เป็นการทำระบบเกี่ยวกับการค้นหา type ต่างๆของห้อง -->
        <form action="books_form.php" method="get">
        <label>เข้าพักวันที่</label>
        <input type="date" name="bkin" value="<?php echo $bkin; ?> " readonly/>
        <input type="date" name="bkout" value="<?php echo $bkout; ?> " readonly/>
            <input type="hidden" name="bkcust" value="<?php echo $bkcust; ?>"/>
            <input type="hidden" name="bktel" value="<?php echo $bktel; ?>"/>

            <select name="q" id="q">
                <option value="0">ทั้งหมด</option>
                <?php
                $sql = "SELECT * FROM roomtype ORDER BY rmtype ASC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                    <option value="0"<?php echo $row['rmtype'];?>><?php echo $row['tpname']; ?>ทั้งหมด</option>
                <?php } ?>

            </select>
            <button type="submit">ค้นหา</button>
        </form><br>
        <form action="book_insert.php" method="post">
            <input type="hidden" name="bkin" value="<?php echo $bkin; ?>" />
            <input type="hidden" name="bkout" value="<?php echo $bkout; ?>" />
            <label>ผู้จอง :</label>
            <input type="text" name="bkcust" value="<?php echo $bkcust; ?>" required/><br />
            <label>เบอร์โทรศัพท์ :</label>
            <input type="text" name="bktel" value="<?php echo $bktel; ?>" required/><br />
            <label>เลือกห้อง :</label>
        <select name="rmid" size="10" required>
            <?php
            $sql = "SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype 
                WHERE rmid NOT IN (SELECT rmid FROM books WHERE bkstatus = '1' 
                AND ((bkin >= $bkin AND bkin < $bkout)
                OR (bkin < $bkin AND bkout >= $bkin)))" . $kw;
            $result = $conn->query($sql);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
                <option value="0"<?php echo $row['rmid'];?>">
                    <?php echo $row['rmid'];?> &nbsp;
                    <?php echo $row['tpname'];?> &nbsp;
                    <?php echo number_format($row['rmprice']),0;?>
                </option>
            <?php } ?>
        </select><br>
           </form>
           <?php require 'books_room.php'?>
            <a href="books_list.php">ย้อนกลับ</a>
        <script>
            document.getElementById('q').value = "<?php echo $q; ?>";
        </script>
         <button type="submit">บันทึก</button>
      

    </body>
</html>
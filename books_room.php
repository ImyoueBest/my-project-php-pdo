<?php 
$sql = "SELECT * FROM books 
LEFT JOIN rooms ON books.rmid = rooms.rmid 
LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype 
WHERE books.bkin = '$bkin' AND books.bktel = '$bktel' AND books.bkstatus = '1'";


    $result = $conn->query("$sql");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book_rooms</title>
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="2">
        <thead>
            <tr>
                <th>ยกเลิก</th>
                <th>เลขที่ห้อง</th>
                <th>ประเภท</th>
                <th>วันที่เข้าพัก</th>
                <th>วันที่ออก</th>
                <th>ราคา/คืน</th>
            </tr>
        </thead>
    </table>
    <table>
        <?php
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>
        
            <tr>
                <td>
                      <a href="javascript:bookcancel('<?php echo $row['rmid']?>');">ยกเลิก</a>
                </td>
                <td><?php echo $row['rmid']?></td>
                <td><?php echo $row['tpname']?></td>
                <td><?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?></td>
                <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
                <td align="right"><?php echo number_format($row['rmprice']),0;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
      <script>
    function bookcancel(v1) {
        window.location.href = "book_form.php?bkin=<?php echo $bkin;?>&bkout=<?php echo $bkout;?>&bkcust=<?php echo $bkcust;?>&bktel=<?php echo $bktel;?>&rmid=" + v1;
    }
</script>

    </script>
</body>
</html>
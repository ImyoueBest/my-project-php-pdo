<?php 
    session_start();
    // require 'config/db2.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<div class="container">
    <h3 class="mt-4">เข้าสู่ระบบ</h3>
    <hr>
    <form>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
        </div>
        <button type="submit" name="signin" class="btn btn-primary">Sign Up</button>
        <hr>
        <p>ยังไม่เป็นสมาชิกใช่ใหม คลิ๊กที่นี่เพื่อ</p><a href="index2.php">สมัครสมาชิก</a>
    </form>
</div>
<body>
    
</body>

</html>
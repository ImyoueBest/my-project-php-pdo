<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Outfit:wght@200&display=swap"
        rel="stylesheet">
</head>

<style>
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-image: url(https://media.robinhoodstory.com/upload/page_builder_image/cms-img-20230807_s_98WRF10BU4.webp);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    font-family: 'Comfortaa', cursive;
    font-family: 'Outfit', sans-serif;
}

.container {
    display: flex;
    text-align: center;
    justify-content: space-between;
    margin: auto;
    padding: auto;
    background-color: white;
    border-top: 2px solid black;
    border-bottom: 2px solid black;
}

.container h2 {
    margin-left: 20px;
}

.container-a {
    margin: auto;
    text-align: center;
    color: black;
}

.container-a a {
    text-decoration: none;
    margin: 10px;
    font-size: 18px;
    color: black;

}

.btn-header button {
    background-color: red;
    width: 100px;
    height: 50px;
    text-align: center;
    border-color: black;
    color: black;
    font-size: 1rem;
    border-radius: 20px;
    margin-top: 8px;
    margin-right: 20px;
    cursor: pointer;
    background-color: transparent;
    border: 2px solid black;
}

.container-a a:hover {
    background-color: gray;
    background-image: transparent;
    padding: 10px 10px;
    border-radius: 15px;
    border: 1px solid black;
    transition: 0.5s ease-in-out;
}


body,
html {
    height: 100%;
}

* {
    box-sizing: border-box;
}

.bg-image {
    background-image: url("photographer.jpg");
    filter: blur(8px);
    -webkit-filter: blur(8px);
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.bg-text {
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
    color: white;
    font-weight: bold;
    border: 3px solid #f1f1f1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 80%;
    padding: 20px;
    text-align: center;
}

.main {

    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
    color: white;
    font-weight: bold;
    border: 3px solid #f1f1f1;
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 70%;
    padding: 20px;
    text-align: center;
}

.main h2 {
    font-size: 30px;
}

.lorem-p {
    display: flex;
    text-align: center;
    justify-content: center;
}

.btn-signin {
    display: flex;
    justify-content: center;
}

.btn-signin button {
    width: 120px;
    height: 60px;
    background-color: yellow;
    font-size: 15px;
    border: 2px solid white;
    background-color: transparent;
    color: white;
    font-size: 17px;
    cursor: pointer;
}

.container-footer {
    display: flex;
    text-align: center;
    justify-content: center;
    background-color: white;
    border-top: 2px solid black;
    border-bottom: 2px solid black;
    position: relative;
    top: 855px;
    align-items: flex-end;
}

.img {
    display: flex;
    justify-content: center;
    position: relative;
    top: 200px;
}
</style>

<body>
    <header class="container">
        <h2>Admin</h2>
        <div class="container-a">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="service.php">Service</a>
        </div>
        <div class="btn-header">
            <center>
                <a href="index.php">
                    <button type="submit">Logout</button>
                </a>
            </center>
        </div>
    </header>
    <center>
        <div class="container-main"></div>

        <div class="bg-image"></div>

        <div class="bg-text">
            <h1>Welcome to my hotel (Admin)</h1>
            <p>นี่คือหน้าสำหรับการดู form list ของ user</p>

            <div class="btn-signin">
                <a href="books_list.php">
                    <button type="submit" name="btn-signin">ดูรายการทั้งหมด</button>
                </a>
            </div>
        </div>
        </div>
        <footer class="container-footer">
            <h3>@Nattapong Pailom</h3>
        </footer>
</body>
</body>

</html>
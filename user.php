<?php 


    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
        header("location: signin.php");
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
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Outfit:wght@200&display=swap" rel="stylesheet">
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

    .container-main {
        background-image: url(https://cms.dmpcdn.com/travel/2020/05/08/15adf7b0-9108-11ea-81cb-7509caae9194_original.JPG);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur(3px);
        -webkit-filter: blur(3px);
        height: 100%; 
        padding-bottom: 30px;
        width: auto;
        border-radius: 20px;
        width: 80%;
        height: 400px;
        margin-top: 50px;
        border: 2px solid black;
        box-shadow: 4px 1px 12px 11px rgba(0, 0, 0, 0.28);
    }



    .main {

        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0, 0.4); 
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

    .container-blox {
        display: flex;
        text-align: center;
        justify-content: center;
        color: aliceblue;
    }

    .blox-1 {
        background-color: blue;
        margin: 50px 20px;
        padding: 30px;
        border-radius: 15px;
        background-image: url(https://travel.mthai.com/app/uploads/2014/06/sripanwa.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 4px 1px 12px 11px rgba(0, 0, 0, 0.28);
    }


    .blox-1:hover {
        background-color: blue;
        margin: 50px 20px;
        padding: 30px;
        border-radius: 15px;
        background-image: url(https://travel.mthai.com/app/uploads/2014/06/sripanwa.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 4px 1px 12px 11px rgba(0, 0, 0, 0.28);
        transform: translate(-25px, -25px);
        transition: 1.5s ease-in-out;
    }

    .blox-1 h4 {
        position: relative;
        top: -25px;
        font-size: 20px;
        color: black;
    }

    .blox-1 hr {
        position: relative;
        top: -40px;
        width: 100%;
    }

    .blox-1 p {
        position: relative;
        top: -20px;
        color: black;
    }

    .container-blox input {
        width: 100px;
        height: 50px;
        background-color: black;
        background-color: transparent;
        border: 2px solid black;
        border-radius: 20px;
        font-size: 16px;
        color: blcak;
        cursor: pointer;
    }

    .blox-2 {
        background-color: blue;
        margin: 50px 20px;
        padding: 30px;
        border-radius: 15px;
        background-image: url(https://media.robinhoodstory.com/upload/page_builder_image/cms-img-20230807_s_dSlAxtekH6.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 4px 1px 12px 11px rgba(0, 0, 0, 0.28);
    }
    
    .blox-2:hover {
        background-color: blue;
        margin: 50px 20px;
        padding: 30px;
        border-radius: 15px;
        background-image: url(https://media.robinhoodstory.com/upload/page_builder_image/cms-img-20230807_s_dSlAxtekH6.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 4px 1px 12px 11px rgba(0, 0, 0, 0.28);
        transform: translate(0px, -25px);
        transition: 1.5s ease-in-out;
    }

    .blox-2 h4 {
        position: relative;
        top: -25px;
        font-size: 20px;
        color: black;
    }


    .blox-2 hr {
        position: relative;
        top: -40px;
        width: 100%;
    }

    .blox-2 p {
        position: relative;
        top: -20px;
        color: black;
    }

    .blox-3 {
        background-color: blue;
        margin: 50px 20px;
        padding: 20px;
        border-radius: 15px;
        background-image: url(https://media.robinhoodstory.com/upload/page_builder_image/cms-img-20230808_s_POZn3KL2qr.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 4px 1px 12px 11px rgba(0, 0, 0, 0.28);
    }

    .blox-3:hover {
        background-color: blue;
        margin: 50px 20px;
        padding: 20px;
        border-radius: 15px;
        background-image: url(https://media.robinhoodstory.com/upload/page_builder_image/cms-img-20230808_s_POZn3KL2qr.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 4px 1px 12px 11px rgba(0, 0, 0, 0.28);
        transform: translate(25px, -25px);
        transition: 1.5s ease-in-out;
    }

    .blox-3 h4 {
        position: relative;
        top: -25px;
        font-size: 20px;
        color: black;
    }

    .blox-3 hr {
        position: relative;
        top: -40px;
        width: 100%;
    }

    .blox-3 p {
        position: relative;
        top: -20px;
        color: black;
    }

    hr {
        position: relative;
        top: 25px;
        color: aquamarine;
        border-style: dashed ;
    }

    .container-footer {
        display: flex;
        text-align: center;
        justify-content: center;
        background-color: white;
        border-top: 2px solid black;
        border-bottom: 2px solid black;
        position: relative;
        top: 30px;
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
        <h2>LOGO</h2>
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
    <div class="main">
        <h2>Welcome to my hotel</h2>
        <div class="lorem-p">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, nostrum praesentium impedit reiciendis suscipit aut cupiditate! Veritatis officia saepe nam!</p>
        </div>
        <div class="btn-signin">
            <a href="index.php">
            <button type="submit" name="btn-signin">ลงทะเบียน</button>
            </a>
        </div>
    </div>
        
       
    </center>
    <div class="container-blox">

       <div class="blox-1">
        <h4>Child</h4>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, minima.</p>
        <a href="books_form.php">
            <input type="submit" name="btn-get" value="จองห้องพัก">
        </a>
    </div>
    <div class="blox-2">
        <h4>Pro for child</h4>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, minima.</p>
        <a href="books_form.php">
            <input type="submit" name="btn-get" value="จองห้องพัก">
        </a>
    </div>
    <div class="blox-3">
        <h4>Adult</h4>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, minima.</p>
        <a href="books_form.php">
            <input type="submit" name="btn-get" value="จองห้องพัก">
        </a>
    </div>


 </div>
    <footer class="container-footer">
        <h3>@Nattapong Pailom</h3>
    </footer>
</body>
</body>
</html>
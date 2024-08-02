<!DOCTYPE html>
<html>
    <head>
     <meta charset="utf-8">
     <title>AGRO-INPUTS</title>
     <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
     <link rel="icon" type="image/jpg" href="profile/lg.jpg">
    </head>

    <style type="text/css">
      *{
        margin: 0px;
        padding: 0px;
       }
       .banner{
        width: 100%;
        height: 100vh;
        background-image:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url("profile/fm.jpg");
        background-size: cover;
        background-position: center; 

       }
       .navbar{
        width:85%;
        margin:auto;
        padding: 35px 0;
        display: flex;
        align-items:center;
        justify-content: space-between; 
        }
      .logo{
        width: 120px;
        cursor:pointer;
        border-radius: 40px;
       }
       .navbar ul li{
        list-style: none;
        display: inline-block;
        margin: 0 20px;
        position: relative;
       } 
       .navbar ul li a{
        text-decoration: none;
        color:white;
        font-weight: bold;
        
       }
      .navbar ul li::after{
        content: '';
        height: 3px;
        width:0;
        background:#009688;
        position: absolute;
        left: 0;
        bottom:-10px;
        transition: 0.8s;
      }
      .navbar ul li:hover::after{
        width: 100%;
      }
      .content{
        width: 100%;
        position:absolute;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        color: white;
      }
      .content h1{
        font-size: 70px;
        margin-top: 80px;
      }
     .content p{
        margin: 20px auto;
        font-weight: 100;
        font-size: 20px;
        line-height: 25px;
      }
      button{
        width: 200px;
        padding: 15px 0;
        text-align: center;
        margin: 20px 10px;
        border-radius: 25px;
        font-weight: bold;
        border: 2px solid #009688;
        background:transparent;
        color: white;
        cursor: pointer;
        position:relative;
        overflow: hidden;
      }
      span{
        background:#009688;
        height: 100%;
        width:0;
        border-radius: 25px;
        position: absolute; 
        left: 0;
        bottom: 0;
        z-index:-1;
        transition: 0.5s; 
      }
      button:hover span{
        width: 100%;
      }
      button:hover{
        border:none;
      }
    </style>
    <body>
        <div class="banner">
            <div class="navbar">
               <img src="profile/lg.jpg" class="logo" style="border-radius:30%; width:80px;
                height: 80px;">
                <ul>
                  <li><a href="#"><i class="fas fa-home"></i>HOME</a></li>
                  <li><a href="products.php"><i class="fa fa-shopping-basket"></i>PRODUCTS</a></li>
                  <li><a href="about us.html"><i class="fas fa-address-card"></i>ABOUT US</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <h1>AGRI-INPUTS</h1>
            <p>Our product your maket</p>
            <div>
              <a href="register.php"><button type="button"><span></span>REGISTER</button></a>
              <a href="signup.php"><button type="button"><span></span></span>LOGIN</button></a>
            </div>
        </div>
    </body>
</html>
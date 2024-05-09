{{-- <script type="text/javascript">
    window.location = "/";
</script> --}}
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form in HTML & CSS | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style type="text/css">/* Google Font Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: "Poppins" , sans-serif;
        }
        body{
          min-height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
          background: #fff;
          padding: 30px;
        }
        .container{
          position: relative;
          max-width: 850px;
          width: 100%;
          background: #fff;
          padding: 40px 30px;
          box-shadow: 0 5px 10px rgba(0,0,0,0.2);
          perspective: 2700px;
        }
        .container .cover{
          position: absolute;
          top: 0;
          left: 50%;
          height: 100%;
          width: 50%;
          z-index: 98;
          transition: all 1s ease;
          transform-origin: left;
          transform-style: preserve-3d;
        }
        .container #flip:checked ~ .cover{
          transform: rotateY(-180deg);
        }
         .container .cover .front,
         .container .cover .back{
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
        }
        .cover .back{
          transform: rotateY(180deg);
          backface-visibility: hidden;
        }
        .container .cover::before,
        .container .cover::after{
          content: '';
          position: absolute;
          height: 100%;
          width: 100%;
          opacity: 0.5;
          z-index: 12;
        }
        .container .cover::after{
          opacity: 0.3;
          transform: rotateY(180deg);
          backface-visibility: hidden;
        }
        .container .cover img{
          position: absolute;
          height: 100%;
          width: 100%;
          object-fit: cover;
          z-index: 10;
        }
        .container .cover .text{
          position: absolute;
          z-index: 130;
          height: 100%;
          width: 100%;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
        }
        .cover .text .text-1,
        .cover .text .text-2{
          font-size: 26px;
          font-weight: 600;
          color: #fff;
          text-align: center;
        }
        .cover .text .text-2{
          font-size: 15px;
          font-weight: 500;
        }
        .container .forms{
          height: 100%;
          width: 100%;
          background: #fff;
        }
        .container .form-content{
          display: flex;
          align-items: center;
          justify-content: space-between;
        }
        .form-content .login-form,
        .form-content .signup-form{
          width: calc(100% / 2 - 25px);
        }
        .forms .form-content .title{
          position: relative;
          font-size: 24px;
          font-weight: 500;
          color: #333;
        }
        .forms .form-content .title:before{
          content: '';
          position: absolute;
          left: 0;
          bottom: 0;
          height: 3px;
          width: 25px;
          background: #7d2ae8;
        }
        .forms .signup-form  .title:before{
          width: 20px;
        }
        .forms .form-content .input-boxes{
          margin-top: 30px;
        }
        .forms .form-content .input-box{
          display: flex;
          align-items: center;
          height: 50px;
          width: 100%;
          margin: 10px 0;
          position: relative;
        }
        .form-content .input-box input{
          height: 100%;
          width: 100%;
          outline: none;
          border: none;
          padding: 0 30px;
          font-size: 16px;
          font-weight: 500;
          border-bottom: 2px solid rgba(0,0,0,0.2);
          transition: all 0.3s ease;
        }
        .form-content .input-box input:focus,
        .form-content .input-box input:valid{
          border-color: #7d2ae8;
        }
        .form-content .input-box i{
          position: absolute;
          color: #7d2ae8;
          font-size: 17px;
        }
        .forms .form-content .text{
          font-size: 14px;
          font-weight: 500;
          color: #333;
        }
        .forms .form-content .text a{
          text-decoration: none;
        }
        .forms .form-content .text a:hover{
          text-decoration: underline;
        }
        .forms .form-content .button{
          color: #fff;
          margin-top: 40px;
        }
        .forms .form-content .button input{
          color: #fff;
          background: #7d2ae8;
          border-radius: 6px;
          padding: 0;
          cursor: pointer;
          transition: all 0.4s ease;
        }
        .forms .form-content .button input:hover{
          background: #5b13b9;
        }
        .forms .form-content label{
          color: #5b13b9;
          cursor: pointer;
        }
        .forms .form-content label:hover{
          text-decoration: underline;
        }
        .forms .form-content .login-text,
        .forms .form-content .sign-up-text{
          text-align: center;
          margin-top: 25px;
        }
        .container #flip{
          display: none;
        }
        @media (max-width: 730px) {
          .container .cover{
            display: none;
          }
          .form-content .login-form,
          .form-content .signup-form{
            width: 100%;
          }
          .form-content .signup-form{
            display: none;
          }
          .container #flip:checked ~ .forms .signup-form{
            display: block;
          }
          .container #flip:checked ~ .forms .login-form{
            display: none;
          }
        }</style>
   </head>
<body>
  <div class="container">
    <div align="center">
        <img src="{{asset('img/smile3.png')}}" style="width: 150px"> <br />
        <h5>Selamat Anda Berhasil Registrasi</h5>
        <font size="-2">Auto Refresh ke halaman utama 3 second</font>
        <meta http-equiv="refresh" content="3;url=/">
    </div>
  </div>
</body>
</html>

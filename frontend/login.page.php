<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<style>
    * {
        font-family: 'Kanit', sans-serif;
    }
    
    body {
        background-color: #131835;
        min-height: 100vh;
    }
    .content{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;

    }

    .card {
        height:50%;
        width: 50%;
        border-radius: 20px;
    }

    .container {
        margin-top: 250px;
    }
    .button {
        background-color:rgb(118, 135, 224);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px;
        transition: ease-in-out 0.3s all; 
    }
    .button:hover {
        background-color:rgb(42, 47, 86);
        transform: scale(1.05);
    }
</style>

<body>
    <script src="https://accounts.google.com/gsi/client" async></script>
    <div class="content">
            <div class="card ms-5 shadow">
                <div class="card-body mx-5 ">
                    <h3 class="text-center mt-5">Login</h3>
                    <input type="email" class="form-control my-4" placeholder="Email" id="email">
                    <input type="password" class="form-control my-4" placeholder="password" id="password">
                    <button class="button form-control " onclick=login()>Login</button>
                    <div class="d-flex justify-content-center mt-3">
                        <div id="g_id_onload"
                            data-client_id="90310662516-8bc5o6v9casg97imrd8aoi99pnmbvutm.apps.googleusercontent.com"
                            data-context="signin"
                            data-ux_mode="popup"
                            data-callback="loginGoogle"
                            data-auto_prompt="false">
                        </div>

                        <div class="g_id_signin "
                            data-type="icon"
                            data-shape="circle"
                            data-theme="filled"
                            data-text="signin_with"
                            data-size="large"
                            data-locale="en-GB">
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <script>
        function decodeJwtResponse(token) {
            var base64Payload = token.split(".")[1];
            var payload = decodeURIComponent(
                atob(base64Payload)
                .split("")
                .map(function(c) {
                    return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
                })
                .join("")
            );
            return JSON.parse(payload);
        }


        function loginGoogle(response) {
            const responsePayload = decodeJwtResponse(response.credential);
            var formdata = new FormData();
            formdata.append("gId", responsePayload.sub);
            formdata.append("email", responsePayload.email);
            $.ajax({
                url: "../backend/check.login.php",
                type: "POST",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 9 || data == 5 || data == 1) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            timer: 800,
                            showConfirmButton: false,
                            title: "Login สำเร็จ"
                        }).then((result) => {
                            window.location.href = "superAdmin.page.php?page=home";
                        });
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            timer: 800,
                            showConfirmButton: false,
                            title: "Gmailของคุณไม่ได้ลงทะเบียนกับระบบไว้"
                        });
                    }
                }
            })
        }

        function login() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var formdata = new FormData();
            formdata.append("email", email);
            formdata.append("password", password);
            $.ajax({
                url: "../backend/check.login.php",
                type: "POST",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 9) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            timer: 800,
                            showConfirmButton: false,
                            title: "Login สำเร็จ"
                        }).then((result) => {
                            window.location.href = "superAdmin.page.php?page=home";
                        });
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            timer: 800,
                            showConfirmButton: false,
                            title: "Email หรือ Password ไม่ถูกต้อง"
                        });
                    }
                }
            })

        }
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
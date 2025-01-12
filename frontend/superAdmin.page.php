<?php
session_start();
if (!isset($_SESSION['User'])) {
    header("location:login.page.php");
} else {
    $user = $_SESSION['User'];
    $status = $user->status;
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>ManagementStock</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<style>
    * {
        font-family: 'Kanit', sans-serif;
    }

    body {
        min-height: 100vh;
    }

    .navbarSi {
        background-color: #212A59;
    }

    .navv {
        background-color: #FFFF;
    }

    .sidebar {
        background-color: #131835;
        height: 100%;
    }

    .content {
        background-color: #F3F3F3;
        height: 100%;
    }

    .cd1 {
        background-color: #212A59;
        border: 0px;
        border-radius: 15px;
    }
    .nav-link {
        transition: ease-in-out 0.3s all; 
    }
    .nav-link:hover {
        transform: scale(1.1);
        color:rgb(191, 115, 0);
    }
</style>

<body>
    <div class="row ">
        <div class="col-2 navbarSi ps-4 text-light py-3 text-centergit ">
            รัศมีอิเล็กทริกส์
        </div>
        <div class="col-10 navv pe-4 text-dark py-3">
            <div class="d-flex justify-content-between">
                <div class=""></div>
                <div class="me-3 d-flex ">
                    <span class="ms-3 me-4">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $user->firstname ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.page.php">Logout</a></li>
                        </ul>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="height: 100vh;">
        <div class="col-2 sidebar">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-light">
                <ul class="nav nav-pills flex-column ">
                    <li class="nav-item"><a href="?page=home" class="nav-link text-light py-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                            </svg> <strong class="pb-0 ">หน้าหลัก</strong></a></li>
                    <?php
                    if ($status == "5" || $status == "9" || $status == "1") {
                    ?>
                        <li class="nav-item"><a href="?page=InUp" class="nav-link text-light" id="InUpPro">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                                </svg>
                                <strong class="">จัดการสินค้าในคลัง</strong></a></li>
                        <hr>
                    <?php } ?>
                    <?php if ($status == "5" || $status == "9") { ?>

                        <li class="nav-item"><a href="?page=user" class="nav-link text-light" id="dUser">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                                พนักงาน</a></li>
                        <li class="nav-item"><a href="?page=LogCompany" class="nav-link text-light" id="dUser">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                    <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                </svg>
                                รายงานสรุปสาขา</a></li>
                        <hr>
                    <?php } ?>
                    <?php if ($status == "9") { ?>

                        <li class="nav-item"><a href="?page=Product" class="nav-link text-light" id="checkPro">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                                </svg>
                                รายการสินค้า</a></li>
                        <li class="nav-item"><a href="?page=Company" class="nav-link text-light" id="checkPro">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                                </svg>
                                สาขา</a></li>
                        <hr>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-10 content pt-2">
            <div class="row ">
            </div>
            <div id="iCen">

            </div>

        </div>
    </div>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            var name = urlParams.get('page');
            page(name);
            $(document).on("click", "#cancelDel", function() {
                Swal.fire({
                    title: "ยกเลิกแล้ว",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 800
                })
            })

            $(document).on("click", "#submitDel", function() {
                var memId = $(this).data("memid");
                var formdata = new FormData();
                formdata.append("memId", memId);
                $.ajax({
                    url: "../backend/del.User.php",
                    type: "POST",
                    data: formdata,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            Swal.fire({
                                position: "top-end",
                                title: "ลบเสร็จสิ้น",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 800
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                position: "top-end",
                                title: "เกิดข้อผิดพลาด",
                                icon: "error",
                                showConfirmButton: false,
                                timer: 800
                            })
                        }
                    }
                });
            });

            $(document).on("click", "#deluser", function() {
                var memId = $(this).data("memid");
                Swal.fire({
                    position: "center",
                    title: "ลบผู้ใช้คนนี้หรือไม่ ?",
                    html: "<hr><div class='d-flex justify-content-center'><button class='btn btn-danger me-4' id='cancelDel'>ยกเลิก</button>" +
                        "<button class='btn btn-success' data-memid='" + memId + "' id='submitDel'>ยืนยัน</button></div>",
                    showConfirmButton: false,
                });
            });

            $(document).on("click", "#changeStatus", function() {
                var change = $(this).data("status");
                var memId = $(this).data("memid");
                var formdata = new FormData();
                formdata.append("change", change);
                formdata.append("memId", memId);
                $.ajax({
                    url: "../backend/edit.status.php",
                    type: "POST",
                    data: formdata,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire({
                                position: "top-end",
                                title: "แก้ไขเสร็จสิ้น",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 800
                            });
                        } else {
                            Swal.fire({
                                position: "top-end",
                                title: "เกิดข้อผิดพลาด",
                                icon: "error",
                                showConfirmButton: false,
                                timer: 800
                            });
                        }
                    }
                })
            });
        });

        function page(page) {
            var formdata = new FormData();
            formdata.append("page", page);
            $.ajax({
                url: "page.all.php",
                type: "POST",
                data: formdata,
                dataType: "html",
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#iCen').html(data);
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
<?php  
session_start();
try {
    include("../include/connect.inc.php");
    
    $dataUser = $_SESSION['User'];
    $role = $dataUser->status == 9 ? 'SuperAdmin' : ($dataUser->status == 5 ? 'Admin' : 'user');
    $sqlCompany = "SELECT * FROM company WHERE companyId = '$dataUser->companyId'";
    $qCompany = $conn->query($sqlCompany);
    $dataCompany = $qCompany->fetch_object();

} catch (\Throwable $th) {
    echo $th;
}
    
?>
<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<style>
    html,
    body {
        background-color: #131835;
        min-height: 100vh;
    }

    .content {
        display: flex;
        align-items: center;
        min-height: 100vh;
        justify-content: center;
    }

    .card {
        width: 50%;
    }
</style>

<body>

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h2>Profile</h2>
            </div>
            <div class="card-body">
                <form id="form_updateData" onsubmit="submitForm(event)">
                    <div class="d-flex">
                        <div class="w-50 me-2" >
                            <label for="">ชื่อจริง</label>
                            <input required type="text" class="form-control" id="firstName" value="<?php echo $dataUser->firstname ?>">
                        </div>
                        <div class="w-50">
                            <label for="">นามสกุล</label>
                            <input required type="text" class="form-control" id="lastName" value="<?php echo $dataUser->lastname ?>">
                        </div>
                    </div>
                    <label for="">email</label>
                    <input required type="email" class="form-control" id='email' value="<?php echo $dataUser->email ?>">
                    <label for="">ตำแหน่ง</label>
                    <input required type="text" disabled="disabled" id="status" class="form-control" value="<?php echo $role ?>">
                    <label for="">สาขา</label>
                    <input required type="text" disabled="disabled" id="company" class="form-control mb-2" value="<?php echo $dataCompany->companyName ?>">
                    <button class="btn btn-success form-control" type="submit" id="btnSubmitProfile" >Done</button>
                    <button class="btn btn-warning mt-2" id="back">ย้อนกลับ</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            function submitForm(event){
                event.preventDefault();
                let firstName = document.getElementById('firstName').value
                let lastName = document.getElementById('lastName').value
                let email = document.getElementById('email').value
                
                let formData = new FormData();
                formData.append("firstName",firstName);
                formData.append("lastName",lastName);
                formData.append("email",email);

                $.ajax({
                    url:"../backend/update.profile.php",
                    type:'POST',
                    data:formData,
                    dataType:'text',
                    contentType:false,
                    processData:false,
                    success:function(res){
                        console.log(res)
                        if(res == '1'){
                            Swal.fire({
                                title:"แก้ไขเสร็จสิ้น",
                                icon:"success",
                                timer:2000,
                                showConfirmButton:false
                            }).then(() => {
                                window.location.reload()
                            })
                        }else{
                            Swal.fire({
                                title:"เกิดข้อผิดพลาด",
                                icon:"error",
                                timer:2000,
                                showConfirmButton:false
                            })
                        }
                    }
                })
                
                return false;
            }

            $(document).on("click","#back",function(){
                window.history.back()
            })
        </script>
</body>

</html>
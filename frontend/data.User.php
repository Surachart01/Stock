<?php  
    include("../include/connect.inc.php");
    session_start();
    $user = $_SESSION['User'];

    $companyId = $_POST['companyId'];

    $sql = "SELECT * FROM member WHERE companyId='$companyId'";
    $qSql = $conn->query($sql);
?>
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <table class="table" id="tableUser">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">email</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">สาขา</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                             while($data = $qSql->fetch_object()){
                                $sqlCompany = "SELECT * FROM company WHERE companyId='$data->companyId'";
                                $qCompany = $conn->query($sqlCompany);
                                $dataCompany = $qCompany->fetch_object();
                                $sqlStatus = "SELECT * FROM status WHERE statusId='$data->status'";
                                $qStatus = $conn->query($sqlStatus);
                                $dataStatus = $qStatus->fetch_object();
                        ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $data->firstname?></td>
                                    <td><?php echo $data->lastname?></td>
                                    <td><?php echo $data->email?></td>
                                    <td><?php echo $dataStatus->statusName?></td>
                                    <td><?php echo $dataCompany->companyName?></td>
                                    <td><button class="btn btn-warning" id="changeUser" data-iduser="<?php echo $data->memId ?>">แก้ไขข้อมูล</button></td>
                                </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                let table = new DataTable('#tableUser');

            })
            $(document).on("click","#changeUser",function(){
                var memId = $(this).data("iduser");
                var formdata = new FormData();
                formdata.append("memId",memId);
                $.ajax({
                    url:"edit.User.php",
                    type:"POST",
                    data:formdata,
                    dataType:"html",
                    contentType:false,
                    processData:false,
                    success:function(data){
                        Swal.fire({
                            position:"center",
                            showConfirmButton:false,
                            title:"แก้ไขข้อมูล",
                            html:data,
                        })
                    }
                })
            });

            $(document).on("click","#btnSubEdit",function(){
                var memId = $('#memId').val();
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var formdata = new FormData();
                formdata.append("firstname",firstname);
                formdata.append("lastname",lastname);
                formdata.append("email",email);
                formdata.append("memId",memId);
                    $.ajax({
                        url:"../backend/edit.User.php",
                        type:"POST",
                        data:formdata,
                        dataType:"json",
                        contentType:false,
                        processData:false,
                        success:function(data){
                            if(data == 1){
                                Swal.fire({
                                    position:"top-end",
                                    icon:"success",
                                    title:"เสร็จสิ้น",
                                    showConfirmButton:false,
                                    timer:800
                                }).then((result) => {
                                    window.location.reload();
                                });
                            }else{
                                Swal.fire({
                                    position:"top-end",
                                    icon:"error",
                                    title:"เกิดข้อผิดพลาด",
                                    showConfirmButton:false,
                                    timer:800
                                });
                            }
                        }
                    });
            });
        </script>

<?php
session_start();
?>
<?php
    include("config.php");
    if(isset($_POST['submit_add'])) {
    if (isset($_SESSION['username'])) {
        $MaGPLX = $_POST['SoGPLX'];
        $SoCMND = $_POST['SoCMND'];
        $MaHang = $_POST['MaHang'];
        $NgayCap = $_POST['dateCap'];
        $NgayHetHan = $_POST['dateHan'];
        $ma = $_POST['MaTT'];
        $DiemLT = $_POST['diemLT'];
        $DiemTH = $_POST['diemTH'];
        $them = "insert into HoSoGPLX values('$MaGPLX','$SoCMND','$MaHang','$NgayCap','$NgayHetHan','$ma','$DiemLT','$DiemTH')";
        $kq = sqlsrv_query($conn, $them);
        if (($kq) !== false) {
            echo "<script>alert('Thêm hồ sơ thành công');</script>";
            echo "<script>window.location.href ='admin.php'</script>";

        } else {
            echo "<script>alert('Sai thông tin. Vui lòng nhập lại');</script>";
        }
        }
        else
        {
            echo "<script>alert('Vui lòng đăng nhập');</script>" ;
        }
    }

    if(isset($_POST['submit_edit']))
    {
        if (isset($_SESSION['username'])) {

        $MaGPLX = $_POST['SoGPLX'];
        $SoCMND = $_POST['SoCMND'];
        $MaHang = $_POST['MaHang'];
        $NgayCap = $_POST['dateCap'];
        $NgayHetHan = $_POST['dateHan'];
        $ma = $_POST['MaTT'];
        $DiemLT = $_POST['diemLT'];
        $DiemTH =$_POST['diemTH'];
        $them = "insert into HoSoGPLX values('$MaGPLX','$SoCMND','$MaHang','$NgayCap','$NgayHetHan','$ma','$DiemLT','$DiemTH')";
        $kq = sqlsrv_query( $conn, $them);
        if(($kq)   !== false) 
        {
            echo "<script>alert('Thêm hồ sơ thành công');</script>" ;
            echo "<script>window.location.href ='login.php'</script>";
            
        }
        else
        {
            echo "<script>alert('Sai thông tin chỉnh sửa');</script>" ;
        }
    }
    else
    {
        echo "<script>alert('Vui lòng đăng nhập');</script>" ;
    }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
        <link rel="stylesheet" href="./assets/css/common.css">
        <link rel="stylesheet" href="./assets/css/header.css">
        <link rel="stylesheet" href="./assets/css/content.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
        <style>  
            .list-unstyled
            {
            top: 70px;
            left: 0;
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color:#eee;  
            width: 100%;
            max-height: 100px;
            overflow-y: auto;
            }
            .list-unstyled li
            {
            cursor:pointer;  
            padding:12px; 
            }
            .table {
                zoom: 80%;

            }
        </style>
    </head>
    </head>
    <body>
        <!-- thanh fotter -->
        <div id="module-1" class="header">
            <div class="container">
                <div id="module-2" class="logo">
                    <a href="/" title="Trang chủ">     
                    <img class="logo-banner" src="./assets/img/logo.png" alt="Logo"> 
                    </a>
                </div>
                <div id="module-3" class="navigation">
                    <ul class="nav">
                        <li2><a href="/">Trang Chủ</a></li2>
                    </ul>
                    <ul class="nav">
                        <li2><a href="/">Quản lý vi phạm</a></li2>
                    </ul>
                    <i class="ti ti-unlock"></i>
                    <i class="ti ti-search"></i>
                    <i class="ti ">Xin chào  <?= htmlspecialchars($_SESSION['username']) ?> </i>
                    
                </div>
            </div>
        </div>
        <!-- thanh fotter -->
        <!-- tiêu đề  -->
        <div class="col text-center">
            <br><h2>Hệ thống quản lý giấy phép lái xe</h2>
            <br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelAdd">
            Thêm hồ sơ
            </button>
           <a type="button"  href="logout.php" class="btn btn-danger" >Đăng xuất</a><br>
        </div>
        <!-- tiêu đề -->
        <!-- Modal -->
        <div class="modal fade" id="modelAdd" tabindex="-1" aria-labelledby="modelAdd" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelAdd">Thêm hồ sơ giấy phép lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="form1" action=""  method="post">
                            <div class="container" style="width: 750px;">
                                <label>
                                    <h6>Nhập số CMND/CCCD :</h6>
                                </label>
                                <input type="text" name="SoCMND" id="SoCMND" class="form-control" placeholder="Vui lòng nhập số CMND hoặc CCCD" />
                                <div id="listCMND"></div>
                                <br />
                                <label>
                                    <h6>Họ và tên :</h6>
                                </label>
                                <select id="test" class="form-select" disabled> </select>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Nhập số GPLX :</h6>
                                        </label>
                                        <input type="number" name="SoGPLX" id="SoGPLX" class="form-control" placeholder="Vui lòng nhập số giấy phép lái xe" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Hạng :</h6>
                                        </label>
                                        <select class="form-select" id="MaHang" name="MaHang">
                                            <option value="0"></option>
                                            <?php
                                                $sql = "Select MaHang  from HangGPLX;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                                                {
                                                ?>
                                            <option value="<?php echo($row['MaHang'])?>">
                                                <?php echo($row['MaHang']) ?>
                                            </option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày cấp :</h6>
                                        </label>
                                        <input type="date" class="form-control" id="dateCap" name="dateCap" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày hết hạn</h6>
                                        </label>
                                        <input type="date" class="form-control" id="dateHan" name="dateHan" />
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Điểm lý thuyết :</h6>
                                        </label>
                                        <input type="number" class="form-control" id="diemLT" name="diemLT" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Điểm thực hành :</h6>
                                        </label>
                                        <input type="number" class="form-control" id="diemTH" name="diemTH" />
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>
                                            <h6>Trung tâm sát hạch :</h6>
                                        </label>
                                        <br />
                                        <select class="form-select" onchange="GetTT()" id="TT" name="TT">
                                            <option></option>
                                            <?php
                                                $sql = "Select TenTT  from TrungTamSatHach;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                 while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                                                    {
                                                        ?>
                                            <option value="<?php echo($row['TenTT'])?>">
                                                <?php echo($row['TenTT']) ?>
                                            </option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <h6>­</h6>
                                        </label>
                                        <select class="form-select" id="MaTT" name="MaTT" readonly> </select>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_add"  name="submit_add">Thêm hồ sơ giấy phép lái xe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--MODEL ADĐ-->



        <!-- Modal -->
        <div class="modal fade" id="modelEdit" tabindex="-1" aria-labelledby="modelEdit" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelEdit">Chỉnh sửa giấy phép lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="form1" action=""  method="post">
                            <div class="container" style="width: 750px;">
                                <label>
                                    <h6>Nhập số CMND/CCCD :</h6>
                                </label>
                                <input type="text" name="SoCMND" id="SoCMND" class="form-control" placeholder="Vui lòng nhập số CMND hoặc CCCD" />
                                <div id="listCMND"></div>
                                <br />
                                <label>
                                    <h6>Họ và tên :</h6>
                                </label>
                                <select id="test" class="form-select" disabled> </select>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Nhập số GPLX :</h6>
                                        </label>
                                        <input type="number" name="SoGPLX" id="SoGPLX" class="form-control" placeholder="Vui lòng nhập số giấy phép lái xe" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Hạng :</h6>
                                        </label>
                                        <select class="form-select" id="MaHang" name="MaHang">
                                            <option value="0"></option>
                                            <?php
                                                $sql = "Select MaHang  from HangGPLX;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                                                {
                                                ?>
                                            <option value="<?php echo($row['MaHang'])?>">
                                                <?php echo($row['MaHang']) ?>
                                            </option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày cấp :</h6>
                                        </label>
                                        <input type="date" class="form-control" id="dateCap" name="dateCap" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày hết hạn</h6>
                                        </label>
                                        <input type="date" class="form-control" id="dateHan" name="dateHan" />
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Điểm lý thuyết :</h6>
                                        </label>
                                        <input type="number" class="form-control" id="diemLT" name="diemLT" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Điểm thực hành :</h6>
                                        </label>
                                        <input type="number" class="form-control" id="diemTH" name="diemTH" />
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>
                                            <h6>Trung tâm sát hạch :</h6>
                                        </label>
                                        <br />
                                        <select class="form-select" onchange="GetTT()" id="TT" name="TT">
                                            <option></option>
                                            <?php
                                                $sql = "Select TenTT  from TrungTamSatHach;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                 while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                                                    {
                                                        ?>
                                            <option value="<?php echo($row['TenTT'])?>">
                                                <?php echo($row['TenTT']) ?>
                                            </option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <h6>­</h6>
                                        </label>
                                        <select class="form-select" id="MaTT" name="MaTT" readonly> </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_edit"  name="submit_edit">Sửa</button>

                                </div>
                    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- Modal -->

        <!-- Modal -->
        <div class="modal fade" id="modelDel" tabindex="-1" aria-labelledby="modelDel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelDel">Xóa hồ sơ giấy phép lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Bạn có muốn xóa hồ sơ có mã số : xxxxx</h4>

                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-danger" type="buttom"  id="submit_edit"  name="submit_edit">Xóa</button>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
         <!-- Modal -->
        <br>
        <div class="container-fluid">
        <table class="table table-bordered table-sm ">
            <thead>
                <tr class="table-active center-block text-center">
                    <th>Số CCCD</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Mã GPLX</th>
                    <th>Mã hạng</th>
                    <th>Ngày sinh</th>
                    <th>Ngày cấp</th>
                    <th>Ngày hết hạn</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Điểm LT</th>
                    <th>Điểm TH</th>
                    <th>Trung tâm</th>
                    <th>Thao tac</th>
                </tr>
            </thead>
            <tbody>
            <?php
 
include_once ('config.php');
if(isset($_SESSION['username']))
{
          $sql2 = "EXEC proc_HoSoGPLX";   
          if(($result2 = sqlsrv_query($conn,$sql2)) !== false)
          {
              while( $obj = sqlsrv_fetch_object( $result2 )) 
              {
                  echo "<tr>
                  <td>$obj->SoCCCD</td>
                  <td>$obj->Hoten</td>
                  <td class ='center-block text-center'>$obj->GioiTinh</td>
                  <td>$obj->MaGPLX</td>
                  <td class ='center-block text-center'>$obj->MaHang</td>
                  <td>$obj->NgaySinh</td>
                  <td>$obj->NgayCap</td>
                  <td>$obj->NgayHetHan</td>
                  <td>$obj->SDT</td>
                  <td>$obj->DiaChi</td>
                  <td class ='center-block text-center'>$obj->DiemLT</td>
                  <td class ='center-block text-center'>$obj->DiemTH</td>
                  <td>$obj->TenTT</td>
                  <td>
                  <button type='button' class='btn btn-danger' idbtDel=$obj->MaGPLX data-bs-toggle='modal' data-bs-target='#modelDel'>Xóa</button>
                  <button type='button' class='btn btn-success' idbtSua=$obj->MaGPLX data-bs-toggle='modal' data-bs-target='#modelEdit'>Sửa</button>
                  </td>
                  </tr>";
              }
          } 
}
else
{
    echo "<script>alert('Bạn chưa đăng nhập. Vui lòng đăng nhập');</script>" ;

}
?>
                                                
            </tbody>
        </table>
        </div>
        <!-- Modal -->
    </body>
</html>
<script>  
    $(document).ready(function(){  
         $('#SoCMND').keyup(function(){  
              var query = $(this).val();  
              if(query != '')  
              {  
                   $.ajax({  
                        url:"SoCMND.php",  
                        method:"POST",  
                        data:{query:query},  
                        success:function(data)  
                        {  
                             $('#listCMND').fadeIn();  
                             $('#listCMND').html(data);  
                        }  
                   });  
              }  
         });  
         $(document).on('click', 'li', function(){  
              $('#SoCMND').val($(this).text()); 
              $('#listCMND').fadeOut();  
         });  
    
         $(document).on('click', 'li', function(){ 
           var x = document.getElementById("SoCMND").value;
           $.ajax({
           url: 'getthongtin.php',
           method: 'POST',
           data: 
               {
                   id : x
               },
           success:function(data)
           {
               $("#test").html(data);
           }
           })
         });  
    });  
    function GetTT()
    {
       var x = document.getElementById("TT").value;
       $.ajax({
           url: 'getTT.php',
           method: 'POST',
           data: 
               {
                   matt : x
               },
           success:function(data)
           {
               $("#MaTT").html(data);
           }
           })
    }
    
    function checkNull()
                           {
                               var SoCMND = document.forms["form1"]["SoCMND"].value;
                               var SoGPLX = document.forms["form1"]["SoGPLX"].value;
                               var MaHang = document.forms["form1"]["MaHang"].value;
                               var dateCap = document.forms["form1"]["dateCap"].value;
                               var dateHang = document.forms["form1"]["dateHang"].value;
                               var diemLT = document.forms["form1"]["diemLT"].value;
                               var diemTH = document.forms["form1"]["diemTH"].value;
                               var Tt = document.forms["form1"]["TT"].value;
    
    
                               if (SoCMND == "" || SoGPLX == "" || MaHang == ""|| dateCap == ""|| dateHang == ""|| diemLT == ""|| diemTH == ""|| Tt == "")
                               {
                                   alert("Vui lòng nhập đầy đủ thông tin");
                                       return false;
                               }
                               else 
                               {
                                   //alert('Wait...');
                                   return true; 
                               }
                           }
</script>


                              
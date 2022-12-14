<?php
    session_start();
    ?>
<?php
    include("config.php");
    $id_role = $_SESSION['idRole'];
    if (isset($_SESSION['username'])) 
    {
        if($id_role == 1)
        {
            echo "<script>alert('Bạn không có quyền truy cập !!!!');</script>" ;
            echo "<script>window.location.href ='admin.php'</script>";

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
    <body onload= 'disableBtn()'>
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
                        <li2><a href="quanlyvipham.php">Quản lý vi phạm</a></li2>
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
            <br>
            <h2>Hệ thống quản lý lỗi vi phạm </h2>
            <br><button type="button" class="btn btn-primary" id ='add'data-bs-toggle="modal" data-bs-target="#modelAdd" 
            >
            Thêm biên bản vi phạm
            </button>
            <a type="button"  href="logout.php" class="btn btn-danger" >Đăng xuất</a><br>
        </div>
        <!-- tiêu đề -->
        <!-- Modal -->
        <div class="modal fade" id="modelAdd" tabindex="-1" aria-labelledby="modelAdd" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelAdd">Thêm biên bản vi phạm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="form1" action=""  method="post">
                            <div class="container" style="width: 750px;">
                                <label>
                                    <h6>Nhập mã biên bản :</h6>
                                </label>
                                <input type="text" name="maBienBan" id="maBienBan" class="form-control" placeholder="Vui lòng nhập mã biên bản" />
                                <label>
                                    <h6>Nhập mã mã giấy phép lái xe :</h6>
                                </label>
                                <input type="text" name="maGPLX" id="maGPLX" class="form-control" placeholder="Vui lòng nhập mã GPLX" />
                                <div id="listGPLX"></div>
                                <br />
                                <label>
                                    <h6>Nội dung vi phạm :</h6>
                                </label>
                                <select id="test" class="form-select" disabled> </select>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày lập :</h6>
                                        </label>
                                        <input type="date" class="form-control" id="dateLap" name="dateLap" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Tiền phạt : </h6>
                                        </label>
                                        <input type="text" name="tienPhat" id="tienPhat" class="form-control"/>
                                    </div><br>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_add"  name="submit_add">Thêm biên bản vi phạm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--MODEL ADĐ-->
        <!-- Modal -->
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
                                    <h6>Nhập mã biên bản :</h6>
                                </label>
                                <input type="text" name="maBienBan" id="maBienBan" class="form-control" placeholder="Vui lòng nhập mã biên bản" />
                                <label>
                                    <h6>Nhập mã mã giấy phép lái xe :</h6>
                                </label>
                                <input type="text" name="maGPLX" id="maGPLX" class="form-control" placeholder="Vui lòng nhập mã GPLX" />
                                <div id="listGPLX"></div>
                                <br />
                                <label>
                                    <h6>Nội dung vi phạm :</h6>
                                </label>
                                <select id="test" class="form-select" disabled> </select>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày lập :</h6>
                                        </label>
                                        <input type="date" class="form-control" id="dateLap" name="dateLap" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Tiền phạt : </h6>
                                        </label>
                                        <input type="text" name="tienPhat" id="tienPhat" class="form-control"/>
                                    </div><br>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_add"  name="submit_add">Thêm biên bản vi phạm</button>
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
                        <form name="form1" action=""  method="post">
                            <div id = 'id_del'></div>
                            <input type="text" class="form-control" id="id_del_text" name="id_del_text" hidden/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-danger" type="buttom"  id="submit_del"  name="submit_del">Xóa</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <br>
        <div class="container-fluid">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-active center-block ">
                        <th>Mã biên bản </th>
                        <th>Mã giấy phép lái xe</th>
                        <th>Nội dung vi phạm</th>
                        <th>Ngày lập</th>
                        <th>Tiền phạt</th>
                        <th>Thao tac</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once ('config.php');
                        $id_role = $_SESSION['idRole'];
                        if(isset($_SESSION['username']))
                        {
                            $sql2 = "select b.MaBienBan, b.MaGPLX, l.NoiDungViPham, CONVERT(varchar, b.NgayLap, 103) as NgayLap, l.TienPhat from BienBanViPham b, CT_ViPham ct, LoiViPham l where b.MaBienBan = ct.MaBienBan and ct.MaViPham = l.MaViPham";
                            if (($result2 = sqlsrv_query($conn, $sql2)) !== false) {
                                while ($obj = sqlsrv_fetch_object($result2)) {
                                    echo "<tr>
                                          <td>$obj->MaBienBan</td>
                                          <td>$obj->MaGPLX</td>
                                          <td>$obj->NoiDungViPham</td>
                                          <td>$obj->NgayLap</td>
                                          <td>$obj->TienPhat</td>
                                          <td>
                                          <button type='button' id = 'del' class='btn btn-danger delbtn'  data-bs-toggle='modal' data-bs-target='#modelDel'>Xóa</button>
                                          <button type='button' id = 'edit' class='btn btn-success editbtn' data-bs-toggle='modal' data-bs-target='#modelEdit'>Sửa</button>                  
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
    
    function GetTT_Update()
    {
       var x = document.getElementById("up_TT").value;
       $.ajax({
           url: 'getTT.php',
           method: 'POST',
           data: 
               {
                   matt : x
               },
           success:function(data)
           {
               $("#up_MaTT").html(data);
           }
           })
    }
    $(document).ready(function(){
        $('.editbtn').on('click',function(){
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            var select = "<option>"+data[4]+"</option>";
            var string = "22/07/1992"
            var ngaycap =string.split("/");

            
            }).get();
            console.log(data);
            let ngaycap = (data[6]);
            let NgayCapSplit = ngaycap.split("/");
            let NgayCapSub =NgayCapSplit[2]+"-"+NgayCapSplit[1]+"-"+NgayCapSplit[0];
            let ngayhethan = (data[7]);
            let NgayHetHanSplit = ngayhethan.split("/");
            let NgayHetHanSub =NgayHetHanSplit[2]+"-"+NgayHetHanSplit[1]+"-"+NgayHetHanSplit[0];
            let MaHang = "<option selected='selected' value="+data[4]+">"+data[4]+"</option>";
            console.log(MaHang);

            $('#up_Name').val(data[1]);
            $('#up_SoGPLX').val(data[3]);
            $('#up_dateCap').val(NgayCapSub);
            $('#up_dateHan').val(NgayHetHanSub);
            $('#up_diemLT').val(data[10]);
            $('#up_diemTH').val(data[11]);
        });
    
    });
    
    $(document).ready(function(){
        $('.delbtn').on('click',function(){
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
    
            }).get();
            console.log(data);
            var test = "<h5>Bạn có muốn xóa biên bản có mã là : " +data[0] +" và có mã giấy phép lái xe là là : " +data[1] + " </h5>";
            $('#id_del_text').val(data[3]);
            $('#id_del').html(test);
    
        });
    
    });

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
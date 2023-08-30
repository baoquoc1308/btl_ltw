<?php
function register() {
    //lấy giá trị người dùng nhập 
    if(!empty($_POST)){
        
        if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['sex'])
        &&isset($_POST['hobbies'])&&isset($_POST['nationality'])&&isset($_POST['note'])){
        $ma_sv = $_POST['id'];
        $name =  $_POST['name'];
        $email =  $_POST['email'];
        $gender=  $_POST['sex'];
        $hobbies=  $_POST['hobbies'];
        $nationality = $_POST['nationality'];
        $note =  $_POST['note'];
        }
    // kết nối database
    $connect = new mysqli('localhost','root','','register');
    mysqli_set_charset($connect,'utf8');
    // kiểm tra kết nối
    if($connect->connect_error){
        var_dump($connect->connect_error);
        die();
    }
    // thực hiện truy vấn thêm đăng ký thành viên
    $query = "INSERT INTO register(ma_sv,name,email,gender,hobbies,nationality,note) 
    VALUES('".$ma_sv."','".$name."','".$email."','".$gender."','".$hobbies."','".$nationality."','".$note."')";
    mysqli_query($connect,$query);
    // đóng kết nối
    $connect->close();
    }
}

register();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="./css/form.css">
  <link href="//db.onlinewebfonts.com/c/12420e8c141ca7c3dff41de2d59df13e?family=BeaufortforLOL-Bold" rel="stylesheet"
    type="text/css" />
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: BeaufortforLOL-Bold;
}

.container {
    width: 800px;
    margin: auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
}

.login {
    margin: auto 0;
    margin-left: 190px;
    width: 400px;
}

h1 {
    margin-bottom: 20px;
    text-align: center;
    font-size: 32px;
    color: #1a202c;
}

.id span {
    color: #4a5568;
}

.id input {
    width: 400px;
    height: 50px;
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    margin: 10px 0;
    padding-left: 20px;
}

.fullName span {
    color: #4a5568;
}

.fullName input {
    width: 400px;
    height: 50px;
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    margin: 10px 0;
    padding-left: 20px;
}

.email span {
    color: #4a5568;
}

.email input {
    width: 400px;
    height: 50px;
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    margin: 10px 0;
    padding-left: 20px;
}

.gender span {
    color: #4a5568;
}

.gender-row {
    margin: 10px 0;
    width: 400px;
    height: 50px;
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-left: 20px;
    padding-top: 10px;
}

.gender-colum {
    text-align: left;
    grid-template-columns: 1fr 1fr;
}
.gender-colum span {
    color: #4a5568;
    font-size: 14px;
    line-height: 0.7;
    text-align: right;
    padding-right: 15px;
}

.favorite span {
    color: #4a5568;
}

.favorite-row {
    margin: 10px 0;
    width: 400px;
    height: 50px;
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    grid-template-columns: 1fr 1fr;
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    padding: 20px 0;
    text-align: center;
}

.favorite-colum {
    display: grid;
    grid-template-columns: 1fr auto;
}

.favorite-colum span {
    color: #4a5568;
    font-size: 14px;
    line-height: 0.8;
}
.favorite-colum.error-input,
.gender-colum.error-input {
    background-color: yellow;
}

select {
    width: 400px;
    height: 50px;
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    padding-left: 10px ;
    color: #4a5568;
}

.nationality {
    text-align: left;
    margin-top: 10px;
}
.nationality span{
    color: #4a5568;
}
select {
    margin-top: 10px;
}
.note {
    margin-top: 10px;
}

.note span {
    color: #4a5568;
}

textarea {
    margin-top: 10px;
}

.note textarea {
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    padding-left: 5px;
    width: 400px;
}

button {
    width: 397px;
    height: 50px;
    margin-top: 25px;
    border: none;
    border: 1px solid #37A9cD;
    border-radius: 5px;
    background-color: #37A9cD;
    color: #ffffff;
}
.error-input {
    background-color: yellow;
}
.error {
    color: orangered !important;
    font-size: 14px;
  }
    </style>
</head>

<body>
  <div class="container">
    <div class="login">
      <h1>ĐĂNG KÝ THÀNH VIÊN</h1>
      <form action="" method="post">
        <div class="id">
          <span>Mã sinh viên</span>
          <span id="id_error" class="error"></span>
          <br>
          <input type="text" name="id" placeholder="">
        </div>
        <div class="fullName">
          <span>Họ và tên</span>
          <span id="name_error" class="error"></span>
          <br>
          <input type="text" name="name" placeholder="">
        </div>
        <div class="email">
          <span>Email</span>
          <span id="email_error" class="error"></span>
          <br>
          <input type="email" name="email" placeholder="">
        </div>
        <div class="gender">
          <span>Giới tính</span>
          <span id="sex_error" class="error"></span>
          <br>
          <div class="gender-row">
              <div class="gender-colum">
                <span>Nam</span>
                <input class="status_sex" value="Nam" name="sex" type="radio">
              </div>
              <div class="gender-colum">
                <span>Nữ</span>
                <input class="status_sex" name="sex" value="Nữ" type="radio">
              </div>
          </div>
        </div>
        <div class="favorite">
          <span>Sở thích</span>
          <span id="favorite_error" class="error"></span>
          <br>
          <div class="favorite-row">
              <div class="favorite-colum">
                <span>Đọc sách</span>
                <input class="status_favorite" value="Đọc sách" name="hobbies" type="checkbox">
              </div>
              <div class="favorite-colum">
                <span>Du lịch</span>
                <input class="status_favorite" value="Du lịch" name="hobbies" type="checkbox">
              </div>
              <div class="favorite-colum">
                <span>Âm nhạc</span>
                <input class="status_favorite" value="Âm nhạc" name="hobbies" type="checkbox">
              </div>
              <div class="favorite-colum">
                <span>Ẩm thực</span>
                <input class="status_favorite" value="Ẩm thực" name="hobbies" type="checkbox">
              </div>
              <div class="favorite-colum">
                <span>Khác</span>
                <input class="status_favorite" value="Khác" name="hobbies" type="checkbox">
              </div>
          </div>
        </div>
        <div class="nationality">
          <span>Quốc tịch</span>
          <span id="nationality_error" class="error"></span>
          <select name="nationality" id="nationality">
            <option value="null">Chọn quốc tịch</option>
            <option value="Việt Nam">Việt Nam</option>
            <option value="Campuchia">Campuchia</option>
            <option value="Lào">Lào</option>
            <option value="Thái Lan">Thái Lan</option>
            <option value="Hàn Quốc">Hàn Quốc</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Singapore">Singapore</option>
            <option value="Malaysia">Malaysia</option>
            <option value="CHDCND Triều Tiên">CHDCND Triều Tiên</option>
            <option value="Nhật Bản">Nhật Bản</option>
            <option value="Anh Quốc">Anh Quốc</option>
            <option value="Đức">Đức</option>
            <option value="Tây Ban Nha">Tây Ban Nha</option>
            <option value="Trung Quốc">Trung Quốc</option>
            <option value="Mỹ">Mỹ</option>
          </select>
        </div>
        <div class="note">
          <span>Ghi chú</span>
          <textarea name="note" id="" cols="50" rows="5"></textarea>
        </div>
        <button onclick="validate()" type="submit">Đăng ký</button>
        <a href="table_register.php" style="text-align:center;">Quản lý</a>
      </form>
      
    </div>
  </div>
  <script type="text/javascript">
function validate() {
    document.querySelector("[name='id']").classList.remove('error-input');
    document.querySelector("[name='name']").classList.remove('error-input');
    document.querySelector("[name='email']").classList.remove('error-input');
    document.querySelector(".gender").classList.remove('error-input');
    document.querySelector(".favorite").classList.remove('error-input');
    document.querySelector(".nationality").classList.remove('error-input');
    // Bắt đầu check validate ID:
    let inputId = document.querySelector("[name='id']").value.trim();
    let checkId = ``;
    let checkPlaceId = inputId.split("");

    if (inputId.length == 0) {
        checkId = `Vui lòng nhập ID!`
        document.querySelector("[name='id']").classList.add('error-input');
    }
    else if (!/^\d{10}$/.test(inputId)) {
        checkId = `Vui lòng nhập mã gồm 10 chữ số!`;
        document.querySelector("[name='id']").classList.add('error-input');
    }
    else {
        for (let i = 0; i < 10; i++) {
            if (checkPlaceId.length != 10) {
                checkId = `Vui lòng nhập đúng định dạng!`;
                break;
            }
        }
    }
    document.querySelector("#id_error").innerText = checkId;
    // else if (inputId.startsWith("P") == false) {
    //     checkId = `Vui lòng nhập đúng định dạng!`;
    //     document.querySelector("[name='id']").classList.add('error-input');
    // }
    // if (listPlace[i] == checkPlaceId[1]) {
    //     checkId = ``;
    // }
    // if (isNaN(checkPlaceId[i + 2]) == true) {
    //     checkId = `Vui lòng nhập đúng định dạng!`;
    //     break;
    // }
    // Kết thúc check validate ID

    // Bắt đầu check validate Name:
    let inputFullName = document.querySelector("[name='name']").value.trim();
    let arrInputFullName = inputFullName.split(" ");
    let checkFullName = ``;

    function checkNumbers() {
        for (let item of arrInputFullName) {
            if (isNaN(item) == false) {
                return true;
            }
        }
    }

    if (inputFullName.length == 0) {
        checkFullName = `Vui lòng nhập Họ tên!`;
        document.querySelector("[name='name']").classList.add('error-input');
    }
    else if (arrInputFullName.length == 1 || checkNumbers()) {
        checkFullName = `Vui lòng nhập đúng định dạng!`;
        document.querySelector("[name='name']").classList.add('error-input');
    }

    document.querySelector("#name_error").innerText = checkFullName;
    // Kết thúc check

    // Bắt đầu check validate Email:
    let inputEmail = document.querySelector("[name='email']").value.trim();
    let checkEmail = ``;
    let arrCheckEmail = inputEmail.split("@");

    if (inputEmail.length == 0) {
        checkEmail = `Vui lòng nhập Email!`;
        document.querySelector("[name='email']").classList.add('error-input');

    }
    else if (inputEmail.startsWith("@") == true || inputEmail.endsWith("@") == true || arrCheckEmail.length != 2 || arrCheckEmail[1].startsWith(".") == true || arrCheckEmail[1].includes(".") == false || arrCheckEmail[1].endsWith(".") == true) {
        checkEmail = `Vui lòng nhập đúng định dạng!`;
        document.querySelector("[name='email']").classList.add('error-input');

    }

    document.querySelector("#email_error").innerText = checkEmail;
    // Kết thúc check validate Email

    // Bắt đầu check validate Giới tính:
    let listStatusSex = document.querySelectorAll(".status_sex");
    let checkStatusSex = `Vui lòng chọn!`;
    if (checkStatusSex !== '') {
        document.querySelector(".gender-row").classList.add('error-input');
    }
    for (let check of listStatusSex) {
        if (check.checked == true) {
            checkStatusSex = ``;
            document.querySelector(".gender-row").classList.remove('error-input');
            break;
        }
    }

    document.querySelector("#sex_error").innerText = checkStatusSex;
    // Kết thúc check validate Giới tính

    // Bắt đầu check validate Favorite:
    let listStatusFavorite = document.querySelectorAll(".status_favorite");
    let checkStatusFavorite = `Vui lòng chọn!`;
    if (checkStatusFavorite !== '') {
        document.querySelector(".favorite-row").classList.add('error-input');
    }
    for (let check of listStatusFavorite) {
        if (check.checked == true) {
            checkStatusFavorite = ``;
            document.querySelector(".favorite-row").classList.remove('error-input');

        }
    }

    document.querySelector("#favorite_error").innerText = checkStatusFavorite;
    // Kết thúc check validate Favorite

    // Bắt đầu check Nationality:
    let inputNationality = document.querySelector("#nationality").value;
    let nationalityErrorElement = document.querySelector("#nationality_error");
    let nationalitySelectElement = document.querySelector("#nationality");

    if (inputNationality == "null") {
        nationalityErrorElement.innerText = `Vui lòng chọn Quốc tịch!`;
        nationalitySelectElement.classList.add('error-input');
    } else {
        nationalityErrorElement.innerText = ''; // Xóa thông báo lỗi nếu không có lỗi
        nationalitySelectElement.classList.remove('error-input'); // Gỡ bỏ lớp error-input nếu không có lỗi
    }
    // Kết thúc check Nationality
}
</script>
</body>



</html>

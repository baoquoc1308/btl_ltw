<?php
function getListRegister($sql){
    $connect = new mysqli('localhost','root','','register');
    $resultset = mysqli_query($connect,$sql);
    $list = [];
    while($row = mysqli_fetch_array($resultset,1)){
        $list[] = $row;
    }
    $connect->close();
    return $list;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>


    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><h2 style="color:red;text-align:center;">Quản lý đăng ký</h2></div>
            <div class="panel-body">
            <table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã SV</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Nationality</th>
            <th>Note</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = "select * from register";
$listRegister = getListRegister($sql);
foreach($listRegister as $user){
    echo'<tr>
    <td>'.$user['ma_sv'].'</td>
    <td>'.$user['name'].'</td>
    <td>'.$user['email'].'</td>
    <td>'.$user['gender'].'</td>
    <td>'.$user['hobbies'].'</td>
    <td>'.$user['nationality'].'</td>
    <td>'.$user['note'].'</td>
    <td><button class="btn btn-success" onclick="deleteRigister('.$user['ma_sv'].')">Delete</button></td>
    </tr>';

}

?>
        
        
    </tbody>
</table>
            </div>
        </div>

    </div>
<script type="text/javascript">

  function deleteRigister(id){
    $.post('deleteUser.php',{
        'id':id
    }, function (){
        location.reload();
    });
    }
</script>
</body>
</html>
<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login: สุพัตรา หาญกุดเลาะ(ปริม)</title>
</head>

<body>
    <h1>เข้าสู่ระบบหลังบ้าน: สุพัตรา หาญกุดเลาะ(ปริม)</h1>

    <form method="post" action="">
        Username: <input type="text" name="auser" autofocus required><br>
        Password: <input type="password" name="apwd" required><br>
        <button type="submit" name="Submit">Login</button>
    </form>

<?php
if (isset($_POST['Submit'])) {    
    include_once("connectdb.php");

    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    // 1. ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    // ดึงข้อมูลโดยใช้แค่ Username อย่างเดียวมาก่อน
    $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_array($result)) {
        // 2. ตรวจสอบรหัสผ่านที่ Hash ไว้ด้วย password_verify
        if (password_verify($pwd, $data['a_password'])) {
            // เข้าสู่ระบบสำเร็จ
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>";
            echo "window.location='index2.php';";
            echo "</script>";
            exit;
        } else {
            // รหัสผ่านผิด
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
        }
    } else {
        // ไม่พบชื่อผู้ใช้
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
    }
    
    mysqli_stmt_close($stmt);
}
?>
</body>
</html>
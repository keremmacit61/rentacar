
<?php
    include 'db.php';

    if (isset($_POST['btn-login'])) {
        // Kullanıcı giriş bilgilerini al
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Giriş bilgilerini kontrol et
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
           header("Location:page/index.php");
        } else {
            echo "Hatalı e-posta veya şifre. Lütfen tekrar deneyin.";
        }
    
    
        $stmt->close();
    }
    
    $conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sayfası</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-size: 14px;
        }

        .form-group input:focus {
            border-color: #1abc9c;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #1abc9c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #16a085;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            text-decoration: none;
            color: #1abc9c;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: #16a085;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Giriş Yap</h2>
        <form  method="post" action="index.php">
            <div class="form-group">
                <label for="email">E-posta</label>
                <input name="email" type="email" id="email" placeholder="E-posta adresinizi giriniz">
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input name="password" type="password" id="password" placeholder="Şifrenizi giriniz">
            </div>
            <button type="submit" class="login-btn" name="btn-login">Giriş Yap</button>
        </form> 
    </div>
</body>
</html>

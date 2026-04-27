<?php
session_start();


require_once 'config.php';


function generateCaptcha() {
    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $captcha = '';
    for($i = 0; $i < 6; $i++) {
        $captcha .= $chars[rand(0, strlen($chars) - 1)];
    }
    $_SESSION['captcha'] = $captcha;
    return $captcha;
}


if(!isset($_SESSION['captcha'])) {
    generateCaptcha();
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim( $_POST['username']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $captcha_input = strtoupper(trim($_POST['captcha']));

  
    if($captcha_input != strtoupper($_SESSION['captcha'])) {
        $error = 'کد امنیتی نادرست است!';
        generateCaptcha();
    } else {
        // اگر کپچا درست بود، اطلاعات را در دیتابیس ذخیره کن
        try {
            // بررسی تکراری نبودن ایمیل
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
            $stmt->execute([$email, $username]);
            
            if($stmt->rowCount() > 0) {
                $error = 'این ایمیل یا نام کاربری قبلاً ثبت شده است';
            } else {
                
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
              
                $sql = "INSERT INTO users (username, lastname, email, password) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                
                if($stmt->execute([$username, $lastname, $email, $hashed_password])) {
                    $success = 'ثبت‌نام با موفقیت انجام شد!';
                    
                     //این سه خط رو اضافه کردیم برای ن
                     $user_id = $conn->lastInsertId();
                     $_SESSION['user_id'] = $user_id;
                     $_SESSION['username'] = $username;
                    
                    $_POST = array();

                 
                    generateCaptcha();
                }
            }
        } catch(PDOException $e) {
            $error = 'خطا در ثبت اطلاعات: ' . $e->getMessage();
        }
    }
}

$captcha_display = isset($_SESSION['captcha']) ? $_SESSION['captcha'] : generateCaptcha();
?>

<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="header.css">
 <link rel="stylesheet" href="footer.css">
<?php include 'header.php'; ?>
<title >ثبت نام | Python Batab</title>
<style>
    body {
        background-color: rgb(0, 0, 0);
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
/*
   header { 
        background: #1a1a1a; 
        color: #ffffff; 
        padding: 15px 0; 
        border-bottom: 2px solid #5a5a5a; 
    }
    header .logo { 
        float: right; 
        font-size: 24px; 
        font-weight: bold; 
        color: #eb8613ff; 
        padding-right: 10%;  
    }
    header nav { 
        float: left; 
        padding-left: 10%; 
    }
    header nav ul { 
        list-style: none; 
        margin: 0; 
        padding: 0; 
    }
    header nav ul li { 
        display: inline; 
        margin-left: 20px; 
    }
    header nav ul li a { 
        color: #fc1111ff; 
        text-decoration: none; 
        font-weight: bold; 
        padding: 5px 0; 
        transition: color 0.3s; 
    }
    header nav ul li a:hover { 
        color: #cc4d1bff; 
    }
    .clearfix::after { 
        content: ""; 
        clear: both; 
        display: table; 
    }
    */
    /* استایل اصلی فرم */
    .login-container {
        background-image: url('p2.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }
    
    .form-box {
        background-color: rgba(0, 0, 0, 0.8);
        padding: 40px;
        border-radius: 15px;
        border: 3px solid #eb8613ff;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 0 30px rgba(235, 134, 19, 0.3);
        margin-right: auto;
        margin-left: 150px;
    }
    
    h1 {
        text-align: center;
        color: rgba(192, 181, 181, 1);
        font-family: Afsaneh, sans-serif;
        margin-bottom: 30px;
        font-size: 32px;
    }
    
    .input-group {
        margin-bottom: 20px;
    }
    
    input {
        padding: 15px 20px;
        border-radius: 8px;
        border: none;
        border-bottom: 2px solid rgba(37, 25, 2, 1);
        width: 100%;
        font-size: 16px;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        box-sizing: border-box;
        transition: all 0.3s;
    }
    
    input:focus {
        outline: none;
        border-bottom-color: #eb8613ff;
        background: rgba(255, 255, 255, 0.15);
    }
    
    input::placeholder {
        color: rgba(192, 181, 181, 0.7);
    }
    
    /* بخش کپچا */
    .captcha-section {
        background: rgba(30, 30, 30, 0.9);
        padding: 20px;
        border-radius: 10px;
        margin: 25px 0;
        border: 1px solid #5a5a5a;
        text-align: center;
    }
    
    .captcha-title {
        color: #eb8613ff;
        font-size: 18px;
        margin-bottom: 15px;
        font-weight: bold;
    }
    
    .captcha-image-box {
        background: rgba(0, 0, 0, 0.7);
        padding: 15px;
        border-radius: 8px;
        margin: 15px 0;
    }
    
    .captcha-image {
        font-family: 'Courier New', monospace;
        font-size: 36px;
        font-weight: bold;
        letter-spacing: 10px;
        color: #eb8613ff;
        padding: 15px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
        margin: 10px 0;
        user-select: none;
        text-align: center;
    }
    
    .captcha-input-box {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
    
    .captcha-input {
        flex: 1;
        font-size: 18px;
        text-align: center;
        letter-spacing: 5px;
        font-weight: bold;
        font-family: 'Courier New', monospace;
        background: rgba(255, 255, 255, 0.15);
    }
    
    .captcha-refresh-btn {
        background-color: rgba(34, 9, 9, 1);
        border: none;
        border-radius: 7px;
        color: white;
        padding: 0 25px;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 100px;
        transition: all 0.3s;
    }
    
    .captcha-refresh-btn:hover {
        background-color: rgba(138, 54, 29, 1);
        transform: scale(1.05);
    }
    
    /* دکمه‌ها */
    .btn-group {
        text-align: center;
        margin-top: 25px;
    }
    
    .login-btn {
        background-color: rgba(34, 9, 9, 1);
        border: none;
        border-radius: 7px;
        color: white;
        padding: 12px 35px;
        text-align: center;
        font-size: 18px;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s;
        font-weight: bold;
    }
    
    .login-btn:hover {
        background-color: rgba(138, 54, 29, 1);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(235, 134, 19, 0.4);
    }
    
    /* لینک‌ها */
    .links {
        text-align: center;
        margin-top: 25px;
        color: rgba(192, 181, 181, 1);
    }
    
    a {
        text-decoration: none;
        color: #faf6f6ff;
        margin: 0 10px;
        transition: color 0.3s;
    }
    
    a:hover {
        color: rgba(194, 90, 21, 1);
        text-decoration: underline;
    }
    
    .separator {
        color: #5a5a5a;
        margin: 0 5px;
    }
    
    /* پیام خطا */
    .error-message {
        background: rgba(192, 0, 0, 0.2);
        color: #ff6b6b;
        padding: 10px;
        border-radius: 5px;
        margin: 15px 0;
        text-align: center;
        border: 1px solid #ff6b6b;
    }
    
    .success-message {
        background: rgba(0, 192, 0, 0.2);
        color: #6bff6b;
        padding: 10px;
        border-radius: 5px;
        margin: 15px 0;
        text-align: center;
        border: 1px solid #6bff6b;
    }
    
    /* موبایل */
    @media (max-width: 768px) {
        .form-box {
            margin: 0;
            padding: 25px;
        }
        
        header .logo,
        header nav {
            float: none;
            text-align: center;
            padding: 10px;
        }
        
        header nav ul li {
            display: block;
            margin: 10px 0;
        }
        
        .captcha-input-box {
            flex-direction: column;
        }
        
        .captcha-refresh-btn {
            width: 100%;
            padding: 12px;
        }
    }
</style>

<script>
   
    function displayCaptcha(captchaText) {
        const spacedText = captchaText.split('').join(' ');
        document.getElementById('captchaText').innerHTML = spacedText;
    }
    
    function refreshCaptcha() {
        fetch('refresh_captcha.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('خطای شبکه');
                }
                return response.json();
            })
            .then(data => {
                if(data.success) {
                    displayCaptcha(data.captcha);
                    document.getElementById('captchaInput').value = '';
                    document.getElementById('captchaInput').focus();
                } else {
                    throw new Error('خطا در دریافت کد امنیتی');
                }
            })
            .catch(error => {
                console.error('خطا:', error);
                alert('خطا در بروزرسانی کد امنیتی. لطفاً صفحه را رفرش کنید.');
            });
    }
    
    function validateForm() {
        
        const inputs = document.querySelectorAll('input[required]');
        for(let input of inputs) {
            if(!input.value.trim()) {
                alert('لطفاً همه فیلدهای ضروری را پر کنید');
                input.focus();
                return false;
            }
        }
        
        // بررسی ایمیل
        const email = document.getElementById('email').value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailPattern.test(email)) {
            alert('فرمت ایمیل معتبر نیست');
            document.getElementById('email').focus();
            return false;
        }
        
        // بررسی رمز عبور
        const password = document.getElementById('password').value;
        if(password.length < 8) {
            alert('رمز عبور باید حداقل ۸ کاراکتر باشد');
            document.getElementById('password').focus();
            return false;
        }
        
        return true;
    }
    
    // بارگذاری اولیه
    window.onload = function() {
        // نمایش کپچا از PHP
        const captchaText = '<?php echo $captcha_display; ?>';
        displayCaptcha(captchaText);
        
        // فوکوس روی اولین فیلد
        document.getElementById('username').focus();
    };
</script>
</head>
<body>
<!--<header>
    <div class="container clearfix">
        <div class="logo">Python Batab 🐍</div>
        <nav>
            <ul>
                <li><a href="batabpayton.php">خانه</a></li>
                <li><a href="nasb.php">نصب پایتون</a></li>
                <li><a href="login.php">ثبت نام</a></li>
                <li><a href="chatbot_offline.php">دستیار هوشمند</a></li>
                <li><a href="payment.php">پرداخت</a></li>
                <li><a href="admin.php">مدیریت کاربران</a></li>
                <li><a href="me.php">تماس با ما</a></li>
               
            </ul>
        </nav>
    </div>
</header>
-->
<div class="login-container">
    <div class="form-box">
        <h1>ثبت نام در حساب کاربری</h1>
        
        <!-- نمایش پیام‌های خطا یا موفقیت -->
        <?php if(isset($error) && $error): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if(isset($success) && $success): ?>
            <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <form id="loginForm" method="POST" onsubmit="return validateForm();">
            <div class="input-group">
                <input type="text" 
                        id="username" 
                        name="username" 
                        placeholder="First Name" 
                        required
                        value="<?php echo !empty($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>
            
            <div class="input-group">
                <input type="text" 
                        id="lastname" 
                        name="lastname" 
                        placeholder="Last Name" 
                        required
                        value="<?php echo !empty($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>">
            </div>
            
            <div class="input-group">
                <input type="email" 
                        id="email" 
                        name="email" 
                        placeholder="email" 
                        required
                        value="<?php echo !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            
            <div class="input-group">
                <input type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Password(min 8 char)" 
                        minlength="8" 
                        maxlength="20" 
                        required 
                        autocomplete="new-password">
            </div>
            
            <!-- بخش کپچا -->
            <div class="captcha-section">
                <div class="captcha-title">
                    🔒 کد امنیتی زیر را وارد کنید:
                </div>
                
                <div class="captcha-image-box">
                    <div class="captcha-image" id="captchaText">
                        <!-- کد کپچا اینجا نمایش داده می‌شود -->
                    </div>
                    
                    <div class="captcha-input-box">
                        <input type="text" 
                                class="captcha-input"
                                id="captchaInput" 
                                name="captcha"
                                placeholder="کد بالا را اینجا وارد کنید"
                                required
                                autocomplete="off"
                                maxlength="8">
                        
                        <button type="button" 
                                class="captcha-refresh-btn"
                                onclick="refreshCaptcha()">
                            🔄 کد جدید
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="login-btn">
                    ثبت نام
                </button>
            </div>
        </form>
        
        <div class="links">
            <a href="batabpayton.php">بازگشت به خانه</a>
            <span class="separator">|</span>
            <a href="admin.php">حساب کاربری دارید؟ وارد شوید</a>
        </div>
    </div>
</div>
</body>
<?php include 'footer.php'; ?>

</html>
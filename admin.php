<?php
session_start();
require_once 'config.php';


try {
    // دریافت تمام کاربران از دیتابیس
    $stmt = $conn->prepare("SELECT * FROM users ORDER BY created_at DESC");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 catch(PDOException $e) {
    die("خطا در دریافت اطلاعات: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="style.css">
    <title>مدیریت کاربران | Python Batab</title>
    <style>
        /* استایل مشابه سایت شما */
        body {
            background-color: #1a1a1a;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
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
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #2c2c2c;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        
        h1 {
            color: #eb8613ff;
            text-align: center;
            border-bottom: 2px solid #eb8613ff;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        
        .stats {
            background-color: #1a1a1a;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 18px;
            color: #eb8613ff;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th {
            background-color: #1a1a1a;
            color: #eb8613ff;
            padding: 12px;
            text-align: right;
            border-bottom: 2px solid #5a5a5a;
        }
        
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #5a5a5a;
            text-align: right;
        }
        
        tr:hover {
            background-color: #3a3a3a;
        }
        
        .user-id {
            width: 50px;
            text-align: center;
        }
        
        .actions {
            width: 100px;
        }
        
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .delete-btn:hover {
            background-color: #c82333;
        }
        
        .no-users {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 18px;
        }
        
        footer {
            background-color: #1a1a1a;
            color: #575050ff;
            padding: 30px 0;
            border-top: 2px solid #5a5a5a;
            margin-top: 40px;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }
            
            table {
                font-size: 14px;
            }
            
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
   <!-- <header>
        <div class="container clearfix">
            <div class="logo">Python Batab 🐍</div>
            <nav>
                <ul>
                    <li><a href="batabpayton.php">خانه</a></li>
                    <li><a href="nasb.php">نصب پایتون</a></li>
                    <li><a href="login.php">ثبت نام</a></li>
                    <li><a href="payment.php">پرداخت</a></li>
                    <li><a href="admin.php">مدیریت کاربران</a></li>
                    <li><a href="me.php">تماس با ما</a></li>
                </ul>
            </nav>
        </div>
    </header>-->

    <div class="container">
        <h1>مدیریت کاربران ثبت‌نام شده</h1>
        
        <div class="stats">
            تعداد کاربران: <?php echo count($users); ?> نفر
        </div>

        <?php if (count($users) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th class="user-id">ردیف</th>
                        <th>نام کاربری</th>
                        <th>نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>تاریخ ثبت‌نام</th>
                        <th class="actions">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td class="user-id"><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo date('Y/m/d H:i', strtotime($user['created_at'])); ?></td>
                        <td>
                            <span style="color: #28a745;">✓ فعال</span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-users">
                هنوز هیچ کاربری ثبت‌نام نکرده است.
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <div class="clearfix">
            <p>&copy; <?php echo date("Y"); ?> Python Batab. تمامی حقوق محفوظ است.</p>
            <p>صفحه مدیریت سیستم</p>
        </div>
    </footer>

    <script>
        // رنگی کردن ردیف‌ها به صورت یک در میان
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                if(index % 2 === 0) {
                    row.style.backgroundColor = '#252525';
                }
            });
        });
    </script>
</body>
<?php include 'footer.php'; ?>

</html>
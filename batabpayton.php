<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">

<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="style.css">
<title> batab payton  </title>

<!--
<style>
  .bg {
    background-image: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.7)),url(p.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    min-height: 100vh;
    padding: 20px;
  }    
      
  p { 
          
        direction:rtl;
        
       /* margin-left:40px;*/
        margin-right:40px;
        text-align:justify;
        color:rgba(192, 181, 181, 1);
      }
      
 .p{
     font-size: 45px;
      padding: 10px 20px;
      cursor:wait;
      text-align: center;


  }
  h2 {
        text-align:center;
        color:rgba(192, 181, 181, 1);
        font-family: Afsaneh, sans-serif;
      }
    
  h3{
        position:sticky;
        top:0;
      }
     
  a {
        text-decoration:none;
      }
  UL {
        text-align: right;
        list-style-type:none;
        color:rgba(192, 181, 181, 1);

      }
  li{
        font-size:20px;
        padding:5px;
      }

    li:hover{
      cursor:pointer;
      background-color:rgba(56, 25, 16, 0.5);
    }
  .div2{
      width:40px;
      height:40px;
      margin:70px;
      padding:70px;
      border:1px solid rgb(99, 8, 8);
      position:relative;
    }
   .div3{
      position:absolute;
      padding:40px;
      border:1px solid black;
      background-color:rgba(131, 1, 22, 1);
      transform:rotate(45deg);
      transform-origin:20% 50%;
      }
 
    textarea {
     width: 100%;
     min-height: 140px;
     padding: 18px;
     box-sizing: border-box;
     border: 2px solid #915c0c;
     border-radius: 12px;
     background: rgba(199, 178, 133, 0.95);
     color: #3a2c0c;
     font-family: inherit;
     font-size: 17px;
     resize: vertical;
     direction: rtl;
     line-height: 1.7;
     transition: border-color 0.3s, box-shadow 0.3s;
      }

textarea:hover {
    border-color: #e0720a;
}

textarea:focus {
    outline: none;
    border-color: #e0720a;
    box-shadow: 0 0 0 4px rgba(224, 114, 10, 0.15);
    background: white;
}

textarea::placeholder {
    color: #a67c52;
    text-align: right;
    font-size: 16px;
    opacity: 0.8;
}
    .button{
      background-color: rgba(201, 106, 17, 1);
      color: wheat;
      font-size: 15px;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 10px;
      margin: 0 5px;
    }  
  .d1{
    display: flex;
    gap: 40%;
    align-items: flex-start;
    }
  .d2{
    flex:1;
  }
  .d3{
    padding: 20px ;  
    margin: 10px;
    display: flex;
    gap: 10%;
    align-items: flex-start;
  }
    /* CSS برای ایندکس و تمام صفحات تکرار شده است */
    body {font-family: Afsaneh, sans-serif; background-color:#e0720aff; color: #f0f0f0; margin: 0; padding: 0; direction: rtl; text-align: right; }
   
    
    /* هدر */
   
    /* دکمه‌ها */
    .btn-primary { background-color: #915c0cff; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%; transition: background-color 0.3s; display: block; }
    .btn-primary:hover { background-color: #723504ff; }
    
    /* فوتر */
    footer { background-color: #2b2a2aff; color: #575050ff; padding: 30px 0; border-top: 2px solid #5a5a5a; margin-top: 40px; }
    footer .footer-col { width: 30%; float: right; padding: 0 10%; box-sizing: border-box; }
    footer h3 { color: #703403ff; margin-bottom: 15px; border-bottom: 1px solid #b46810ff; padding-bottom: 5px; }
    footer ul { list-style: none; padding: 0; }
    footer ul li a { color: #443c3cff; text-decoration: none; }
    footer .copyright { clear: both; text-align: center; padding-top: 20px; border-top: 1px solid #333; margin-top: 20px; }
     

    </style>


<style>
/* بهبود ظاهر سایت - اضافه شده در تاریخ 22 فروردین */
.button {
    background: #d67214 !important;
    border: none !important;
    transition: 0.3s !important;
}
.button:hover {
    background: #724502 !important;
    transform: scale(1.05) !important;
}
header {
    background: #0f1117 !important;
    border-bottom: 2px solid #f59e0b !important;
}
header nav ul li a {
    color: #f59e0b !important;
}
header nav ul li a:hover {
    color: #8b5cf6 !important;
}
footer {
    background: #0f1117 !important;
    border-top: 2px solid #f59e0b !important;
}
textarea {
    background: rgba(0,0,0,0.5) !important;
    border: 1px solid #f87325 !important;
    color: white !important;
}
</style>-->

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
            <li><a href="payment.php">پرداخت</a></li>
            <li><a href="chatbot_offline.php">دستیار هوشمند</a></li>
         
            <li><a href="admin.php">مدیریت کاربران</a></li>
            <li><a href="me.php">تماس با ما</a></li>

            
        </ul>
    </nav>
</div>
  </header>-->
    <h2>    آموزش پایتون به زبان ساده      </h2>


    <!-- بخش کارت‌های سه‌گانه -->
<div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin: 50px auto; max-width: 1000px; direction: rtl;">
    
    <div style="flex: 1; min-width: 200px; background: #1e1e2a; padding: 25px; border-radius: 20px; text-align: center; border-bottom: 3px solid #f59e0b;">
        <div style="font-size: 40px;">🤖</div>
        <h3 style="color: #f59e0b;">دستیار هوشمند</h3>
        <p style="color: #ccc; font-size: 14px;">چت‌بات اختصاصی که به سوالات پایتون جواب می‌دهد</p>
    </div>
    
    <div style="flex: 1; min-width: 200px; background: #1e1e2a; padding: 25px; border-radius: 20px; text-align: center; border-bottom: 3px solid #f59e0b;">
        <div style="font-size: 40px;">💻</div>
        <h3 style="color: #f59e0b;">پروژه‌های عملی</h3>
        <p style="color: #ccc; font-size: 14px;">با ساخت پروژه‌های واقعی، پایتون رو عمیق یاد بگیر</p>
    </div>
    
    <div style="flex: 1; min-width: 200px; background: #1e1e2a; padding: 25px; border-radius: 20px; text-align: center; border-bottom: 3px solid #f59e0b;">
        <div style="font-size: 40px;">🐍</div>
        <h3 style="color: #f59e0b;">آموزش از پایه</h3>
        <p style="color: #ccc; font-size: 14px;">از متغیرها تا شیءگرایی، همه چی رو قدم به قدم یاد بگیر</p>
    </div>
    
</div>
<ul >
       <li> در این دوره میپردازیم به </li>
       <li>معرفی دوره پایتون </li>
       <li> نصب و راه اندازی زبان پایتون</li>
       <Li>نصب و راه اندازی نرم افزار  </Li>  
       <Li>بررسی باقی عملگرهای اعداد  </Li>  
       <Li>بررسی انواع داده ها </Li>
</ul>


<div class="bg">
  
<p class="p">
  سایت آموزش پایتون: یادگیری سریع و کاربردی با تصاویر جذاب

</p><br>
<p style="font-size: 25px;">به اولین گام در مسیر هیجان‌انگیز برنامه‌نویسی پایتون خوش آمدید! در این وب‌سایت، ما شما را از ابتدا تا انتها همراهی می‌کنیم تا با زبانی قدرتمند و آینده‌ساز آشنا شوید.</p>
<br><p>کاربران گرامی هیچ گاه برای آموزش دیدن دیر نیست
   <br>
    <br>

بیایید شروع کنیم
 
   آیا شما قبلا ثبت نام کرده اید.تا از امکانات این 
 سایت بهره ببرید؟


     <a class="button"  onclick="alert('wellcom')" class="button">عضوهستم</a>
          <a class="button"  href="http://localhost/login.php" class="button">عضونیستم</a>
<br>

</p>
<div class="d1">
    <div class="d2">     
<div class="div2">Python
<div class="div3"></div>
</div>
</div>    
 <div class="d2"> 
  <br><br><br>
<h4>انتقادات وپیشنهادات</h4>
    <textarea placeholder="answer my 🐉🐉🐉">    </textarea></div></div>
</div>
        
<div style="background-color: rgba(92, 56, 2, 1) ; padding: 3%;  margin:2% 2% 2% 2%;">
<p class="p" >  پروژه‌های کاربردی و پردازش تصویر با پایتون </p><h3>
<p>حالا که با اصول پایتون آشنا شدید، وقت آن است که وارد دنیای هیجان‌انگیز پروژه‌های عملی و پردازش تصویر شوید. با OpenCV، تصاویر را زنده کنید!</p>
<br><P>معرفی پروژه: نمایش تصویر با OpenCV</P></h3><h4>
<p>کتابخانه OpenCV ابزاری قدرتمند برای کار با تصاویر و ویدیوها در پایتون است.
   ما با یک پروژه ساده، 
  نحوه خواندن و نمایش یک تصویر را به شما آموزش می‌دهیم.</p></h4><br><br>
  <div class="d3">
  <div class="d2" style="background-color: rgba(75, 40, 1, 1);"><br>
    <p><h3 style="text-align:left">
      import cv2<br>
img=cv2.imread("image.jpg")
<br>
cv2.imshow("MyImage",img)
<br>
cv2.waitKey(0)
<br>
cv2.destroyAllWindows()</h3>
</p>   </div>
      <div class="d2"> 
   <img src="p6.png" width="600" height="500"><br></div>
</div>
<h3>پردازش تصویر چیست؟

پردازش تصویر شامل دستکاری و تحلیل تصاویر دیجیتال برای بهبود کیفیت، استخراج اطلاعات یا تبدیل آن‌ها به فرمت‌های دیگر است. کاربردهای آن از فیلترهای موبایل تا تشخیص چهره و پزشکی گسترده است.

رسم اشکال هندسی روی تصویر</h3>
<div class="d3" style="background-color: rgba(75, 40, 1, 1);"><br>
    <p> <h3 style="text-align: left;">import cv2<br>
import numpy as np<br>

img = np.zeros((500,500,3), np.uint8)<br>
cv2.circle(img, (250, 250), 100, (0, 0, 255), -1)<br>
cv2.imshow("Circle", img)<br>
cv2.waitKey(0)<br>
cv2.destroyAllWindows()<br>
</h3>
</p>  </div>

<p><h3>معرفی کتابخانه‌های مهم

برای پردازش تصویر و داده‌ها، با کتابخانه‌هایی مانند OpenCV، Pillow و NumPy آشنا شوید. ما لینک مستندات فارسی و انگلیسی آن‌ها را برای مطالعه بیشتر ارائه می‌دهیم.

نکات نصب کتابخانه‌ها

با دستور pip install [نام_کتابخانه] به راحتی می‌توانید کتابخانه‌های مورد نیاز خود را نصب و آماده استفاده کنید.</h3></p>


</div>
<img src="logo1.png" width="200" height="200" >
</body>
<!--<footer>

<div class="container clearfix">
    <div class="footer-col">
        <h3>Python Batab</h3>
        
        <ul>
            <li style="color: #ccc;">یادگیری برنامه‌نویسی پایتون به صورت شیءگرا و پروژه‌محور</li>
    </div>
    <div class="footer-col">
        <h3>لینک‌های سریع</h3>

        <ul>
            <li><a href="admin.php" style="color: #ccc;">کاربران</a></li>
            <li><a href="login.php" style="color: #ccc;">ثبت نام</a></li>
            <li><a href="me.php" style="color: #ccc;">حریم خصوصی</a></li>
        </ul>
    </div>
    <div class="footer-col">
        <h3>اطلاعات تماس</h3>
        <ul>
            <li>تلفن:    09186673135            </li>
            <li>ایمیل: info@batab_payton.com    zyzyasra@gmail.com  </li>
            <li> آدرس: سنندج، ...</li>
        </ul>
    </div>
</div>
<div class="copyright">
    &copy; <?php echo date("Y"); ?> Python Batab. All Rights Reserved.
    /html/body/aside /batab payton/Asra Azizi/03121100705036//
</div>
</footer>-->
<?php include 'footer.php'; ?>
</html>

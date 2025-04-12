<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم إرسال الرسالة بنجاح</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .success-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .success-container::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 40px;
            box-shadow: 0 5px 15px rgba(74, 172, 254, 0.3);
        }
        
        h1 {
            color: #333;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        p {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
            font-size: 18px;
        }
        
        .btn {
            display: inline-block;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(74, 172, 254, 0.3);
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(74, 172, 254, 0.4);
        }
        
        .btn:active {
            transform: translateY(1px);
        }
        
        @media (max-width: 480px) {
            .success-container {
                padding: 30px 20px;
            }
            
            .success-icon {
                width: 60px;
                height: 60px;
                font-size: 30px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h1>تم إرسال الرسالة بنجاح</h1>
        <a href="{{route('home')}}" class="btn">العودة إلى الصفحة الرئيسية</a>
    </div>
</body>
</html>
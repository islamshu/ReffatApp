<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نظام إرسال الرسائل</title>
    <!-- استخدم هذا الرابط المعدل -->
    <script src="https://cdn.seven.io/api/sdk/seven.min.js"></script>

      <style>
        body {
            font-family: 'Tahoma', sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f9fc;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        #status {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }
        .success { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center;color:#2c3e50;">إرسال رسائل SMS</h1>
        
        <div class="form-group">
            <label for="apiKey">مفتاح API:</label>
            <input type="password" id="apiKey" value="ak9ggjKGMeduxurp6CguYbY0att8IjtMayBJJiSWsfGeB1FO8dcJ0nmxKpfBs8Cj" placeholder="أدخل مفتاح API الخاص بك">
        </div>
        
        <div class="form-group">
            <label for="phone">رقم الهاتف:</label>
            <input type="tel" id="phone" placeholder="مثال: 966501234567">
        </div>
        
        <div class="form-group">
            <label for="message">نص الرسالة:</label>
            <textarea id="message" rows="5" placeholder="أدخل نص الرسالة هنا..."></textarea>
        </div>
        
        <button onclick="sendSMS()">إرسال الرسالة</button>
        
        <div id="status"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (!window.Seven) {
                alert("حدث خطأ في تحميل المكتبة. جاري تحميل نسخة احتياطية...");
                loadBackupLibrary();
                return;
            }
            initApp();
        });

        function loadBackupLibrary() {
            const script = document.createElement('script');
            script.src = 'https://unpkg.com/@seven.io/api@latest/dist/seven.min.js';
            script.onload = initApp;
            script.onerror = function() {
                alert("فشل تحميل المكتبة. الرجاء المحاولة لاحقاً.");
            };
            document.head.appendChild(script);
        }

        function initApp() {
            window.sevenClient = new Seven({
                apiKey: prompt("أدخل مفتاح API الخاص بك:")
            });
            
            console.log("تم تهيئة المكتبة بنجاح!");
        }

        async function sendSMS() {
            try {
                const response = await sevenClient.sms.send({
                    to: document.getElementById('phone').value,
                    text: document.getElementById('message').value
                });
                alert("تم الإرسال بنجاح!");
            } catch (error) {
                alert("خطأ: " + error.message);
            }
        }
    </script>
</body>
</html>
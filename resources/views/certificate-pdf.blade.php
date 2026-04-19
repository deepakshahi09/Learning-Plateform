<!DOCTYPE html>
<html>
<head>
    <style>
        body {
        font-family: DejaVu Sans, sans-serif;
        text-align: center;
        background-color: #f3f4f6;
        margin: 0;
        padding: 0;
        }

        .container {
             width: 90%;
        margin: 20px auto;
        padding: 40px;
        border: 10px solid #facc15;
        border-radius: 20px;
        background: #ffffff;
        box-sizing: border-box;
        }

        h1 {
            font-size: 34px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 20px;
        }

        .name {
            font-size: 30px;
            font-weight: bold;
            color: #2563eb;
            margin: 15px 0;
        }

        .quiz {
            font-size: 22px;
            color: #7c3aed;
            margin: 10px 0;
        }

        .date {
            margin-top: 20px;
            color: #4b5563;
        }

        .signatures {
            margin-top: 60px;
            width: 100%;
        }

        .sign-box {
            width: 40%;
            display: inline-block;
            text-align: center;
        }

        .line {
            border-top: 1px solid #6b7280;
            margin: 20px auto 5px;
            width: 150px;
        }

        .footer-text {
            margin-top: 30px;
            font-size: 12px;
            color: #9ca3af;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Certificate of Completion</h1>

    <p class="subtitle">This is to certify that</p>

    <div class="name">{{ $name }}</div>

    <p>has successfully completed the quiz</p>

    <div class="quiz">{{ $quiz }}</div>

    <p class="date">Date: {{ date('d M Y') }}</p>

    <div class="sign-box">
        <!-- <img src="{{ public_path('image.png') }}" height="50"> -->
        <div class="line"></div>
        <p>Instructor</p>
    </div>

    <div class="sign-box">
        <!-- <img src="{{ public_path('signature.png') }}" height="50"> -->
        <div class="line"></div>
        <p>Authorized Sign</p>
    </div>

    <p class="footer-text">© Quiz System Certificate</p>

</div>

</body>
</html>
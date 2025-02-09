<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comming soon</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right, #22b6e1, #df2a83);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .coming-soon {
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .coming-soon h1 {
            font-size: 4em;
            margin-bottom: 20px;
            animation: fade 2s infinite;
        }

        @keyframes fade {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        @media (max-width: 768px) {
            .coming-soon h1 {
                font-size: 2.5em;
            }
        }
    </style>
</head>
<body>
    <div class="coming-soon">
        <h1>frame Line </h1>
        <h1>Comming Soon</h1>
    </div>
</body>
</html>
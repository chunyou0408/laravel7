<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        nav{
            height: 74px;
            width: 100%;
            background-color: lightgray;
        }
        a{
            text-decoration:none;
        }
        ul{
            list-style: none;
            padding: 0 10px;
            margin: 0;

            display: flex;
            align-items: center;
            height: 100%;
            width: 100%;
        }
        li{
            margin-right: 10px;
        }
        main{
            height: 70vh;
        }
        footer{
            height: 150px;
            width: 100%;
            background-color: lightgray;
        }
    </style>
    @yield('css')
</head>
<body>
    <nav>
        <ul>
            <li><a href="/home">回首頁</a></li>
            <li><a href="/news">最新消息</a></li>
            <li><a href="/test1">第二頁</a></li>
        </ul>
    </nav>
    <main>
        @yield('main')
    </main>
    <footer>
    </footer>

    @yield('js')
</body>
</html>

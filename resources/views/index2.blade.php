<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container {
            width: 100%;
            display: flex;
            flex-wrap: wrap;

        }

        #formBtn {
            cursor: pointer;
            width: 150px;
            padding: 25px 0;
            background-color: gray;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- 留言 -->
    <form action="http://127.0.0.1:8000/create_contace_us" method="post">
        <div class="form-group">
            <label for="">姓名</label>
            <input id="name" name="name" type="text" required>
        </div>
        <div class="form-group">
            <label for="">電話</label>
            <input id="phone" name="phone" type="text" required>
        </div>
        <div class="form-group">
            <label for="">信箱</label>
            <input id="email" name="email" type="text" required>
        </div>
        <div class="form-group">
            <label for="">主旨</label>
            <input id="title" name="title" type="text">
        </div>
        <div class="form-group">
            <label for="">內容</label>
            <textarea id="content" name="content" id="" cols="30" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <button id="formBtn" type="button">輸入</button>
        </div>
    </form>

    {{-- <script>
    var formBtn = document.querySelector('#formBtn')
            formBtn.onclick = function () {
            var name = document.querySelector('#name')
            var phone = document.querySelector('#phone')
            var email = document.querySelector('#email')
            var title = document.querySelector('#title')
            var content = document.querySelector('#content')

            const url = 'http://127.0.0.1:8000/create_contace_us';

            var formData = new FormData();
            formData.append('name', name.value);
            formData.append('phone', phone.value);
            formData.append('email', email.value);
            formData.append('title', title.value);
            formData.append('content', content.value);



            //fetch(網址,其他參數)
            fetch(url, {
                method: 'POST', // or 'PUT'
                body: formData, // data can be `string` or {object}!
            }).then(res => res.text())
                .catch(error => console.error('錯誤:', error))
                .then(function (response) {
                    console.log('結果:', formData)
                });



            // fetch(url,)
            // }



    </script> --}}
</body>

</html>
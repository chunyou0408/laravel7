@extends('layouts.00-template')

@section('css')
<link rel="stylesheet" href="/css/booking.css">
<!-- DataTables v1.10.23-->
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection

@section('main')
<div class="container">
    <div class="booking-title">
        <span>BOOKING</span>
    </div>
    <table id="myTable" class="display" style="border-spacing: 2px;">
        <button id="prevMonth">上個月</button>
        <button id="nextMonth">下個月</button>
        <thead>
            <tr>
                <th>日</th>
                <th>一</th>
                <th>二</th>
                <th>三</th>
                <th>四</th>
                <th>五</th>
                <th>六</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <td class="calendar-date">
                    <div class="day">
                        <span class="day-num">1</span>
                        <ul>
                            <li>aaaaaaa</li>
                            <li>bbbbbbb</li>
                            <li>ccccccc</li>
                            <li>ddddddd</li>
                            <li>eeeeeee</li>
                        </ul>
                    </div>
                </td> --}}
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <?php $name = Auth::user()->name;
                        // $phone = Auth::user()->phone;
                        $email = Auth::user()->email;
                        ?>
                        <div class="form-group">
                            <label for="name">姓名:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="content">電話:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$email}}" required>
                        </div>
                        <div class="form-group">
                            <label for="area_id">區域:</label>
                            <select class="form-control" id="area_id" name="area_id" required>
                                @foreach ($areaTypes as $areaType)
                                <option value="{{$areaType->id}}">{{$areaType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">日期:</label>
                            <input type="date" class="form-control" min="0" id="date" name="date" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="createBooking_btn" class="btn btn-primary">立即預約</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Large modal -->


    <div class="modal fade bd-example-modal-lg" id="result_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">預約結果</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>訂單編號:</label>
                            <label class="order_number"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>姓名:</label>
                            <label class="name"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>電話:</label>
                            <label class="phone"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>信箱:</label>
                            <label class="email"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >區域:</label>
                            <label class="area_id"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>日期:</label>
                            <label class="date"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('js')
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
            $('#myTable').DataTable({
                "bPaginate": false, // 顯示換頁
                "searching": false, // 顯示搜尋
                "info": false, // 顯示資訊
                "bSort": false, // 顯示排序
            });
        });
</script>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var area_id = button.data('area_id') // Extract info from data-* attributes
    var date = button.data('date')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

    //將文字加入到MODEL上
    var modal = $(this)
    modal.find('.modal-title').text('露營預約')
    modal.find('.modal-body #area_id').val(area_id)
    modal.find('.modal-body #date').val(year+"-"+pad((month+1),2)+"-"+pad(date,2))

    })

    //將數字補零 num=數字 n=位數
    function pad(num, n) {
        if ((num + "").length >= n) return num;
        return pad("0" + num, n);
    }

</script>


<script>
    var currentMonth = new Array();

    var myTable = document.querySelector('#myTable');
    var setMonth_btn = document.querySelector('#setMonth_btn');
    var currentYearMonth = document.querySelector('.current-year-month');

    var year = new Date().getFullYear(); //年 目前年份
    var month = new Date().getMonth();//月 目前月份
    var lastDay = new Date(year, month+1, 0).getDate();

    console.log("目前日期:"+year + "年" + (month+1) + "月");



    booking_search(year,month);

    //向後端取預約資料(單月取)
    function booking_search(year,month){

        var _token= document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var formData = new FormData();
        formData.append('year',year);
        formData.append('month',month);
        formData.append('lastDay',lastDay);
        formData.append('_token',_token);

        fetch(`booking_search`, {
                method: 'POST',
                body: formData,
            })
            .then(function (response){
                return response.json();
            })
            .catch(function (error){
                console.log('錯誤:',error);
            })
            .then(function(data){
                // console.log('成功:',data);
                // console.log(data);
                currentMonth = new Array();


                data.forEach((element,index) => {
                var a=0,b=0,c=0,d=0,e=0;

                    element.forEach((countArea,index) => {

                        if (countArea['area_id']== 1){
                            a=a+1;
                        }else if (countArea['area_id']== 2){
                            b=b+1;
                        }else if (countArea['area_id']== 3){
                            c=c+1;
                        }else if (countArea['area_id']== 4){
                            d=d+1;
                        }else if (countArea['area_id']== 5){
                            e=e+1;
                        }


                    });
                    // console.log(index+1+"日");
                    // console.log('a=',a);
                    // console.log('b=',b);
                    // console.log('c=',c);
                    // console.log('d=',d);
                    // console.log('e=',e);


                    currentMonth.push([a,b,c,d,e]);
                });

                createCalendar(year, month);

            });
            // console.log('二維');
            console.log(currentMonth);
        }


        var prevMonth = document.querySelector('#prevMonth');
        var nextMonth = document.querySelector('#nextMonth');
        //上一月按鈕
        prevMonth.onclick=function(){
            if(month>0){
                month=month-1;
            }else{
                month=11;
                year=year-1;
            }
            booking_search(year,month);
        }

        //下一月按鈕
        nextMonth.onclick=function(){

            if(month<11){
                month=month+1;
            }else{
                month=0;
                year=year+1;
            }
            booking_search(year,month);
        }

        //建立月曆
        function createCalendar(yy, mm) {



            var day_num = 1;
            var indexNextLine = 1;
            var text = ""; //放字串

            var firstDay = new Date(yy, mm, 1).getDay();
            var lastDay = new Date(yy, mm+1, 0).getDate();
            var today = Date.now();


            var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var formData = new FormData;
            formData.append('_token',_token);

            var bookingtype = new Array();

            fetch('/area_types', {
                    method:'POST',
                    body:formData,
                })
                .then(function (response){
                    return response.json()
                })
                .catch(function (error){
                    console.log('錯誤:',error);
                })
                .then(function(data){
                    // console.log(data);

                    data.forEach((element,index) => {
                        bookingtype[index] = element;
                    });




            // console.log("目前日期:"+year + "年" + (month+1) + "月" + "第一天:"+firstDay
            // +"有幾天:"+lastDay );

            myTable.innerHTML = `
            <thead>
                <tr>
                    <th colspan="7">
                        <span class="current-year-month">${yy+"/"+(mm+1)}</span>
                    </th>
                </tr>
                <tr>
                    <th>日</th>
                    <th>一</th>
                    <th>二</th>
                    <th>三</th>
                    <th>四</th>
                    <th>五</th>
                    <th>六</th>
                </tr>
            </thead>
            `
            text = '<tbody><tr>'
            for (let index = 0; index < firstDay; index++) {
                text = text + "<td> </td>";
                indexNextLine++;
            }

            while (day_num <= lastDay) {
                //換行用
                var date = new Date(yy, mm, day_num);

                if (indexNextLine > 7) {
                    indexNextLine = 1;
                    text = text + ` </tr><tr>`;
                }

                if(date > today){
                    var active=""
                    if (indexNextLine == 6 || indexNextLine == 7){
                        active="active";
                    }else{
                        active="";
                    }

                    text = text + `
                <td class="calendar-date">
                    <div class="day">
                        <span class="day-num">${day_num}</span>
                        <span class="tag">
                        營位 ${20-(currentMonth[day_num-1][0])+
                        20-(currentMonth[day_num-1][1])+
                        20-(currentMonth[day_num-1][2])+
                        20-(currentMonth[day_num-1][3])+
                        20-(currentMonth[day_num-1][4])}
                        <ul class="ul ${active}">

                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-area_id="1" data-date="${day_num}">
                                ${bookingtype[0]['name']}_${20-(currentMonth[day_num-1][0])}個空位 預約
                            </div></li>

                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-area_id="2" data-date="${day_num}">
                                ${bookingtype[1]['name']}_${20-(currentMonth[day_num-1][1])}個空位 預約
                            </div></li>

                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-area_id="3" data-date="${day_num}">
                                ${bookingtype[2]['name']}_${20-(currentMonth[day_num-1][2])}個空位 預約
                            </div></li>

                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-area_id="4" data-date="${day_num}">
                                ${bookingtype[3]['name']}_${20-(currentMonth[day_num-1][3])}個空位 預約
                            </div></li>

                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-area_id="5" data-date="${day_num}">
                                ${bookingtype[4]['name']}_${20-(currentMonth[day_num-1][4])}個空位 預約
                            </div></li>
                        </ul>

                        </span>
                    </div>
                </td>`;

                }else{
                text = text + `
                <td class="calendar-date">
                    <div class="day">
                        <span class="day-num">${day_num}</span>
                    </div>
                </td>`;
                }


                indexNextLine++;
                day_num++;
            }

            for (let index = indexNextLine; index <= 7; index++) {
                text = text + "<td> </td>";
                indexNextLine++;
            }

            text = text + `</tr></tbody>`;



            myTable.innerHTML += text;

            console.log(yy + "年" + (mm+1) + "月");

        });

        }

        //發送資料到後端
        var createBooking_btn = document.querySelector('#createBooking_btn');
        var close = document.querySelector('.close');

        createBooking_btn.onclick=function(){

            var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var name = document.querySelector('#name');
            var phone = document.querySelector('#phone');
            var area_id = document.querySelector('#area_id');
            var email= document.querySelector('#email');
            var date = document.querySelector('#date');

            //判斷表單有沒有沒填入的資料
            if (name.value == "" || phone.value == "" || area_id.value == "" || email.value == "" || date.value == "") {
                alert('有資料還沒輸入');
            }else{
                //建立表單
                var formData = new FormData;
                //存入資料庫
                formData.append('name',name.value);
                formData.append('phone',phone.value);
                formData.append('email',email.value);
                formData.append('area_id',area_id.value);
                formData.append('date',date.value);
                formData.append('_token',_token);

                fetch('/booking_store', {
                    method:'POST',
                    body:formData,
                })
                .then(function (response){
                    return response.json()
                })
                .catch(function (error){
                    console.log('錯誤:',error);
                    alert('請稍後再試');

                })
                .then(function(data){
                    console.log(data);
                    //關閉原本的MODAL
                    close.click();
                    //開啟預約成功的MODAL
                    $("#result_modal").modal();
                    var modal = $("#result_modal")
                    modal.find('.modal-title').text('預約結果:成功')
                    modal.find('.modal-body .name').text(data.name)
                    modal.find('.modal-body .phone').text(data.phone)
                    modal.find('.modal-body .email').text(data.email)
                    modal.find('.modal-body .area_id').text(data.area_type.name)
                    modal.find('.modal-body .date').text(data.date)
                    modal.find('.modal-body .order_number').text(data.order_number)
                    name.value = "";
                    phone.value = "";
                    area_id.value = "";
                    email.value = "";
                    date.value = "";

                    console.log("年:"+year+"月:"+month);
                    booking_search(year,month);
                });
            }
        }
</script>

@endsection

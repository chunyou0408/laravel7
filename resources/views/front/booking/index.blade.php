@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="/css/booking.css">
<!-- DataTables v1.10.23-->
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection

@section('main')
<div class="container">

    <table id="myTable" class="display">
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
                <td class="calendar-date">
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
                </td>
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
                        <div class="form-group">
                            <label for="name" class="col-form-label">姓名:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">手機:</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">營位:</label>
                            <input type="text" class="form-control" id="camp-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">入營時間:</label>
                            <input type="date" class="form-control" id="date" value="2021-01-29">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">立即預約</button>
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
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var date = button.data('date')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

    //將文字加入到MODEL上
    var modal = $(this)
    modal.find('.modal-title').text('露營預約')
    modal.find('.modal-body #camp-name').val(recipient)
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

                        if (countArea['area']== 1){
                            a=a+1;
                        }else if (countArea['area']== 2){
                            b=b+1;
                        }else if (countArea['area']== 3){
                            c=c+1;
                        }else if (countArea['area']== 4){
                            d=d+1;
                        }else if (countArea['area']== 5){
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
            console.log('二維');
            // console.log(currentMonth);

        }


        var prevMonth = document.querySelector('#prevMonth');
        var nextMonth = document.querySelector('#nextMonth');
        prevMonth.onclick=function(){
            if(month>0){
                month=month-1;
            }else{
                month=11;
                year=year-1;
            }
            booking_search(year,month);
        }
        nextMonth.onclick=function(){

            if(month<11){
                month=month+1;
            }else{
                month=0;
                year=year+1;
            }
            booking_search(year,month);

        }


        function createCalendar(yy, mm) {

            var day_num = 1;
            var indexNextLine = 1;
            var text = ""; //放字串

            var firstDay = new Date(yy, mm, 1).getDay();
            var lastDay = new Date(yy, mm+1, 0).getDate();

            console.log("目前日期:"+year + "年" + (month+1) + "月" + "第一天:"+firstDay
            +"有幾天:"+lastDay );

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

                if (indexNextLine > 7) {
                    indexNextLine = 1;
                    text = text + ` </tr><tr>`;
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
                        <ul>
                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="A區營位" data-date="${day_num}">
                                A區${20-(currentMonth[day_num-1][0])}個空位 預約
                            </div></li>
                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="B區營位" data-date="${day_num}">
                                B區${20-(currentMonth[day_num-1][1])}個空位 預約
                            </div></li>
                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="C區營位" data-date="${day_num}">
                                C區${20-(currentMonth[day_num-1][2])}個空位 預約
                            </div></li>
                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="D區營位" data-date="${day_num}">
                                D區${20-(currentMonth[day_num-1][3])}個空位 預約
                            </div></li>
                            <li><div type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="E區營位" data-date="${day_num}">
                                E區${20-(currentMonth[day_num-1][4])}個空位 預約
                            </div></li>
                        </ul>
                        </span>
                    </div>
                </td>`;
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

        }



</script>

@endsection

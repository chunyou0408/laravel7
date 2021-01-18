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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>

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

        var DayArray = new Array();




        var myTable = document.querySelector('#myTable');
        var setMonth_btn = document.querySelector('#setMonth_btn');
        var currentYearMonth = document.querySelector('.current-year-month');

        var year = new Date().getFullYear(); //年 目前年份
        var month = new Date().getMonth();//月 目前月份

        console.log("目前日期:"+year + "年" + (month+1) + "月");



        booking_search(year,month);


        function booking_search(year,month){

        var _token= document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var formData = new FormData();
        formData.append('year',year);
        formData.append('month',month);
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
                console.log(data);
                createCalendar(year, month);


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

                    console.log(index+1+"日");
                    console.log('a=',a);
                    console.log('b=',b);
                    console.log('c=',c);
                    console.log('d=',d);
                    console.log('e=',e);
                });



            // console.log(DayArray);


            });
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


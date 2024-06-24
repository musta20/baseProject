<x-admin.layout>

    <script src="{{ asset('Dashboard/chart.min.js') }}"></script>
    <script src="{{ asset('Dashboard/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Dashboard/jquery-jvectormap-1.2.2.min.js') }}"></script>

    <div class="px-5  pt-5">

        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">

            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600" > نظرة عامة</span>

        </div>


        <div class="grid grid-cols-2 ">
            <div class="p-5" >
                <canvas id="myChart"></canvas>
            </div>

            <div class="p-5" >
                <canvas id="myChart1"></canvas>
            </div>

            <div class="p-5" >
                <canvas id="myChart2"></canvas>
            </div>

            <div class="p-5" >
                <canvas id="myChart3"></canvas>
            </div>

            <div class="p-5" >
                <canvas id="myChart4"></canvas>
            </div>

            <div class="p-5" >
                <canvas id="myChart5"></canvas>
            </div>

            <div class="p-5" >
                <canvas id="myChart6"></canvas>
            </div>

        </div>
{{--
            <div class="row">
                <br>
                <div class="col-12">
                    <h5>نظرة عامة</h5>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart4"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart5"></canvas>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart6"></canvas>
                        </div>
                    </div>
                </div>

            </div> --}}


{{--                 {{ json_encode($orderWeek) }};
' اجمالي طلبات الاسبوع '
'myChart'
--}}                <script>
                function drawFunction(dataArray,lable,id,bgc,bc) {


                const labels = [
                    'السبت',
                    'الاحد',
                    'الاثنين',
                    'الثلاثاء',
                    'الاربعاء',
                    'الخميس',
                    'الجمعة',
                ];

                function add(accumulator, a) {
                    return accumulator + a;
                }




                let count = dataArray.reduce(add, 0);
                const data = {
                    labels: labels,
                    datasets: [{
                        label: lable + count,
                        backgroundColor: bgc,
                        borderColor: bc,
                        data: dataArray,
                    }]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };

                const myChart = new Chart(
                    document.getElementById(id),
                    config
                );
            }
            drawFunction({{ json_encode($orderWeek) }},' اجمالي طلبات الاسبوع ','myChart','rgb(0, 255, 64)','rgb(0, 153, 51)')
            drawFunction({{ json_encode($orderWeekConplete) }},' اجمالي طلبات المكتملة خلال الاسبوع ','myChart1','rgb(0, 255, 64)','rgb(0, 153, 51)')
            drawFunction({{ json_encode($orderWeekOnProsses) }},' اجمالي طلبات التي يجري العمل عليها ','myChart2','rgb(0, 255, 64)','rgb(0, 153, 51)')
            drawFunction({{ json_encode($orderWeekDelevred) }},' اجمالي طلبات المسلمه ','myChart3','rgb(0, 255, 64)','rgb(0, 153, 51)')

            drawFunction({{ json_encode($alltaskrWeek) }},' اجمالي المهام  ','myChart4','rgb(101, 169, 14)','rgb(101, 169, 14)')
            drawFunction({{ json_encode($taskrWeek) }},'   المهام المسندة ','myChart5','rgb(101, 169, 14)','rgb(101, 169, 14)')
            drawFunction({{ json_encode($taskWeekdone) }},' المهام المنجزه   ','myChart6','rgb(101, 169, 14)','rgb(101, 169, 14)')

            </script>
    </div>

</x-admin.layout>
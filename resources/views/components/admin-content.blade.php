            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->



            <!-- Start Content-->
            <div class="container-fluid">

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
       
                </div>


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


{{-- 

public $orderWeekConplete = [];
public $orderWeekOnProsses = [];
public $orderWeekDelevred = []; --}}




{{-- 

                <div class="row">

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                        <!-- <i class="bx bx-shopping-bag  font-medium-5"></i> -->
                                        <i class="bx bxl-dropbox font-medium-5"></i>
                                    </div>
                                    <p class="text-muted mb-0 line-ellipsis"> عدد الطلبات </p>
                                    <h2 class="mb-0">{{ $allnumber['order'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <a href="/adminpanel/catagorys.php">

                                        <div
                                            class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
                                            <i class="bx bxs-categories font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis"> عدد الاقسام </p>
                                        <h2 class="mb-0">{{ $allnumber['cat'] }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <a href="/adminpanel/services.php">

                                        <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                            <i class="bx bx-briefcase font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis"> عدد الخدمات </p>
                                        <h2 class="mb-0">{{ $allnumber['services'] }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <a href="/adminpanel/msg.php">

                                        <div
                                            class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                            <i class="bx bx-message font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">عدد الرسائل</p>
                                        <h2 class="mb-0">{{ $allnumber['msg'] }}</h2>


                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <a href="/adminpanel/order.php">

                                        <div
                                            class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
                                            <i class="bx bxs-file-plus font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">الطلبات الجديدة</p>
                                        <h2 class="mb-0">{{ $allnumber['order'] }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <a href="/adminpanel/completed_orders.php">

                                        <div
                                            class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                                            <i class="bx bxs-checkbox-checked font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">الطلبات المنفذة</p>
                                        <h2 class="mb-0">{{ $allnumber['order'] }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
                                        <i class="bx bx-user-plus font-medium-5"></i>
                                    </div>
                                    <p class="text-muted mb-0 line-ellipsis"> عدد المراجعات </p>
                                    <h2 class="mb-0">{{ $allnumber['clent'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>



                </div> --}}
                <!-- end row -->

            </div>
            <!-- container -->


            <!-- content -->


            <!-- end Footer -->


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

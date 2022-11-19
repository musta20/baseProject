<x-admin-layout>
    <h3> طلب التوظيق</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />


        <table>
            <tr>
                <th>الاسم</th>
                <td>{{ $job->name }}</td>
            <tr>
            </tr>
            <th>الوظيفة </th>
            <td>{{ $job->job->title }}</td>
            </tr>

            </tr>
            <th>البريد الالكتروني</th>
            <td>{{ $job->email }}</td>
            <tr>
            </tr>
            <th>الجوالي</th>
            <td>{{ $job->phone }}</td>
            <tr>
            </tr>
            <th>المؤهل التعليمي </th>
            <td>{{ $job->cert }}</td>
            </tr>

            </tr>
            <th> التخصص الدراسي</th>
            <td>{{ $job->majer }}</td>
            </tr>



            </tr>
            <th> الخبرات السايقة</th>
            <td>{{ $job->exp_des }}</td>
            </tr>

            </tr>
            <th> عدد سنوات الخبرة</th>
            <td>{{ $job->exp }}</td>
            </tr>



            </tr>
            <th> مقر السكن</th>
            <td>{{ $job->city }}</td>
            </tr>


            </tr>
            <th> تحدث عن نفسك </th>
            <td>{{ $job->about }}</td>
            </tr>






            </tr>
            <th> السيرة الذاتية</th>
            <td>

                <br>
             
                <div class="card my-1 shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-sm">

                                </div>
                            </div>
                            <div class="col ps-0">
                                <a target="_blank" href="{{ url('/storage/' .  $job->cv) }}"
                                    class="text-muted fw-bold">
                                    السيرة الذاتية
                                </a>  
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                    <i class="ri-download-2-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


              </td>
            </tr>





        </table>



        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>

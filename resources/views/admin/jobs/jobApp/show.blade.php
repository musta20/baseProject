@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <h3> طلب التوظيق</h3>
            <x-card-message />


        </div>
        <table>
            <tr>
                <th>الاسم</th>
                <td>{{ $job->name }}</td>
            <tr>
            </tr>
            <th>الوظيفة </th>
            <td>{{ $job->job_id }}</td>
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
            <td>{{ $job->cv }}</td>
        </tr>





        </table>
    </section>


    <x-model-box></x-model-box>
@endsection

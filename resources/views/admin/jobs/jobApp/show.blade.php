<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>طلب التوظيف</h3>
            </span>


        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
<table class="table  table-striped table-centered mb-0">
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

        </div>
    </div>
</x-admin.layout>
{{--
<x-admin-layout>
    <h3>طلبات التوظيف</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />


        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th> المسمى الوظيفي</th>
                    <th>تاريخ الطلب</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($alljopapp as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->job->title }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="cellControll">
                        <a href="{{ route('admin.JobApp.edit' , $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.JobApp.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alljopapp->links('admin.pagination.custom') }}



        </script>

        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout> --}}

{{-- s --}}

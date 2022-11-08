<nav>
        @can('Massages')
        <a href="{{url('/admin/AllMessages')}}">الرسائل</a>
        @endcan
       
        @can('Report')
        <a href="{{url('/admin/Reportmain')}}">التقارير</a>
        @endcan
        
        @can('Users')
        <a href="{{url('/admin/Users')}}">الموظفين</a>
        @endcan
        

        @can('TaskMangment')
        <a href="{{url('/admin/MenuTask')}}">إدارة المهام</a>
        @endcan


        @can('Task')
        <a href="{{url('/admin/MainTask')}}">المهام</a>
        @endcan

        @can('Category/Services')
        <a href="{{url('/admin/Services')}}">الخدمات</a>
        <a href="{{url('/admin/Category')}}">التصنيفات</a>
        @endcan
        

        @can('Reviews')
        <a href="{{url('/admin/Clients')}}">أراء العملاء</a>
        @endcan

        @can('Order')
        <a href="{{url('/admin/Order')}}">الطلبات</a>
        @endcan

        @can('Setting')
        <a href="{{url('/admin/Setting')}}">إعداد الموقع</a>
        @endcan

        @can('jobs')
        <a href="{{url('/admin/main')}}">التوظيف</a>
        @endcan

        @can('Logs')
        <a href="{{url('/admin/Logs')}}">التتبع</a>
        @endcan
</nav>

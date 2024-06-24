<nav>
        @can('Massages')
        <a href="{{ route()->route('admin.AllMessages') }}">الرسائل</a>
        @endcan

        @can('Report')
        <a href="{{ route('admin.Reportmain') }}">التقارير</a>
        @endcan

        @can('Users')
        <a href="{{ route('admin.Users.index') }}">الموظفين</a>
        @endcan


        @can('TaskMangment')
        <a href="{{ route('admin.admin.MenuTask') }}">إدارة المهام</a>
        @endcan


        @can('Task')
        <a href="{{ route('admin.admin.MainTask') }}">المهام</a>
        @endcan

        @can('Category/Services')
        <a href="{{ route('admin.Services.index') }}">الخدمات</a>
        <a href="{{ route('admin.Category.index') }}">التصنيفات</a>
        @endcan


        @can('Reviews')
        <a href="{{ url('/admin/Clients') }}">أراء العملاء</a>
        @endcan

        @can('Order')
        <a href="{{ route('admin.Order.index') }}">الطلبات</a>
        @endcan

        @can('Setting')
        <a href="{{ route('admin.Setting') }}">إعداد الموقع</a>
        @endcan

        @can('jobs')
        <a href="{{ route('admin.main') }}">التوظيف</a>
        @endcan

        @can('Logs')
        <a href="{{ url('/admin/Logs') }}">التتبع</a>
        @endcan
</nav>

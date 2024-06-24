<x-admin-layout>

    <section class="boxs border">

        <a href="{{ route('admin.Task.index') }}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3>  المهام الداخلية</h3>
        </a>

        <a href="{{ route('admin.TasksNotify.index') }}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3>التنبيهات</h3>
        </a>






    </section>

</x-admin-layout>
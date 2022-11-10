<header>

    <i class="fa-solid fa-bars"></i>
    @auth
    <div class="userBox">
        {{ auth()->user()->name }}
    <a href="{{url('/logout')}}">تسجيل الخروج</a>
    </div>
    <div class="userBox">
        {{getNotif()['all']}}
    </div>
    
    @else
        <div class="userBox">المدير</div>

    @endauth

    </div>
</header>

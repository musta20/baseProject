                        <footer>
                            <div class="logoFooter">
                                <span>
                                    <img width="80" src="{{asset('imgs/h.svg')}}" />
                                </span>
                                {{ $setting->footertext }}
                                <span>
                                    @foreach ($social as $soclLik)
                                        <a href="{{ $soclLik->url }}">
                                            {{ $soclLik->img }}
                                        </a>
                                    @endforeach
                                </span>
                            </div>
                            <div class="fastLink">
                                <p>صفحات سريعة
                                </p>

                                <span>
                                    <a href="/">
                                        الرئيسية                                    
                                    </a>
                                    <a href="{{route('category')}}">
                                        خدماتنا
                                    </a>
                                    <a href="{{route('contact')}}">
                                        تواصل معنا
                                    </a>

                                    <a href="{{route('jobs')}}">
                                        التوظيف
                                    </a>
                                    <a href="{{route('CheckStatus')}}">
                                        الإستعلام
                                    </a>
                                </span>
                            </div>
                            <div class="fastLink">
                                <p> اتصل بنا
                                </p>
                                <span>
                                    <a href="#">
                                        <i class="fa-solid fa-phone"></i>
                                        {{ $setting->phone }} </a>
                                    <a href="#">
                                        <i class="fa-solid fa-envelope"></i>

                                        {{ $setting->email }}</a>
                                    <a href="#">
                                        <i class="fa-solid fa-calendar-week"></i>

                                         {{ $setting->weekwork }}
                                        
                                    </a>
                                    <a href="#">
                                        <i class="fa-solid fa-location-dot"></i>

                                        {{ $setting->adress }} </a>
                                </span>
                            </div>
                        </footer>
                        <section class="copyright">
                            {{ $setting->copyright }} | <a class="a-btn"
                                href="https://naqlah.co/">{{ $setting->footer }}</a>
                        </section>

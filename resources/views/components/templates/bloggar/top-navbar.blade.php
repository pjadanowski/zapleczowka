        <header>
            {{-- topbar news placeholder--}}
            {{-- /topbar news --}}
            <div class="wraper">
                <div class="flex items-center justify-between">
                    <div id="dl-menu" class="dl-menuwrapper hidden md:block">
                        <button class="dl-trigger">Open Menu</button>
                        <ul class="dl-menu">
                            <li>
                                <a href="/">Strona główna</a>
                            </li>
                            <li>
                                <a href="#">FAQ</a>
                                <ul class="dl-submenu">
                                    <li><a href="/contact">Kontakt</a></li>
                                </ul>
                            </li>
                            <!-- cats -->
                            @foreach ($categories as $c)
                                <li><a href="{{ route('category.articles', $c->slug) }}">{{ $c->name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- /dl-menuwrapper -->

                    <div class="w-[195px] md:w-[280px] sm:w-[200px] col:w-[150px] col:ml-[50px]">
                        <a class="flex items-center md:justify-center text-white" href="/">
                            <img class="logo" src="{{ asset(config('templates.logo_path')) }}" alt="{{ config('app.name') }}">
                        </a>
                    </div>

                    <ul class="sm:hidden md:block">
                        <li class="relative inline-block group">
                            <a href="/" class="relative text-[20px] lg:text-[17px] py-[35px]
                                 xl:py-[30px] px-[20px] xl:px-[15px] lg:px-[10px]
                                    text-[#3756f7] block capitalize
                                    font-heading-font font-medium transition-all
                                    hover:text-[#3756f7]
                                   {{ isRoute('index') ? ' before:absolute before:left-0 before:top-0 before:w-full
                                    before:h-[4px] before:bg-[#3756f7] before:content
                                before:opacity-1 before:visible before:transition-all
                                    before:rounded-[3px]' : '' }}
                                    ">Home</a>
                        </li>
                        <li class="relative inline-block group">
                            <a href="#" class="relative text-[20px] lg:text-[17px] py-[35px]
                                 xl:py-[30px] px-[20px] xl:px-[15px] lg:px-[10px]
                                    text-[#232f4b] block capitalize
                                    font-heading-font font-medium transition-all
                                   hover:text-[#3756f7]
                                   before:absolute before:left-0 before:top-0 before:w-full before:h-[4px]
                                   before:bg-[#3756f7] before:content
                                   before:opacity-0 before:invisible before:transition-all before:rounded-[3px]
                                   hover:before:opacity-100 hover:before:visible">Pages</a>
                            <ul class="absolute w-[240px] left-0 top-[110%] pt-[20px] pb-[15px] px-[7px] z-[111] bg-[#fff]
                                    shadow-[0px_2px_20px_0px_rgba(62,65,159,0.09);] transition-all opacity-0 invisible
                                    group-hover:opacity-100 group-hover:top-full group-hover:visible ">
                                <li>
                                    <a href="/contact" class="text-[18px] lg:text-[16px] inline-block  px-[15px] capitalize py-1
                                            text-[#232f4b] group relative overflow-hidden font-medium transition-all
                                            after:absolute after:left-[15px] after:bottom-0 after:w-0 after:h-[2px]
                                            after:content after:bg-[#3756f7] after:transition-all font-heading-font
                                            hover:after:w-[50%]">Kontakt</a>
                                </li>
                            </ul>
                        </li>
                        @foreach ($categories->take(4) as $c)
                        <li class="relative inline-block">
                            <a href="{{ route('category.articles', $c->slug) }}" class="relative text-[20px] lg:text-[17px] py-[35px]
                                 xl:py-[30px] px-[20px] xl:px-[15px] lg:px-[10px]
                                    text-[#232f4b] block capitalize
                                    font-heading-font font-medium transition-all
                                   hover:text-[#3756f7]
                                   before:absolute before:left-0 before:top-0 before:w-full before:h-[4px]
                                   before:bg-[#3756f7] before:content
                                   before:opacity-0 before:invisible before:transition-all before:rounded-[3px]
                                   hover:before:opacity-100 hover:before:visible
                                ">{!! $c->name !!}</a>
                        </li>
                        @endforeach
                       
                    </ul>

                    <div class="flex items-center">
                        <div class="relative header-search-form-wrapper">
                            <div class="cart-search-contact mr-[10px] md:mr-0 text-center cursor-pointer">
                                <div class="search-toggle-btn bg-[rgba(255,255,255,0.05)] text-[#444444]
                                     w-[50px] h-[50px] rounded-[50%] leading-[55px]">
                                    <i class="fi flaticon-magnifiying-glass text-[22px]"></i>
                                </div>
                            </div>
                            <div class="header-search-form absolute right-0 top-[210%] w-[263px] bg-white z-20 p-[15px]
                                    transform text-center transition-all opacity-0 invisible
                                     shadow-[0px_2px_20px_0px_rgba(62,65,159,0.09);]">
                                <div>
                                    <form class="relative">
                                        <input class="bg-white w-full h-[40px] pl-[10px] pr-[40px] focus-visible:outline-0
                                                border border-[rgba(64,59,59,0.07)] capitalize" type="text"
                                            placeholder="search here..">
                                        <button
                                            class="absolute right-0 top-0 w-[40px] h-[40px] leading-[43px] bg-[#272c3f] text-white border-0"><i
                                                class="fi flaticon-magnifiying-glass text-white"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--  #
                            right sidebar
                            --}}
                    </div>
                </div>
            </div>
        </header>

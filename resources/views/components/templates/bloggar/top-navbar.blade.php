@php
    $categories = \App\Models\Category::withCount('articles')->where('top_navbar_visible', true)->latest()->get();
@endphp

<header>
    {{-- topbar news placeholder --}}
    {{-- /topbar news --}}
    <div class="wraper">
        <div class="flex items-center justify-between">
            <div
                id="dl-menu"
                class="dl-menuwrapper hidden md:block"
            >
                <button class="dl-trigger">Open Menu</button>
                <ul class="dl-menu">
                    <li>
                        <a href="/">Strona główna</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Kontakt</a>
                    </li>

                    @foreach ($categories as $c)
                        <li><a href="{{ route('category.articles', $c->slug) }}">{{ $c->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- /dl-menuwrapper -->

            <div class="col:w-[150px] col:ml-[50px] w-[195px] sm:w-[200px] md:w-[280px]">
                <a
                    class="flex items-center text-white md:justify-center"
                    href="/"
                >
                    <img
                        class="logo"
                        src="{{ asset(config('templates.logo_path')) }}"
                        alt="{{ config('app.name') }}"
                    />
                </a>
            </div>

            {{-- desktop menu --}}
            <ul class="sm:hidden md:block">
                {{--
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
                    <a href="{{ route('contact') }}" class="text-[18px] lg:text-[16px] inline-block  px-[15px] capitalize py-1
                    text-[#232f4b] group relative overflow-hidden font-medium transition-all
                    after:absolute after:left-[15px] after:bottom-0 after:w-0 after:h-[2px]
                    after:content after:bg-[#3756f7] after:transition-all font-heading-font
                    hover:after:w-[50%]">Kontakt</a>
                    </li>
                    </ul>
                    </li>
                --}}
                <li class="relative inline-block">
                    <a
                        href="{{ route('contact') }}"
                        class="font-heading-font before:content relative block px-[20px] py-[35px] text-[20px] font-medium capitalize text-[#232f4b] transition-all before:invisible before:absolute before:left-0 before:top-0 before:h-[4px] before:w-full before:rounded-[3px] before:bg-[#3756f7] before:opacity-0 before:transition-all hover:text-[#3756f7] hover:before:visible hover:before:opacity-100 lg:px-[10px] lg:text-[17px] xl:px-[15px] xl:py-[30px]"
                        >Kontakt</a
                    >
                </li>
                @foreach ($categories->take(10) as $c)
                    <li class="relative inline-block">
                        <a
                            href="{{ route('category.articles', $c->slug) }}"
                            class="font-heading-font before:content relative block px-[20px] py-[10px] text-[20px] font-medium text-[#232f4b] transition-all before:invisible before:absolute before:left-0 before:top-0 before:h-[4px] before:w-full before:rounded-[3px] before:bg-[#3756f7] before:opacity-0 before:transition-all hover:text-[#3756f7] hover:before:visible hover:before:opacity-100 lg:px-[10px] lg:text-[17px] xl:px-[15px] xl:py-[20px]"
                            >{!! $c->name !!}</a
                        >
                    </li>
                @endforeach
            </ul>

            <div class="flex items-center">
                <div class="header-search-form-wrapper relative">
                    <div class="cart-search-contact mr-[10px] cursor-pointer text-center md:mr-0">
                        <div class="search-toggle-btn h-[50px] w-[50px] rounded-[50%] bg-[rgba(255,255,255,0.05)] leading-[55px] text-[#444444]">
                            <i class="fi flaticon-magnifiying-glass text-[22px]"></i>
                        </div>
                    </div>
                    <div class="header-search-form invisible absolute right-0 top-[210%] z-20 w-[263px] transform bg-white p-[15px] text-center opacity-0 shadow-[0px_2px_20px_0px_rgba(62,65,159,0.09);] transition-all">
                        <div>
                            <form class="relative">
                                <input
                                    class="h-[40px] w-full border border-[rgba(64,59,59,0.07)] bg-white pl-[10px] pr-[40px] capitalize focus-visible:outline-0"
                                    type="text"
                                    placeholder="search here.."
                                />
                                <button class="absolute right-0 top-0 h-[40px] w-[40px] border-0 bg-[#272c3f] leading-[43px] text-white">
                                    <i class="fi flaticon-magnifiying-glass text-white"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                {{--
                    #
                    right sidebar
                --}}
            </div>
        </div>
    </div>
</header>

<section class="bg-[#191a1f] relative z-[1]">
    <div class="py-[80px] md:pb-[60px] relative overflow-hidden">
        <div class="wraper">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-3 lg:col-span-3 md:col-span-6 sm:col-span-6 col:col-span-12 md:mb-[30px]">
                    <div class="max-w-[180px] mb-[30px]">
                        <img src="{{ asset(config('templates.logo_path')) }}" alt="{{ config('app.name') }}">
                    </div>
                    <p class="mb-[10px] text-white text-[16px] leading-[30px]">{{ config('templates.description') }}</p>
                </div>
                <div class="col-span-3 lg:col-span-3 md:col-span-6 sm:col-span-6 col:col-span-12 md:mb-[30px]">
                    <div class="pl-[50px] lg:pl-0 md:pl-0">
                        <div class="mb-[30px]">
                            <h3 class="text-[25px] text-white capitalize relative font-heading-font font-bold">Odnośniki</h3>
                        </div>
                        <ul>
                            <li class="relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0
                                before:top-[50%] before:-translate-y-1/2 before:-z-[1] before:w-[5px]
                                before:h-[2px] before:bg-[#cbcbcb] before:transition-all before:duration-300
                                hover:before:bg-[#3756f7] group">
                                <a href="/articles" class="text-[16px] transition-all text-white 
                                    duration-300 group-hover:text-[#3756f7]">
                                    News
                                </a>
                            </li>
                            <li class="relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0
                                before:top-[50%] before:-translate-y-1/2 before:-z-[1] before:w-[5px]
                                before:h-[2px] before:bg-[#cbcbcb] before:transition-all before:duration-300
                                hover:before:bg-[#3756f7] group">
                                <a href="/career" class="text-[16px] transition-all text-white 
                                    duration-300 group-hover:text-[#3756f7]">
                                    Career
                                </a>
                            </li>
                            <li class="relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0
                                before:top-[50%] before:-translate-y-1/2 before:-z-[1] before:w-[5px]
                                before:h-[2px] before:bg-[#cbcbcb] before:transition-all before:duration-300
                                hover:before:bg-[#3756f7] group">
                                <a href="/contact" class="text-[16px] transition-all text-white 
                                    duration-300 group-hover:text-[#3756f7]">
                                    Kontakt
                                </a>
                            </li>
                            <li class="relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0
                                before:top-[50%] before:-translate-y-1/2 before:-z-[1] before:w-[5px]
                                before:h-[2px] before:bg-[#cbcbcb] before:transition-all before:duration-300
                                hover:before:bg-[#3756f7] group">
                                <a href="/faq" class="text-[16px] transition-all text-white 
                                    duration-300 group-hover:text-[#3756f7]">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-3 lg:col-span-3 md:col-span-6 sm:col-span-6 col:col-span-12 md:mb-[30px]">
                    <div class="px-[20px] lg:px-0 ">
                        <div class="mb-[30px]">
                            <h3 class="text-[25px] text-white capitalize relative font-heading-font font-bold">Ostatnie wiadomości</h3>
                        </div>
                        <ul>
                            @foreach (\App\Models\Article::inRandomOrder()->select(['id', 'title', 'slug', 'created_at'])->limit(2)->get() as $art)
                                
                            <li class="mb-[15px] ">
                                <h4 class="mb-[5px]">
                                    <a href="{{ $art->show() }}" class="text-[18px] leading-[30px] font-heading-font font-bold text-white transition-all duration-300
                                        hover:text-[#3756f7]">
                                        {{ $art->title }}
                                    </a>
                                </h4>
                                <span class="flex items-center text-[14px] text-white">
                                   {{ $art->created_at->format('d.m.Y') }}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-span-3 lg:col-span-3 md:col-span-6 sm:col-span-6 col:col-span-12 md:mb-[30px]">
                    <div class="mb-[30px]">
                        <h3 class="text-[25px] text-white capitalize relative font-heading-font font-bold">Newsletter</h3>
                    </div>
                    <p class="mb-[10px] text-white text-[16px] leading-[30px]">Zapisz się żeby być na bieżąco z najważniejszymi informacjami</p>
                    <form class="mt-[25px] relative">
                        <input type="email" class="bg-[#28343e] h-[55px] text-white p-[6px_15px] 
                        border-[1px] border-[#28343e] w-full focus:outline-0 rounded-[5px] " placeholder="Email Address *" required="">
                        <div class="absolute right-[5px] top-[-17px] translate-y-1/2">
                            <button type="submit" class="bg-[#3756f7] border-0 outline-0
                                text-white w-[40px] h-[45px] leading-[45px] rounded-[5px] ">
                                <i class="fi flaticon-send"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center relative bg-[#101010] py-[20px]">
        <div class="wraper">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-12">
                    <p class="text-[15px] text-white text-center">
                        Copyright &copy; {{  date('Y') }} wszelkie prawa zastrzeżone.
                        <a href="/" class="text-[#3756f7]">{{ config('app.name') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
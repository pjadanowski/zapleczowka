<section class="relative z-[1] bg-[#191a1f]">
    <div class="relative overflow-hidden py-[80px] md:pb-[60px]">
        <div class="wraper">
            <div class="grid grid-cols-12 gap-4">
                <div class="col:col-span-12 col-span-3 sm:col-span-6 md:col-span-6 md:mb-[30px] lg:col-span-3">
                    <div class="mb-[30px] max-w-[180px]">
                        <img
                            src="{{ asset(config('templates.logo_path')) }}"
                            alt="{{ config('app.name') }}"
                        />
                    </div>
                    <p class="mb-[10px] text-[16px] leading-[30px] text-white">{{ config('templates.description') }}</p>
                </div>
                <div class="col:col-span-12 col-span-3 sm:col-span-6 md:col-span-6 md:mb-[30px] lg:col-span-3">
                    <div class="pl-[50px] md:pl-0 lg:pl-0">
                        <div class="mb-[30px]">
                            <h3 class="font-heading-font relative text-[25px] font-bold capitalize text-white">Odnośniki</h3>
                        </div>
                        <ul>
                            <li class="group relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0 before:top-[50%] before:-z-[1] before:h-[2px] before:w-[5px] before:-translate-y-1/2 before:bg-[#cbcbcb] before:transition-all before:duration-300 hover:before:bg-[#3756f7]">
                                <a
                                    href="/articles"
                                    class="text-[16px] text-white transition-all duration-300 group-hover:text-[#3756f7]"
                                >
                                    News
                                </a>
                            </li>
                            <li class="group relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0 before:top-[50%] before:-z-[1] before:h-[2px] before:w-[5px] before:-translate-y-1/2 before:bg-[#cbcbcb] before:transition-all before:duration-300 hover:before:bg-[#3756f7]">
                                <a
                                    href="/career"
                                    class="text-[16px] text-white transition-all duration-300 group-hover:text-[#3756f7]"
                                >
                                    Career
                                </a>
                            </li>
                            <li class="group relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0 before:top-[50%] before:-z-[1] before:h-[2px] before:w-[5px] before:-translate-y-1/2 before:bg-[#cbcbcb] before:transition-all before:duration-300 hover:before:bg-[#3756f7]">
                                <a
                                    href="{{ route('contact') }}"
                                    class="text-[16px] text-white transition-all duration-300 group-hover:text-[#3756f7]"
                                >
                                    Kontakt
                                </a>
                            </li>
                            <li class="group relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0 before:top-[50%] before:-z-[1] before:h-[2px] before:w-[5px] before:-translate-y-1/2 before:bg-[#cbcbcb] before:transition-all before:duration-300 hover:before:bg-[#3756f7]">
                                <a
                                    href="/faq"
                                    class="text-[16px] text-white transition-all duration-300 group-hover:text-[#3756f7]"
                                >
                                    FAQ
                                </a>
                            </li>
                            <li class="group relative z-[1] py-[6px] pl-[15px] before:absolute before:left-0 before:top-[50%] before:-z-[1] before:h-[2px] before:w-[5px] before:-translate-y-1/2 before:bg-[#cbcbcb] before:transition-all before:duration-300 hover:before:bg-[#3756f7]">
                                <a
                                    href="/sitemap.xml"
                                    class="text-[16px] text-white transition-all duration-300 group-hover:text-[#3756f7]"
                                >
                                    Sitemap
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col:col-span-12 col-span-3 sm:col-span-6 md:col-span-6 md:mb-[30px] lg:col-span-3">
                    <div class="px-[20px] lg:px-0">
                        <div class="mb-[30px]">
                            <h3 class="font-heading-font relative text-[25px] font-bold capitalize text-white">Ostatnie wiadomości</h3>
                        </div>
                        <ul>
                            @foreach (\App\Models\Article::inRandomOrder()->select(['id', 'title', 'slug', 'created_at'])->limit(2)->get() as $art)
                                <li class="mb-[15px]">
                                    <h4 class="mb-[5px]">
                                        <a
                                            href="{{ $art->show() }}"
                                            class="font-heading-font text-[18px] font-bold leading-[30px] text-white transition-all duration-300 hover:text-[#3756f7]"
                                        >
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
                <div class="col:col-span-12 col-span-3 sm:col-span-6 md:col-span-6 md:mb-[30px] lg:col-span-3">
                    <div class="mb-[30px]">
                        <h3 class="font-heading-font relative text-[25px] font-bold capitalize text-white">Newsletter</h3>
                    </div>
                    <p class="mb-[10px] text-[16px] leading-[30px] text-white">Zapisz się żeby być na bieżąco z najważniejszymi informacjami</p>
                    <form class="relative mt-[25px]">
                        <input
                            type="email"
                            class="h-[55px] w-full rounded-[5px] border-[1px] border-[#28343e] bg-[#28343e] p-[6px_15px] text-white focus:outline-0"
                            placeholder="Email Address *"
                            required=""
                        />
                        <div class="absolute right-[5px] top-[-17px] translate-y-1/2">
                            <button
                                type="submit"
                                class="h-[45px] w-[40px] rounded-[5px] border-0 bg-[#3756f7] leading-[45px] text-white outline-0"
                            >
                                <i class="fi flaticon-send"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="relative bg-[#101010] py-[20px] text-center">
        <div class="wraper">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-12">
                    <p class="text-center text-[15px] text-white">
                        Copyright &copy; {{ date('Y') }} wszelkie prawa zastrzeżone.
                        <a
                            href="/"
                            class="text-[#3756f7]"
                            >{{ config('app.name') }}</a
                        >
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

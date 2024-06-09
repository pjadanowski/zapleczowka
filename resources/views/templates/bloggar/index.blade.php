@extends('templates.bloggar.layout')


@section('content')
        <!-- start of wpo-blog-hero -->
        <section class="md:mt-4">
            <div class="wraper">
                <div class="sortable-gallery">
                    <div class="gallery-filters"></div>
                    <div class="m-[0_-7.5px] gallery-container clearfix" style="position: relative; height: 546px;">
                        {{-- first --}}    
                        @php
                            $firstArticle = $latestArticles->first() ?? null;
                            $secondArticle = $latestArticles->get(1) ?? null;
                            $thirdArticle = $latestArticles->get(2) ?? null;
                            $forthArticle = $latestArticles->get(3) ?? null;
                        @endphp
                        @if ($firstArticle)                            
                        <div class="flex w-[50%] float-left p-[0_7.5px_15px] col:p-0 col:mb-4 lg:block  lg:w-full" style="position: absolute; left: 0px; top: 0px;">
                            <div class="relative rounded-[15px] overflow-hidden z-10 group before:absolute before:left-0 before:top-0 before:w-full
                                before:h-full before:bg-[rgba(7,7,7,0.4)] before:rounded-[15px] before:z-20">
                                <img src="{{ $firstArticle->thumbnailImg }}" alt="" class="img img-responsive w-full rounded-[15px] scale-[1] transition-all group-hover:scale-[1.3]">
                                <div class="absolute left-0 bottom-0 p-[30px] z-20 col:p-3">
                                    <div class="p-[3px_15px] text-center text-xl rounded-[5px] inline-block font-bold text-[#003aae] 
                                    bg-[rgba(255,255,255,0.8)] col:text-base">{{ $firstArticle->category->name }}</div>
                                    <h2 class="text-[35px] text-white mt-[15px] leading-10 col:text-xl font-semibold">
                                        <a href="{{ $firstArticle->show() }}">
                                            {{ $firstArticle->title }}
                                        </a>
                                    </h2>
                                    <p class="text-white my-[15px] col:text-[14px] "> {{ $firstArticle->excerpt }} </p>
                                    <ul class="flex items-center">
                                        {{--  <li class="relative text-white mr-[20px] ">
                                        
                                            
                                            <img src="assets/images/blog/blog-avater/img-1.jpg " alt="" class="w-[40px] h-[40px] rounded-[50%]">
                                        </li>
                                        <li class="relative text-white ">By <a href="blog-single.html">Robert</a></li>  --}}
                                        <li class="relative text-white ml-[20px] pl-[20px] before:absolute before:left-[-8px] before:top-[25%] before:w-[8px] before:h-[8px] before:bg-white before:rounded-[50%] before:translate-y-1/2">
                                            {{ $firstArticle->created_at->format('d.m.Y') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- end first --}}
                        @if ($secondArticle)      
                        <div class="flex w-[50%] float-left p-[0_7.5px_15px] col:p-0 col:mb-4 lg:block lg:w-full" style="position: absolute; left: 565px; top: 0px;">
                            <div class="relative rounded-[15px] overflow-hidden z-10 group before:absolute before:left-0 before:top-0 before:w-full
                                before:h-full before:bg-[rgba(7,7,7,0.4)] before:rounded-[15px] before:z-20">
                                <img src="{{ $secondArticle->thumbnailImg }}" alt="" class="img img-responsive w-full rounded-[15px] scale-[1] transition-all group-hover:scale-[1.3]">
                                <div class="absolute left-0 bottom-0 p-[30px] z-20 col:p-3">
                                    <div class="p-[3px_15px] text-center text-xl rounded-[5px] inline-block font-bold text-[#003aae] 
                                    bg-[rgba(255,255,255,0.8)] col:text-base">{{ $secondArticle->category->name }}</div>
                                    <h2 class="text-[35px] text-white mt-[15px] leading-10 col:text-xl font-semibold col:mt-[10px]">
                                        <a href="{{ route('articles.show', $secondArticle->slug) }}">
                                            {{ $secondArticle->title }}
                                        </a>
                                    </h2>
                                    <ul class="flex items-center">
                                        <li class="relative text-white ml-[20px] pl-[20px] before:absolute before:left-[-8px] before:top-[25%] before:w-[8px] before:h-[8px] before:bg-white before:rounded-[50%] before:translate-y-1/2">
                                            {{ $secondArticle->created_at->format('d.m.Y') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="flex w-[50%] p-[0_7.5px_15px] col:p-0 justify-between lg:w-full m-[0_-5px] pr-0 sm:m-0 sm:pr-[7.5px] sm:block" style="position: absolute; left: 565px; top: 266px;">
                            @include('components.templates.bloggar.article-card-hero-sm', ['article' => $thirdArticle])

                            @include('components.templates.bloggar.article-card-hero-sm', ['article' => $forthArticle])

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of wpo-blog-hero -->



        <!-- start of wpo-breacking-news -->
        {{-- 
        @include('breaking-news-carousel')
    --}}
        <!-- end of wpo-breacking-news -->


        <!-- start wpo-blog-highlights-section -->
        <section>
            <div class="wraper">
                <div class="mt-8 mb-8 col:mb-6">
                    <h2 class="text-3xl font-bold text-[#444444] relative capitalize pb-5 col:text-2xl
                                    before:absolute before:left-0 before:bottom-0 before:w-[100px] before:h-[5px] before:rounded-[6px]
                                    before:bg-[#3756f7]
                                    after:absolute after:left-[110px] after:bottom-0 after:w-7 after:h-[5px] after:rounded-[6px]
                                    after:bg-[#3756f7] ">Czytaj więcej</h2>
                </div>
                <div class="grid grid-cols-12 gap-x-4">
                    <div class="col-span-8 md:col-span-12">
                        <!-- start wpo-blog-section -->
                        <div class="relative z-10 border border-[#eeeeee] p-7  col:p-4">
                            <div class="grid grid-cols-12 gap-x-4">
                                @foreach ($latestArticles as $article)
                                    @include('components.templates.bloggar.article-card-read-more', ['article' => $article])
                                @endforeach
                        
                            </div>
                        </div>
                        <!-- end wpo-blog-section -->
                    </div>
                    <div class="col-span-4 md:col-span-12">
                        <div class="pl-2 md:pl-0 md:mt-[80px] max-w-[550px]">
                            @include('components.templates.bloggar.popular-categories-widget')
                            @include('components.templates.bloggar.popular-posts-widget')

                            {{-- 
                                reklama
                                 <div>
                                <a href="#">
                                    <img src="assets/images/add.jpg" alt="" class="w-full md:w-auto">
                                </a>
                            </div>
                                --}}
                           
                        </div>
                    </div>
                </div>
            </div> <!-- end wraper -->
        </section>
        <!-- end wpo-blog-highlights-section -->


        <!-- start wpo-blog-sponsored-section -->
        <section class="py-[60px] pb-[50px] sm:py-[40px] ">
            <div class="wraper">
                <div class="mb-8 col:mb-6">
                    <h2 class="text-3xl font-bold text-[#444444] relative capitalize pb-5 col:text-2xl
                     before:absolute before:left-0 before:bottom-0 before:w-[100px] before:h-[5px] before:rounded-[6px]
                     before:bg-[#3756f7]
                      after:absolute after:left-[110px] after:bottom-0 after:w-7 after:h-[5px] after:rounded-[6px]
                      after:bg-[#3756f7] ">Warto przeczytać
                    </h2>
                    <p class="mt-3">Wszystko co powinienieś wiedizec na temat biznesu i finasów.</p>
                </div>
                <div class="relative z-10">
                    <div class="grid grid-cols-12 gap-x-4">
                        <div class="col-span-3 xl:col-span-3 lg:col-span-6 md:col-span-6 col:col-span-12">
                            <div class="mb-7 group">
                                <div class="overflow-hidden relative rounded-[6px]">
                                    <img src="assets/images/sponsord/img-1.jpg" alt=""
                                        class="w-full grayscale-0 scale-[1]
                                     rounded-[6px] transition-all group-hover:grayscale-[100%] group-hover:scale-[1.2]">
                                    <div
                                        class="absolute left-[15px] top-[15px] p-[4px_25px_2px] bg-[#3756f7] uppercase text-white text-[14px] rounded-[5px]">
                                        Travel</div>
                                </div>
                                <div class="pt-3">
                                    <h2 class="text-xl font-heading-font mb-8 font-bold mt-3 xl:text-lg xl:mb-2 ">
                                        <a href="blog-single.html"
                                            class="text-[#444] transition-all hover:text-[#3756f7]">Top Most Beautiful
                                            Scenery in The
                                            World.</a>
                                    </h2>
                                    <ul class="flex mb-[15px] items-center">
                                        <li class="text-base text-[#3756f7]">
                                            <img src="assets/images/blog/blog-avater/img-1.jpg " alt=""
                                                class="w-[40px] h-[40px] rounded-[50%] mr-2">
                                        </li>
                                        <li class="text-base text-[#3756f7]">By <a href="blog-single.html"
                                                class="text-[#003aae] transition-all hover:text-[#3756f7]">Admin</a>
                                        </li>
                                        <li
                                            class="text-base text-[#3756f7] relative pl-7 before:absolute before:left-[10px] before:top-[50%]
                                        before:-translate-y-1/2 before:w-[6px] before:h-[6px] before:bg-[#3756f7] before:rounded-[50%]">
                                            25
                                            Sep 2022</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-3 xl:col-span-3 lg:col-span-6 md:col-span-6 col:col-span-12">
                            <div class="mb-7 group">
                                <div class="overflow-hidden relative rounded-[6px]">
                                    <img src="assets/images/sponsord/img-2.jpg" alt=""
                                        class="w-full grayscale-0 scale-[1]
                                     rounded-[6px] transition-all group-hover:grayscale-[100%] group-hover:scale-[1.2]">
                                    <div
                                        class="absolute left-[15px] top-[15px] p-[4px_25px_2px] bg-[#3756f7] uppercase text-white text-[14px] rounded-[5px]">
                                        Travel</div>
                                </div>
                                <div class="pt-3">
                                    <h2 class="text-xl font-heading-font mb-8 font-bold mt-3 xl:text-lg xl:mb-2 ">
                                        <a href="blog-single.html"
                                            class="text-[#444] transition-all hover:text-[#3756f7]">Perfect Photo
                                            Clicking Idea You Must
                                            Khow
                                            About.</a>
                                    </h2>
                                    <ul class="flex mb-[15px] items-center">
                                        <li class="text-base text-[#3756f7]">
                                            <img src="assets/images/blog/blog-avater/img-2.jpg " alt=""
                                                class="w-[40px] h-[40px] rounded-[50%] mr-2">
                                        </li>
                                        <li class="text-base text-[#3756f7]">By <a href="blog-single.html"
                                                class="text-[#003aae] transition-all hover:text-[#3756f7]">Admin</a>
                                        </li>
                                        <li
                                            class="text-base text-[#3756f7] relative pl-7 before:absolute before:left-[10px] before:top-[50%]
                                        before:-translate-y-1/2 before:w-[6px] before:h-[6px] before:bg-[#3756f7] before:rounded-[50%]">
                                            25
                                            Sep 2022</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-3 xl:col-span-3 lg:col-span-6 md:col-span-6 col:col-span-12">
                            <div class="mb-7 group">
                                <div class="overflow-hidden relative rounded-[6px]">
                                    <img src="assets/images/sponsord/img-3.jpg" alt=""
                                        class="w-full grayscale-0 scale-[1]
                                     rounded-[6px] transition-all group-hover:grayscale-[100%] group-hover:scale-[1.2]">
                                    <div
                                        class="absolute left-[15px] top-[15px] p-[4px_25px_2px] bg-[#3756f7] uppercase text-white text-[14px] rounded-[5px]">
                                        Travel</div>
                                </div>
                                <div class="pt-3">
                                    <h2 class="text-xl font-heading-font mb-8 font-bold mt-3 xl:text-lg xl:mb-2 ">
                                        <a href="blog-single.html"
                                            class="text-[#444] transition-all hover:text-[#3756f7]">Top Most Beautiful
                                            Scenery in The
                                            World.</a>
                                    </h2>
                                    <ul class="flex mb-[15px] items-center">
                                        <li class="text-base text-[#3756f7]">
                                            <img src="assets/images/blog/blog-avater/img-3.jpg " alt=""
                                                class="w-[40px] h-[40px] rounded-[50%] mr-2">
                                        </li>
                                        <li class="text-base text-[#3756f7]">By <a href="blog-single.html"
                                                class="text-[#003aae] transition-all hover:text-[#3756f7]">Admin</a>
                                        </li>
                                        <li
                                            class="text-base text-[#3756f7] relative pl-7 before:absolute before:left-[10px] before:top-[50%]
                                        before:-translate-y-1/2 before:w-[6px] before:h-[6px] before:bg-[#3756f7] before:rounded-[50%]">
                                            25
                                            Sep 2022</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-3 xl:col-span-3 lg:col-span-6 md:col-span-6 col:col-span-12">
                            <div class="mb-7 group">
                                <div class="overflow-hidden relative rounded-[6px]">
                                    <img src="assets/images/sponsord/img-4.jpg" alt=""
                                        class="w-full grayscale-0 scale-[1]
                                     rounded-[6px] transition-all group-hover:grayscale-[100%] group-hover:scale-[1.2]">
                                    <div
                                        class="absolute left-[15px] top-[15px] p-[4px_25px_2px] bg-[#3756f7] uppercase text-white text-[14px] rounded-[5px]">
                                        Travel</div>
                                </div>
                                <div class="pt-3">
                                    <h2 class="text-xl font-heading-font mb-8 font-bold mt-3 xl:text-lg xl:mb-2 ">
                                        <a href="blog-single.html"
                                            class="text-[#444] transition-all hover:text-[#3756f7]">Top Most Beautiful
                                            Scenery in The
                                            World.</a>
                                    </h2>
                                    <ul class="flex mb-[15px] items-center">
                                        <li class="text-base text-[#3756f7]">
                                            <img src="assets/images/blog/blog-avater/img-1.jpg " alt=""
                                                class="w-[40px] h-[40px] rounded-[50%] mr-2">
                                        </li>
                                        <li class="text-base text-[#3756f7]">By <a href="blog-single.html"
                                                class="text-[#003aae] transition-all hover:text-[#3756f7]">Admin</a>
                                        </li>
                                        <li
                                            class="text-base text-[#3756f7] relative pl-7 before:absolute before:left-[10px] before:top-[50%]
                                        before:-translate-y-1/2 before:w-[6px] before:h-[6px] before:bg-[#3756f7] before:rounded-[50%]">
                                            25
                                            Sep 2022</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-blog-sponsored-section -->


        <!-- start wpo-subscribe-section -->
        <section class="pt-0 py-[60px] sm:py-[40px] sm:pt-0">
            <div class="wraper">
                <div
                    class="p-[70px_100px] lg:p-[70px] md:p-[50px_30px] col:p-[40px_30px] relative overflow-hidden bg-no-repeat bg-center rounded-[60px] z-10 col:rounded-[30px]"
                    style="background-image: url('/img/newslatter-bg.png');">
                    >
                    <div class="text-center mb-[40px] md:mb-[20px]">
                        <h3
                            class="text-[40px] text-white my-4 font-bold lg:text-[32px] md:text-[28px] md:mt-0 col:text-[24px]">
                            Never miss any Update!</h3>
                        <p class="text-[21px] text-white md:text-[16px]">Get the freshest headlines and updates sent
                            uninterrupted to your inbox.</p>
                    </div>
                    <form action="#">
                        <div class="relative max-w-[600px] mx-auto">
                            <input type="email" placeholder="Enter your email" required
                                class="w-full p-[40px] pr-[190px] h-[75px] rounded-[5px] bg-white text-[#444444]
                                sm:h-[55px] placeholder-[#444]
                                 sm:p-[30px] sm:pr-[145px] col:p-[10px] col:pr-[100px] focus:outline-0 focus:shadow-none">
                            <button type="submit" class="absolute right-[8px] top-[8px] h-[65px] w-[170px] border-[0] bg-[#3756f7] rounded-[3px] text-white 
                            pr-[40px] sm:h-[45px] sm:w-[130px] col:w-[80px] col:h-[40px] col:pr-0 before:absolute
                             before:right-[40px] before:top-[50%] before:content-['\f117'] before:font-['Flaticon']
                             before:translate-y-[-50%]  sm:before:right-[10px] col:before:hidden">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end subscribe-section -->
@endsection

@extends('templates.bloggar.layout')


@section('content')
        <!-- start of wpo-blog-hero -->
        @include('components.templates.bloggar.hero-section-grid')
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


    {{-- worth reading --}}


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
                             sm:h-[45px] sm:w-[130px] col:w-[80px] col:h-[40px] col:pr-0">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end subscribe-section -->
@endsection

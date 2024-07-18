@extends('templates.bloggar.layout')

@section('title', 'Strona główna')

@section('content')
    <!-- start of wpo-blog-hero -->
    @include('components.templates.bloggar.hero-section-grid')
    <!-- end of wpo-blog-hero -->

   
    <section>
        <div class="wraper">
            <div class="col:mb-6 mb-8 mt-8">
                <p class="col:text-2xl relative pb-5 text-3xl font-bold capitalize text-[#444444] before:absolute before:bottom-0 before:left-0 before:h-[5px] before:w-[100px] before:rounded-[6px] before:bg-[#3756f7] after:absolute after:bottom-0 after:left-[110px] after:h-[5px] after:w-7 after:rounded-[6px] after:bg-[#3756f7]">
                    Warto zobaczyć
                </p>
            </div>
            <div class="grid grid-cols-12 gap-x-4">
                <div class="col-span-8 md:col-span-12">
                    <!-- start wpo-blog-section -->
                    <div class="col:p-4 relative z-10 border border-[#eeeeee] p-7">
                        <div class="grid grid-cols-12 gap-x-4">
                            @foreach ($latestArticles as $article)
                                @include('components.templates.bloggar.article-card-read-more', ['article' => $article])
                            @endforeach
                        </div>
                    </div>
                    <!-- end wpo-blog-section -->
                </div>
                <div class="col-span-4 md:col-span-12">
                    <div class="max-w-[550px] pl-2 md:mt-[80px] md:pl-0">
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
        </div>
        <!-- end wraper -->
    </section>
    <!-- end wpo-blog-highlights-section -->

    {{-- worth reading --}}

    <!-- start wpo-subscribe-section -->
    <section class="py-[60px] pt-0 sm:py-[40px] sm:pt-0">
        <div class="wraper">
            <div
                class="col:p-[40px_30px] col:rounded-[30px] relative z-10 overflow-hidden rounded-[60px] bg-center bg-no-repeat p-[70px_100px] md:p-[50px_30px] lg:p-[70px]"
                style="background-image: url('/img/newslatter-bg.png')"
            >
                >
                <div class="mb-[40px] text-center md:mb-[20px]">
                    <h3 class="col:text-[24px] my-4 text-[40px] font-bold text-white md:mt-0 md:text-[28px] lg:text-[32px]">
                        Never miss any Update!
                    </h3>
                    <p class="text-[21px] text-white md:text-[16px]">Get the freshest headlines and updates sent uninterrupted to your inbox.</p>
                </div>
                <form action="#">
                    <div class="relative mx-auto max-w-[600px]">
                        <input
                            type="email"
                            placeholder="Enter your email"
                            required
                            class="col:p-[10px] col:pr-[100px] h-[75px] w-full rounded-[5px] bg-white p-[40px] pr-[190px] text-[#444444] placeholder-[#444] focus:shadow-none focus:outline-0 sm:h-[55px] sm:p-[30px] sm:pr-[145px]"
                        />
                        <button
                            type="submit"
                            class="col:w-[80px] col:h-[40px] col:pr-0 absolute right-[8px] top-[8px] h-[65px] w-[170px] rounded-[3px] border-[0] bg-[#3756f7] text-white sm:h-[45px] sm:w-[130px]"
                        >
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end subscribe-section -->
@endsection

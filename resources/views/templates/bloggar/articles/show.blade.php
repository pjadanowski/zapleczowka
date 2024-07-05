@extends('templates.bloggar.layout')


@section('content')
    <div class="bg-[url(../images/page-title.jpg)] bg-no-repeat bg-center bg-cover min-h-[400px] relative flex justify-center flex-col z-10
            sm:min-h-[250px] before:absolute before:left-0 before:top-0 before:w-full before:h-full before:bg-[#232f4b]
            before:-z-10 before:opacity-70 md:mt-3">
            <div class="wraper">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="text-center">
                            <h2 class="text-6xl text-white mt-[-10px] mb-[20px] sm:text-3xl sm:mb-[10px]">
                                {{ $article->title }}
                            </h2>
                            <ul class="">
                                <li class="inline-block px-[5px] text-white relative text-xl font-heading-font sm:text-lg after:content-['/'] after:left-[7px]">
                                    <a href="/">Home</a>
                                </li>
                                <li class="text-[#cbd4fd] inline-block px-[5px]  relative text-xl font-heading-font sm:text-lg ">
                                    <span>Wiadomości</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="py-[60px] md:py-[40px]">
        <!-- start of hero -->
        <div class="wraper">
            <div class="grid grid-cols-12 gap-x-4">
                <div class="col-span-8 md:col-span-12">
                    <div class="mb-[70px]">
                        <img class="w-full" src="{{ $article->thumbnailImg }}" alt="{{ $article->title }}">
                        <div class="overflow-hidden my-[35px]">
                            <ul>
                                <li class="text-[14px] font-medium uppercase flex items-center col:float-none text-[#687693] relative">
                                    <span class="mr-4">
                                        <x-heroicon-o-calendar class="top-0 mr-[3px] size-5 text-[#687693]"/>
                                    </span>
                                     {{ $article->created_at->format('d F Y') }}
                                </li>
                            </ul>
                        </div>
                        <h3 class="text-[34px] md:text-[25px] sm:text-[22px] text-[#0a272c]  leading-[40px] mb-[20px]">
                            {{ $article->title }}
                        </h3>
              
                        <div class="prose xl:prose-lg !max-w-full">
                            {!! $article->contentWithLink !!}
                        </div>
                    </div>
                    <div class="border-b border-[#ebebeb] mt-[75px] pb-[30px] text-white sm:mb-[40px]">
                        <div class="flex items-center">
                            <span class="font-heading-font text-[#0a272c] font-semibold inline-block pr-[15px] uppercase">Tagi:
                            </span>
                            <ul class="inline-block">
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0"><a href="#" class="inline-block text-[13px] px-[18px] py-[2px] text-[#0a272c]
                                        bg-[#f5f5f5] rounded-[5px] font-normal uppercase transition-all
                                        hover:text-[#3756f7]">Biznes</a>
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0"><a href="#" class="inline-block text-[13px] px-[18px] py-[2px] text-[#0a272c]
                                        bg-[#f5f5f5] rounded-[5px] font-normal uppercase transition-all
                                        hover:text-[#3756f7]">Finanse</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end tag-share -->
                    <div class="mt-[30px] pb-[30px] text-white sm:mb-[40px]">
                        <div class="flex items-center">
                            <span class="font-heading-font text-[#0a272c] font-semibold inline-block pr-[15px]
                                uppercase">Share:
                            </span>
                            <ul class="inline-block">
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0"><a href="#" class="inline-block text-[15px] capitalize text-[#6e6e6e] underline font-normal transition-all hover:text-[#3756f7]">facebook</a>
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0"><a href="#" class="inline-block text-[15px] capitalize text-[#6e6e6e] underline font-normal transition-all hover:text-[#3756f7]">twitter</a>
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0"><a href="#" class="inline-block text-[15px] capitalize text-[#6e6e6e] underline font-normal transition-all hover:text-[#3756f7]">linkedin</a>
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0"><a href="#" class="inline-block text-[15px] capitalize text-[#6e6e6e] underline font-normal transition-all hover:text-[#3756f7]">pinterest</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end tag-share -->
                    <div class="mt-[35px] mb-[60px]">
                        <div class="float-left sm:float-none">
                            <a href="#" target="_blank">
                                <img class="rounded-[50%]" src="assets/images/blog-details/author.jpg" alt=""></a>
                        </div>
                        <div class="block overflow-hidden pl-[25px] sm:pl-0 sm:mt-[15px]">
                            {{--  #
                                <a href="#" class="font-heading-font text-[24px] font-semibold inline-block mb-[10px]
                                    text-[#232f4b]">Author:
                                Jenny Watson</a>
                                       <p class="text-[#687693] leading-[24px] text-[16px] mb-[20px]">Sed ut perspiciatis
                                unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis.</p>
                                --}}
                        </div>
                    </div>
                    <!-- end author-box -->
                    <div class="overflow-hidden border border-[#d8e0f1] px-[25px]">
                        <div class="py-[40px] pr-[15px] pl-[5px] sm:py-[25px] sm:px-[15px] w-[50%] float-left sm:w-full sm:float-none text-left group">
                            <a href="/" class="inline-block">
                                <span class="tracking-[2px] text-[15px] relative transition-all group-hover:text-[#3756f7] text-[#6e6e6e] uppercase font-semibold flex
                                   group-hover:before:text-[#3756f7] ">
                                   <x-heroicon-o-arrow-left class="mr-4 size-5 text-[#687693]"/>
                                   <span>Poprzedni artykuł</span>
                                </span>
                                <span class="font-base-font text-[18px] font-normal text-[#232f4b] mt-[15px]
                                        block">At
                                    vero eos et accusamus et iusto odio dignissimos
                                    ducimus qui blanditiis praesentium.</span>
                            </a>
                        </div>
                        <div class="py-[40px] pl-[15px] pr-[5px] sm:py-[25px] sm:px-[15px] w-[50%] float-left sm:w-full sm:float-none text-right sm:text-left  group border-l border-[#d8e0f1] sm:border-l-transparent sm:border-t">

                            <a href="/" class="inline-block transition-all group">
                                <span class="flex justify-end sm:pr-0 tracking-[2px] text-[15px] relative transition-all group-hover:text-[#3756f7] text-[#6e6e6e] uppercase   font-semibold 
                                   before:hidden group-hover:before:text-[#3756f7] items-center">
                                   <span class="mr-4">Następny artykuł</span>
                                    <x-heroicon-o-arrow-right class="size-5 text-[#687693]"/>
                                </span>
                                <span class="font-base-font text-[18px] font-normal text-[#232f4b] mt-[15px]
                                        block">Dignissimos
                                    ducimus qui blanditiis praesentiu deleniti
                                    atque corrupti quos dolores</span>
                            </a>
                        </div>
                    </div>
                    <div class="mt-[70px]">
                        <h3 class="text-[30px] md:text-[25px] sm:text-[20px] uppercase tracking-[3px]
                                text-[#232f4b] font-medium font-heading-font leading-[40px] mb-[20px]">
                            5 Komentarzy
                        </h3>
                        <ol class="pl-0">
                            <li class="comment even thread-even depth-1" id="comment-1">
                                <div id="div-comment-1" class="relative border-b border-[#ebebeb] p-[30px] md:px-[25px] md:py-[35px]">
                                    <div class="absolute left-[35px] sm:static">
                                        <div class="comment-image">
                                            <img class="rounded-full" src="assets/images/blog-details/comments-author/img-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="pl-[100px] sm:pl-0 sm:pt-[25px]">
                                        <div class="comment-wrapper">
                                            <h4 class="text-[18px] capitalize text-[#232f4b] font-bold
                                                    font-heading-font mb-[15px]">
                                                Robert Sonny <span class="text-[15px]  capitalize  text-[#687693] font-normal  pl-[5px] sm:pl-0">says
                                                    Jul 21, 2024 at 10:00am</span></h4>
                                            <p class="text-[15px]  capitalize  text-[#687693] font-normal mb-[20px]">
                                                I must explain to you how all this mistaken idea of
                                                denouncing pleasure and praising pain was born and I
                                                will give you a complete account of the system</p>
                                            <a class="text-[14px]  font-base-font text-white font-semibold inline-block underline uppercase tracking-[1px] transition-all hover:text-[#3756f7]" href="#"><span>Reply</span></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pl-[30px]">
                                    <li class="comment">
                                        <div class="relative border-b border-[#ebebeb] p-[30px] md:px-[25px] md:py-[35px]">
                                            <div class="absolute left-[35px] sm:static">
                                                <div class="comment-image">
                                                    <img class="rounded-full" src="assets/images/blog-details/comments-author/img-2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="pl-[100px] sm:pl-0 sm:pt-[25px]">
                                                <div class="comment-wrapper">
                                                    <h4 class="text-[18px] capitalize text-[#232f4b] font-bold
                                                            font-heading-font mb-[15px]">
                                                        John Abraham <span class="text-[15px]  capitalize  text-[#687693] font-normal  pl-[5px] sm:pl-0">says
                                                            Jul 21, 2024 at 10:00am</span></h4>
                                                    <p class="text-[15px]  capitalize  text-[#687693] font-normal mb-[20px]">
                                                        I must explain to you how all this mistaken idea of
                                                        denouncing pleasure and praising pain was born and I
                                                        will give you a complete account of the system</p>
                                                    <a class="text-[14px]  font-base-font text-white font-semibold inline-block underline uppercase tracking-[1px] transition-all hover:text-[#3756f7]" href="#"><span>Reply</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pl-[30px]">
                                            <li class="comment">
                                                <div class="relative border-b border-[#ebebeb] p-[30px] md:px-[25px] md:py-[35px]">
                                                    <div class="absolute left-[35px] sm:static">
                                                        <div class="comment-image">
                                                            <img class="rounded-full" src="assets/images/blog-details/comments-author/img-3.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="pl-[100px] sm:pl-0 sm:pt-[25px]">
                                                        <div class="comment-wrapper">
                                                            <h4 class="text-[18px] capitalize text-[#232f4b] font-bold font-heading-font mb-[15px]">
                                                                Robert Sonny<span class="text-[15px]  capitalize  text-[#687693] font-normal  pl-[5px] sm:pl-0">says
                                                                    Jul 21,
                                                                    2024 at 10:00am</span></h4>
                                                            <p class="text-[15px]  capitalize  text-[#687693] font-normal mb-[20px]">
                                                                I must explain to you how all this mistaken idea
                                                                of
                                                                denouncing pleasure and praising pain was born
                                                                and I
                                                                will give you a complete account of the system
                                                            </p>
                                                            <a class="text-[14px]  font-base-font text-[#232f4b] font-semibold inline-block underline uppercase tracking-[1px] transition-all hover:text-[#3756f7]" href="#"><span>Reply</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="relative p-[30px] md:px-[25px] md:py-[35px]">
                                    <div class="absolute left-[35px] sm:static">
                                        <div class="comment-image">
                                            <img class="rounded-full" src="assets/images/blog-details/comments-author/img-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="pl-[100px] sm:pl-0 sm:pt-[25px]">
                                        <div class="comment-wrapper">
                                            <h4 class="text-[18px] capitalize text-[#232f4b] font-bold
                                                    font-heading-font mb-[15px]">
                                                Robert Sonny <span class="text-[15px]  capitalize  text-[#687693] font-normal  pl-[5px] sm:pl-0">says
                                                    Jul 21, 2024 at 10:00am</span></h4>
                                            <p class="text-[15px]  capitalize  text-[#687693] font-normal mb-[20px]">
                                                I must explain to you how all this mistaken idea of
                                                denouncing pleasure and praising pain was born and I
                                                will give you a complete account of the system</p>
                                            <a class="text-[14px]  font-base-font text-[#232f4b] font-semibold inline-block underline uppercase tracking-[1px] transition-all hover:text-[#3756f7]" href="#"><span>Reply</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                        <!-- end comments-section -->
                        <div class="mt-[40px]">
                            <div class="mb-[30px]">
                                <h2 class="font-semibold uppercase font-heading-font tracking-[2px] text-[#232f4b]
                                        text-[22px] leading-[130.5%]  md:text-[25px]">
                                    Zostaw komentarz</h2>
                            </div>
                            <form method="post" class="contact-validation-active" id="contact-form-main">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-6 md:col-span-6 sm:col-span-12 mb-3">
                                        <input type="text" class="form-control w-full rounded-[50px] h-[50px] border-[1px] border-[#a4adbe] pl-[15px] focus:outline-0 focus:shadow-none text-[#687693]" placeholder="Your Name">
                                    </div>
                                    <div class="col-span-6 md:col-span-6 sm:col-span-12 mb-3">
                                        <input type="email" class="form-control w-full rounded-[50px] h-[50px] border-[1px] border-[#a4adbe] pl-[15px] focus:outline-0 focus:shadow-none text-[#687693]" placeholder="Your Email">
                                    </div>
                                    <div class="col-span-12 mb-3">
                                        <input type="url" class="form-control w-full rounded-[50px] h-[50px] border-[1px] border-[#a4adbe] pl-[15px] focus:outline-0 focus:shadow-none text-[#687693]" placeholder="Website">
                                    </div>
                                    <div class="col-span-12">
                                        <textarea class="form-control w-full h-[220px] rounded-[30px] pl-[15px]
                                            border-[1px] border-[#a4adbe] pt-[10px] focus:outline-0
                                            focus:shadow-none text-[#687693]" name="note" id="note" placeholder="Write Your Comments..."></textarea>
                                    </div>
                                </div>
                                <div class="mt-[10px]">
                                    <button type="submit" class="theme-btn before:hidden font-heading-font uppercase text-[15px] bg-[#3756f7] font-medium pr-[35px] sm:pr-[18px] overflow-hidden
                                            tracking-[2px] rounded-[30px]">Dodaj komentarz</button>
                                </div>
                            </form>
                        </div>

                    </div> <!-- end comments-area -->
                </div>
                <div class="col-span-4 md:col-span-12 ">
                    <div class="max-w-[400px] pl-7 lg:pl-0">
                        <div class="mb-7 p-5 border-[#eef0fc] border text-center bg-[#f9faff] relative z-30">
                            <form>
                                <div class="relative">
                                    <input type="text" placeholder="Search Post.." class="h-[70px] text-base p-[6px_50px_6px_20px] rounded-[5px]
                                        bg-[rgba(55,86,247,0.05)] focus:bg-[rgba(55,86,247,0.1)] w-full
                                        focus-visible:outline-0 transition-all
                                        focus-visible:border-none ">
                                    <button type="submit" class="bg-[#3756f7] text-xl text-white border-none absolute right-3 top-[52%] h-[50px] leading-[50px] w-[50px] rounded-[6px] -translate-y-1/2 flex-center-center">
                                        <x-heroicon-o-magnifying-glass class="size-6"/>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @include('components.templates.bloggar.popular-posts-widget')
                     
                        @include('components.templates.bloggar.popular-categories-widget')

                        <div class="mb-7 p-7 border-[#eef0fc] border">
                            <h3 class="text-2xl text-[#232f4b] relative capitalize pb-5 mb-5
                                before:absolute before:left-0 before:bottom-0 before:w-[55px] before:h-[4px]
                                before:rounded-[10px]
                                before:bg-[#3756f7]
                                after:absolute after:left-[65px] after:bottom-0 after:w-[80%] after:h-[4px]
                                after:rounded-[10px]
                                after:bg-[#f2f2f2]">Tags</h3>
                            <ul class="overflow-hidden">
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Travel</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Food</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Lifestyle</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Business</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Idea</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Finance</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Corporate</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Culture</a></li>
                                <li class="float-left mr-[8px] mb-[8px]"><a class="text-sm inline-block p-[5px_18px] text-[#232f4b] bg-[#ecf4fb] rounded-[5px] transition-all hover:bg-[#3756f7] hover:text-white" href="#">Gym</a></li>
                            </ul>
                        </div>

                        <div class="bg-[#3756f7] p-[30px_40px] lg:p-5">
                            <h2 class="text-3xl font-bold text-left text-white mb-5">Jak możemy Ci pomóc?</h2>
                            <p class="text-white text-lg mb-3">Jeśli potrzebujesz pomocy napisz do nas. </p>
                            <a href="{{ route('contact') }}" class="inline-block text-white p-[10px_20px] border border-white text-[18px]
                                pr-24 relative mt-3 before:absolute before:text-[18px] before:right-[15px] before:top-1/2 
                                before:-translate-y-1/2 before:font-['themify'] before:content-['\e628']
                                ">Kontakt</a>
                        </div>

                    </div>
                </div>
                <!-- end of wpo-hero-slide-section-->
            </div>
        </div>
    </div>

@endsection
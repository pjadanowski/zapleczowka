@extends('templates.bloggar.layout')


@section('content')
<div class="bg-no-repeat bg-center bg-cover min-h-[400px] relative flex justify-center flex-col z-10
            sm:min-h-[250px] before:absolute before:left-0 before:top-0 before:w-full before:h-full before:bg-[#232f4b]
            before:-z-10 before:opacity-70 md:mt-3">
            <div class="wraper">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="text-center">
                            <h2 class="text-6xl text-white mt-[-10px] mb-[20px] sm:text-3xl sm:mb-[10px]">
                                {!! $category->name !!}
                            </h2>
                            <ul class="">
                                <li class="inline-block px-[5px] text-white relative text-xl font-heading-font sm:text-lg after:content-['/'] after:left-[7px]">
                                    <a href="/">Home</a>
                                </li>
                                <li class="text-[#cbd4fd] inline-block px-[5px]  relative text-xl font-heading-font sm:text-lg ">
                                    <span> {!! $category->name !!}</span></li>
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
                        <div>
                            @foreach ($articles as $article)
                            <div class="mb-[70px]">
                                <img class="w-full" src="{{ $article->thumbnailImg }}" alt="">
                                <div class="overflow-hidden my-[35px]">
                                    <ul>
                                      <li class="text-[14px] font-medium uppercase float-left col:float-none col:block col:ml-[0px] col:mb-[5px] text-[#666] ml-[20px] pl-[20px] relative before:absolute before:left-0 before:top-[50%] before:w-[7px] before:h-[7px] before:rounded-[50%] before:content-[''] before:translate before:-translate-y-1/2 before:bg-[#3756f7;] z-10 before:-z-10">
                                            <i class="relative top-0 mr-[3px] text-[15px] text-[#666]  fi flaticon-calendar-1"></i>
                                            {{ $article->created_at->format('d F Y') }}
                                        </li>
                                        <li class="text-[14px] font-medium uppercase float-left col:float-none col:block col:ml-[0px] col:mb-[5px] text-[#666] ml-[20px] pl-[20px] relative before:absolute before:left-0 before:top-[50%] before:w-[7px] before:h-[7px] before:rounded-[50%] before:content-[''] before:translate before:-translate-y-1/2 before:bg-[#3756f7;] z-10 before:-z-10">
                                            <i class="relative top-0 mr-[3px] text-[15px] text-[#666]  fi flaticon-comment-white-oval-bubble"></i>
                                            Comments {{  rand(15, 120) }} </li>
                                    </ul>
                                </div>
                                <h3 class="text-[34px] md:text-[25px] sm:text-[22px] text-white font-bold font-base-font leading-[40px] transition-all mb-[20px] group">
                                    <a href="{{ $article->show() }}" class="group-hover:text-[#3756f7;] transition-all text-[#232f4b]
                                        font-heading-font">{{ $article->title }}</a>
                                </h3>
                                <p class="text-[#666] leading-[24px] text-[16px] mb-[20px]">
                                    {{ $article->excerpt }}
                                </p>
                                <a href="{{ $article->show() }}" class="text-[#666] uppercase underline font-base-font text-[15px] font-semibold transition-all hover:text-[#3756f7;]">
                                    WIĘCEJ...</a>
                            </div>
                            @endforeach
                       
                            <div class="mt-[60px] text-left">
                                <ul class="inline-block overflow-hidden text-center">
                                    <li class="float-left mr-[10px]">
                                        <a href="{{ $articles->previousPageUrl() }}" aria-label="Previous" class="flex-center-center font-heading-font-s2 font-bold w-[50px] h-[50px] leading-[50px] text-[#0a272c] block bg-[#f5f5f5] transition-all hover:bg-[#3756f7] hover:text-white">
                                           <x-heroicon-o-arrow-left class="size-6"/>
                                        </a>
                                    </li>
                                    @foreach (range(1, $articles->lastPage()) as $i)
                                     <li class="active float-left mr-[10px]">
                                        <a href="{{ $articles->url($i) }}" class="font-heading-font-s2 font-bold w-[50px] h-[50px] leading-[50px]
                                            {{ $i == $articles->currentPage()? 'text-white block bg-[#3756f7] transition-all hover:bg-[#3756f7]' : 'text-[#0a272c] block bg-[#f5f5f5] transition-all hover:bg-[#3756f7] hover:text-white'}}"
                                        >{{ $i }}</a>
                                    </li>
                                    @endforeach
                                   
                                   
                                    <li class="float-left mr-[10px]">
                                        <a href="{{ $articles->nextPageUrl() }}" aria-label="Next" class="flex-center-center font-heading-font-s2 font-bold w-[50px] h-[50px] leading-[50px] text-[#0a272c] block bg-[#f5f5f5] transition-all hover:bg-[#3756f7] hover:text-white">
                                            <x-heroicon-o-arrow-right class="size-6"/>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                            <a href="/contact" class="inline-block text-white p-[10px_20px] border border-white text-[18px]
                                pr-24 relative mt-3 before:absolute before:text-[18px] before:right-[15px] before:top-1/2 
                                before:-translate-y-1/2 before:font-['themify'] before:content-['\e628']
                                ">Kontakt</a>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection
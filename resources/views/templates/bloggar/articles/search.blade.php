@extends('templates.bloggar.layout')

@section('title', $search)

@section('content')
    <div class="relative z-10 flex min-h-[160px] flex-col justify-center bg-cover bg-center bg-no-repeat before:absolute before:left-0 before:top-0 before:-z-10 before:h-full before:w-full before:bg-[#232f4b] before:opacity-70 sm:min-h-[250px] md:mt-3">
        <div class="wraper">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="text-center">
                        <h1 class="mb-[20px] mt-[-10px] text-3xl text-white sm:mb-[10px] sm:text-3xl">
                            Wyniki wyszukiwania
                        </h1>
                        <ul class="">
                            <li class="font-heading-font relative inline-block px-[5px] text-xl text-white after:left-[7px] after:content-['/'] sm:text-lg">
                                <a href="/">Home</a>
                            </li>
                            <li class="font-heading-font relative inline-block px-[5px] text-xl text-[#cbd4fd] sm:text-lg">
                                <span> Szukaj</span>
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
                    <div>
                        @foreach ($articles as $article)
                            <div class="mb-[70px]">
                                <img
                                    class="w-full"
                                    src="{{ $article->thumbnailImg }}"
                                    alt=""
                                />
                                <div class="my-[35px] overflow-hidden">
                                    <ul>
                                        <li class="col:float-none col:block col:ml-[0px] col:mb-[5px] before:translate relative z-10 float-left ml-[20px] pl-[20px] text-[14px] font-medium uppercase text-[#666] before:absolute before:left-0 before:top-[50%] before:-z-10 before:h-[7px] before:w-[7px] before:-translate-y-1/2 before:rounded-[50%] before:bg-[#3756f7;] before:content-['']">
                                            <i class="fi flaticon-calendar-1 relative top-0 mr-[3px] text-[15px] text-[#666]"></i>
                                            {{ $article->created_at->format('d F Y') }}
                                        </li>
                                        <li class="col:float-none col:block col:ml-[0px] col:mb-[5px] before:translate relative z-10 float-left ml-[20px] pl-[20px] text-[14px] font-medium uppercase text-[#666] before:absolute before:left-0 before:top-[50%] before:-z-10 before:h-[7px] before:w-[7px] before:-translate-y-1/2 before:rounded-[50%] before:bg-[#3756f7;] before:content-['']">
                                            <i class="fi flaticon-comment-white-oval-bubble relative top-0 mr-[3px] text-[15px] text-[#666]"></i>
                                            Comments {{ rand(15, 120) }}
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="font-base-font group mb-[20px] text-[34px] font-bold leading-[40px] text-white transition-all sm:text-[22px] md:text-[25px]">
                                    <a
                                        href="{{ $article->show() }}"
                                        class="font-heading-font text-[#232f4b] transition-all group-hover:text-[#3756f7;]"
                                        >{{ $article->title }}</a
                                    >
                                </h2>
                                <p class="mb-[20px] text-[16px] leading-[24px] text-[#666]">
                                    {{ $article->excerpt }}
                                </p>
                                <a
                                    href="{{ $article->show() }}"
                                    class="font-base-font text-[15px] font-semibold uppercase text-[#666] underline transition-all hover:text-[#3756f7;]"
                                >
                                    WIĘCEJ...</a
                                >
                            </div>
                        @endforeach

                        <div class="mt-[60px] text-left">
                            <ul class="inline-block overflow-hidden text-center">
                                <li class="float-left mr-[10px]">
                                    <a
                                        href="{{ $articles->previousPageUrl() }}"
                                        aria-label="Previous"
                                        class="flex-center-center font-heading-font-s2 block h-[50px] w-[50px] bg-[#f5f5f5] font-bold leading-[50px] text-[#0a272c] transition-all hover:bg-[#3756f7] hover:text-white"
                                    >
                                        <x-heroicon-o-arrow-left class="size-6" />
                                    </a>
                                </li>
                                @foreach (range(1, $articles->lastPage()) as $i)
                                    <li class="active float-left mr-[10px]">
                                        <a
                                            href="{{ $articles->url($i) }}"
                                            class="font-heading-font-s2 font-bold w-[50px] h-[50px] leading-[50px]
                                            {{ $i == $articles->currentPage() ? 'block bg-[#3756f7] text-white transition-all hover:bg-[#3756f7]' : 'block bg-[#f5f5f5] text-[#0a272c] transition-all hover:bg-[#3756f7] hover:text-white' }}"
                                            >{{ $i }}</a
                                        >
                                    </li>
                                @endforeach

                                <li class="float-left mr-[10px]">
                                    <a
                                        href="{{ $articles->nextPageUrl() }}"
                                        aria-label="Next"
                                        class="flex-center-center font-heading-font-s2 block h-[50px] w-[50px] bg-[#f5f5f5] font-bold leading-[50px] text-[#0a272c] transition-all hover:bg-[#3756f7] hover:text-white"
                                    >
                                        <x-heroicon-o-arrow-right class="size-6" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 md:col-span-12">
                    <div class="max-w-[400px] pl-7 lg:pl-0">
                        <div class="relative z-30 mb-7 border border-[#eef0fc] bg-[#f9faff] p-5 text-center">
                            <form action="{{ route('search') }}" method="get">
                                <div class="relative">
                                    <input
                                        name="search"
                                        type="text"
                                        placeholder="Search Post.."
                                        class="h-[70px] w-full rounded-[5px] bg-[rgba(55,86,247,0.05)] p-[6px_50px_6px_20px] text-base transition-all focus:bg-[rgba(55,86,247,0.1)] focus-visible:border-none focus-visible:outline-0"
                                    />
                                    <button
                                        type="submit"
                                        class="flex-center-center absolute right-3 top-[52%] h-[50px] w-[50px] -translate-y-1/2 rounded-[6px] border-none bg-[#3756f7] text-xl leading-[50px] text-white"
                                    >
                                        <x-heroicon-o-magnifying-glass class="size-6" />
                                    </button>
                                </div>
                            </form>
                        </div>
                        @include('components.templates.bloggar.popular-posts-widget')

                        @include('components.templates.bloggar.popular-categories-widget')

                        <div class="mb-7 border border-[#eef0fc] p-7">
                            <h3 class="relative mb-5 pb-5 text-2xl capitalize text-[#232f4b] before:absolute before:bottom-0 before:left-0 before:h-[4px] before:w-[55px] before:rounded-[10px] before:bg-[#3756f7] after:absolute after:bottom-0 after:left-[65px] after:h-[4px] after:w-[80%] after:rounded-[10px] after:bg-[#f2f2f2]">
                                Tags
                            </h3>
                            <ul class="overflow-hidden">
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Travel</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Food</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Lifestyle</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Business</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Idea</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Finance</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Corporate</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Culture</a
                                    >
                                </li>
                                <li class="float-left mb-[8px] mr-[8px]">
                                    <a
                                        class="inline-block rounded-[5px] bg-[#ecf4fb] p-[5px_18px] text-sm text-[#232f4b] transition-all hover:bg-[#3756f7] hover:text-white"
                                        href="#"
                                        >Gym</a
                                    >
                                </li>
                            </ul>
                        </div>

                        <div class="bg-[#3756f7] p-[30px_40px] lg:p-5">
                            <h2 class="mb-5 text-left text-3xl font-bold text-white">Jak możemy Ci pomóc?</h2>
                            <p class="mb-3 text-lg text-white">Jeśli potrzebujesz pomocy napisz do nas.</p>
                            <a
                                href="{{ route('contact') }}"
                                class="relative mt-3 inline-block border border-white p-[10px_20px] pr-24 text-[18px] text-white before:absolute before:right-[15px] before:top-1/2 before:-translate-y-1/2 before:font-['themify'] before:text-[18px] before:content-['\e628']"
                                >Kontakt</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

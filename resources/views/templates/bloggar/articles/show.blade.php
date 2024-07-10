@extends('templates.bloggar.layout')

@section('title', $article->title)

@section('description', $article->content)

@section('content')
    <div class="relative z-10 flex min-h-[400px] flex-col justify-center bg-[url(../images/page-title.jpg)] bg-cover bg-center bg-no-repeat before:absolute before:left-0 before:top-0 before:-z-10 before:h-full before:w-full before:bg-[#232f4b] before:opacity-70 sm:min-h-[250px] md:mt-3">
        <div class="wraper">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="text-center">
                        <h1 class="mb-[20px] mt-[-10px] text-3xl text-white sm:mb-[10px] sm:text-[40px]">
                            {{ $article->title }}
                        </h1>
                        <ul class="">
                            <li class="font-heading-font relative inline-block px-[5px] text-xl text-white after:left-[7px] after:content-['/'] sm:text-lg">
                                <a href="/">Home</a>
                            </li>
                            <li class="font-heading-font relative inline-block px-[5px] text-xl text-[#cbd4fd] sm:text-lg">
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
                        <img
                            class="w-full"
                            src="{{ $article->thumbnailImg }}"
                            alt="{{ $article->title }}"
                        />
                        <div class="my-[35px] overflow-hidden">
                            <ul>
                                <li class="col:float-none relative flex items-center text-[14px] font-medium uppercase text-[#687693]">
                                    <span class="mr-4">
                                        <x-heroicon-o-calendar class="top-0 mr-[3px] size-5 text-[#687693]" />
                                    </span>
                                    {{ $article->created_at->format('d F Y') }}
                                </li>
                            </ul>
                        </div>
                        <h1 class="mb-[20px] text-[34px] leading-[40px] text-[#0a272c] sm:text-[22px] md:text-[25px]">
                            {{ $article->title }}
                        </h1>

                        <div class="prose xl:prose-lg !max-w-full">
                            {!! $article->contentWithLink !!}
                        </div>
                    </div>
                    <div class="mt-[75px] border-b border-[#ebebeb] pb-[30px] text-white sm:mb-[40px]">
                        <div class="flex items-center">
                            <span class="font-heading-font inline-block pr-[15px] font-semibold uppercase text-[#0a272c]">Tagi: </span>
                            <ul class="inline-block">
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0">
                                    <a
                                        href="#"
                                        class="inline-block rounded-[5px] bg-[#f5f5f5] px-[18px] py-[2px] text-[13px] font-normal uppercase text-[#0a272c] transition-all hover:text-[#3756f7]"
                                        >Biznes</a
                                    >
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0">
                                    <a
                                        href="#"
                                        class="inline-block rounded-[5px] bg-[#f5f5f5] px-[18px] py-[2px] text-[13px] font-normal uppercase text-[#0a272c] transition-all hover:text-[#3756f7]"
                                        >Finanse</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end tag-share -->
                    <div class="mt-[30px] pb-[30px] text-white sm:mb-[40px]">
                        <div class="flex items-center">
                            <span class="font-heading-font inline-block pr-[15px] font-semibold uppercase text-[#0a272c]">Share: </span>
                            <ul class="inline-block">
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0">
                                    <a
                                        href="#"
                                        class="inline-block text-[15px] font-normal capitalize text-[#6e6e6e] underline transition-all hover:text-[#3756f7]"
                                        >facebook</a
                                    >
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0">
                                    <a
                                        href="#"
                                        class="inline-block text-[15px] font-normal capitalize text-[#6e6e6e] underline transition-all hover:text-[#3756f7]"
                                        >twitter</a
                                    >
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0">
                                    <a
                                        href="#"
                                        class="inline-block text-[15px] font-normal capitalize text-[#6e6e6e] underline transition-all hover:text-[#3756f7]"
                                        >linkedin</a
                                    >
                                </li>
                                <li class="float-left ml-[10px] sm:m-[2px] sm:ml-0">
                                    <a
                                        href="#"
                                        class="inline-block text-[15px] font-normal capitalize text-[#6e6e6e] underline transition-all hover:text-[#3756f7]"
                                        >pinterest</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end tag-share -->
                    <div class="mb-[60px] mt-[35px]">
                        <div class="float-left sm:float-none">
                            <a
                                href="#"
                                target="_blank"
                            >
                                <img
                                    class="rounded-[50%]"
                                    src="assets/images/blog-details/author.jpg"
                                    alt=""
                            /></a>
                        </div>
                        <div class="block overflow-hidden pl-[25px] sm:mt-[15px] sm:pl-0">
                            {{--
                                #
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
                        @if ($randomArticles->first())
                            <div class="group float-left w-[50%] py-[40px] pl-[5px] pr-[15px] text-left sm:float-none sm:w-full sm:px-[15px] sm:py-[25px]">
                                <a
                                    href="{{ $randomArticles->first()->show() }}"
                                    class="inline-block"
                                >
                                    <span class="relative flex text-[15px] font-semibold uppercase tracking-[2px] text-[#6e6e6e] transition-all group-hover:text-[#3756f7] group-hover:before:text-[#3756f7]">
                                        <x-heroicon-o-arrow-left class="mr-4 size-5 text-[#687693]" />
                                        <span>Poprzedni artykuł</span>
                                    </span>
                                    <span class="font-base-font mt-[15px] block text-[18px] font-normal text-[#232f4b]">
                                        {!! $randomArticles->first()->title !!}
                                    </span>
                                </a>
                            </div>
                        @endif

                        @if ($randomArticles->get(1))
                            <div class="group float-left w-[50%] border-l border-[#d8e0f1] py-[40px] pl-[15px] pr-[5px] text-right sm:float-none sm:w-full sm:border-t sm:border-l-transparent sm:px-[15px] sm:py-[25px] sm:text-left">
                                <a
                                    href="{{ $randomArticles->get(1)->show() }}"
                                    class="group inline-block transition-all"
                                >
                                    <span class="relative flex items-center justify-end text-[15px] font-semibold uppercase tracking-[2px] text-[#6e6e6e] transition-all before:hidden group-hover:text-[#3756f7] group-hover:before:text-[#3756f7] sm:pr-0">
                                        <span class="mr-4">Następny artykuł</span>
                                        <x-heroicon-o-arrow-right class="size-5 text-[#687693]" />
                                    </span>
                                    <span class="font-base-font mt-[15px] block text-[18px] font-normal text-[#232f4b]">
                                        {!! $randomArticles->get(1)->title !!}
                                    </span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="mt-[70px]">
                        <h3 class="font-heading-font mb-[20px] text-[30px] font-medium uppercase leading-[40px] tracking-[3px] text-[#232f4b] sm:text-[20px] md:text-[25px]">
                            5 Komentarzy
                        </h3>
                        <ol class="pl-0">
                            <li
                                class="comment even thread-even depth-1"
                                id="comment-1"
                            >
                                <div
                                    id="div-comment-1"
                                    class="relative flex border-b border-[#ebebeb] p-[30px] md:px-[25px] md:py-[35px]"
                                >
                                    <div class="left-[35px] sm:static">
                                        <div class="comment-image">
                                            <img
                                                class="h-auto max-h-[180px] max-w-full rounded-full"
                                                src="{{ asset('img/default-person.png') }}"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                    <div class="pl-[20px] sm:pl-0 sm:pt-[25px]">
                                        <div class="comment-wrapper">
                                            <h4 class="font-heading-font mb-[15px] text-[18px] font-bold capitalize text-[#232f4b]">
                                                Robert Sonny
                                                <span class="pl-[5px] text-[15px] font-normal capitalize text-[#687693] sm:pl-0"
                                                    >says Jul 21, 2024 at 10:00am</span
                                                >
                                            </h4>
                                            <p class="mb-[20px] text-[15px] font-normal capitalize text-[#687693]">
                                                I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and
                                                I will give you a complete account of the system
                                            </p>
                                            <a
                                                class="font-base-font inline-block text-[14px] font-semibold uppercase tracking-[1px] text-white underline transition-all hover:text-[#3756f7]"
                                                href="#"
                                                ><span>Reply</span></a
                                            >
                                        </div>
                                    </div>
                                </div>
                                <ul class="pl-[30px]">
                                    <li class="comment">
                                        <div class="relative flex border-b border-[#ebebeb] p-[30px] md:px-[25px] md:py-[35px]">
                                            <div class="sm:static">
                                                <div class="comment-image">
                                                    <img
                                                        class="h-auto max-h-[180px] max-w-full rounded-full"
                                                        src="{{ asset('img/default-person.png') }}"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                            <div class="pl-[20px] sm:pl-0 sm:pt-[25px]">
                                                <div class="comment-wrapper">
                                                    <h4 class="font-heading-font mb-[15px] text-[18px] font-bold capitalize text-[#232f4b]">
                                                        John Abraham
                                                        <span class="pl-[5px] text-[15px] font-normal capitalize text-[#687693] sm:pl-0"
                                                            >says Jul 21, 2024 at 10:00am</span
                                                        >
                                                    </h4>
                                                    <p class="mb-[20px] text-[15px] font-normal capitalize text-[#687693]">
                                                        I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                                                        born and I will give you a complete account of the system
                                                    </p>
                                                    <a
                                                        class="font-base-font inline-block text-[14px] font-semibold uppercase tracking-[1px] text-white underline transition-all hover:text-[#3756f7]"
                                                        href="#"
                                                        ><span>Reply</span></a
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pl-[30px]">
                                            <li class="comment">
                                                <div class="relative flex border-b border-[#ebebeb] p-[30px] md:px-[25px] md:py-[35px]">
                                                    <div class="sm:static">
                                                        <div class="comment-image">
                                                            <img
                                                                class="h-auto max-h-[180px] max-w-full rounded-full"
                                                                src="{{ asset('img/default-person.png') }}"
                                                                alt=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="pl-[20px] sm:pl-0 sm:pt-[25px]">
                                                        <div class="comment-wrapper">
                                                            <h4 class="font-heading-font mb-[15px] text-[18px] font-bold capitalize text-[#232f4b]">
                                                                Robert Sonny<span class="pl-[5px] text-[15px] font-normal capitalize text-[#687693] sm:pl-0"
                                                                    >says Jul 21, 2024 at 10:00am</span
                                                                >
                                                            </h4>
                                                            <p class="mb-[20px] text-[15px] font-normal capitalize text-[#687693]">
                                                                I must explain to you how all this mistaken idea of denouncing pleasure and praising
                                                                pain was born and I will give you a complete account of the system
                                                            </p>
                                                            <a
                                                                class="font-base-font inline-block text-[14px] font-semibold uppercase tracking-[1px] text-[#232f4b] underline transition-all hover:text-[#3756f7]"
                                                                href="#"
                                                                ><span>Reply</span></a
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                        <!-- end comments-section -->
                        <div class="mt-[40px]">
                            <div class="mb-[30px]">
                                <h2 class="font-heading-font text-[22px] font-semibold uppercase leading-[130.5%] tracking-[2px] text-[#232f4b] md:text-[25px]">
                                    Zostaw komentarz
                                </h2>
                            </div>
                            <form
                                method="post"
                                class="contact-validation-active"
                                id="contact-form-main"
                            >
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-6 mb-3 sm:col-span-12 md:col-span-6">
                                        <input
                                            type="text"
                                            class="form-control h-[50px] w-full rounded-[50px] border-[1px] border-[#a4adbe] pl-[15px] text-[#687693] focus:shadow-none focus:outline-0"
                                            placeholder="Your Name"
                                        />
                                    </div>
                                    <div class="col-span-6 mb-3 sm:col-span-12 md:col-span-6">
                                        <input
                                            type="email"
                                            class="form-control h-[50px] w-full rounded-[50px] border-[1px] border-[#a4adbe] pl-[15px] text-[#687693] focus:shadow-none focus:outline-0"
                                            placeholder="Your Email"
                                        />
                                    </div>
                                    <div class="col-span-12 mb-3">
                                        <input
                                            type="url"
                                            class="form-control h-[50px] w-full rounded-[50px] border-[1px] border-[#a4adbe] pl-[15px] text-[#687693] focus:shadow-none focus:outline-0"
                                            placeholder="Website"
                                        />
                                    </div>
                                    <div class="col-span-12">
                                        <textarea
                                            class="form-control h-[220px] w-full rounded-[30px] border-[1px] border-[#a4adbe] pl-[15px] pt-[10px] text-[#687693] focus:shadow-none focus:outline-0"
                                            name="note"
                                            id="note"
                                            placeholder="Write Your Comments..."
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="mt-[10px]">
                                    <button
                                        type="submit"
                                        class="theme-btn font-heading-font overflow-hidden rounded-[30px] bg-[#3756f7] pr-[35px] text-[15px] font-medium uppercase tracking-[2px] before:hidden sm:pr-[18px]"
                                    >
                                        Dodaj komentarz
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end comments-area -->
                </div>
                <div class="col-span-4 md:col-span-12">
                    <div class="max-w-[400px] pl-7 lg:pl-0">
                        <div class="relative z-30 mb-7 border border-[#eef0fc] bg-[#f9faff] p-5 text-center">
                            <form>
                                <div class="relative">
                                    <input
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
                <!-- end of wpo-hero-slide-section-->
            </div>
        </div>
    </div>
@endsection

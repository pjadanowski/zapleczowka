@extends('templates.bloggar.layout')

@section('content')
    <!-- start of breadcumb-section -->
    <div class="relative z-10 flex min-h-[160px] flex-col justify-center bg-[url(../images/page-title.jpg)] bg-cover bg-center bg-no-repeat before:absolute before:left-0 before:top-0 before:-z-10 before:h-full before:w-full before:bg-[#232f4b] before:opacity-70 sm:min-h-[250px] md:mt-3">
        <div class="wraper">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="text-center">
                        <h1 class="mb-[20px] mt-[-10px] text-3xl text-white sm:mb-[10px] sm:text-3xl">Formularz kontaktowy</h1>
                        <ul class="">
                            <li class="font-heading-font relative inline-block px-[5px] text-xl text-white after:left-[7px] after:content-['/'] sm:text-lg">
                                <a href="/">Home</a>
                            </li>
                            <li class="font-heading-font relative inline-block px-[5px] text-xl text-[#cbd4fd] sm:text-lg">
                                <span>Kontakt</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of wpo-breadcumb-section-->

    <!-- start contact -->
    <section class="z-1 relative pb-0 pt-[120px]">
        <div class="wraper">
            <div class="grid grid-cols-12">
                <div class="col-span-1"></div>
                <div class="col-span-10 md:col-span-12">
                    <div class="mx-auto mb-[50px] max-w-[440px] text-center">
                        <h2 class="col:text-[25px] font-heading-font mb-[20px] text-[35px] font-bold text-[#0a272c]">Masz pytania?</h2>
                        <p class="text-[16px] leading-[22px] text-[#687693]">Skontaktuj się z nami</p>
                    </div>
                    <div class="relative z-10 mb-[-125px] bg-white p-[50px] shadow-[0px_1px_15px_0px_rgba(62,65,159,0.1)] sm:p-7 sm:pt-[50px]">
                        <form
                            method="post"
                            class="contact-validation-active mx-[-15px] overflow-hidden"
                            id="contact-form-main"
                        >
                            <div class="col:float-none col:w-[calc(100%-25px)] float-left mx-[15px] mb-[25px] w-[calc(50%-30px)]">
                                <input
                                    type="text"
                                    class="form-control h-[50px] w-full border-[1px] border-[#ebebeb] bg-transparent pl-[25px] text-[#212529] transition-all focus:border-[#3756f7] focus:bg-transparent focus:shadow-none focus:outline-0"
                                    name="name"
                                    id="name"
                                    placeholder="Imię i nazwisko*"
                                />
                            </div>
                            <div class="col:float-none col:w-[calc(100%-25px)] float-left mx-[15px] mb-[25px] w-[calc(50%-30px)]">
                                <input
                                    type="email"
                                    class="form-control h-[50px] w-full border-[1px] border-[#ebebeb] bg-transparent pl-[25px] text-[#212529] transition-all focus:border-[#3756f7] focus:bg-transparent focus:shadow-none focus:outline-0"
                                    name="email"
                                    id="email"
                                    placeholder="Email*"
                                />
                            </div>

                            <div class="mx-[15px] mb-[25px] w-[calc-(100%-25px)]">
                                <textarea
                                    class="form-control h-[180px] w-full border-[1px] border-[#ebebeb] bg-transparent pl-[25px] pt-[15px] text-[#212529] transition-all focus:border-[#3756f7] focus:bg-transparent focus:shadow-none focus:outline-0"
                                    name="note"
                                    id="note"
                                    placeholder="Wiadomość..."
                                ></textarea>
                            </div>
                            <div class="mb-[10px] w-full text-center">
                                <button
                                    type="submit"
                                    class="] inline-block border border-transparent bg-[#3756f7] px-[22px] py-[12px] capitalize text-[#fff] transition-all hover:border-[#3756f7] hover:bg-transparent hover:text-[#3756f7]"
                                >
                                    Wyślij
                                </button>
                                <div id="loader">
                                    <i class="ti-reload"></i>
                                </div>
                            </div>
                            <div class="clearfix error-handling-messages">
                                <div id="success">Thank you</div>
                                <div id="error">Error occurred while sending email. Please try again later.</div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-span-1"></div>
            </div>
        </div>
    </section>

    <div
        class=""
        style="margin-bottom: 150px"
    ></div>
@endsection

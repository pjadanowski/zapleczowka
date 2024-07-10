@extends('templates.bloggar.layout')

@section('content')
      
        <!-- start of breadcumb-section -->
        <div class="bg-[url(../images/page-title.jpg)] bg-no-repeat bg-center bg-cover min-h-[400px] relative flex justify-center flex-col z-10
            sm:min-h-[250px] before:absolute before:left-0 before:top-0 before:w-full before:h-full before:bg-[#232f4b]
            before:-z-10 before:opacity-70 md:mt-3">
            <div class="wraper">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="text-center">
                            <h1 class="text-4xl text-white mt-[-10px] mb-[20px] sm:text-3xl sm:mb-[10px]">Formularz kontaktowy</h1>
                            <ul class="">
                                <li
                                    class="inline-block px-[5px] text-white relative text-xl font-heading-font sm:text-lg after:content-['/'] after:left-[7px]">
                                    <a href="/">Home</a>
                                </li>
                                <li
                                    class="text-[#cbd4fd] inline-block px-[5px]  relative text-xl font-heading-font sm:text-lg ">
                                    <span>Kontakt</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of wpo-breadcumb-section-->

        <!-- start contact -->
        <section class="relative pt-[120px] pb-0  z-1">
            <div class="wraper">
                <div class="grid grid-cols-12">
                    <div class="col-span-1"></div>
                    <div class="col-span-10 md:col-span-12">
                        <div class="max-w-[440px] mx-auto text-center mb-[50px]">
                            <h2 class="text-[35px] col:text-[25px] text-[#0a272c] font-heading-font font-bold
                        mb-[20px]">
                                Masz pytania?</h2>
                            <p class="text-[#687693] text-[16px] leading-[22px]">Skontaktuj się z nami</p>
                        </div>
                        <div class="p-[50px] bg-white mb-[-125px] relative z-10
                    shadow-[0px_1px_15px_0px_rgba(62,65,159,0.1)] sm:p-7 sm:pt-[50px]">
                            <form method="post" class="contact-validation-active mx-[-15px] overflow-hidden"
                                id="contact-form-main">
                                <div
                                    class="w-[calc(50%-30px)] float-left mx-[15px] mb-[25px] col:float-none col:w-[calc(100%-25px)]">
                                    <input type="text" class="form-control w-full bg-transparent border-[1px] border-[#ebebeb] h-[50px]
                                text-[#212529] transition-all pl-[25px] focus:outline-0 focus:shadow-none
                                    focus:border-[#3756f7] focus:bg-transparent " name="name" id="name"
                                        placeholder="Imię i nazwisko*">
                                </div>
                                <div
                                    class="w-[calc(50%-30px)] float-left mx-[15px] mb-[25px] col:float-none col:w-[calc(100%-25px)]">
                                    <input type="email"
                                        class="form-control  w-full bg-transparent border-[1px] border-[#ebebeb] h-[50px] text-[#212529] transition-all pl-[25px] focus:outline-0 focus:shadow-none  focus:border-[#3756f7] focus:bg-transparent"
                                        name="email" id="email" placeholder="Email*">
                                </div>
                               
                                <div class="w-[calc-(100%-25px)] mb-[25px] mx-[15px]">
                                    <textarea
                                        class="form-control  w-full bg-transparent border-[1px] border-[#ebebeb] h-[180px]  text-[#212529] transition-all pt-[15px] pl-[25px] focus:outline-0 focus:shadow-none  focus:border-[#3756f7] focus:bg-transparent"
                                        name="note" id="note" placeholder="Wiadomość..."></textarea>
                                </div>
                                <div class="text-center w-full mb-[10px]">
                                    <button type="submit" class="bg-[#3756f7] text-[#fff] inline-block py-[12px] px-[22px] border
                                hover:text-[#3756f7]
                                border-transparent ] capitalize transition-all hover:bg-transparent
                                hover:border-[#3756f7]">Wyślij</button>
                                    <div id="loader">
                                        <i class="ti-reload"></i>
                                    </div>
                                </div>
                                <div class="clearfix error-handling-messages">
                                    <div id="success">Thank you</div>
                                    <div id="error"> Error occurred while sending email. Please try again later.
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-span-1"></div>
                </div>
            </div>
        </section>

        <div class="" style="margin-bottom: 150px"></div>

@endsection

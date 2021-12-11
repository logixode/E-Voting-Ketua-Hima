<!--

=========================================================
* Notus JS - v1.1.0 based on Tailwind Starter Kit by Creative Tim
=========================================================

* Product Page: https://www.creative-tim.com/product/notus-js
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md)

* Tailwind Starter Kit Page: https://www.creative-tim.com/learning-lab/tailwind-starter-kit/presentation

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <link rel="shortcut icon" href="../../assets/img/favicon.ico" />

  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/vendor/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <script src="{{ mix('/js/app.js') }}" defer></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <title>E-Voting | Dashboard</title>
</head>

<body class="text-blueGray-700 antialiased">
  <main>
    <section class="relative w-full h-full min-h-screen flex items-center">
      <div class="
          absolute
          top-0
          w-full
          h-full
          bg-blueGray-800 bg-full bg-no-repeat
        " style="background-image: url(/assets/img/register_bg_2.png)"></div>
      <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
          <div class="w-full lg:w-4/12 px-4">
            <div class="
                relative
                flex flex-col
                min-w-0
                break-words
                w-full
                shadow-lg
                rounded-lg
                bg-blueGray-200
                border-0
              ">
              <div class="rounded-t mb-0 px-6 py-6">
                <div class="flex justify-center">
                  <img src="/assets/img/logo-hmti.png" width="150" alt="" srcset="">
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
              </div>
              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="/evoting/admin/login" method="post" autocomplete="on">
                  @csrf
                  <div class="relative w-full mb-3">
                    <label class="
                        block
                        uppercase
                        text-blueGray-600 text-xs
                        font-bold
                        mb-2
                      " for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" required autofocus class="
                        border-0
                        px-3
                        py-3
                        placeholder-blueGray-300
                        text-blueGray-600
                        bg-white
                        rounded
                        text-sm
                        shadow
                        focus:outline-none focus:ring
                        w-full
                        ease-linear
                        transition-all
                        duration-150
                      " />
                  </div>
                  <div class="relative w-full mb-3">
                    <label class="
                        block
                        uppercase
                        text-blueGray-600 text-xs
                        font-bold
                        mb-2
                      " for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required class="
                        border-0
                        px-3
                        py-3
                        placeholder-blueGray-300
                        text-blueGray-600
                        bg-white
                        rounded
                        text-sm
                        shadow
                        focus:outline-none focus:ring
                        w-full
                        ease-linear
                        transition-all
                        duration-150
                      " />
                  </div>
                  <div>
                    @error('error')
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-amber-500 flex items-center">
                      <span class="text-xl align-middle mr-5">
                        <i class="fas fa-exclamation-circle"></i>
                      </span>
                      <span class="align-middle">
                        {{ $message }}
                      </span>
                    </div>
                    @enderror
                  </div>
                  <div class="text-center mt-6">
                    <button class="
                        bg-blueGray-800
                        text-white
                        active:bg-blueGray-600
                        text-sm
                        font-bold
                        uppercase
                        px-6
                        py-3
                        rounded
                        shadow
                        hover:shadow-lg
                        outline-none
                        focus:outline-none
                        mr-1
                        mb-1
                        w-full
                        ease-linear
                        transition-all
                        duration-150
                      " type="submit">
                      Sign In
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>
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

  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/vendor/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />

  @if (isset($dataTables))
  <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/responsive.dataTables.min.css') }}" rel="stylesheet">
  @endif

  <title>E-Voting | Dashboard</title>
</head>

<body class="text-blueGray-700 antialiased">
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    @include('layouts.sidebar')

    <div class="relative md:ml-64 bg-blueGray-50">
      <nav class="absolute -top-1/4 md:top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
          <h3 class="text-white text-sm uppercase hidden lg:inline-block font-semibold">{{ $title }}</h3>

          <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
              <div class="items-center flex">
                <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" src="../../assets/img/team-1-800x800.jpg" /></span>
              </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="user-dropdown">
              <form action="/evoting/logout" method="post">
                @csrf
                <input type="text" name="admin" value="true" hidden>
                <button type="submit" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Logout</button>
              </form>
            </div>
          </ul>
        </div>
      </nav>
      <!-- Header BG -->
      <div class="relative bg-yellow-500 md:pt-44 pb-44 pt-12">
      </div>

      <!-- Body -->
      <div class="px-4 md:px-10 mx-auto w-full -m-60">
        <div class="md:pt-0 pt-12">
          @yield('body')
        </div>

        @include('layouts/footer')
      </div>

    </div>
  </div>

  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script type="text/javascript">
    /* Make dynamic date appear */
    (function() {
      if (document.getElementById("get-current-year")) {
        document.getElementById(
          "get-current-year"
        ).innerHTML = new Date().getFullYear();
      }
    })();
    /* Sidebar - Side navigation menu on mobile/responsive mode */
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("bg-white");
      document.getElementById(collapseID).classList.toggle("m-2");
      document.getElementById(collapseID).classList.toggle("py-3");
      document.getElementById(collapseID).classList.toggle("px-6");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
      let element = event.target;
      while (element.nodeName !== "A") {
        element = element.parentNode;
      }
      Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start",
      });
      document.getElementById(dropdownID).classList.toggle("hidden");
      document.getElementById(dropdownID).classList.toggle("block");
    }
  </script>

</body>

</html>
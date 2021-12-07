<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
  <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
    <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
      <i class="fas fa-bars"></i>
    </button>
    <div class="rounded-t mb-0 md:pt-5">
      <div class="justify-center hidden md:flex">
        <img src="/assets/img/logo-hmti.png" width="150" alt="" srcset="">
      </div>
      <h3 class="text-center md:mt-3 md:mb-1">E-Voting Cakahim HMTI</h3>
    </div>
    <ul class="md:hidden items-center flex flex-wrap list-none">
      <li class="inline-block relative">
        <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-responsive-dropdown')">
          <div class="items-center flex">
            <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" src="../../assets/img/team-1-800x800.jpg" /></span>
          </div>
        </a>
        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="user-responsive-dropdown">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Logout</button>
          </form>
        </div>
      </li>
    </ul>
    <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
      <div class="md:min-w-full md:hidden block pb-4 mb-4">
        <div class="flex flex-wrap">
          <div class="w-6/12">
            <div class="rounded-t mb-0">
              <div class="justify-center hidden md:flex">
                <img src="/assets/img/logo-hmti.png" width="150" alt="" srcset="">
              </div>
              <h3 class="text-center mt-3">E-Voting Cakahim HMTI</h3>
            </div>
          </div>
          <div class="w-6/12 flex justify-end">
            <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Divider -->
      <hr class="my-5 md:min-w-full" />

      <ul class="md:flex-col md:min-w-full flex flex-col list-none sidebar">
        <li class="items-center">
          <a href="/admin/" class="text-xs uppercase py-3 font-bold block menu-item {{ $title == 'Dashboard' ? 'active' : '' }}">
            <i class="fas fa-tv mr-2 text-sm"></i>
            Dashboard
          </a>
        </li>
        
        <li class="items-center">
          <a href="/admin/voting_data" class="text-xs uppercase py-3 font-bold block menu-item {{ $title == 'Perolehan Suara' ? 'active' : '' }}">
            <i class="fas fa-poll mr-2 text-sm"></i>
            Perolehan Suara
          </a>
        </li>

        <li class="items-center">
          <a href="./settings.html" class="text-xs uppercase py-3 font-bold block menu-item {{ $title == 'Kandidat' ? 'active' : '' }}">
            <i class="fas fa-user-tie mr-2 text-sm"></i>
            Kandidat
          </a>
        </li>

        <li class="items-center">
          <a href="./settings.html" class="text-xs uppercase py-3 font-bold block menu-item {{ $title == 'User' ? 'active' : '' }}">
            <i class="fas fa-user-alt mr-2 text-sm"></i>
            User
          </a>
        </li>

        <li class="items-center">
          <a href="./settings.html" class="text-xs uppercase py-3 font-bold block menu-item {{ $title == 'Settings' ? 'active' : '' }}">
            <i class="fas fa-tools mr-2 text-sm"></i>
            Settings
          </a>
        </li>
      </ul>

    </div>
  </div>
</nav>
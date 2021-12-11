<template>
  <main>
    <nav
      class="
        top-0
        fixed
        z-50
        w-full
        flex flex-wrap
        items-center
        justify-between
        px-2
        py-3
        navbar-expand-lg
        bg-white
        shadow
      "
    >
      <div
        class="
          container
          px-4
          mx-auto
          flex flex-wrap
          items-center
          justify-between
        "
      >
        <div
          class="
            w-full
            relative
            flex
            justify-between
            lg:w-auto lg:static lg:block lg:justify-start
          "
        >
        <inertia-link href="/evoting/" class="flex items-center">
          <img src="/assets/img/logo-hmti.png" width="40px" alt="" srcset=""><span class="font-semibold px-2">E-Voting Cakahim HMTI 2021</span>
        </inertia-link>
          <!-- <a
            class="
              text-blueGray-700 text-sm
              font-bold
              leading-relaxed
              inline-block
              mr-4
              py-2
              whitespace-nowrap
              uppercase
            "
            href="./index.html"
          >
            Notus JS
          </a> -->
          <button
            class="
              cursor-pointer
              text-xl
              leading-none
              px-3
              py-1
              border border-solid border-transparent
              rounded
              bg-transparent
              block
              lg:hidden
              outline-none
              focus:outline-none
            "
            type="button"
            @click="toggleNavbar('example-collapse-navbar')"
          >
            <i class="fas fa-bars"></i>
          </button>
        </div>
        <div
          class="
            lg:flex
            flex-grow
            items-center
            bg-white
            lg:bg-opacity-0 lg:shadow-none
            hidden
          "
          id="example-collapse-navbar"
        >
          <ul
            class="flex flex-col lg:flex-row list-none lg:ml-auto items-center"
          >
            <li class="flex items-center">
              <form @submit.prevent="logout()">
                <button
                  type="submit"
                  class="
                    hover:text-blueGray-500
                    text-blueGray-700
                    px-3
                    py-4
                    lg:py-2
                    flex
                    items-center
                    text-xs
                    uppercase
                    font-bold
                  "
                  @click="logout()"
                >
                  <i
                    class="
                      text-blueGray-400
                      fas
                      fa-sign-out-alt
                      text-lg
                      leading-lg
                    "
                  ></i>
                  <span class="lg:hidden inline-block ml-2">Logout</span>
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="bg-gray-50">
      <slot></slot>
    </div>
    <footer class="block py-4 bg-gray-50">
      <div class="container mx-auto px-4">
        <hr class="mb-4 border-b-1 border-blueGray-200" />
        <div class="flex flex-wrap items-center md:justify-between justify-center md:px-7">
          <div class="w-full px-4">
            <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
              <p class="text-center">
                Copyright © <span v-text="get_current_year"></span>  Softdev Team of
                <a href="https://www.instagram.com/tipoliwangi/" target="_blank" class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1">
                  HMTI Poliwangi
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </main>
</template>

<script>
export default {
  props: ["title", "csrf_token"],
  data: () => ({
    get_current_year: new Date().getFullYear()
  }),
  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = "E-Voting | " + title;
      },
    },
  },
  mounted() {
    let popper = document.createElement("script");
    popper.setAttribute(
      "src",
      "https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"
    );
    document.body.appendChild(popper);
  },
  methods: {
    logout() {
      this.$inertia.post('/evoting/logout', {
        admin: false,
        _token: this.csrf_token
      });
    },
    toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    },
    /* Function for dropdowns */
    openDropdown(event, dropdownID) {
      let element = event.target;
      while (element.nodeName !== "A") {
        element = element.parentNode;
      }
      Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start",
      });
      document.getElementById(dropdownID).classList.toggle("hidden");
      document.getElementById(dropdownID).classList.toggle("block");
    },
  },
};
</script>

<style>
</style>
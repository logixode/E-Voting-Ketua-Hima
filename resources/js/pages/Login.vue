<template>
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
                <h3 class="text-center md:mt-3 md:mb-1">E-Voting Cakahim HMTI 2021</h3>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
              </div>
              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form @submit.prevent="login()" autocomplete="on">
                  <div class="relative w-full mb-3">
                    <label class="
                        block
                        uppercase
                        text-blueGray-600 text-xs
                        font-bold
                        mb-2
                      " for="username">NIM</label>
                    <input type="text" name="username" id="username" placeholder="36xx55401xxx" v-model="username" required autofocus class="
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
                    <input type="password" name="password" id="password" placeholder="Password" v-model="password" required class="
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
                    <template v-if="errors.error">
                      <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-amber-500 flex items-center">
                        <span class="text-xl align-middle mr-5">
                          <i class="fas fa-exclamation-circle"></i>
                        </span>
                        <span class="align-middle">
                          {{ errors.error }}
                        </span>
                      </div>
                    </template>
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
</template>

<script>
import { Method } from '@inertiajs/inertia';
export default {
  props: ["csrf_token", 'errors'],
  data: () => ({
    username: '',
    password: ''
  }),
  methods: {
    login() {
      this.$inertia.post('/login', {
        username: this.username,
        password: this.password,
        _token: this.csrf_token
      });
    }
  }
};
</script>

<style>
</style>
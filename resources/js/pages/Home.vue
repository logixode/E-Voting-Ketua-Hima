<template>
  <Homepage title="Home" :user="user" :csrf_token="csrf_token">
    <section
      class="
        header
        relative
        pt-16
        lg:items-center lg:flex lg:h-screen lg:max-h-860-px
      "
    >
      <div class="container mx-auto">
        <div class="justify-center flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4 lg:-mt-24 pt-5 lg:pt-0">
            <div class="flex flex-wrap">
              <div
                class="w-full lg:w-4/12 px-4 mt-10 lg:mt-0"
                v-for="(candidate, i) in candidates"
                :key="i"
              >
                <div
                  class="
                    hover:mt-8
                    relative
                    flex flex-col
                    min-w-0
                    break-words
                    bg-white
                    w-full
                    mb-6
                    shadow-lg
                    rounded-lg
                    ease-linear
                    transition-all
                    duration-150
                    mt-10
                  "
                >
                  <div
                    class="
                      align-middle
                      border-none
                      max-w-full
                      h-auto
                      rounded-lg
                    "
                  >
                    <div
                      class="
                        relative
                        flex flex-col
                        min-w-0
                        break-words
                        w-full
                        mb-6
                      "
                    >
                        <div class="absolute overflow-hidden w-full rounded-lg">
                          <p class="text-9xl font-extrabold text-amber-100 opacity-60 relative text-right" style="right:-17px;top:-25px">{{ candidate.no }}</p>
                        </div>

                      <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                          <div
                            class="
                              w-full
                              lg:w-3/12
                              px-4
                              lg:order-2
                              flex
                              justify-center
                            "
                          >
                            <div class="relative">
                              <img
                                alt="..."
                                :src="candidate.profile_picture"
                                class="
                                  candidate-image
                                  shadow-xl
                                  rounded-full
                                  h-auto
                                  align-middle
                                  border-none
                                  absolute
                                  -m-16
                                  -ml-20
                                  lg:-ml-16
                                  max-w-150-px
                                  bg-white
                                "
                              />
                            </div>
                          </div>
                        </div>
                        <div class="text-center mt-32">
                          <h3
                            class="
                              text-xl
                              font-semibold
                              leading-normal
                              text-blueGray-700
                              mb-2
                            "
                          >
                            {{ candidate.name }}
                          </h3>
                          <div
                            class="
                              text-sm
                              leading-normal
                              mt-0
                              mb-2
                              text-blueGray-400
                              font-bold
                              uppercase
                            "
                          >
                            <i
                              class="fas fa-university mr-2 text-blueGray-400"
                            ></i>
                            {{ candidate.class }}
                          </div>
                        </div>
                        <button
                          class="
                            mt-3
                            w-full
                            text-orange-500
                            bg-transparent
                            border border-solid border-orange-500
                            active:bg-orange-500
                            font-bold
                            uppercase
                            text-sm
                            px-6
                            py-3
                            rounded-md
                            outline-none
                            focus:outline-none
                            mr-1
                            mb-1
                            ease-linear
                            transition-all
                            duration-150
                          "
                          type="button"
                          data-micromodal-trigger="visi-misi"
                          @click="candidateOpen(i)"
                        >
                          Lihat Visi & Misi
                        </button>
                        <button
                          class="
                            mt-3
                            w-full
                            font-bold
                            uppercase
                            text-sm
                            px-6
                            py-3
                            rounded-md
                            shadow
                            hover:shadow-lg
                            outline-none
                            focus:outline-none
                            mr-1
                            mb-1
                            ease-linear
                            transition-all
                            duration-150
                          "
                          :class="(already_voted.length != 0 || !voting_date.is_open) ? 'bg-blueGray-200 text-gray-500' : 'bg-yellow-400 text-white hover:bg-yellow-500 active:bg-yellow-600'"
                          :disabled="(already_voted.length != 0 || !voting_date.is_open)"
                          type="button"
                          data-micromodal-trigger="pilih-data"
                          @click="candidateOpen(i)"
                        >
                          Pilih
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal micromodal-slide" id="visi-misi" aria-hidden="true" tabindex="-1" data-micromodal-close>
              <div class="modal__overlay">
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="visi-misi-title">
                  <header class="modal__header">
                    <h2 class="modal__title" id="visi-misi-title">
                      {{ candidate.name }}
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                  </header>
                  <main class="modal__content" id="visi-misi-content">
                    <h3 class="text-lg font-semibold text-gray-500 tracking-wide">Visi :</h3>
                    <p v-html="candidate.visi" class="text-sm">
                    </p>
                      
                    <h3 class="text-lg font-semibold text-gray-500 tracking-wide mt-4">Misi :</h3>
                    <p v-html="candidate.misi" class="text-sm">
                      {{ candidate.misi }}
                    </p>
                  </main>
                </div>
              </div>
            </div>
            <div class="modal micromodal-slide" id="pilih-data" aria-hidden="true" tabindex="-1" data-micromodal-close>
              <div class="modal__overlay">
                <div class="modal__container max-w-xs" role="dialog" aria-modal="true" aria-labelledby="visi-misi-title">
                  <header class="modal__header">
                    <h2 class="modal__title" id="visi-misi-title">
                      Tetapkan pilihan mu
                    </h2>
                  </header>
                  <main class="modal__content" id="visi-misi-content">
                    <p>
                      Yakin ingin memilih <b>{{ candidate.name }}</b> dengan nomor urut <b>{{ candidate.no }}</b>
                    </p>
                  </main>
                  <footer class="modal__footer flex justify-end mt-7">
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                    <button @click="openSubmitData(candidate.id)" class="modal__btn bg-blue-500 hover:bg-blue-600 text-white ml-2" type="submit">Continue</button>
                  </footer>
                </div>
              </div>
            </div>
            <div class="modal micromodal-slide" id="already-voted" aria-hidden="false" tabindex="-1" data-micromodal-close>
              <div class="modal__overlay">
                <div class="modal__container max-w-xs" role="dialog" aria-modal="true" aria-labelledby="visi-misi-title">
                  <header class="modal__header flex justify-center">
                    <i class="fas fa-check text-4xl p-7 border-[1px] rounded-full text-green-400"></i>
                  </header>
                  <main class="modal__content" id="visi-misi-content">
                    <h2 class="modal__title" id="visi-misi-title">
                      Terimakasih sudah memilih
                    </h2>
                  </main>
                  <footer class="modal__footer flex justify-end mt-7">
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                    <button @click="logout()" class="modal__btn bg-red-500 hover:bg-red-600 text-white ml-2" type="submit">Logout</button>
                  </footer>
                </div>
              </div>
            </div>
            <div class="modal micromodal-slide" id="voting-date-info" aria-hidden="false" tabindex="-1" data-micromodal-close>
              <div class="modal__overlay">
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="visi-misi-title">
                  <header class="modal__header flex justify-center">
                    <h2 class="modal__title" id="visi-misi-title">
                      E-Voting belum dibuka
                    </h2>
                  </header>
                  <main class="modal__content" id="visi-misi-content">
                    <h3 class="text-lg font-semibold text-gray-500 tracking-wide">Jadwal E-Voting:</h3>
                    <p class="text-sm">Buka : {{ showDate(voting_date.start_date) }}</p>
                    <p class="text-sm">Tutup : {{ showDate(voting_date.end_date) }}</p>
                  </main>
                  <footer class="modal__footer flex justify-end mt-7">
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                    <button @click="logout()" class="modal__btn bg-red-500 hover:bg-red-600 text-white ml-2" type="submit">Logout</button>
                  </footer>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </Homepage>
</template>

<script>
import Homepage from "../layouts/Homepage";
export default {
  props: ["csrf_token", "user", "candidates", "already_voted", "voting_date"],
  components: { Homepage },
  data: () => ({
    candidate: {},
    selected_id: null
  }),
  mounted() {
    MicroModal.init({
        awaitCloseAnimation: true,
    });
    if (this.already_voted.length != 0) 
      MicroModal.show('already-voted');
    if (!this.voting_date.is_open)
      MicroModal.show('voting-date-info'); 
  },
  methods: {
    showDate(val) {
      const weekday = ["Minggu","Senin","Selasa","Rabu","Kamis","Sabtu","Minggu"];
      const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember"];

      let date_value = new Date(val)

      let day = weekday[date_value.getDay()]
      let date = date_value.getDate()
      let month = monthName[date_value.getMonth()]
      let year = date_value.getFullYear()
      let clock = date_value.toLocaleTimeString()
      return day + ', ' + date + ' ' + month + ' ' + year + ' ' + clock
    },
    logout() {
      this.$inertia.post('/evoting/logout', {
        admin: false,
        _token: this.csrf_token
      });
    },
    candidateOpen(i) {
      this.candidate = this.candidates[i]
    },
    openSubmitData(id) {
      // console.log(id, this.candidates.findIndex(val => val.id === id));
      this.$inertia.post('/evoting/vote', {
        user_id: this.user.id,
        candidate_id: id,
        device: navigator.platform + ' - ' + navigator.userAgent,
        _token: this.csrf_token
      });

      MicroModal.close('pilih-data');
      MicroModal.show('already-voted');
    }
  }
};
</script>

<style>
.modal {
  display: none;
}

.modal.is-open {
  display: block;
}
</style>
<template>
  <Homepage title="Home" :csrf_token="csrf_token">
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
                v-for="i in 3"
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
                          <p class="text-9xl font-extrabold text-amber-100 opacity-60 relative text-right" style="right:-17px;top:-25px">{{ i }}</p>
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
                                src="/assets/img/team-2-800x800.jpg"
                                class="
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
                            ==NAMA==
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
                            ==KELAS==
                          </div>
                        </div>
                        <button
                          class="
                            mt-3
                            w-full
                            text-yellow-500
                            bg-transparent
                            border border-solid border-yellow-500
                            hover:bg-yellow-400 hover:text-white
                            active:bg-yellow-500
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
                          data-micromodal-trigger="modal-1"
                        >
                          Lihat Visi & Misi
                        </button>
                        <button
                          class="
                            mt-3
                            w-full
                            bg-amber-500
                            text-white
                            hover:bg-amber-400
                            active:bg-amber-600
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
                          type="button"
                        >
                          Pilih
                        </button>
                        <!-- <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                              <h3>Visi :</h3>
                                <p class="mb-4 text-sm leading-relaxed text-blueGray-700">
                                  An artist of considerable range, Jenna the name taken by
                                  Melbourne-raised, Brooklyn-based Nick Murphy writes,
                                  performs and records all of his own music, giving it a
                                  warm, intimate feel with a solid groove structure. An
                                  artist of considerable range.
                                </p>
                              </div>
                            </div>
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                              <h3>Misi :</h3>
                                <p class="mb-4 text-sm leading-relaxed text-blueGray-700">
                                  An artist of considerable range, Jenna the name taken by
                                  Melbourne-raised, Brooklyn-based Nick Murphy writes,
                                  performs and records all of his own music, giving it a
                                  warm, intimate feel with a solid groove structure. An
                                  artist of considerable range.
                                </p>
                              </div>
                            </div>
                          </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
              <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                  <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                      Micromodal
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                  </header>
                  <main class="modal__content" id="modal-1-content">
                    <p>
                      Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                    </p>
                  </main>
                  <footer class="modal__footer">
                    <button class="modal__btn modal__btn-primary">Continue</button>
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
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
  props: ["csrf_token", "user"],
  components: { Homepage },
  mounted() {
    MicroModal.init({
        awaitCloseAnimation: true,
    });
  },
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
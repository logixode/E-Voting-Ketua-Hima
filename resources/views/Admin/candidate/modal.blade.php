<div class="modal micromodal-slide" id="add-candidate" aria-hidden="true" tabindex="-1" data-micromodal-close>
  <div class="modal__overlay">
    <div class="modal__container min-w-[350px]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          Tambah Kandidat
        </h2>
      </header>
      <main class="modal__content" id="modal-1-content">
        <form action="./candidate" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 pt-0">
            <label for="no" class="text-sm font-semibold text-gray-500 tracking-wide">Nomor Urut</label>
            <input type="number" name="no" id="no" placeholder="Nomor Urut" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
          </div>
          <div class="mb-3 pt-0">
            <label for="name" class="text-sm font-semibold text-gray-500 tracking-wide">Nama</label>
            <input type="text" name="name" id="name" placeholder="Nama" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
          </div>
          <div class="mb-3 pt-0">
            <label for="class" class="text-sm font-semibold text-gray-500 tracking-wide">Kelas</label>
            <select type="text" name="class" id="class" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required>
              <option selected disabled hidden>Kelas</option>
              <option value="1A">1A</option>
              <option value="1B">1B</option>
              <option value="1C">1C</option>
              <option value="1D">1D</option>
              <option value="1E">1E</option>
              <option value="1F">1F</option>
              <option value="1G">1G</option>
              <option value="2A">2A</option>
              <option value="2B">2B</option>
              <option value="2C">2C</option>
              <option value="2D">2D</option>
              <option value="2E">2E</option>
              <option value="2F">2F</option>
              <option value="2G">2G</option>
              <option value="3A">3A</option>
              <option value="3B">3B</option>
              <option value="3C">3C</option>
              <option value="3D">3D</option>
              <option value="3E">3E</option>
              <option value="3F">3F</option>
            </select>
          </div>
          <div class="mb-3 pt-0">
            <div class="grid grid-cols-1 space-y-2">
              <label for="profile_picture" class="text-sm font-semibold text-gray-500 tracking-wide">Foto</label>
              <img src="" id="image" class="rounded-lg border-4 border-dashed w-full p-5" style="display: none;">
              <div class="flex items-center justify-center w-full">
                <label for="profile_picture" class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                  <div class="h-full w-full text-center flex flex-col items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here <br /> or <label for="profile_picture" class="text-blue-600 hover:underline cursor-pointer">select an image file</label> from your computer</p>
                  </div>
                  <input type="file" accept="image/*"  class="hidden" name="profile_picture" id="profile_picture" onchange="loadImage(event)" required>
                </label>
              </div>
            </div>
            <p class="text-sm text-gray-300">
              <span>File type: jpeg, jpg, and png</span>
            </p>
          </div>
          <div class="mb-3 pt-0">
            <label for="visi" class="text-sm font-semibold text-gray-500 tracking-wide">Visi</label>
            <textarea name="visi" id="visi" placeholder="Visi" cols="30" rows="10" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full"></textarea>
          </div>
          <div class="mb-3 pt-0">
            <label for="misi" class="text-sm font-semibold text-gray-500 tracking-wide">Misi</label>
            <textarea name="misi" id="misi" placeholder="Misi" cols="30" rows="10" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full"></textarea>
          </div>
          <div class="flex justify-end mt-4">
            <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
            <button class="modal__btn bg-blue-500 hover:bg-blue-600 text-white ml-2" type="submit">Continue</button>
          </div>
        </form>
      </main>
    </div>
  </div>
</div>
<div class="modal micromodal-slide" id="edit-candidate" aria-hidden="true" tabindex="-1" data-micromodal-close>
  <div class="modal__overlay">
    <div class="modal__container min-w-[350px]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          Tambah Kandidat
        </h2>
      </header>
      <main class="modal__content" id="modal-1-content">
        <form action="./candidate" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3 pt-0">
            <label for="no" class="text-sm font-semibold text-gray-500 tracking-wide">Nomor Urut</label>
            <input type="number" name="no" id="no" placeholder="Nomor Urut" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
          </div>
          <div class="mb-3 pt-0">
            <label for="name" class="text-sm font-semibold text-gray-500 tracking-wide">Nama</label>
            <input type="text" name="name" id="name" placeholder="Nama" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
          </div>
          <div class="mb-3 pt-0">
            <label for="class" class="text-sm font-semibold text-gray-500 tracking-wide">Kelas</label>
            <select type="text" name="class" id="class" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required>
              <option selected disabled hidden>Kelas</option>
              <option value="1A">1A</option>
              <option value="1B">1B</option>
              <option value="1C">1C</option>
              <option value="1D">1D</option>
              <option value="1E">1E</option>
              <option value="1F">1F</option>
              <option value="1G">1G</option>
              <option value="2A">2A</option>
              <option value="2B">2B</option>
              <option value="2C">2C</option>
              <option value="2D">2D</option>
              <option value="2E">2E</option>
              <option value="2F">2F</option>
              <option value="2G">2G</option>
              <option value="3A">3A</option>
              <option value="3B">3B</option>
              <option value="3C">3C</option>
              <option value="3D">3D</option>
              <option value="3E">3E</option>
              <option value="3F">3F</option>
            </select>
          </div>
          <div class="mb-3 pt-0">
            <div class="grid grid-cols-1 space-y-2">
              <label for="profile_picture" class="text-sm font-semibold text-gray-500 tracking-wide">Foto</label>
              <img src="" id="image-candidate" class="rounded-lg border-4 border-dashed w-full p-5">
              
              <input type="text" class="hidden" name="profile_picture" id="profile_picture" required>
            </div>
          </div>
          <div class="mb-3 pt-0">
            <label for="visi" class="text-sm font-semibold text-gray-500 tracking-wide">Visi</label>
            <textarea name="visi" id="visi" placeholder="Visi" cols="30" rows="10" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full"></textarea>
          </div>
          <div class="mb-3 pt-0">
            <label for="misi" class="text-sm font-semibold text-gray-500 tracking-wide">Misi</label>
            <textarea name="misi" id="misi" placeholder="Misi" cols="30" rows="10" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full"></textarea>
          </div>
          <div class="flex justify-end mt-4">
            <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
            <button class="modal__btn bg-blue-500 hover:bg-blue-600 text-white ml-2" type="submit">Continue</button>
          </div>
        </form>
      </main>
    </div>
  </div>
</div>
<div class="modal micromodal-slide" id="delete-candidate" aria-hidden="true" tabindex="-1" data-micromodal-close>
  <div class="modal__overlay">
    <div class="modal__container min-w-[350px]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          Delete Kandidat
        </h2>
      </header>
      <main class="modal__content" id="modal-1-content">
        <form action="./candidate" method="post">
          @csrf
          @method('DELETE')
          <p>Yakin ingin menghapus Kandidat dengan Nama: <span id="delete-candidate-id" class="text-red-500"></span>?</p>
          <div class="flex justify-end mt-4">
            <button class="modal__btn bg-blue-500 hover:bg-blue-600 text-white" data-micromodal-close aria-label="Close this dialog window">Cancel</button>
            <button class="modal__btn bg-red-500 hover:bg-red-600 text-white ml-2" type="submit">Delete</button>
          </div>
        </form>
      </main>
    </div>
  </div>
</div>
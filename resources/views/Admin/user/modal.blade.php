  <div class="modal micromodal-slide" id="add-user" aria-hidden="true" tabindex="-1" data-micromodal-close>
    <div class="modal__overlay">
      <div class="modal__container min-w-[350px]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Tambah User
          </h2>
        </header>
        <main class="modal__content" id="modal-1-content">
          <form action="./user" method="post">
            @csrf
            <div class="mb-3 pt-0">
              <label for="username" class="text-sm font-semibold text-gray-500 tracking-wide">NIM</label>
              <input type="text" name="username" id="username" placeholder="NIM" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
            </div>
            <div class="mb-3 pt-0">
              <label for="name" class="text-sm font-semibold text-gray-500 tracking-wide">Nama</label>
              <input type="text" name="name" id="name" placeholder="Nama" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
            </div>
            <div class="mb-3 pt-0">
              <label for="class" class="text-sm font-semibold text-gray-500 tracking-wide">Kelas</label>
              <select type="text" name="class" id="class" class="px-2 py-1 text-blueGray-300 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required>
                <option selected disabled hidden>Pilih Kelas</option>
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
              <label for="email" class="text-sm font-semibold text-gray-500 tracking-wide">Email</label>
              <input type="email" name="email" id="email" placeholder="Email" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
            </div>
            <div class="mb-3 pt-0">
              <label for="password" class="text-sm font-semibold text-gray-500 tracking-wide">Password</label>
              <div class="flex">
                <input type="text" name="password" id="password" placeholder="Password" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline flex-1" required />
                <button 
                  onclick="generatePassword(this)"
                  class="btn ml-2
                  text-green-500
                  bg-transparent
                  border border-solid border-green-500
                  hover:bg-green-500 hover:text-white
                  active:bg-green-500" 
                  type="button"
                >Generate</button>
              </div>
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
  <div class="modal micromodal-slide" id="edit-user" aria-hidden="true" tabindex="-1" data-micromodal-close>
    <div class="modal__overlay">
      <div class="modal__container min-w-[350px]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Edit User
          </h2>
        </header>
        <main class="modal__content" id="modal-1-content">
          <form action="./user" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 pt-0">
              <label for="username" class="text-sm font-semibold text-gray-500 tracking-wide">NIM</label>
              <input type="text" name="username" id="username" placeholder="NIM" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
            </div>
            <div class="mb-3 pt-0">
              <label for="name" class="text-sm font-semibold text-gray-500 tracking-wide">Nama</label>
              <input type="text" name="name" id="name" placeholder="Nama" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
            </div>
            <div class="mb-3 pt-0">
              <label for="class" class="text-sm font-semibold text-gray-500 tracking-wide">Kelas</label>
              <select type="text" name="class" id="class" class="px-2 py-1 text-blueGray-300 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required>
                <option selected disabled hidden>Pilih Kelas</option>
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
              <label for="email" class="text-sm font-semibold text-gray-500 tracking-wide">Email</label>
              <input type="email" name="email" id="email" placeholder="Email" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full" required />
            </div>
            <div class="mb-3 pt-0">
              <label for="password" class="text-sm font-semibold text-gray-500 tracking-wide">Password</label>
              <div class="flex">
                <input type="text" name="password" id="password" placeholder="Password" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline flex-1" required />
                <button 
                  onclick="generatePassword(this)"
                  class="btn ml-2
                  text-green-500
                  bg-transparent
                  border border-solid border-green-500
                  hover:bg-green-500 hover:text-white
                  active:bg-green-500" 
                  type="button"
                >Generate</button>
              </div>
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
  <div class="modal micromodal-slide" id="delete-user" aria-hidden="true" tabindex="-1" data-micromodal-close>
    <div class="modal__overlay">
      <div class="modal__container min-w-[350px]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Delete User
          </h2>
        </header>
        <main class="modal__content" id="modal-1-content">
          <form action="./user" method="post">
            @csrf
            @method('DELETE')
            <p>Yakin ingin menghapus User dengan NIM: <span id="delete-user-id" class="text-red-500"></span>?</p>
            <div class="flex justify-end mt-4">
              <button class="modal__btn bg-blue-500 hover:bg-blue-600 text-white" data-micromodal-close aria-label="Close this dialog window">Cancel</button>
              <button class="modal__btn bg-red-500 hover:bg-red-600 text-white ml-2" type="submit">Delete</button>
            </div>
          </form>
        </main>
      </div>
    </div>
  </div>
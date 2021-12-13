@extends('layouts/dashboard')

@section('body')
<div class="w-full xl:mb-0 px-4">

  <div class="flex mb-3 justify-between">
    <div class="relative z-2">
      <button class="btn bg-blue-500 hover:bg-blue-600 text-white mr-2" data-micromodal-trigger="add-user">
        <i class="fas fa-plus mr-2 text-sm"></i>
        Tambah User
      </button>
      <button class="btn bg-teal-500 hover:bg-teal-600 text-white" data-micromodal-trigger="upload-user">
        <i class="fas fa-upload mr-2 text-sm"></i>
        Upload Data Excel
      </button>
    </div>

    <div class="relative z-2">
      <button class="btn bg-orange-500 hover:bg-orange-600 text-white">
        <i class="fas fa-envelope mr-2 text-sm"></i>
        Kirim Data ke Email
      </button>
    </div>
  </div>

  <!-- modal -->
  @include('Admin.user.modal')

  <!-- alert -->
  @if(isset($message))
  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-amber-500 flex items-center">
    <span class="text-xl align-middle mr-5">
      <i class="fas fa-exclamation-circle"></i>
    </span>
    <span class="align-middle">
      {{ $message }}
    </span>
  </div>
  @endif
  
  @if(session('success'))
  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 flex items-center">
    <span class="text-xl align-middle mr-5">
      <i class="fas fa-exclamation-circle"></i>
    </span>
    <span class="align-middle">
      {{ session('success') }}
    </span>
  </div>
  @endif

  @if($errors->any())
  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500 flex items-center">
    <span class="text-xl align-middle mr-5">
      <i class="fas fa-exclamation-circle"></i>
    </span>
    <div class="align-middle">
      @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
      @endforeach
    </div>
  </div>
  @endif

  <div class="relative flex flex-col overflow-x-auto min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    <div class="rounded-t px-2 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-base text-blueGray-700">
            Data User
          </h3>
        </div>
      </div>
    </div>
    <hr>
    <div class="block w-full overflow-x-auto py-3">
      <table id="user-table" class="hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
          <tr>
            <th data-priority="1">No</th>
            <th data-priority="2">NIM</th>
            <th data-priority="3">Nama Lengkap</th>
            <th data-priority="4">Kelas</th>
            <th data-priority="5">Email</th>
            <th data-priority="6"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $user)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->class }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <button 
                class="btn bg-amber-500 hover:bg-amber-600 text-white mr-2 mb-1 button-edit" 
                data-id="{{ $user->id }}"
                data-username="{{ $user->username }}"
                data-name="{{ $user->name }}"
                data-class="{{ $user->class }}"
                data-email="{{ $user->email }}"
                onclick="editUser(this)"
              >
                <i class="fas fa-pen mr-2 text-sm"></i>
                Edit
              </button>
              <button 
                class="btn bg-red-500 hover:bg-red-600 text-white" 
                onclick="deleteUser(this)" 
                data-id="{{ $user->id }}"
                data-nim="{{ $user->username }}"
              >
                <i class="fas fa-trash-alt mr-2 text-sm"></i>
                Hapus
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
    </div>
  </div>
</div>
<div class="w-full pb-4">
  @isset($msg)
  {{ $msg }}
  @endisset
  <form action="/evoting/send_mail" method="get">
    <input type="text" name="to" placeholder="email">
    <button type="submit">submit</button>
  </form>
</div>

<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script>
  $(document).ready(function() {

    MicroModal.init({
      awaitCloseAnimation: true,
    });
    var table = $('#user-table').DataTable({
        responsive: true
      })
      .columns.adjust()
      .responsive.recalc();

  });

  function generatePassword(elem) {
    $(elem).parent().children('input[name="password"]').val(Math.random().toString(36).slice(7))
  }
  function deleteUser(elem) {
    let id = $(elem).data('id')
    let nim = $(elem).data('nim')
    
    let form_delete = $('#delete-user form')
    form_delete.attr('action', './user/' + id)

    form_delete.children().children('p #delete-user-id').text(nim)

    MicroModal.show('delete-user')
  }
  function editUser(elem) {
    let data = {
      id: $(elem).data('id'),
      username: $(elem).data('username'),
      name: $(elem).data('name'),
      class: $(elem).data('class'),
      email: $(elem).data('email')
    } 

    let form_edit = $('#edit-user form')
    form_edit.attr('action', './user/' + data.id)
    form_edit.children('div').children('[name="username"]').val(data.username)
    form_edit.children('div').children('[name="name"]').val(data.name)
    form_edit.children('div').children('[name="class"]').val(data.class)
    form_edit.children('div').children('[name="email"]').val(data.email)

    MicroModal.show('edit-user')
  }
</script>
@endsection
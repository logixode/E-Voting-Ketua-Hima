@extends('layouts/dashboard')

@section('body')
<div class="w-full xl:mb-0 px-4">
  <div class="relative z-10 mb-3">
    <button class="btn bg-blue-500 hover:bg-blue-600 text-white" data-micromodal-trigger="add-candidate">
      <i class="fas fa-plus mr-2 text-sm"></i>
      Tambah Data Kandidat
    </button>
  </div>

  <!-- modal -->
  @include('Admin.candidate.modal')

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
            Data Kandidat
          </h3>
        </div>
      </div>
    </div>
    <hr>
    <div class="block w-full overflow-x-auto py-3">
      <table id="candidate-table" class="hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
          <tr>
            <th data-priority="1">No</th>
            <th data-priority="3">Nama</th>
            <th data-priority="4">Kelas</th>
            <th data-priority="2">Foto</th>
            <th data-priority="5">Visi</th>
            <th data-priority="5">Misi</th>
            <th data-priority="6" class="w-[100px]"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($candidates as $key => $candidate)
          <tr>
            <td>{{ $candidate->no }}</td>
            <td>{{ $candidate->name }}</td>
            <td>{{ $candidate->class }}</td>
            <td><img src="{{ $candidate->profile_picture }}" class="w-36 rounded"></td>
            <td class="max-w-210-px whitespace-normal">
              {!! $candidate->visi !!}
            </td>
            <td class="max-w-210-px whitespace-normal">
              {!! $candidate->misi !!}
            </td>
            <td>
              <button 
                class="btn bg-amber-500 hover:bg-amber-600 text-white mr-2 mb-1 button-edit" 
                data-id="{{ $candidate->id }}" 
                data-no="{{ $candidate->no }}" 
                data-name="{{ $candidate->name }}" 
                data-class="{{ $candidate->class }}" 
                data-profile_picture="{{ $candidate->profile_picture }}" 
                data-visi="{!! $candidate->visi !!}" 
                data-misi="{!! $candidate->misi !!}" 
                onclick="editCandidate(this)"
              >
                <i class="fas fa-pen mr-2 text-sm"></i>
                Edit
              </button>
              <button 
                class="btn bg-red-500 hover:bg-red-600 text-white" 
                onclick="deleteCandidate(this)" 
                data-id="{{ $candidate->id }}" 
                data-name="{{ $candidate->name }}"
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

<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script>
  $(document).ready(function() {

    MicroModal.init({
      awaitCloseAnimation: true,
    });

    var table = $("#candidate-table").DataTable({
        responsive: true
      })
      .columns.adjust()
      .responsive.recalc()
  });


  function loadImage(event) {
    let image = document.getElementById('image')
    image.src = URL.createObjectURL(event.target.files[0])
    $(image).css('display', 'flex')
  }
  function deleteCandidate(elem) {
    let id = $(elem).data('id')
    let name = $(elem).data('name')
    
    let form_delete = $('#delete-candidate form')
    form_delete.attr('action', './candidate/' + id)

    form_delete.children().children('p #delete-candidate-id').text(name)

    MicroModal.show('delete-candidate')
  }
  function editCandidate(elem) {
    let data = {
      id: $(elem).data('id'),
      no: $(elem).data('no'),
      name: $(elem).data('name'),
      class: $(elem).data('class'),
      profile_picture: $(elem).data('profile_picture'),
      visi: $(elem).data('visi'),
      misi: $(elem).data('misi')
    } 
    console.log(data);

    let form_edit = $('#edit-candidate form')
    form_edit.attr('action', './candidate/' + data.id)
    form_edit.children('div').children('[name="no"]').val(data.no)
    form_edit.children('div').children('[name="name"]').val(data.name)
    form_edit.children('div').children('[name="class"]').val(data.class)
    $('#edit-candidate form .grid>[name="profile_picture"]').val(data.profile_picture)
    form_edit.children('div').children('[name="visi"]').val(data.visi)
    form_edit.children('div').children('[name="misi"]').val(data.misi)
    $('#edit-candidate form .grid>#image-candidate').attr('src', data.profile_picture)

    MicroModal.show('edit-candidate')
  }
</script>
@endsection
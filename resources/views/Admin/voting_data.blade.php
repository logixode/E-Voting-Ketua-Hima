@extends('layouts/dashboard')

@section('body')
<div class="w-full pb-4">
  <div>
    <!-- Card stats -->
    <div class="flex flex-wrap">
      <div class="w-full lg:w-4/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap">
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                  Kandidat 1
                </h5>
                <span class="font-semibold text-xl text-blueGray-700">
                  35%
                </span>
              </div>
              <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                  <i class="fas fa-user-tie"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-4/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap">
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                  Kandidat 2
                </h5>
                <span class="font-semibold text-xl text-blueGray-700">
                  2,3%
                </span>
              </div>
              <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                  <i class="fas fa-user-tie"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-4/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap">
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                  Kandidat 3
                </h5>
                <span class="font-semibold text-xl text-blueGray-700">
                  9%
                </span>
              </div>
              <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                  <i class="fas fa-user-tie"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="w-full xl:mb-0 px-4">
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    <div class="rounded-t px-2 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-base text-blueGray-700">
            Devices yang digunakan User
          </h3>
        </div>
      </div>
    </div>
    <hr>
    <div class="block w-full overflow-x-auto py-3">
      <table id="table" class="hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
          <tr>
            <th data-priority="1">No</th>
            <th data-priority="2">User ID</th>
            <th data-priority="3">Device</th>
            <th data-priority="4">Pilihan Suara</th>
            <th data-priority="5">Waktu</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($voting_data as $key => $data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->user_id }}</td>
            <td>{{ $data->candidate_id }}</td>
            <td>{{ $data->device }}</td>
            <td>{{ $data->timestamp }}</td>
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
    
    var table = $('#table').DataTable( {
        responsive: true
      } )
      .columns.adjust()
      .responsive.recalc();
  } );

</script>
@endsection
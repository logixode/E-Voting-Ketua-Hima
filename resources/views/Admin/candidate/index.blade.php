@extends('layouts/dashboard')

@section('body')
  <div class="w-full xl:mb-0 px-4">
    <div class="relative z-10 float-left mb-3">
      <button class="btn bg-blue-500 hover:bg-blue-600 text-white">
        <i class="fas fa-plus mr-2 text-sm"></i>
        Tambah Data Kandidat
      </button>
    </div>
    <!-- <div class="relative z-10 float-right mb-3">
      <button class="btn bg-orange-500 hover:bg-orange-600 text-white">
        <i class="fas fa-envelope mr-2 text-sm"></i>
        Kirim Data ke Email
      </button>
    </div> -->
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
        <table id="table" class="hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
            </tr>
            
            <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
            
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
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
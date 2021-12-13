@extends('layouts/dashboard')

@section('body')
<div class="w-full pb-4">
  <div>
    <!-- Card stats -->
    <div class="flex flex-wrap">
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap">
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                  Total User
                </h5>
                <span class="font-semibold text-xl text-blueGray-700">
                  {{ $total_user }}
                </span>
              </div>
              <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                  <i class="fas fa-user-alt"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap">
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                  Kandidat
                </h5>
                <span class="font-semibold text-xl text-blueGray-700">
                  {{ $total_candidate }}
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
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap">
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                  Total Suara
                </h5>
                <span class="font-semibold text-xl text-blueGray-700">
                  {{ $total_voting_data }}
                </span>
              </div>
              <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                  <i class="fas fa-poll"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap">
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                  Golput
                </h5>
                <span class="font-semibold text-xl text-blueGray-700">
                  {{ $golput }}%
                </span>
              </div>
              <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                  <i class="fas fa-user-alt-slash"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="flex flex-wrap mt-4">
  <div class="w-full xl:w-8/12 xl:mb-0 px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
      <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h2 class="text-white text-xl font-semibold">
              Perolehan Suara
            </h2>
          </div>
        </div>
      </div>
      <div class="p-4 flex-auto">
        <!-- Chart -->
        <div class="relative h-350-px">
          <canvas id="line-chart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="w-full xl:w-4/12 px-4">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded pb-4">
      <div class="rounded-t mb-0 px-5 py-3 border-0">
        <div class="flex flex-wrap items-center py-2">
          <h3 class="font-semibold text-xl text-blueGray-700 flex-1">
            Presentase Golput
          </h3>
        </div>
      </div>
      <div class="block w-full overflow-y-auto h-350-px">
        <!-- Projects table -->
        <table class="items-center w-full bg-transparent border-collapse">
          <thead class="thead-light">
            <tr>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Kelas
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Golput
              </th>
            </tr>
          </thead>
          <tbody class="mt-1">
            <tr>
              <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                Facebook
              </th>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                <div class="flex items-center">
                  <span class="mr-2">60%</span>
                  <div class="relative w-full">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                      <div style="width: 60%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                Facebook
              </th>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                <div class="flex items-center">
                  <span class="mr-2">70%</span>
                  <div class="relative w-full">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-emerald-200">
                      <div style="width: 70%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"></div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                Google
              </th>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                <div class="flex items-center">
                  <span class="mr-2">80%</span>
                  <div class="relative w-full">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200">
                      <div style="width: 80%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500"></div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                Instagram
              </th>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                <div class="flex items-center">
                  <span class="mr-2">75%</span>
                  <div class="relative w-full">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-lightBlue-200">
                      <div style="width: 75%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-lightBlue-500"></div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                twitter
              </th>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                <div class="flex items-center">
                  <span class="mr-2">30%</span>
                  <div class="relative w-full">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-orange-200">
                      <div style="width: 30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"></div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="flex flex-wrap mt-4">
  <div class="w-full xl:mb-0 px-4">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
      <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full px-4 max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-base text-blueGray-700">
              Devices yang digunakan
            </h3>
          </div>
          <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
            <a href="/evoting/admin/voting_data" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
              See all
            </a>
          </div>
        </div>
      </div>
      <div class="block w-full overflow-x-auto">
        <!-- Projects table -->
        <table class="items-center w-full bg-transparent border-collapse">
          <thead>
            <tr>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                No
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                User ID
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Device
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Pilihan Suara
              </th>
              <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Waktu
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($voting_data as $key => $data)
              @if ($key >= 5)
                @continue
              @endif
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $data->user_id }}</td>
              <td>{{ $data->device }}</td>
              <td>{{ $data->candidate_id }}</td>
              <td>{{ $data->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
<?php $data_count = json_encode($data_count) ?>

<script>
  (function() {
    /* Chart initialisations */
    /* Line Chart */
    let data_count = JSON.parse('<?= $data_count ?>')
    
    var config = {
      type: "bar",
      data: {
        labels: [
          "",
        ],
        datasets: [
          {
            label: 'Nomor Urut 1',
            backgroundColor: "#F97316",
            borderColor: "#F97316",
            data: [data_count[1]],
            fill: false,
            minBarLength: 0,
          },
          {
            label: 'Nomor Urut 2',
            backgroundColor: "#1bf",
            borderColor: "#1bf",
            data: [data_count[2]],
            fill: false,
            minBarLength: 0,
          },
          {
            label: 'Nomor Urut 3',
            fill: false,
            backgroundColor: "#0fd",
            borderColor: "#0fd",
            data: [data_count[3]],
            minBarLength: 0,
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
          display: false,
          text: "Sales Charts",
          fontColor: "white",
        },
        legend: {
          labels: {
            fontColor: "white",
          },
          align: "end",
          position: "bottom",
        },
        tooltips: {
          mode: "index",
          intersect: false,
        },
        hover: {
          mode: "nearest",
          intersect: true,
        },
        scales: {
          xAxes: [{
            ticks: {
              fontColor: "rgba(255,255,255,.7)",
            },
            display: true,
            scaleLabel: {
              display: false,
              labelString: "Month",
              fontColor: "white",
            },
            gridLines: {
              display: false,
              borderDash: [2],
              borderDashOffset: [2],
              color: "rgba(33, 37, 41, 0.3)",
              zeroLineColor: "rgba(0, 0, 0, 0)",
              zeroLineBorderDash: [2],
              zeroLineBorderDashOffset: [2],
            },
          }, ],
          yAxes: [{
            ticks: {
              fontColor: "rgba(255,255,255,.7)",
              beginAtZero: true
            },
            display: true,
            scaleLabel: {
              display: false,
              labelString: "Value",
              fontColor: "white",
            },
            gridLines: {
              borderDash: [3],
              borderDashOffset: [3],
              drawBorder: false,
              color: "rgba(255, 255, 255, 0.15)",
              zeroLineColor: "rgba(33, 37, 41, 0)",
              zeroLineBorderDash: [2],
              zeroLineBorderDashOffset: [2],
            },
          }, ],
        },
      },
    };
    var ctx = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(ctx, config);
  })();
</script>
@endsection
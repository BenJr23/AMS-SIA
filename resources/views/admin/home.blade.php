<x-admin>
    <style>
        canvas {
            height: 200px;
            width: 100%;
        }
    </style>

    @auth
    <div class="bg-green-900 text-white rounded-xl p-6 w-[93%] mx-auto h-40 mt-10 flex items-center justify-between">
        <!-- Left Section: Text -->
        <div class="pl-20">
            <h2 class="text-4xl font-bold mt-1">Welcome to Presenza!</h2>
            <p class="mt-3">Unlock endless worlds of knowledge with a library designed <br>for effortless exploration and discovery.</p>
        </div>

        <!-- Right Section: Logo 
        <div class="pr-6">
            <img src="./images/2.png" alt="Presenza Logo" class="h-48 w-auto">
        </div>
        -->
    </div>



    <!-- Cards Section -->
    <div class="grid grid-cols-3 gap-6 mt-6 w-[93%] mx-auto">
        <div class="bg-white shadow-md p-6 text-center rounded-lg">
            <h3 class="text-xl font-semibold">Present</h3>
            <div class="mt-4">
                <canvas id="presentChart" class="mx-auto"></canvas>
            </div>
        </div>
        <div class="bg-white shadow-md p-6 text-center rounded-lg">
            <h3 class="text-xl font-semibold">Absent</h3>
            <div class="mt-4">
                <canvas id="absentChart" class="mx-auto"></canvas>
            </div>
        </div>
        <div class="bg-white shadow-md p-6 text-center rounded-lg">
            <h3 class="text-xl font-semibold">Visitors</h3>
            <div class="mt-4">
                <canvas id="visitorsChart" class="mx-auto"></canvas>
            </div>
        </div>
    </div>
    @endauth
</x-admin>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Present Chart
  const presentCtx = document.getElementById('presentChart').getContext('2d');
  new Chart(presentCtx, {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
      datasets: [{
        label: 'Present',
        data: [12, 19, 3, 5, 2],
        backgroundColor: 'rgba(75, 192, 192, 0.6)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
    }
  });

  // Absent Chart
  const absentCtx = document.getElementById('absentChart').getContext('2d');
  new Chart(absentCtx, {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
      datasets: [{
        label: 'Absent',
        data: [2, 3, 1, 4, 1],
        backgroundColor: 'rgba(255, 99, 132, 0.6)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
    }
  });

  // Visitors Chart
  const visitorsCtx = document.getElementById('visitorsChart').getContext('2d');
  new Chart(visitorsCtx, {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
      datasets: [{
        label: 'Visitors',
        data: [10, 15, 8, 13, 7],
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 2,
        fill: true,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
    }
  });
</script>

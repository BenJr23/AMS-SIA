

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
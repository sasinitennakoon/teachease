// ---------- CHARTS ----------
// Function to fetch data and render charts
function fetchDataAndRenderCharts(exam_id) {
    const url = `backend_endpoint.php?exam_id=${exam_id}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            renderGradeChart(data.grades);
            renderPassFailChart(data.pass_fail);
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Call the function with the exam_id
fetchDataAndRenderCharts('your_exam_id');

const barChartOptions = {
  series: [
    {
      data: grades.map(g => g.count),
      name: 'No of Students',
    },
  ],
  chart: {
    type: 'bar',
    background: 'transparent',
    height: 350,
    toolbar: {
      show: false,
    },
  },
  colors: ['#2962ff', '#d50000', '#2e7d32', '#ff6d00', '#583cb3'],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    },
  },
  dataLabels: {
    enabled: false,
  },
  fill: {
    opacity: 1,
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#f5f7ff',
    },
    show: true,
    position: 'top',
  },
  stroke: {
    colors: ['transparent'],
    show: true,
    width: 2,
  },
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'light',
  },
  xaxis: {
    categories: grades.map(g => g.grade),
    title: {
      style: {
        color: '#f5f7ff',
      },
    },
    axisBorder: {
      show: true,
      color: '#55596e',
    },
    axisTicks: {
      show: true,
      color: '#55596e',
    },
    labels: {
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: {
    title: {
      text: 'Count',
      style: {
        color: '#f5f7ff',
      },
    },
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      style: {
        colors: '#f5f7ff',
      },
    },
  },
};

const barChart = new ApexCharts(
  document.querySelector('#bar-chart'),
  barChartOptions
);
barChart.render();


var options = {
  series: pass_fail.map(pf => pf.count),
  labels: pass_fail.map(pf => pf.result),
  chart: {
    width: 500,
    type: 'pie',
    background: 'transparent',
  },
  colors: ['#d32f2f', '#4caf50'],
  legend: {
    position: 'left',
    labels: {
      colors: 'white',
    },
  },
  tooltip: {
    theme: 'dark',
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200,
      },
      legend: {
        position: 'left',
      },
      
    },
  }],
};


var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();




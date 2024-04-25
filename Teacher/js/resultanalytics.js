const barChartOptions = {
  series: [{
    data: ['4', '8', '10', '2', '1'],
    name: 'No of Students',
  }],
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
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'light',
  },
  xaxis: {
    categories: ['A', 'B', 'C', 'S', 'W'],
  },
  yaxis: {
    title: {
      text: 'Count',
    },
  },
};
const barChart = new ApexCharts(document.querySelector('#bar-chart'),barChartOptions);
barChart.render();

const pieChartOptions = {
  series: [10, 20],
  labels: ['Pass', 'Fail'],
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
const pieChart = new ApexCharts( document.querySelector('#pie-chart'), pieChartOptions);
    pieChart.render();
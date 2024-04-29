// Prepare data for the bar chart and count grades
const gradeCounts = grades.reduce((acc, grade) => {
    if (acc[grade]) {
      acc[grade]++;
    } else {
      acc[grade] = 1;
    }
    return acc;
  }, {});
  
  // Create arrays for categories and data
  const barChartCategories = Object.keys(gradeCounts);
  const barChartSeries = Object.values(gradeCounts);
  
  // Sort the categories and series based on the series (ascending)
  const sortedData = barChartCategories
    .map((category, index) => ({
      category,
      count: barChartSeries[index],
    }))
    .sort((a, b) => b.count - a.count); // Sort in ascending order
  
  // Extract sorted categories and series
  const sortedBarChartCategories = sortedData.map((item) => item.category);
  const sortedBarChartSeries = sortedData.map((item) => item.count);

const barChartOptions = {
  series: [{
      data: sortedBarChartSeries,
      name: 'No of Students',
      labels: {
        style: {
          colors: '#FFFFFF', // Set X-axis labels color to white
        },
      },
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
  xaxis: {
    categories: sortedBarChartCategories,
    labels: {
      style: {
        colors: '#FFFFFF', // Set X-axis labels color to white
      },
    },
  },
  yaxis: {
      title: {
          text: 'Count',
          style: {
            color: '#FFFFFF', 
          },
      },
      labels: {
        style: {
          colors: '#FFFFFF', // Set X-axis labels color to white
        },
      },
  },
  legend: {
    labels: {
      colors: '#FFFFFF', // This ensures the legend text color is white
    },
  },
};

const barChart = new ApexCharts(document.querySelector('#bar-chart'), barChartOptions);
barChart.render();

// Prepare data for the pie chart
const passFail = marks.reduce((acc, mark) => {
  if (mark >= 35) {
      acc.pass++;
  } else {
      acc.fail++;
  }
  return acc;
}, { pass: 0, fail: 0 });

const pieChartSeries = [passFail.pass, passFail.fail];

const pieChartOptions = {
  series: pieChartSeries,
  labels: ['Pass', 'Fail'],
  chart: {
      width: 500,
      type: 'pie',
      background: 'transparent',
  },
  colors: ['#4caf50', '#d32f2f'],
  legend: {
      position: 'left',
      labels: {
          colors: 'WHITE',
      },
  },
  tooltip: {
      theme: 'light',
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

const pieChart = new ApexCharts(document.querySelector('#pie-chart'), pieChartOptions);
pieChart.render();
// ---------- CHARTS ----------

var options = {
          series: [{
          name: "Grade 10",
          data: [
            [85, 90], [92, 78], [88, 85], [75, 60], [97, 92], [80, 75], [85, 80], [93, 88], [96, 92], [82, 78],
            [90, 85], [85, 70], [82, 78], [95, 75], [88, 85], [78, 80], [75, 70], [92, 88], [80, 92], [78, 78],
            [88, 75], [78, 70], [70, 65], [75, 90], [85, 75], [92, 78], [88, 80], [90, 85], [85, 70], [92, 78]]
        },{
          name: "Grade 11",
          data: [
            [75, 60], [78, 55], [80, 75], [85, 70], [75, 60], [88, 65], [80, 80], [78, 75], [82, 80], [75, 60],
            [78, 70], [88, 75], [75, 60], [82, 70], [75, 80], [60, 50], [65, 75], [80, 70], [75, 60], [82, 78],
            [70, 60], [85, 75], [78, 80], [60, 50], [75, 70], [75, 80], [70, 60], [78, 70], [80, 75], [75, 60]]
        }],
          chart: {
          height: 350,
          type: 'scatter',
          zoom: {
            enabled: true,
            type: 'xy'
          }
        },
        xaxis: {
          tickAmount: 10,
          title: {
            text: 'Student Attendance Percentage',
            style: { 
              color: '#FFFFFF' 
            }
          },
          labels: {
            formatter: function(val) {
              return parseFloat(val).toFixed(1)
            },
            style: {
              colors: 'rgba(244, 242, 246, 0.95)' 
            }
          }
        },
        yaxis: {
          tickAmount: 7,
          title: {
            text: 'Student Mark',
            style: { 
              color: '#FFFFFF' 
            }
          },
          labels: {
            style: {
              colors: 'rgba(244, 242, 246, 0.95)' 
            }
          }
        },
        
        legend: {
          labels: {
            colors: '#ffffff' // Set the font color of the legend labels to white
          }
        },
        tooltip: {
          shared: true,
          intersect: false,
          theme: 'dark',
        },
        };

        var chart = new ApexCharts(document.querySelector("#Scatterchart"), options);
        chart.render();
      

// AREA CHART
const areaChartOptions = {
  series:seriesData, 
  chart: {
    type: 'area',
    background: 'transparent',
    height: 350,
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  colors: ['#00ab57', '#d50000'],
  labels: labelData,
  dataLabels: {
    enabled: false,
  },
  fill: {
    gradient: {
      opacityFrom: 0.4,
      opacityTo: 0.1,
      shadeIntensity: 1,
      stops: [0, 100],
      type: 'vertical',
    },
    type: 'gradient',
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
  markers: {
    size: 5,
    strokeColors: '#1b2635',
    strokeWidth: 3,
  },
  stroke: {
    curve: 'smooth',
  },
  xaxis: {
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      offsetY: 5,
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: [
    {
      title: {
        text: 'Average Marks',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

const areaChart = new ApexCharts(
  document.querySelector('#area-chart'),
  areaChartOptions
);
areaChart.render();

// Earning

const attendanceChartOptions = {
  series: [
    {
      name: 'Grade 10',
      data: [92, 54, 73, 67, 84, 79, 80, 99, 61, 72, 59, 56],
    },
    {
      name: 'Grade 11',
      data: [91, 51, 84, 76, 75, 78, 89, 98, 83, 55, 70, 66],
    },
  ],
  chart: {
    type: 'area',
    background: 'transparent',
    height: 350,
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  colors: ['#00ab57', '#d50000'],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  dataLabels: {
    enabled: false,
  },
  fill: {
    gradient: {
      opacityFrom: 0.4,
      opacityTo: 0.1,
      shadeIntensity: 1,
      stops: [0, 100],
      type: 'vertical',
    },
    type: 'gradient',
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
  markers: {
    size: 5,
    strokeColors: '#1b2635',
    strokeWidth: 3,
  },
  stroke: {
    curve: 'smooth',
  },
  xaxis: {
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      offsetY: 5,
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: [
    {
      title: {
        text: 'Total Attendance',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

const attendanceChart = new ApexCharts(
  document.querySelector('#attendance-chart'),
  attendanceChartOptions
);
attendanceChart.render();

//radialbar
const radialBaroptions = {
  chart: {
    height: 400,
    type: "radialBar",
  },

  series: [67,75],
  colors: ["#20E647"],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "80%",
        background: "#293450"
      },
      track: {
        dropShadow: {
          enabled: true,
          top: 2,
          left: 0,
          blur: 4,
          opacity: 0.15
        }
      },
      dataLabels: {
          total: {
            show: true,
            label: 'TOTAL'
          },
        name: {
          offsetY: -10,
          color: "#fff",
          fontSize: "13px"
        },
        value: {
          color: "#fff",
          fontSize: "30px",
          show: true
        }
      }
    }
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      type: "vertical",
      gradientToColors: ["#87D4F9"],
      stops: [0, 100]
    }
  },
  stroke: {
    lineCap: "round",
  },
  labels: ["Grade 10", "Grade 11"],
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

const radialBarchart = new ApexCharts(document.querySelector("#radialBarchart"), radialBaroptions);

radialBarchart.render();

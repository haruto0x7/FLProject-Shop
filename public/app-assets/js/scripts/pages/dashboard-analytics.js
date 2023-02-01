/*=========================================================================================
    File Name: dashboard-analytics.js
    Description: dashboard analytics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on('load', function () {
  'use strict';

  var $avgSessionStrokeColor2 = '#ebf0f7';
  var $textHeadingColor = '#5e5873';
  var $white = '#fff';

  var $gainedChart = document.querySelector('#gained-chart');
  var $orderChart = document.querySelector('#order-chart');
  var $avgSessionsChart = document.querySelector('#avg-sessions-chart');
  var $supportTrackerChart = document.querySelector('#support-trackers-chart');

  var gainedChartOptions;
  var orderChartOptions;
  var avgSessionsChartOptions;
  var supportTrackerChartOptions;

  var gainedChart;
  var orderChart;
  var avgSessionsChart;
  var supportTrackerChart;
  var $usage = Math.trunc( Math.random() * 100 );

  // Subscribed Gained Chart
  // ----------------------------------

  gainedChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.primary],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Subscribers',
        data: [28, 40, 36, 52, 38, 60, 55]
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
  gainedChart = new ApexCharts($gainedChart, gainedChartOptions);
  gainedChart.render();

  // Order Received Chart
  // ----------------------------------

  orderChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.warning],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Orders',
        data: [10, 15, 8, 15, 7, 12, 8]
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
  orderChart = new ApexCharts($orderChart, orderChartOptions);
  orderChart.render();

  // Average Session Chart
  // ----------------------------------
  avgSessionsChartOptions = {
    chart: {
      type: 'bar',
      height: 200,
      sparkline: { enabled: true },
      toolbar: { show: false }
    },
    states: {
      hover: {
        filter: 'none'
      }
    },
    colors: [
      $avgSessionStrokeColor2,
      $avgSessionStrokeColor2,
      window.colors.solid.primary,
      $avgSessionStrokeColor2,
      $avgSessionStrokeColor2,
      $avgSessionStrokeColor2
    ],
    series: [
      {
        name: 'Sessions',
        data: [75, 125, 225, 175, 125, 75, 25]
      }
    ],
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0
      }
    },
    plotOptions: {
      bar: {
        columnWidth: '45%',
        distributed: true,
        endingShape: 'rounded'
      }
    },
    tooltip: {
      x: { show: false }
    },
    xaxis: {
      type: 'numeric'
    }
  };
  avgSessionsChart = new ApexCharts($avgSessionsChart, avgSessionsChartOptions);
  avgSessionsChart.render();

  // Support Tracker Chart
  // -----------------------------
  supportTrackerChartOptions = {
    chart: {
      height: 270,
      type: 'radialBar'
    },
    plotOptions: {
      radialBar: {
        size: 150,
        offsetY: 20,
        startAngle: -150,
        endAngle: 150,
        hollow: {
          size: '65%'
        },
        track: {
          background: $white,
          strokeWidth: '100%'
        },
        dataLabels: {
          name: {
            offsetY: -5,
            color: $textHeadingColor,
            fontSize: '1rem'
          },
          value: {
            offsetY: 15,
            color: $textHeadingColor,
            fontSize: '1.714rem'
          }
        }
      }
    },
    colors: [window.colors.solid.danger],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        type: 'horizontal',
        shadeIntensity: 0.5,
        gradientToColors: [window.colors.solid.primary],
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      }
    },
    stroke: {
      dashArray: 8
    },
    series: [$usage],
    labels: ['Current Shop Usage']
  };
  supportTrackerChart = new ApexCharts($supportTrackerChart, supportTrackerChartOptions);
  supportTrackerChart.render();

});

(function ($) {
  'use strict';
  $(function () {
    var lineStatsOptions = {
      scales: {
        yAxes: [{
          display: false
        }],
        xAxes: [{
          display: false
        }]
      },
      legend: {
        display: false
      },
      elements: {
        point: {
          radius: 0
        },
        line: {
          tension: 0
        }
      },
      stepsize: 100
    }
    if ($('#sales-statistics-overview').length) {
      const bersih1 = $('#bersih1').attr('nilaiAngka');
      const bersih2 = $('#bersih2').attr('nilaiAngka');
      const bersih3 = $('#bersih3').attr('nilaiAngka');
      const bersih4 = $('#bersih4').attr('nilaiAngka');
      const bersih5 = $('#bersih5').attr('nilaiAngka');
      const bersih6 = $('#bersih6').attr('nilaiAngka');
      const bersih7 = $('#bersih7').attr('nilaiAngka');
      const modal1 = $('#modal1').attr('nilaiAngka');
      const modal2 = $('#modal2').attr('nilaiAngka');
      const modal3 = $('#modal3').attr('nilaiAngka');
      const modal4 = $('#modal4').attr('nilaiAngka');
      const modal5 = $('#modal5').attr('nilaiAngka');
      const modal6 = $('#modal6').attr('nilaiAngka');
      const modal7 = $('#modal7').attr('nilaiAngka');
      const kotor1 = $('#kotor1').attr('nilaiAngka');
      const kotor2 = $('#kotor2').attr('nilaiAngka');
      const kotor3 = $('#kotor3').attr('nilaiAngka');
      const kotor4 = $('#kotor4').attr('nilaiAngka');
      const kotor5 = $('#kotor5').attr('nilaiAngka');
      const kotor6 = $('#kotor6').attr('nilaiAngka');
      const kotor7 = $('#kotor7').attr('nilaiAngka');
      var salesChartCanvas = $("#sales-statistics-overview").get(0).getContext("2d");
      var gradientStrokeFill_1 = salesChartCanvas.createLinearGradient(0, 0, 0, 450);
      gradientStrokeFill_1.addColorStop(1, 'rgba(255,255,255, 0)');
      gradientStrokeFill_1.addColorStop(0, '#19d895');
      var gradientStrokeFill_2 = salesChartCanvas.createLinearGradient(0, 0, 0, 400);
      gradientStrokeFill_2.addColorStop(1, 'rgba(255, 255, 255, 0)');
      gradientStrokeFill_2.addColorStop(0, '#0c7cd5');
      var gradientStrokeFill_3 = salesChartCanvas.createLinearGradient(0, 0, 0, 400);
      gradientStrokeFill_3.addColorStop(1, 'rgba(255, 255, 255, 0)');
      gradientStrokeFill_3.addColorStop(0, '#7042da');
      var data_1_1 = [0, bersih1, bersih2, bersih3, bersih4, bersih5, bersih6, bersih7];
      var data_1_2 = [0, modal1, modal2, modal3, modal4, modal5, modal6, modal7];
      var data_1_3 = [0, kotor1, kotor2, kotor3, kotor4, kotor5, kotor6, kotor7];
      var areaData = {
        labels: ["-", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
        datasets: [{
          label: 'Bersih',
          data: data_1_1,
          borderColor: successColor,
          backgroundColor: gradientStrokeFill_1,
          borderWidth: 1
        }, {
          label: 'Modal',
          data: data_1_2,
          borderColor: primaryColor,
          backgroundColor: gradientStrokeFill_2,
          borderWidth: 1
        }, {
          label: 'Kotor',
          data: data_1_3,
          borderColor: infoColor,
          backgroundColor: gradientStrokeFill_3,
          borderWidth: 1
        }]
      };
      var areaOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        elements: {
          point: {
            radius: 3,
            backgroundColor: "#fff"
          },
          line: {
            tension: 0
          }
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        legend: false,
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            console.log(chart.data.datasets[i]); // see what's inside the obj.
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              beginAtZero: true
            },
            gridLines: {
              drawBorder: true
            }
          }],
          yAxes: [{
            ticks: {
              max: 2000000,
              min: 0,
              stepSize: 250000,
              fontColor: "#858585",
              beginAtZero: false
            },
            gridLines: {
              color: '#e2e6ec',
              display: true,
              drawBorder: false
            }
          }]
        }
      }
      var salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
      document.getElementById('sales-statistics-legend').innerHTML = salesChart.generateLegend();
    }
    if ($("#net-profit").length) {
      const seninmi = $('#seninmi').attr('nilaiAngka');
      const selasami = $('#selasami').attr('nilaiAngka');
      const rabumi = $('#rabumi').attr('nilaiAngka');
      const kamismi = $('#kamismi').attr('nilaiAngka');
      const jumatmi = $('#jumatmi').attr('nilaiAngka');
      const sabtumi = $('#sabtumi').attr('nilaiAngka');
      const minggumi = $('#minggumi').attr('nilaiAngka');
      const seninma = $('#seninma').attr('nilaiAngka');
      const selasama = $('#selasama').attr('nilaiAngka');
      const rabuma = $('#rabuma').attr('nilaiAngka');
      const kamisma = $('#kamisma').attr('nilaiAngka');
      const jumatma = $('#jumatma').attr('nilaiAngka');
      const sabtuma = $('#sabtuma').attr('nilaiAngka');
      const mingguma = $('#mingguma').attr('nilaiAngka');
      var marksCanvas = document.getElementById("net-profit");
      var marksData = {
        labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
        datasets: [{
          label: "Minuman",
          backgroundColor: 'rgba(30, 144, 255,0.8)',
          borderColor: 'rgba(30, 144, 255,0.8)',
          borderWidth: 0,
          fill: true,
          radius: 0,
          pointRadius: 0,
          pointBorderWidth: 0,
          pointBackgroundColor: 'rgba(30, 144, 255,0.8)',
          pointHoverRadius: 10,
          pointHitRadius: 5,
          data: [seninmi, selasami, rabumi, kamismi, jumatmi, sabtumi, minggumi]
        }, {
          label: "Makanan",
          backgroundColor: 'rgba(150, 77, 247,1)',
          borderColor: 'rgba(150, 77, 247,1)',
          borderWidth: 0,
          fill: true,
          radius: 0,
          pointRadius: 0,
          pointBorderWidth: 0,
          pointBackgroundColor: 'rgba(150, 77, 247,1)',
          pointHoverRadius: 10,
          pointHitRadius: 5,
          data: [seninma, selasama, rabuma, kamisma, jumatma, sabtuma, mingguma]
        }]
      };

      var chartOptions = {
        scale: {
          ticks: {
            beginAtZero: true,
            min: 0,
            max: 200,
            stepSize: 50,
            display: false,
          },
          pointLabels: {
            fontSize: 14
          },
          angleLines: {
            color: '#e9ebf1'
          },
          gridLines: {
            color: "#e9ebf1"
          }
        },
        legend: false,
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            console.log(chart.data.datasets[i]); // see what's inside the obj.
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
      };

      var radarChart = new Chart(marksCanvas, {
        type: 'radar',
        data: marksData,
        options: chartOptions
      });
      document.getElementById('net-profit-legend').innerHTML = radarChart.generateLegend();
    }
    if ($('#stats-line-graph-1').length) {
      var lineChartCanvas = $("#stats-line-graph-1").get(0).getContext("2d");
      var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(0, 0, 0, 50);
      gradientStrokeFill_1.addColorStop(0, 'rgba(131, 144, 255, 0.5)');
      gradientStrokeFill_1.addColorStop(1, '#fff');
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: {
          labels: ["-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-"],
          datasets: [{
            label: 'Profit',
            data: [7, 6, 9, 7, 8, 6, 8, 5, 7, 8, 6, 7, 7],
            borderColor: '#6d7cfc',
            backgroundColor: gradientStrokeFill_1,
            borderWidth: 3,
            fill: true
          }]
        },
        options: lineStatsOptions
      });
    }
    if ($('#stats-line-graph-2').length) {
      var lineChartCanvas = $("#stats-line-graph-2").get(0).getContext("2d");
      var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(0, 0, 0, 50);
      gradientStrokeFill_1.addColorStop(0, 'rgba(131, 144, 255, 0.5)');
      gradientStrokeFill_1.addColorStop(1, '#fff');
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: {
          labels: ["-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-"],
          datasets: [{
            label: 'Profit',
            data: [7, 6, 8, 5, 7, 8, 6, 7, 7, 6, 9, 7, 8],
            borderColor: '#6d7cfc',
            backgroundColor: gradientStrokeFill_1,
            borderWidth: 3,
            fill: true
          }]
        },
        options: lineStatsOptions
      });
    }
    if ($('#stats-line-graph-3').length) {
      var lineChartCanvas = $("#stats-line-graph-3").get(0).getContext("2d");
      var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(0, 0, 0, 50);
      gradientStrokeFill_1.addColorStop(0, 'rgba(131, 144, 255, 0.5)');
      gradientStrokeFill_1.addColorStop(1, '#fff');
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: {
          labels: ["-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-"],
          datasets: [{
            label: 'Profit',
            data: [8, 6, 7, 8, 5, 7, 9, 7, 8, 7, 6, 7, 6],
            borderColor: '#6d7cfc',
            backgroundColor: gradientStrokeFill_1,
            borderWidth: 3,
            fill: true
          }]
        },
        options: lineStatsOptions
      });
    }
    if ($('#stats-line-graph-4').length) {
      var lineChartCanvas = $("#stats-line-graph-4").get(0).getContext("2d");
      var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(0, 0, 0, 50);
      gradientStrokeFill_1.addColorStop(0, 'rgba(131, 144, 255, 0.5)');
      gradientStrokeFill_1.addColorStop(1, '#fff');
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: {
          labels: ["-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-"],
          datasets: [{
            label: 'Profit',
            data: [7, 6, 8, 5, 8, 6, 8, 7, 8, 6, 9, 7, 7],
            borderColor: '#6d7cfc',
            backgroundColor: gradientStrokeFill_1,
            borderWidth: 3,
            fill: true
          }]
        },
        options: lineStatsOptions
      });
    }
  });
})(jQuery);
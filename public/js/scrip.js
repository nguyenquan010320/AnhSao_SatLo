

function chartBao(id,text,  elevationData) {
    // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
// Highcharts.chart(id, {
//     chart: {
//         type: 'spline'
//     },
//     title: {
//         text: 'Monthly Average Temperature'
//     },
//     subtitle: {
//         text: 'Source: ' +
//             '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
//             'target="_blank">Wikipedia.com</a>'
//     },
//     xAxis: {
//         categories: elevationData['time'],
//         accessibility: {
//             description: 'Months of the year'
//         }
//     },
//     yAxis: {
//         title: {
//             text: text
//         },
//         labels: {
//             format: '{value} cm'
//         }
//     },
//     tooltip: {
//         crosshairs: true,
//         shared: true
//     },
//     plotOptions: {
//         spline: {
//             marker: {
//                 radius: 4,
//                 lineColor: '#666666',
//                 lineWidth: 1
//             }
//         }
//     },
//     series: [{
//         name: 'Tokyo',
//         marker: {
//             symbol: 'square'
//         },
//         data: elevationData['data']

//     }]
// });
// Dữ liệu mẫu
const data = elevationData;

// Chuyển dữ liệu thành định dạng Highcharts
const categories = data.map(item => item.time);
const heights = data.map(item => item.height);

// Tạo biểu đồ
Highcharts.chart(id, {
    chart: {
        type: 'area'
    },
    title: {
        text: text
    },
    xAxis: {
        categories: categories,
        title: {
            text: 'Thời gian (giờ)'
        }
    },
    yAxis: {
        title: {
            text: 'Độ dịch chuyển (cm)'
        }
    },
    series: [{
        name: 'Độ dịch chuyển',
        data: heights
    }],
    tooltip: {
        formatter: function () {
            console.log(`21`, this);
            return `<b>Thời gian</b>: ${this.key} <br>
            <b>Độ dịch chuyển</b>: ${this.y} cm
            `;
        }
    },
    credits: {
        enabled: false // Tắt logo Highcharts
    }
});
// Now create the chart
// Highcharts.chart(id, {

//     chart: {
//         type: 'area',
//         zooming: {
//             type: 'x'
//         },
//         panning: true,
//         panKey: 'shift',
//         scrollablePlotArea: {
//             minWidth: 600
//         }
//     },

//     caption: {
//         text: ''
//     },

//     title: {
//         text: text
//     },

//     accessibility: {
//         description: '',
//         landmarkVerbosity: 'one'
//     },

//     lang: {
//         accessibility: {
//             screenReaderSection: {
//                 annotations: {
//                     descriptionNoPoints: '{annotationText}, at distance ' +
//                         '{annotation.options.point.x}km, elevation ' +
//                         '{annotation.options.point.y} meters.'
//                 }
//             }
//         }
//     },

//     credits: {
//         enabled: false
//     },

//     annotations: [{
//         draggable: '',
//         labelOptions: {
//             backgroundColor: 'rgba(255,255,255,0.5)',
//             verticalAlign: 'top',
//             y: 15
//         },
//         labels: [{
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 27.98,
//                 y: 255
//             },
//             text: 'Arbois'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 45.5,
//                 y: 611
//             },
//             text: 'Montrond'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 63,
//                 y: 651
//             },
//             text: 'Mont-sur-Monnet'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 84,
//                 y: 789
//             },
//             x: -10,
//             text: 'Bonlieu'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 129.5,
//                 y: 382
//             },
//             text: 'Chassal'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 159,
//                 y: 443
//             },
//             text: 'Saint-Claude'
//         }]
//     }, {
//         draggable: '',
//         labels: [{
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 101.44,
//                 y: 1026
//             },
//             x: -30,
//             text: 'Col de la Joux'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 138.5,
//                 y: 748
//             },
//             text: 'Côte de Viry'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 176.4,
//                 y: 1202
//             },
//             text: 'Montée de la Combe <br>de Laisia Les Molunes'
//         }]
//     }, {
//         draggable: '',
//         labelOptions: {
//             shape: 'connector',
//             align: 'right',
//             justify: false,
//             crop: true,
//             style: {
//                 fontSize: '10px',
//                 textOutline: '1px white'
//             }
//         },
//         labels: [{
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 96.2,
//                 y: 783
//             },
//             text: '6.1 km climb <br>4.6% on avg.'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 134.5,
//                 y: 540
//             },
//             text: '7.6 km climb <br>5.2% on avg.'
//         }, {
//             point: {
//                 xAxis: 0,
//                 yAxis: 0,
//                 x: 172.2,
//                 y: 925
//             },
//             text: '11.7 km climb <br>6.4% on avg.'
//         }]
//     }],

//     xAxis: {
//         labels: {
//             format: '{value} h'
//         },
//         minRange: 5,
//         title: {
//             text: ''
//         },
//         accessibility: {
//             rangeDescription: 'Range: 0 to 187.8km.'
//         }
//     },

//     yAxis: {
//         startOnTick: true,
//         endOnTick: false,
//         maxPadding: 0.35,
//         title: {
//             text: null
//         },
//         labels: {
//             format: '{value} cm'
//         },
//         accessibility: {
//             description: 'Elevation',
//             rangeDescription: 'Range: 0 to 1,553 meters'
//         }
//     },

//     tooltip: {
//         headerFormat: 'Thời gian: {point.x:.1f} h<br>',
//         pointFormat: 'Tốc độ: {point.y} cm',
//         shared: true
//     },

//     legend: {
//         enabled: false
//     },

//     series: [{
//         data: elevationData,
//         lineColor: Highcharts.getOptions().colors[1],
//         color: Highcharts.getOptions().colors[2],
//         fillOpacity: 0.5,
//         name: 'Elevation',
//         marker: {
//             enabled: false
//         },
//         threshold: null
//     }]

// });
}





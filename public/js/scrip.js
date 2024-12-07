// CHART
// const elevationData = [
//     [0.0, 225],
//     [0.1, 226],
//     [0.2, 228],
//     [0.3, 228],
//     [0.4, 229],
//     [0.5, 229],
//     [0.6, 230],
//     [0.7, 234],
//     [0.8, 235],
//     [0.9, 236],
//     [1.0, 235],
//     [1.1, 232],
//     [1.2, 228],
//     [1.3, 223],
//     [1.4, 218],
//     [1.5, 214],
//     [1.6, 207],
//     [1.7, 202],
//     [1.8, 198],
//     [1.9, 196],
//     [2.0, 197],
//     [2.1, 200],
//     [2.2, 205],
//     [2.3, 206],
//     [2.4, 210],
//     [2.5, 210],
//     [2.6, 210],
//     [2.7, 209],
//     [2.8, 208],
//     [2.9, 207],
//     [3.0, 209],
//     [3.1, 208],
//     [3.2, 207],
//     [3.3, 207],
//     [3.4, 206],
//     [3.5, 206],
//     [3.6, 205],
//     [3.7, 201],
//     [3.8, 195],
//     [3.9, 191],
//     [4.0, 191],
//     [4.1, 195],
//     [4.2, 199],
//     [4.3, 203],
//     [4.4, 208],
//     [4.5, 208],
//     [4.6, 208],
//     [4.7, 208],
//     [4.8, 209],
//     [4.9, 207],
//     [5.0, 207],
//     [5.1, 208],
//     [5.2, 209],
//     [5.3, 208],
//     [5.4, 210],
//     [5.5, 209],
//     [5.6, 209],
//     [5.7, 206],
//     [5.8, 207],
//     [5.9, 209],
//     [6.0, 211],
//     [6.1, 206],
//     [6.2, 201],
//     [6.3, 199],
//     [6.4, 200],
//     [6.5, 202],
//     [6.6, 203],
//     [6.7, 202],
//     [6.8, 204],
//     [6.9, 206],
//     [7.0, 208],
//     [7.1, 205],
//     [7.2, 202],
//     [7.3, 198],

// ];

function chartBao(id,text,  elevationData) {
// Now create the chart
Highcharts.chart(id, {

    chart: {
        type: 'area',
        zooming: {
            type: 'x'
        },
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
    },

    caption: {
        text: ''
    },

    title: {
        text: text
    },

    accessibility: {
        description: 'This line chart uses the Highcharts Annotations ' +
            'feature to place labels at various points of interest. The ' +
            'labels are responsive and will be hidden to avoid overlap on ' +
            'small screens. Image description: An annotated line chart ' +
            'illustrates the 8th stage of the 2017 Tour de France cycling ' +
            'race from the start point in Dole to the finish line at Station ' +
            'des Rousses. Altitude is plotted on the Y-axis, and distance is ' +
            'plotted on the X-axis. The line graph is interactive, and the ' +
            'user can trace the altitude level along the stage. The graph is ' +
            'shaded below the data line to visualize the mountainous ' +
            'altitudes encountered on the 187.5-kilometre stage. The three ' +
            'largest climbs are highlighted at Col de la Joux, Côte de Viry ' +
            'and the final 11.7-kilometer, 6.4% gradient climb to Montée de ' +
            'la Combe de Laisia Les Molunes which peaks at 1200 meters above ' +
            'sea level. The stage passes through the villages of Arbois, ' +
            'Montrond, Bonlieu, Chassal and Saint-Claude along the route.',
        landmarkVerbosity: 'one'
    },

    lang: {
        accessibility: {
            screenReaderSection: {
                annotations: {
                    descriptionNoPoints: '{annotationText}, at distance ' +
                        '{annotation.options.point.x}km, elevation ' +
                        '{annotation.options.point.y} meters.'
                }
            }
        }
    },

    credits: {
        enabled: false
    },

    annotations: [{
        draggable: '',
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 27.98,
                y: 255
            },
            text: 'Arbois'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 45.5,
                y: 611
            },
            text: 'Montrond'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 63,
                y: 651
            },
            text: 'Mont-sur-Monnet'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 84,
                y: 789
            },
            x: -10,
            text: 'Bonlieu'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 129.5,
                y: 382
            },
            text: 'Chassal'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 159,
                y: 443
            },
            text: 'Saint-Claude'
        }]
    }, {
        draggable: '',
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 101.44,
                y: 1026
            },
            x: -30,
            text: 'Col de la Joux'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 138.5,
                y: 748
            },
            text: 'Côte de Viry'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 176.4,
                y: 1202
            },
            text: 'Montée de la Combe <br>de Laisia Les Molunes'
        }]
    }, {
        draggable: '',
        labelOptions: {
            shape: 'connector',
            align: 'right',
            justify: false,
            crop: true,
            style: {
                fontSize: '10px',
                textOutline: '1px white'
            }
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 96.2,
                y: 783
            },
            text: '6.1 km climb <br>4.6% on avg.'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 134.5,
                y: 540
            },
            text: '7.6 km climb <br>5.2% on avg.'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 172.2,
                y: 925
            },
            text: '11.7 km climb <br>6.4% on avg.'
        }]
    }],

    xAxis: {
        labels: {
            format: '{value} km'
        },
        minRange: 5,
        title: {
            text: ''
        },
        accessibility: {
            rangeDescription: 'Range: 0 to 187.8km.'
        }
    },

    yAxis: {
        startOnTick: true,
        endOnTick: false,
        maxPadding: 0.35,
        title: {
            text: null
        },
        labels: {
            format: '{value} m'
        },
        accessibility: {
            description: 'Elevation',
            rangeDescription: 'Range: 0 to 1,553 meters'
        }
    },

    tooltip: {
        headerFormat: 'Distance: {point.x:.1f} km<br>',
        pointFormat: '{point.y} m a. s. l.',
        shared: true
    },

    legend: {
        enabled: false
    },

    series: [{
        data: elevationData,
        lineColor: Highcharts.getOptions().colors[1],
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 0.5,
        name: 'Elevation',
        marker: {
            enabled: false
        },
        threshold: null
    }]

});
}





function chartBao(id, text) {
// Chuyển dữ liệu thành định dạng Highcharts
    var cate = [];
    var heights = [];

// Tạo biểu đồ
    var chart = Highcharts.chart(id, {
        chart: {
            type: 'area',

        },
        title: {
            text: text
        },
        xAxis: {
            categories: cate,
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
                return `<b>Thời gian</b>: ${this.key} <br>
            <b>Độ dịch chuyển</b>: ${this.y} cm
            `;
            }
        },
        credits: {
            enabled: false // Tắt logo Highcharts
        }
    });

    return chart;
    // Function to fetch data from an API
    // Hàm thêm dữ liệu mới vào categories và series theo thời gian
}


function updateData(chart, url, type) {
    var charts = chart;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Assuming the API returns data like { value: number }
            var data = data.data[type];

            cate = data.map(e => e.time);
            heights = data.map(e => e.height);
            // var timestamp = (new Date()).getTime(); // Current time in milliseconds
            charts.xAxis[0].setCategories(cate, false);  // Cập nhật categories (setCategories với tham số false để tránh làm mới biểu đồ)
            charts.series[0].setData(heights, false);

            charts.redraw();

            // Add the new data point to the chart
            // series.addPoint(value.data);
            // cat = value.date;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}


function setParamsToUrl(url, params) {
    try {
        // Tạo đối tượng URL
        const parsedUrl = new URL(url);

        // Thêm hoặc cập nhật các tham số vào URL
        for (const [key, value] of Object.entries(params)) {
            parsedUrl.searchParams.set(key, value); // Set từng param
        }

        // Trả về URL mới với các tham số đã được cập nhật
        return parsedUrl.toString();
    } catch (error) {
        console.error("Invalid URL:", error.message);
        return null;
    }
}



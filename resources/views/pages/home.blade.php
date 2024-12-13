@extends('../layout')
@section('style')
    <style>
        #calibrateButton {
            position: absolute;
            bottom: 50%;
            right: 10%;
            border-radius: 0;
        }
    </style>
@endsection
@section('content')
    {{-- {{ dd($datas)}} --}}
    <!-- MAPS -->
    <div id="content">
        <div id="maps__container">
            <h1 id="title__maps">Bản đồ theo dõi làng san</h1>
            <div class="map-container">
                <img src="{{ asset('img/langsan.png') }}" alt="Google Maps" class="gg_maps">
                <div class="map-buttons">

                    <button id="sl1" title="" class="btn__one">SL1</button>

                    <button id="sl2" title="" class="btn__two">SL2</button>

                    <button id="sl3" title="" class="btn__three">SL3</button>

                    <button title="" class="btn__gateway">Gateway</button>
                </div>

                <div class="container d-flex justify-content-center align-items-center">
                    <div class="rectangle d-flex btn__col__one">
                        <div class="section">Cọc 1</div>
                        <div class="section">D1</div>
                        <div class="section">A1</div>
                    </div>
                    <div class="rectangle d-flex btn__col__two">
                        <div class="section">Cọc 2</div>
                        <div class="section">D2</div>
                        <div class="section">A2</div>
                    </div>
                    <div class="rectangle d-flex btn__col__three">
                        <div class="section">Cọc 3</div>
                        <div class="section">D3</div>
                        <div class="section">A3</div>
                    </div>
                </div>
                <button id="luquet" title="" class="btn__col__warning">Lũ quét</button>
            </div>
        </div>
        <!-- MAPS -->

        <!-- CHART -->
        <div id="chart__container">
            <h1 id="title__maps">Biểu đồ theo dõi</h1>
            <!-- Date -->
            <div class="container">
                <form method="" action="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="datetime-picker" class="form-label title__date">Xem lại từ ngày:</label>
                            <input type="date" class="form-control" id="datetime-picker" name="datetime-picker">
                        </div>
                        <div class="col-md-4">
                            <label for="datetime-picker" class="form-label title__date">Từ giờ:</label>
                            <input type="time" class="form-control" id="datetime-picker" name="datetime-picker">
                        </div>
                        <div class="col-md-3">
                            <label for="datetime-picker" class="form-label title__date">Đến giờ:</label>
                            <input type="time" class="form-control" id="datetime-picker" name="datetime-picker">

                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="" class="btn__date w-100 mt-3">Xem</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Date -->
            <div class="mt-4 text-center mb-10">
                <button id="sendButton" class="btn btn-primary">Reset</button>
            </div>
            <div id="container" class="container"></div>
            <div id="container1" class="container"></div>
            <div id="container2" class="container"></div>

        </div>
    </div>

    <!-- CHART -->
@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDetK1VIdWEbAjP4xPt6foihYDjOmrEPM4&callback=myMap">
    </script>
    <script src="{{ asset('js/mqttws31.min.js') }}"></script>


    <script>
        // Kết nối tới MQTT broker
        const brokerUrl = "broker.emqx.io"; // Thay bằng MQTT broker của bạn
        const brokerPort = 8084; // Port hỗ trợ WebSocket
        const clientId = "mqttjs_" + Math.random().toString(16).substr(2, 8); // Tạo ID ngẫu nhiên cho client

        // Tạo một MQTT client
        var client = new Paho.MQTT.Client(brokerUrl, brokerPort, clientId);

        // Biến theo dõi trạng thái kết nối
        let isConnected = false;

        // Timeout: Ngắt kết nối sau 30 giây nếu không thành công
        const timeout = setTimeout(() => {
            if (!isConnected) {
            checkColor('sl1', 0, 0);
            checkColor('sl2', 0, 0);
            checkColor('sl3', 0, 0);
                console.log("Không thể kết nối trong 30 giây. Ngắt kết nối.");
                client.disconnect();
            }
        }, 30000);

        // Hàm xử lý khi kết nối thành công
        client.onConnectionLost = (responseObject) => {
            if (responseObject.errorCode !== 0) {
                checkColor('sl1', 0, 0);
                checkColor('sl2', 0, 0);
                checkColor('sl3', 0, 0);
                isConnected = false;
                console.log("Kết nối bị mất: " + responseObject.errorMessage);
            }
        };

         client.onConnect = function () {
            isConnected = true; // Hủy timeout nếu kết nối thành công
            console.log("Kết nối thành công!");
        };

        function createDatas(dat) {
            if (dat) {
                // Tạo một đối tượng XMLHttpRequest
                const xhr = new XMLHttpRequest();

                // URL của API hoặc server
                const url = `{{route('store-statisticals')}}`;

                // Dữ liệu bạn muốn gửi
                const data = JSON.stringify(dat);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // Mở kết nối với phương thức POST
                xhr.open("POST", url, true);

                // Đặt tiêu đề Content-Type
                xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
                // Xử lý sự kiện khi có phản hồi từ server
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) { // 4: Request hoàn thành
                        if (xhr.status === 200) { // 200: Thành công
                            console.log("Response:", xhr.responseText);
                        } else {
                            console.error("Error:", xhr.statusText);
                        }
                    }
                };

                // Gửi yêu cầu với dữ liệu
                xhr.send(data);
            }
        }
        // trường hợp bấm nút từ thiết bị data trả về
        client.onMessageArrived = (message) => {
            //console.log(`Nhận tin nhắn từ ${message.destinationName}: ${message.payloadString}`);
            const dat = JSON.parse(message.payloadString);
            if (dat) {
                checkColor('sl1', dat.node_online[0], dat.node_waring[0]);
                checkColor('sl2', dat.node_online[1], dat.node_waring[1]);
                checkColor('sl3', dat.node_online[2], dat.node_waring[2]);
                checkColor('luquet', dat.node_online[3], dat.node_waring[3]);
                createDatas(dat);
            }
            // Hiển thị danh sách nhiệt độ

        };

        function checkColor(selector, node_online, node_waring) {
            const node = document.getElementById(selector);
            if (node_online > 0) {
                switch (node_waring) {
                    case 1:
                        node.style.backgroundColor = 'green';
                        break;
                    case 2:
                        node.style.backgroundColor = 'yellow';
                        break;
                    case 3:
                        node.style.backgroundColor = 'red';
                        break;
                    default:
                        node.style.backgroundColor = 'gray';
                        break;
                }
            } else {
                node.style.backgroundColor = 'gray';
            }
            console.log("1231313", node_online, node_waring);
        }

        // Kết nối tới broker
        client.connect({
            onSuccess: () => {
                console.log("Kết nối thành công!");
                clearTimeout(timeout); // Xóa timeout nếu kết nối thành công
                client.onConnect();
                // Subscribe một chủ đề
                const topic = "LangNu/report";
                client.subscribe(topic, {
                    onSuccess: () => {
                        console.log(`Đã đăng ký chủ đề: ${topic}`);
                    },
                    onFailure: (error) => {
                        console.error(`Lỗi khi đăng ký chủ đề: ${error.errorMessage}`);
                    }
                });
            },
            useSSL: true, // Sử dụng SSL khi kết nối WebSocket
            onFailure: (error) => {
                checkColor('sl1', 0, 0);
                checkColor('sl2', 0, 0);
                checkColor('sl3', 0, 0);
                isConnected = false;
                console.error("Kết nối thất bại: " + error.errorMessage);
                document.getElementById("status").textContent = "Kết nối thất bại";
            },
            timeout: 30
        });
        const calibrateButton = document.getElementById('sendButton');
        // Lắng nghe sự kiện nhấn phím
        calibrateButton.addEventListener('click', (event) => {
            // Tạo thông điệp cần gửi
            const message = new Paho.MQTT.Message(JSON.stringify({
                cmd: 'calib'
            }));
            message.destinationName = "LangNu/cmd";

            // Gửi thông điệp đến chủ đề LangNu/cmd
            client.send(message);
            console.log('Calibration command sent:', message.payloadString);
        });
    </script>

    <script>

        function getTK(){
            chartBao('container', 'Biểu đồ 1', `{{route('get-statisticals', ['type' =>'dcm1'])}}`, 'dcm1');
            chartBao('container1', 'Biểu đồ 2', `{{route('get-statisticals',['type' =>'dcm2'])}}`, 'dcm2');
            chartBao('container2', 'Biểu đồ 3', `{{route('get-statisticals',['type' =>'dcm3'])}}`, 'dcm3');
        }
        getTK();
    </script>
@endsection

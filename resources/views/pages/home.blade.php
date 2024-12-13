@extends('../layout')

@section('content')
    {{-- {{ dd($datas)}} --}}
    <!-- MAPS -->
    <div id="content">
        <div id="maps__container">
            <h1 id="title__maps">Bản đồ theo dõi làng san</h1>
            <div class="map-container">
                <img src="{{ asset('img/langsan.png') }}" alt="Google Maps" class="gg_maps">
                <div class="map-buttons">
                    @foreach ($datas as $data)
                        @if (isset($data) && $data['name'] == 'sl1')
                            <button title="" class="btn__one {{ $statusClass[$data['status']] }}">SL1</button>
                        @endif

                        @if (isset($data) && $data['name'] == 'sl2')
                            <button title="" class="btn__two {{ $statusClass[$data['status']] }}">SL2</button>
                        @endif
                        @if (isset($data) && $data['name'] == 'sl3')
                            <button title="" class="btn__three {{ $statusClass[$data['status']] }}">SL3</button>
                        @endif
                    @endforeach

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
                <button title="" class="btn__col__warning ">Lũ quét</button>
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
                <button id="sendButton" class="btn btn-primary">Topic</button>
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
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script>
        const client = mqtt.connect('wss://');

        client.on('connect', () => {
            console.log('Đã kết nối đến MQTT broker');
        });

        client.on('error', (err) => {
            console.error('Kết nối lỗi:', err);
        });

        document.getElementById('sendButton').addEventListener('click', () => {
            const topic = "LangNu/cmd";
            const message = "Hello, MQTT!";

            client.publish(topic, message, (err) => {
                if (err) {
                    console.error('Gửi dữ liệu thất bại:', err);
                } else {
                    console.log(`Đã gửi: "${message}" tới topic "${topic}"`);
                }
            });
        });
    </script>
    <script>
        const elevationData = [
            [0.0, 225],
            [0.1, 226],
            [0.2, 228],
            [0.3, 228],
            [0.4, 229],
            [0.5, 229],
            [0.6, 230],
            [0.7, 234],
            [0.8, 235],
            [0.9, 236],
            [1.0, 235],
            [1.1, 232],
            [1.2, 228],
            [1.3, 223],
            [1.4, 218],
            [1.5, 214],
            [1.6, 207],
            [1.7, 202],
            [1.8, 198],
            [1.9, 196],
            [2.0, 197],
            [2.1, 200],
            [2.2, 205],
            [2.3, 206],
            [2.4, 210],
            [2.5, 210],
            [2.6, 210],
            [2.7, 209],
            [2.8, 208],
            [2.9, 207],
            [3.0, 209],
            [3.1, 208],
            [3.2, 207],
            [3.3, 207],
            [3.4, 206],
            [3.5, 206],
            [3.6, 205],
            [3.7, 201],
            [3.8, 195],
            [3.9, 191],
            [4.0, 191],
            [4.1, 195],
            [4.2, 199],
            [4.3, 203],
            [4.4, 208],
            [4.5, 208],
            [4.6, 208],
            [4.7, 208],
            [4.8, 209],
            [4.9, 207],
            [5.0, 207],
            [5.1, 208],
            [5.2, 209],
            [5.3, 208],
            [5.4, 210],
            [5.5, 209],
            [5.6, 209],
            [5.7, 206],
            [5.8, 207],
            [5.9, 209],
            [6.0, 211],
            [6.1, 206],
            [6.2, 201],
            [6.3, 199],
            [6.4, 200],
            [6.5, 202],
            [6.6, 203],
            [6.7, 202],
            [6.8, 204],
            [6.9, 206],
            [7.0, 208],
            [7.1, 205],
            [7.2, 202],
            [7.3, 198],

        ];

        chartBao('container', 'Biểu đồ 1', elevationData);
        chartBao('container1', 'Biểu đồ 2', elevationData);
        chartBao('container2', 'Biểu đồ 3', elevationData);
    </script>
@endsection

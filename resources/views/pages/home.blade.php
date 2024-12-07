@extends('../layout')

@section('content')
 <!-- MAPS -->
 <div id="content">
    <div id="maps__container">
        <h1 id="title__maps">Bản đồ theo dõi làng san</h1>
        <iframe class="gg__maps"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7372.439087425765!2d103.9024687!3d22.495944650000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cd6ca5892e29c3%3A0xe14f4b6da20a4e08!2zTMOgbmcgU2FuLCBRdWFuZyBLaW0sIFRwLiBMw6BvIENhaSwgTMOgbyBDYWk!5e0!3m2!1svi!2s!4v1733366303032!5m2!1svi!2s"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<!-- MAPS -->

<!-- CHART -->
<div id="content">
    <div id="chart__container">
        <h1 id="title__maps">Biểu đồ theo dõi</h1>

        <!-- Date -->
        <div class="date__container">
            <form>
                <label for="datetime-picker" class="title__date">Xem lại từ ngày:</label>
                <input type="date" id="datetime-picker" name="datetime-picker">
                <label for="datetime-picker" class="title__date">Từ giờ:</label>
                <input type="time" id="datetime-picker" name="datetime-picker">
                <label for="datetime-picker" class="title__date">Đến giờ:</label>
                <input type="time" id="datetime-picker" name="datetime-picker">
                <button type="submit" class="btn__date">Xem</button>
            </form>
        </div>
        <!-- Date -->


        <div id="container" class="container"></div>
        <div id="container1" class="container"></div>
        <div id="container2" class="container"></div>

    </div>
</div>
<!-- CHART -->
@endsection

@section('js')
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

  
    chartBao('container','Biểu đồ 1', elevationData);
    chartBao('container1','Biểu đồ 2', elevationData);
    chartBao('container2','Biểu đồ 3', elevationData);
</script>
@endsection
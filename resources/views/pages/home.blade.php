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


        <div id="container"></div>

    </div>
</div>
<!-- CHART -->
@endsection
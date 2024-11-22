<style>
    table > thead > tr {
        border: 1px solid;
    }
    table > thead > tr > th {
        border: 1px solid;
    }
    table > tbody > tr {
        border: 1px solid;
    }
    table > tbody > tr > td {
        border: 1px solid;
    }
</style>
<div style="width: 100%;max-width: 800px;margin:0 auto">
    <div style="background: white;padding: 15px;border:1px solid #dedede;">
        <h2 style="margin:10px 0;border-bottom: 1px solid #dedede;padding-bottom: 10px;">{{ $data['subject'] }}</h2>
        <div>
            <h2>Xin chào : {{ $data['name'] }}<b></b></h2>
        </div>
        <div>
            <p>Thông báo lịch thi môn {{ $data['mon_hoc'] }} vào ngày {{ date('Y-m-d H:i', strtotime($data['ngay_thi'])) }}</p>
            <p>Thời gian  : {{ $data['thoi_gian'] }} phút</p>
            <p>Số lượng câu hỏi  : {{ $data['so_cau_hoi'] }}</p>

            <p>Đây là email tự động xin vui không không trả lời vào email này. Xin cảm ơn</p>
        </div>
    </div>
</div>
@extends('front.layout')
@section('title', 'AI大事記')
@section('content')
<div class="section-lg">
    <div class="container">
        <h2><i class='fa fa-robot'></i> AI 大事記</h2>
        <!-- 
            margin: 20px 0; 表單上下間距20px, 左右間距為0
            display: flex 表單內的元素由左至右排列
            display: 顯示; flex: 彈性排版模式
            gap: 表單個元素之間的間距
            autofocus: 游標自動停駐
        -->
        <form method='get' action="/ai" style="margin: 20px 0; display:flex; gap: 10px;">
            @csrf
            <input type="text" name='keyword' class="form-control" value="{{ $keyword }}" required autofocus>
            <button type="submit" class="btn btn-primary">查詢</button>
        </form>

        <!-- count: 計算陣列大小; count($list) 也可以用 empty($list) 或 is_null($list) -->
        @if (!empty($keyword) && count($list) == 0 )
        <div class="alert alert-danger">查無資料, 或AI呼叫失敗</div>
        @endif

        @if (count($list)>0)
            <h3>{{ $keyword }} 的大事記</h3>
            <table style="width: 100%; border-collapse:collapse">
                <tr style="background: #dddddd;">
                    <th>年份</th>
                    <th>標題</th>
                    <th>內容</th>
                </tr>
                @foreach($list as $data)
                    <tr>
                        <td class="text-center">{{ $data['year'] ?? ''}}</td>
                        <td class="text-center">{{ $data['title'] ?? ''}}</td>
                        <td class="text-center">{{ $data['content'] ?? ''}}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
@endsection
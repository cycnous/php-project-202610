@extends('admin.layout')
@section('title', '首頁')
@section('content')
<div class="dash-grid">
  <a href="members.html" class="dash-card">
    <div class="dash-icon"><i class="fa fa-user-friends"></i></div>
    <div>
      <div class="dash-num">3</div>
      <div class="dash-label">會員數</div>
    </div>
  </a>
  <a href="products.html" class="dash-card">
    <div class="dash-icon gold"><i class="fa fa-box-open"></i></div>
    <div>
      <div class="dash-num">9</div>
      <div class="dash-label">上架產品</div>
    </div>
  </a>
  <a href="news.html" class="dash-card">
    <div class="dash-icon green"><i class="fa fa-newspaper"></i></div>
    <div>
      <div class="dash-num">8</div>
      <div class="dash-label">最新消息</div>
    </div>
  </a>
  <a href="orders.html" class="dash-card">
    <div class="dash-icon red"><i class="fa fa-receipt"></i></div>
    <div>
      <div class="dash-num">2</div>
      <div class="dash-label">待處理訂單</div>
    </div>
  </a>
</div>

<div class="admin-card">
  <div class="admin-card-header">
    <h2><i class="fa fa-receipt"></i> 最新訂單</h2>
    <div class="text-muted">累計營收（不含取消）：<b class="text-brand">NT$ 15,200</b></div>
  </div>
  <div class="table-wrap">
    <table class="data-table admin-table">
      <thead>
        <tr>
          <th>訂單編號</th>
          <th>會員</th>
          <th>收件人</th>
          <th>金額</th>
          <th>狀態</th>
          <th>下單時間</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="num">ORD202511180001</td>
          <td>王小明</td>
          <td>王小明</td>
          <td class="num">NT$ 5,960</td>
          <td><span class="badge badge-blue">出貨中</span></td>
          <td>2025-11-18 10:00</td>
          <td>
            <div class="actions"><a href="orders-form.html?id=1" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 處理</a></div>
          </td>
        </tr>
        <tr>
          <td class="num">ORD202510300002</td>
          <td>王小明</td>
          <td>王小明</td>
          <td class="num">NT$ 3,840</td>
          <td><span class="badge badge-green">已完成</span></td>
          <td>2025-10-30 10:00</td>
          <td>
            <div class="actions"><a href="orders-form.html?id=2" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 處理</a></div>
          </td>
        </tr>
        <tr>
          <td class="num">ORD202509150003</td>
          <td>王小明</td>
          <td>王小明</td>
          <td class="num">NT$ 1,880</td>
          <td><span class="badge badge-green">已完成</span></td>
          <td>2025-09-15 10:00</td>
          <td>
            <div class="actions"><a href="orders-form.html?id=3" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 處理</a></div>
          </td>
        </tr>
        <tr>
          <td class="num">ORD202508020004</td>
          <td>王小明</td>
          <td>王小明</td>
          <td class="num">NT$ 2,480</td>
          <td><span class="badge badge-yellow">處理中</span></td>
          <td>2025-08-02 10:00</td>
          <td>
            <div class="actions"><a href="orders-form.html?id=4" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 處理</a></div>
          </td>
        </tr>
        <tr>
          <td class="num">ORD202510050005</td>
          <td>林美華</td>
          <td>林美華</td>
          <td class="num">NT$ 1,040</td>
          <td><span class="badge badge-yellow">待處理</span></td>
          <td>2025-10-05 14:20</td>
          <td>
            <div class="actions"><a href="orders-form.html?id=5" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 處理</a></div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
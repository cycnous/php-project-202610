後台首頁
<div><a href="/manager/list">帳號管理</a></div>
<div><a href="/milestone/list">大事記管理</a></div>
<!--
帳號管理
1.新增ManagerController： php artisan make:controller Admin/ManagerController
2.在ManagerController中新增public function list():帳號列表
3.在路由routes/web.php中新增/manager/list
4.在resources/views/admin新增manager資料夾
5.在resources/views/admin/manager新增list.blade.php

大事記管理
1. 新增大事記管理控制器 Admin/MileStoneController: php artisan make:controller Admin/MileStoneController
2. 在 Admin/MileStoneController 中新增 public function list() : 大事記列表
3. 在路由 routes/web.php 中新增 /admin/milestone/list
4. 在 resources/views/admin 新增 milestone資料夾
5. 在 resources/views/admin/milestone 新增 list.blade.php
6. 開啟範例網頁的 milestones.html 複製貼上到 resources/views/admin/milestone/list.blade.php

7. 新增大事記類別管理控制器 Admin/MileStoneTypeController: php artisan make:controller Admin/MileStoneTypeController

-大事記類別列表
8. 在 Admin/MileStoneTypeController 中新增 public function list()
9. 在路由 routes/web.php 中新增 /admin/milestone/typess/list
10. 在 resources/views/admin/milestone 新增 types資料夾: 大事記類別
11. 在 resources/views/admin/milestone/types 新增 list.blade.php

-大事記類別
12. 在 Admin/MileStoneTypeController 中新增 public function create()
13. 在路由 routes/web.php 中新增 /admin/milestone/types/create
14. 在 resources/views/admin/milestone/types 新增 create.blade.php

15. 新增Model MileStoneType: php artisan make:model Milestone/MileStoneType
16. 新增Model Milestone: php artisan make:model Milestone/MileStone
17. 新增資料表 大事記類別(milestone_type): 欄位: id A_I, label varchar(10), title varchar(10)
18. 新增資料表 大事記(milestone): 欄位: id A_I, typeId int, years char(4), months char(2), title varchar(200), content varchar(500), createTime timestamp 預設CURRENT_TIMESTAMP
19. 完成 MileStoneType & Milestone 兩個Model內容

20. 在 MileStoneTypeController function 中取出 MileStoneType model資料
21. 將 MileStoneTypeController function 中的資料渲染到 resources/views/admin/milestone/types/list.blade.php
22. 開啟範例網頁的 milestones.html 複製貼上到 resources/views/admin/milestone/types/list.blade.php (範例沒有大事記類別的網頁,借用這個網頁再調整欄位)
-->
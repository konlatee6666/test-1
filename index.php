<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>Italian Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- 
    หมายเหตุ: Sidebar ใช้ฟอนต์ 'Playfair Display' 
    คุณอาจจะต้องเพิ่มจากบริการอย่าง Google Fonts ตัวอย่าง:
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

<?php 
  // หากคุณมีไฟล์ sidebar.php ที่ใช้ Tailwind classes 
  // ให้ใช้ include 'sidebar_tailwind.php' หรือไฟล์ที่เกี่ยวข้อง
  // แต่ถ้าคุณใช้ไฟล์ style.css แยกต่างหาก ให้ใช้ include 'sidebar.php'
  // ในที่นี้สมมติว่าคุณต้องการให้ sidebar แสดงผลด้วย
  // หมายเหตุ: คุณอาจจะต้องอัปเดตไฟล์ sidebar.php ให้เข้ากับธีมสว่างใหม่นี้
  include 'header.php'; // หรือไฟล์ sidebar ที่คุณใช้งาน
?>

<!-- ส่วนเนื้อหาหลัก -->
<div class="ml-64 p-6">
  <div class="flex items-center mb-6">
    <svg class="h-8 w-8 mr-3 text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>
    </svg>
    <h1 class="text-gray-700 text-3xl font-bold">ภาพรวม</h1>
  </div>

  <?php
    // ดึงข้อมูลจากฐานข้อมูล
    $countProducts = $conn->query("SELECT COUNT(*) as c FROM products")->fetch_assoc()['c'];
    $countUsers    = $conn->query("SELECT COUNT(*) as c FROM users")->fetch_assoc()['c'];
    $countOrders   = $conn->query("SELECT COUNT(*) as c FROM orders")->fetch_assoc()['c'];
  ?>

  <!-- ตารางสถิติ -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center">
        <svg class="h-6 w-6 mr-3 text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 11h.01"/><path d="M11 15h.01"/><path d="M16 16h.01"/><path d="m2 16 2.22 6.67a1 1 0 0 0 .95.67h13.66a1 1 0 0 0 .95-.67L22 16"/><path d="M5.64 12.05a12.79 12.79 0 0 1 12.72 0"/><path d="M12 2v10"/>
        </svg>
        <h2 class="text-lg font-semibold text-gray-600">สินค้า</h2>
      </div>
      <p class="text-3xl text-gray-800 font-bold mt-2"><?= $countProducts; ?></p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center">
        <svg class="h-6 w-6 mr-3 text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
        </svg>
        <h2 class="text-lg font-semibold text-gray-600">ผู้ใช้</h2>
      </div>
      <p class="text-3xl text-gray-800 font-bold mt-2"><?= $countUsers; ?></p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center">
        <svg class="h-6 w-6 mr-3 text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/>
        </svg>
        <h2 class="text-lg font-semibold text-gray-600">ออเดอร์</h2>
      </div>
      <p class="text-3xl text-gray-800 font-bold mt-2"><?= $countOrders; ?></p>
    </div>
  </div>

  <!-- ส่วนออเดอร์ล่าสุด -->
  <div class="mt-10">
    <div class="flex items-center mb-4">
        <svg class="h-6 w-6 mr-3 text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
           <path d="M20 13V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h9"/><path d="M17 12h5"/><path d="M19.5 9.5v5"/>
        </svg>
        <h2 class="text-gray-700 text-xl font-semibold">ออเดอร์ล่าสุด</h2>
    </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full">
          <thead>
            <tr class="bg-gray-200">
              <th class="p-3 text-left text-sm font-bold text-gray-600 uppercase">ลูกค้า</th>
              <th class="p-3 text-left text-sm font-bold text-gray-600 uppercase">เมนู</th>
              <th class="p-3 text-left text-sm font-bold text-gray-600 uppercase">รวม</th>
              <th class="p-3 text-left text-sm font-bold text-gray-600 uppercase">สถานะ</th>
              <th class="p-3 text-left text-sm font-bold text-gray-600 uppercase">วันที่</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $res = $conn->query("SELECT * FROM orders ORDER BY id DESC LIMIT 5");
              while($row = $res->fetch_assoc()):
            ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
              <td class="p-3"><?= htmlspecialchars($row['customer']); ?></td>
              <td class="p-3"><?= htmlspecialchars($row['menu']); ?></td>
              <td class="p-3 text-yellow-600 font-semibold">฿<?= number_format($row['total'], 2); ?></td>
              <td class="p-3"><?= htmlspecialchars($row['status']); ?></td>
              <td class="p-3 text-gray-500"><?= $row['created_at']; ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>


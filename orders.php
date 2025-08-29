<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>จัดการคำสั่งซื้อ</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<?php include 'header.php'; ?>

<div class="ml-64 p-8">
  <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">จัดการคำสั่งซื้อ</h1>
  </div>

  <!-- ฟอร์มเพิ่มออเดอร์ -->
  <form action="add_order.php" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">เพิ่มออเดอร์ใหม่</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <input type="text" name="customer" placeholder="ชื่อลูกค้า" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <input type="text" name="menu" placeholder="เมนูที่สั่ง" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <input type="number" name="total" placeholder="ราคารวม" step="0.01" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <select name="status" class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 md:col-span-3">
          <option value="pending">รอดำเนินการ</option>
          <option value="cooking">กำลังทำ</option>
          <option value="done">เสร็จแล้ว</option>
        </select>
    </div>
    <button type="submit" class="mt-4 bg-yellow-500 text-white px-6 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-300 font-semibold">+ เพิ่มออเดอร์</button>
  </form>

  <!-- ตารางออเดอร์ -->
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-200">
        <tr>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">ID</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">ลูกค้า</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">เมนู</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">รวม</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">สถานะ</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">วันที่</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">การจัดการ</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php
          $res = $conn->query("SELECT * FROM orders ORDER BY id DESC");
          while($row = $res->fetch_assoc()):
        ?>
        <tr>
          <td class="p-4 text-gray-700"><?= $row['id']; ?></td>
          <td class="p-4 text-gray-900 font-medium"><?= htmlspecialchars($row['customer']); ?></td>
          <td class="p-4 text-gray-700"><?= htmlspecialchars($row['menu']); ?></td>
          <td class="p-4 text-yellow-600 font-semibold">฿<?= number_format($row['total'], 2); ?></td>
          <td class="p-4 text-gray-700">
            <?php 
                $status = $row['status'];
                $statusText = '';
                $statusColorClass = '';
                if($status == "pending") {
                    $statusText = "รอดำเนินการ";
                    $statusColorClass = "bg-yellow-100 text-yellow-800";
                } elseif ($status == "cooking") {
                    $statusText = "กำลังทำ";
                    $statusColorClass = "bg-blue-100 text-blue-800";
                } elseif ($status == "done") {
                    $statusText = "เสร็จแล้ว";
                    $statusColorClass = "bg-green-100 text-green-800";
                }
            ?>
            <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $statusColorClass; ?>">
                <?= htmlspecialchars($statusText); ?>
            </span>
          </td>
          <td class="p-4 text-gray-700"><?= date("d M Y, H:i", strtotime($row['created_at'])); ?></td>
          <td class="p-4">
            <a href="delete_order.php?id=<?= $row['id']; ?>" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบออเดอร์นี้?')" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition-colors">ลบ</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>

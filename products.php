<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>จัดการสินค้า</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<?php include 'header.php'; ?>

<div class="ml-64 p-8">
  <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">จัดการสินค้า</h1>
  </div>

  <!-- ฟอร์มเพิ่มสินค้า -->
  <form action="add_product.php" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">เพิ่มสินค้าใหม่</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <input type="text" name="name" placeholder="ชื่อสินค้า" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <textarea name="description" placeholder="รายละเอียด" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 md:col-span-2"></textarea>
        <input type="number" step="0.01" name="price" placeholder="ราคา" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
    </div>
    <button type="submit" class="mt-4 bg-yellow-500 text-white px-6 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-300 font-semibold">+ เพิ่มสินค้า</button>
  </form>

  <!-- ตารางสินค้า -->
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-200">
        <tr>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">ID</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">ชื่อ</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">ราคา</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">สถานะ</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">การจัดการ</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php
          $res = $conn->query("SELECT * FROM products ORDER BY id DESC");
          while($row = $res->fetch_assoc()):
        ?>
        <tr>
          <td class="p-4 text-gray-700"><?= $row['id']; ?></td>
          <td class="p-4 text-gray-900 font-medium"><?= htmlspecialchars($row['name']); ?></td>
          <td class="p-4 text-yellow-600 font-semibold">฿<?= number_format($row['price'], 2); ?></td>
          <td class="p-4 text-gray-700">
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                <?= htmlspecialchars($row['status']); ?>
            </span>
          </td>
          <td class="p-4">
            <a href="delete_product.php?id=<?= $row['id']; ?>" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบสินค้านี้?')" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition-colors">ลบ</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>

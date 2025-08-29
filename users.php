<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>จัดการผู้ใช้</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<?php include 'header.php'; ?>

<div class="ml-64 p-8">
  <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">จัดการผู้ใช้</h1>
  </div>

  <!-- ฟอร์มเพิ่มผู้ใช้ -->
  <form action="add_user.php" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">เพิ่มผู้ใช้ใหม่</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <input type="text" name="name" placeholder="ชื่อผู้ใช้" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <input type="email" name="email" placeholder="อีเมล" required class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <input type="text" name="phone" placeholder="เบอร์โทร" class="p-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
    </div>
    <button type="submit" class="mt-4 bg-yellow-500 text-white px-6 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-300 font-semibold">+ เพิ่มผู้ใช้</button>
  </form>

  <!-- ตารางผู้ใช้ -->
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-200">
        <tr>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">ID</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">ชื่อ</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">อีเมล</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">เบอร์โทร</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">สถานะ</th>
          <th class="p-4 text-left text-sm font-semibold text-gray-600 uppercase">การจัดการ</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php
          $res = $conn->query("SELECT * FROM users ORDER BY id DESC");
          while($row = $res->fetch_assoc()):
        ?>
        <tr>
          <td class="p-4 text-gray-700"><?= $row['id']; ?></td>
          <td class="p-4 text-gray-900 font-medium"><?= htmlspecialchars($row['name']); ?></td>
          <td class="p-4 text-gray-700"><?= htmlspecialchars($row['email']); ?></td>
          <td class="p-4 text-gray-700"><?= htmlspecialchars($row['phone']); ?></td>
          <td class="p-4 text-gray-700">
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                <?= htmlspecialchars($row['status']); ?>
            </span>
          </td>
          <td class="p-4">
            <a href="delete_user.php?id=<?= $row['id']; ?>" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้นี้?')" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition-colors">ลบ</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>

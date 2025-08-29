<?php
// sidebar.php
// Sidebar component updated to a light (white and yellow) theme with active state logic.

// 1. ดึงชื่อไฟล์ของหน้าปัจจุบัน เช่น 'index.php', 'products.php'
$currentPage = basename($_SERVER['PHP_SELF']);

// 2. กำหนดคลาส CSS สำหรับเมนูที่ถูกเลือก และเมนูปกติในธีมสีขาว
$activeClass = 'flex items-center px-6 py-3 text-yellow-600 bg-yellow-50 transition-colors duration-200';
$inactiveClass = 'flex items-center px-6 py-3 text-gray-600 hover:text-yellow-600 hover:bg-yellow-50 transition-colors duration-200';
?>
<div class="fixed left-0 top-0 h-full w-64 bg-white border-r border-gray-200 z-10">
  <div class="p-6 border-b border-gray-200">
    <h1 class="font-playfair text-2xl font-bold text-gray-800">konlatee</h1>
    <p class="text-gray-500 text-sm mt-1">Admin Dashboard</p>
  </div>
  <nav class="mt-6">
    <!-- 3. ใช้ Ternary Operator ตรวจสอบและกำหนดคลาสสำหรับแต่ละเมนู -->
    <a href="index.php" class="<?= ($currentPage == 'index.php') ? $activeClass : $inactiveClass; ?>">
      <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>
      </svg>
      <span>ภาพรวม</span>
    </a>
    
    <a href="products.php" class="<?= ($currentPage == 'products.php') ? $activeClass : $inactiveClass; ?>">
      <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M15 11h.01"/><path d="M11 15h.01"/><path d="M16 16h.01"/><path d="m2 16 2.22 6.67a1 1 0 0 0 .95.67h13.66a1 1 0 0 0 .95-.67L22 16"/><path d="M5.64 12.05a12.79 12.79 0 0 1 12.72 0"/><path d="M12 2v10"/>
      </svg>
      <span>สินค้า</span>
    </a>

    <a href="users.php" class="<?= ($currentPage == 'users.php') ? $activeClass : $inactiveClass; ?>">
      <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
      </svg>
      <span>ผู้ใช้</span>
    </a>
    
    <a href="orders.php" class="<?= ($currentPage == 'orders.php') ? $activeClass : $inactiveClass; ?>">
      <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/>
      </svg>
      <span>คำสั่งซื้อ</span>
    </a>
  </nav>
</div>


<!-- Kế thừa từ trang Views/layouts/default.php được cấu hình tỏng app/config/view.php -->
<?php $this->layout(config('view.layout')) ?>

<!-- Load nội dung trang home/dashboard.php vào vị trí section('page') của <layouts> -->
<?php $this->start('page') ?>
<?php $this->insert('home/dashboard', [
    'smartphones' => $smartphones,
    'tablets' => $tablets,
    'laptops' => $laptops,
    'count' => $count
]); ?>
<?php $this->stop() ?>
<!-- Chèn script vào vị trí section("js") trong layout default -->
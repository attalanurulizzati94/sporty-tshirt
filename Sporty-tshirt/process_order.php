<?php
require_once 'config.php';

// Pastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#order-section');
    exit;
}

// Ambil dan bersihkan data input
$selected_color = isset($_POST['color']) ? trim(htmlspecialchars($_POST['color'])) : '';
$selected_size  = isset($_POST['size']) ? trim(htmlspecialchars($_POST['size'])) : '';
$quantity       = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 0;
$customer_note  = isset($_POST['note']) ? trim(htmlspecialchars($_POST['note'])) : '';

$errors = [];

// Validasi Warna
if (empty($selected_color) || !array_key_exists($selected_color, $product['colors'])) {
    $errors[] = 'Silakan pilih variasi warna terlebih dahulu.';
}

// Validasi Ukuran
if (empty($selected_size) || !in_array($selected_size, $product['sizes'])) {
    $errors[] = 'Silakan pilih ukuran (size) terlebih dahulu.';
}

// Validasi Jumlah
if ($quantity < 1 || $quantity > 50) {
    $errors[] = 'Jumlah pemesanan minimal 1 pcs dan maksimal 50 pcs.';
}

// Jika terdapat error validasi, simpan pesan error ke session dan kembalikan ke section order
if (!empty($errors)) {
    $_SESSION['order_errors'] = $errors;
    $_SESSION['old_input'] = [
        'color'    => $selected_color,
        'size'     => $selected_size,
        'quantity' => $quantity > 0 ? $quantity : 1,
        'note'     => $customer_note
    ];
    unset($_SESSION['order_summary']);
    header('Location: index.php#order-section');
    exit;
}

// Perhitungan Harga di Sisi Server (PHP)
$unit_price     = $product['price_promo'];
$normal_total   = $product['price_normal'] * $quantity;
$subtotal       = $unit_price * $quantity;
$total_savings  = $normal_total - $subtotal;

// Susun Pesan WhatsApp Otomatis
$wa_message  = "Halo Admin *" . $brand_info['name'] . "*! Saya ingin memesan T-Shirt Sporty dengan rincian berikut:\n\n";
$wa_message .= "• *Produk:* " . $product['name'] . "\n";
$wa_message .= "• *Warna:* " . $selected_color . "\n";
$wa_message .= "• *Ukuran:* " . $selected_size . "\n";
$wa_message .= "• *Jumlah:* " . $quantity . " pcs\n";
$wa_message .= "• *Harga Satuan:* " . format_rupiah($unit_price) . "\n";
$wa_message .= "• *Estimasi Total:* " . format_rupiah($subtotal) . " *(Belum termasuk ongkir)*\n";

if (!empty($customer_note)) {
    $wa_message .= "• *Catatan:* " . $customer_note . "\n";
}

$wa_message .= "\nMohon informasi ketersediaan stok dan rincian ongkos kirim ke alamat saya. Terima kasih!";

// Encode pesan untuk URL wa.me
$wa_url = "https://wa.me/" . $brand_info['whatsapp'] . "?text=" . rawurlencode($wa_message);

// Simpan ringkasan pesanan valid ke dalam Session
$_SESSION['order_summary'] = [
    'product_name'  => $product['name'],
    'color'         => $selected_color,
    'size'          => $selected_size,
    'quantity'      => $quantity,
    'unit_price'    => $unit_price,
    'subtotal'      => $subtotal,
    'total_savings' => $total_savings,
    'note'          => $customer_note,
    'wa_url'        => $wa_url
];

// Simpan input terakhir agar form tetap terisi
$_SESSION['old_input'] = [
    'color'    => $selected_color,
    'size'     => $selected_size,
    'quantity' => $quantity,
    'note'     => $customer_note
];

unset($_SESSION['order_errors']);

// Arahkan kembali ke bagian ringkasan pesanan
header('Location: index.php#order-summary-box');
exit;
?>
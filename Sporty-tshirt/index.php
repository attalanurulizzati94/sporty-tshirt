<?php
require_once 'config.php';

// Ambil data error, ringkasan order, dan old input dari session jika ada
$order_errors  = $_SESSION['order_errors'] ?? [];
$order_summary = $_SESSION['order_summary'] ?? null;
$old_input     = $_SESSION['old_input'] ?? [
    'color'    => '',
    'size'     => '',
    'quantity' => 1,
    'note'     => ''
];

// Hapus notifikasi error setelah ditampilkan sekali agar bersih saat refresh berikutnya
unset($_SESSION['order_errors']);

// Gambar dengan fallback URL profesional (jika file lokal di assets/images/ belum diisi)
$img_hero          = get_image('assets/images/hero.jpg', 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?auto=format&fit=crop&w=900&q=80');
$img_product_front = get_image('assets/images/product-front.jpg', 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=80');
$img_product_back  = get_image('assets/images/product-back.jpg', 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&w=800&q=80');
$img_model         = get_image('assets/images/model.jpg', 'https://images.unsplash.com/photo-1518310383802-640c2de311b2?auto=format&fit=crop&w=900&q=80');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($brand_info['name']) ?> — T-Shirt Sporty Wanita Plus Size Nyaman & Percaya Diri</title>
    <meta name="description" content="T-shirt sporty wanita plus size yang nyaman, tidak ketat di perut, dan stylish untuk menemani setiap gerakan olahragamu.">
    
    <!-- Google Fonts: Poppins untuk Heading & Inter untuk Body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- =====================================================================
         STICKY NAVBAR (CSS-Only Responsive Navigation)
         ===================================================================== -->
    <header class="navbar">
        <div class="container nav-container">
            <a href="#top" class="brand-logo"><?= htmlspecialchars($brand_info['name']) ?></a>
            
            <!-- Checkbox Hack untuk Menu Mobile Tanpa JavaScript -->
            <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Buka Menu">
            <label for="nav-toggle" class="nav-toggle-label">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <nav class="nav-menu">
                <a href="#pain-points">Cerita Kita</a>
                <a href="#product-intro">Produk</a>
                <a href="#gallery">Galeri</a>
                <a href="#size-guide">Panduan Ukuran</a>
                <a href="#faq">FAQ</a>
                <a href="#order-section" class="nav-cta">Pesan Sekarang</a>
            </nav>
        </div>
    </header>

    <main id="top">

        <!-- =====================================================================
             SECTION 1 — HERO SECTION (ATTENTION)
             ===================================================================== -->
        <section class="hero-section">
            <div class="container hero-grid">
                <div class="hero-content">
                    <span class="badge-pill">Activewear Plus Size • XL – 5XL</span>
                    <h1>Jangan Biarkan Rasa Insecure Menghalangimu untuk Bergerak!</h1>
                    <p class="hero-subheadline">
                        Ingin olahraga dengan nyaman tanpa terus-menerus khawatir dengan lipatan tubuh yang terlihat? Saatnya tampil lebih percaya diri dengan T-shirt sporty yang nyaman, stylish, dan mendukung setiap gerakanmu.
                    </p>
                    
                    <div class="hero-cta-group">
                        <a href="#product-intro" class="btn btn-outline">TEMUKAN OUTFIT NYAMANMU</a>
                        <a href="#order-section" class="btn btn-primary">BELI SEKARANG</a>
                    </div>

                    <ul class="hero-highlights">
                        <li>
                            <span class="check-icon">✓</span>
                            <span>Potongan Rileks & Tidak Ketat di Perut</span>
                        </li>
                        <li>
                            <span class="check-icon">✓</span>
                            <span>Bahan Lembut & Tidak Menerawang</span>
                        </li>
                        <li>
                            <span class="check-icon">✓</span>
                            <span>Ukuran Lengkap XL hingga 5XL</span>
                        </li>
                    </ul>
                </div>

                <div class="hero-image-wrapper">
                    <div class="hero-image-card">
                        <img src="<?= htmlspecialchars($img_hero) ?>" alt="Model wanita plus size mengenakan T-shirt sporty dengan percaya diri">
                        <div class="floating-caption">
                            <strong>Dirancang untuk Kenyamanan</strong>
                            <span>Bebas bergerak tanpa perlu menarik-narik baju</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 2 — PAIN POINT (INTEREST)
             ===================================================================== -->
        <section id="pain-points" class="section-beige">
            <div class="container">
                <div class="section-header text-center">
                    <span class="eyebrow">Kamu Tidak Sendirian</span>
                    <h2>Sering Ingin Olahraga, Tapi Tidak Percaya Diri dengan Outfit Sendiri?</h2>
                </div>

                <div class="pain-grid">
                    <article class="card pain-card">
                        <div class="pain-number">01</div>
                        <h3>Takut Lipatan Tubuh Terlihat</h3>
                        <p>Baju olahraga di pasaran sering kali memakai bahan tipis yang menempel erat di kulit, membuat lipatan perut, punggung, dan pinggang tercetak jelas.</p>
                    </article>

                    <article class="card pain-card">
                        <div class="pain-number">02</div>
                        <h3>Tidak Nyaman dengan Baju Terlalu Ketat</h3>
                        <p>Alih-alih fokus pada gerakan workout, konsentrasimu justru habis untuk terus menarik ujung baju ke bawah agar area pinggul tetap tertutup.</p>
                    </article>

                    <article class="card pain-card">
                        <div class="pain-number">03</div>
                        <h3>Sulit Menemukan Outfit Sporty yang Cocok</h3>
                        <p>Ukuran besar sering kali hanya tersedia dalam model yang membosankan, kebesaran seperti karung, atau justru tetap terasa sempit di bagian lengan.</p>
                    </article>

                    <article class="card pain-card">
                        <div class="pain-number">04</div>
                        <h3>Takut Menjadi Pusat Perhatian</h3>
                        <p>Rasa cemas terhadap tatapan atau penilaian orang lain di tempat umum membuatmu mengurungkan niat untuk mulai bergerak aktif.</p>
                    </article>
                </div>

                <div class="emotional-callout">
                    <p>
                        “Kamu tidak seharusnya merasa harus menyembunyikan diri hanya untuk bisa menikmati olahraga. Kamu juga berhak merasa nyaman, bebas bergerak, dan percaya diri.”
                    </p>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 3 — PRODUCT INTRODUCTION
             ===================================================================== -->
        <section id="product-intro" class="section-white">
            <div class="container">
                <div class="product-intro-grid">
                    <div class="product-intro-image">
                        <img src="<?= htmlspecialchars($img_product_front) ?>" alt="Tampilan T-Shirt Sporty Wanita Plus Size">
                    </div>

                    <div class="product-intro-details">
                        <span class="eyebrow">Solusi Outfit Nyamanmu</span>
                        <h2>Kenalan dengan T-Shirt Sporty yang Mengutamakan Kenyamananmu!</h2>
                        <p class="intro-lead">
                            Kami merancang kaos olahraga ini khusus untuk mendampingimu bergerak tanpa rasa khawatir. Potongannya memberikan ruang bernapas bagi tubuh sekaligus tetap terlihat rapi dan modern.
                        </p>

                        <div class="spec-list">
                            <div class="spec-item">
                                <span class="spec-label">Nama Produk</span>
                                <span class="spec-value"><?= htmlspecialchars($product['name']) ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Desain & Model</span>
                                <span class="spec-value"><?= htmlspecialchars($product['design']) ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Jenis Potongan</span>
                                <span class="spec-value"><?= htmlspecialchars($product['cut']) ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Material Kain</span>
                                <span class="spec-value"><?= htmlspecialchars($product['material']) ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Rentang Ukuran</span>
                                <span class="spec-value"><?= htmlspecialchars($product['size_range']) ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Pilihan Warna</span>
                                <span class="spec-value">
                                    <div class="color-dots-inline">
                                        <?php foreach ($product['colors'] as $color_name => $hex): ?>
                                            <span class="color-tag">
                                                <i style="background-color: <?= htmlspecialchars($hex) ?>;"></i>
                                                <?= htmlspecialchars($color_name) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Kegunaan Produk</span>
                                <span class="spec-value"><?= htmlspecialchars($product['usage']) ?></span>
                            </div>
                        </div>

                        <div class="mt-24">
                            <a href="#order-section" class="btn btn-primary">Pilih Warna & Ukuranmu</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 4 — PRODUCT BENEFITS
             ===================================================================== -->
        <section class="section-beige">
            <div class="container">
                <div class="section-header text-center">
                    <span class="eyebrow">Dirancang Khusus Untukmu</span>
                    <h2>Lebih Nyaman Bergerak, Lebih Bebas Menikmati Aktivitas!</h2>
                </div>

                <div class="benefits-grid">
                    <div class="card benefit-card">
                        <div class="benefit-icon">01</div>
                        <h3>Potongan Nyaman untuk Aktivitas</h3>
                        <p>Memberikan ruang gerak yang leluasa di area lengan, dada, perut, dan pinggul sehingga tidak terasa sesak saat mengangkat tangan atau membungkuk.</p>
                    </div>

                    <div class="card benefit-card">
                        <div class="benefit-icon">02</div>
                        <h3>Material Sesuai Kebutuhan Olahraga</h3>
                        <p>Menggunakan karakter kain pilihan yang ramah di kulit, tidak kaku, serta mendukung kenyamanan selama kamu beraktivitas fisik.</p>
                    </div>

                    <div class="card benefit-card">
                        <div class="benefit-icon">03</div>
                        <h3>Desain Sporty dan Modern</h3>
                        <p>Tampilan minimalis yang mudah dipadukan dengan legging, celana training, maupun celana santai favoritmu untuk tampilan tetap stylish.</p>
                    </div>

                    <div class="card benefit-card">
                        <div class="benefit-icon">04</div>
                        <h3>Pilihan Ukuran yang Jelas</h3>
                        <p>Tersedia panduan ukuran terukur dari XL hingga 5XL untuk membantumu menemukan ukuran paling pas tanpa perlu menebak-nebak.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 5 — EMOTIONAL DESIRE (DESIRE)
             ===================================================================== -->
        <section class="section-desire">
            <div class="container desire-grid">
                <div class="desire-image">
                    <img src="<?= htmlspecialchars($img_model) ?>" alt="Wanita plus size tersenyum bahagia dan percaya diri saat berolahraga">
                </div>
                <div class="desire-content">
                    <span class="eyebrow-light">Self-Love in Every Move</span>
                    <h2>Kamu Tidak Harus Menunggu Kurus untuk Mulai Merasa Percaya Diri.</h2>
                    <p>
                        Bayangkan bisa menikmati olahraga tanpa harus terus-menerus menarik baju atau khawatir dengan penampilanmu. Fokus pada setiap gerakan, nikmati prosesnya, dan jadilah versi dirimu yang lebih sehat.
                    </p>
                    <a href="#order-section" class="btn btn-accent">Mulai Langkah Nyamanmu Hari Ini</a>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 6 — PRODUCT GALLERY
             ===================================================================== -->
        <section id="gallery" class="section-white">
            <div class="container">
                <div class="section-header text-center">
                    <span class="eyebrow">Detail Produk</span>
                    <h2>Lihat Lebih Dekat Setiap Detailnya</h2>
                    <p class="section-desc">Ganti foto di bawah ini dengan foto studio produk aslimu melalui folder <code>assets/images/</code>.</p>
                </div>

                <div class="gallery-grid">
                    <figure class="gallery-item">
                        <img src="<?= htmlspecialchars($img_product_front) ?>" alt="Foto tampak depan T-shirt sporty">
                        <figcaption>Tampak Depan — Potongan Rileks & Rapi</figcaption>
                    </figure>

                    <figure class="gallery-item">
                        <img src="<?= htmlspecialchars($img_product_back) ?>" alt="Foto tampak belakang T-shirt sporty">
                        <figcaption>Tampak Belakang — Panjang Menutup Area Pinggul</figcaption>
                    </figure>

                    <figure class="gallery-item">
                        <img src="<?= htmlspecialchars($img_model) ?>" alt="Foto produk saat dikenakan model plus size">
                        <figcaption>Dikenakan Model — Nyaman untuk Bergerak Aktif</figcaption>
                    </figure>

                    <div class="gallery-item gallery-detail-box">
                        <div class="detail-box-inner">
                            <span class="badge-pill">Detail Bahan & Warna</span>
                            <h3>Pilihan Warna Earthy & Feminine</h3>
                            <p>Dirancang dengan palet warna netral dan lembut yang mudah dipadupadankan serta tidak mencolok saat dipakai berolahraga.</p>
                            <div class="swatch-showcase">
                                <?php foreach ($product['colors'] as $color_name => $hex): ?>
                                    <div class="swatch-item">
                                        <span class="swatch-circle" style="background-color: <?= htmlspecialchars($hex) ?>;"></span>
                                        <small><?= htmlspecialchars($color_name) ?></small>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <p class="placeholder-note">*[Placeholder: Tambahkan foto makro tekstur serat kain di slot ini]*</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 7 — SIZE GUIDE
             ===================================================================== -->
        <section id="size-guide" class="section-beige">
            <div class="container">
                <div class="section-header text-center">
                    <span class="eyebrow">Panduan Ukuran</span>
                    <h2>Temukan Ukuran yang Paling Pas untuk Tubuhmu</h2>
                    <p class="section-desc"><strong>Ukur tubuhmu terlebih dahulu agar mendapatkan ukuran yang paling nyaman.</strong></p>
                </div>

                <div class="table-responsive">
                    <table class="size-table">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Lingkar Dada</th>
                                <th>Panjang Baju</th>
                                <th>Rekomendasi Ukuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($size_guide as $row): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($row['size']) ?></strong></td>
                                    <td><?= htmlspecialchars($row['chest']) ?></td>
                                    <td><?= htmlspecialchars($row['length']) ?></td>
                                    <td><?= htmlspecialchars($row['rec']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <p class="table-footnote text-center">
                    *Catatan: Toleransi ukuran jahitan 1–2 cm. Data rekomendasi di atas merupakan placeholder yang dapat disesuaikan dengan standar ukuran konveksi Anda.
                </p>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 8 — TESTIMONIAL (Honest Placeholder Design)
             ===================================================================== -->
        <section class="section-white">
            <div class="container">
                <div class="section-header text-center">
                    <span class="eyebrow">Cerita Pengguna</span>
                    <h2>Apa Kata Mereka yang Sudah Mencoba?</h2>
                    <p class="section-desc">Ruang ini disiapkan untuk menampilkan ulasan asli dari pelanggan setelah produk diluncurkan.</p>
                </div>

                <div class="testimonial-grid">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <article class="card testimonial-card">
                            <div class="placeholder-badge">SLOT ULASAN PELANGGAN #<?= $i ?></div>
                            <div class="testi-header">
                                <div class="avatar-placeholder">Foto</div>
                                <div>
                                    <h4>[Nama Pelanggan Asli]</h4>
                                    <span>[Ukuran yang Dipilih — Contoh: Size 3XL]</span>
                                </div>
                            </div>
                            <p class="testi-quote">
                                “[Placeholder Ulasan: Masukkan kutipan pengalaman jujur pelanggan mengenai kenyamanan bahan, potongan di area perut, dan rasa percaya diri saat berolahraga.]”
                            </p>
                        </article>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 9 — SPECIAL OFFER & ORDER FORM (PHP POST PROCESSING)
             ===================================================================== -->
        <section id="order-section" class="section-order">
            <div class="container">
                <div class="order-wrapper">
                    
                    <!-- Kolom Informasi Produk & Penawaran -->
                    <div class="order-info">
                        <span class="badge-pill">Penawaran Spesial</span>
                        <h2><?= htmlspecialchars($product['name']) ?></h2>
                        
                        <div class="price-box">
                            <span class="price-normal">Harga Normal: <del><?= format_rupiah($product['price_normal']) ?></del></span>
                            <div class="price-promo"><?= format_rupiah($product['price_promo']) ?> <small>/ pcs</small></div>
                            <span class="placeholder-note">*Harga di atas adalah placeholder dan dapat diubah melalui file <code>config.php</code>.</span>
                        </div>

                        <div class="stock-status">
                            <span class="status-dot"></span>
                            <span>Status Stok: <strong><?= htmlspecialchars($product['stock_status']) ?></strong></span>
                        </div>

                        <ul class="order-guarantees">
                            <li>✓ Potongan ramah untuk tubuh plus size & lipatan perut</li>
                            <li>✓ Bisa konsultasi ukuran terlebih dahulu via WhatsApp</li>
                            <li>✓ Garansi tukar ukuran sesuai syarat & ketentuan</li>
                        </ul>
                    </div>

                    <!-- Kolom Form Pemesanan (PHP Native POST) -->
                    <div class="order-form-card">
                        <h3>Lengkapi Pilihanmu</h3>
                        <p class="form-subtitle">Pilih warna, ukuran, dan jumlah untuk menghitung total serta menyiapkan pesan WhatsApp otomatis.</p>

                        <!-- Tampilkan Error Validasi dari PHP jika ada -->
                        <?php if (!empty($order_errors)): ?>
                            <div class="alert alert-error" role="alert">
                                <strong>Mohon periksa kembali pilihanmu:</strong>
                                <ul>
                                    <?php foreach ($order_errors as $err): ?>
                                        <li><?= htmlspecialchars($err) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="process_order.php" method="POST" class="checkout-form">
                            
                            <!-- Pilihan Warna -->
                            <div class="form-group">
                                <label for="color">1. Pilih Warna <span class="required">*</span></label>
                                <select name="color" id="color" required>
                                    <option value="">-- Pilih Warna Favoritmu --</option>
                                    <?php foreach ($product['colors'] as $color_name => $hex): ?>
                                        <option value="<?= htmlspecialchars($color_name) ?>" <?= ($old_input['color'] === $color_name) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($color_name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Pilihan Ukuran -->
                            <div class="form-group">
                                <label for="size">2. Pilih Ukuran <span class="required">*</span> <a href="#size-guide" class="inline-link">(Lihat Tabel Ukuran)</a></label>
                                <select name="size" id="size" required>
                                    <option value="">-- Pilih Ukuran (XL – 5XL) --</option>
                                    <?php foreach ($product['sizes'] as $size_option): ?>
                                        <option value="<?= htmlspecialchars($size_option) ?>" <?= ($old_input['size'] === $size_option) ? 'selected' : '' ?>>
                                            Size <?= htmlspecialchars($size_option) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Input Jumlah -->
                            <div class="form-group">
                                <label for="quantity">3. Jumlah Pembelian <span class="required">*</span></label>
                                <input type="number" name="quantity" id="quantity" min="1" max="50" value="<?= (int) $old_input['quantity'] ?>" required>
                            </div>

                            <!-- Catatan Opsional -->
                            <div class="form-group">
                                <label for="note">4. Catatan Tambahan (Opsional)</label>
                                <input type="text" name="note" id="note" placeholder="Contoh: Lingkar dada saya 122 cm, mohon bantu cek ukuran" value="<?= htmlspecialchars($old_input['note']) ?>">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                HITUNG SUBTOTAL & SIAPKAN PESANAN
                            </button>
                        </form>

                        <!-- Ringkasan Pesanan & Tombol WhatsApp Hasil Proses PHP -->
                        <?php if ($order_summary): ?>
                            <div id="order-summary-box" class="summary-box">
                                <h4>Ringkasan Pesananmu</h4>
                                <div class="summary-row">
                                    <span>Produk</span>
                                    <strong><?= htmlspecialchars($order_summary['product_name']) ?></strong>
                                </div>
                                <div class="summary-row">
                                    <span>Variasi</span>
                                    <strong><?= htmlspecialchars($order_summary['color']) ?> — Size <?= htmlspecialchars($order_summary['size']) ?></strong>
                                </div>
                                <div class="summary-row">
                                    <span>Jumlah</span>
                                    <strong><?= $order_summary['quantity'] ?> pcs × <?= format_rupiah($order_summary['unit_price']) ?></strong>
                                </div>
                                <?php if ($order_summary['total_savings'] > 0): ?>
                                    <div class="summary-row savings-row">
                                        <span>Total Hemat</span>
                                        <strong>- <?= format_rupiah($order_summary['total_savings']) ?></strong>
                                    </div>
                                <?php endif; ?>
                                <div class="summary-total">
                                    <span>Subtotal Harga</span>
                                    <strong><?= format_rupiah($order_summary['subtotal']) ?></strong>
                                </div>
                                <p class="shipping-note">*Belum termasuk ongkos kirim (akan diinformasikan admin via WhatsApp).</p>

                                <a href="<?= htmlspecialchars($order_summary['wa_url']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-block">
                                    BELI SEKARANG VIA WHATSAPP
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 10 — FAQ (HTML5 <details> & <summary> Tanpa JavaScript)
             ===================================================================== -->
        <section id="faq" class="section-white">
            <div class="container container-narrow">
                <div class="section-header text-center">
                    <span class="eyebrow">Masih Ragu?</span>
                    <h2>Pertanyaan yang Sering Diajukan</h2>
                </div>

                <div class="faq-list">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <details class="faq-item" <?= ($index === 0) ? 'open' : '' ?>>
                            <summary><?= htmlspecialchars($faq['q']) ?></summary>
                            <div class="faq-answer">
                                <p><?= htmlspecialchars($faq['a']) ?></p>
                            </div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- =====================================================================
             SECTION 11 — FINAL CTA (ACTION)
             ===================================================================== -->
        <section class="section-final-cta">
            <div class="container text-center">
                <h2>Sudah Saatnya Kamu Bergerak dengan Lebih Nyaman dan Percaya Diri!</h2>
                <p>
                    Jangan biarkan rasa insecure membuatmu terus menunda aktivitas yang ingin kamu mulai. Pilih outfit yang membuatmu nyaman dan nikmati setiap prosesnya.
                </p>
                <a href="#order-section" class="btn btn-primary btn-lg">PILIH UKURANMU SEKARANG</a>
            </div>
        </section>

    </main>

    <!-- =====================================================================
         SECTION 12 — FOOTER
         ===================================================================== -->
    <footer class="footer">
        <div class="container footer-grid">
            <div class="footer-col">
                <div class="footer-logo"><?= htmlspecialchars($brand_info['name']) ?></div>
                <p><?= htmlspecialchars($brand_info['description']) ?></p>
            </div>

            <div class="footer-col">
                <h4>Hubungi Kami</h4>
                <ul>
                    <li>
                        <strong>WhatsApp:</strong> 
                        <a href="https://wa.me/<?= htmlspecialchars($brand_info['whatsapp']) ?>" target="_blank" rel="noopener noreferrer">
                            <?= htmlspecialchars($brand_info['wa_display']) ?>
                        </a>
                    </li>
                    <li>
                        <strong>Instagram:</strong> 
                        <a href="<?= htmlspecialchars($brand_info['ig_url']) ?>" target="_blank" rel="noopener noreferrer">
                            <?= htmlspecialchars($brand_info['instagram']) ?>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Informasi Layanan</h4>
                <p><strong>Pengiriman:</strong> <?= htmlspecialchars($brand_info['shipping']) ?></p>
                <p class="mt-8"><strong>Kebijakan Penukaran:</strong> <?= htmlspecialchars($brand_info['return_policy']) ?></p>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p><?= htmlspecialchars($brand_info['copyright']) ?></p>
            </div>
        </div>
    </footer>

    <!-- =====================================================================
         STICKY BUY BUTTON UNTUK LAYAR MOBILE (CSS-Only Sticky Bottom Bar)
         ===================================================================== -->
    <div class="mobile-sticky-bar">
        <div class="sticky-price-info">
            <small>Harga Promo</small>
            <strong><?= format_rupiah($product['price_promo']) ?></strong>
        </div>
        <a href="#order-section" class="btn btn-primary">PILIH UKURAN</a>
    </div>

</body>
</html>
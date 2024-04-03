<?php
// header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>My Website</title>
</head>

<body>
    <!-- Header -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1><span>P</span>ict <span>R</span>oom</h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="#hero" data-after="Home">Home</a></li>
                        <li><a href="#about" data-after="About">About</a></li>
                        <li><a href="#contact" data-after="Contact">Contact</a></li>
                        <li><a href="awal.php" data-after="PictRoom">PictRoom</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->


    <!-- Hero Section  -->
    <section id="hero">
        <div class="hero container">
            <div>
                <h1>Welcome, <span></span></h1>
                <h1><span></span></h1>
                <h1>PictRoom <span></span></h1>
            </div>
        </div>
    </section>
    <!-- End Hero Section  -->

    <!-- About Section -->
    <section id="about">
        <div class="about container">
            <div class="col-left">
                <div class="about-img">
                    <img src="css/PictRoomLogo.png" alt="img">
                </div>
            </div>
            <div class="col-right">
                <h1 class="section-title">About <span>PictRoom</span></h1>
                <h2>Website gallery</h2>
                <p> Pictroom adalah sebuah platform atau layanan yang di buat dengan latar belakang sebagai tugas
                    portofolio. Jika Pictroom adalah layanan yang nyata, mungkin tujuan dibalik pengembangannya adalah
                    untuk menyediakan fitur yang mirip dengan "Search by Image" di Google Images dan layanan lainnya
                    seperti Pinterest. Fitur ini memberikan kemampuan bagi pengguna untuk mengunggah gambar atau
                    mengunduh gambar untuk menyimpan gambar, dan juga gambar gambar di Pictroom bisa menjadi
                    referensi bagi pengguna.</p>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Contact Section -->
    <section id="contact">
        <div class="contact container">
            <div>
                <h1 class="section-title">Contact <span>info</span></h1>
            </div>
            <div class="contact-items">
                <div class="contact-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
                    <div class="contact-info">
                        <h1>Phone</h1>
                        <h2>+628799765680</h2>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
                    <div class="contact-info">
                        <h1>Email</h1>
                        <h2>alamsyahnugraha90@gmail.com</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- Footer -->
    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1><span>P</span>ict <span>R</span>oom</h1>
            </div>
            <div class="social-icon">
                <div class="social-item">
                    <a href="https://github.com/Taka1234567891"><img src="https://img.icons8.com/bubbles/50/github.png"
                            alt="github" />" /></a>
                </div>
                <div class="social-item">
                    <a href="https://www.instagram.com/alamsyahadhim"><img
                            src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
                </div>
                <div class="social-item">
                    <a href="https://wa.me/6285799765680"><img src="https://img.icons8.com/bubbles/50/whatsapp.png"
                            alt="whatsapp" /></a>
                </div>
    </section>
    <!-- End Footer -->
    <script src="app.js"></script>
</body>

</html>
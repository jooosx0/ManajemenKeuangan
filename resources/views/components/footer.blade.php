<footer class="footer">
    <p>&copy; {{ date('Y') }} Forum Open Source Teknik Informatika. All rights reserved.</p>
</footer>

<style>
    /* Styling untuk footer */
    .footer {
        background-color: #455A64; /* Warna biru gelap */
        color: white; /* Warna teks */
        text-align: center; /* Teks di tengah */
        padding: 15px; /* Ruang di dalam footer */
        margin-top: auto; /* Memastikan footer tetap di bawah */
        position: relative; /* Menghindari tumpang tindih */
        bottom: 0;
        width: 100%; /* Memastikan footer selebar halaman */
    }

    /* Body layout */
    body {
        display: flex;
        flex-direction: column; /* Tata letak vertikal: header, konten, footer */
        min-height: 100vh; /* Tinggi minimum sesuai viewport */
        margin: 0; /* Hilangkan margin default */
    }

    /* Konten utama */
    .content {
        flex: 1; /* Isi sisa ruang di antara header dan footer */
        padding: 20px; /* Jarak ke tepi */
    }
</style>

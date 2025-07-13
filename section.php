<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating & Komentar - Danau Toba</title>
    <link rel="stylesheet" href="rating.css">
</head>
<body>

    <main>

        <div class="comment-container">

            <section class="comment-form-section">
                <h2>Tinggalkan Komentar</h2>
                <form id="comment-form">
                    <div class="form-group">
                        <label for="name-input">Nama Anda:</label>
                        <input type="text" id="name-input" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="rating-input">Rating (1-5):</label>
                        <input type="number" id="rating-input" min="1" max="5" value="5" required>
                    </div>
                    <div class="form-group">
                        <label for="comment-input">Komentar Anda:</label>
                        <textarea id="comment-input" rows="4" placeholder="Tulis komentar di sini..." required></textarea>
                    </div>
                    <button type="submit">Kirim Komentar</button>
                </form>
            </section>

            <section class="comments-list-section">
                <h2>Komentar Pengunjung</h2>
                <div id="comments-list">
                    </div>
            </section>

        </div> </main>

    <script src="script.js"></script>
</body>
</html>
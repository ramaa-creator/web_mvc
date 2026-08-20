-- Buat database
CREATE DATABASE IF NOT EXISTS db_naga;
USE db_naga;

-- Buat tabel sejarah_naga
CREATE TABLE IF NOT EXISTS sejarah_naga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_naga VARCHAR(100) NOT NULL,
    asal_negara VARCHAR(100) NOT NULL,
    era VARCHAR(100),
    warna VARCHAR(100),
    ciri_ciri TEXT,
    deskripsi TEXT NOT NULL,
    gambar VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Kalau tabel sejarah_naga sudah pernah dibuat sebelumnya (tanpa kolom warna & ciri_ciri),
-- jalankan 2 baris ALTER TABLE di bawah ini secara terpisah supaya tabel lama ikut terupdate:
-- ALTER TABLE sejarah_naga ADD COLUMN warna VARCHAR(100) AFTER era;
-- ALTER TABLE sejarah_naga ADD COLUMN ciri_ciri TEXT AFTER warna;

-- Kosongkan data lama supaya tidak duplikat saat re-import
TRUNCATE TABLE sejarah_naga;

-- Data contoh (10 naga dari berbagai budaya di dunia) - file media menggunakan MP4
INSERT INTO sejarah_naga (nama_naga, asal_negara, era, warna, ciri_ciri, deskripsi, gambar) VALUES

('Naga Tiongkok (Long)', 'Tiongkok', 'Dinasti Kuno', 'Emas, Merah, Hijau',
 'Tubuh panjang menyerupai ular, bersisik, memiliki 4 kaki dengan cakar, tanduk rusa, kumis panjang, dan mampu terbang tanpa sayap.',
 'Naga Tiongkok melambangkan kekuatan, keberuntungan, dan kekuasaan kaisar. Berbeda dengan naga Barat, naga Tiongkok umumnya digambarkan sebagai makhluk baik hati yang menguasai air dan cuaca.',
 'naga_china.mp4'),

('Naga Wales (Y Ddraig Goch)', 'Wales, Inggris', 'Abad Pertengahan', 'Merah',
 'Bersayap besar, bertubuh tegap, memiliki cakar tajam dan sering digambarkan berdiri dengan satu kaki terangkat di atas bukit hijau.',
 'Naga merah Wales adalah simbol nasional yang muncul dalam legenda Raja Arthur dan kini menjadi lambang bendera Wales.',
 'naga_wales.mp4'),

('Fafnir', 'Skandinavia (Nordik)', 'Mitologi Norse', 'Hitam Keabu-abuan',
 'Awalnya seorang kurcaci yang berubah wujud menjadi naga raksasa dengan kulit tebal seperti baja, meludahkan racun, dan menjaga harta karun.',
 'Fafnir adalah kurcaci yang berubah menjadi naga karena keserakahannya terhadap harta karun terkutuk, kemudian dikalahkan oleh pahlawan Sigurd.',
 'fafnir.mp4'),

('Naga Komodo (Simbolis)', 'Indonesia', 'Zaman Modern', 'Coklat Keabu-abuan',
 'Tubuh besar dan kekar, kulit bersisik kasar, lidah bercabang, gigitan mengandung bakteri berbahaya, hidup di daratan (bukan makhluk terbang).',
 'Meski bukan naga mitologi, Komodo di Nusa Tenggara Timur dijuluki "naga terakhir di bumi" karena wujudnya yang menyerupai naga purba.',
 'komodo.mp4'),

('Quetzalcoatl', 'Mesoamerika (Aztek)', 'Peradaban Kuno', 'Hijau, Putih, Emas',
 'Berwujud ular besar yang ditumbuhi bulu-bulu indah seperti burung quetzal, melambangkan penyatuan bumi dan langit.',
 'Dewa ular berbulu yang dipuja bangsa Aztek dan Maya, melambangkan angin, langit, dan pengetahuan.',
 'quetzalcoatl.mp4'),

('Naga Barongsai/Liong', 'Tiongkok - Asia Tenggara', 'Tradisi Turun-temurun', 'Merah, Emas, Kuning',
 'Berbentuk memanjang dengan kepala besar berhias, digerakkan oleh banyak penari dalam formasi barisan, melambangkan kemakmuran dan pengusir roh jahat.',
 'Liong adalah naga panjang yang ditampilkan dalam pertunjukan tari saat perayaan Tahun Baru Imlek, melambangkan harapan keberuntungan dan kemakmuran sepanjang tahun.',
 'liong.mp4'),

('Naga Wales Vortigern (Naga Putih vs Merah)', 'Wales, Inggris', 'Legenda Kuno', 'Putih dan Merah',
 'Dua naga yang bertarung di bawah tanah, naga putih melambangkan penjajah Saxon, naga merah melambangkan bangsa Wales asli.',
 'Menurut legenda, Raja Vortigern menemukan dua naga yang bertarung di bawah bentengnya, meramalkan kemenangan akhirnya bangsa Wales melawan penjajah.',
 'naga_vortigern.mp4'),

('Naga Jepang (Ryu)', 'Jepang', 'Zaman Feodal', 'Biru, Putih, Emas',
 'Tubuh panjang seperti ular raksasa tanpa sayap namun mampu terbang, memiliki tiga cakar (berbeda dari naga China yang berkuku empat/lima), erat kaitannya dengan air dan laut.',
 'Ryu adalah naga dalam mitologi Jepang yang dianggap sebagai dewa penguasa laut, sungai, dan hujan, sering muncul dalam kuil-kuil Shinto sebagai pelindung.',
 'ryu_jepang.mp4'),

('Naga Korea (Yong/Imugi)', 'Korea', 'Zaman Kerajaan Kuno', 'Biru Kehijauan, Emas',
 'Bertubuh panjang tanpa sayap, memiliki jenggot panjang, konon awalnya berwujud ular raksasa (Imugi) yang butuh ribuan tahun bertapa untuk menjadi naga sejati.',
 'Yong dipercaya sebagai simbol kekuasaan raja dan pembawa hujan, sementara Imugi adalah wujud awal sebelum seekor ular berevolusi menjadi naga penuh.',
 'yong_korea.mp4'),

('Tiamat', 'Mesopotamia (Babilonia)', 'Mitologi Kuno', 'Hitam, Ungu Gelap',
 'Digambarkan sebagai naga laut raksasa atau ular purba, melambangkan kekacauan (chaos) dan lautan asin primordial.',
 'Tiamat adalah dewi purba berwujud naga dalam mitologi Babilonia yang melambangkan lautan dan kekacauan, dikalahkan oleh dewa Marduk dalam kisah penciptaan dunia.',
 'tiamat.mp4');

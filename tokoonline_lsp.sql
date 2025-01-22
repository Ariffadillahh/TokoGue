-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2024 pada 09.10
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline_lsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamats`
--

CREATE TABLE `alamats` (
  `id_alamat` bigint(20) UNSIGNED NOT NULL,
  `name_penerima` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `name_provinsi` varchar(255) NOT NULL,
  `name_kota` varchar(255) NOT NULL,
  `name_kecamatan` varchar(255) NOT NULL,
  `name_kelurahan` varchar(255) NOT NULL,
  `alamat_detail` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamats`
--

INSERT INTO `alamats` (`id_alamat`, `name_penerima`, `no_hp`, `name_provinsi`, `name_kota`, `name_kecamatan`, `name_kelurahan`, `alamat_detail`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'asep stroberi', '0545686258', 'kebumen', 'Jauh', 'ciraras', 'depok', 'jalanan raya rame banget dah paruy', 1, '2023-12-13 04:29:56', '2023-12-13 04:29:56'),
(3, 'Arif Fadillah', '8963578346', 'Jakartaa', 'Jakarta Timur', 'Ciracas', 'Ciracas', 'hauyuiydhfdwf', 1, '2024-01-02 01:30:18', '2024-01-02 01:30:18'),
(4, 'Arif Fadillah', '081293772795', 'Jakarta', 'Jakarta Timur', 'Ciracas', 'Ciracas', 'Rt 09 Rw 07 No 10', 2, '2024-01-08 02:20:24', '2024-01-08 02:20:24'),
(5, 'Ucup', '0832324834', 'Jawa Barat', 'Depok', 'Depok', 'Depok', 'Depok Aneh Ada Keranda Terbang', 2, '2024-01-22 05:11:00', '2024-01-22 05:11:00'),
(7, 'Arif Fadillah', '081293772789', 'Jakarta', 'Jakarta Timur', 'Ciracas', 'Ciracas', 'rt09', 7, '2024-02-29 02:22:37', '2024-02-29 02:22:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id_brand` bigint(20) UNSIGNED NOT NULL,
  `name_brand` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id_brand`, `name_brand`, `created_at`, `updated_at`) VALUES
(5, 'Adidas', '2023-12-07 03:04:40', '2023-12-07 03:04:40'),
(6, 'Nike', '2023-12-07 05:52:12', '2023-12-07 05:52:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chart_sizes`
--

CREATE TABLE `chart_sizes` (
  `chart_id` bigint(20) UNSIGNED NOT NULL,
  `uk_chart` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chart_sizes`
--

INSERT INTO `chart_sizes` (`chart_id`, `uk_chart`, `created_at`, `updated_at`) VALUES
(1, '45', '2023-12-07 05:34:59', '2023-12-07 05:40:50'),
(4, '43', '2024-01-02 01:32:26', '2024-01-16 04:44:19'),
(8, '40', '2024-01-16 04:44:00', '2024-01-16 04:44:00'),
(9, '41', '2024-01-16 04:44:05', '2024-01-16 04:44:05'),
(10, '44', '2024-01-16 04:44:24', '2024-01-16 04:44:24'),
(11, '42', '2024-01-16 04:44:39', '2024-01-16 04:44:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskons`
--

CREATE TABLE `diskons` (
  `id_diskon` bigint(20) UNSIGNED NOT NULL,
  `id_product` varchar(255) NOT NULL,
  `persen_diskon` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tanggal_berlaku` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diskons`
--

INSERT INTO `diskons` (`id_diskon`, `id_product`, `persen_diskon`, `total_harga`, `tanggal_berlaku`, `status`, `created_at`, `updated_at`) VALUES
(3, '1', '5', '12350000', '2024-03-02', 'active', '2024-02-29 06:49:04', '2024-02-29 07:10:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_18_121803_create_registers_table', 1),
(6, '2023_11_23_140945_create_products_table', 1),
(7, '2023_11_23_142118_create_size_products_table', 1),
(8, '2023_11_24_093737_create_chart_sizes_table', 1),
(9, '2023_12_01_214340_create_pav_products_table', 1),
(10, '2023_12_02_122446_create_alamats_table', 1),
(14, '2023_12_07_084806_create_brands_table', 2),
(16, '2023_12_07_074655_create_ratings_table', 3),
(17, '2023_12_04_101742_create_orders_table', 4),
(19, '2024_02_29_092840_create_diskons_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_orders` bigint(20) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty_orders` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status_orders` varchar(255) NOT NULL,
  `date_orders` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `jasa_antar` varchar(255) DEFAULT NULL,
  `size` varchar(255) NOT NULL,
  `harga_product` varchar(255) NOT NULL,
  `waktu_nerimapesanan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_orders`, `id_product`, `id_alamat`, `id_user`, `qty_orders`, `metode_pembayaran`, `status_orders`, `date_orders`, `total_harga`, `no_resi`, `jasa_antar`, `size`, `harga_product`, `waktu_nerimapesanan`, `created_at`, `updated_at`) VALUES
(1, 6, 6, 7, '1', 'cod', 'selesai', '2024-02-05 10:03:45', '1900000', '086568586', 'jne', '47', '1900000', '2024-02-05 10:05:13', '2024-02-05 03:03:45', '2024-02-05 03:05:13'),
(2, 2, 6, 7, '1', 'cod', 'dikemas', '2024-02-22 10:40:37', '2500000', NULL, NULL, '47', '2500000', NULL, '2024-02-22 03:40:37', '2024-02-22 03:40:37'),
(3, 1, 7, 7, '3', 'cod', 'selesai', '2024-02-29 09:22:52', '39000000', 'fuddde', 'j&t', '54', '13000000', '2024-02-29 09:24:03', '2024-02-29 02:22:52', '2024-02-29 02:24:03'),
(4, 1, 7, 7, '1', 'cod', 'selesai', '2024-02-29 13:06:10', '12350000', '3437fdklf', 'j&t', '40', '12350000', '2024-02-29 14:28:05', '2024-02-29 06:06:10', '2024-02-29 07:28:05'),
(5, 2, 7, 7, '6', 'cod', 'dikemas', '2024-02-29 14:35:23', '14250000', NULL, NULL, '47', '2500000', NULL, '2024-02-29 07:35:23', '2024-02-29 07:35:23'),
(6, 5, 7, 7, '6', 'cod', 'selesai', '2024-02-29 14:37:05', '7695000', '1224335', 'anteraja', '45', '1350000', '2024-02-29 14:45:05', '2024-02-29 07:37:05', '2024-02-29 07:45:05'),
(7, 8, 7, 7, '1', 'cod', 'dikemas', '2024-02-29 14:42:39', '1100000', NULL, NULL, '40', '1100000', NULL, '2024-02-29 07:42:39', '2024-02-29 07:42:39'),
(8, 1, 7, 7, '1', 'cod', 'dikemas', '2024-02-29 15:09:06', '12350000', NULL, NULL, '45', '12350000', NULL, '2024-02-29 08:09:06', '2024-02-29 08:09:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pav_products`
--

CREATE TABLE `pav_products` (
  `id_pavpro` bigint(20) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pav_products`
--

INSERT INTO `pav_products` (`id_pavpro`, `id_product`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 13, 7, '2024-02-01 07:25:21', '2024-02-01 07:25:21'),
(4, 1, 7, '2024-02-29 02:24:48', '2024-02-29 02:24:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `desc_product` text NOT NULL,
  `stock_product` int(11) NOT NULL,
  `name_brand` varchar(255) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `price_product` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `desc_product`, `stock_product`, `name_brand`, `image_product`, `product_status`, `price_product`, `created_at`, `updated_at`) VALUES
(1, 'Adidas Samba OG Black White Gum', 'The adidas Samba Black-White Gum shoe, style B75807, is a product made from kangaroo leather with an innovative lightweight upper and gum rubber sole for grip. It features adidas stripes on its sides. Of course, as their name suggests, the shoes are black and cloud-white and come with white or black shoelaces made of polyester and plastic. adidas Samba Black-White Gum’s tongue is branded with the adidas logo. Samba branding is just beneath the collar, close to the stripes on the sides of the sneakers.', 4, 'Adidas', 'b4NkRmn0R6mlDPHYKGNSyL8TPFq4jMFOmghgzVNl.webp', 'ready', '13000000', '2023-12-07 05:47:18', '2024-02-29 08:09:06'),
(2, 'Adidas NMD R1 Japan Triple Black', 'Enter the NMD R1 Primeknit Japan “Triple Black,” featuring a clean black woven upper with matching jet black Three Stripes, full-length Boost cushioning, and Japanese branding on the front bumper and heel that provides an international twist.', 0, 'Adidas', 'M8NmqAlKWXrvd1ZAdKNqe50ErFyhNdK2W7Ws4eZ8.webp', 'sold', '2500000', '2024-01-08 06:54:20', '2024-02-29 07:35:23'),
(3, 'Nike Blazer Mid \'77 Vintage White Black (2021)', 'In the \'70s, Nike was the new shoe on the block. So new in fact, we were still breaking into the basketball scene and testing prototypes on the feet of our local team. Of course, the design improved over the years, but the name stuck. The Nike Blazer Mid \'77 Vintage—classic from the beginning.', 0, 'Nike', 'WHcynCZsxScNud2hrCpwcXUSccZ2CdgQ5TfJtNov.webp', 'sold', '1500000', '2024-01-11 08:02:57', '2024-01-22 03:45:24'),
(4, 'Nike Dunk Low White Black Panda', 'The Nike Dunk Low White Black (2021) (W) highlights classic color blocking on a vintage silhouette originally released in 1985. The all-leather upper features a crisp white base with contrasting black overlays and a matching black Swoosh. Nike branding lands on the heel tab and woven tongue tag in keeping with the sneaker’s OG aesthetic. The low-top is supported by a durable rubber cupsole, equipped underfoot with a basketball-specific traction pattern.', 7, 'Nike', 'IUCtZ6ZoryjKP5w1QMwAnd6FGcfossTEYWohiybA.webp', 'ready', '1250000', '2024-01-15 05:43:01', '2024-01-15 05:43:01'),
(5, 'Air Jordan 1 Mid Lucky Green', 'The upper of the Air Jordan 1 Mid Lucky Green is made of high-quality leather and textile, which gives the shoe durability and a premium look', 0, 'Nike', 'yx8O025iWoYPSaaGBTYeoDDohQZeoaxuXU8CwBrj.webp', 'sold', '1350000', '2024-01-15 05:45:09', '2024-02-29 07:37:05'),
(6, 'Air Jordan 1 Retro High Tie Dye', 'The Jordan 1 Retro High Tie Dye (W) gives the iconic silhouette a fashion-forward look, highlighted by a faux hand-dyed effect on the sneaker’s heel and forefoot overlays. The swirling blue and teal hues are offset by a white leather quarter panel and contrasting black leather on the collar and toe box. Branding elements include a black Swoosh, matching black Wings logo and a Nike tag atop the lightly padded nylon tongue.', 6, 'Nike', 'bFctO4z6fNMi4JF0VTOKPqLfxHP7mW9GmuEI6MM8.webp', 'ready', '1900000', '2024-01-15 05:50:59', '2024-02-05 03:03:45'),
(7, 'Air Jordan 1 Low Multi Canvas (GS)', 'Presenting a sustainable take on the retro basketball model, the Air Jordan 1 Low Multi Canvas GS is made using recycled materials. Boasting a pastel-toned colourway,', 7, 'Nike', 'uuodo3uUJymZUUfEYgcZZtHarIikYf7KFS2K9P3z.webp', 'ready', '2000000', '2024-01-15 05:52:30', '2024-01-15 05:52:30'),
(8, 'Nike Air Max 1 \'86 OG Big Bubble Lost Sketch', 'For Summer 2023, the Swoosh will be releasing new colorways of the “Big Bubble” runner as we now take a look at this upcoming Nike Air Max 1 ’86 “Blue Safari” makeup. It utilizes Tinker Hatfield’s iconic “Safari” print that he took inspiration from an ostrich-skin couch at a furniture store. Dressed in a Light Smoke Grey and Diffused Blue color scheme. This offering of the Nike Air Max 1 features a mesh base with textile overlays, suede Swooshes, and safari print used on the mudguards.', 6, 'Nike', 'NDgQ9xMMglsLEfPUxQKJB99b7FATpwfkqk7tgmH8.webp', 'ready', '1100000', '2024-01-15 07:02:36', '2024-02-29 07:42:39'),
(9, 'Nike Air Force 1 Low \'07 Triple White (2021)', 'The radiance lives on in the Nike Air Force 1 ’07, the b-ball OG that puts a fresh spin on what you know best: durably stitched overlays, clean finishes and the perfect amount of flash to make you shine. The stitched overlays on the upper add heritage style, durability and support. Originally designed for performance hoops, the Nike Air cushioning adds lightweight, all-day comfort. The low-cut silhouette adds a clean, streamlined look. The padded collar feels soft and comfortable. Foam midsole, Perforations on the toe, Rubber sole.', 0, 'Nike', 'KmoqYNAFYehOYkvnBV5fH0FXJDWBqQTz4lNN4sFn.webp', 'sold', '1700000', '2024-01-15 07:04:04', '2024-01-17 04:06:52'),
(10, 'Air Jordan 1 Retro High OG Lost and Found', 'Constructed in high quality tumbled leather in the original hightop silhouette of the Air Jordan 1, the orange, black, and white colorway is taken from the team uniform MJ wore during the game and modeled after the OG “Black Toe” AJ1 color block.', 7, 'Nike', 'YXJQyvj5Xtzt43GUtSNXqbVHdgUGEsfRe9KhZ9qR.webp', 'ready', '4500000', '2024-01-15 07:06:57', '2024-01-15 07:06:57'),
(11, 'Adidas Country OG White Green', 'didas AG (juga dikenal sebagai adidas) adalah sebuah perusahaan sepatu Jerman. Perusahaan ini dinamakan atas pendirinya, Adolf (Adi) Dassler, 12', 9, 'Adidas', '01IXXgEsqkZUuGxuycPUoDgTfUv8zlcgomaEZ7yP.webp', 'sold', '1500000', '2024-01-16 04:10:01', '2024-01-16 04:28:35'),
(12, 'Adidas Yeezy 350 V2 Carbon Beluga', 'Just in time for summer adidas and Kanye West delivered the Yeezy Boost 350 V2 Carbon Beluga, a revamped version of the classic Beluga colorway. The iconic partnership continues to defy expectations and redefine sneaker culture. With the Carbon Beluga colorway, this drop showcased a fresh take on the beloved Beluga. The Primeknit upper wrapped around the Boost midsole is swathed in this cutting-edge colorway, infusing a familiar design with bold, modern energy. It screams street-ready while maintaining that sleek Yeezy aesthetic we all know and love.', 9, 'Adidas', 'AX4sMzHYNjF8vRzNue5TUgqNEjfeu4YJmyZsm24t.webp', 'ready', '4400000', '2024-01-16 04:40:40', '2024-01-16 04:40:40'),
(13, 'Adidas Superstar Bape ABC Camo Green', 'Description\r\n\r\nIn addition to tapping new-age collaborators the likes of Gunna and The Weeknd, the last couple of year have seen A BATHING APE (BAPE) revisit its partnership decades-old partnership with adidas. For their next endeavor, the institutions have prepped an adidas Superstar covered in the Japanese label’s iconic green ABC camouflage.\r\n\r\nAs with adidas Originals collaborations of yesteryear, the forthcoming pair lends its entire upper to BAPE’s oft-imitated, military-inspired print. Shell-toes and their attached sole units forgo any warped flair in favor of an off-white arrangement. Profile STAs and “BAPE STA”', 7, 'Adidas', 'sZeIXqcd8yU5eulNjVgtPXn6lFMYwxjwDqQ93Ajs.webp', 'ready', '2500000', '2024-01-16 04:48:04', '2024-01-22 02:38:56'),
(14, 'Adidas Gazelle Indoor Sean Wotherspoon', 'Adidas\' Gazelle Mid Indoor \"Sean Wotherspoon\" sneakers are distinguished by their intricately embroidered design. The signature 3-Stripes decorate the sides, while a rubber sole adds comfort and traction to the design.', 9, 'Adidas', 'lioqkF3xTbifgVxXOWlHkRp5IGJJrKP3jx6YRP1g.webp', 'ready', '3400000', '2024-01-16 04:51:11', '2024-01-16 04:51:11'),
(15, 'Adidas Samba OG notitle Cow Print', 'Adidas Samba OG Cow Print or any other specific model, I recommend checking the official Adidas website, authorized Adidas retailers, or other reliable sneaker retailers.', 7, 'Adidas', 'dmYPMwiuSKuASwpad7QwrQmVznl9wpSfppP2jzUu.webp', 'ready', '3300000', '2024-01-16 04:53:39', '2024-01-16 05:18:44'),
(16, 'Adidas NMD Human Race Trail Pharrell Multi-Color', 'Description\r\n\r\nDubbed the \"Hiking Collection,\" each pair takes the usual NMD Hu upper and sits it on top of a rugged outsole. Bright colorways take cues from popular outdoors designs from the \'80s and \'90s, while each pair sports the model\'s signature embroidered text on each shoe as well.', 9, 'Adidas', 'mRiNBj5GQ1p64tXzGuQtX6ykiot9y09MPcq78a8I.webp', 'ready', '2200000', '2024-01-16 04:55:32', '2024-01-17 02:43:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id_ratings` bigint(20) UNSIGNED NOT NULL,
  `id_orders` int(11) NOT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `start_rate` varchar(255) DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `waktu_rate` varchar(255) DEFAULT NULL,
  `status_rate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`id_ratings`, `id_orders`, `komentar`, `start_rate`, `id_user`, `waktu_rate`, `status_rate`, `created_at`, `updated_at`) VALUES
(1, 1, '100% Authentic', '4', '7', '2024-02-05 10:28:52', 'yes', '2024-02-05 03:03:45', '2024-02-05 03:28:52'),
(2, 2, NULL, NULL, '7', NULL, 'no', '2024-02-22 03:40:37', '2024-02-22 03:40:37'),
(3, 3, 'Bagus', '4', '7', '2024-02-29 09:24:17', 'yes', '2024-02-29 02:22:52', '2024-02-29 02:24:17'),
(4, 4, NULL, NULL, '7', NULL, 'no', '2024-02-29 06:06:10', '2024-02-29 06:06:10'),
(5, 5, NULL, NULL, '7', NULL, 'no', '2024-02-29 07:35:23', '2024-02-29 07:35:23'),
(6, 6, NULL, NULL, '7', NULL, 'no', '2024-02-29 07:37:05', '2024-02-29 07:37:05'),
(7, 7, NULL, NULL, '7', NULL, 'no', '2024-02-29 07:42:39', '2024-02-29 07:42:39'),
(8, 8, NULL, NULL, '7', NULL, 'no', '2024-02-29 08:09:06', '2024-02-29 08:09:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `size_products`
--

CREATE TABLE `size_products` (
  `id_size` bigint(20) UNSIGNED NOT NULL,
  `uk_size` varchar(255) NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `size_products`
--

INSERT INTO `size_products` (`id_size`, `uk_size`, `id_product`, `created_at`, `updated_at`) VALUES
(2, '40', 1, '2023-12-13 04:38:21', '2023-12-13 04:38:21'),
(3, '45', 1, '2024-01-02 01:32:48', '2024-01-02 01:32:48'),
(4, '47', 1, '2024-01-02 01:32:48', '2024-01-02 01:32:48'),
(7, '54', 1, '2024-01-03 02:22:10', '2024-01-03 02:22:10'),
(8, '45', 2, '2024-01-08 06:54:20', '2024-01-08 06:54:20'),
(9, '40', 2, '2024-01-08 06:54:20', '2024-01-08 06:54:20'),
(10, '47', 2, '2024-01-08 06:54:20', '2024-01-08 06:54:20'),
(11, '54', 2, '2024-01-08 06:54:20', '2024-01-08 06:54:20'),
(12, '45', 3, '2024-01-11 08:02:57', '2024-01-11 08:02:57'),
(13, '40', 3, '2024-01-11 08:02:57', '2024-01-11 08:02:57'),
(14, '47', 3, '2024-01-11 08:02:57', '2024-01-11 08:02:57'),
(15, '54', 3, '2024-01-11 08:02:57', '2024-01-11 08:02:57'),
(16, '45', 4, '2024-01-15 05:43:01', '2024-01-15 05:43:01'),
(17, '40', 4, '2024-01-15 05:43:01', '2024-01-15 05:43:01'),
(18, '47', 4, '2024-01-15 05:43:01', '2024-01-15 05:43:01'),
(19, '45', 5, '2024-01-15 05:45:09', '2024-01-15 05:45:09'),
(20, '40', 5, '2024-01-15 05:45:09', '2024-01-15 05:45:09'),
(21, '47', 5, '2024-01-15 05:45:09', '2024-01-15 05:45:09'),
(22, '54', 5, '2024-01-15 05:45:09', '2024-01-15 05:45:09'),
(23, '40', 6, '2024-01-15 05:50:59', '2024-01-15 05:50:59'),
(24, '47', 6, '2024-01-15 05:50:59', '2024-01-15 05:50:59'),
(25, '45', 7, '2024-01-15 05:52:30', '2024-01-15 05:52:30'),
(26, '40', 7, '2024-01-15 05:52:30', '2024-01-15 05:52:30'),
(27, '47', 7, '2024-01-15 05:52:30', '2024-01-15 05:52:30'),
(28, '45', 8, '2024-01-15 07:02:36', '2024-01-15 07:02:36'),
(29, '40', 8, '2024-01-15 07:02:36', '2024-01-15 07:02:36'),
(30, '47', 8, '2024-01-15 07:02:37', '2024-01-15 07:02:37'),
(31, '40', 9, '2024-01-15 07:04:04', '2024-01-15 07:04:04'),
(32, '47', 9, '2024-01-15 07:04:04', '2024-01-15 07:04:04'),
(33, '54', 9, '2024-01-15 07:04:04', '2024-01-15 07:04:04'),
(34, '40', 10, '2024-01-15 07:06:57', '2024-01-15 07:06:57'),
(35, '47', 10, '2024-01-15 07:06:57', '2024-01-15 07:06:57'),
(36, '45', 11, '2024-01-16 04:10:01', '2024-01-16 04:10:01'),
(37, '40', 11, '2024-01-16 04:10:01', '2024-01-16 04:10:01'),
(38, '47', 11, '2024-01-16 04:10:01', '2024-01-16 04:10:01'),
(39, '45', 12, '2024-01-16 04:40:40', '2024-01-16 04:40:40'),
(40, '40', 12, '2024-01-16 04:40:40', '2024-01-16 04:40:40'),
(41, '47', 12, '2024-01-16 04:40:40', '2024-01-16 04:40:40'),
(42, '40', 13, '2024-01-16 04:48:04', '2024-01-16 04:48:04'),
(43, '41', 13, '2024-01-16 04:48:04', '2024-01-16 04:48:04'),
(44, '44', 13, '2024-01-16 04:48:04', '2024-01-16 04:48:04'),
(45, '40', 14, '2024-01-16 04:51:11', '2024-01-16 04:51:11'),
(46, '41', 14, '2024-01-16 04:51:11', '2024-01-16 04:51:11'),
(47, '42', 14, '2024-01-16 04:51:11', '2024-01-16 04:51:11'),
(49, '41', 15, '2024-01-16 04:53:39', '2024-01-16 04:53:39'),
(50, '43', 16, '2024-01-16 04:55:32', '2024-01-16 04:55:32'),
(51, '40', 16, '2024-01-16 04:55:32', '2024-01-16 04:55:32'),
(52, '41', 16, '2024-01-16 04:55:32', '2024-01-16 04:55:32'),
(53, '42', 15, '2024-01-16 07:32:42', '2024-01-16 07:32:42'),
(54, '40', 15, '2024-01-16 07:32:47', '2024-01-16 07:32:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$nAYYmyoykJJzHiDKaadM4OTsCGJDyimyIUhimYJ98sNuUpOAxnDU.', 'superadmin', NULL, NULL, '2024-01-03 02:24:45', '2024-01-29 04:58:07'),
(6, 'Arif Fadillah', 'admin@gmail.com', NULL, '$2y$10$DhAafJvOUCR0euw.GY7g9.k/BVuTiJNS3oBVA.sWY0LXe7p13f87.', 'admin', NULL, NULL, '2024-02-01 07:03:23', '2024-02-01 07:03:23'),
(7, 'Arif Fadillah', 'user@gmail.com', NULL, '$2y$10$hEa2VUu5gO5/nkR85MOIceMZO/QCkqGvoZeNa8VXOmhUpNnJ2i6Jy', 'user', NULL, NULL, '2024-02-01 07:04:08', '2024-02-01 07:04:08'),
(9, 'udin petot', 'petot@gmail.com', NULL, '$2y$10$F.H2O5XuHr1zY2ycjrDLZuwjyP1Ots/3SoFnW3Yc/AS51c/5CK.b6', NULL, NULL, NULL, '2024-02-29 02:48:17', '2024-02-29 02:48:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indeks untuk tabel `chart_sizes`
--
ALTER TABLE `chart_sizes`
  ADD PRIMARY KEY (`chart_id`);

--
-- Indeks untuk tabel `diskons`
--
ALTER TABLE `diskons`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pav_products`
--
ALTER TABLE `pav_products`
  ADD PRIMARY KEY (`id_pavpro`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_ratings`);

--
-- Indeks untuk tabel `size_products`
--
ALTER TABLE `size_products`
  ADD PRIMARY KEY (`id_size`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id_alamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `chart_sizes`
--
ALTER TABLE `chart_sizes`
  MODIFY `chart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `diskons`
--
ALTER TABLE `diskons`
  MODIFY `id_diskon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pav_products`
--
ALTER TABLE `pav_products`
  MODIFY `id_pavpro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_ratings` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `size_products`
--
ALTER TABLE `size_products`
  MODIFY `id_size` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

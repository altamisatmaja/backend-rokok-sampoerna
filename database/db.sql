CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` integer,
  `email` varchar(255),
  `password` varchar(255),
  `created_at` timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(255),
  `alamat_distributor` varchar(255),
  `no_hp_distributor` varchar(255),
  `nik_distributor` varchar(255) UNIQUE,
  `foto_ktp` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `recepient` (
  `id_recepient` int(11) NOT NULL,
  `nama_recepient` varchar(255),
  `no_hp_recepient` varchar(255),
  `alamat_recepient` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `rokok` (
  `id_rokok` int(11) NOT NULL,
  `nama_rokok` varchar(255),
  `harga_pack` integer,
  `type` ENUM('Filter', 'Kretek')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `jenis_pengiriman` (
  `id_jenis_pengiriman` integer,
  `nama_jenis_pengiriman` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `distribute` (
  `id_distribute` int(11) NOT NULL,
  `distributor_id` integer,
  `recepient_id` integer,
  `rokok_id` integer,
  `kuantitas_pengiriman` integer,
  `jenis_pengiriman_id` integer,
  `tanggal_kirim` datetime,
  `tanggal_terima` datetime,
  `total_biaya` integer
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

ALTER TABLE `recepient`
  ADD PRIMARY KEY (`id_recepient`);

ALTER TABLE `rokok`
  ADD PRIMARY KEY (`id_rokok`);

ALTER TABLE `jenis_pengiriman`
  ADD PRIMARY KEY (`id_jenis_pengiriman`);

ALTER TABLE `distribute`
  ADD PRIMARY KEY (`id_distribute`),
  ADD KEY `rokok_id` (`rokok_id`),
  ADD KEY `distributor_id` (`distributor_id`),
  ADD KEY `recepient_id` (`recepient_id`),
  ADD KEY `jenis_pengiriman_id` (`jenis_pengiriman_id`);


ALTER TABLE `user` MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `distributor` MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `recepient` MODIFY `id_recepient` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `rokok` MODIFY `id_rokok` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `jenis_pengiriman` MODIFY `id_jenis_pengiriman` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `distribute` MODIFY `id_distribute` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `distribute`
  ADD CONSTRAINT `rokok_ibfk_1` FOREIGN KEY (`rokok_id`) REFERENCES `rokok` (`id_rokok`) ON DELETE CASCADE;


ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distribute` (`distributor_id`) ON DELETE CASCADE;

ALTER TABLE `recepient`
  ADD CONSTRAINT `recepient_ibfk_1` FOREIGN KEY (`id_recepient`) REFERENCES `distribute` (`recepient_id`) ON DELETE CASCADE;

ALTER TABLE `jenis_pengiriman`
  ADD CONSTRAINT `jenis_pengiriman_ibfk_1` FOREIGN KEY (`id_jenis_pengiriman`) REFERENCES `distribute` (`jenis_pengiriman_id`) ON DELETE CASCADE;



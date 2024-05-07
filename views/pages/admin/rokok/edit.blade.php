<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= BASE_URL . '/public/css/output.css' ?>" rel="stylesheet">
    <link rel="shortcut icon" href="https://seeklogo.com/images/H/hm-sampoerna-logo-64BA2D55A9-seeklogo.com.png"
        type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />
    <title>Sampoerna | <?= $title ?></title>
</head>

<body>
    <div>
        <?php include '../views/pages/admin/layouts/navbar.blade.php'; ?>
        <div class="flex overflow-hidden bg-white pt-16">
            <?php include '../views/pages/admin/layouts/sidebar.blade.php'; ?>
            <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
            <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
                <main>
                    <div class="flex items-center justify-center p-12">
                        <div class="mx-auto w-full">
                            <form action="<?= BASE_URL . '/rokok/edit/' . $rokok['id_rokok'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-5">
                                    <input hidden class="" value="<?= $rokok['id_rokok'] ?>" type="text">
                                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Nama rokok
                                    </label>
                                    <input type="text" value="<?= $rokok['nama_rokok'] ?>" name="nama_rokok"
                                        id="nama_rokok" placeholder="Masukkan nama rokok"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-5">
                                    <label for="harga_pack" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Harga Pack
                                    </label>
                                    <input value="<?= $rokok['harga_pack'] ?>" type="number" name="harga_pack"
                                        id="harga_pack" placeholder="Rp 100000"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-5">
                                    <label for="type" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Tipe Rokok
                                    </label>
                                    <select id="type" name="type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 py-3 px-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                                        <option value="">Pilih tipe rokok</option>
                                        <option value="Filter" <?= $rokok['type'] == 'Filter' ? 'selected' : '' ?>>
                                            Filter</option>
                                        <option value="Kretek" <?= $rokok['type'] == 'Kretek' ? 'selected' : '' ?>>
                                            Kretek</option>
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                        Upload gambar
                                    </label>
                                    <div class="mb-8">
                                        <input type="file" value="<?= $rokok['gambar_rokok'] ?>" name="gambar_rokok"
                                            id="gambar_rokok" class="sr-only" onchange="validateImage(this)" />
                                        <label for="gambar_rokok"
                                            class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
                                            <div>
                                                <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                                    Tambah gambar disini
                                                </span>
                                                <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                                    atau
                                                </span>
                                                <span
                                                    class="inline-flex rounded py-2 px-7 text-base font-medium text-[#07074D]">
                                                    Cari
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div id="image-preview" class="mt-4"></div>
                                <?php
                                if (isset($rokok['gambar_rokok'])) {
                                    echo '
                                    <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                                        <div class="flex items-center justify-between">
                                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                                ' .
                                        $rokok['gambar_rokok'] .
                                        '
                                            </span>
                                        </div>
                                    </div>
                                    ';
                                } elseif (isset($_FILES['gambar_rokok']) && $_FILES['gambar_rokok']['name']) {
                                    echo '
                                    <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                                        <div class="flex items-center justify-between">
                                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                                ' .
                                        $_FILES['gambar_rokok']['name'] .
                                        '
                                            </span>
                                        </div>
                                    </div>
                                    ';
                                }

                                if (isset($_FILES['gambar_rokok']) && $_FILES['gambar_rokok']['name']){
                                    echo '
                                    <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                                        <div class="flex items-center justify-between">
                                            <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                                ' .
                                        $_FILES['gambar_rokok']['name'] .
                                        '
                                            </span>
                                        </div>
                                    </div>
                                    ';
                                }
                                ?>

                                <span id="file-error" class="text-red-500"></span>
                                <div>
                                    <button type="submit"
                                        class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
        <script>
            $(document).ready(function() {
                <?php 
                if ($rokok['gambar_rokok']){
                    $namaFile = $rokok['gambar_rokok'];
                    ?>
                $('#image-preview').html(`
                        <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                            <div class="flex items-center justify-between">
                                <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                    <?= $namaFile ?>
                                </span>
                            </div>
                        </div>
                    `);
                <?php } ?>
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#gambar_rokok').change(function(e) {
                    var fileName = e.target.files[0].name;
                    var fileExt = fileName.split('.').pop();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').html(`
                        <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                            <div class="flex items-center justify-between">
                                <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                ${fileName}
                                </span>
                            </div>
                        </div>
                        `);
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });

            function validateImage(input) {
                var file = input.files[0];
                var fileType = file.type.split('/').shift();
                var fileName = file.name;

                if (fileType !== 'image') {
                    document.getElementById('file-error').innerHTML = 'Gambar kategori produk harus berupa file gambar.';
                    document.getElementById('image-preview').innerHTML = '';
                } else {
                    document.getElementById('file-error').innerHTML = '';

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').html(`
                        <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                            <div class="flex items-center justify-between">
                                <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                ${fileName}
                                </span>
                            </div>
                        </div>
                        `);
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
    </div>
</body>

</html>

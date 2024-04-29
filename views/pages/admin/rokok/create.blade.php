<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= BASE_URL . '/public/css/output.css' ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />
    <title><?= $title ?></title>
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
                            <form action="<?= BASE_URL . '/rokok/store' ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-5">
                                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Nama rokok
                                    </label>
                                    <input type="text" value="<?= $namaRokok ?>" name="nama_rokok" id="nama_rokok"
                                        placeholder="Masukkan nama rokok"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-5">
                                    <label for="harga_pack" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Harga Pack
                                    </label>
                                    <input type="number" name="harga_pack" id="harga_pack" placeholder="Rp 100000"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-5">
                                    <label for="type" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Tipe Rokok
                                    </label>
                                    <select id="type" name="type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 py-3 px-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                                        <option selected>Pilih tipe rokok</option>
                                        <option value="Filter">Filter</option>
                                        <option value="Kretek">Kretek</option>
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                        Upload gambar
                                    </label>
                                    <div class="mb-8">
                                        <input type="file" name="gambar_rokok" id="gambar_rokok" class="sr-only" />
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
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    </div>
</body>

</html>

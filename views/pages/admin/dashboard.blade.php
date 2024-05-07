<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= BASE_URL . '/public/css/output.css' ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />
    <title>Dashboard | <?= $title ?></title>
</head>

<body>
    <div>
        <?php include '../views/pages/admin/layouts/navbar.blade.php'; ?>
        <div class="flex overflow-hidden bg-white pt-16">
            <?php include '../views/pages/admin/layouts/sidebar.blade.php'; ?>
            <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
            <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
                <main>
                    <?php
                    Message::flash();
                    ?>
                    <!-- component -->
                    <div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
                        <div class="sm:flex sm:space-x-4">
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                                <div class="bg-white p-5">
                                    <div class="sm:flex sm:items-start">
                                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                            <h3 class="text-sm leading-6 font-medium text-gray-400">Total Dummy
                                            </h3>
                                            <p class="text-3xl font-bold text-black">71,897</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                                <div class="bg-white p-5">
                                    <div class="sm:flex sm:items-start">
                                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                            <h3 class="text-sm leading-6 font-medium text-gray-400">Average Dummy</h3>
                                            <p class="text-3xl font-bold text-black">58.16%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                                <div class="bg-white p-5">
                                    <div class="sm:flex sm:items-start">
                                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                            <h3 class="text-sm leading-6 font-medium text-gray-400">Avg Dummy</h3>
                                            <p class="text-3xl font-bold text-black">24.57%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    </div>
</body>

</html>

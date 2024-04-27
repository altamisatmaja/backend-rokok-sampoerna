<?php

class Message
{
    public static function setFlash($icon, $title, $text, $data = [])
    {
        $_SESSION['flash'] = [
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
            'data' => $data,
        ];
    }

    public static function getData()
    {
        if (isset($_SESSION['flash'])) {
            return $_SESSION['flash']['data'];
        }
        return [];
    }

    public static function flash()
{
    if (isset($_SESSION['flash'])) {
        $icon = $_SESSION['flash']['icon'];
        $title = $_SESSION['flash']['title'];
        $text = $_SESSION['flash']['text'];

        echo '
        <div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium">' . $title . '</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">' . $text . '</div>
            <div class="flex">
                <button type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                    </svg>
                    View more
                </button>
                <button id="dismiss-hide"  type="button" onclick="dismissAlert()" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" aria-label="Close">
                    Dismiss
                </button>
            </div>
        </div>
        <script>
            function dismissAlert() {
                var alert = document.getElementById("alert-additional-content-2");
                alert.style.display = "none";
            }
        </script>
        ';

        unset($_SESSION['flash']);
    }
}

}

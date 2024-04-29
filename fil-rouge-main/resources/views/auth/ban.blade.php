<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<style>
    .emoji-404 {

        position: relative;
        animation: mymove 2.5s infinite;
    }

    @keyframes mymove {
        33% {
            top: 0px;
        }
        66% {
            top: 20px;
        }
        100% {
            top: 0px
        }


    }
</style>
<div class="bg-gray-100 h-screen justify-center">
    <div class="text-center">
        <svg class="emoji-404" enable-background="new 0 0 226 249.135" height="249.135" id="Layer_1" overflow="visible"
             version="1.1" viewBox="0 0 226 249.135" width="226" xml:space="preserve">
            <!-- SVG content -->
        </svg>
        <div class="tracking-widest mt-4">
            <span class="text-gray-500 text-6xl block"><span>4 0 4</span></span>
            <span class="text-gray-500 text-xl">Sorry, We couldn't find what you are looking for!</span>
            <p class="text-gray-500 text-xl mt-4">Your account is currently inactive. Please contact administration for
                further assistance.</p>
        </div>
        <center class="mt-6">
            <a href="/" class="text-gray-500 font-mono text-xl bg-gray-200 p-3 rounded-md hover:shadow-md">Go back</a>
        </center>
    </div>
</div>

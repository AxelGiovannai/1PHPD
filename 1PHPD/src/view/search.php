<?php include 'header.php'; ?>

<div class=" mx-auto mt-10">
    <h1 class="flex text-3xl text-bleu1 justify-center font-bold">Search results</h1>
    <div class="flex flex-col justify-center md:flex-row flex-wrap mt-10 mb-5">
        <div class="w-full md:w-2/3">
            <input type="text" id="search" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Search for a movie">
        </div>
    </div>

</div>
<div id="search-results" class="flex flex-wrap justify-center"></div>
<script src="../../public/js/search.js"></script>

<?php include 'footer.php'; ?>
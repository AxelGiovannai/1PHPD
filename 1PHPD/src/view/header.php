<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<?php include '../../config/cdntailwinds.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-[Poppins] bg-[#1e2022] h-screen">
    <header class="bg-bleu6">
        <nav class="flex justify-between items-center w-[92%]  mx-auto">
            <div>
                <a href="./home.php"><img class="w-16 cursor-pointer" src="../../public/image/logo.svg" alt="..."></a>
            </div>
            <div class="nav-links duration-500 md:static absolute bg-bleu6 text-bleu1 md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                    <li>
                        <a class="hover:text-gray-500" href="./action.php">Action</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="./drama.php">Dramas</a>
                    </li>
                </ul>
            </div>
            <?php
            // Vérifier si l'utilisateur est connecté
            $isLoggedIn = isset($_SESSION['username']) || isset($_COOKIE['username']);
            ?>

            <div class="flex items-center gap-6">
                <a href="./search.php"><button class="bg-[#11212D] text-white px-5 py-2 rounded-full hover:bg-[#4A5C6A]"><img src="../../public/image/search.svg" class="w-6"></button></a>

                <a href="./cart.php"><button class="bg-[#11212D] text-white px-5 py-2 rounded-full hover:bg-[#4A5C6A]"><img src="../../public/image/shopping-cart.svg" class="w-6"></button></a>
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
                <?php
                if ($isLoggedIn) {
                    // Si l'utilisateur est connecté, afficher le bouton de déconnexion
                    echo '<a href="./logout.php"><button class="bg-[#11212D] font-bold text-bleu1 px-5 py-2 rounded-full hover:bg-[#4A5C6A]">Logout</button></a>';
                } else {
                    // Sinon, afficher le bouton de connexion
                    echo '<a href="./login.php"><button class="bg-[#11212D] font-bold text-bleu1 px-5 py-2 rounded-full hover:bg-[#4A5C6A]">Login</button></a>';
                }

                ?>
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>
    </header>

    <script src='../../public/js/navlink.js'></script>


</body>

</html>
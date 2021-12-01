<?php
session_start();
require_once("ConnexionDB/connexionDB.php");
$query =$BDD->query("SELECT * FROM service LIMIT 9");
$services =$query->fetchAll();
$query2 = $BDD->query("SELECT * FROM service LIMIT 10 OFFSET 9 ");
$service2s =$query2->fetchAll();

$query=$BDD->prepare("SELECT n.*,p.numero,p.prenom,p.nom,p.adresse,p.telephone,p.photo FROM notes n LEFT JOIN personne p ON (n.idPrestataire= p.numero)");
$query->execute();
$stmt = $query->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--========== BOOTSTRAP ==========-->
    <link href='assets/bootstrap/css/bootstrap.min.css' rel='stylesheet'>


    <!--========== LIGHRSLIDE CSS ==========-->
    <link href='assets/css/lightslider.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css?t=<?php echo time(); ?>">

    
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="Function/style.css?t=<?php echo time(); ?>">


    <title>Kaay Deefar</title>
    <link rel="icon" type="image/png" sizes="20x20" href="Images/job-5359923_640.png">
</head>

<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php" class="nav__link active-link">Accueil</a></li>
                    <li class="nav__item"><a href="nav/service.php" class="nav__link ">Services</a>
                    <div class="sub-menu-1">
                            
                            <ul>
                                <li class="nav__item">
                                <?php
                            foreach ($services as $service) {
                                # code...
                            
                            ?>
                                    <a href="nav/detail.php?t=<?=$service['idService']?>" class="nav__link "><?=$service['nom']?></a><br>
                                    <?php
                            }?>
                                    <div class="sub-menu-2">
                                        <ul>

                                            <li class="nav__item">
                                            <?php
                                                foreach ($service2s as $service2) {
                                                ?>
                                                <a href="nav/detail.php?infoId=<?=$service2['idService']?>" class="nav__link "><?=$service2['nom']?></a><br>
                                                <?php
                                                }?>
                                            </ul>
                                    </div>
                            </li>
                            </ul>
                            
                        </div>
                    </li>
                    <li class="nav__item"><a href="EspacePrestataire/Inscriptionprestataire.php" class="nav__link">Espace Prestataire</a></li>
                    <li class="nav__item"><a href="EspaceClient/connexionClient.php" class="nav__link">Espace Client</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contactez nous</a></li>

                   
                    
                    <li style="margin-right:-5%;"><i class='bx bx-moon change-theme m-auto' id="theme-button"></i></li>
                </ul>
            </div>
            <div style="margin-top:-3.5%;margin-right: -10%;" class="box-search">
                        <input type="checkbox" id="check">
                        <div class="search-box">
                            <input type="text" id="searchText" placeholder="Rechercher un service..." >
                            <label class="icon" for="check">
                                <i id="searchBtn" class="bx bx-search"></i>
                            </label>
                        </div>
                        <div id="serviceList"></div>
                    </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner item-anime ">
                    <div class="carousel-item active">
                        <img src="EspaceClient/images/pratiques.jpg" class="d-block w-100 " alt="..."   data-c="cover-proportional" data-no-retina>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: #069C54;">Un accompagnement sur mesure </h5>
                            <p style="color: #fff;">Pour vous permettre de mener vos travaux d’entretien, de maintenance, de nettoyage, de construction et de rénovation en toute sérénité 
							</p>
                        </div>
                    </div>
                        <div class="carousel-item">
                        <img src="EspaceClient/images/maxresdefault1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: #069C54;">Les meilleurs ouvriers sélectionnés pour vous </h5>
                            <p style="color: #fff;">Nous vous libérons du stress lié aux travaux et facilitons votre relation avec les différents ouvriers</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="EspaceClient/images/femme.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: #069C54;">Third slide label</h5>
                            <p style="color: #fff;">Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="EspaceClient/images/x11080.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: #069C54;">Third slide label</h5>
                            <p style="color: #fff;">Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- <div class="box-search">
                <span class="section-subtitle">Cliquez pour rechercher un service </span>
                    <input type="checkbox" id="check">
                    <div class="search-box">
                        <input type="text" id="searchText" placeholder="Rechercher un service..." >
                        <label class="icon" for="check">
                            <i id="searchBtn" class="bx bx-search"></i>
                        </label>
                    </div>
                <div id="serviceList"></div>
            </div> -->
            
        </section> 
    

        <!--========== SERVICES ==========-->
        <section class="services section bd-container" id="services">
            <span class="section-subtitle"></span>
            <h2 class="section-title">Kaay Deefar, la référence des petits travaux et services à domicile</h2>

            <div class="services__container  bd-grid">
                <div class="services__content">
                    <svg width="134" height="134" viewBox="0 0 134 134" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M67 113C93.5097 113 115 91.5097 115 65C115 38.4903 93.5097 17 67 17C40.4903 17 19 38.4903 19 65C19 91.5097 40.4903 113 67 113Z" fill="white"/>
                        <path d="M114.5 65C114.5 91.2335 93.2335 112.5 67 112.5C40.7665 112.5 19.5 91.2335 19.5 65C19.5 38.7665 40.7665 17.5 67 17.5C93.2335 17.5 114.5 38.7665 114.5 65Z" stroke="#EFF0F4"/>
                        </g>
                        <rect x="51" y="47.2183" width="31" height="38" rx="3.2" fill="white" stroke="black" stroke-width="2"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M56.5625 53.9473C56.5625 53.2914 57.0942 52.7598 57.75 52.7598H76.0417C76.6975 52.7598 77.2292 53.2914 77.2292 53.9473C77.2292 54.6031 76.6975 55.1348 76.0417 55.1348H57.75C57.0942 55.1348 56.5625 54.6031 56.5625 53.9473ZM56.5625 59.4889C56.5625 58.8331 57.0942 58.3014 57.75 58.3014H68.8878C69.5437 58.3014 70.0753 58.8331 70.0753 59.4889C70.0753 60.1448 69.5437 60.6764 68.8878 60.6764H57.75C57.0942 60.6764 56.5625 60.1448 56.5625 59.4889ZM57.75 74.9264C57.0942 74.9264 56.5625 75.4581 56.5625 76.1139C56.5625 76.7698 57.0942 77.3014 57.75 77.3014H68.8878C69.5437 77.3014 70.0753 76.7698 70.0753 76.1139C70.0753 75.4581 69.5437 74.9264 68.8878 74.9264H57.75ZM56.5625 65.0306C56.5625 64.3748 57.0942 63.8431 57.75 63.8431H72.8622C73.518 63.8431 74.0497 64.3748 74.0497 65.0306C74.0497 65.6864 73.518 66.2181 72.8622 66.2181H57.75C57.0942 66.2181 56.5625 65.6864 56.5625 65.0306ZM57.75 69.3848C57.0942 69.3848 56.5625 69.9164 56.5625 70.5723C56.5625 71.2281 57.0942 71.7598 57.75 71.7598H72.8622C73.518 71.7598 74.0497 71.2281 74.0497 70.5723C74.0497 69.9164 73.518 69.3848 72.8622 69.3848H57.75Z" fill="black"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M96.1914 50.7281L94.7564 49.2922C93.7772 48.3131 92.1829 48.3131 91.2029 49.2922L71.744 68.7507C71.4946 69.0001 67.977 75.1155 69.1731 76.3108C70.3675 77.5061 76.4831 73.9894 76.7325 73.74L96.1914 54.2815C97.1706 53.3015 97.1706 51.7072 96.1914 50.7281ZM93.3579 50.6913L94.7938 52.1272C95.0003 52.3355 95.0003 52.6741 94.7938 52.8815L93.4471 54.2281L91.2578 52.038L92.6045 50.6922C92.811 50.4839 93.1496 50.4839 93.3579 50.6913ZM74.007 73.0566C74.6492 72.7513 75.1707 72.4765 75.3536 72.3225L75.9049 71.7695L73.7138 69.5793L73.1451 70.149C72.9981 70.3257 72.7285 70.8394 72.4258 71.4755L74.007 73.0566Z" fill="black"/>
                        <path d="M75.2898 68.1167L77.2892 70.2321L91.9436 55.7312L89.8334 53.4994L75.2898 68.1167Z" fill="white"/>
                        <path d="M73.71 69.5671C73.71 69.5671 73.0987 70.1657 73.0154 70.2964C72.9321 70.4271 72.3555 71.4542 72.3555 71.4542L74.0043 73.0589L75.3309 72.3751C75.3309 72.3751 75.899 71.8159 75.899 71.7847C75.899 71.7535 73.71 69.5671 73.71 69.5671Z" fill="white"/>
                        <path d="M75.0636 68.1275L77.2305 70.5259L92.1461 55.706L89.6091 53.1998L75.0636 68.1275Z" fill="url(#paint0_linear)"/>
                        <defs>
                        <filter id="filter0_d" x="0" y="0" width="134" height="134" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset dy="2"/>
                        <feGaussianBlur stdDeviation="9.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0791357 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                        </filter>
                        <linearGradient id="paint0_linear" x1="86.8702" y1="67.5475" x2="88.7781" y2="56.7274" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFF0F"/>
                        <stop offset="1" stop-color="#FF2780"/>
                        </linearGradient>
                        </defs>
                        </svg>

                    <h3 class="services__title">Simple</h3>
                    <p class="services__description">Publiez une mission gratuitement en quelques secondes</p>
                </div>

                <div class="services__content">
                    <svg width="134" height="134" viewBox="0 0 134 134" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M67 113C93.5097 113 115 91.5097 115 65C115 38.4903 93.5097 17 67 17C40.4903 17 19 38.4903 19 65C19 91.5097 40.4903 113 67 113Z" fill="white"/>
                        <path d="M114.5 65C114.5 91.2335 93.2335 112.5 67 112.5C40.7665 112.5 19.5 91.2335 19.5 65C19.5 38.7665 40.7665 17.5 67 17.5C93.2335 17.5 114.5 38.7665 114.5 65Z" stroke="#EFF0F4"/>
                        </g>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M51.705 57.0391C49.1123 57.0438 46.9964 59.1617 47 61.7469L47.019 72.2606C47.0225 74.847 49.1467 76.9578 51.737 76.9542L54.0936 76.9495L54.1055 84L62.1432 76.9365L75.2974 76.914C77.8877 76.9104 80.0047 74.7914 80 72.2061L79.9834 61.6925C79.9786 59.1061 77.8545 56.9953 75.263 57L51.705 57.0391Z" fill="url(#paint0_linear)" stroke="black" stroke-width="2"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M89 56C89 61.5235 84.5224 66 79.0012 66C73.4776 66 69 61.5235 69 56C69 50.4776 73.4776 46 79.0012 46C84.5224 46 89 50.4776 89 56Z" fill="white"/>
                        <path d="M89 56C89 61.5235 84.5224 66 79.0012 66C73.4776 66 69 61.5235 69 56C69 50.4776 73.4776 46 79.0012 46C84.5224 46 89 50.4776 89 56" stroke="black" stroke-width="2"/>
                        <path d="M74 53.9923L79.0056 59L92 46" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <defs>
                        <filter id="filter0_d" x="0" y="0" width="134" height="134" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset dy="2"/>
                        <feGaussianBlur stdDeviation="9.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0791357 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                        </filter>
                        <linearGradient id="paint0_linear" x1="64.2834" y1="84.2214" x2="78.1334" y2="67.6375" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFF0F"/>
                        <stop offset="1" stop-color="#FF2780"/>
                        </linearGradient>
                        </defs>
                        </svg>

                    <h3 class="services__title">Rapide</h3>
                    <p class="services__description">Recevez des propositions en quelques heures</p>
                </div>

                <div class="services__content">
                    <svg width="134" height="134" viewBox="0 0 134 134" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M67 113C93.5097 113 115 91.5097 115 65C115 38.4903 93.5097 17 67 17C40.4903 17 19 38.4903 19 65C19 91.5097 40.4903 113 67 113Z" fill="white"/>
                        <path d="M114.5 65C114.5 91.2335 93.2335 112.5 67 112.5C40.7665 112.5 19.5 91.2335 19.5 65C19.5 38.7665 40.7665 17.5 67 17.5C93.2335 17.5 114.5 38.7665 114.5 65Z" stroke="#EFF0F4"/>
                        </g>
                        <rect x="44" y="65" width="38" height="7" fill="#E23B13"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M47.6597 58C45.0862 58 43 60.0862 43 62.6597V85.1707C43 87.7441 45.0862 89.8304 47.6597 89.8304H77.9477C80.5211 89.8304 82.6073 87.7441 82.6073 85.1707V62.6597C82.6073 60.0862 80.5211 58 77.9477 58H47.6597Z" fill="white" stroke="black" stroke-width="2"/>
                        <rect x="44" y="66" width="38.6" height="5" fill="url(#paint0_linear)" stroke="black" stroke-width="2"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M74.0159 65.7109C72.6853 65.7109 71.6016 64.7114 71.6016 63.4819V52.229C71.6016 50.9996 72.6853 50 74.0159 50H88.3508C89.6825 50 90.7652 50.9996 90.7652 52.229V63.4819C90.7652 64.7114 89.6825 65.7109 88.3508 65.7109H74.0159Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M78.1992 57.8322C78.1992 59.8393 79.8279 61.4656 81.8356 61.4656C83.8433 61.4656 85.4719 59.8393 85.4719 57.8322C85.4719 55.8262 83.8433 54.2 81.8356 54.2C79.8279 54.2 78.1992 55.8262 78.1992 57.8322Z" fill="url(#paint1_linear)"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M78.5696 57.7261C78.5696 56.2421 79.8131 55.0348 81.3416 55.0348C82.8702 55.0348 84.1126 56.2421 84.1126 57.7261C84.1126 59.2091 82.8702 60.4164 81.3416 60.4164C79.8131 60.4164 78.5696 59.2091 78.5696 57.7261ZM77.0469 57.7261C77.0469 60.0245 78.973 61.8936 81.3403 61.8936C83.7076 61.8936 85.6327 60.0245 85.6327 57.7261C85.6327 55.4278 83.7076 53.5577 81.3403 53.5577C78.973 53.5577 77.0469 55.4278 77.0469 57.7261ZM89.7146 63.3489C89.7146 64.1633 89.032 64.8261 88.1932 64.8261H74.6425C73.8037 64.8261 73.1211 64.1633 73.1211 63.3489V52.1633C73.1211 51.3489 73.8037 50.6862 74.6425 50.6862H88.1932C89.032 50.6862 89.7146 51.3489 89.7146 52.1633V63.3489ZM75.9727 48.2638C75.9727 45.348 78.3385 43.0771 81.3427 43.0771C84.347 43.0771 86.869 45.348 86.869 48.2638V49.209H75.9727V48.2638ZM88.3888 49.2091V48.2638C88.3888 44.5327 85.1842 41.6001 81.3411 41.6001C77.498 41.6001 74.4496 44.5327 74.4496 48.2638V49.2091H74.6444C72.9708 49.2091 71.6016 50.5385 71.6016 52.1633V63.349C71.6016 64.9738 72.9708 66.3032 74.6444 66.3032H88.1951C89.8676 66.3032 91.2379 64.9738 91.2379 63.349V52.1633C91.2379 50.5385 89.8676 49.2091 88.1951 49.2091H88.3888Z" fill="black"/>
                        <defs>
                        <filter id="filter0_d" x="0" y="0" width="134" height="134" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset dy="2"/>
                        <feGaussianBlur stdDeviation="9.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0791357 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                        </filter>
                        <linearGradient id="paint0_linear" x1="43" y1="72" x2="83.6" y2="72" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFF0F"/>
                        <stop offset="1" stop-color="#FF2780"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear" x1="78.1992" y1="60.7814" x2="84.1022" y2="60.7814" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFF0F"/>
                        <stop offset="1" stop-color="#FF2780"/>
                        </linearGradient>
                        </defs>
                        </svg>

                    <h3 class="services__title">Pas cher</h3>
                    <p class="services__description">Réservez en ligne grâce au paiement sécurisé</p>
                </div>
            </div>
        </section>
<?php 
    if(isset($stmt['idClient'])){ 
?>
        <section class="menu section bd-container" id="menu" > 
            <span class="section-subtitles">Les dernières missions réalisées </span>
            <div class="menu__container bd-grid">
            <div class="menu__content"  >
                    <img   src="EspacePrestataire/images/<?=$stmt['photo']?>" class="rounded-circle"><br>
                    <h3 style="color: #069C54;" class="menu__name m-sm-3"><?= $stmt['prenom']?> <?= $stmt['nom']?></h3><br>
                    <h3 style="color: #393939;" class="menu__name "><?= $stmt['contenu']?><br><?=$stmt['DateNote']?></h3><br>
                    
            </div>
        </section>
        <?php
    }
    ?>
        <!--========== MENU ==========-->
        <section class="menu section bd-container" id="menu">
        <span class="section-subtitles">Services</span>
            <div class="menu__container bd-grid">
                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                        .st1{fill:#FE2780;}
                    </style>
                    <title>ico-tile-demenageur</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Nouvelle-Home-Stootie">
                        <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                            <g id="Group-21" transform="translate(33.000000, 22.000000)">
                                <g id="Rectangle">
                                    <rect x="13.2" y="41.5" class="st0" width="16.6" height="26.3"/>
                                    <path d="M29.8,68.9H13.2c-0.6,0-1-0.5-1-1V41.5c0-0.6,0.5-1,1-1h16.6c0.6,0,1,0.5,1,1v26.3C30.8,68.4,30.3,68.9,29.8,68.9z
                                        M14.2,66.9h14.6V42.6H14.2V66.9z"/>
                                </g>
                                <g>
                                    <polygon class="st0" points="13.2,41.5 29.8,41.5 25.6,49.9 9,49.9 				"/>
                                    <path d="M25.6,50.9H9c-0.4,0-0.7-0.2-0.9-0.5c-0.2-0.3-0.2-0.7,0-1l4.2-8.3c0.2-0.3,0.5-0.6,0.9-0.6h16.6c0.4,0,0.7,0.2,0.9,0.5
                                        s0.2,0.7,0,1l-4.2,8.3C26.3,50.7,26,50.9,25.6,50.9z M10.6,48.8H25l3.1-6.3H13.8L10.6,48.8z"/>
                                </g>
                                <g>
                                    <rect x="29.8" y="41.5" class="st0" width="9.7" height="26.3"/>
                                    <path d="M39.4,68.9h-9.7c-0.6,0-1-0.5-1-1V41.5c0-0.6,0.5-1,1-1h9.7c0.6,0,1,0.5,1,1v26.3C40.5,68.4,40,68.9,39.4,68.9z
                                        M30.8,66.9h7.7V42.6h-7.7V66.9z"/>
                                </g>
                                <g id="Line-Copy-3">
                                    <path class="st0" d="M20.1,70.7h54"/>
                                    <path class="st1" d="M74,71.7h-54c-0.6,0-1-0.5-1-1s0.5-1,1-1h54c0.6,0,1,0.5,1,1S74.6,71.7,74,71.7z"/>
                                </g>
                                <g>
                                    <polygon class="st0" points="39.4,41.5 29.8,41.5 35.3,49.9 45,49.9 				"/>
                                    <path d="M45,50.9h-9.7c-0.3,0-0.7-0.2-0.8-0.5l-5.5-8.3c-0.2-0.3-0.2-0.7,0-1s0.5-0.5,0.9-0.5h9.7c0.3,0,0.7,0.2,0.8,0.5
                                        l5.5,8.3c0.2,0.3,0.2,0.7,0,1C45.7,50.7,45.3,50.9,45,50.9z M35.8,48.8h7.3l-4.2-6.3h-7.3L35.8,48.8z"/>
                                </g>
                                <g id="Path">
                                    <polyline class="st0" points="79.6,54 49.7,54 49.7,18 79.6,18 				"/>
                                    <path class="st1" d="M79.6,55H49.7c-0.6,0-1-0.5-1-1V18c0-0.6,0.5-1,1-1h29.9c0.6,0,1,0.5,1,1s-0.5,1-1,1H50.7v34h28.8
                                        c0.6,0,1,0.5,1,1S80.1,55,79.6,55z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M49.7,40.6h2.9c1.1,0,2,0.9,2,2V54h-4.9V40.6z"/>
                                    <path class="st1" d="M54.7,55h-4.9c-0.6,0-1-0.5-1-1V40.6c0-0.6,0.5-1,1-1h2.9c1.7,0,3,1.4,3,3V54C55.7,54.6,55.2,55,54.7,55z
                                        M50.7,53h2.9V42.6c0-0.6-0.5-1-1-1h-1.9V53z"/>
                                </g>
                                <g id="Line-8">
                                    <rect x="49.7" y="48.1" class="st1" width="4.9" height="2"/>
                                </g>
                                <g>
                                    <path class="st0" d="M53.3,54.1h21.6v6.8H56c-1.5,0-2.7-1.2-2.7-2.7V54.1z"/>
                                    <path class="st1" d="M74.9,61.9H56c-2,0-3.7-1.7-3.7-3.7v-4.1c0-0.6,0.5-1,1-1h21.6c0.6,0,1,0.5,1,1v6.8
                                        C75.9,61.4,75.4,61.9,74.9,61.9z M54.3,55.1v3.1c0,0.9,0.8,1.7,1.7,1.7h17.8v-4.8H54.3z"/>
                                </g>
                                <g id="Line-9">
                                    <path class="st0" d="M71.1,60.9h8.6"/>
                                    <path class="st1" d="M79.7,61.9h-8.6c-0.6,0-1-0.5-1-1s0.5-1,1-1h8.6c0.6,0,1,0.5,1,1S80.2,61.9,79.7,61.9z"/>
                                </g>
                                <g id="Oval">
                                    <ellipse class="st0" cx="64.1" cy="60.9" rx="6.9" ry="6.9"/>
                                    <path class="st1" d="M64.1,68.9c-4.4,0-7.9-3.6-7.9-7.9c0-4.4,3.6-7.9,7.9-7.9s7.9,3.6,7.9,7.9C72.1,65.3,68.5,68.9,64.1,68.9z
                                        M64.1,55c-3.3,0-5.9,2.7-5.9,5.9s2.6,5.9,5.9,5.9s5.9-2.7,5.9-5.9S67.4,55,64.1,55z"/>
                                </g>
                                <g>
                                    <ellipse class="st0" cx="64.1" cy="60.9" rx="2.8" ry="2.8"/>
                                    <path class="st1" d="M64.1,64.7c-2.1,0-3.8-1.7-3.8-3.8s1.7-3.8,3.8-3.8s3.8,1.7,3.8,3.8S66.2,64.7,64.1,64.7z M64.1,59.2
                                        c-1,0-1.8,0.8-1.8,1.8s0.8,1.8,1.8,1.8s1.8-0.8,1.8-1.8S65.1,59.2,64.1,59.2z"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    </svg>

                    <h3 class="menu__name">Déménagement</h3>
                </div>

                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                        .st1{fill:#FE2780;}
                        .st2{fill-rule:evenodd;clip-rule:evenodd;fill:#FE2780;}
                    </style>
                    <title>ico-tile-aidemenagere</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Nouvelle-Home-Stootie">
                        <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                            <g id="Group-28" transform="translate(33.000000, 22.000000)">
                                <g id="Line-3">
                                    <path class="st0" d="M22.1,69.2h12.8c2.1-1.4,3.1-5.3,3.1-11.7s-2.4-14.1-7.3-23.1h-5.5c1.2,4,1.6,7.7,1.2,11
                                        c-0.6,4.9-5.8,5.8-6.8,12.2C18.9,61.8,19.8,65.7,22.1,69.2z"/>
                                    <path d="M34.9,70.3H22.1c-0.3,0-0.7-0.2-0.8-0.5c-2.4-3.7-3.3-7.9-2.6-12.4c0.6-3.7,2.4-5.7,4-7.4c1.3-1.5,2.5-2.7,2.7-4.7
                                        c0.4-3.1,0-6.7-1.2-10.5c-0.1-0.3,0-0.6,0.2-0.9c0.2-0.3,0.5-0.4,0.8-0.4h5.5c0.4,0,0.7,0.2,0.9,0.5c4.9,9.2,7.4,17.1,7.4,23.6
                                        c0,6.8-1.2,10.9-3.5,12.5C35.3,70.2,35.1,70.3,34.9,70.3z M22.6,68.2h11.9c1.2-1,2.4-3.7,2.4-10.7c0-6-2.3-13.5-6.9-22.1h-3.6
                                        c0.9,3.6,1.2,7,0.9,10.1c-0.3,2.7-1.8,4.3-3.3,5.9c-1.5,1.6-3,3.3-3.5,6.4C20,61.5,20.7,65.1,22.6,68.2z"/>
                                </g>
                                <g id="Line-4">
                                    <path class="st0" d="M22.5,25.6L19.8,31"/>
                                    <path d="M19.8,32c-0.2,0-0.3,0-0.4-0.1c-0.5-0.2-0.7-0.9-0.5-1.4l2.7-5.5c0.2-0.5,0.9-0.7,1.4-0.5c0.5,0.2,0.7,0.9,0.5,1.4
                                        l-2.7,5.5C20.6,31.8,20.2,32,19.8,32z"/>
                                </g>
                                <g id="Path">
                                    <path class="st0" d="M33.9,27.6h-3.5v2.7h-6.9c0-2.1-1.6-3.8-3.7-4.1l1.4-4.1h7.7L33.9,27.6z"/>
                                    <path d="M30.4,31.4h-6.9c-0.6,0-1-0.5-1-1c0-1.6-1.2-2.9-2.8-3.1c-0.3,0-0.6-0.2-0.7-0.5c-0.2-0.3-0.2-0.6-0.1-0.9l1.4-4.1
                                        c0.1-0.4,0.5-0.7,1-0.7h7.7c0.3,0,0.6,0.1,0.7,0.3l5,5.5c0.3,0.3,0.3,0.7,0.2,1.1c-0.2,0.4-0.5,0.6-0.9,0.6h-2.5v1.7
                                        C31.4,30.9,31,31.4,30.4,31.4z M24.4,29.3h5v-1.7c0-0.6,0.5-1,1-1h1.2l-3.1-3.4h-6.5l-0.8,2.4C22.8,26.2,24.1,27.6,24.4,29.3z"
                                        />
                                </g>
                                <g id="Stroke-1-Copy">
                                    <path class="st0" d="M53.3,69.4c0-24.5,0-36.8,0-36.8s14.6,10.1,14.6,26.9v9.9H53.3z"/>
                                    <path class="st1" d="M67.9,70.4H53.3c-0.6,0-1-0.5-1-1l0-36.8c0-0.4,0.2-0.7,0.5-0.9c0.3-0.2,0.7-0.2,1,0.1
                                        c0.6,0.4,15,10.6,15,27.7v9.9C68.9,70,68.5,70.4,67.9,70.4z M54.3,68.4h12.6v-8.9c0-12.8-8.9-21.7-12.6-24.8L54.3,68.4z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M44.2,69.4v-9.9c0-16.8,9.1-26.9,9.1-26.9s9.1,10.1,9.1,26.9v9.9H44.2z"/>
                                    <path class="st1" d="M62.4,70.4H44.2c-0.6,0-1-0.5-1-1v-9.9c0-17,9-27.2,9.4-27.6c0.4-0.4,1.1-0.4,1.5,0
                                        c0.4,0.4,9.4,10.6,9.4,27.6v9.9C63.4,70,63,70.4,62.4,70.4z M45.2,68.4h16.2v-8.9c0-13.4-5.9-22.5-8.1-25.3
                                        c-2.1,2.8-8.1,11.9-8.1,25.3V68.4z"/>
                                </g>
                                <g id="Stroke-1">
                                    <path class="st1" d="M42.5,43.5c-0.2,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4c0.9-1,1.4-2.2,1.4-3.5c0-1.3-0.5-2.5-1.4-3.5
                                        c-1.3-1.4-2-3.1-2-4.9c0-1.8,0.7-3.6,2-4.9c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4c-0.9,1-1.4,2.2-1.4,3.5
                                        c0,1.3,0.5,2.6,1.4,3.5c1.3,1.4,2,3.1,2,4.9c0,1.8-0.7,3.6-2,4.9C43.1,43.4,42.8,43.5,42.5,43.5z"/>
                                </g>
                                <g id="Stroke-1-Copy-2">
                                    <path class="st1" d="M49,33.9c-0.3,0-0.5-0.1-0.7-0.3c-1.3-1.4-2-3.1-2-4.9c0-1.8,0.7-3.6,2-4.9c0.9-1,1.4-2.2,1.4-3.5
                                        c0-1.3-0.5-2.5-1.4-3.5c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0c1.3,1.4,2,3.1,2,4.9c0,1.8-0.7,3.6-2,4.9
                                        c-0.9,1-1.4,2.2-1.4,3.5c0,1.3,0.5,2.6,1.4,3.5c0.4,0.4,0.4,1,0,1.4C49.5,33.8,49.2,33.9,49,33.9z"/>
                                </g>
                                <g id="Oval-Copy-10">
                                    <ellipse class="st2" cx="53.3" cy="39.5" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-2">
                                    <ellipse class="st2" cx="49.8" cy="46" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-3">
                                    <ellipse class="st2" cx="47.8" cy="52.5" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-4">
                                    <ellipse class="st2" cx="47.4" cy="59" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-5">
                                    <ellipse class="st2" cx="47.4" cy="65.5" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-6">
                                    <ellipse class="st2" cx="56.9" cy="46" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-7">
                                    <ellipse class="st2" cx="58.9" cy="52.5" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-8">
                                    <ellipse class="st2" cx="59.2" cy="59" rx="1" ry="1"/>
                                </g>
                                <g id="Oval-Copy-9">
                                    <ellipse class="st2" cx="59.2" cy="65.5" rx="1" ry="1"/>
                                </g>
                                <g id="Line-Copy-3">
                                    <path class="st0" d="M18,73.3h53.8"/>
                                    <path class="st1" d="M71.8,74.3H18c-0.6,0-1-0.5-1-1s0.5-1,1-1h53.8c0.6,0,1,0.5,1,1S72.4,74.3,71.8,74.3z"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    </svg>

                    <h3 class="menu__name">Ménage</h3>
                </div>

                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                        .st1{fill:#FE2780;}
                    </style>
                    <title>ico-tile-bricoleur</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Nouvelle-Home-Stootie">
                        <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                            <g id="Group-22" transform="translate(33.000000, 22.000000)">
                                <g id="Rectangle">
                                    <path class="st0" d="M44.1,25.7L44.1,25.7c1,0,1.8,0.8,1.8,1.8v23.6c0,1-0.8,1.8-1.8,1.8h0c-1,0-1.8-0.8-1.8-1.8V27.5
                                        C42.3,26.5,43.1,25.7,44.1,25.7z"/>
                                    <path class="st1" d="M44.1,53.9c-1.6,0-2.8-1.3-2.8-2.8V27.5c0-1.6,1.3-2.8,2.8-2.8c1.6,0,2.8,1.3,2.8,2.8v23.6
                                        C46.9,52.6,45.6,53.9,44.1,53.9z M44.1,26.7c-0.4,0-0.8,0.3-0.8,0.8v23.6c0,0.4,0.3,0.8,0.8,0.8s0.8-0.3,0.8-0.8V27.5
                                        C44.8,27.1,44.5,26.7,44.1,26.7z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M43.4,22.5h1.3c1,0,1.8,0.8,1.8,1.8v4c0,1-0.8,1.8-1.8,1.8h-1.3c-1,0-1.8-0.8-1.8-1.8v-4
                                        C41.6,23.3,42.4,22.5,43.4,22.5z"/>
                                    <path class="st1" d="M44.7,31.2h-1.3c-1.6,0-2.9-1.3-2.9-2.9v-4c0-1.6,1.3-2.9,2.9-2.9h1.3c1.6,0,2.9,1.3,2.9,2.9v4
                                        C47.6,29.9,46.3,31.2,44.7,31.2z M43.4,23.5c-0.5,0-0.8,0.4-0.8,0.8v4c0,0.5,0.4,0.8,0.8,0.8h1.3c0.5,0,0.8-0.4,0.8-0.8v-4
                                        c0-0.5-0.4-0.8-0.8-0.8H43.4z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M42.7,43.7h2.7c1,0,1.8,0.8,1.8,1.8v16.9c0,1-0.8,1.8-1.8,1.8h-2.7c-1,0-1.8-0.8-1.8-1.8V45.5
                                        C40.9,44.5,41.7,43.7,42.7,43.7z"/>
                                    <path d="M45.4,65.3h-2.7c-1.6,0-2.9-1.3-2.9-2.9V45.5c0-1.6,1.3-2.9,2.9-2.9h2.7c1.6,0,2.9,1.3,2.9,2.9v16.9
                                        C48.3,64,47,65.3,45.4,65.3z M42.7,44.7c-0.5,0-0.8,0.4-0.8,0.8v16.9c0,0.5,0.4,0.8,0.8,0.8h2.7c0.5,0,0.8-0.4,0.8-0.8V45.5
                                        c0-0.5-0.4-0.8-0.8-0.8H42.7z"/>
                                </g>
                                <g id="Path">
                                    <path class="st0" d="M34.3,38.5v21.8c0,1.7-1.4,3-3,3s-3-1.4-3-3V39.1c-1.7-0.7-3.1-2.2-3.7-4.2c-0.4-1.6-0.3-3.5,0.2-5.3
                                        l1.7-0.5l1.4,5.2l3.4,0.9l2.5-2.5l-1.4-5.2L34,27c1.4,1.3,2.4,2.9,2.9,4.5C37.6,34.3,36.5,37,34.3,38.5L34.3,38.5z"/>
                                    <path class="st1" d="M31.2,64.4c-2.2,0-4.1-1.8-4.1-4.1V39.7c-1.8-1-3.1-2.6-3.6-4.6c-0.5-1.7-0.4-3.9,0.2-5.9
                                        c0.1-0.3,0.4-0.6,0.7-0.7l1.7-0.5c0.5-0.1,1.1,0.2,1.3,0.7l1.2,4.6l2.2,0.6l1.6-1.6l-1.2-4.6c-0.1-0.3,0-0.5,0.1-0.8
                                        s0.4-0.4,0.6-0.5l1.7-0.5c0.3-0.1,0.7,0,1,0.2c1.5,1.4,2.7,3.3,3.2,5c0.8,2.9-0.3,5.9-2.6,7.7v21.3
                                        C35.3,62.6,33.5,64.4,31.2,64.4z M25.6,30.4c-0.4,1.5-0.4,3-0.1,4.2c0.4,1.6,1.6,2.9,3.1,3.5c0.4,0.2,0.6,0.5,0.6,0.9v21.3
                                        c0,1.1,0.9,2,2,2s2-0.9,2-2V38.5c0-0.3,0.2-0.7,0.5-0.9c1.9-1.3,2.8-3.6,2.2-5.8c-0.3-1.2-1.1-2.5-2.2-3.6l-0.1,0l1.1,4.2
                                        c0.1,0.4,0,0.7-0.3,1L32,35.9c-0.3,0.3-0.6,0.4-1,0.3l-3.4-0.9c-0.4-0.1-0.6-0.4-0.7-0.7l-1.1-4.2L25.6,30.4z"/>
                                </g>
                                <g id="Fill-1">
                                    <path class="st0" d="M24.3,71.4c0-7.8,6.4-14.2,14.3-14.2c-7.9,0-14.3-6.4-14.3-14.2c0,7.8-6.4,14.2-14.3,14.2
                                        C17.9,57.2,24.3,63.6,24.3,71.4z"/>
                                    <path d="M24.3,72.5c-0.6,0-1-0.5-1-1c0-7.3-5.9-13.2-13.2-13.2c-0.6,0-1-0.5-1-1s0.5-1,1-1c7.3,0,13.2-5.9,13.2-13.2
                                        c0-0.6,0.5-1,1-1s1,0.5,1,1c0,7.3,5.9,13.2,13.2,13.2c0.6,0,1,0.5,1,1s-0.5,1-1,1c-7.3,0-13.2,5.9-13.2,13.2
                                        C25.3,72,24.8,72.5,24.3,72.5z M15.5,57.2c4,1.5,7.2,4.7,8.7,8.7c1.6-4,4.7-7.2,8.7-8.7c-4-1.5-7.2-4.7-8.7-8.7
                                        C22.7,52.5,19.5,55.7,15.5,57.2z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M59.5,33.2h2.7c1,0,1.8,0.8,1.8,1.8v26.7c0,1-0.8,1.8-1.8,1.8h-2.7c-1,0-1.8-0.8-1.8-1.8V35
                                        C57.6,34,58.4,33.2,59.5,33.2z"/>
                                    <path class="st1" d="M62.1,64.6h-2.7c-1.6,0-2.9-1.3-2.9-2.9V35c0-1.6,1.3-2.9,2.9-2.9h2.7c1.6,0,2.9,1.3,2.9,2.9v26.7
                                        C65,63.3,63.7,64.6,62.1,64.6z M59.5,34.2c-0.5,0-0.8,0.4-0.8,0.8v26.7c0,0.5,0.4,0.8,0.8,0.8h2.7c0.5,0,0.8-0.4,0.8-0.8V35
                                        c0-0.5-0.4-0.8-0.8-0.8H59.5z"/>
                                </g>
                                <g id="Combined-Shape">
                                    <path class="st0" d="M55,28.1h14V37H50v-3.8C52.6,32.9,54.7,30.8,55,28.1z"/>
                                    <path class="st1" d="M69.1,38H50c-0.6,0-1-0.5-1-1v-3.8c0-0.5,0.4-1,0.9-1c2.2-0.2,3.9-2,4.1-4.1c0.1-0.5,0.5-0.9,1-0.9h14
                                        c0.6,0,1,0.5,1,1V37C70.1,37.6,69.6,38,69.1,38z M51,36h17v-6.8H55.9c-0.6,2.4-2.5,4.2-4.9,4.9V36z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M58.1,32.2c6,0,10.9,6.4,10.9,14.2c0-7.8,4.9-14.2,10.9-14.2c-6,0-10.9-6.4-10.9-14.2
                                        C69,25.8,64.1,32.2,58.1,32.2"/>
                                    <path d="M69,47.4c-0.6,0-1-0.5-1-1c0-7.3-4.4-13.2-9.8-13.2c-0.6,0-1-0.5-1-1s0.5-1,1-1c5.4,0,9.8-5.9,9.8-13.2c0-0.6,0.5-1,1-1
                                        s1,0.5,1,1c0,7.3,4.4,13.2,9.8,13.2c0.6,0,1,0.5,1,1s-0.5,1-1,1c-5.4,0-9.8,5.9-9.8,13.2C70,47,69.5,47.4,69,47.4z M62.4,32.2
                                        c2.9,1.5,5.3,4.4,6.6,8c1.3-3.7,3.6-6.6,6.6-8c-2.9-1.5-5.3-4.4-6.6-8C67.7,27.8,65.3,30.7,62.4,32.2z"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    </svg>

                    <h3 class="menu__name">Bricoleur</h3>
                </div>

                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                        .st1{fill:#FE2780;}
                        .st2{fill:#FFFFFF;}
                    </style>
                    <title>ico-tile-electricien</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Nouvelle-Home-Stootie">
                        <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                            <g id="Group-26" transform="translate(33.000000, 22.000000)">
                                <g id="Oval">
                                    <ellipse class="st0" cx="53.5" cy="39.4" rx="8.3" ry="8.2"/>
                                    <path d="M53.5,48.6c-5.1,0-9.3-4.1-9.3-9.2s4.2-9.2,9.3-9.2c5.1,0,9.3,4.1,9.3,9.2S58.7,48.6,53.5,48.6z M53.5,32.2
                                        c-4,0-7.3,3.2-7.3,7.2s3.3,7.2,7.3,7.2s7.3-3.2,7.3-7.2S57.5,32.2,53.5,32.2z"/>
                                </g>
                                <g id="Rectangle">
                                    <rect x="49.9" y="29.8" class="st0" width="7.3" height="3.3"/>
                                    <path d="M57.2,34.1h-7.3c-0.6,0-1-0.5-1-1v-3.3c0-0.6,0.5-1,1-1h7.3c0.6,0,1,0.5,1,1v3.3C58.2,33.7,57.7,34.1,57.2,34.1z
                                        M50.9,32.1h5.3v-1.3h-5.3V32.1z"/>
                                </g>
                                <g id="Path">
                                    <path class="st0" d="M50.9,36.7c-0.9,0-1.7,0.7-1.7,1.6S50,40,50.9,40s1.7-0.7,1.7-1.6v-5.7"/>
                                    <path d="M50.9,40.7c-1.3,0-2.3-1-2.3-2.3c0-1.3,1-2.3,2.3-2.3c0.4,0,0.7,0.3,0.7,0.7s-0.3,0.7-0.7,0.7c-0.5,0-1,0.4-1,1
                                        c0,0.5,0.4,1,1,1s1-0.4,1-1v-5.7c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7v5.7C53.2,39.6,52.2,40.7,50.9,40.7z"/>
                                </g>
                                <g id="Path-Copy">
                                    <path class="st0" d="M56.2,36.7c0.9,0,1.7,0.7,1.7,1.6S57.1,40,56.2,40s-1.7-0.7-1.7-1.6v-5.7"/>
                                    <path d="M56.2,40.7c-1.3,0-2.3-1-2.3-2.3v-5.7c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7v5.7c0,0.5,0.4,1,1,1s1-0.4,1-1
                                        c0-0.5-0.4-1-1-1c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.3,1,2.3,2.3C58.5,39.6,57.5,40.7,56.2,40.7z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M52.5,22.6h2c1.5,0,2.6,1.2,2.6,2.6v4.6h-7.3v-4.6C49.9,23.8,51.1,22.6,52.5,22.6z"/>
                                    <path d="M57.2,30.8h-7.3c-0.6,0-1-0.5-1-1v-4.6c0-2,1.6-3.7,3.7-3.7h2c2,0,3.7,1.6,3.7,3.7v4.6C58.2,30.4,57.7,30.8,57.2,30.8z
                                        M50.9,28.8h5.3v-3.6c0-0.9-0.7-1.6-1.6-1.6h-2c-0.9,0-1.6,0.7-1.6,1.6V28.8z"/>
                                </g>
                                <g id="Line-12-Copy">
                                    <path class="st0" d="M49.9,28.8l7.3-2"/>
                                    <rect x="49.7" y="27.2" transform="matrix(0.9651 -0.2619 0.2619 0.9651 -5.4256 14.9888)" width="7.6" height="1.3"/>
                                </g>
                                <g>
                                    <ellipse class="st0" cx="34.3" cy="50.6" rx="8.3" ry="8.2"/>
                                    <path class="st1" d="M34.3,59.8c-5.1,0-9.3-4.1-9.3-9.2s4.2-9.2,9.3-9.2s9.3,4.1,9.3,9.2S39.4,59.8,34.3,59.8z M34.3,43.3
                                        c-4,0-7.3,3.2-7.3,7.2c0,4,3.3,7.2,7.3,7.2s7.3-3.2,7.3-7.2C41.6,46.6,38.3,43.3,34.3,43.3z"/>
                                </g>
                                <g>
                                    <rect x="30.6" y="41" class="st0" width="7.3" height="3.3"/>
                                    <path class="st1" d="M37.9,45.3h-7.3c-0.6,0-1-0.5-1-1V41c0-0.6,0.5-1,1-1h7.3c0.6,0,1,0.5,1,1v3.3
                                        C38.9,44.9,38.5,45.3,37.9,45.3z M31.7,43.3h5.3V42h-5.3V43.3z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M31.6,47.9c-0.9,0-1.7,0.7-1.7,1.6s0.7,1.6,1.7,1.6c0.9,0,1.7-0.7,1.7-1.6v-5.7"/>
                                    <path class="st1" d="M31.6,51.9c-1.3,0-2.3-1-2.3-2.3c0-1.3,1-2.3,2.3-2.3c0.4,0,0.7,0.3,0.7,0.7s-0.3,0.7-0.7,0.7
                                        c-0.5,0-1,0.4-1,1c0,0.5,0.4,1,1,1s1-0.4,1-1v-5.7c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7v5.7C34,50.8,32.9,51.9,31.6,51.9z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M36.9,47.9c0.9,0,1.7,0.7,1.7,1.6s-0.7,1.6-1.7,1.6s-1.7-0.7-1.7-1.6v-5.7"/>
                                    <path class="st1" d="M36.9,51.9c-1.3,0-2.3-1-2.3-2.3v-5.7c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7v5.7c0,0.5,0.4,1,1,1
                                        s1-0.4,1-1c0-0.5-0.4-1-1-1c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.3,1,2.3,2.3C39.3,50.8,38.2,51.9,36.9,51.9z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M33.3,33.8h2c1.5,0,2.6,1.2,2.6,2.6V41h-7.3v-4.6C30.6,35,31.8,33.8,33.3,33.8z"/>
                                    <path class="st1" d="M37.9,42h-7.3c-0.6,0-1-0.5-1-1v-4.6c0-2,1.6-3.7,3.7-3.7h2c2,0,3.7,1.6,3.7,3.7V41
                                        C38.9,41.6,38.5,42,37.9,42z M31.7,40h5.3v-3.6c0-0.9-0.7-1.6-1.6-1.6h-2c-0.9,0-1.6,0.7-1.6,1.6V40z"/>
                                </g>
                                <g id="Line-12">
                                    <path class="st0" d="M30.6,37.4l6.3-1.6"/>
                                    
                                        <rect x="30.5" y="35.9" transform="matrix(0.9676 -0.2524 0.2524 0.9676 -8.1365 9.7129)" class="st1" width="6.5" height="1.4"/>
                                </g>
                                <g>
                                    <path class="st0" d="M30.6,40l7.3-2"/>
                                    
                                        <rect x="30.5" y="38.4" transform="matrix(0.9653 -0.2612 0.2612 0.9653 -9.0077 10.3126)" class="st1" width="7.6" height="1.3"/>
                                </g>
                                <g id="Line-13">
                                    <path class="st0" d="M34.3,33.8V16.3"/>
                                    <rect x="33.3" y="16.3" class="st1" width="2" height="17.4"/>
                                </g>
                                <g id="Rectangle-Copy-20">
                                    <rect x="43.2" y="64.1" class="st0" width="20.6" height="10.5"/>
                                    <path class="st1" d="M63.8,75.6H43.2c-0.6,0-1-0.5-1-1V64.1c0-0.6,0.5-1,1-1h20.6c0.6,0,1,0.5,1,1v10.5
                                        C64.8,75.1,64.4,75.6,63.8,75.6z M44.3,73.6h18.5v-8.5H44.3V73.6z"/>
                                </g>
                                <g id="Rectangle-Copy-21">
                                    <rect x="32.6" y="64.1" class="st0" width="10.6" height="10.5"/>
                                    <path class="st1" d="M43.2,75.6H32.6c-0.6,0-1-0.5-1-1V64.1c0-0.6,0.5-1,1-1h10.6c0.6,0,1,0.5,1,1v10.5
                                        C44.3,75.1,43.8,75.6,43.2,75.6z M33.6,73.6h8.6v-8.5h-8.6V73.6z"/>
                                </g>
                                <g id="Rectangle-Copy-22">
                                    <rect x="32.6" y="64.1" class="st0" width="10.6" height="10.5"/>
                                    <path class="st1" d="M43.2,75.6H32.6c-0.6,0-1-0.5-1-1V64.1c0-0.6,0.5-1,1-1h10.6c0.6,0,1,0.5,1,1v10.5
                                        C44.3,75.1,43.8,75.6,43.2,75.6z M33.6,73.6h8.6v-8.5h-8.6V73.6z"/>
                                </g>
                                <g>
                                    <path class="st0" d="M49.9,26.2l6.3-1.6"/>
                                    <rect x="49.8" y="24.7" transform="matrix(0.9674 -0.2532 0.2532 0.9674 -4.6982 14.2502)" width="6.5" height="1.3"/>
                                </g>
                                <g>
                                    <path class="st0" d="M53.5,22.6v-6.2"/>
                                    <rect x="52.5" y="16.3" width="2" height="6.2"/>
                                </g>
                                <g>
                                    <ellipse class="st0" cx="48.5" cy="69.3" rx="3.3" ry="3.3"/>
                                    <path class="st1" d="M48.5,73.3c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4C52.5,71.5,50.7,73.3,48.5,73.3z M48.5,66.7
                                        c-1.5,0-2.6,1.2-2.6,2.6c0,1.4,1.2,2.6,2.6,2.6s2.6-1.2,2.6-2.6C51.2,67.9,50,66.7,48.5,66.7z"/>
                                </g>
                                <g>
                                    <ellipse class="st2" cx="47.2" cy="69.3" rx="1" ry="1"/>
                                    <path class="st1" d="M47.2,71.1c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8s1.8,0.8,1.8,1.8S48.2,71.1,47.2,71.1z M47.2,69.1
                                        c-0.1,0-0.2,0.1-0.2,0.2c0,0.2,0.4,0.2,0.4,0C47.4,69.2,47.3,69.1,47.2,69.1z"/>
                                </g>
                                <g id="Oval-Copy-3">
                                    <ellipse class="st2" cx="49.9" cy="69.3" rx="1" ry="1"/>
                                    <path class="st1" d="M49.9,71.1c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8s1.8,0.8,1.8,1.8S50.9,71.1,49.9,71.1z M49.9,69.1
                                        c-0.1,0-0.2,0.1-0.2,0.2c0,0.2,0.4,0.2,0.4,0C50.1,69.2,50,69.1,49.9,69.1z"/>
                                </g>
                                <g>
                                    <ellipse class="st0" cx="58" cy="69.3" rx="3.3" ry="3.3"/>
                                    <path class="st1" d="M58,73.3c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4C62,71.5,60.2,73.3,58,73.3z M58,66.7
                                        c-1.5,0-2.6,1.2-2.6,2.6c0,1.4,1.2,2.6,2.6,2.6s2.6-1.2,2.6-2.6C60.6,67.9,59.5,66.7,58,66.7z"/>
                                </g>
                                <g>
                                    <ellipse class="st2" cx="56.7" cy="69.3" rx="1" ry="1"/>
                                    <path class="st1" d="M56.7,71.1c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8s1.8,0.8,1.8,1.8S57.7,71.1,56.7,71.1z M56.7,69.1
                                        c-0.1,0-0.2,0.1-0.2,0.2c0,0.2,0.4,0.2,0.4,0C56.9,69.2,56.8,69.1,56.7,69.1z"/>
                                </g>
                                <g>
                                    <ellipse class="st2" cx="59.3" cy="69.3" rx="1" ry="1"/>
                                    <path class="st1" d="M59.3,71.1c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8s1.8,0.8,1.8,1.8S60.3,71.1,59.3,71.1z M59.3,69.1
                                        c-0.1,0-0.2,0.1-0.2,0.2c0,0.2,0.4,0.2,0.4,0C59.5,69.2,59.4,69.1,59.3,69.1z"/>
                                </g>
                                <g>
                                    <rect x="36.6" y="66.8" class="st0" width="2.7" height="5.1"/>
                                    <path class="st1" d="M39.3,72.6h-2.7c-0.4,0-0.7-0.3-0.7-0.7v-5.1c0-0.4,0.3-0.7,0.7-0.7h2.7c0.4,0,0.7,0.3,0.7,0.7V72
                                        C39.9,72.3,39.6,72.6,39.3,72.6z M37.3,71.3h1.3v-3.8h-1.3V71.3z"/>
                                </g>
                                <g id="Line-11">
                                    <path class="st0" d="M36.6,69.3h2.7"/>
                                    <path class="st1" d="M39.3,70h-2.7c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h2.7c0.4,0,0.7,0.3,0.7,0.7S39.6,70,39.3,70z"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    </svg>

                    <h3 class="menu__name">Electicité</h3>
                </div>

                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                        .st1{fill:#FE2780;}
                    </style>
                    <title>ico-tile-jardinier</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Nouvelle-Home-Stootie">
                        <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                            <g id="Group-23" transform="translate(33.000000, 22.000000)">
                                <g id="Path">
                                    <path class="st0" d="M19,46.5c0-7.4,3.1-24.5,7-24.5c3.9,0,7,17.1,7,24.5c0,7.4-3.1,9.1-7,9.1C22.1,55.6,19,54,19,46.5z"/>
                                    <path d="M26,56.6c-5.5,0-8-3.2-8-10.1c0-5.2,2.5-25.5,8-25.5c5.5,0,8,20.3,8,25.5C34,53.4,31.4,56.6,26,56.6z M26,23
                                        c-2.3,0-6,14.3-6,23.5c0,7.1,2.9,8,6,8s6-1,6-8C31.9,37.3,28.3,23,26,23z"/>
                                </g>
                                <g id="Line">
                                    <path class="st0" d="M26.3,36v31.3"/>
                                    <path d="M26.3,68c-0.4,0-0.7-0.3-0.7-0.7V36c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7v31.3C26.9,67.7,26.6,68,26.3,68z"/>
                                </g>
                                <g id="Line-8">
                                    <path class="st0" d="M26.1,51.2l-4.7-4.4"/>
                                    <path d="M26.1,51.9c-0.2,0-0.3-0.1-0.5-0.2L21,47.3c-0.3-0.3-0.3-0.7,0-1c0.3-0.3,0.7-0.3,1,0l4.7,4.4c0.3,0.3,0.3,0.7,0,1
                                        C26.5,51.8,26.3,51.9,26.1,51.9z"/>
                                </g>
                                <g id="Line-7">
                                    <path class="st0" d="M26.3,44.1l2.9-3.6"/>
                                    <path d="M26.3,44.7c-0.1,0-0.3,0-0.4-0.1c-0.3-0.2-0.3-0.7-0.1-0.9l2.9-3.6c0.2-0.3,0.7-0.3,0.9-0.1c0.3,0.2,0.3,0.7,0.1,0.9
                                        l-2.9,3.6C26.7,44.6,26.5,44.7,26.3,44.7z"/>
                                </g>
                                <g id="Rectangle">
                                    <polygon class="st0" points="39.2,46.2 42.7,39.7 46.2,46.2 46.2,67.5 39.2,67.5 				"/>
                                    <path class="st1" d="M46.2,68.6h-7c-0.6,0-1-0.5-1-1V46.2c0-0.2,0-0.3,0.1-0.5l3.5-6.6c0.4-0.7,1.4-0.7,1.8,0l3.5,6.6
                                        c0.1,0.1,0.1,0.3,0.1,0.5v21.3C47.2,68.1,46.8,68.6,46.2,68.6z M40.3,66.5h5V46.5l-2.5-4.7l-2.5,4.7V66.5z"/>
                                </g>
                                <g id="Rectangle-Copy">
                                    <polygon class="st0" points="50.7,46.2 54.2,39.7 57.7,46.2 57.7,67.5 50.7,67.5 				"/>
                                    <path class="st1" d="M57.7,68.6h-7c-0.6,0-1-0.5-1-1V46.2c0-0.2,0-0.3,0.1-0.5l3.5-6.6c0.4-0.7,1.4-0.7,1.8,0l3.5,6.6
                                        c0.1,0.1,0.1,0.3,0.1,0.5v21.3C58.7,68.1,58.3,68.6,57.7,68.6z M51.8,66.5h5V46.5l-2.5-4.7l-2.5,4.7V66.5z"/>
                                </g>
                                <g id="Rectangle-Copy-2">
                                    <polygon class="st0" points="61.7,46.2 65.2,39.7 68.7,46.2 68.7,67.5 61.7,67.5 				"/>
                                    <path class="st1" d="M68.7,68.6h-7c-0.6,0-1-0.5-1-1V46.2c0-0.2,0-0.3,0.1-0.5l3.5-6.6c0.4-0.7,1.4-0.7,1.8,0l3.5,6.6
                                        c0.1,0.1,0.1,0.3,0.1,0.5v21.3C69.7,68.1,69.2,68.6,68.7,68.6z M62.7,66.5h5V46.5l-2.5-4.7l-2.5,4.7V66.5z"/>
                                </g>
                                <g>
                                    <rect x="36.5" y="49" class="st0" width="34.9" height="5.8"/>
                                    <path class="st1" d="M71.4,55.9H36.5c-0.6,0-1-0.5-1-1V49c0-0.6,0.5-1,1-1h34.9c0.6,0,1,0.5,1,1v5.8
                                        C72.4,55.4,72,55.9,71.4,55.9z M37.5,53.9h32.9V50H37.5V53.9z"/>
                                </g>
                                <g id="Rectangle-Copy-3">
                                    <rect x="36.5" y="58.5" class="st0" width="34.9" height="5.8"/>
                                    <path class="st1" d="M71.4,65.3H36.5c-0.6,0-1-0.5-1-1v-5.8c0-0.6,0.5-1,1-1h34.9c0.6,0,1,0.5,1,1v5.8
                                        C72.4,64.9,72,65.3,71.4,65.3z M37.5,63.3h32.9v-3.8H37.5V63.3z"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    </svg>

                    <h3 class="menu__name">Jardinage</h3>
                </div>

                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                    .st1{fill:#FE2780;}
                </style>
                <title>ico-tile-peinture</title>
                <desc>Created with Sketch.</desc>
                <g id="Nouvelle-Home-Stootie">
                    <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                        <g id="Group-24" transform="translate(33.000000, 22.000000)">
                            <g id="Stroke-3">
                                <polygon class="st0" points="34.6,68.7 39.1,68.7 39.1,47 34.6,47 				"/>
                                <path class="st1" d="M39.1,69.7h-4.5c-0.6,0-1-0.5-1-1V47c0-0.6,0.5-1,1-1h4.5c0.6,0,1,0.5,1,1v21.7
                                    C40.1,69.3,39.7,69.7,39.1,69.7z M35.6,67.7h2.5V48.1h-2.5V67.7z"/>
                            </g>
                            <g id="Stroke-5">
                                <path class="st0" d="M49.7,26.6h4.7c0.6,0,1.2,0.5,1.2,1.2v9.1c0,0.6-0.5,1.3-1.1,1.4l-15.9,4c-0.6,0.2-1.1,0.8-1.1,1.4v3.4"/>
                                <path class="st1" d="M38.4,47.1h-2v-3.4c0-1.1,0.8-2.2,1.9-2.4l15.9-4c0.2,0,0.4-0.3,0.4-0.5v-9.1c0-0.1-0.1-0.2-0.2-0.2h-4.7
                                    v-2h4.7c1.2,0,2.2,1,2.2,2.2v9.1c0,1.1-0.8,2.2-1.9,2.4l-15.9,4c-0.2,0-0.4,0.3-0.4,0.5V47.1z"/>
                            </g>
                            <g id="Stroke-1">
                                <path class="st0" d="M50.8,28.2c0,1.6-1.3,2.9-2.9,2.9h-26c-1.6,0-2.9-1.3-2.9-2.9v-3.3c0-1.6,1.3-2.9,2.9-2.9h26
                                    c1.6,0,2.9,1.3,2.9,2.9V28.2z"/>
                                <path class="st1" d="M47.9,32.1h-26c-2.2,0-3.9-1.8-3.9-3.9v-3.3c0-2.2,1.8-3.9,3.9-3.9h26c2.2,0,3.9,1.8,3.9,3.9v3.3
                                    C51.9,30.4,50.1,32.1,47.9,32.1z M21.9,23c-1,0-1.9,0.9-1.9,1.9v3.3c0,1,0.9,1.9,1.9,1.9h26c1,0,1.9-0.9,1.9-1.9v-3.3
                                    c0-1-0.9-1.9-1.9-1.9H21.9z"/>
                            </g>
                            <g id="Stroke-6">
                                <polygon class="st0" points="50.5,69 67.6,69 67.6,46.8 50.5,46.8 				"/>
                                <path d="M67.6,70H50.5c-0.6,0-1-0.5-1-1V46.8c0-0.6,0.5-1,1-1h17.1c0.6,0,1,0.5,1,1V69C68.7,69.5,68.2,70,67.6,70z M51.5,68
                                    h15.1V47.8H51.5V68z"/>
                            </g>
                            <g id="Stroke-8">
                                <path class="st0" d="M55.6,47v1.8c0,1.6,1,2.9,2.3,2.9c1.3,0,2.3,0.9,2.3,2c0,1.1,1,2,2.3,2c1.3,0,2.3-1.3,2.3-2.9V47H55.6z"/>
                                <path d="M62.6,56.8c-1.8,0-3.3-1.4-3.3-3.1c0-0.6-0.6-1-1.3-1c-1.8,0-3.3-1.8-3.3-3.9V47c0-0.6,0.5-1,1-1H65c0.6,0,1,0.5,1,1
                                    v5.8C66,55.1,64.5,56.8,62.6,56.8z M56.7,48.1v0.8c0,1,0.6,1.9,1.3,1.9c1.8,0,3.3,1.4,3.3,3.1c0,0.6,0.6,1,1.3,1
                                    c0.7,0,1.3-0.9,1.3-1.9v-4.8H56.7z"/>
                            </g>
                            <g id="Stroke-7">
                                <path class="st0" d="M47.1,46.8h23.3"/>
                                <path d="M70.4,47.8H47.1c-0.6,0-1-0.5-1-1s0.5-1,1-1h23.3c0.6,0,1,0.5,1,1S71,47.8,70.4,47.8z"/>
                            </g>
                        </g>
                    </g>
                </g>
                </svg>

                    <h3 class="menu__name">Peinture</h3>
                </div>

                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                    .st1{fill:#FE2780;}
                </style>
                <title>ico-tile-plombier</title>
                <desc>Created with Sketch.</desc>
                <g id="Nouvelle-Home-Stootie">
                    <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                        <g id="Group-27" transform="translate(33.000000, 22.000000)">
                            <g id="Rectangle">
                                <rect x="26" y="17" class="st0" width="8" height="57"/>
                                <path class="st1" d="M34,75h-8c-0.6,0-1-0.5-1-1V17c0-0.6,0.5-1,1-1h8c0.6,0,1,0.5,1,1v57C35,74.6,34.6,75,34,75z M27,73h6V18
                                    h-6V73z"/>
                            </g>
                            <g>
                                <path class="st0" d="M25.4,50h8.2c0.8,0,1.4,0.6,1.4,1.4v3.2c0,0.8-0.6,1.4-1.4,1.4h-8.2c-0.8,0-1.4-0.6-1.4-1.4v-3.2
                                    C24,50.6,24.6,50,25.4,50z"/>
                                <path class="st1" d="M33.6,57h-8.2c-1.3,0-2.4-1.1-2.4-2.4v-3.2c0-1.3,1.1-2.4,2.4-2.4h8.2c1.3,0,2.4,1.1,2.4,2.4v3.2
                                    C36,55.9,34.9,57,33.6,57z M25.4,51c-0.2,0-0.4,0.2-0.4,0.4v3.2c0,0.2,0.2,0.4,0.4,0.4h8.2c0.2,0,0.4-0.2,0.4-0.4v-3.2
                                    c0-0.2-0.2-0.4-0.4-0.4H25.4z"/>
                            </g>
                            <g id="Oval">
                                <ellipse class="st0" cx="34" cy="29.5" rx="4" ry="4.5"/>
                                <path class="st1" d="M34,35c-2.8,0-5-2.5-5-5.5s2.2-5.5,5-5.5s5,2.5,5,5.5S36.8,35,34,35z M34,26c-1.6,0-3,1.6-3,3.5
                                    s1.3,3.5,3,3.5s3-1.6,3-3.5S35.6,26,34,26z"/>
                            </g>
                            <g id="Line-5">
                                <path class="st0" d="M36.7,26.6l-5.4,5.5"/>
                                
                                    <rect x="30.2" y="28.7" transform="matrix(0.6976 -0.7165 0.7165 0.6976 -10.7508 33.2609)" class="st1" width="7.7" height="1.3"/>
                            </g>
                            <g>
                                <path class="st0" d="M36.7,32.1l-5.4-5.5"/>
                                
                                    <rect x="33.4" y="25.5" transform="matrix(0.7165 -0.6976 0.6976 0.7165 -10.8386 32.0661)" class="st1" width="1.3" height="7.7"/>
                            </g>
                            <g id="Rectangle-Copy-10">
                                <path class="st0" d="M25.4,40h8.2c0.8,0,1.4,0.6,1.4,1.4v3.2c0,0.8-0.6,1.4-1.4,1.4h-8.2c-0.8,0-1.4-0.6-1.4-1.4v-3.2
                                    C24,40.6,24.6,40,25.4,40z"/>
                                <path class="st1" d="M33.6,47h-8.2c-1.3,0-2.4-1.1-2.4-2.4v-3.2c0-1.3,1.1-2.4,2.4-2.4h8.2c1.3,0,2.4,1.1,2.4,2.4v3.2
                                    C36,45.9,34.9,47,33.6,47z M25.4,41c-0.2,0-0.4,0.2-0.4,0.4v3.2c0,0.2,0.2,0.4,0.4,0.4h8.2c0.2,0,0.4-0.2,0.4-0.4v-3.2
                                    c0-0.2-0.2-0.4-0.4-0.4H25.4z"/>
                            </g>
                            <g id="Path">
                                <path class="st0" d="M66,39.7h-5c-4,0-7.3,3.2-7.3,7.3v27H45V47c0-8.8,7.2-16,16-16h5V39.7L66,39.7z"/>
                                <path d="M53.7,75H45c-0.6,0-1-0.5-1-1V47c0-9.4,7.6-17,17-17h5c0.6,0,1,0.5,1,1v8.7c0,0.6-0.5,1-1,1h-5c-3.5,0-6.3,2.8-6.3,6.2
                                    v27C54.8,74.6,54.3,75,53.7,75z M46,73h6.7V47c0-4.6,3.7-8.3,8.3-8.3h4V32h-4c-8.3,0-15,6.7-15,15V73z"/>
                            </g>
                        </g>
                    </g>
                </g>
                    </svg>

                    <h3 class="menu__name">Plomberie</h3>
                </div>

                <div class="menu__content">
                    <!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                    .st1{fill:#FE2780;}
                </style>
                <title>ico-tile-reparateurelectro</title>
                <desc>Created with Sketch.</desc>
                <g id="Nouvelle-Home-Stootie">
                    <g id="Artboard" transform="translate(-33.000000, -22.000000)">
                        <g id="Group-25" transform="translate(33.000000, 22.000000)">
                            <g id="Rectangle">
                                <path class="st0" d="M16,18h46.2c0.5,0,1,0.4,1,1v37.6c0,0.5-0.4,1-1,1H16c-0.5,0-1-0.4-1-1V19C15,18.4,15.4,18,16,18z"/>
                                <path class="st1" d="M62.2,58.6H16c-1.1,0-2-0.9-2-2V19c0-1.1,0.9-2,2-2h46.2c1.1,0,2,0.9,2,2v37.6
                                    C64.2,57.7,63.3,58.6,62.2,58.6z M16,19v37.6l46.2,0l0-37.6L16,19z"/>
                            </g>
                            <g>
                                <path class="st0" d="M24.4,32.2h29.4c2.6,0,4.6,2.1,4.6,4.6v11.4c0,2.6-2.1,4.6-4.6,4.6H24.4c-2.6,0-4.6-2.1-4.6-4.6V36.8
                                    C19.8,34.3,21.8,32.2,24.4,32.2z"/>
                                <path class="st1" d="M53.8,53.9H24.4c-3.1,0-5.6-2.5-5.6-5.6V36.8c0-3.1,2.5-5.6,5.6-5.6h29.4c3.1,0,5.6,2.5,5.6,5.6v11.4
                                    C59.4,51.3,56.9,53.9,53.8,53.9z M24.4,33.2c-2,0-3.6,1.6-3.6,3.6v11.4c0,2,1.6,3.6,3.6,3.6h29.4c2,0,3.6-1.6,3.6-3.6V36.8
                                    c0-2-1.6-3.6-3.6-3.6H24.4z"/>
                            </g>
                            <g>
                                <path class="st0" d="M40,37.6h6.1v3.3c0,1.1-0.9,2.1-2.1,2.1h-2c-1.1,0-2.1-0.9-2.1-2.1V37.6z"/>
                                <path d="M44,43.7h-2c-1.5,0-2.8-1.2-2.8-2.8v-3.3c0-0.4,0.3-0.7,0.7-0.7h6.1c0.4,0,0.7,0.3,0.7,0.7v3.3
                                    C46.8,42.5,45.5,43.7,44,43.7z M40.6,38.3v2.7c0,0.8,0.6,1.4,1.4,1.4h2c0.8,0,1.4-0.6,1.4-1.4v-2.7H40.6z"/>
                            </g>
                            <g id="Line-9">
                                <path class="st0" d="M43,43v6.1"/>
                                <path d="M43,49.8c-0.4,0-0.7-0.3-0.7-0.7V43c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7v6.1C43.7,49.5,43.4,49.8,43,49.8z"/>
                            </g>
                            <g id="Line-10">
                                <path class="st0" d="M41,49.1h4.4"/>
                                <path d="M45.4,49.8H41c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h4.4c0.4,0,0.7,0.3,0.7,0.7S45.7,49.8,45.4,49.8z"/>
                            </g>
                            <g id="Rectangle-Copy-19">
                                <path class="st0" d="M48.8,37.6H55v3.3c0,1.1-0.9,2.1-2.1,2.1h-2c-1.1,0-2.1-0.9-2.1-2.1V37.6z"/>
                                <path d="M52.9,43.7h-2c-1.5,0-2.8-1.2-2.8-2.8v-3.3c0-0.4,0.3-0.7,0.7-0.7H55c0.4,0,0.7,0.3,0.7,0.7v3.3
                                    C55.6,42.5,54.4,43.7,52.9,43.7z M49.5,38.3v2.7c0,0.8,0.6,1.4,1.4,1.4h2c0.8,0,1.4-0.6,1.4-1.4v-2.7H49.5z"/>
                            </g>
                            <g id="Line-9-Copy">
                                <path class="st0" d="M51.9,43v6.1"/>
                                <path d="M51.9,49.8c-0.4,0-0.7-0.3-0.7-0.7V43c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7v6.1C52.6,49.5,52.3,49.8,51.9,49.8z"/>
                            </g>
                            <g id="Line-10-Copy">
                                <path class="st0" d="M49.8,49.1h4.4"/>
                                <path d="M54.2,49.8h-4.4c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h4.4c0.4,0,0.7,0.3,0.7,0.7S54.6,49.8,54.2,49.8z"/>
                            </g>
                            <g id="Oval">
                                <ellipse class="st0" cx="20.4" cy="22.6" rx="2" ry="2"/>
                                <path d="M20.4,25.6c-1.7,0-3-1.3-3-3s1.4-3,3-3s3,1.3,3,3S22.1,25.6,20.4,25.6z M20.4,21.6c-0.6,0-1,0.4-1,1s0.4,1,1,1
                                    s1-0.4,1-1S21,21.6,20.4,21.6z"/>
                            </g>
                            <g>
                                <path class="st0" d="M37.1,20.7h21c0.6,0,1,0.4,1,1v2c0,0.6-0.4,1-1,1h-21c-0.6,0-1-0.4-1-1v-2C36.1,21.2,36.6,20.7,37.1,20.7z"
                                    />
                                <path d="M58.1,25.7h-21c-1.1,0-2-0.9-2-2v-2c0-1.1,0.9-2,2-2h21c1.1,0,2,0.9,2,2v2C60.1,24.8,59.2,25.7,58.1,25.7z M37.1,21.7v2
                                    l21,0l0-2L37.1,21.7z M37.1,20.7v1l0,0V20.7z"/>
                            </g>
                            <g id="Line-2">
                                <path class="st0" d="M15,27.5h48.2"/>
                                <rect x="15" y="26.4" class="st1" width="48.2" height="2"/>
                            </g>
                            <g>
                                <path class="st0" d="M71.2,49.8L71.2,49.8c0.5,0.8,0.2,1.9-0.6,2.4L50.8,63.7c-0.8,0.5-1.9,0.2-2.4-0.6l0,0
                                    c-0.5-0.8-0.2-1.9,0.6-2.4l19.8-11.4C69.6,48.7,70.7,49,71.2,49.8z"/>
                                <path class="st1" d="M49.9,64.9c-0.2,0-0.5,0-0.7-0.1c-0.7-0.2-1.3-0.7-1.7-1.3c-0.4-0.6-0.5-1.4-0.3-2.1
                                    c0.2-0.7,0.7-1.3,1.3-1.7l19.8-11.4c1.3-0.8,3-0.3,3.8,1v0c0.8,1.3,0.3,3-1,3.8L51.3,64.5C50.8,64.8,50.4,64.9,49.9,64.9z
                                    M69.6,50c-0.1,0-0.3,0-0.4,0.1L49.5,61.5c-0.2,0.1-0.3,0.3-0.3,0.5s0,0.4,0.1,0.6c0.1,0.2,0.3,0.3,0.5,0.4
                                    c0.2,0.1,0.4,0,0.6-0.1L70,51.4c0.4-0.2,0.5-0.7,0.3-1C70.1,50.1,69.9,50,69.6,50z"/>
                            </g>
                            <g>
                                <path class="st0" d="M73.6,47.8l0.6,1c0.5,0.9,0.2,2-0.7,2.5l-3.3,1.9c-0.9,0.5-2,0.2-2.5-0.7l-0.6-1c-0.5-0.9-0.2-2,0.7-2.5
                                    l3.3-1.9C71.9,46.6,73.1,46.9,73.6,47.8z"/>
                                <path class="st1" d="M69.3,54.4c-1,0-1.9-0.5-2.5-1.4l-0.6-1c-0.4-0.7-0.5-1.4-0.3-2.2c0.2-0.7,0.7-1.3,1.3-1.7l3.3-1.9
                                    c0.7-0.4,1.4-0.5,2.2-0.3c0.7,0.2,1.3,0.7,1.7,1.3l0.6,1c0.4,0.7,0.5,1.4,0.3,2.2c-0.2,0.7-0.7,1.3-1.3,1.7l-3.3,1.9
                                    C70.3,54.3,69.8,54.4,69.3,54.4z M72,47.9c-0.1,0-0.3,0-0.4,0.1l-3.3,1.9c-0.2,0.1-0.3,0.3-0.4,0.5c-0.1,0.2,0,0.4,0.1,0.6
                                    l0.6,1c0.2,0.4,0.7,0.5,1.1,0.3l3.3-1.9c0.2-0.1,0.3-0.3,0.4-0.5c0.1-0.2,0-0.4-0.1-0.6l-0.6-1l0,0c-0.1-0.2-0.3-0.3-0.5-0.4
                                    C72.1,47.9,72,47.9,72,47.9z"/>
                            </g>
                            <g>
                                <path class="st0" d="M55.4,57.4l1.3,2.2c0.5,0.9,0.2,2-0.7,2.5l-14.1,8.1c-0.9,0.5-2,0.2-2.5-0.7l-1.3-2.2
                                    c-0.5-0.9-0.2-2,0.7-2.5l14.1-8.1C53.8,56.3,54.9,56.6,55.4,57.4z"/>
                                <path class="st1" d="M41,71.6c-0.2,0-0.5,0-0.7-0.1c-0.7-0.2-1.3-0.7-1.7-1.3l-1.3-2.2c-0.4-0.7-0.5-1.4-0.3-2.2
                                    c0.2-0.7,0.7-1.3,1.3-1.7l14.1-8.1c0.7-0.4,1.4-0.5,2.2-0.3c0.7,0.2,1.3,0.7,1.7,1.3l1.3,2.2c0.8,1.4,0.3,3.1-1,3.9l-14.1,8.1
                                    C42,71.4,41.5,71.6,41,71.6z M53.8,57.5c-0.1,0-0.3,0-0.4,0.1l-14.1,8.1c-0.2,0.1-0.3,0.3-0.4,0.5s0,0.4,0.1,0.6l1.3,2.2
                                    c0.1,0.2,0.3,0.3,0.5,0.4c0.2,0.1,0.4,0,0.6-0.1l14.1-8.1c0.4-0.2,0.5-0.7,0.3-1.1L54.5,58c0,0,0,0,0,0
                                    c-0.1-0.2-0.3-0.3-0.5-0.4C54,57.6,53.9,57.5,53.8,57.5z"/>
                            </g>
                        </g>
                    </g>
                </g>
                </svg>

                    <h3 class="menu__name">Réparation éléctroménagére</h3>
                </div>
            </div>
        </section>



        <!--========== CONTACTER NOUS ==========-->
        <section class="contact section bd-container" id="contact">
            <div class="contact__container bd-grid">
                <div class="contact__data">
                    <h2 class="section-title contact__initial">Contactez nous</h2>
                    <p class="contact__description">Si vous avez des besoins d´informations, concernant une demande générale, une réclamation ou juste pour poser une question, la société en question met à votre disposition un service complet comme lien entre le consommateur et l’entité.</p>
                </div>

                <div class="contact__button">
                    <a href="#" class="button">Contactez maintenant</a>
                </div>
            </div>
        </section>
    </main>
   
    <!--========== SCROLL REVEAL ==========-->
    <script src="assets/dist/scrollreveal.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="assets/jquery/jquery-3.6.0.min.js"></script>

      <!--========== LIGHTSLIDER JS ==========-->
      <script src="assets/js/lightslider.js"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>

    
    <!--========== MODAL JS ==========-->
    <script src="Function/modal.js"></script>
    <script>
            /*====================RECHERCHE SERVICE JQUERY====================*/
    $(document).ready(function() {
        $("#searchText").on("input", function() {
            var searchText = $("#searchText").val();
            if (searchText == "") return;
            $.post("Function/search.php", 
            {
                key: searchText
            }, function(data, status) {
                $("#serviceList").html(data);
            });
        });

        $("#searchBtn").on("click", function() {
            var searchText = $("#searchText").val();
            if (searchText == "") return;
            $.post("Function/search.php", 
            {
                key: searchText
            }, function(data, status) {
                $("#serviceList").html(data);
            });
        });
    });
    </script>
     <?php
           
        require_once('Footer/footer.php');
    ?>
</body>

</html>
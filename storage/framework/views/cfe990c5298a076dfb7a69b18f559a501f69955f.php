<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>MTransfert | Transfer from everywhere</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
       <section class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
    <style>
      @import  url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

      .header-2-3 .modal-backdrop.show {
        background-color: #707092;
        opacity: 0.6;
      }

      .header-2-3 .modal-item.modal {
        top: 2rem;
      }

      .header-2-3 .navbar,
      .header-2-3 .hero {
        padding: 3rem 2rem;
      }

      .header-2-3 .navbar-dark .navbar-nav .nav-link {
        font: 300 18px/1.5rem Poppins, sans-serif;
        color: #707092;
        transition: 0.3s;
      }

      .header-2-3 .navbar-dark .navbar-nav .nav-link:hover {
        font: 600 18px/1.5rem Poppins, sans-serif;
        color: #E7E7E8;
        transition: 0.3s;
      }

      .header-2-3 .navbar-dark .navbar-nav .active>.nav-link,
      .header-2-3 .navbar-dark .navbar-nav .nav-link.active,
      .header-2-3 .navbar-dark .navbar-nav .nav-link.show,
      .header-2-3 .navbar-dark .navbar-nav .show>.nav-link {
        font-weight: 600;
        transition: 0.3s;
      }

      .header-2-3 .navbar-dark .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
      }

      .header-2-3 .btn:focus,
      .header-2-3 .btn:active {
        outline: none !important;
      }

      .header-2-3 .btn-fill {
        font: 600 18px / normal Poppins, sans-serif;
        background-color: #524EEE;
        border-radius: 12px;
        padding: 12px 32px;
        transition: 0.3s;
      }

      .header-2-3 .btn-fill:hover {
        --tw-shadow: inset 0 0px 25px 0 rgba(20, 20, 50, 0.7);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        transition: 0.3s;
      }

      .header-2-3 .btn-no-fill {
        font: 300 18px/1.75rem Poppins, sans-serif;
        color: #E7E7E8;
        padding: 12px 32px;
        transition: 0.3s;
      }

      .header-2-3 .btn-no-fill:hover {
        color: #E7E7E8;
      }

      .header-2-3 .modal-item .modal-dialog .modal-content {
        border-radius: 8px;
        transition: 0.3s;
      }

      .header-2-3 .responsive li a {
        padding: 1rem;
        transition: 0.3s;
      }

      .header-2-3 .left-column {
        margin-bottom: 2.75rem;
        width: 100%;
      }

      .header-2-3 .text-caption {
        font: 600 0.875rem/1.625 Poppins, sans-serif;
        margin-bottom: 2rem;
        color: #FB6262;
      }

      .header-2-3 .title-text-big {
        font: 600 2.25rem/2.5rem Poppins, sans-serif;
        margin-bottom: 2rem;
        color: #CBCBD2;
      }

      .header-2-3 .btn-try {
        font: 600 1rem/1.5rem Poppins, sans-serif;
        padding: 1rem 1.5rem;
        border-radius: 0.75rem;
        background-color: #524EEE;
        transition: 0.3s;
      }

      .header-2-3 .btn-try:hover {
        --tw-shadow: inset 0 0px 25px 0 rgba(20, 20, 50, 0.7);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        transition: 0.3s;
      }

      .header-2-3 .btn-outline {
        font: 400 1rem/1.5rem Poppins, sans-serif;
        border: 1px solid #707092;
        color: #707092;
        padding: 1rem 1.5rem;
        border-radius: 0.75rem;
        background-color: transparent;
        transition: 0.3s;
      }

      .header-2-3 .btn-outline:hover {
        border: 1px solid #FFFFFF;
        color: #FFFFFF;
        transition: 0.3s;
      }

      .header-2-3 .btn-outline:hover div path {
        fill: #FFFFFF;
        transition: 0.3s;
      }

      .header-2-3 .right-column {
        width: 100%;
      }

      @media (min-width: 576px) {
        .header-2-3 .modal-item .modal-dialog {
          max-width: 95%;
          border-radius: 12px;
        }

        .header-2-3 .navbar {
          padding: 3rem 2rem;
        }

        .header-2-3 .hero {
          padding: 3rem 2rem 5rem;
        }

        .header-2-3 .title-text-big {
          font-size: 3rem;
          line-height: 1.2;
        }
      }

      @media (min-width: 768px) {
        .header-2-3 .navbar {
          padding: 3rem 4rem;
        }

        .header-2-3 .hero {
          padding: 3rem 4rem 5rem;
        }

        .header-2-3 .left-column {
          margin-bottom: 3rem;
        }
      }

      @media (min-width: 992px) {
        .header-2-3 .navbar-expand-lg .navbar-nav .nav-link {
          padding-right: 1.25rem;
          padding-left: 1.25rem;
        }

        .header-2-3 .navbar {
          padding: 3rem 6rem;
        }

        .header-2-3 .hero {
          padding: 3rem 6rem 5rem;
        }

        .header-2-3 .left-column {
          width: 50%;
          margin-bottom: 0;
        }

        .header-2-3 .title-text-big {
          font-size: 3.75rem;
          line-height: 1.2;
        }

        .header-2-3 .right-column {
          width: 50%;
        }
      }
    </style>
    <div class="container-xxl mx-auto p-0  position-relative header-2-3" style="font-family: 'Poppins', sans-serif;">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="#">
          <img style="margin-right:0.75rem"
            src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png" alt="">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
          aria-labelledby="targetModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content border-0" style="background-color: #141432;">
              <div class="modal-header border-0" style="padding:	2rem; padding-bottom: 0;">
                <a class="modal-title" id="targetModalLabel">
                  <img style="margin-top:0.5rem"
                    src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png"
                    alt="">
                </a>
                <button type="button" class="close btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
                <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" href="#" style="color: #E7E7E8;">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#about-us">A propos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#estimate_transfer_fees">Estimer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#footer_contacts">Contact</a>
                  </li>
                </ul>
              </div>
              <div class="modal-footer border-0 gap-3" style="padding:	2rem; padding-top: 0.75rem">
                <a href="#login" class="btn btn-default btn-no-fill">Connexion</a>
                
              </div>
            </div>
          </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#" style="color: #E7E7E8;">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about-us">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#estimate_transfer_fees">Estimer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer_contacts">Contact</a>
            </li>
          </ul>
          <div class="gap-3">
            <a href="#login" class="btn btn-default btn-no-fill">Connexion</a>
            
          </div>
        </div>
      </nav>

      <div>
        <div class="mx-auto d-flex flex-lg-row flex-column hero">
          <!-- Left Column -->
          <div
            class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
            <h1 class="title-text-big">La meilleure façon<br class=" d-lg-block d-none"> d'envoyer de l'argent à vos proches</h1>
            <div class="d-flex flex-sm-row flex-column align-items-center mx-lg-0 mx-auto justify-content-center gap-3">
              <button class="btn d-inline-flex mb-md-0 btn-try text-white border-0">A propos</button>
              <button class="btn btn-outline">
                <div class="d-flex align-items-center">
                  <svg class="me-2" width="13" height="12" viewBox="0 0 13 13" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.9293 8L6.66668 5.158V10.842L10.9293 8ZM12.9173 8.27734L5.85134 12.988C5.80115 13.0214 5.74283 13.0406 5.6826 13.0435C5.62238 13.0463 5.5625 13.0328 5.50934 13.0044C5.45619 12.9759 5.41175 12.9336 5.38075 12.8818C5.34976 12.8301 5.33337 12.771 5.33334 12.7107V3.28934C5.33337 3.22904 5.34976 3.16989 5.38075 3.11817C5.41175 3.06645 5.45619 3.0241 5.50934 2.99564C5.5625 2.96719 5.62238 2.95368 5.6826 2.95656C5.74283 2.95944 5.80115 2.9786 5.85134 3.012L12.9173 7.72267C12.963 7.75311 13.0004 7.79435 13.0263 7.84273C13.0522 7.89111 13.0658 7.94513 13.0658 8C13.0658 8.05488 13.0522 8.1089 13.0263 8.15728C13.0004 8.20566 12.963 8.2469 12.9173 8.27734Z"
                      fill="#707092" />
                  </svg>
                    Besoin d'aide? suivez la vidéo
                </div>
              </button>
            </div>
          </div>
          <!-- Right Column -->
          <div class="right-column text-center d-flex justify-content-center pe-0">
            <img id="img-fluid" class="h-auto mw-100"
              src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-1.png" alt="">
          </div>

        </div>
      </div>
    </div>


  </section>
  <section class="h-100 w-100 bg-white" style="box-sizing: border-box" id="about-us">
    <style>
      @import  url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      .content-2-1 .btn:focus,
      .content-2-1 .btn:active {
        outline: none !important;
      }

      .content-2-1 .title-text {
        padding-top: 5rem;
        margin-bottom: 3rem;
      }

      .content-2-1 .text-title {
        font: 600 2.25rem/2.5rem Poppins, sans-serif;
        color: #121212;
        margin-bottom: 0.625rem;
      }

      .content-2-1 .text-caption {
        color: #121212;
        font-weight: 300;
      }

      .content-2-1 .column {
        padding: 2rem 2.25rem;
      }

      .content-2-1 .icon {
        margin-bottom: 1.5rem;
      }

      .content-2-1 .icon-title {
        font: 500 1.5rem/2rem Poppins, sans-serif;
        margin-bottom: 0.625rem;
        color: #121212;
      }

      .content-2-1 .icon-caption {
        font: 400 1rem/1.625 Poppins, sans-serif;
        letter-spacing: 0.025em;
        color: #565656;
      }

      .content-2-1 .card-block {
        padding: 1rem 1rem 5rem;
      }

      .content-2-1 .card {
        padding: 1.75rem;
        background-color: #fff7f4;
        border-radius: 0.75rem;
        border: 1px solid #ff7c57;
      }

      .content-2-1 .card-title {
        font: 600 1.5rem/2rem Poppins, sans-serif;
        margin-bottom: 0.625rem;
        color: #000000;
      }

      .content-2-1 .card-caption {
        font: 300 1rem/1.5rem Poppins, sans-serif;
        color: #565656;
        letter-spacing: 0.025em;
        margin-bottom: 0;
      }

      .content-2-1 .btn-card {
        font: 700 1rem/1.5rem Poppins, sans-serif;
        background-color: #ff7c57;
        padding-top: 1rem;
        padding-bottom: 1rem;
        width: 100%;
        border-radius: 0.75rem;
        margin-bottom: 1.25rem;
      }

      .content-2-1 .btn-card:hover {
        --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
          0 4px 6px -2px rgba(0, 0, 0, 0.05);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
          var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
      }

      .content-2-1 .btn-outline {
        font: 400 1rem/1.5rem Poppins, sans-serif;
        color: #979797;
        border: 1px solid #979797;
        padding-top: 1rem;
        padding-bottom: 1rem;
        width: 100%;
        border-radius: 0.75rem;
      }

      .content-2-1 .btn-outline:hover {
        border: 1px solid #ff7c57;
        color: #ff7c57;
      }

      .content-2-1 .card-text {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
      }

      .content-2-1 .grid-padding {
        padding: 0rem 1rem 3rem;
      }

      @media (min-width: 576px) {
        .content-2-1 .grid-padding {
          padding: 0rem 2rem 3rem;
        }

        .content-2-1 .card-block {
          padding: 3rem 2rem 5rem;
        }
      }

      @media (min-width: 768px) {
        .content-2-1 .grid-padding {
          padding: 0rem 4rem 3rem;
        }

        .content-2-1 .card-block {
          padding: 3rem 4rem 5rem;
        }
      }

      @media (min-width: 992px) {
        .content-2-1 .grid-padding {
          padding: 1rem 6rem 3rem;
        }

        .content-2-1 .card-block {
          padding: 3rem 6rem 5rem;
        }

        .content-2-1 .column {
          padding: 0rem 2.25rem;
        }
      }

      @media (min-width: 1200px) {
        .content-2-1 .grid-padding {
          padding: 1rem 10rem 3rem;
        }

        .content-2-1 .card-block {
          padding: 3rem 6rem 5rem;
        }

        .content-2-1 .card-btn-space {
          margin-top: 15px;
          margin-bottom: 15px;
        }

        .content-2-1 .btn-outline,
        .content-2-1 .btn-card {
          width: 95%;
          float: right;
        }
      }

      @media (max-width: 980px) {
        .content-2-1 .card-btn-space {
          width: 100%;
        }
      }
    </style>
    <div class="content-2-1 container-xxl mx-auto p-0  position-relative" style="font-family: 'Poppins', sans-serif">
      <div class="text-center title-text">
        <h1 class="text-title">Pourquoi nous choisir?</h1>
        <p class="text-caption" style="margin-left: 3rem; margin-right: 3rem">
          Nous vous proposons une solution sécurisé pour envoyer de l'argent
        </p>
      </div>

      <div class="grid-padding text-center">
        <div class="row">
          <div class="col-lg-4 column">
            <div class="icon">
              <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-2.png"
                alt="" />
            </div>
            <h3 class="icon-title">Facile à utiliser</h3>
            <p class="icon-caption">
                Nous vous facilitons les transferts internationaux
            </p>
          </div>
          <div class="col-lg-4 column">
            <div class="icon">
              <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-3.png"
                alt="" />
            </div>
            <h3 class="icon-title">Analyse en temps réel</h3>
            <p class="icon-caption">
                Suivez l'état de vos transfert en temps-réel
            </p>
          </div>
          <div class="col-lg-4 column">
            <div class="icon">
              <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-4.png"
                alt="" />
            </div>
            <h3 class="icon-title">Entièrement sécurisé</h3>
            <p class="icon-caption">
                Nous vous garantissons une fiabilité et la transparence
            </p>
          </div>
          <div class="col-lg-12" style="margin-top:50px">
              <h3>
                Nous vous offrons des solutions variées et un moyen de transfert d'argent vers l'étranger. <br>
                Notre solution couvre actuellement le TOGO, le BENIN ...
              </h3>
          </div>
        </div>
      </div>

      <div class="card-block">
        <div class="card">
          <div class="d-flex flex-lg-row flex-column align-items-center">
            <div class="me-lg-3">
              <img
                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-1%20(1).png"
                alt="" />
            </div>
            <div class="flex-grow-1 text-lg-start text-center card-text">
              <h3 class="card-title">
                Vous voulez rentabiliser le temps de vos activités
              </h3>
              <p class="card-caption">
                Contactez-nous pour les conseils.<br class="d-none d-lg-block" />
                Nous sommes disponibles pour vous 24H/7
              </p>
            </div>
            <div class="card-btn-space">
              <button class="btn btn-card text-white">Contactez-nous</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="login" class="h-100 w-100" style="box-sizing: border-box; background-color: #232130">
    <style>
      @import  url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

      .content-3-6 .btn:focus,
      .content-3-6 .btn:active {
        outline: none !important;
      }

      .content-3-6 .width-left {
        width: 0%;
      }

      .content-3-6 .width-right {
        width: 100%;
        height: 100%;
        padding: 8rem 2rem;
        background-color: #211F2D;
      }

      .content-3-6 .centered {
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
      }

      .content-3-6 .right {
        width: 100%;
      }

      .content-3-6 .title-text {
        font: 600 1.875rem/2.25rem Poppins, sans-serif;
        margin-bottom: 0.75rem;
        color: #D8D7DF;
      }

      .content-3-6 .caption-text {
        font: 400 0.875rem/1.75rem Poppins, sans-serif;
        color: #737182;
      }

      .content-3-6 .input-label {
        font: 500 1.125rem/1.75rem Poppins, sans-serif;
        color: #D8D7DF;
      }

      .content-3-6 .div-input {
        font: 300 1rem/1.5rem Poppins, sans-serif;
        padding: 1rem 1.25rem;
        margin-top: 0.75rem;
        border-radius: 0.75rem;
        border: 1px solid #292738;
        background-color: #252332;
        color: #D8D7DF;
        transition: 0.3s;
      }

      .content-3-6 .div-input:focus-within {
        border: 1px solid #2EC49C;
        color: #D8D7DF;
        transition: 0.3s;
      }

      .content-3-6 .div-input input::placeholder {
        color: #4E4B62;
        transition: 0.3s;
      }

      .content-3-6 .div-input:focus-within input::placeholder {
        color: #D8D7DF;
        outline: none;
        transition: 0.3s;
      }

      .content-3-6 .div-input .icon-toggle-empty-3-6 path,
      .content-3-6 .div-input:focus-within .icon path {
        transition: 0.3;
        fill: #2EC49C;
        transition: 0.3s;
      }

      .content-3-6 .input-field {
        font: 300 1rem/1.5rem Poppins, sans-serif;
        width: 100%;
        background-color: #252332;
        border: none;
        color: #D8D7DF;
        transition: 0.3s;
      }

      .content-3-6 .input-field:focus {
        outline: none;
        transition: 0.3s;
      }

      .content-3-6 .forgot-password {
        font: 400 0.875rem/1.25rem Poppins, sans-serif;
        color: #737182;
        transition: 0.3s;
        text-decoration: none;
      }

      .content-3-6 .forgot-password:hover {
        color: #D8D7DF;
      }

      .content-3-6 .btn-fill {
        font: 500 1.25rem/1.75rem Poppins, sans-serif;
        background-image: linear-gradient(rgba(91, 203, 173, 1), rgba(39, 194, 153, 1));
        padding: 0.75rem 1rem;
        margin-top: 2.25rem;
        border-radius: 0.75rem;
        transition: 0.5s;
      }

      .content-3-6 .btn-fill:hover {
        background-image: linear-gradient(#2EC49C, #2EC49C);
        transition: 0.5s;
      }

      .content-3-6 .bottom-caption {
        font: 400 0.875rem/1.25rem Poppins, sans-serif;
        margin-top: 2rem;
        color: #737182;
      }

      .content-3-6 .green-bottom-caption {
        color: #2EC49C;
        font-weight: 500;
      }

      .content-3-6 .green-bottom-caption:hover {
        color: #2EC49C;
        cursor: pointer;
        text-decoration: underline;
      }

      @media (min-width: 576px) {
        .content-3-6 .width-right {
          padding: 8rem 4rem;
        }

        .content-3-6 .right {
          width: 58.333333%;
        }
      }

      @media (min-width: 768px) {
        .content-3-6 .right {
          width: 66.666667%;
        }
      }

      @media (min-width: 992px) {
        .content-3-6 .width-left {
          width: 48%;
        }

        .content-3-6 .width-right {
          width: 52%;
        }

        .content-3-6 .right {
          width: 75%;
        }
      }

      @media (min-width: 1200px) {
        .content-3-6 .right {
          width: 58.333333%;
          ;
        }
      }
    </style>
    <div class="content-3-6 d-flex flex-column align-items-center h-100 flex-lg-row"
      style="font-family: 'Poppins', sans-serif;">
      <div class="position-relative d-none d-lg-block h-100 width-left">
        <img class="position-absolute img-fluid centered"
          src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-11.png" alt="">
      </div>
      <div class="d-flex mx-auto align-items-left justify-content-left width-right mx-lg-0">
        <div class="right mx-lg-0 mx-auto">
          <div class="align-items-center justify-content-center d-lg-none d-flex">
            <img class="img-fluid"
              src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-11.png"
              alt="">
          </div>
          <h3 class="title-text">Connectez-vous pour continuer</h3>
          <p class="caption-text">Veuillez vous connecter en utilisant votre compte</p>
          <form style="margin-top: 1.5rem;" action="<?php echo e(route("request_login_web")); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div style="margin-bottom: 1.75rem;">
              <label for="" class="d-block input-label">Identifiant</label>
              <div class="d-flex w-100 div-input">
                <svg class="icon" style="margin-right: 1rem;" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5 5C3.34315 5 2 6.34315 2 8V16C2 17.6569 3.34315 19 5 19H19C20.6569 19 22 17.6569 22 16V8C22 6.34315 20.6569 5 19 5H5ZM5.49607 7.13174C5.01655 6.85773 4.40569 7.02433 4.13168 7.50385C3.85767 7.98337 4.02427 8.59422 4.50379 8.86823L11.5038 12.8682C11.8112 13.0439 12.1886 13.0439 12.4961 12.8682L19.4961 8.86823C19.9756 8.59422 20.1422 7.98337 19.8682 7.50385C19.5942 7.02433 18.9833 6.85773 18.5038 7.13174L11.9999 10.8482L5.49607 7.13174Z"
                    fill="#4E4B62" />
                </svg>
                <input autocomplete="new-password" class="input-field" type="text" name="login" placeholder="Votre identifiant" required>
              </div>
            </div>
            <div style="margin-top: 1rem;">
              <label for="" class="d-block input-label">Mot de passe</label>
              <div class="d-flex w-100 div-input">
                <svg class="icon" style="margin-right: 1rem;" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.81592 4.25974C7.12462 5.48872 7 6.95088 7 8H6C4.34315 8 3 9.34315 3 11V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V11C21 9.34315 19.6569 8 18 8L17 7.99998C17 6.95087 16.8754 5.48871 16.1841 4.25973C15.829 3.62845 15.3194 3.05012 14.6031 2.63486C13.8875 2.22005 13.021 2 12 2C10.979 2 10.1125 2.22005 9.39691 2.63486C8.68058 3.05012 8.17102 3.62845 7.81592 4.25974ZM9.55908 5.24026C9.12538 6.01128 9 7.04912 9 8H15C15 7.04911 14.8746 6.01129 14.4409 5.24027C14.2335 4.87155 13.9618 4.57488 13.6 4.36514C13.2375 4.15495 12.729 4 12 4C11.271 4 10.7625 4.15495 10.4 4.36514C10.0382 4.57488 9.76648 4.87155 9.55908 5.24026ZM14 14C14 14.7403 13.5978 15.3866 13 15.7324V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V15.7324C10.4022 15.3866 10 14.7403 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14Z"
                    fill="#4E4B62" />
                </svg>
                <input autocomplete="new-password" class="input-field" type="password" name="password" id="password-content-3-6" placeholder="Mot de passe" required>
                <div onclick="togglePassword()">
                  <svg style="margin-left: 0.75rem; cursor:pointer" width="20" height="14" viewBox="0 0 20 14"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="icon-toggle" fill-rule="evenodd" clip-rule="evenodd"
                      d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z"
                      fill="#4E4B62" />
                  </svg>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-end" style="margin-top: 0.75rem;">
              <a href="#" class="forgot-password fst-italic">Mot de passe oublié?</a>
            </div>
            <button class="btn btn-fill text-white d-block w-100" type="submit">Connexion</button>
          </form>
          <p class="text-center bottom-caption">Pas de compte?
            <span class="green-bottom-caption">Inscrivez-vous ici</span>
          </p>
        </div>
      </div>


    </div>


    <!-- Password toggle -->
    <script>
      function togglePassword() {
        var x = document.getElementById("password-content-3-6");
        if (x.type === "password") {
          x.type = "text";
          document
            .getElementById("icon-toggle")
            .setAttribute("fill", "#2ec49c");
        } else {
          x.type = "password";
          document
            .getElementById("icon-toggle")
            .setAttribute("fill", "#CACBCE");
        }
      }
    </script>
  </section>

  <section class="h-100 w-100" style="box-sizing: border-box; background-color: #FFFAFA">

    <style>
        @import  url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        .empty-4-1{
            padding: 1.25rem 2rem 5rem;
        }
        .empty-4-1 .img{
            width: 83.333333%;
            margin-bottom: 0.625rem;
            object-fit: cover;
            object-position: center;
        }
        .empty-4-1 .title-text{
            font: 600 1.875rem/2.25rem Poppins, sans-serif;
            color: #000000;
            letter-spacing: 0.025em;
            margin-bottom: 0.75rem;
        }
        .empty-4-1 .caption-text{
            margin-bottom: 3rem;
            color: #9C9C9C;
            font-size: 1rem;
            letter-spacing: 0.025em;
            line-height: 1.75rem;
        }
        .empty-4-1 .btn-view{
            font: 600 1.125rem/1.75rem Poppins, sans-serif;
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            background-color: #FF7C57;
            transition: 0.3s;
        }
        .empty-4-1 .btn-view:hover{
            background-color: #FF9779;
            transition: 0.3s;
        }
        @media (min-width: 576px) {
            .empty-4-1{
                padding: 1.25rem 2rem 8rem;
            }
            .empty-4-1 .img{
                width: auto;
            }
        }
    </style>

    <div class="empty-4-1" style="font-family: 'Poppins', sans-serif; margin-top:25px">
        <div class="mx-auto d-flex align-items-center justify-content-center flex-column">
            
            <div class="text-center w-100">
                <h1 class="title-text">
                    Grille tarifaire
                </h1>
                <h3>
                    La devise appliquée à la grille est <?php echo e(strtoupper($setting->default_currency)); ?>

                </h3>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="table-responsive" style="margin:20px">

                            <p class="caption-text">
                                Liste des taux des frais à ajouter lors de vos transactions inter-pays
                            </p>
                            <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th class="text-right">Min (XOF)</th>
                                <th class="text-right">Max (XOF)</th>
                                <th class="text-right">Frais (XOF)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $priceList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pricelistItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-order="<?php echo e($pricelistItem->start); ?>"><?php echo e($pricelistItem->id); ?></td>
                                    <td class="text-right"><?php echo e($pricelistItem->start); ?></td>
                                    <td class="text-right"><?php echo e($pricelistItem->end); ?></td>
                                    <td class="text-right"><?php echo e($pricelistItem->change); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6" style="margin:20px">
                        <div class="table-responsive">
                            <?php
                                $conversions = $setting->conversions;
                            ?>
                            <p class="caption-text">
                                Grille de convertion XOF <-- --> GHS
                            </p>
                            <table class="table table-hover data-table">
                                
                                <tbody>
                                    <tr>
                                      <td>1 GHS</td>
                                      <td>=&gt;</td>
                                      <td><?php echo e(to_fixed(strtoupper($conversions["ghs_to_xof"]))); ?> XOF</td>
                                    </tr>
                                    <tr>
                                      <td>1 XOF</td>
                                      <td>=&gt;</td>
                                      <td><?php echo e(to_fixed(strtoupper($conversions["xof_to_ghs"]))); ?> GHS</td>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>

                <div id="estimate_transfer_fees" class="d-flex justify-content-center" style="text-align: left;">
                    <form action="" style=" border:solid thin #524EEE; border-radius:10px; padding:25px">
                        <h3 style="text-align: center; margin-bottom:30px">Estimer les frais de transfert </h3>
                        <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="start">MONTANT</label>
                                <div class="input-group col-xs-12">
                                  <input min="500" type="number" class="form-control" name="amount" id="amount" placeholder="MONTANT"/>
                                </div>
                              </div>
                            </div>

                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="end">DEVISE ENVOI</label>
                                <div class="input-group col-xs-12">
                                    <select name="from" id="from" class="btn btn-info text-white" style="font-weight: bold; width:100%; background-color:var(--bs-indigo)">
                                        <option value="xof">XOF</option>
                                        <option value="ghs">GHS</option>
                                    </select>
                                </div>
                              </div>
                            </div>

                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="end">DEVISE RECEPTION</label>
                                <div class="input-group col-xs-12">
                                    <select name="to" id="to" class="btn btn-info text-white" style="font-weight: bold; width:100%; background-color:var(--bs-indigo)">
                                        <option value="xof">XOF</option>
                                        <option value="ghs">GHS</option>
                                    </select>
                                </div>
                              </div>
                            </div>
                        </div>

                        <table id="amount_estimation_table" class="table table-hover data-table" style="margin-top: 20px; display:none">
                            <tbody>
                                <tr>
                                  <td>MONTANT</td>
                                  <td>=</td>
                                  <td style="text-align: right" id="amount_table_td"></td>
                                </tr>
                                <tr>
                                  <td>FRAIS</td>
                                  <td>=</td>
                                  <td style="text-align: right" id="fees_table_td"></td>
                                </tr>
                                <tr>
                                  <td>TOTAL</td>
                                  <td>=</td>
                                  <td style="text-align: right" id="total_table_td"></td>
                                </tr>
                            </tbody>
                        </table>

                        <button onclick="estimateAmount()" type="button" style="margin-top: 20px; margin-left: auto; margin-right: auto; display: block" class="btn btn-success text-white">
                            VALIDER
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>

  <section class="contact-us">
      <style>
          * {
              font-family: 'Inter', sans-serif !important;
          }

          body .font-red-hat-display {
              font-family: 'Red Hat Display', sans-serif !important;
          }

          body .cl-light-blue {
              color: #34b3ff;
          }

          body .contact-us {
              background: #151515;
              padding-top: 125px;
              padding-bottom: 90px;
          }

          body .contact-us .headline {
              font-family: 'Red Hat Display', sans-serif;
              font-weight: 700;
              font-size: 60px;
              line-height: 140%;
              text-align: center;
              color: #FFFFFF;
          }

          @media  screen and (max-width: 768px) {
              body .contact-us .headline {
                  font-size: 40px;
                  line-height: 60px !important;
              }
          }

          body .contact-us .button {
              margin-top: 72px;
          }

          body .contact-us .btn-contact {
              padding: 16px 32px;
              background: #00B67A;
              border-radius: 12px;
              font-weight: 700;
              font-size: 20px;
              line-height: 24px;
              color: #FFFFFF;
          }

          @media  screen and (max-width: 768px) {
              body .contact-us .btn-contact {
                  width: 100%;
              }
          }

          body .contact-us .btn-demo {
              padding: 16px 32px;
              border-radius: 12px;
              font-weight: 400;
              font-size: 20px;
              line-height: 24px;
              color: #CED2DE;
              border: 1px solid #8D8F98;
              -webkit-box-sizing: border-box;
              box-sizing: border-box;
          }

          @media  screen and (max-width: 768px) {
              body .contact-us .btn-demo {
                  width: 100%;
              }
          }
      </style>
      <div class="container">
          <div class="row d-block mx-0">
              <div class="headline font-red-hat-display" style="font-size: 40px;">
                Nous vous proposons l'application mobile aussi efficace
              </div>
          </div>
          <div class="row mx-0 button text-center">
              <div class="col-md-6 text-md-right mb-4 mb-md-0">
                  <a download href="<?php echo e(asset("apps/mtransfert_android.apk")); ?>">
                      <img class="img-responsive" style="width: 250px; height:100px" src="<?php echo e(asset("images/mobile/play_store.png")); ?>" alt="Download on playstore">
                  </a>
              </div>
              <div class="col-md-6 text-md-left mb-4 mb-md-0">
                  <a class="d">
                    <img class="img-responsive" style="width: 250px; height:90px" src="<?php echo e(asset("images/mobile/app_store.png")); ?>" alt="Download on playstore">
                  </a>
              </div>
          </div>
      </div>
  </section>

  <section class="testimoni">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
          integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
          crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
          crossorigin="anonymous"></script>

      <style>
          body .testimoni {
              background: radial-gradient(100% 100% at 50% 0%, #F9FAFE 0%, #FAFAFD 100%);
              padding-top: 90px;
              padding-bottom: 90px;
          }

          body .testimoni .brand img {
              width: 200px !important;
          }
      </style>
      <div class="container">
          <h3 style="text-align: center; font-weight:bolder; font-size: 40px; margin:20px">Nos partenaires</h3>
          <div class="row brand">
              <div class="col-md-3 col-6 text-center my-md-auto">
                  <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/Slack-Logo.png"
                      alt="" class="img-fluid">
              </div>
              <div class="col-md-3 col-6 text-center my-md-auto">
                  <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/Microsoft-Logo.png"
                      alt="" class="img-fluid">
              </div>
              <div class="col-md-3 col-6 text-center my-md-auto mt-5 mt-md-0">
                  <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/Google-Logo.png"
                      alt="" class="img-fluid">
              </div>
              <div class="col-md-3 col-6 text-center my-md-auto mt-5 mt-md-0">
                  <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/Airbnb-Logo.png"
                      alt="" class="img-fluid">
              </div>
          </div>
      </div>
  </section>

  <section class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
		<style>
			@import  url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

			.footer-2-3 .list-space {
				margin-bottom: 1.25rem;
			}

			.footer-2-3 .footer-text-title {
				font: 600 1.5rem Poppins, sans-serif;
				margin-bottom: 1.5rem;
			}

			.footer-2-3 .list-menu {
				color: #707092;
				text-decoration: none !important;
			}

			.footer-2-3 .list-menu:hover {
				color: #ffffff;
			}

			.footer-2-3 hr.hr {
				margin: 0;
				border: 0;
				border-top: 1px solid rgba(46, 46, 90, 1);
			}

			.footer-2-3 .border-color {
				color: #707092;
			}

			.footer-2-3 .footer-link {
				color: #707092;
			}

			.footer-2-3 .footer-link:hover {
				color: #ffffff;
			}

			.footer-2-3 .social-media-c:hover circle,
			.footer-2-3 .social-media-p:hover path {
				fill: #ffffff;
			}

			.footer-2-3 .footer-info-space {
				padding-top: 3rem;
			}

			.footer-2-3 .list-footer {
				padding: 5rem 1rem 3rem 1rem;
			}

			.footer-2-3 .info-footer {
				padding: 0 1rem 3rem;
			}

			@media (min-width: 576px) {
				.footer-2-3 .list-footer {
					padding: 5rem 2rem 3rem 2rem;
				}

				.footer-2-3 .info-footer {
					padding: 0 2rem 3rem;
				}
			}

			@media (min-width: 768px) {
				.footer-2-3 .list-footer {
					padding: 5rem 4rem 6rem 4rem;
				}

				.footer-2-3 .info-footer {
					padding: 0 4rem 3rem;
				}
			}

			@media (min-width: 992px) {
				.footer-2-3 .list-footer {
					padding: 5rem 6rem 6rem 6rem;
				}

				.footer-2-3 .info-footer {
					padding: 0 6rem 3rem;
				}
			}
		</style>

		<div class="footer-2-3 container-xxl mx-auto position-relative p-0" style="font-family: 'Poppins', sans-serif">
			<div class="list-footer">
				<div class="row gap-md-0 gap-3">
					<div class="col-lg-4">
						<div class="">
							<div class="list-space">
								<img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png"
									alt="" />
							</div>
							<nav class="dyled">
								<h3 style="color:white">MTransfert</h3>
                                <p style="color:white">
                                    La meilleure façon d'envoyer de l'argent à vos proches
                                </p>
							</nav>
						</div>
					</div>
					<div class="col-lg-4" id="footer_contacts">
                        <?php
                            $accounts = $setting->transfer_accounts;
                        ?>
						<h2 class="footer-text-title text-white">Adresse et contacts</h2>
						<nav class="list-unstyled">
							<li class="list-space">
								<a href="tel:<?php echo e($accounts["BN"]); ?>" class="list-menu text-white">BENIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo e($accounts["BN"]); ?><a/>
							</li>
							<li class="list-space">
								<a href="tel:<?php echo e($accounts["GH"]); ?>" class="list-menu text-white">GHANA&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo e($accounts["GH"]); ?></a>
							</li>
							<li class="list-space">
								<a href="tel:<?php echo e($accounts["TG"]); ?>" class="list-menu text-white">TOGO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo e($accounts["TG"]); ?></a>
							</li>
						</nav>
					</div>
					<div class="col-lg-4">
						<h2 class="footer-text-title text-white">Liens utiles</h2>
						<nav class="list-unstyled">
							<li class="list-space">
								<a href="javascript:;" class="list-menu">Accueil</a>
							</li>
							<li class="list-space">
								<a href="#footer_contacts" class="list-menu">Contacts</a>
							</li>
							<li class="list-space">
								<a href="#estimate_transfer_fees" class="list-menu">Estimer</a>
							</li>
						</nav>
					</div>
				</div>
			</div>

			<div class="border-color info-footer">
				<div class="">
					<hr class="hr" />
				</div>
				<div class="mx-auto d-flex flex-column flex-lg-row align-items-center footer-info-space gap-4">
					<div class="d-flex title-font font-medium align-items-center gap-4">
						<a href="">
							<svg class="social-media-c social-media-left" width="30" height="30" viewBox="0 0 30 30"
								fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="15" cy="15" r="15" fill="#707092" />
								<g clip-path="url(#clip0)">
									<path
										d="M17.6648 9.65667H19.1254V7.11267C18.8734 7.078 18.0068 7 16.9974 7C14.8914 7 13.4488 8.32467 13.4488 10.7593V13H11.1248V15.844H13.4488V23H16.2981V15.8447H18.5281L18.8821 13.0007H16.2974V11.0413C16.2981 10.2193 16.5194 9.65667 17.6648 9.65667Z"
										fill="#141432" />
								</g>
								<defs>
									<clipPath id="clip0">
										<rect width="16" height="16" fill="white" transform="translate(7 7)" />
									</clipPath>
								</defs>
							</svg>
						</a>
						<a href="">
							<svg class="social-media-c" width="30" height="30" viewBox="0 0 30 30" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<circle cx="15" cy="15" r="15" fill="#707092" />
								<g clip-path="url(#clip0)">
									<path
										d="M23 10.039C22.405 10.3 21.771 10.473 21.11 10.557C21.79 10.151 22.309 9.513 22.553 8.744C21.919 9.122 21.219 9.389 20.473 9.538C19.871 8.897 19.013 8.5 18.077 8.5C16.261 8.5 14.799 9.974 14.799 11.781C14.799 12.041 14.821 12.291 14.875 12.529C12.148 12.396 9.735 11.089 8.114 9.098C7.831 9.589 7.665 10.151 7.665 10.756C7.665 11.892 8.25 12.899 9.122 13.482C8.595 13.472 8.078 13.319 7.64 13.078C7.64 13.088 7.64 13.101 7.64 13.114C7.64 14.708 8.777 16.032 10.268 16.337C10.001 16.41 9.71 16.445 9.408 16.445C9.198 16.445 8.986 16.433 8.787 16.389C9.212 17.688 10.418 18.643 11.852 18.674C10.736 19.547 9.319 20.073 7.785 20.073C7.516 20.073 7.258 20.061 7 20.028C8.453 20.965 10.175 21.5 12.032 21.5C18.068 21.5 21.368 16.5 21.368 12.166C21.368 12.021 21.363 11.881 21.356 11.742C22.007 11.28 22.554 10.703 23 10.039Z"
										fill="#141432" />
								</g>
								<defs>
									<clipPath id="clip0">
										<rect width="16" height="16" fill="white" transform="translate(7 7)" />
									</clipPath>
								</defs>
							</svg>
						</a>
						<a href="">
							<svg class="social-media-p" width="30" height="30" viewBox="0 0 30 30" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17.8711 15C17.8711 16.5857 16.5857 17.8711 15 17.8711C13.4143 17.8711 12.1289 16.5857 12.1289 15C12.1289 13.4143 13.4143 12.1289 15 12.1289C16.5857 12.1289 17.8711 13.4143 17.8711 15Z"
									fill="#707092" />
								<path
									d="M21.7144 9.92039C21.5764 9.5464 21.3562 9.20789 21.0701 8.93002C20.7923 8.64392 20.454 8.42374 20.0797 8.28572C19.7762 8.16785 19.3203 8.02754 18.4805 7.98932C17.5721 7.94789 17.2997 7.93896 14.9999 7.93896C12.6999 7.93896 12.4275 7.94766 11.5193 7.98909C10.6796 8.02754 10.2234 8.16785 9.92014 8.28572C9.54591 8.42374 9.2074 8.64392 8.92976 8.93002C8.64366 9.20789 8.42348 9.54617 8.28523 9.92039C8.16736 10.2239 8.02705 10.6801 7.98883 11.5198C7.9474 12.428 7.93848 12.7004 7.93848 15.0004C7.93848 17.3002 7.9474 17.5726 7.98883 18.481C8.02705 19.3208 8.16736 19.7767 8.28523 20.0802C8.42348 20.4545 8.64343 20.7927 8.92953 21.0706C9.2074 21.3567 9.54568 21.5769 9.91991 21.7149C10.2234 21.833 10.6796 21.9733 11.5193 22.0115C12.4275 22.053 12.6997 22.0617 14.9997 22.0617C17.3 22.0617 17.5723 22.053 18.4803 22.0115C19.3201 21.9733 19.7762 21.833 20.0797 21.7149C20.8309 21.4251 21.4247 20.8314 21.7144 20.0802C21.8323 19.7767 21.9726 19.3208 22.011 18.481C22.0525 17.5726 22.0612 17.3002 22.0612 15.0004C22.0612 12.7004 22.0525 12.428 22.011 11.5198C21.9728 10.6801 21.8325 10.2239 21.7144 9.92039ZM14.9999 19.4231C12.5571 19.4231 10.5768 17.4431 10.5768 15.0002C10.5768 12.5573 12.5571 10.5773 14.9999 10.5773C17.4426 10.5773 19.4229 12.5573 19.4229 15.0002C19.4229 17.4431 17.4426 19.4231 14.9999 19.4231ZM19.5977 11.4361C19.0269 11.4361 18.5641 10.9733 18.5641 10.4024C18.5641 9.83159 19.0269 9.36879 19.5977 9.36879C20.1685 9.36879 20.6313 9.83159 20.6313 10.4024C20.6311 10.9733 20.1685 11.4361 19.5977 11.4361Z"
									fill="#707092" />
								<path
									d="M15 0C6.717 0 0 6.717 0 15C0 23.283 6.717 30 15 30C23.283 30 30 23.283 30 15C30 6.717 23.283 0 15 0ZM23.5613 18.5511C23.5197 19.468 23.3739 20.094 23.161 20.6419C22.7135 21.7989 21.7989 22.7135 20.6419 23.161C20.0942 23.3739 19.468 23.5194 18.5513 23.5613C17.6328 23.6032 17.3394 23.6133 15.0002 23.6133C12.6608 23.6133 12.3676 23.6032 11.4489 23.5613C10.5322 23.5194 9.90601 23.3739 9.35829 23.161C8.78334 22.9447 8.26286 22.6057 7.83257 22.1674C7.39449 21.7374 7.05551 21.2167 6.83922 20.6419C6.62636 20.0942 6.48056 19.468 6.4389 18.5513C6.39656 17.6326 6.38672 17.3392 6.38672 15C6.38672 12.6608 6.39656 12.3674 6.43867 11.4489C6.48033 10.532 6.6259 9.90601 6.83876 9.35806C7.05505 8.78334 7.39426 8.26263 7.83257 7.83257C8.26263 7.39426 8.78334 7.05528 9.35806 6.83899C9.90601 6.62613 10.532 6.48056 11.4489 6.43867C12.3674 6.39679 12.6608 6.38672 15 6.38672C17.3392 6.38672 17.6326 6.39679 18.5511 6.4389C19.468 6.48056 20.094 6.62613 20.6419 6.83876C21.2167 7.05505 21.7374 7.39426 22.1677 7.83257C22.6057 8.26286 22.9449 8.78334 23.161 9.35806C23.3741 9.90601 23.5197 10.532 23.5616 11.4489C23.6034 12.3674 23.6133 12.6608 23.6133 15C23.6133 17.3392 23.6034 17.6326 23.5613 18.5511Z"
									fill="#707092" />
							</svg>
						</a>
						<a href="">
							<svg class="social-media-c" width="30" height="30" viewBox="0 0 30 30" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<circle cx="15" cy="15" r="15" fill="#707092" />
								<g clip-path="url(#clip0)">
									<path
										d="M17.9027 22.4467C17.916 22.4427 17.9287 22.4373 17.942 22.4327C26.0853 19.1973 23.8327 7 15 7C10.5673 7 7 10.6133 7 15C7 20.5513 12.6227 24.5127 17.9027 22.4467ZM10.5207 20.3727C11.0887 19.418 12.9267 16.7247 16.064 15.7953C16.72 17.468 17.18 19.4193 17.2253 21.632C14.848 22.4313 12.3407 21.8933 10.5207 20.3727ZM18.2087 21.2147C18.1213 19.0887 17.6873 17.2033 17.0687 15.57C18.4567 15.3533 20.0633 15.498 21.8853 16.228C21.498 18.402 20.108 20.2293 18.2087 21.2147ZM21.99 15.194C19.9833 14.44 18.2147 14.346 16.684 14.638C16.4473 14.1047 16.1987 13.592 15.9353 13.12C18.284 12.182 19.672 11.0387 20.2933 10.4333C21.39 11.7027 22.0413 13.346 21.99 15.194ZM19.5833 9.72133C19.018 10.2593 17.6867 11.346 15.41 12.2347C14.294 10.4693 13.1007 9.224 12.3447 8.52667C14.7633 7.53067 17.5527 7.956 19.5833 9.72133ZM11.3887 9.01533C11.9593 9.51733 13.212 10.7227 14.4207 12.5867C12.7607 13.1213 10.6793 13.514 8.148 13.5693C8.55067 11.64 9.75333 10.0053 11.3887 9.01533ZM8.02133 14.5733C10.8547 14.5273 13.148 14.08 14.9607 13.4747C15.2113 13.914 15.4493 14.3927 15.678 14.89C12.5213 15.8953 10.5487 18.4907 9.79333 19.6627C8.57467 18.3027 7.90267 16.528 8.02133 14.5733Z"
										fill="#141432" />
								</g>
								<defs>
									<clipPath id="clip0">
										<rect width="16" height="16" fill="white" transform="translate(7 7)" />
									</clipPath>
								</defs>
							</svg>
						</a>
					</div>
					<nav class="mx-auto d-flex flex-wrap align-items-center justify-content-center gap-4">
						<a href="javascript:;" class="footer-link" style="text-decoration: none">Accueil</a>
						<span>|</span>
						<a href="javascript:;" class="footer-link" style="text-decoration: none">Contacts</a>
					</nav>
					<nav class="d-flex flex-lg-row flex-column align-items-center justify-content-center">
						<p style="margin: 0">© 2021 - <?php echo e(now()->format("Y")); ?> MTransfer | Designed by DEV-STUDIO</p>
					</nav>
				</div>
			</div>
		</div>
	</section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>

    <script>
        function estimateAmount() {
            const amount_field = $("#amount")
            const from = $("#from")
            const to = $("#to")
            const estimation_table = document.getElementById("amount_estimation_table")

            const estimateAmountRoute = '<?php echo e(route("estimate_amount")); ?>';

            if(amount_field.val().trim().length<=0){
                alert("Veuillez renseigner le montant à estimer");
                return;
            }

            const formData = new FormData();
            formData.append("amount", amount_field.val());
            formData.append("transfer_from", from.val());
            formData.append("transfer_to", to.val());

            fetch(estimateAmountRoute,{
                method:"POST",
                mode:"cors",
                body:formData
            })
            .then((res)=>res.json())
            .then((response)=>{
                const {status, message, data} = response;
                if(status !== "success"){
                    alert(message);
                }else{
                    estimation_table.style.display="table";
                    const amount_table_td = $("#amount_table_td")
                    const fees_table_td = $("#fees_table_td")
                    const total_table_td = $("#total_table_td");

                    const currency = data.currency.toUpperCase();

                    amount_table_td.text(parseFloat(data.value)+" "+currency);
                    fees_table_td.text(parseFloat(data.fees)+" "+currency);
                    total_table_td.text((parseFloat(data.value)+parseFloat(data.fees))+" "+currency);
                }
            })
            .catch(console.warn)
        }
    </script>
  </html>
<?php /**PATH /var/www/html/m-transfert-laravel/resources/views/welcome.blade.php ENDPATH**/ ?>
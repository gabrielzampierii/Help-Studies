<?php

require "menu.php";

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">


  <style>
    .container {
      font-family: 'Quicksand', sans-serif;
    }

    .custom-bg {
      background-color: #836FFF;
      /* ou a cor de roxo desejada */
    }
    .mx-auto {
      font-size: 30px;
      /* Tamanho da fonte */
      color: white;
      padding: 10px 52px;
      /* Espaçamento interno (topo e base, direita e esquerda) */
      border-radius: 5px;
      /* Borda arredondada */
      text-align: center;
      /* Alinhamento do texto ao centro */
      margin: 0;

    }
  </style>

  </head>

  <body>
  <nav class="navbar custom-bg">
  <div class="container-fluid d-flex align-items-center">
    <a class="navbar-brand mr-auto" href="#">
      <img src="imagens/logo.png" alt="Bootstrap" width="85" height="73">
    </a>
    <b class="mx-auto">ENEM</b>
  </div>
</nav>
    <div class="text">
      <div class="row">
        <div class="container">
          <div class="elemento-style">
            <h2>Provas Anteriores </h2>
            <p>
              <a href="provas\documentos_ENEM\prova/enem 2017_1dia_prova_branca.pdf" download>1°Dia - 2017</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem 2017_2dia_prova_cinza.pdf" download>2°Dia - 2017</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2018_1dia_prova_branco.pdf" download>1°Dia - 2018</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2018_2dia_prova_cinza.pdf" download>2°Dia - 2018</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2019_1dia_prova_branco.pdf" download>1°Dia - 2019</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2019_2dia_prova_cinza.pdf" download>2°Dia - 2019</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2020_1dia_prova_branco.pdf" download>1°Dia - 2020</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2020_2dia_prova_cinza.pdf" download>2°Dia - 2020</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2021_1dia_prova_branco.pdf" download>1°Dia - 2021</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2021_2dia_prova_cinza.pdf" download>2°Dia - 2021</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2022_1dia_prova_branco.pdf" download>1°Dia - 2022</a>
              <br>
              <a href="provas\documentos_ENEM\prova/enem2022_2dia_prova_cinza.pdf" download>2°Dia - 2022</a>
            <p>
          </div>

          <div class="elemento-style">
            <h2>Gabarito </h2>
            <p>
              <a href="provas\documentos_ENEM\gabarito/gabarito_1dia_prova_branca_2017.pdf" download>1°Dia - 2017</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_2dia_prova_cinza_2017.pdf" download>2°Dia - 2017</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_1dia_prova_branca_2018.pdf" download>1°Dia - 2018</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_2dia_prova_cinza_2018.pdf" download>2°Dia - 2018</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_1dia_prova_branca_2019.pdf" download>1°Dia - 2019</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_2dia_prova_cinza_2019.pdf" download>2°Dia - 2019</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_1dia_prova_branca_2020.pdf" download>1°Dia - 2020</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_2dia_prova_cinza_2020.pdf" download>2°Dia - 2020</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_1dia_prova_branca_2021.pdf" download>1°Dia - 2021</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_2dia_prova_cinza_2021.pdf" download>2°Dia - 2021</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_1dia_prova_branca_2022.pdf" download>1°Dia - 2022</a>
              <br>
              <a href="provas\documentos_ENEM\gabarito/gabarito_2dia_prova_cinza_2022.pdf" download>2°Dia - 2022</a>
                  <p>
          </div>
          <div class="elemento-style">
            <h2>Matérias </h2>
            <p>
            <a href="provas\documentos_ENEM\matérias/MATÉRIAS ENEM.docx" download>Ciências Humanas e suas Tecnologias</a>
              <br>
              <a href="provas\documentos_ENEM\matérias/MATÉRIAS ENEM.docx" download>Linguagens códigos e suas tecnologias</a>
              <br>
              <a href="provas\documentos_ENEM\matérias/MATÉRIAS ENEM.docx" download>Ciências da Natureza e suas Tecnologias</a>
              <br>
              <a href="provas\documentos_ENEM\matérias/MATÉRIAS ENEM.docx" download>Matemática e suas Tecnologias</a>
            <p>
          </div>
          
          <div class="elemento-style">
            <h2>Temas de Redações Anteriores </h2>
            <p>
              <a href="provas/documentos_ENEM/temas/tema_2017.png"
                download="provas/documentos_ENEM/temas/tema_2017.png">2017<a>
                  <br>
                  <a href="provas/documentos_ENEM/temas/tema_2018.png"
                    download="provas/documentos_ENEM/temas/tema_2018.png">2018</a>
                  <br>
                  <a href="provas/documentos_ENEM/temas/tema_2019.png"
                    download="provas/documentos_ENEM/temas/tema_2019.png">2019</a>
                  <br>
                  <a href="provas/documentos_ENEM/temas/tema_2020.png"
                    download="provas/documentos_ENEM/temas/tema_2020.png">2020</a>
                  <br>
                  <a href="provas/documentos_ENEM/temas/tema_2021.png"
                    download="provas/documentos_ENEM/temas/tema_2021.png">2021</a>
                  <br>
                  <a href="provas/documentos_ENEM/temas/tema_2022.png"
                    download="provas/documentos_ENEM/temas/tema_2022.png">2022<a>
                      <p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>
                        <img src="imagens/enem.png" alt="" width="200px">
                        </p>
          </div>
        </div>
      </div>
    </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <footer class="bg-gray text-light">
    <div class="text-center" style="background-color: #CBCBCB ; padding: 10px; color:black;">
      <h3>&copy 2023 Help Studies</h3>
    </div>
  </footer>

  </body>
<!DOCTYPE html>
<html>
<head>
<style>
  
    
  .carousel-container {
    display: flex;
    align-items: center;
  }

  .carousel-container .carousel-item {
    margin-right: 100px;
  }

  .faixa {
    
    position: relative;
    display: inline-block;
  }

  .botao-container {
   
    position: absolute;
    top: 10px;
    right: 10px;
  }

  .botao {
    font-family: 'Quicksand', sans-serif;
    display: inline-block;
    margin-left: 5px;
    background-color: #836FFF;
    color: white;
    border-radius: 20px;
    padding: 10px 20px;
    border: 2px solid white;
    cursor: pointer;
  }
----------------------------------------------------
.container {
  
      position: relative;
      display: inline-block;
    }

    
    .image {
        max-width: 65%;
    }
    .rectangular-button {
      display: inline-block;
      padding: 10px 20px;
      border: 2px solid black;
      border-radius: 5px;
      background-color: orange;
      color: black;
      text-decoration: none;
      font-weight: bold;
      text-align: center;
      cursor: pointer;
    }
</style>



  <title>Help Studies</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
</head>

<div class="faixa">

        <img src="imagens/Faixa2.png" alt="Faixa promocional">
        <div class="botao-container">
    <button class="botao" onclick="window.location.href='http://localhost:8080/cadastrar.php'">Cadastre-se!</button>
    <button class="botao" onclick="window.location.href='http://localhost:8080/login.php'">Já sou aluno!</button>
  </div>
      </div>
<body>


  <div class="carousel-container">
    <div class="carousel-item active">
      <img src="imagens/imagem1.jpeg" alt="Imagem 1">
    </div>
    <div class="carousel-item">
      <img src="imagens/imagem2.jpeg" alt="Imagem 2">
    </div>
    <div class="carousel-item">
      <img src="imagens/imagem3.jpeg" alt="Imagem 3">
    </div>
    <div class="carousel-item">
        <img src="imagens/imagem4.jpeg" alt="Imagem 4">
      </div>  
  </div>
  <div class="container">
        <img class="image" src="imagens/Quadro.png" alt="Imagem">
        <a href="cadastrar.php" class="rectangular-button">Faça já sua conta!</a>
    </div>
    <footer class="bg-gray text-light">
      <div class="text-center" style="background-color: #CBCBCB ; padding: 10px;">
        <h3>&copy 2023 Help Studies</h3>
      </div>
    </footer>
  <script src="script.js"></script>
</body>
</html>

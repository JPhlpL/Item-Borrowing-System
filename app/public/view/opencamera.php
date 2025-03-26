<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
     <!-- Font Awesome -->
     <script src="https://kit.fontawesome.com/28af5dd079.js" crossorigin="anonymous"></script>
     
     
    <style>
      body{
           display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(190 212 239);
            background-size: 100%;
      }
      form{
        margin-left: 1px;
        margin-top: 10px;
      }
      .preview-panel
      {
        padding: 10px;
        border: 1px solid black;
        background: black;
        height: 20em;
      
      }
    </style>
</head>
<body>
  <form class="text-center">
      <video class="preview-panel"></video>
      <button class="btn btn-secondary""><i class="fas fa-camera"></i></button>
      <audio id="clickSound">
        <source src="sounds/cameraclicks.mp3" type="audio/mpeg">
      </audio>
  </form>    
</body>
<script src="../../../../plugins/scripts/snapshot.js"></script>
</html>
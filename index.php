<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>

</head>

<body>
    <nav>
    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button">Button</button>
    
    </div>
    </div>
    </nav>
    
    <main>
    <?php
    $query = mysqli_query("SELECT * FROM alejandría WHERE id=1");
    while ($consulted = mysqli_fetch_array($query)) {
      echo '<div class="card" style="width: 18rem;">';
       echo  '<img src="assets/images/'.$consulted['image'].'"  class="card-img-top" alt="...">';
        echo    '<div class="card-body">';
           echo '<h5 class="card-title">'.$consulted['titulo'].'</h5>';
           echo '<p class="card-text">'.$consulted['autor'].'</p>';
           echo '<p class="card-text">'.$consulted['editorial'].'</p>';
             echo  '<a href="#" class="btn btn-primary">Go somewhere</a>';
             echo  '<i class="bi bi-trash3">delete</i>';
             echo  '<i class="bi bi-pencil-square">edit</i>';
            echo '</div>';
        echo '</div>';
    }
        
    ?>
    </main>
    







            



    

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
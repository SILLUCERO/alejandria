<?php
include_once('./conect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Alejandria Form</title>
</head>
<body class="d-flex justify-content-center">

<?php
    $isbn = $_GET['isbn'];
    $result = $connect->query("SELECT * FROM alejandria WHERE isbn='$isbn'");
    $book = $result->fetch_assoc();
?>
    <form action="funciones.php" method="POST" enctype="multipart/form-data" class="form-books mt-5">
        <input type="hidden" name="current-isbn" value="<?php echo $book['isbn']; ?>"/>
        <div class="mb-3">
            <label for="formFile" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="formFile" name="foto">
            <?php if($book['img']): ?>
                <img src="./assets/images/<?php echo $book['img']; ?>" width="100" />
                <input type="hidden" name="image-name" value="<?php echo $book['img']; ?>"/>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="exampleInput" class="form-label">Titulo</label>
            <input class="form-control" type="text" placeholder="Titulo" aria-label="default input example" name="titulo" value="<?php echo $book['titulo']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInput" class="form-label">Autor</label>
            <input class="form-control" type="text" placeholder="Autor" aria-label="default input example" name="autor" value="<?php echo $book['autor']; ?>">
        </div>
    
        <div class="mb-3">
            <label for="exampleInput" class="form-label">ISBN</label>
            <input class="form-control" type="text" placeholder="Número" aria-label="default input example" name="isbn" value="<?php echo $book['isbn']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInput" class="form-label">Editorial</label>
            <input class="form-control" type="text" placeholder="Editorial" aria-label="default input example" name="editorial" value="<?php echo $book['editorial']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Sinopsis</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"><?php echo $book['descripcion']; ?></textarea>
        </div>

        <button type="submit" class="btn" name="btn-add">Crear</button>
    </form>
    
    
</body>
</html>
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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/styles.css">
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
    
    <main class="product-list">
        <?php
            $result = $connect->query("SELECT * FROM alejandria");
        ?>
        
        <?php while($book = $result->fetch_assoc()): ?>

        <div class="card" style="width: 18rem;">
        <?php if (isset($book['img']) && !empty($book['img']) && file_exists('assets/images/' . $book['img'])): ?>
            <img src="assets/images/<?php echo $book['img']; ?>" class="card-img-top" alt="<?php echo $book['titulo']; ?>">
        <?php else : ?>
            <img src="./assets/images/coverNotAvailable.png" class="card-img-top" alt="<?php echo $book['titulo']; ?>">
        <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $book['titulo']; ?></h5>
                <p class="card-text"><?php echo $book['autor']; ?></p>
                <p class="card-text"><?php echo $book['editorial']; ?></p>
                <a href="bookDetail.php?isbn=<?php echo $book['isbn']; ?>" class="btn btn-warning">Go somewhere</a>
                <!-- <a href="delete.php?isbn=<?php echo $book['isbn']; ?>">
                    <i class="bi bi-trash3">delete</i>
                </a> -->
                <a href="form.php?isbn=<?php echo $book['isbn']; ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </div>
        </div>
        <?php endwhile; ?>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">My blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"  href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes actualités</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <?php if ($article['image']): ?>
                <img src="/uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" style="width: 200px">
            <?php endif; ?>
            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            <p><a href="/admin/edit-actu/<?php echo $article['id']; ?>" class="btn btn-primary">Modifier</a></p>
            <?php if(($article['id']) != 7 ) { ?>
            <p><a href="/admin/delete/<?php echo $article['id']; ?>" class="btn btn-danger">Supprimer</a></p>
            <?php } ?>
        </li>
    <?php endforeach; ?>

</body>
</html>
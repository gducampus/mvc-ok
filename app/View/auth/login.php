<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container mt-5">
    <h1>Connexion</h1>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="/login" method="post" class="mt-4">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"
                   name="email"
                   id="email"
                   class="form-control"
                   required
                   value="<?= $old['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control"
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    <p class="mt-3">
        Pas encore de compte ? <a href="/register">Inscrivez-vous</a>.
    </p>
</div>

</body>
</html>
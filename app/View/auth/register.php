<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
    <h1>Inscription</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/register" method="post" class="mt-4">
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
            <div class="form-text">
                Au moins 8 caractères, dont une lettre et un chiffre.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>

    <p class="mt-3">
        Vous avez déjà un compte ? <a href="/login">Connectez-vous</a>.
    </p>
</div>

</body>
</html>

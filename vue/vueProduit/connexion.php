<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./vue/css/styles.css">
</head>
<body class="containerConnexion">
<div class="container" style="margin : auto; margin-top: 10%;">
        <div class="row">
            <div class="logo"> <img src="vue/img/logo2.png"> </div>
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4 blocConnexion">
                    <form action="./index.php?ctl=connect&action=validerPassword" method="post" class="row g-3">
                       <h3> <small class="text-muted">Se connecter</small> </h3>     
                        <div class="col-12">
                            <label>Email</label>
                            <input type="text" name="login" class="form-control" placeholder="l.dupont@campussaintaspais.fr">
                        </div>
                        <div class="col-12">
                            <label>Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" >
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn1 float-end">Connexion</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                </div>
            </div>
        </div>
    </div>
    </img>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="col-10 containerAdmin"> 
            <div class='cardAdmin'>
            <i align='center' class='imgVehicule card-img-top fas fa-5x fa-users-cog'></i>
            <div class='card-body'>
                    <form class="form-group" action="./index.php?ctl=admin&action=ajouter" method="POST">
                        <p class='card-text'>Nom : </p>
                        <input class="form-control" name="nom" type="text">
                        <p class='card-text'>Prénom : </p>
                        <input class="form-control" name="prenom" type="text">
                        <p class='card-text'>Adresse mail : </p>
                        <input class="form-control" name="mail" type="email">
                        <p class='card-text'>Mot de passe : </p>
                        <input class="form-control" id="mdp" name="mdp" type="text">
                        </div>
                        <center>
                        <input type="submit" class="btnAjouter btn btn-danger" value="Valider">
                    </center>
                </form>
            </div>
        </div>
</html>
<script>
    function notification () {
        swal ( "Utilisateur ajouté !" ,  "" ,  "success" )
    }

    const alpha = 'abcdefghijklmnopqrstuvwxyz';
    const calpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const num = '1234567890';
    const specials = ',.!@#$%^&*';
    const options = [alpha, alpha, alpha, calpha, calpha, num, num, specials];
    let opt, choose;
    let pass = "";
    for ( let i = 0; i < 8; i++ ) {
    opt = Math.floor(Math.random() * options.length);
    choose = Math.floor(Math.random() * (options[opt].length));
    pass = pass + options[opt][choose];
    options.splice(opt, 1);
    }
    
    document.getElementById("mdp").value=pass;
    
;

</script>


<?php 
    if(isset($_SESSION['erreur'])){
        $erreur = $_SESSION['erreur'];
        unset($_SESSION['erreur']);
    }
?>

<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title pl-3" id="exampleModalLabel">Connectez a Votre Compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="../Controller/Candidats.php" method="post">
                <div class="box">
                    <div class="field">
                        <label class="form-label">Email</label>
                        <div class="control">
                            <input class="form-control" type="email" name="user">
                        </div>
                    </div>
                    <div class="field">
                        <label class="form-label">Mot De Passe</label>
                        <div class="control">
                            <input class="form-control" type="password" name="password">
                        </div>
                        <label class="form-label"><button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal4">Mot De Passe Oublié?</button></label>
                    </div>
                    <div class="field  fieldlogin gap-2  is-grouped">
                        <div class="control">
                            <button class="btn btn1 btn-secondary" name="login">Login</button>
                        </div>
                        <div class="control">
                            <button class="btn btn1 btn-secondary">Qnnuler</button>
                        </div>
                    </div>
                    <div>
                    <label class="label label2">Pas De Compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal2">Créez Un!</button>
                </label>
                <label>                    
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal5">Connectez Tant Que Recruteur</button>

                </label>   
                    </div>
                </div>
              </form>
              </div>
            </div>
          </div>
</div>

<div class="modal fade" id="Modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title pl-3" id="exampleModalLabel">Connectez A Votre Compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="../Controller/Recruteurs.php" method="post">
                <div class="box">
                    <div class="field">
                        <label class="form-label">Email</label>
                        <div class="control">
                            <input class="form-control" type="email" name="user">
                        </div>
                    </div>
                    <div class="field">
                        <label class="form-label">Mot De Passe</label>
                        <div class="control">
                            <input class="form-control" type="password" name="password">
                        </div>
                        <label class="form-label"><button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal4">Mot De Passe Oublié?</button></label>
                    </div>
                    <div class="field  fieldlogin gap-2  is-grouped">
                        <div class="control">
                            <button class="btn btn1 btn-secondary" name="login">Login</button>
                        </div>
                        <div class="control">
                            <button class="btn btn1 btn-secondary">Annuler</button>
                        </div>
                    </div>
                    <div>
                    <label class="label label2">Pas de compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal2">Créez Un!</button>
                </label>
                <label>                    
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal1">Connectez Tant Que Candidat</button>

                </label>   
                    </div>
                </div>
              </form>
              </div>
            </div>
          </div>
</div>

<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Créer Un Compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../Controller/Recruteurs.php" method="post">
        <div class="box">
            <h2 class="title pl-1">Créer Un Compte</h2>
            <div class="field">
                <label class="form-label">Nom</label>
                <div class="control">
                    <input class="form-control" type="text" name="name">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Prenom</label>
                <div class="control">
                    <input class="form-control" type="text" name="family_name">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Date de Naissance</label>
                <div class="control">
                    <input class="form-control" type="date" name="birthday">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Nom d'entreprise</label>
                <div class="control">
                    <input class="form-control" type="text" name="company_name">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Telephone</label>
                <div class="control">
                    <input class="form-control" type="text" name="tel">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Email</label>
                <div class="control">
                    <input class="form-control" type="email" name="email">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Mot De Passe</label>
                <div class="control">
                    <input class="form-control" type="password" name="password">
                </div>
            </div>
            <div class="field  fieldlogin gap-2 is-grouped">
                <div class="control">
                    <button class="btn btn1 btn-secondary" name="register">Continuer</button>
                </div>
                <div class="control">
                    <button class="btn btn1 btn-secondary">Annuler</button>
                </div>
            </div>
            <div>
                <label class="label label2">Avez Vous Deja Un Compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal1">connectez vous</button>
                </label>
                <label>                    
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal3">Connectez Tant Que Candidat</button>

                </label>                    
            </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Créer Un Compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../Controller/Candidats.php" method="post">
        <div class="box">
            <h2 class="title pl-1">Créer Un Compte</h2>
            <div class="field">
                <label class="form-label">Nom</label>
                <div class="control">
                    <input class="form-control" type="text" name="name">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Prénom</label>
                <div class="control">
                    <input class="form-control" type="text" name="family_name">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Date de Naissance</label>
                <div class="control">
                    <input class="form-control" type="date" name="birthday">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Email</label>
                <div class="control">
                    <input class="form-control" type="email" name="email">
                </div>
            </div>
            <div class="field">
                <label class="form-label">Mot De Passe</label>
                <div class="control">
                    <input class="form-control" type="password" name="password">
                </div>
            </div>
            <div class="field  fieldlogin gap-2 is-grouped">
                <div class="control">
                    <button class="btn btn1 btn-secondary" name="register">Continuer</button>
                </div>
                <div class="control">
                    <button class="btn btn1 btn-secondary">Annuler</button>
                </div>
            </div>
            <div>
                <label class="label label2">Avez Vous Deja Un Compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal1">Connectez Vous</button>
                </label></label> 
                <label>
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal2">Connectez Tant Que Recruteur </button>

                </label>        
            </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title pl-3" id="exampleModalLabel">Changez Le Mot De Passe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="../Controller/Candidats.php" method="post">
                <div class="box">
                    <div class="field">
                        <label class="form-label ">Email</label>
                        <div class="control">
                            <input class="form-control mb-4" type="email" name="user">
                        </div>
                    </div>
                </div>
              </form>
              </div>
            </div>
          </div>
</div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
<?php

    if(isset($erreur)){
        echo "hi";
        print "<script>
        Swal.fire({
        title : 'Erreur',
        text : '$erreur',
        icon : 'error',
        confirmButtonText : 'Ok',
        timer : 2000
        })
        </script>
        ";
        }
    ?>


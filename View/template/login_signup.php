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
                <h5 class="modal-title pl-3" id="exampleModalLabel">connectez a votre compte</h5>
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
                        <label class="form-label">mot de passe</label>
                        <div class="control">
                            <input class="form-control" type="password" name="password">
                        </div>
                        <label class="form-label"><button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal4">mot de passe oublie?</button></label>
                    </div>
                    <div class="field  fieldlogin gap-2  is-grouped">
                        <div class="control">
                            <button class="btn btn1 btn-secondary" name="login">login</button>
                        </div>
                        <div class="control">
                            <button class="btn btn1 btn-secondary">annuler</button>
                        </div>
                    </div>
                    <div>
                    <label class="label label2">Pas de compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal2">creez un!</button>
                </label>
                <label>                    
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal5">connectez tant que recruteur</button>

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
                <h5 class="modal-title pl-3" id="exampleModalLabel">connectez a votre compte</h5>
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
                        <label class="form-label">mot de passe</label>
                        <div class="control">
                            <input class="form-control" type="password" name="password">
                        </div>
                        <label class="form-label"><button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal4">mot de passe oublie?</button></label>
                    </div>
                    <div class="field  fieldlogin gap-2  is-grouped">
                        <div class="control">
                            <button class="btn btn1 btn-secondary" name="login">login</button>
                        </div>
                        <div class="control">
                            <button class="btn btn1 btn-secondary">annuler</button>
                        </div>
                    </div>
                    <div>
                    <label class="label label2">Pas de compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal2">creez un!</button>
                </label>
                <label>                    
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal1">connectez tant que candidat</button>

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
        <h5 class="modal-title" id="exampleModalLabel">creer un compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../Controller/Recruteurs.php" method="post">
        <div class="box">
            <h2 class="title pl-1">Creez un compte</h2>
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
                <label class="form-label">telephone</label>
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
                    <button class="btn btn1 btn-secondary" name="register">continuer</button>
                </div>
                <div class="control">
                    <button class="btn btn1 btn-secondary">annuler</button>
                </div>
            </div>
            <div>
                <label class="label label2">Avez vous deja un compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal1">connectez vous</button>
                </label>
                <label>                    
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal3">connectez tant que candidat</button>

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
        <h5 class="modal-title" id="exampleModalLabel">creer un compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../Controller/Candidats.php" method="post">
        <div class="box">
            <h2 class="title pl-1">Creez un compte</h2>
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
                    <button class="btn btn1 btn-secondary" name="register">continuer</button>
                </div>
                <div class="control">
                    <button class="btn btn1 btn-secondary">annuler</button>
                </div>
            </div>
            <div>
                <label class="label label2">Avez vous deja un compte? <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal1">connectez vous</button>
                </label></label> 
                <label>
                    <button type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal2">connectez tant que recruteur </button>

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
                <h5 class="modal-title pl-3" id="exampleModalLabel">changez le Mot de passe</h5>
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


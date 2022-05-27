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
                <h5 class="modal-title" id="exampleModalLabel">login to your account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="../Controller/Candidats.php" method="post">
                <div class="box">
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="email" name="user">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" name="password">
                        </div>
                        <label class="label label2"><a href="#">Forgot Password?</a></label>
                    </div>
                    <button class="modal-close is-large" aria-label="close"></button>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link has-background-black" name="login">login</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">Cancel</button>
                        </div>
                    </div>
                    <label class="label label2">Don't have an account? <a href="#">Create one!</a></label>
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
                <h5 class="modal-title" id="exampleModalLabel">Create account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="../Controller/Candidats.php" method="post">
                <div class="box">
                    <h2 class="title pl-1">Create an account</h2>
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" type="text" name="name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Family Name</label>
                        <div class="control">
                            <input class="input" type="text" name="family_name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="email" name="email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" name="password">
                        </div>
                    </div>
                    <button class="modal-close is-large" aria-label="close"></button>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link has-background-black" name="register">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">Cancel</button>
                        </div>
                    </div>
                    <label class="label label2">Already have an account? <a href="#">Log in</a></label>
                </div>
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


<div id="modal-js-example2" class="modal">
      <div class="modal-background">
        <style type="text/css">
          .modal-background {
            opacity: 0;
          }
        </style>
      </div>
      <div class="modal-content">
        <form action="../Controller/Candidats.php" method="post">
          <div class="box">
            <h2 class="title pl-1">login to your account</h2>
            <?php flash('login');?>
            <div class="field">
              <label class="label">Username</label>
              <div class="control">
                <input class="input" type="text" name="user" />
              </div>
            </div>
            <div class="field">
              <label class="label">Password</label>
              <div class="control">
                <input class="input" type="password" name="password" />
              </div>
              <label class="label label2"
                ><a href="#">Forgot Password?</a></label
              >
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link has-background-black" name="login">
                  login
                </button>
              </div>
              <div class="control">
                <button class="button is-link is-light">Cancel</button>
              </div>
            </div>
            <label class="label label2">
              Don't have an account? <a href="#">Create one!</a>
            </label>
          </div>
        </form>
      </div>
    </div>
    <div id="modal-js-example" class="modal">
      <div class="modal-background">
        <style type="text/css">
          .modal-background {
            opacity: 0;
          }
        </style>
      </div>
      <div class="modal-content">
        <form action="../Controller/Candidats.php" method="post">
          <div class="box">
            <h2 class="title pl-1">Create an account</h2>
            <?php flash('register');?>
            <div class="field">
              <label class="label">Name</label>
              <div class="control">
                <input class="input" type="text" name="name" />
              </div>
            </div>
            <div class="field">
              <label class="label">Family Name</label>
              <div class="control">
                <input class="input" type="text" name="family_name" />
              </div>
            </div>
            <div class="field">
              <label class="label">Email</label>
              <div class="control">
                <input class="input" type="email" name="email" />
              </div>
            </div>
            <div class="field">
              <label class="label">Password</label>
              <div class="control">
                <input class="input" type="password" name="password" />
              </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
            <div class="field is-grouped">
              <div class="control">
                <button
                  class="button is-link has-background-black"
                  type="submit"
                  name="register"
                >
                  Register
                </button>
              </div>
              <div class="control">
                <button class="button is-link is-light">Cancel</button>
              </div>
            </div>
            <label class="label label2">
              Already have an account? <a href="#">Log in</a>
            </label>
          </div>
        </form>
      </div>
    </div>
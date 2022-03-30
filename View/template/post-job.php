<?php
  
?>
<div id="ourpostjob" class="modal">
      <div class="modal-background">
        <style type="text/css">
          .modal-background {
            opacity: 0;
          }
          .placeholder {
            color: white;
          }
        </style>
      </div>
      <div class="modal-content">
        <form action="../Controller/Jobs.php" method="post">
        <div class="box">
          <h2 class="title pl-1">post a job</h2>
          <?php flash("job"); ?>
          <div class="field">
            <label class="label">title</label>
            <div class="control">
              <input class="input" type="text" placeholder="job title" name="title" />
            </div>
          </div>
          <div class="field">
            <div class="control">
            <select name="place" class="input" style="background:rgba(0, 0, 0, 0.2);">
                  <option value="" disabled selected>Choose workplace type</option>
                  <option value="distanciel">Distanciel</option>
                  <option value="presentiel">Presentiel</option>
                </select>
            </div>
          </div>
          <div class="field">
            <div class="control">
               <select name="type" class="input" style="background:rgba(0, 0, 0, 0.2);">
                  <option value="" disabled selected>Choose employement type</option>
                  <option value="full time">Full Time</option>
                  <option value="part time">Part Time</option>
                </select>
            </div>
          </div>
          <div class="field">
            <label class="label">Salary</label>
            <div class="control">
              <input class="input" type="number" placeholder="Salary" name="salary" required/>
            </div>
          </div>
          <div class="field">
            <label class="label">description </label>
            <div class="control">
              <textarea class="textarea" placeholder="description" name="desc" required></textarea>
            </div>
            <label class="label2"
              >keep it short and mention all the necessary skills.</label
            >
          </div>
          <button class="modal-close is-large" aria-label="close"></button>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link has-background-black" name="submit">
                Submit
              </button>
            </div>
            <div class="control">
              <button class="button is-link is-light">Cancel</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
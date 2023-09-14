<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginmodalLabel">Login to forum for coders.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="partials/handlelogin.php" method="post">
      <div class="modal-body">
      
  <div class="mb-3">
    <label for="loginemail" class="form-label">Username</label>
    <input type="text" class="form-control" id="loginemail" aria-describedby="emailHelp" name="loginemail">
  </div>
  <div class="mb-3">
    <label for="loginpass" class="form-label">Password</label>
    <input type="password" class="form-control" id="loginpass" name="loginpassword">
  </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Login</button>

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>
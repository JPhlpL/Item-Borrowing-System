<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-body row">
      <div class="col-5 text-center d-flex align-items-center justify-content-center">
          <div>
          <!-- Add Mam Lala, mam dina, mam cel, at sir jun -->
            <h2 class="mb-3">Contact <strong>Us</strong></h2>
            <p class="lead">
              Please send your message and we will get back to you at the earliest!
            </p>
          </div>
      </div>
      <div class="col-7">
        <form>
        <div class="form-group">
          <label for="inputName">Name:</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php echo $profileData['USER_NAME']; ?>" readonly />
        </div>
        <div class="form-group">
          <label for="inputEmail">E-Mail:</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo $profileData['USER_EMAIL']; ?>" />
        </div>
        <div class="form-group">
          <label for="inputSubject">Subject:</label>
          <input type="text" id="subject" name="subject" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="inputMessage">Message:</label>
          <textarea id="messageContent" name="messageContent" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <input type="submit" id="emailBtn" class="emailBtn btn btn-danger">
        </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
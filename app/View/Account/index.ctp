<script type="text/javascript">
  window.location="/parkyusers/displayall";
</script>

        <div class="container">
          <div class="well">
          <h1>Create an Account</h1>
          </div>
        </div>
    <div class="container">
      <br>
      <form>
      <div class="row-fluid">
        <div class="span6 well">
          <h3>Personal Information</h3>
          <br>
          <div class="control-group">
            <label class="control-label">First Name</label>
            <input type="text" class="input-medium input-block-level"> 
          </div>
          <div class="control-group">
            <label class="control-label">Last Name</label>
            <input type="text" class="input-medium input-block-level"> 
          </div>
          <div class="control-group">
            <label class="control-label">Email</label>
            <input type="email" class="input-medium input-block-level"> 
          </div>
        </div>
      <br>
        <div class="span6 well">
          <h3>Account Information</h3>
          <br>
          <div class="control-group">
            <label class="control-label">Username</label>
            <input type="text" class="input-medium input-block-level"> 
          </div>
          <div class="control-group">
            <label class="control-label">Password</label>
            <input type="password" class="input-medium input-block-level"> 
          </div>
        </div>
      </div>
      <div id="cc_info">
        <?php include("credit_card.html"); ?>
      </div>
      </form>
      <div class="row-fluid">
        <div class="form-actions">
          <button type="submit" class="btn btn-primary" onclick="window.location='/parkyusers/add';">Submit</button>
          <input type="reset" class="btn" value="Reset"> 
        </div>
      </div>
    </div>
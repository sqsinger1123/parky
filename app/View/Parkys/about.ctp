 <header>
    <div class="container">
        <h3>About Parky</h3>

    </div>
 </header>
 <div class="landingpage jumbotron masthead">
  <div class="container">
    <img src="/parky_logo_noshadow.png" class="varwidth1020" style="width:25%" title="Parky" />
    <h1>Parky</h1>
    <p>Easily find <span class="orange">parking</span> in the Boston area</p>
    <img src="/parkyimage.png" alt="Connect drivers looking for parking to homeowners with empty driveways">
    <p>Connecting <span class="orange">drivers</span> looking for parking to <span class="orange">homeowners</span> with empty driveways</p>
    <div class="row-fluid profile profileabout p10">
      <div class="span8 profilevideo p5">
        <iframe src="http://www.youtube.com/embed/oWzOvP-hsjc" width="95%" height="360" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="span4 bl1" style="overflow:hidden;">
        <div id="response" class="profile" style="display:none; background-color:#DDD;"> <!-- email response status indicator! -->
        </div>
        <div id="signup" class="profile myreservations p10">
          <h3>Hear when we launch!</h3>
          We are enthusiastically working on Parky, and it is still under development. Sign up here if you are interested to hear when we go live!<br/><br/>
          <form id="emailform" action="javascript:$('#signup').slideUp('slow');$('#signedup').slideDown('slow');" method="post">
            <input name='email' id="email" class="input-medium input-block-level input-big" placeholder="Email" label="false" />
            <input type="submit" value="Tell me more!" label='Tell Me More!', class='btn btn-large btn-primary btn-block mt5' />
          </form>
        </div>
        <div id="signedup" style="display:none;" class="profile myreservations p10">
          <h3>Thank you!</h3>
          Thank you for signing up to hear more about Parky! We will keep you informed as we continue development and move toward launching this app!
          <form action="javascript:$('#signup').slideDown('slow');$('#signedup').slideUp('slow');" method="post">
            <input type="submit" value="Submit Another Email" label='Submit Another Email' title='Submit Another Email', class='btn btn-large btn-block mt5' />
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4 offset2">
    </div>
    <div class="span4">
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span8 offset2">
    <div class="profilemap p10" style="margin-top:0px;"> <center>
      <h4>Parky is still under construction.</h4>
      <p>But we will be launching in the Boston area soon.</p>
    </center>
    </div>
  </div>
</div>

<script src="/ajax_email.js"></script>
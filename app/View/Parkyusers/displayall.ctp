<style>
	table {
      margin:5px;
    }
    td {
      padding:5px;
    }
    table.distinctive {
      border:2px solid black;
    }
    table.distinctive td {
      border:2px solid black;
    }
</style>


<p style="margin:10px;">Displaying all user data </p>
<table class="distinctive"><tr><td>UID</td><td>First Name</td><td>Last Name</td>
	<td>Username</td><td>Password</td><td>Parkies</td><td>Credit cards</td><td>Email</td></tr>
<?php
  foreach ($parkyusers as $parkyuser):
    print "<tr><td>" . $parkyuser['Parkyuser']['id'] . "</td><td>" . $parkyuser['Parkyuser']['firstname'] .
    	"</td><td>" . $parkyuser['Parkyuser']['lastname'] .
    	"</td><td>" . $parkyuser['Parkyuser']['username'] .
    	"</td><td>" . $parkyuser['Parkyuser']['password'] .
    	"</td><td>" . $parkyuser['Parkyuser']['parkies'] .
    	"</td><td>" . $parkyuser['Parkyuser']['creditcards'] .
    	"</td><td>" . $parkyuser['Parkyuser']['email'] . 
    	"</td></tr>";
  endforeach ;
?>
</table>

<button class="btn-primary btn" onclick="window.location='add';">Add New User</button>
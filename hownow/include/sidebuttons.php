<?php
if ($name) {
  print "<li><h3>";
  print "$pr_welcome $name</h3>";
  print "<FORM action=\"http://hownow.me/login.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_logout\"></FORM>";
  print "<FORM action=\"settings.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_settings\"></FORM>";
  print "<FORM action=\"showgraph.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_graphs\"></FORM>";
  print "<FORM action=\"input.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_input\"></FORM>";
  print "<FORM action=\"dofriends.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_dofriends\"></FORM>";
}
?>

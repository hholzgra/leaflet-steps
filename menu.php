<html>
 <head>
  <title>Leaflet: Step by Step</title>
  <script type="text/javascript" src="jquery.js"></script>
  <script>
function foo(name, notes) 
{
  jQuery("div[name*='step']").hide();
  jQuery("div[name='"+name+"']").show();
  top.step.location.href=name;
  top.notes.location.href=notes;
  return false;
}
  </script>
 </head>
 <body>
  <h1>Leaflet: Step by Step</h1>
  <hr />
  <ol> 
<?php

function my_cmp($a, $b)
{
  $a = (int)str_replace("steps/step-","",$a); 
  $b = (int)str_replace("steps/step-","",$b); 

  if ($a == $b) {
      return 0;
  }

  return ($a < $b) ? -1 : 1;
}

$names = glob("steps/*/index.*");

usort($names, "my_cmp");

$oldname = "";
foreach ($names as $name) {
  switch (basename($name)) {
    case "index.html":
    case "index.php":
      $notes = dirname($name)."/notes.html";
      if (!file_exists($notes)) {
        $notes = "empty.html";	       
      }
      $content = file_get_contents($name); 
      if (preg_match('|title>(.*)</title|mi', $content, $matches)) {
        echo "<li>";
        echo "<a href='#' onclick='return foo(\"$name\",\"$notes\")'>$matches[1]</a>";
        echo "<div name='$name' style='display: none'>";
	echo "<ul>";
        echo "<li><a href='source.php?name=$name' target='step'>Source</a></li>";
        if (!empty($oldname)) {
          echo "<li><a href='diff.php?old=$oldname&new=$name' target='step'>Diff to previous</a></li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "</li>\n";
        $oldname = $name;
      }
      break;
    default:
      // ignore
      break; 
  }
}
?>
  </ol>
 </body>
</html>

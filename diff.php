<html>
 <head>
  <title>Source</title>
  <link rel="stylesheet" href="node_modules/@highlightjs/cdn-assets/styles/default.min.css">
  <script src="node_modules/@highlightjs/cdn-assets/highlight.min.js"></script>
 </head>
 <body><!-- foo -->
  <pre><code class="language-diff"><?php
   $fp = popen("/usr/bin/diff -ubBw " . $_GET['old'] . " " . $_GET['new'], "r");
   while (!feof($fp)) {
     echo htmlspecialchars(fread($fp, 4096));
   }
   pclose($fp);
?></code></pre>
  <script>hljs.highlightAll();</script>
 </body>
</html>

<html>
 <head>
   <title>Source</title>
   <link rel="stylesheet" href="node_modules/@highlightjs/cdn-assets/styles/default.min.css">
   <script src="node_modules/@highlightjs/cdn-assets/highlight.min.js"></script>
 </head>
 <body>
  <pre><code class="language-html"><?php echo htmlspecialchars(file_get_contents($_GET["name"])); ?></code></pre>
  <script>hljs.highlightAll();</script>
 </body>
</html>

<?php

    session_start();

	$article = "Priority Queue / Heap";
	require_once("../../inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

		<div class="container-fluid">
		<div class="row">
		<div id="article" class="col-12">

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">

removeMin <span class="co-r">"Root Node: 4"</span>
                               <span class="co-r">4</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">5                                6</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
       <span class="co-c">15              9                7              20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25     14       12       11      8</span>       <span class="co-m">L       L</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-m">L     L L     L L     L L     L  L     L L     L</span>


removeMin <span class="co-r">"Swap 4 and 8"</span>
                               <span class="co-r">8</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">5                                6</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
       <span class="co-c">15              9                7              20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25     14       12       11</span>      <span class="co-r">4</span>       <span class="co-m">L       L</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-m">L     L L     L L     L L     L  L     L L     L</span>

removeMin <span class="co-r">"Remove 4 and heapify downward 8 (swap 8 and 5)"</span>
                               <span class="co-r">5</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-r">8</span>                                <span class="co-c">6</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
       <span class="co-c">15              9                7              20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25     14       12       11      </span>        <span class="co-m">L       L</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-m">L     L L     L L     L L     L  L     L</span>

insert <span class="co-y">"Insert 3 as last node"</span>
                               <span class="co-c">5</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">8                                6</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
       <span class="co-c">15              9                7              20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25     14       12       11</span>      <span class="co-y">3</span>       <span class="co-m">L       L</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-m">L     L L     L L     L L     L  L     L L     L</span>

insert <span class="co-y">"Heapify upward (swap 3 with 7),
        (swap 3 with 6), (swap 3 with 5)"</span>
                               <span class="co-y">3</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">8</span>                                <span class="co-y">5</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
       <span class="co-c">15              9                <span class="co-y">6</span>              20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25     14       12       11</span>      <span class="co-y">7</span>       <span class="co-m">L       L</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-m">L     L L     L L     L L     L  L     L L     L</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>


		</div>
		</div>
		</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
	?>

</body>

</html>

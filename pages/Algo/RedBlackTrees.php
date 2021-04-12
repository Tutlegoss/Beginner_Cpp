<?php

    session_start();

	$article = "Red Black Trees";
	require_once("../../inc/php/fringes/header.inc.php");

    $redBlack = "<span style='font-weight: bold; color: #880000;'>Red-</span><span class='redBlackTreeHighlight'>Black</span>";
?>

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
		<div class="row mt-4">
		    <div class="col-12">
			    <h2 class="heading mt-3 text-center">Red-Black Trees</h2>
            </div>
        </div>

		<div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4">(2,4) Trees</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="ml-4">- Multi-way tree
                    <br>
                    - Internal node has <span class="co-m">k</span> children
                    <br>
                    - Internal node stores <span class="co-m">k-1</span> elements
                    <br>
                    - <span class="co-kg">Node-Size Property</span>: Internal nodes have at most 4 children
                    <br>
                    - <span class="co-kg">Depth Property</span>: External nodes have the same depth
                    <br>
                    - Internal nodes are called by # of children: 2-node, 3-node, 4-node
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Example (2,4) Tree</h5>
<div class="exBoxCyan ml-4 mb-4" style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">3-node           <span class="co-w">+</span>-------------<span class="co-w">+</span>
<span class="co-r">4-node</span>           |   <span class="co-c">11   24</span>   |
<span class="co-c">2-node</span>           <span class="co-w">+</span>-------------<span class="co-w">+</span>
<span class="co-m">3-node</span>          //      ||     \\
               //       ||      \\
<span class="co-w">+</span><span class="co-r">---------------</span><span class="co-w">+</span>    <span class="co-w">+</span><span class="co-c">------</span><span class="co-w">+</span>    <span class="co-w">+</span><span class="co-m">----------</span><span class="co-w">+</span>
<span class="co-r">|</span>    <span class="co-c">2  6  8</span>    <span class="co-r">|</span>    <span class="co-c">|</span>  <span class="co-c">15</span>  <span class="co-c">|</span>    <span class="co-m">|</span>  <span class="co-c">27  32</span>  <span class="co-m">|</span>
<span class="co-w">+</span><span class="co-r">---------------</span><span class="co-w">+</span>    <span class="co-w">+</span><span class="co-c">------</span><span class="co-w">+</span>    <span class="co-w">+</span><span class="co-m">----------</span><span class="co-w">+</span>
  |   |   |   |        |  |        |   |   |
  <span class="co-o">E   E   E   E        E  E        E   E   E</span>  &lt;-- External Nodes
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4"><?php echo $redBlack; ?> Trees</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="ml-4">- Representation of a (2,4) tree via a binary tree
                    <br>
                    - Nodes are colored <span class="co-r">red</span> or <span class="redBlackTreeHighlight">black</span> children
                    <br>
                    - Same logarithmic time performance as (2,4)
                    <br>
                    - Simpler implementation (single node type) as (2,4)
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Translation Example</h5>
<div class="exBoxCyan">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"> <span class="co-w">+</span>-----<span class="co-w">+</span>                 <span class="co-w">+</span>----------<span class="co-w">+</span>                   <span class="co-w">+</span>---------------<span class="co-w">+</span>
 |  <span class="co-m">4</span>  |                 |   <span class="co-m">3</span>  <span class="co-m">3</span>   |                   |   <span class="co-m">2</span>   <span class="co-m">6</span>   <span class="co-m">7</span>   |
 <span class="co-w">+</span>-----<span class="co-w">+</span>                 <span class="co-w">+</span>----------<span class="co-w">+</span>                   <span class="co-w">+</span>---------------<span class="co-w">+</span>


 <span class="co-b">+-----+            +-----+        +-----+                   +-----+
 |  4  |            |  5  |   <span class="co-y">or</span>   |  3  |                   |  6  |
 +-----+            +-----+        +-----+                   +-----+</span>
 /     \            /     \        /     \                   /     \
/       \          /       \      /       \                 /       \
               <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>                  <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>         <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>    <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>
               <span class="co-r">|  3  |                  |  5  |         |  2  |    |  7  |</span>
               <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>                  <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>         <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>    <span class="co-w">+</span><span class="co-r">-----</span><span class="co-w">+</span>
               /     \                  /     \         /     \    /     \
              /       \                /       \       /       \  /       \
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Color Properties</p>
                <br>
                <pre><span class="co-kg">Root Property</span>:</pre>
                <pre>    Root is <span class="blackHighlight">Black</span></pre>
                <pre><span class="co-kg">External Property</span>:</pre>
                <pre>    Every leaf is <span class="blackHighlight">black</span></pre>
                <pre><span class="co-kg">Internal Property</span>:</pre>
                <pre>    Children of a <span class="co-r">red</span> node are <span class="blackHighlight">Black</span></pre>
                <pre><span class="co-kg">Depth Property</span>:</pre>
                <pre>    All leaves have same <span class="blackHighlight">Black</span> depth</pre>
                <pre>    <span class="blackHighlight">Black</span> depth of node is # of <span class="blackHighlight">Black</span> nodes from [<span class="co-c">node</span> to <span class="co-c">root</span>] inclusive</pre>
                <pre>    Every path from root to any external node has the same # of <span class="blackHighlight">Black</span> nodes</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Example</h5>
<div class="exBoxKelly">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Depth: <span class="co-m">3</span>

                            <span class="co-b">+-----+
                            |  9  |
                            +-----+</span>
                <span class="co-w">+</span>--------------<span class="co-w">+</span>--------------<span class="co-w">+</span>
             <span class="co-r">+-----+</span>                     <span class="co-b">+-----+</span>
             <span class="co-r">|  4  |</span>                     <span class="co-b">| 15  |</span>
             <span class="co-r">+-----+</span>                     <span class="co-b">+-----+</span>
         <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>             <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
      <span class="co-b">+-----+       +-----+</span>       <span class="co-r">+-----+       +-----+</span>
      <span class="co-b">|  2  |       |  6  |</span>       <span class="co-r">| 12  |       | 21  |</span>
      <span class="co-b">+-----+       +-----+</span>       <span class="co-r">+-----+       +-----+</span>
     <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>     <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>     <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>     <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
     <span class="co-b">L       L     L</span>    <span class="co-r">+-----+</span>  <span class="co-b">L       L     L       L</span>
                        <span class="co-r">|  7  |</span>
                        <span class="co-r">+-----+</span>
                       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
                       <span class="co-b">L       L</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Height of <?php echo $redBlack; ?> tree</p>
                <br>
                <pre><span class="co-y">Theorem</span>:</pre>
                <pre>    A <?php echo $redBlack; ?> tree storing <span class="co-m">n</span> has height <span class="co-m">O(log(n))</span></pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Proof:</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">                <span class="co-b">+-----+         <span class="co-g">Consider shortest path and longest</span>
                |     |         <span class="co-g">path from <span class="co-c">root</span> to external node</span>
                +-----+</span>
                /     \
          <span class="co-b">+-----+</span>    <span class="co-r">+-----+</span>    Let <span class="co-y">T*</span> be portion of tree <span class="co-y">T</span>
          <span class="co-b">|     |</span>    <span class="co-r">|     |</span>    consisting of all nodes w/ <span class="co-c">depth</span> <span class="co-y">&#x2264; h*</span>
          <span class="co-b">+-----+</span>    <span class="co-r">+-----+</span>    <span class="co-y">T*</span> is complete, so <span class="co-y">h* &#x2264; log(n).</span>
             /          \
       <span class="co-b">+-----+          +-----+  <span class="co-g">So,</span> <span class="co-y">h &#x2264; 2h*, h &#x2264; 2log(n) &#x2208; O(log(n)).</span>
       |     |          |     |  <span class="co-g">Search algorithm is same as BST</span>
       +-----+          +-----+</span>  Therefore, searching takes <span class="co-m">O(log(n))</span> time.
          /                \
    <span class="co-b">+-----+</span>                <span class="co-r">+-----+</span>
    <span class="co-b">|     |</span>       <span class="co-y">T*</span>       <span class="co-r">|     |</span>
    <span class="co-b">+-----+</span> <span class="co-y">--------------</span> <span class="co-r">+-----+</span>
                              \
                              <span class="co-b">+-----+
                              |     |
                              +-----+</span>
                                 \
                                 <span class="co-r">+-----+
                                 |     |
                                 +-----+</span>
                                    \
                                    <span class="co-b">+-----+
                                    |     |
                                    +-----+</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Insertion</p>
                <br>
                <pre>Use BST insertion algorithm</pre>
                <pre>Color <span class="co-r">red</span> the newly inserted node <span class="co-m">Z</span>...</pre>
                <pre>    Unless it is <span class="co-c">root</span></pre>
                <pre>Have to preserve the <span class="co-kg">root, external, depth properties</span></pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Case 1:</h5>
<div class="exBoxCyan">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr              >
<td><pre class="@ co-g">If parent <span class="co-m">P</span> of <span class="co-c">Z</span> is <span class="blackHighlight">Black</span>, Preserve the <span class="co-kg">internal property</span>

                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+          +-----+
              |  3  |          |  8  |
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ +-----+  +-----+ +-----+
          |     | |  <span class="co-c">Z</span>  |  |     | |     |
          +-----+ +-----+  +-----+ +-----+</span>


Change the node where <span class="co-c">Z</span> is to <span class="co-r">Red</span>
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+          +-----+
              |  3  |          |  8  |
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ <span class="co-r">+-----+</span>  +-----+ +-----+
          |     | <span class="co-r">|  4  |</span>  |     | |     |
          +-----+ <span class="co-r">+-----+</span>  +-----+ +-----+</span>
                    / \
              <span class="co-b">+-----+ +-----+
              |     | |     |
              +-----+ +-----+</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c mt-4">Case 2:</h5>
<div class="exBoxCyan">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">If parent <span class="co-m">P</span> of <span class="co-c">Z</span> is <span class="co-r">Red</span>, a <span class="co-r">double red</span> is present
    Reorganize the tree

Insert <span class="co-m">4</span>

                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
              |  3  |          |  8  |
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ +-----+  +-----+ +-----+
          |     | |  <span class="co-c">Z</span>  |  |     | |     |
          +-----+ +-----+  +-----+ +-----+</span>

                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
              |  3  |          |  8  |
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ <span class="co-r">+-----+</span>  +-----+ +-----+
          |     | <span class="co-r">|  4  |</span>  |     | |     |
          +-----+ <span class="co-r">+-----+</span>  +-----+ +-----+</span>
                    / \
              <span class="co-b">+-----+ +-----+
              |     | |     |
              +-----+ +-----+</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4">Fixing Double Red</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="ml-4">- Consider a <span class="co-r">double red</span> with
                    <br>
                    - Child <span class="co-m">Z</span>
                    <br>
                    - Parent <span class="co-m">P</span> of <span class="co-m">Z</span>
                    <br>
                    - Sibling <span class="co-m">W</span> of <span class="co-m">P</span>
                    <br>
                    - Parent <span class="co-m">U</span> of <span class="co-m">W,P</span>
                    <br>
                    <span class="co-o">{NOTE: Dangling edge examples are subtrees}</span>
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Case 1:</h5>
<div class="exBoxCyan">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">W</span> is <span class="blackHighlight">Black</span> (Restructuring)
                      <span class="co-b">+-----+
                      |  4  | <span class="co-w">U</span>
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+</span>          <span class="co-r">+-----+</span>
            <span class="co-y">W</span> <span class="co-b">|  2  |</span>          <span class="co-r">|  7  |</span> <span class="co-t">P</span>
              <span class="co-b">+-----+</span>          <span class="co-r">+-----+</span>
                / \              / \
                           <span class="co-r">+-----+
                           |  6  | <span class="co-c">Z</span>
                           +-----+</span>
                             / \

1) Relabel nodes <span class="co-w">U</span>, <span class="co-c">Z</span>, <span class="co-t">P</span> temporarily as <span class="co-w">A</span>, <span class="co-t">B</span>, <span class="co-c">C</span>
    Such that <span class="co-w">A</span>, <span class="co-c">B</span>, <span class="co-t">C</span> will be visited in order using inorder traversal

2) Replace <span class="co-w">U</span> with node <span class="co-t">B</span> (colored <span class="blackHighlight">Black</span>)
    Make nodes <span class="co-w">A</span> and <span class="co-c">C</span> the <span class="co-y">left, right child</span> of <span class="co-t">B</span> (each colored <span class="co-r">Red</span>)

                      <span class="co-b">+-----+
                      |  6  | <span class="co-c">B</span>
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
            <span class="co-w">A</span> |  4  |          |  7  | <span class="co-t">C</span>
              +-----+          +-----+</span>
                / \              / \
         <span class="co-b">+-----+
         |  2  | <span class="co-y">W</span>
         +-----+</span>

There are four restructuring configurations
    depending on in-order traversal of nodes <span class="co-w">U</span>, <span class="co-c">Z</span>, <span class="co-t">P</span>

1) <span class="co-w">U</span>, <span class="co-c">Z</span>, <span class="co-t">P</span>
                      <span class="co-b">+-----+
                      |  2  | <span class="co-w">U</span>
                      +-----+</span>
                     /       \
                               <span class="co-r">+-----+
                               |  6  | <span class="co-t">P</span>
                               +-----+</span>
                                 / \
                          <span class="co-r">+-----+
                          |  4  | <span class="co-c">Z</span>
                          +-----+</span>
                            / \

2) <span class="co-t">P</span>, <span class="co-c">Z</span>, <span class="co-w">U</span>
                      <span class="co-b">+-----+
                      |  6  | <span class="co-w">U</span>
                      +-----+</span>
                     /       \
              <span class="co-r">+-----+
              |  2  | <span class="co-t">P</span>
              +-----+</span>
                / \
                   <span class="co-r">+-----+
                   |  4  | <span class="co-c">Z</span>
                   +-----+</span>
                     / \

3) <span class="co-c">Z</span>, <span class="co-t">P</span>, <span class="co-w">U</span>
                      <span class="co-b">+-----+
                      |  6  | <span class="co-w">U</span>
                      +-----+</span>
                     /       \
              <span class="co-r">+-----+
              |  4  | <span class="co-t">P</span>
              +-----+</span>
                / \
         <span class="co-r">+-----+
         |  2  | <span class="co-c">Z</span>
         +-----+</span>
           / \

4) <span class="co-w">U</span>, <span class="co-t">P</span>, <span class="co-c">Z</span>
                      <span class="co-b">+-----+
                      |  2  | <span class="co-w">U</span>
                      +-----+</span>
                     /       \
                              <span class="co-r">+-----+
                              |  4  | <span class="co-t">P</span>
                              +-----+</span>
                                / \
                                   <span class="co-r">+-----+
                                   |  6  | <span class="co-c">Z</span>
                                   +-----+</span>
                                     / \

All four cases restructure to:

                      <span class="co-b">+-----+
                      |  4  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
              |  2  |          |  6  |
              +-----+          +-----+</span>
                / \              / \
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c mt-4">Case 2:</h5>
<div class="exBoxCyan">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">W</span> is <span class="co-r">Red</span> (Recoloring)
                      <span class="co-b">+-----+
                      |  4  | <span class="co-w">U</span>
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
            <span class="co-y">W</span> |  2  |          |  7  | <span class="co-t">P</span>
              +-----+          +-----+</span>
                / \              / \
                           <span class="co-r">+-----+
                           |  6  | <span class="co-c">Z</span>
                           +-----+</span>
                             / \

1) Color <span class="co-t">P</span>, <span class="co-y">W</span> <span class="blackHighlight">Black</span>
2) Color <span class="co-w">U</span> <span class="co-r">Red</span>, unless it's the <span class="co-c">Root</span>
3) If <span class="co-r">double red</span> problem persists at <span class="co-w">U</span>,
    Repeat process at <span class="co-w">U</span> (restructuring or recoloring)
<span class="co-o">{Fixes problem locally, but double red issue can go up the tree}</span>

Recoloring of above <?php echo $redBlack; ?> tree:

                      <span class="co-r">+-----+
                      |  4  | <span class="co-w">U</span>
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+          +-----+
            <span class="co-y">W</span> |  2  |          |  7  | <span class="co-t">P</span>
              +-----+          +-----+</span>
                / \              / \
                           <span class="co-r">+-----+
                           |  6  | <span class="co-c">Z</span>
                           +-----+</span>
                             / \
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Analysis of Insertion</p>
                <br>
                <pre><?php echo $redBlack; ?> tree has <span class="co-m">O(log(n))</span> height</pre>
                <pre>1) takes <span class="co-m">O(log(n))</span> time</pre>
                <pre>    As we visit <span class="co-m">O(log(n))</span> nodes</pre>
                <pre>2) Takes <span class="co-m">O(1)</span> time</pre>
                <pre>3) Takes <span class="co-m">O(log(n))</span> time, because:</pre>
                <pre>    <span class="co-m">O(log(n))</span> recolorings each taking <span class="co-m">O(1)</span> time</pre>
                <pre>    At most one restructuring taking <span class="co-m">O(1)</span> time</pre>
                <pre>So, insertion is a <?php echo $redBlack; ?> tree takes <span class="co-m">O(log(n))</span> time</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c mt-4">Algorithm:</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Algorithm <span class="co-y">insertItem</span>(<span class="co-m">k</span>, <span class="co-m">e</span>)

1) Search for key <span class="co-m">k</span> to locate insertion node <span class="co-c">Z</span>

2) Add new item <span class="co-m">(k, e)</span> at node <span class="co-c">Z</span> and color <span class="co-r">Red</span>

3) <span class="co-r">while</span> <span class="co-r">doubleRed</span>(<span class="co-c">Z</span>)
    <span class="co-r">if</span> <span class="co-y">isBlack</span>(<span class="co-y">sibling</span>(<span class="co-y">parent</span>(<span class="co-c">Z</span>)))
        <span class="co-y">restructure</span>(<span class="co-c">Z</span>)
        <span class="co-r">return
    else</span> <span class="co-w">{ sibling(parent(Z)) is <span class="co-r">Red</span> }</span>
        <span class="co-c">Z</span> <span class="co-y">&lt;-- recolor</span>(<span class="co-c">Z</span>)
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4">Fixing <span class="blackHighlight">double black</span></h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Deletion</p>
                <br>
                <pre>Deletion takes <span class="co-m">O(log(n))</span> time</pre>
                <pre>Use deletion algorithm for BST</pre>
                <pre>    Delete internal node <span class="co-t">P</span> and its external whild <span class="co-y">W</span></pre>
                <pre>    Let <span class="co-m">R</span> be the sibling of <span class="co-y">W</span></pre>
                <pre>If <span class="co-t">P</span> or <<span class="co-m">R</span> is <span class="co-r">Red</span></pre>
                <pre>    Color <span class="co-m">R</span> <span class="blackHighlight">Black</span></pre>
                <pre><span class="co-o">{If deleted node has two internal children, find next internal node using in-order traversal and swap values. Next internal node in-order will always have at least one external child}</span></pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c mt-4">Example:</h5>
<div class="exBoxCyan mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">This <?php echo $redBlack; ?> tree:
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
              |  3  |          |  8  | <span class="co-t">P</span>
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ +-----+  +-----+ +-----+
          |     | |     |  |     | |     |
          +-----+ +-----+  +-----+ +-----+</span>
                              <span class="co-m">R</span>       <span class="co-y">W</span>

Turns into this <?php echo $redBlack; ?> tree:
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+</span>          <span class="co-b">+-----+</span>
              <span class="co-r">|  3  |</span>          <span class="co-b">|     |</span> <span class="co-m">R</span>
             <span class="co-r"> +-----+</span>          <span class="co-b">+-----+</span>
                / \              / \
          <span class="co-b">+-----+ +-----+
          |     | |     |
          +-----+ +-----+</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>

<div class="exBoxCyan mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">This <?php echo $redBlack; ?> tree:
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
              |  3  |          |  8  | <span class="co-t">P</span>
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ +-----+  <span class="co-r">+-----+</span> +-----+
          |     | |     |  <span class="co-r">|  7  |</span> |     |
          +-----+ +-----+  <span class="co-r">+-----+</span> +-----+</span>
                              <span class="co-m">R</span>       <span class="co-y">W</span>
                             / \
                       <span class="co-b">+-----+ +-----+
                       |     | |     |
                       +-----+ +-----+</span>

Turns into this <?php echo $redBlack; ?> tree:
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+          +-----+
              |  3  |          |  7  | <span class="co-m">R</span>
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ +-----+  +-----+ +-----+
          |     | |     |  |     | |     |
          +-----+ +-----+  +-----+ +-----+</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <pre>Another situation (if above does not hold):</pre>
                <pre>    <span class="co-t">P</span>, <span class="co-m">R</span> are <span class="blackHighlight">Black</span></pre>
                <pre>        Color <span class="co-m">R</span> <span class="blackHighlight">Double Black</span></pre>
                <pre>        Reorganize the tree</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c mt-4">Example:</h5>
<div class="exBoxCyan mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Delete <span class="co-m">8</span> (causes a <span class="blackHighlight">Double Black</span>)
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+          +-----+
              |  3  |          |  8  | <span class="co-t">P</span>
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+</span> <span class="co-r">+-----+</span>  <span class="co-b">+-----+ +-----+</span>
          <span class="co-b">|     |</span> <span class="co-r">|  4  |</span>  <span class="co-b">|     | |     |</span>
          <span class="co-b">+-----+</span> <span class="co-r">+-----+</span>  <span class="co-b">+-----+ +-----+</span>
                    / \       <span class="co-m">R</span>       <span class="co-y">W</span>
              <span class="co-b">+-----+ +-----+
              |     | |     |
              +-----+ +-----+</span>

Turns into this <?php echo $redBlack; ?> tree:
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+</span>          <span class="co-o">xxxxxxx</span>
              <span class="co-b">|  3  |</span>          <span class="co-o">|xxxxx|</span> <span class="co-m">R</span>
              <span class="co-b">+-----+</span>          <span class="co-o">xxxxxxx</span>
                / \              / \
          <span class="co-b">+-----+</span> <span class="co-r">+-----+</span>
          <span class="co-b">|     |</span> <span class="co-r">|  4  |</span>
          <span class="co-b">+-----+</span> <span class="co-r">+-----+</span>
                    / \
              <span class="co-b">+-----+ +-----+
              |     | |     |
              +-----+ +-----+</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <pre>By removing two <span class="blackHighlight">Black</span> nodes</pre>
                <pre>    The <span class="blackHighlight">Black</span> depth is altered</pre>
                <pre>Fixing this <span class="blackHighlight">Double Black</span></pre>
                <pre>    Many cases to consider (akin to <span class="co-r">Double Red</span>)</pre>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Fixing a Double Black</p>
                <br>
                <pre>Parent <span class="co-m">P</span></pre>
                <pre>Sibling <span class="co-m">Y</span> of <span class="co-m">R</span></pre>
                <pre>Child <span class="co-m">Z</span> of <span class="co-m">Y</span></pre>
                <pre>There are three cases</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c mt-4">Case 1:</h5>
<div class="exBoxCyan mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-kg">Y</span> is <span class="blackHighlight">Black</span> and has a <span class="co-r">Red</span> child <span class="co-c">Z</span>
Perform <span class="co-y">Restructuring</span> on <span class="co-kg">Y</span>, <span class="co-t">P</span>, <span class="co-c">Z</span>
                      <span class="co-b">+-----+
                      |  6  | <span class="co-t">P</span>
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+</span>          <span class="co-o">xxxxxxx</span>
            <span class="co-kg">Y</span> <span class="co-b">|  3  |</span>          <span class="co-o">|xxxxx|</span> <span class="co-m">R</span>
              <span class="co-b">+-----+</span>          <span class="co-o">xxxxxxx</span>
                / \              / \
          <span class="co-b">+-----+</span> <span class="co-r">+-----+</span>
          <span class="co-b">|     |</span> <span class="co-r">|  4  |</span> <span class="co-c">Z</span>
          <span class="co-b">+-----+</span> <span class="co-r">+-----+</span>
                    / \
              <span class="co-b">+-----+ +-----+
              |     | |     |
              +-----+ +-----+</span>

Turns into this <?php echo $redBlack; ?> tree:
                      <span class="co-b">+-----+
                      |  4  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+          +-----+
              |  3  |          |  6  |
              +-----+          +-----+</span>
                / \              / \
          <span class="co-b">+-----+ +-----+  +-----+ +-----+
          |     | |  4  |  |     | |     | <span class="co-m">R</span>
          +-----+ +-----+  +-----+ +-----+</span>


</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c mt-4">Case 2:</h5>
<div class="exBoxCyan mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-kg">Y</span> is <span class="blackHighlight">Black</span> and has <span class="co-r">Black</span> children
Perform <span class="co-y">Recoloring</span>.
    Color <span class="co-m">R</span> <span class="blackHighlight">Black</span> and <span class="co-kg">Y</span> <span class="co-r">Red</span>
If <span class="co-t">P</span> is <span class="co-r">Red</span>, color it <span class="blackHighlight">Black</span>
    Otherwise, color <span class="co-t">P</span> <span class="blackHighlight">Double Black</span>
    <span class="co-o">{May propogate up}</span>

                      <span class="co-r">+-----+
                      |  6  | <span class="co-t">P</span>
                      +-----+</span>
                     /        \
              <span class="co-b">+-----+</span>          <span class="co-o">xxxxxxx</span>
            <span class="co-kg">Y</span> <span class="co-b">|  3  |</span>          <span class="co-o">|xxxxx|</span> <span class="co-m">R</span>
              <span class="co-b">+-----+</span>          <span class="co-o">xxxxxxx</span>
                / \
          <span class="co-b">+-----+ +-----+
          <span class="co-b">|     | |     |</span> <span class="co-c">Z</span>
          <span class="co-b">+-----+ +-----+</span>

Turns into this <?php echo $redBlack; ?> tree:
                      <span class="co-b">+-----+
                      |  6  |
                      +-----+</span>
                     /        \
              <span class="co-r">+-----+</span>          <span class="co-b">+-----+</span>
            <span class="co-kg">Y</span> <span class="co-r">|  3  |</span>          <span class="co-b">|     |</span> <span class="co-m">R</span>
              <span class="co-r">+-----+</span>          <span class="co-b">+-----+</span>
                / \
          <span class="co-b">+-----+ +-----+
          |     | |     | <span class="co-c">Z</span>
          +-----+ +-----+ </span>


</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Case 3:</p>
                <br>
                <pre><span class="co-t">Y</span> is <span class="co-r">Red</span></pre>
                <pre>Perform an <span class="co-y">Adjustment</span></pre>
                <pre>    After, either <span class="co-c">Case 1</span> or <span class="co-c">Case 2</span> applies</pre>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c mt-4">Misc:</p>
                <br>
                <pre>More cases than <span class="co-r">Double Red</span> (not covered)</pre>
                <pre>    Not complicated, but tedious</pre>
                <pre>Be able to find and insert into a <?php echo $redBlack; ?> tree</pre>
                <pre>For Deletion, know that it takes <span class="co-m">O(log(n))</span></pre>
                <pre>    Due to height of the tree</pre>
                <pre>    Easy removal if child is <span class="co-r">Red</span></pre>
                <pre>    Either perform <span class="co-y">Restructuring</span></pre>
                <pre>    Or <span class="co-y">Recoloring</span> (may propogate up)</pre>
                <pre>    Or an <span class="co-y">Adjustment</span></pre>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4"><?php echo $redBlack; ?> Reorganization</h3>
                <hr>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
<div class="exBoxKelly">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">                                   <span class="co-w">RESULT</span>
INSERTION (Fix <span class="co-r">double red</span>)

    <span class="co-c">Restructuring</span>    ||    <span class="co-r">Double red</span> removed
    <span class="co-t">Recoloring</span>       ||    <span class="co-r">Double red</span> removed or propogated up


DELETION (Fix <span class="blackHighlight">double black</span>)

    <span class="co-c">Restructuring</span>    ||    <span class="blackHighlight">Double black</span> removed
    <span class="co-t">Recoloring</span>       ||    <span class="blackHighlight">Double red</span> removed or propogated up
    <span class="co-o">Adjustment</span>       ||    <span class="co-c">Restructuring</span> or <span class="co-t">Recoloring</span> follows
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex mb-4 mt-5 pl-5 pr-5 justify-content-between">
                <a href="./BinaryTreeOrdDict.php" style="display: inline-block;">Binary Trees/Ordered Dicts</a>
                <a href="./MergeQuickSelection.php" style="display: inline-block;">Sorting (Merge/Quick/Selection)</a>
            </div>
        </div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
	?>

</body>
</html>

<?php

    session_start();

	$article = "BST/Ordered Dict";
	require_once("../../inc/php/fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

		<div class="container-fluid">
		<div class="row">
		<div id="article" class="col-12">
            <div class="row mt-3">
			    <h2 class="col-12 heading mt-3 text-center">Ordered Dictionaries and Binary Tree Ops</h2>
            </div>

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ">Ordered Dictionaries</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="">- Ordered keys
                        <br>
                        - <span class="co-kg">insertItem, removeItem, findElement</span> (usual operations still performed)
                        <br>
                        - Maintains order relation for the keys
                    </p>
                    <h5 class="text-center co-c">New Operations/Macro</h5>
<div class="exBoxKelly mb-4" style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-g">Let k = key</span>
<span class="co-y">    closestkeyBefore</span>(k)
<span class="co-y">    closestkeyAfter</span>(k)
<span class="co-y">    closestElemBefore</span>(k)
<span class="co-y">    closestElemAfter</span>(k)

<span class="co-c">NO_SUCH_KEY</span>: No item in dictionary matches query
</pre></td>
</tr></tbody></table>
</figure>
</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ">Binary Tree Operations</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Binary Search</p>
                    <br>
                    <pre>Elements ordered in sorted sequence</pre>
                    <pre>Goal: Find element with key <span class="co-m">k</span></pre>
                    <pre>        After checking a key <span class="co-m">j</span>, we know if <span class="co-m">k</span> goes before/after <span class="co-m">j</span></pre>
                    <pre class="co-r">Start comparison with the middle element</pre>
                    <h5 class="text-center co-c">BinarySearch()</h5>
<div class="exBoxPurple mb-4" style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Algorithm <span class="co-y">BinarySearch</span>(S, k, low, high):
    <span class="co-r">if</span> low &gt; hight <span class="co-r">then
        return</span> <span class="co-c">NO_SUCH_KEY</span>
    mid &lt;--- (low <span class="co-y">+</span> high)<span class="co-y">/</span>2 (truncated)
    <span class="co-r">if</span> <span class="co-y">key</span>(mid) <span class="co-y">=</span> k <span class="co-r">then
        return</span> <span clas="co-y">elem</span>(mid)
    <span class="co-r">if</span> <span class="co-y">key</span>(mid) <span class="co-y">&#x2264;</span> k <span class="co-r">then
        return</span> <span clas="co-y">BinarySearch</span>(S, l, mid<span class="co-y">+</span><span class="co-m">1</span>, high)
    <span class="co-r">if</span> <span class="co-y">key</span>(mid) <span class="co-y">&#x2265;</span> k <span class="co-r">then
        return</span> <span clas="co-y">BinarySearch</span>(S, k, low, mid<span class="co-y">-</span><span class="co-m">1</span>)
</pre></td>
</tr></tbody></table>
</figure>
</div>

                    <h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4" style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Find k <span class="co-y">=</span> <span class="co-m">68</span>
Comparator: <span class="co-y" style="font-size: 1.5rem;">&#x2264;</span>
Array is left-to-right with leftmost having index of <span class="co-m">0</span>

    <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
S   | <span class="co-m">5</span>  | <span class="co-m">20</span> | <span class="co-m">32</span> | <span class="co-m">49</span> | <span class="co-c">52</span> | <span class="co-m">68</span> | <span class="co-m">71</span> | <span class="co-m">88</span> | <span class="co-m">94</span> | <span class="co-m">99</span> |
    <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-y">low                 <span class="co-r">mid</span>                      high</span>

    <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
S   | <span class="co-m">5</span>  | <span class="co-m">20</span> | <span class="co-m">32</span> | <span class="co-m">49</span> | <span class="co-w">52</span> | <span class="co-m">68</span> | <span class="co-m">71</span> | <span class="co-c">88</span> | <span class="co-m">94</span> | <span class="co-m">99</span> |
    <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
                              <span class="co-y">low       <span class="co-r">mid</span>       high</span>

    <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
S   | <span class="co-m">5</span>  | <span class="co-m">20</span> | <span class="co-m">32</span> | <span class="co-m">49</span> | <span class="co-w">52</span> | <span class="co-c">68</span> | <span class="co-m">71</span> | <span class="co-w">88</span> | <span class="co-m">94</span> | <span class="co-m">99</span> |
    <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
                              <span class="co-y">low  high</span>
                              <span class="co-r">mid</span>

Therefore, key <span class="co-m">68</span>'s index is <span class="co-m">5</span>

</pre></td>
</tr></tbody></table>
</figure>
</div>
                    <pre><span  class="co-y">BinarySearch</span>(...) has a runtime of <span class="co-m">O(log(n))</span></pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Lookup Table</p>
                    <br>
                    <pre>Array-based dictionary with keys sorted</pre>
                    <pre><span class="co-y">insertItem</span> takes <span class="co-m">O(n)</span> time to make room by shifting items</pre>
                    <pre><span class="co-y">removeItem</span> takes <span class="co-m">O(n)</span> time to compact by shifting items</pre>
                    <pre><span class="co-y">insertItem</span> takes <span class="co-m">O(n)</span> time, using binary search</pre>
                    <pre>Effective Uses:</pre>
                    <pre>    Small dictionary</pre>
                    <pre>    Most common operation is searching, insertion and removals rarely used</pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ">Binary Search Tree</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="">- Binary Tree
                        <br>
                        - All internal nodes store a <span class="co-c">(key, element)-pair</span>
                        <br>
                        - All <span class="co-y">left subtree</span> elements are smaller than <span class="co-c">root</span>
                        <br>
                        - All <span class="co-y">right subtree</span> elements are larger than <span class="co-c">root</span>
                        <br>
                        - <span class="co-y">Left/Right subtrees</span> are <span class="co-kg">Binary Search Trees</span>
                        <br>
                        - <span class="co-kg">Inorder Traversal</span> visits nodes in ascending order
                    </p>
                    <h5 class="text-center co-c">Left/Right Subtrees</h5>
<div class="exBoxCyan  mb-4" style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-g"><span class="co-w">Left Subtree</span>
<span class="co-o">Right Subtree</span>
                       <span class="co-c">Root 6</span>
     <span class="co-w">       +</span>------------<span class="co-w">|<span class="co-o">|</span></span>------------<span class="co-w">+</span>
            <span class="co-w">2            |</span><span class="co-o">|            9</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+     |</span><span class="co-o">|</span>     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-w">1             4     |</span><span class="co-o">|     8             E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+|</span><span class="co-o">|</span><span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-w">E         E   E         E|</span><span class="co-o">|E         E</span>
<span class="co-w">    Smaller than 6       |</span><span class="co-o">|      Larger than 6</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Insert(k, e)</p>
                    <pre>Find free spot in tree</pre>
                    <pre>    Add node that stores <span class="co-c">(k, e)</span></pre>
                    <pre>Start at <span class="co-c">Root</span> r</pre>
                    <pre>    If <span class="co-m">k</span> <span class="co-y">&lt; key</span>(<span class="co-m">r</span>)</pre>
                    <pre>        Continue in <span class="co-y">Left subtree</span></pre>
                    <pre>    If <span class="co-m">k</span> <span class="co-y">&gt; key</span>(<span class="co-m">r</span>)</pre>
                    <pre>        Continue in <span class="co-y">Right subtree</span></pre>
                    <pre>Runtime is <span class="co-m">O(h)</span></pre>
                    <pre>    <span class="co-m">h</span> is the height of the tree</pre>
<h5 class="text-center co-c">Example:</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Insert the numbers <span class="co-m">22, 80, 18, 9, 90, 20</span>


<span class="co-m">22</span> is the <span class="co-c">Root</span>
                         <span class="co-c">22</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
            <span class="co-o">E                          E</span>

<span class="co-m">80</span> is <span class="co-y">&gt;</span> than <span class="co-c">22</span>
    Go right and insert <span class="co-m">80</span>
                              <span class="co-c">22</span>
          <span class="co-w">       +</span>------------<span class="co-w">++</span><span class="co-r">------------</span><span class="co-w">++</span>
                 <span class="co-o">E</span>                          <span class="co-m">80</span>
                                     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
                                     <span class="co-o">E              E</span>


<span class="co-m">18</span> is <span class="co-y">&lt;</span> than <span class="co-c">22</span>
    Go left and insert <span class="co-m">80</span>
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span><span class="co-r">------------</span><span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18                          80</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-o">E              E            E             E</span>


<span class="co-m">9</span> is <span class="co-y">&lt;</span> than <span class="co-c">22</span>
    Go left and <span class="co-m">9</span> is <span class="co-y">&lt;</span> than <span class="co-m">18</span>
    Go left and insert <span class="co-m">9</span>
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span><span class="co-r">------------</span><span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18                          80</span>
          <span class="co-w">+</span><span class="co-r">------</span><span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-m"> 9</span>             <span class="co-o">E            E             E</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>


<span class="co-m">90</span> is <span class="co-y">&gt;</span> than <span class="co-c">22</span>
    Go right and <span class="co-m">90</span> is <span class="co-y">&gt;</span> than <span class="co-m">80</span>
    Go right and insert <span class="co-m">90</span>
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span><span class="co-r">------------</span><span class="co-w">++</span>
                <span class="co-m">18                          80</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span><span class="co-r">------</span><span class="co-w">+</span>
         <span class="co-m"> 9</span>             <span class="co-m">E</span>           <span class="co-o">E</span>              <span class="co-m">90</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>                <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-o">E         E   E         E                E         E</span>


<span class="co-m">20</span> is <span class="co-y">&lt;</span> than <span class="co-c">22</span>
    Go left and <span class="co-m">20</span> is <span class="co-y">&gt;</span> than <span class="co-m">18</span>
    Go right and insert <span class="co-m">20</span>
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span><span class="co-r">------------</span><span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18                          80</span>
          <span class="co-w">+</span>------<span class="co-w">+</span><span class="co-r">------</span><span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-m"> 9             20</span>           <span class="co-o">E</span>             <span class="co-m">90</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>                <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-o">E         E   E         E                E         E</span>
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Find</p>
                    <pre>Find node with key <span class="co-m">k</span></pre>
                    <pre>Start at <span class="co-c">Root</span> r</pre>
                    <pre>    If <span class="co-m">k</span> <span class="co-y">= key</span>(<span class="co-m">r</span>)</pre>
                    <pre>        return r</pre>
                    <pre>    If <span class="co-m">k</span> <span class="co-y">&lt; key</span>(<span class="co-m">r</span>)</pre>
                    <pre>        Continue in <span class="co-y">Left subtree</span></pre>
                    <pre>    If <span class="co-m">k</span> <span class="co-y">&gt; key</span>(<span class="co-m">r</span>)</pre>
                    <pre>        Continue in <span class="co-y">Right subtree</span></pre>
                    <pre>Runtime is <span class="co-m">O(h)</span></pre>
                    <pre>    <span class="co-m">h</span> is the height of the tree</pre>
<h5 class="text-center co-c">Example:</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Find <span class="co-m">20</span>


<span class="co-m">20</span> is <span class="co-y">&lt;</span> than <span class="co-c">22</span>
    Go left and <span class="co-m">20</span> is <span class="co-y">&gt;</span> than <span class="co-m">18</span>
    Go right and return <span class="co-m">20</span>
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span><span class="co-r">------------</span><span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18                          80</span>
          <span class="co-w">+</span>------<span class="co-w">+</span><span class="co-r">------</span><span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-m"> 9             20</span>           <span class="co-o">E</span>             <span class="co-m">90</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>                <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-o">E         E   E         E                E         E</span>
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Delete</p>
                    <pre>Delete node with key <span class="co-m">k</span></pre>
                    <pre>Let <span class="co-m">n</span> be the position of <span class="co-y">FindElement</span>(<span class="co-m">k</span>)</pre>
                    <pre>Remove n without creating &quot;separation&quot; of the tree</pre>
                    <pre><span class="co-c">Case 1</span>:</pre>
                    <pre>    <span class="co-m">n</span> has at least one external child</pre>
                    <pre><span class="co-c">Case 2</span>:</pre>
                    <pre>    <span class="co-m">n</span> has two children with internal nodes</pre>
                    <pre>Runtime is <span class="co-m">O(h)</span></pre>
                    <pre>    <span class="co-m">h</span> is the height of the tree</pre>
                    <h5 class="text-center co-c">Case 1a: Two External Children</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Delete <span class="co-r">9</span>


<span class="co-r">9</span> has two external children
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18                          80</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-r"> 9</span>             <span class="co-m">20</span>           <span class="co-o">E</span>             <span class="co-m">90</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>                <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-o">E         E   E         E                E         E</span>


                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18                          80</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-r"> E</span>             <span class="co-m">20</span>           <span class="co-o">E</span>             <span class="co-m">90</span>
                   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>                <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
                   <span class="co-o">E         E                E         E</span>
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>

                    <h5 class="text-center co-c">Case 1b: Child Is Interal Node</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Delete <span class="co-r">80</span>
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18</span>                          <span class="co-r">80</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-o"> E</span>             <span class="co-m">20</span>           <span class="co-o">E</span>             <span class="co-m">90</span>
                   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>                <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
                   <span class="co-o">E         E                E         E</span>


                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">18</span>                          <span class="co-r">90</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-o"> E</span>             <span class="co-m">20</span>           <span class="co-o">E             E</span>
                   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
                   <span class="co-o">19         E</span>
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>

                    <h5 class="text-center co-c">Case 2: Two Internal Children</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Delete <span class="co-r">18</span>
Find first internal node m (<span class="co-t">19</span>)
    that follows n (<span class="co-r">18</span>)
    using inorder traversal

                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-r">18</span>                          <span class="co-m">90</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-m"> 9             20</span>           <span class="co-o">E             E</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>    <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-o">E         E</span>    <span class="co-t">19</span>         <span class="co-o">E</span>
              <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
              <span class="co-o">E         E</span>

Replace n (<span class="co-r">18</span>) with m (<span class="co-t">19</span>)

                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-t">19</span>                          <span class="co-m">90</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-m"> 9             20</span>           <span class="co-o">E             E</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-o">E         E   E         E</span>
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Performance</p>
                    <pre>Space used is <span class="co-m">O(n)</span></pre>
                    <pre>Runtime of all operations is <span class="co-m">O(h)</span></pre>
                    <pre>    <span class="co-m">h</span> is worse-case when BST has only left childern or only right children</pre>
                    <pre>    Worst-case: <span class="co-m">h</span> <span class="co-y">&#x2208;</span> <span class="co-m">O(n)</span></pre>
                    <h5 class="text-center co-c">Example Worse-Case:</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
                              <span class="co-c">22</span>
          <span class="co-w">      ++</span>------------<span class="co-w">++</span>------------<span class="co-w">++</span>
                <span class="co-m">19</span>                          <span class="co-o">E</span>
          <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
         <span class="co-m"> 9</span>             <span class="co-o">E</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">1</span>         <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E</span>
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ">Worse-Case Comparison</h3>
                    <hr>
                </div>
            </div>


            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">

                    <h5 class="text-center co-c">Dictionary Worse-Cases:</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">                          <span class="co-c">Unordered                Ordered</span>
Operation                 Log  Hash     Lookup     Binary   Balanced
                          File Table    Table      Search   Trees
                                                   Tree
<span class="co-y">size, isEmpty           </span><span class="co-m">  O(1) O(1)</span>   </span><span class="co-m">  O(1)        O(1)    O(1)</span>
<span class="co-y">keys, elements          </span><span class="co-m">  O(n) O(n)</span>   </span><span class="co-m">  O(n)        O(n)    O(n)</span>
<span class="co-y">findElement              </span><span class="co-m">  O(n)</span> <span class="co-t">O(n)</span>   <span class="co-m">  O(log(n))   O(n)    O(log(n))</span>
<span class="co-y">insertItem              </span><span class="co-m">  O(1)</span> <span class="co-t">O(n)</span>   <span class="co-m">  O(n)        O(h)    O(log(n))</span>
<span class="co-y">removeElement           </span><span class="co-m">  O(n)</span> <span class="co-t">O(n)</span>   <span class="co-m">  O(n)        O(h)    O(log(n))</span>
<span class="co-y">closestKey, closestElem</span><span class="co-m">   O(n) O(n)</span>   </span><span class="co-m">  O(log(n))   O(h)    O(log(n))</span>

<span class="co-t">Expected O(1) running time</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ">Questions</h3>
                    <hr>
                </div>
            </div>


            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <h5 class="text-center co-c">Two Questions:</h5>
<div class="exBoxCyan mb-4 " style="margin: auto;">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">1) Two sorted integer arrays <span class="co-c">A</span> and <span class="co-o">B</span>
    Every integer is unique in each array
    <span class="co-c">A</span> and <span class="co-c">B</span> are almost identical
    <span class="co-o">B</span> is missing one number
    Find the missing number in <span class="co-o">B</span>

    Index:  <span class="co-m">0  1  2  3  4  5  6  7  8  9   10</span>
    <span class="co-c">A    : -5 -3  0  2  3  4  5  8  10 15  100</span>
    <span class="co-o">B    : -5 -3  0  3  4  5  8  10 15 100</span>

    Let index i be middle index of array.
    <span class="co-r">if</span> <span class="co-c">A</span>[i] <span class="co-y">=</span> <span class="co-o">B</span>
        Numbers before are excluded
    Search area is the right side of array
    <span class="co-r">if </span> <span class="co-c">A</span>[i] <span class="co-y">!=</span> <span class="co-o">B</span>
        Numbers after are excluded
    Search area is left side of searched index
        But not past the middle element
    Repeat until <span class="co-y">!=</span> is next to <span class="co-y">==</span>


2) Given a sorted array <span class="co-c">A</span> of distinct integers
Determine if there exists an index i such that <span class="co-c">A</span>[i]</span> <span class="co-y">=</span> i

    Index:  <span class="co-m">0  1  2  3  4  5  6  7  8  9   10</span>
    <span class="co-c">A    : -5 -3  0  2  3  8  8  10 11 15  100</span>

        Let index i be middle index of array.
        <span class="co-r">if</span> i <span class="co-y">&lt;</span> <span class="co-c">A</span>[i]
            All right-side values are larger than their index
            Go left
        <span class="co-r">if</span> i <span class="co-y">&gt;</span> <span class="co-c">A</span>[i]
            All left-side values are smaller than their index
            Go right
</pre></td>
</tr></tbody></table>
</figure>
</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex mb-4 pl-5 pr-5 justify-content-between">
                    <a href=".\DictionaryHashTable.php" style="display: inline-block;">Dictionary Hash Tables</a>
                    <a href=".\RedBlackTrees.php" style="display: inline-block;">Red-Black Trees</a>
                </div>
            </div>
		</div>
		</div>
		</div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
	?>

</body>

</html>

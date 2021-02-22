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
            <div class="row mt-3">
			    <h2 class="col-12 heading mt-3 text-center">Priority Queues and Heaps</h2>
            </div>

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Priority Queues</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Stores a collection of <span class="co-c">(key, element)</span> pairs
                        <br>
                        - Some tasks are more important
                    </p>
                    <h5 class="text-center co-c">Main Methods</h5>
<div class="exBoxKelly ml-4 mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-g">Let k = key, e = element</span>
<span class="co-y">    insertItem</span>(k, e)
<span class="co-y">    removeMin</span>()      <span class="co-w">Removes/Returns element with smallest key</span>
<span class="co-y">    minKey</span>()         <span class="co-w">Returns smallest key</span>
<span class="co-y">    minElement</span>()     <span class="co-w">Returns element with smallest key</span>
<span class="co-y">    size</span>()
<span class="co-y">    isEmpty</span>()
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                    <pre>    <span class="co-kg">Applications</span>:</pre>
                    <pre>        Multithreading</pre>
                    <pre>        Triage</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Comparable Keys</p>
                    <br>
                    <pre>    Keys can be arbitrary objects on which a total order relation is defined</pre>
                    <pre>    <span class="co-kg">Comparator ADT</span>:</pre>
                    <pre>        Generic priority queue</pre>
                    <pre>        Encapsulates the action of comparing two objects</pre>
                    <pre>            Total order relation</pre>
                    <pre>        Comparator is external to the compared keys</pre>
                    <h5 class="text-center co-c">Functions</h5>
<div class="exBoxKelly mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-y">isLessThan<span class="co-g">(x,y)</span>
isLessThanOrEqualTo<span class="co-g">(x,y)</span>
isEqualTo<span class="co-g">(x,y)</span>
isGreaterThan<span class="co-g">(x,y)</span>
isGreaterThanOrEqualTo<span class="co-g">(x,y)</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Priority Queue Sorting</p>
                    <br>
                    <pre>    Insert elements one-by-one</pre>
                    <pre>        <span class="co-y">insertItem</span>(e<sub>1</sub>,e<sub>2</sub>)</pre>
                    <pre>    Remove elements in sorted order</pre>
                    <pre>        <span class="co-y">removeMin</span>()</pre>
                    <pre>    Running time depends on implementation</pre>
                    <h5 class="text-center co-c">Implementation</h5>
<div class="exBoxPurple mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Algorithm <span class="co-y">PQ-Sort</span>(S,C)
    <span class="co-c">Input</span>:  Sequence S, comparator C for elements of S
    <span class="co-c">Output</span>: Sequence S sorted (ASC) according to C
    P <span class="co-y">&lt;--</span> Priority queue with comparator C
    <span class="co-r">while</span> <span class="co-y">!</span>S.<span class="co-y">isEmpty</span>()
        e <span class="co-y">&lt;--</span> S.<span class="co-y">remove</span>(S.<span class="co-y">first</span>())
        P.<span class="co-y">insertItem</span>(e,e)
    <span class="co-r">while</span> <span class="co-y">!</span>P.<span class="co-y">isEmpty</span>()
        e <span class="co-y">&lt;--</span> P.<span class="co-y">removeMin</span>()
        S.<span class="co-y">insertLast</span>(e)
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Sequence Based Priority Queue</p>
                    <br>
                    <pre>    <span class="co-kg">Unsorted Sequence</span></pre>
                    <pre>        <span class="co-y">insertItem</span> takes <span class="co-m">O(1)</span> time</pre>
                    <pre>            Insert at beginning or end of the sequence</pre>
                    <pre>    <span class="co-kg">removeMin, minKey, minElement</span> take <span class="co-m">O(n)</span> time</pre>
                    <pre>            Traverse entire sequence to find smallest key</pre>
                    <pre>    <span class="co-kg">Sorted Sequence</pre>
                    <pre>        <span class="co-y">insertItem</span> takes <span class="co-m">O(n)</span> time</pre>
                    <pre>            Have to find the place where to insert element</pre>
                    <pre>    <span class="co-kg">removeMin, minKey, minElement</span> take <span class="co-m">O(1)</span> time</pre>
                    <pre>            Smallest key is at beginning of the sequence</pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Selection Sort</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Variation of PQ-sort
                        <br>
                        - Implemented with an unsorted sequence
                        <br>
                        - Runs in <span class="co-m">O(n<sup>2</sup>)</span>
                        <br>
                        - <a href="https://stackoverflow.com/tags/selection-sort/info">Stack Overflow: Selection Sort</a>
                    </p>
                    <img src=<?php echo '"' . $headerData["Path"] . 'img/SelectionSort.png"'; ?> alt="Selection Sort Graphic"
                         class="mx-auto d-block">
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Running Time</p>
                    <pre>    <span class="co-y">insertItem</span> with n insertions takes <span class="co-m">O(n)</span> time</pre>
                    <pre>    Remove elements in sorted order with n <span class="co-y">removeMin</span> operations takes</pre>
                    <pre>        <span class="co-m">1 + 2 + ... + n</span></pre>
                    <pre>    Bottleneck during selecting minimum element</pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Insertion Sort</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Variation of PQ-sort
                        <br>
                        - Implemented with a sorted sequence
                        <br>
                        - Runs in <span class="co-m">O(n<sup>2</sup>)</span>
                    </p>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Running Time</p>
                    <pre>    <span class="co-y">insertItem</span> with n insertion operations takes</pre>
                    <pre>        <span class="co-m">1 + 2 + ... + n</span></pre>
                    <pre>    Remove elements in sorted order with n <span class="co-y">removeMin</span> operations takes <span class="co-m">O(n)</span> time</pre>
                    <pre>    Bottleneck during insert</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">In-Place Insertion Sort</p>
                    <pre>    Forgo an external data structure</pre>
                    <pre>        Implement selection sort and insertion sort in-place</pre>
                    <pre>    Part of the sequence is the priority queue</pre>
                    <pre>    Keep initial portion sorted</pre>
                    <pre>    Use <span class="co-y">swapElements</span> versus making a new sequence</pre>
                    <pre>    <a href="https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-3.php">w3resource: Insertion Sort</a></pre>
                    <pre>        <span class="co-o">Link for next two images (PHP)</span></pre>
                    <img src=<?php echo '"' . $headerData["Path"] . 'img/SelectionSort.png"'; ?> alt="Selection Sort Graphic"
                         class="mx-auto d-block">
                    <img src=<?php echo '"' . $headerData["Path"] . 'img/InsertionSortAnim.gif"'; ?> alt="Insertion Sort QR" class="mx-auto d-block mt-4">
                    </p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 text-center">
                    <p class="co-c">Insertion Sort (with Bubble Sort)</p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/TZRWRjq2CAg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Heap-Based Priority Queue</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Heap</p>
                    <pre>    Binary tree that:</pre>
                    <pre>        Stores keys in internal nodes</pre>
                    <pre>        <span class="co-kg">Heap-Order</span>:</pre>
                    <pre>            <span class="co-y">key</span>(v) <span class="co-o">&#x2265;</span> <span class="co-y">key</span>(<span class="co-y">parent</span>(v))</pre>
                    <pre>            For every interal node v except the root</pre>
                    <pre>        <span class="co-kg">Complete Binary Tree</span>:</pre>
                    <pre>            Let h = height</pre>
                    <pre>            for <span class="co-m">i = 0 ,..., h - 2</span>, there are <span class="co-m">2<sup>i</sup></span> of depth <span class="co-m">i</span></pre>
                    <pre>            Depth <span class="co-m">h - 1</span>, internal nodes are left of external nodes</pre>
                    <pre>    Last node is the rightmost internal node of depth <span class="co-m">h - 1</span></pre>
<h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
              <span class="co-m">       1</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       2                 3</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">4             5     </span><span class="co-o">E         E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>

Therefore, the <span class="co-y">last node</span> is <span class="co-m">5</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Height of Heap</p>
                    <pre>    Complete binary tree</pre>
                    <pre>    <span class="co-y">Theorem</span>:</pre>
                    <pre>        A heap storing n keys has height <span class="co-m">O(log(n))</span></pre>
                    <pre>            Let h = height, n = keys</pre>
                    <pre>            <span class="co-m">2<sup>i</sup></span> keys at depth <span class="co-m">i = 0 ,..., h - 2</span></pre>
                    <pre>            Minimum of one key at depth <span class="co-m">h - 1</span>,</pre>
                    <pre>            <span class="co-m">n &#x2265; 1 + 2 + 4 + ... + 2<sup>h-2</sup> + 1</span></pre>
                    <pre>            So, <span class="co-m">n &#x2265; 2<sup>h-1</sup></span>, that is, <span class="co-m"> h &#x2264; log(n) + 1</span></pre>
<h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Depth     Keys
  <span class="co-y">0        1</span>    <span class="co-c">                          Root</span>
     <span class="co-w">                         +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
  <span class="co-y">1        2</span>           <span class="co-c">       &#x25C9;                         &#x25C9;</span>
                       <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
 <span class="co-y">h-2      2<sup>h-2</sup>         </span><span class="co-c">&#x25C9;             &#x25C9;            &#x25C9;            &#x25C9;</span>
                  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
 <span class="co-y">h-1       1</span>      <span class="co-c">&#x25C9;</span>         <span class="co-o">E   E         E  E         E   E         E</span>
              <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
               <span class="co-o">E      E</span>

h <span class="co-y">=</span> <span class="co-m">4</span>, n <span class="co-y">=</span> <span class="co-m">8</span>
<span class="co-m">8</span> <span class="co-y">&#x2265;</span> <span class="co-m">2<sup>3</sup></span>
<span class="co-m">4</span> <span class="co-y">&#x2264; log</span>(<span class="co-m">8</span>) <span class="co-y">+</span> <span class="co-m">1</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Heaps and Priority Queues</p>
                    <pre>    Priority queue uses heap</pre>
                    <pre>    Keep track of <span class="co-r">last node</span>'s position</pre>
                    <pre>    Store <span class="co-c">(key, element)</span> item in each internal node</pre>
                    <pre>        <span class="co-o">element not shown in examples</span></pre>
<h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
              <span class="co-m">       2</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       5                 6</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">9</span>             <span class="co-r">7</span>     <span class="co-o">E         E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">insertItem(k,e)</p>
                    <pre>    Find new <span class="co-r">last node Z</span></pre>
                    <pre>    Store k at <span class="co-r">Z</span>, and make <span class="co-r">Z</span> an internal node</pre>
                    <pre>    Restore heap-order</pre>
<h5 class="text-center co-c">Example: insertItem(1,Elem)</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Find new last node <span class="co-r">Z</span>
              <span class="co-m">       2</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       5                 6</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">9             7</span>     <span class="co-r">Z</span>         <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>


Store k at <span class="co-r">Z</span>
              <span class="co-m">       2</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       5                 6</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">9             7</span>     <span class="co-r">1</span>         <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>

Restore heap-order below
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Heapify Upward</p>
                    <pre>    Heap-order may be violated after insertion</pre>
                    <pre>    <span class="co-kg">upheap</span>: Restores heap-order</pre>
                    <pre>        Swaps k with its parent node (upward path)</pre>
                    <pre>    Finish when k is Root or parent is &#x2264; k</pre>
                    <pre>    Runs in <span class="co-m">O(log(n))</span></pre>
<h5 class="text-center co-c">Example: insertItem(1,Elem)</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Since <span class="co-m">1</span> is less than its parent, swap
              <span class="co-m">       2</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       5                 1</span> <span class="co-w">&lt;---</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">9             7</span>     <span class="co-r">6</span> <span class="co-w">&lt;---</span>    <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>


Since <span class="co-m">1</span> is less than its parent (again), swap
              <span class="co-m">       1</span> <span class="co-w">&lt;---</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       5                 2</span> <span class="co-w">&lt;---</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">9             7</span>     <span class="co-r">6</span>         <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Removal</p>
                    <pre>    Replace root key with key of <span class="co-r">Z</span></pre>
                    <pre>    Compress <span class="co-r">Z</span> and its children into a single leaf</pre>
                    <pre>    Restore heap-order</pre>
<h5 class="text-center co-c">Example: removeMin()</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Remove <span class="co-m">1</span>

Swap <span class="co-m">1</span> and <span class="co-r">6</span>
              <span class="co-m">       6</span> <span class="co-w">&lt;---</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       5                 2</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">9             7</span>     <span class="co-r">1</span> <span class="co-w">&lt;---</span>    <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>


Replace <span class="co-r">1</span> with leaf
Make <span class="co-m">7</span> the new <span class="co-r">Z</span>
              <span class="co-m">       6</span>
     <span class="co-w">       +</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">       5                 2</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">9</span>             <span class="co-r">7</span> <span class="co-w">&lt;--</span> <span class="co-o">E</span> <span class="co-w">&lt;---</span>    <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>

Restore heap-order below
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex mb-4 pl-5 pr-5 justify-content-between">
                    <a href=".\DictionaryHashTable.php" style="display: inline-block;">Dictionary Hash Tables</a>
                    <a href="#" style="display: inline-block;">Next Lecture</a>
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

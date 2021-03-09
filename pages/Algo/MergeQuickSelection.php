<?php

    session_start();

	$article = "Merge Quick Selection";
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
                    <pre><span class="co-kg">Applications</span>:</pre>
                    <pre>    Multithreading</pre>
                    <pre>    Triage</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Comparable Keys</p>
                    <br>
                    <pre>Keys can be arbitrary objects on which a total order relation is defined</pre>
                    <pre><span class="co-kg">Comparator ADT</span>:</pre>
                    <pre>    Generic priority queue</pre>
                    <pre>    Encapsulates the action of comparing two objects</pre>
                    <pre>        Total order relation</pre>
                    <pre>    Comparator is external to the compared keys</pre>
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
                    <pre>Insert elements one-by-one</pre>
                    <pre>    <span class="co-y">insertItem</span>(e<sub>1</sub>,e<sub>2</sub>)</pre>
                    <pre>Remove elements in sorted order</pre>
                    <pre>    <span class="co-y">removeMin</span>()</pre>
                    <pre>Running time depends on implementation</pre>
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
                    <pre><span class="co-kg">Unsorted Sequence</span></pre>
                    <pre>    <span class="co-y">insertItem</span> takes <span class="co-m">O(1)</span> time</pre>
                    <pre>        Insert at beginning or end of the sequence</pre>
                    <pre><span class="co-kg">removeMin, minKey, minElement</span> take <span class="co-m">O(n)</span> time</pre>
                    <pre>        Traverse entire sequence to find smallest key</pre>
                    <pre><span class="co-kg">Sorted Sequence</pre>
                    <pre>    <span class="co-y">insertItem</span> takes <span class="co-m">O(n)</span> time</pre>
                    <pre>        Have to find the place where to insert element</pre>
                    <pre><span class="co-kg">removeMin, minKey, minElement</span> take <span class="co-m">O(1)</span> time</pre>
                    <pre>        Smallest key is at beginning of the sequence</pre>
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
                        - Runs in <span class="co-m">O(n<sup class="co-c">2</sup>)</span>
                        <br>
                        - <a href="https://stackoverflow.com/tags/selection-sort/info">Stack Overflow: Selection Sort</a>
                    </p>
                    <img src=<?php echo '"' . $headerData["Path"] . 'img/Algo/SelectionSort.png"'; ?> alt="Selection Sort Graphic"
                         class="mx-auto d-block">
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Running Time</p>
                    <pre><span class="co-y">insertItem</span> with <span class="co-m">n</span> insertions takes <span class="co-m">O(n)</span> time</pre>
                    <pre>Remove elements in sorted order with <span class="co-m">n</span> <span class="co-y">removeMin</span> operations takes</pre>
                    <pre>    <span class="co-m">1 + 2 + ... + <span class="co-m">n</span></span></pre>
                    <pre>Bottleneck during selecting minimum element</pre>
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
                        - Runs in <span class="co-m">O(n<sup class="co-c">2</sup>)</span>
                    </p>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Running Time</p>
                    <pre><span class="co-y">insertItem</span> with <span class="co-m">n</span> insertion operations takes</pre>
                    <pre>    <span class="co-m">1 + 2 + ... + <span class="co-m">n</span></span></pre>
                    <pre>Remove elements in sorted order with <span class="co-m">n</span> <span class="co-y">removeMin</span> operations takes <span class="co-m">O(n)</span> time</pre>
                    <pre>Bottleneck during insert</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">In-Place Insertion Sort</p>
                    <pre>Forgo an external data structure</pre>
                    <pre>    Implement selection sort and insertion sort in-place</pre>
                    <pre>Part of the sequence is the priority queue</pre>
                    <pre>Keep initial portion sorted</pre>
                    <pre>Use <span class="co-y">swapElements</span> versus making a new sequence</pre>
                    <pre><a href="https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-3.php">w3resource: Insertion Sort</a></pre>
                    <pre>    <span class="co-o">Link for next two images (PHP)</span></pre>
                    <img src=<?php echo '"' . $headerData["Path"] . 'img/Algo/SelectionSort.png"'; ?> alt="Selection Sort Graphic"
                         class="mx-auto d-block">
                    <img src=<?php echo '"' . $headerData["Path"] . 'img/Algo/InsertionSortAnim.gif"'; ?> alt="Insertion Sort QR" class="mx-auto d-block mt-4">
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
                    <pre>Binary tree that:</pre>
                    <pre>    Stores keys in internal nodes</pre>
                    <pre>    <span class="co-kg">Heap-Order</span>:</pre>
                    <pre>        <span class="co-y">key</span>(<span class="co-m">v</span>) <span class="co-o">&#x2265;</span> <span class="co-y">key</span>(<span class="co-y">parent</span>(<span class="co-m">v</span>))</pre>
                    <pre>        For every interal node <span class="co-m">v</span> except the root</pre>
                    <pre>    <span class="co-kg">Complete Binary Tree</span>:</pre>
                    <pre>        Let <span class="co-m">h</span> = height</pre>
                    <pre>        for <span class="co-m">i = 0 ,..., h - 2</span>, there are <span class="co-m">2<sup class="co-c">i</sup></span> of depth <span class="co-m">i</span></pre>
                    <pre>        Depth <span class="co-m">h - 1</span>, internal nodes are left of external nodes</pre>
                    <pre>Last node is the rightmost internal node of depth <span class="co-m">h - 1</span></pre>
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
                    <pre>Complete binary tree</pre>
                    <pre><span class="co-y">Theorem</span>:</pre>
                    <pre>    A heap storing <span class="co-m">n</span> keys has height <span class="co-m">O(log(n))</span></pre>
                    <pre>        Let <span class="co-m">h</span> = height, <span class="co-m">n</span> = keys</pre>
                    <pre>        <span class="co-m">2<sup class="co-c">i</sup></span> keys at depth <span class="co-m">i = 0 ,..., h - 2</span></pre>
                    <pre>        Minimum of one key at depth <span class="co-m">h - 1</span>,</pre>
                    <pre>        <span class="co-m">n &#x2265; 1 + 2 + 4 + ... + 2<sup class="co-c">h-2</sup> + 1</span></pre>
                    <pre>        So, <span class="co-m">n &#x2265; 2<sup class="co-c">h-1</sup></span>, that is, <span class="co-m"> h &#x2264; log(n) + 1</span></pre>
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
 <span class="co-y">h-2      2<sup class="co-c">h-2</sup>         </span><span class="co-c">&#x25C9;             &#x25C9;            &#x25C9;            &#x25C9;</span>
                  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
 <span class="co-y">h-1       1</span>      <span class="co-c">&#x25C9;</span>         <span class="co-o">E   E         E  E         E   E         E</span>
              <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
               <span class="co-o">E      E</span>

h <span class="co-y">=</span> <span class="co-m">4</span>, <span class="co-m">n</span> <span class="co-y">=</span> <span class="co-m">8</span>
<span class="co-m">8</span> <span class="co-y">&#x2265;</span> <span class="co-m">2<sup class="co-c">3</sup></span>
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
                    <pre>Priority queue uses heap</pre>
                    <pre>Keep track of <span class="co-r">last node</span>'s position</pre>
                    <pre>Store <span class="co-c">(key, element)</span> item in each internal node</pre>
                    <pre>    <span class="co-o">element not shown in examples</span></pre>
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
                    <pre>Find new <span class="co-r">last node Z</span></pre>
                    <pre>Store <span class="co-m">k</span> at <span class="co-r">Z</span>, and make <span class="co-r">Z</span> an internal node</pre>
                    <pre>Restore heap-order</pre>
<h5 class="text-center co-c">Example: insertItem(1,Elem)</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Find new last node <span class="co-r">Z</span>
              <span class="co-m">           2</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
     <span class="co-m">       5                          6</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-m">9             7</span>            <span class="co-r">Z</span>             <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E  E         E</span>


Store k at <span class="co-r">Z</span>
              <span class="co-m">           2</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
     <span class="co-m">       5                          6</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-m">9             7</span>            <span class="co-r">1</span>             <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E  E         E</span>

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
                    <pre>Heap-order may be violated after insertion</pre>
                    <pre><span class="co-kg">upheap</span>: Restores heap-order</pre>
                    <pre>    Swaps <span class="co-m">k</span> with its parent node (upward path)</pre>
                    <pre>Finish when <span class="co-m">k</span> is Root or parent is &#x2264; <span class="co-m">k</span></pre>
                    <pre>Runs in <span class="co-m">O(log(n))</span></pre>
<h5 class="text-center co-c">Example: insertItem(1,Elem)</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Since <span class="co-m">1</span> is less than its parent, swap
              <span class="co-m">           2</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
     <span class="co-m">       5                          1</span> <span class="co-w">&lt;---</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-m">9             7</span>            <span class="co-r">6</span> <span class="co-w">&lt;---</span>        <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E  E         E</span>


Since <span class="co-m">1</span> is less than its parent (again), swap
              <span class="co-m">           1</span> <span class="co-w">&lt;---</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
     <span class="co-m">       5                          2</span> <span class="co-w">&lt;---</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-m">9             7</span>            <span class="co-r">6</span>             <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E  E         E</span>
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
                    <pre>Replace root key with key of <span class="co-r">Z</span></pre>
                    <pre>Compress <span class="co-r">Z</span> and its children into a single leaf</pre>
                    <pre>Restore heap-order</pre>
<h5 class="text-center co-c">Example: removeMin()</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Remove <span class="co-m">1</span>

Swap <span class="co-m">1</span> and <span class="co-r">6</span>
              <span class="co-m">           6</span> <span class="co-w">&lt;---</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
     <span class="co-m">       5                          2</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-m">9             7</span>            <span class="co-r">1</span> <span class="co-w">&lt;---</span>         <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E  E         E</span>


Replace <span class="co-r">1</span> with leaf
The leaf is still the last node <span class="co-r">Z</span> (for now)
              <span class="co-m">           6</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
     <span class="co-m">       5                          2</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-m">9             7</span>            <span class="co-r">E</span> <span class="co-w">&lt;---</span>         <span class="co-o">E</span>
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
                    <p class="co-c text-center">Heapify Downward</p>
                    <pre>Replacing root key with the <span class="co-r">last node</span>'s key, heap-order may be violated</pre>
                    <pre><span class="co-kg">downheap</span>: Restores heap-order</pre>
                    <pre>    Swaps <span class="co-m">k</span> with the key of its smallest child (downward path)</pre>
                    <pre>Finish when <span class="co-m">k</span> is a leaf or child keys are <span class="co-o">&#x2265;</span> <span class="co-m">k</span></pre>
                    <pre>Runs in <span class="co-m">O(log(n))</span></pre>
<h5 class="text-center co-c">Example: removeMin()</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Remove <span class="co-m">1</span>

Swap <span class="co-m">6</span> and <span class="co-m">2</span>
              <span class="co-m">           2</span> <span class="co-w">&lt;---</span>
     <span class="co-w">       +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
     <span class="co-m">       5                          6</span> <span class="co-w">&lt;---</span>
     <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
     <span class="co-m">9             7</span>            <span class="co-r">E</span> <span class="co-w">&lt;---</span>         <span class="co-o">E</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-o">E         E   E         E</span>

Node with key <span class="co-m">6</span> has two leaf nodes as children
No more actions need to take place to correct heap-order
Last node now needs to be found (below is the pseudocode)
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Find New Last Node (Insertion)</p>
                    <pre>Traverse path of <span class="co-m">O(log(n))</span> nodes:</pre>
                    <pre>    While current node is <span class="co-y">right child</span>, go to parent</pre>
                    <pre>    If current node is <span class="co-y">left child</span>, go to parent's <span class="co-y">right child</span></pre>
                    <pre>    While current node is internal, go to <span class="co-y">left child</span></pre>
                    <pre>Akin to updating last node after removal</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Find New Last Node (Removal)</p>
                    <pre>Traverse path of <span class="co-m">O(log(n))</span> nodes:</pre>
                    <pre>    While current node is left, go to parent</pre>
                    <pre>    If current node is <span class="co-y">right child</span>, go to parent's <span class="co-y">left child</span></pre>
                    <pre>    While current node is internal, go to <span class="co-y">right child</span></pre>
                    <pre>Akin to updating last node after removal</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Heap Sort</p>
                    <pre>Priority queue with <span class="co-m">n</span> items via a heap</pre>
                    <pre><span class="co-m">O(n)</span> space</pre>
                    <pre><span class="co-kg">insertItem, removeMin</span> take <span class="co-m">O(log(n))</span> time</pre>
                    <pre><span class="co-kg">isEmpty, minKey, minElement</span> take <span class="co-m">O(1)</span> time</pre>
                    <pre>Sort <span class="co-m">n</span> elements in <span class="co-m">O(nlog(n))</span> time (faster then quadratic algorithems)</pre>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 text-center">
                    <p class="co-c">Heap / Heap Sort</p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/H5kAcmGOn4Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Misc Heap Info</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Vector-based Heap</p>
                    <pre>Heap with <span class="co-m">n</span> keys uses vector of length <span class="co-m">n + 1</span></pre>
                    <pre>    <span class="co-o">{Start at index 1}</span></pre>
                    <pre>Node at rank <span class="co-m">i</span>:</pre>
                    <pre>    <span class="co-y">Left child</span> is rank <span class="co-m">2i</span></pre>
                    <pre>    <span class="co-y">Right child</span> is rank <span class="co-m">2i + 1</span></pre>
                    <pre>No links nor leaves</pre>
                    <pre>Last node is at rank <span class="co-m">n</span></pre>
                    <pre>    <span class="co-kg">insertItem</span> inserts at rank <span class="co-m">n + 1</span></pre>
                    <pre>    <span class="co-kg">removeMin</span> removes at rank <span class="co-m">n</span></pre>
                    <pre>        Swap root with last node</pre>
                    <pre>In-place Heap-sort</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Bottom-Up Heap Construction</p>
                    <pre>All keys already known:</pre>
                    <pre>    Build heap recursively</pre>
                    <pre><span class="co-o">{A heap with only the root node has HEIGHT 1}</span></pre>
                    <pre>Example:</pre>
                    <pre>    Number of keys <span class="co-m">n</span> <span class="co-o">=</span> <span class="co-m">2<sup class="co-c">h</sup> - 1</span> (Complete Heap)</pre>
                    <pre>    Each depth <span class="co-m">i</span> <span class="co-o">=</span> <span class="co-m">0,...,h - 2</span> has <span class="co-m">2<sup class="co-c">i</sup></span> internal nodes</pre>
                    <pre>Build heap bottom-up with <span class="co-m">log(n)</span> phases</pre>
                    <pre>Phase <span class="co-m">i</span>:</pre>
                    <pre>    Pairs of heaps with <span class="co-m">2<sup class="co-c">i</sup> - 1</span> keys are merged with <span class="co-m">2<sup class="co-c">i+1</sup> - 1</span> keys</pre>
                    <pre>    <span class="co-o">{Each sub-heap has this property}</span></pre>
<h5 class="text-center co-c">Bottom-Up Heap</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre><?php $STRING = <<<'EOD'
``TInternal Nodes``E ``Y=``E ``GNum of nodes on current level``E
``THeap Pairs``E ``Y=``E ``GAccumulation of nodes from current
             level to level right below the``E ``CROOT``E
``TTotal Keys``E ``Y=``E ``GCurrent level on up``E

``G``W+``E-----``W+``E------------``W+``E--------------``W+``E-------------``W+``E
|  i  ``G|``E  Internal  ``G|``E  Heap Pairs  ``G|``E    Total    ``G|``E
``G|``E     ``G|``E   Nodes    ``G|``E  w/ __ keys  ``G|``E    Keys     ``G|``E
``W+``E-----``W+``E------------``W+``E--------------``W+``E-------------``W+``E``E
``M``G|``E  0  ``G|``E   2``SC0``SE ``Y=``E 1   ``G|``E   2``SC0``SE-1 ``Y=``E 0   ``G|``E  2``SC0+1``SE-1 ``Y=``E 1  ``G|``E
``G|``E  1  ``G|``E   2``SC1``SE ``Y=``E 2   ``G|``E   2``SC1``SE-1 ``Y=``E 1   ``G|``E  2``SC1+1``SE-1 ``Y=``E 3  ``G|``E
``G|``E  2  ``G|``E   2``SC2``SE ``Y=``E 4   ``G|``E   2``SC2``SE-1 ``Y=``E 3   ``G|``E  2``SC2+1``SE-1 ``Y=``E 7  ``G|``E
``G|``E  3  ``G|``E   2``SC3``SE ``Y=``E 8   ``G|``E   2``SC3``SE-1 ``Y=``E 7   ``G|``E  2``SC3+1``SE-1 ``Y=``E 15 ``G|``E
``G|``E h-2 ``G|``E    2``SCh-2``SE    ``G||``E    2``SCh-2``SE-1    ``G|``E   2``SCh-2+1 ``SE-1   ``G|``E``E
``G``W+``E-----``W+``E------------``W+``E--------------``W+``E-------------``W+``E

n ``Y=``E ``M15``E | i ``Y=``E ``M2``E | h ``Y=``E ``M5``E (Leaf level + 4 levels above)
``CRoot Node``E | ``RSub-Heap 1``E | ``OSub-heap 2``E | Leaf Nodes

``C1)``E When i ``Y=``E ``M0``E, put ``CRoot Node``E
``T2)``E When i ``Y=``E ``M1``E, attach level ``M1``E to ``CRoot Node``E
``Y3)``E When i ``Y=``E ``M2``E, attach level ``M2``E to above tree
``W4)``E When i ``Y=``E ``M3``E, attach level ``M3``E to above tree

``C1)``E                   ``C*``E                   ``CLEVEL: 0``E
``T2)``E          ``R*``E        |        ``O*``E          ``TLEVEL: 1``E
``Y3)``E     ``R*        *``E    |    ``O*        *``E     ``YLEVEL: 2``E
``W4)``E   ``R*   *    *   *``E  |  ``O*   *    *   *``E   ``WLEVEL: 3``E
    * * * *  * * * * | * * * *  * * * *  LEVEL: 4
``E
EOD;

$lookFor = array("``T", "``C", "``SC", "``G", "``M", "``O", "``R", "``W", "``Y", "``E", "``SE");
$replaceWith = array('<span class="co-t">', '<span class="co-c">', '<sup class="co-c">', '<span class="co-g">', '<span class="co-m">', '<span class="co-o">',
                     '<span class="co-r">', '<span class="co-w">', '<span class="co-y">', '</span>', '</sup>');
echo str_replace($lookFor, $replaceWith, $STRING); ?>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Merging Two Heaps</p>
                    <pre>We are given two heaps and a key <span class="co-m">k</span></pre>
                    <pre>Create new heap with <span class="co-c">Root Node</span> storing <span class="co-m">k</span> and with two heaps as subtrees</pre>
                    <pre>Perform <span class="co-kg">downheap</span> to restore heap-order</pre>
<h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
ORIGINAL
                               <span class="co-c">&#x25C9;</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">&#x25C9;                                &#x25C9;</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
       <span class="co-c">&#x25C9;              &#x25C9;                &#x25C9;              &#x25C9;</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       15      4       12       6       9      23       20</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-o">E     E E     E E     E E     E  E     E E     E E     E E     E</span>


ADD <span class="co-r">"Root Nodes"</span>
                               <span class="co-c">&#x25C9;</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">&#x25C9;                                &#x25C9;</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
      <span class="co-r">25               5                11              27</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       15      4       12       6       9      23       20</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-o">E     E E     E E     E E     E  E     E E     E E     E E     E</span>


HEAPIFY (SWAP 15/25, 4/5, 6/11, 20/27)
                               <span class="co-c">&#x25C9;</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">&#x25C9;                                &#x25C9;</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
      <span class="co-r">15               4                6               20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       <span class="co-r">25      5</span>       12      <span class="co-r">11</span>       9      23       <span class="co-r">27</span></span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-o">E     E E     E E     E E     E  E     E E     E E     E E     E</span>


ADD <span class="co-r">"Root Nodes"</span>
                               <span class="co-c">&#x25C9;</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-r">7                                8</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
      <span class="co-c">15               4                6               20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25      5       12      11       9      23       27</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-o">E     E E     E E     E E     E  E     E E     E E     E E     E</span>


HEAPIFY (SWAP 7/4, 7/5, 6/8)
                               <span class="co-c">&#x25C9;</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-r">4                                6</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
      <span class="co-c">15               <span class="co-r">5</span>                <span class="co-r">8</span>               20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25      <span class="co-r">7</span>       12      11       9      23       27</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-o">E     E E     E E     E E     E  E     E E     E E     E E     E</span>


ADD <span class="co-r">Root Node</span>
                               <span class="co-r">10</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c">4                                6</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
      <span class="co-c">15               5                8               20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25      7       12      11       9      23       27</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-o">E     E E     E E     E E     E  E     E E     E E     E E     E</span>


HEAPIFY (SWAP 10/4, 10/5, 10/7)
                                <span class="co-r">4</span>
               <span class="co-w">+</span>---------------<span class="co-w">++</span>---------------<span class="co-w">+</span>
               <span class="co-c"><span class="co-r">5</span>                                6</span>
       <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>                <span class="co-w">+</span>-------<span class="co-w">++</span>------<span class="co-w">+</span>
      <span class="co-c">15               <span class="co-r">7</span>                8               20</span>
   <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>        <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>       <span class="co-w">+</span>---<span class="co-w">+</span>---<span class="co-w">+</span>
  <span class="co-c">16       25     <span class="co-r">10</span>       12      11       9      23       27</span>
<span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>  <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span> <span class="co-w">+</span>--<span class="co-w">+</span>--<span class="co-w">+</span>
<span class="co-o">E     E E     E E     E E     E  E     E E     E E     E E     E</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Analysis</p>
                    <pre>Worst-Case of <span class="co-kg">downheap</span> with <span class="co-y">proxy path</span></pre>
                    <pre>    Goes right then left until bottom of heap</pre>
                    <pre>Each node is traversed by at most two <span class="co-y">proxy paths</span></pre>
                    <pre>    Total number of nodes of proxy paths is <span class="co-m">O(n)</span></pre>
                    <pre>Bottom-Up heap construction is <span class="co-m">O(n)</span> time</pre>
                    <pre>    Faster than <span class="co-m">n</span> successive insertions</pre>
                    <pre>    Speeds up first phase of heap-sort</pre>
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

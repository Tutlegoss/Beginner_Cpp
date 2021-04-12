<?php

    session_start();

	$article = "Merge Quick Selection";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
		<div class="row mt-4">
		    <div class="col-12">
			    <h2 class="heading mt-3 text-center">Sets</h2>
            </div>
        </div>

		<div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4">Set ADT</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p>- Collection of <span class="co-s">unordered, distinct</span> objects
                    <br>
                    - No defined ordering present, but can be sorted to increase efficiency
                    <br>
                    - Implemented via merge sort (generic)
                    <br>
                    - Running time of an operation should only be up to <span class="co-m">O(n<sub>A</sub>+n<sub>B</sub>)</span>
                    <br>
                    - Use a List for storage
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Main Operations</h5>
<div class="exBoxKelly">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-g"><span class="co-y">union</span>(B)         <span class="co-w"><em>A</em> &lt;--- A &#x222A; B</span>
<span class="co-y">intersect</span>(B)     <span class="co-w"><em>A</em> &lt;--- A &#x2229; B</span>
<span class="co-y">subtract</span>(B)      <span class="co-w"><em>A</em> &lt;--- A -- B</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Generic Merging</p>
                <br>
                <pre>Generalized merge of two sorted lists <span class="co-c"><em>A</em></span> and <span class="co-c"><em>B</em></span></pre>
                <pre>Methods:</pre>
                <pre>    <span class="co-y">aIsLess</span></pre>
                <pre>    <span class="co-y">bIsLess</span></pre>
                <pre>    <span class="co-y">bothAreEqual</span></pre>
                <pre>Methods are used to place element into a Set</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Generic Merge</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">genericMerge</span>(A,B)
    <span class="co-c">S</span> <span class="co-y">&lt;--</span> Empty Sequence
    <span class="co-r">while</span> NOT A.<span class="co-y">isEmpty</span>( ) <span class="co-y">&#x22C0;</span> NOT B.<span class="co-y">isEmpty</span>( )
        a <span class="co-y">&lt;--</span> A.<span class="co-y">first</span>( ).<span class="co-y">element</span>( )
        b <span class="co-y">&lt;--</span> B.<span class="co-y">first</span>( ).<span class="co-y">element</span>( )
        <span class="co-r">if</span> a <span class="co-y">&lt;</span> b
            <span class="co-y">aIsLess</span>(a,<span class="co-c">S</span>);
            A.<span class="co-y">remove</span>(A.<span class="co-y">first</span>( ))
        <span class="co-r">if</span> b <span class="co-y">&lt;</span> a
            <span class="co-y">bIsLess</span>(b,<span class="co-c">S</span>);
            B.<span class="co-y">remove</span>(B.<span class="co-y">first</span>( ))
        <span class="co-r">else</span>
            <span class="co-y">bothAreEqual</span>(a,b,<span class="co-c">S</span>)
            A.<span class="co-y">remove</span>(A.<span class="co-y">first</span>( ))
            B.<span class="co-y">remove</span>(B.<span class="co-y">first</span>( ))
    <span class="co-r">white</span> NOT A.<span class="co-y">isEmpty</span>( )
        <span class="co-y">aIsLess</span>(a,<span class="co-c">S</span>)
        A.<span class="co-y">remove</span>(A.<span class="co-y">first</span>( ))
    <span class="co-r">white</span> NOT B.<span class="co-y">isEmpty</span>( )
        <span class="co-y">bIsLess</span>(b,<span class="co-c">S</span>)
        B.<span class="co-y">remove</span>(B.<span class="co-y">first</span>( ))
    <span class="co-r">return</span> <span class="co-c">S</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <pre>Any of the set operations can use generic merge</pre>
                <pre>All methods run in linear time</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="co-c text-center">Union Example</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-r">if</span> a <span class="co-y">&lt;</span> b
    <span class="co-w">copy</span> a <span class="co-w">to output sequence
    Go to next element of</span> A
<span class="co-r">if</span> a <span class="co-y">=</span> b
    <span class="co-w">copy</span> a <span class="co-w">to output sequence
    Go to next element of</span> A <span class="co-w">and</span> B
<span class="co-r">if</span> a <span class="co-y">&gt;</span> b
    <span class="co-w">copy</span> b <span class="co-w">to output sequence
    Go to next element of</span> B

A <span class="co-y">&lt;</span>-- <span class="co-m">2  5  6  7  9</span>
B <span class="co-y">&lt;</span>-- <span class="co-m">2  7  8  10</span>

A: <span class="co-c">2</span>  <span class="co-m">5  6  7  9</span>
B: <span class="co-c">2</span>  <span class="co-m">7  8  10</span>
<span class="co-c">s</span> <span class="co-y">=</span> A <span class="co-y">&#x222A;</span> B: <span class="co-c">2</span>

A: <span class="co-c">2  5</span>  <span class="co-m">6  7  9</span>
B: <span class="co-c">2</span>  <span class="co-m">7  8  10</span>
<span class="co-c">s</span> <span class="co-y">=</span> A <span class="co-y">&#x222A;</span> B: <span class="co-c">2  5</span>

A: <span class="co-c">2  5  6</span>  <span class="co-m">7  9</span>
B: <span class="co-c">2</span>  <span class="co-m">7  8  10</span>
<span class="co-c">s</span> <span class="co-y">=</span> A <span class="co-y">&#x222A;</span> B: <span class="co-c">2  5  6</span>

A: <span class="co-c">2  5  6  7</span>  <span class="co-m">9</span>
B: <span class="co-c">2  7</span>  <span class="co-m">8  10</span>
<span class="co-c">s</span> <span class="co-y">=</span> A <span class="co-y">&#x222A;</span> B: <span class="co-c">2  5  6  7</span>

A: <span class="co-c">2  5  6  7</span>  <span class="co-m">9</span>
B: <span class="co-c">2  7  8</span>  <span class="co-m">10</span>
<span class="co-c">s</span> <span class="co-y">=</span> A <span class="co-y">&#x222A;</span> B: <span class="co-c">2  5  6  7  8</span>

A: <span class="co-c">2  5  6  7  9</span>
B: <span class="co-c">2  7  8</span>  <span class="co-m">10</span>
<span class="co-c">s</span> <span class="co-y">=</span> A <span class="co-y">&#x222A;</span> B: <span class="co-c">2  5  6  7  8  9</span>

A: <span class="co-c">2  5  6  7  9</span>
B: <span class="co-c">2  7  8  10</span>
<span class="co-c">s</span> <span class="co-y">=</span> A <span class="co-y">&#x222A;</span> B: <span class="co-c">2  5  6  7  8  9  10</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4">Merge Sort</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p>- Sorting algorithm based up on <span class="co-kg">Divide and Conquer</span>
                    <br>
                    - Akin to Heap Sort: Uses comparator and has <span class="co-m">O(nlog(n))</span> running time
                    <br>
                    - Unline Heap Sort: Does not use an auxiliary priority queue and accessess data in a sequential manner
                </p>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Divide and Conquer</p>
                <pre>General algorithm design paradigm</pre>
                <pre><span class="co-kg">Divide</span>: Divide input data <span class="co-c">S</span> in two disjoint sets <span class="co-c">S<sub>1</sub></span> and <span class="co-c">S<sub>2</sub></span></pre>
                <pre><span class="co-kg">Recur</span>: Solve subproblems associated with <span class="co-c">S<sub>1</sub></span> and <span class="co-c">S<sub>2</sub></span></pre>
                <pre>    Base case of recursion are subproblems of size 0 or 1</pre>
                <pre><span class="co-kg">Conquer</span>: Combine solutions for <span class="co-c">S<sub>1</sub></span> and <span class="co-c">S<sub>2</sub></span> into a solution for <span class="co-c">S</span></pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Merge Sort</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Let <span class="co-c">S</span> = Sorted Sequence, <span class="co-o">C</span> = Comparator
    <span class="co-y">MergeSort</span>(<span class="co-c">S</span>,<span class="co-o">C</span>)
        <span class="co-w">Input</span>: Sequence <span class="co-c">S</span> with <span class="co-m">n</span> elements, comparator <span class="co-o">C</span>
        <span class="co-w">Output</span>: Sequence <span class="co-c">S</span> sorted according to <span class="co-o">C</span>
        <span class="co-r">if</span> <span class="co-c">S</span>.<span class="co-y">size</span>( ) <span class="co-y">&gt;</span> <span class="co-m">1</span>
            (<span class="co-c">S<sub>1</sub></span>, <span class="co-c">S<sub>2</sub></span>) <span class="co-y">&lt;-- parition</span>(<span class="co-c">S</span>,<span class="co-m">n</span><span class="co-y">/</span><span class="co-m">2</span>)
            <span class="co-y">mergeSort</span>(<span class="co-c">S<sub>1</sub></span>,<span class="co-o">C</span>)
            <span class="co-y">mergeSort</span>(<span class="co-c">S<sub>2</sub></span>,<span class="co-o">C</span>)
            <span class="co-c">S</span> <span class="co-y">&lt;-- merge</span>(<span class="co-c">S<sub>1</sub></span>,<span class="co-c">S<sub>2</sub></span>)
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Merging Two Sorted Sequences</p>
                <pre>The <span class="co-kg">conquer</span> step of merge sort:</pre>
                <pre>    Merges two sorted sequences into one sorted sequence <span class="co-c">S</span></pre>
                <pre>    <span class="co-c">S</span> contains the union of the elemens of <span class="co-g">A</span> and <span class="co-g">B</span></pre>
                <pre>Merging two sorted sequences, each with <span class="co-m">n</span><span class="co-y">/</span><span class="co-m">2</span> takes <span class="co-m">O(n)</span> time</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Pseudocode</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">merge</span>(A,B)
    <span class="co-w">Input</span>: Sequence <span class="co-c">S</span> with <span class="co-m">n<span class="co-y">/</span>2</span> elements each
    <span class="co-w">Output</span>: Sorted sequence <span class="co-c">S</span> of A <span class="co-y">&#x222A;</span> B
    <span class="co-c">S</span> <span class="co-y">&lt;--</span> Empty Sequence
    <span class="co-r">while</span> NOT A.<span class="co-y">isEmpty</span>( ) <span class="co-y">&#x22C0;</span> NOT B.<span class="co-y">isEmpty</span>( )
        <span class="co-r">if</span> A.<span class="co-y">first</span>( ).<span class="co-y">element</span>( ) <span class="co-y">&lt;</span> B.<span class="co-y">first</span>( ).<span class="co-y">element</span>( )
            <span class="co-c">S</span>.<span class="co-y">insertLast</span>(A.<span class="co-y">remove</span>(A.<span class="co-y">first</span>( )))
        <span class="co-r">else</span>
            <span class="co-c">S</span>.<span class="co-y">insertLast</span>(B.<span class="co-y">remove</span>(B.<span class="co-y">first</span>( )))
    <span class="co-r">while</span> NOT A.<span class="co-y">isEmpty</span>( )
        <span class="co-c">S</span>.<span class="co-y">insertLast</span>(A.<span class="co-y">remove</span>(A.<span class="co-y">first</span>( )))
    <span class="co-r">while</span> NOT B.<span class="co-y">isEmpty</span>( )
        <span class="co-c">S</span>.<span class="co-y">insertLast</span>(B.<span class="co-y">remove</span>(B.<span class="co-y">first</span>( )))
    <span class="co-r">return</span> <span class="co-c">S</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Merge Sort Tree</p>
                <pre>Each node represents a recursive call of merge sort</pre>
                <pre>Stores:</pre>
                <pre>    Unsorted sequence <span class="co-o">before</span> the execution/its partition</pre>
                <pre>    Sorted sequence at the <span class="co-o">end</span> of the execution</pre>
                <pre><span class="co-c">Root</span> is the initial call</pre>
                <pre>Leaves are calls on subsequences of size <span class="co-m">1</span></pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">          <span class="co-w">+</span>-----------------------------<span class="co-w">+</span>
          |<span class="co-m">7  2  <span class="co-o">|</span>  9  4</span>  <span class="co-y">--&gt;</span> <span class="co-c">2  4  7  9</span>|
          <span class="co-w">+</span>-----------------------------<span class="co-w">+</span>
              /                      \
  <span class="co-w">+</span>-----------------<span class="co-w">+</span>         <span class="co-w">+</span>-----------------<span class="co-w">+</span>
  |<span class="co-m">7</span>  <span class="co-o">|</span>  <span class="co-m">2</span>  <span class="co-y">--&gt;</span> <span class="co-c">2  7</span>|         |<span class="co-m">9</span>  <span class="co-o">|</span>  <span class="co-m">4</span>  <span class="co-y">--&gt;</span> <span class="co-c">4  9</span>|
  <span class="co-w">+</span>-----------------<span class="co-w">+</span>         <span class="co-w">+</span>-----------------<span class="co-w">+</span>
     /          \                 /          \
<span class="co-o">+--------+  +--------+       +--------+  +--------+
|<span class="co-m">7</span>  <span class="co-y">--&gt;</span> <span class="co-c">7</span>|  |<span class="co-m">2</span>  <span class="co-y">--&gt;</span> <span class="co-c">2</span>|       |<span class="co-m">9</span>  <span class="co-y">--&gt;</span> <span class="co-c">9</span>|  |<span class="co-m">4</span>  <span class="co-y">--&gt;</span> <span class="co-c">4</span>|   LEAVES
<span class="co-o">+--------+  +--------+       +--------+  +--------+</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-md-9 col-12">
                <p class="co-c">Analysis of Merge Sort</p>
                <pre>The height <span class="co-m">h</span> of the merge sort tree is <span class="co-m">O(log(n))</span></pre>
                <pre>    Each recursive call divides the sequence in half</pre>
                <pre>Overall amount of work done at nodes of depth <span class="co-m">i</span> is <span class="co-m">O(n)</span></pre>
                <pre>    Partition and merge <span class="co-m">2<sup>i</sup></span> sequences of size <span class="co-m">n<span class="co-y">/</span>2<sup>i</sup></span></pre>
                <pre>    Make <span class="co-m">2<sup>i+1</sup></span> recursive calls</pre>
                <pre>Total running time is <span class="co-m">O(nlog(n))</span></pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
Depth   #Seqs    Size
  <span class="co-y">0       1       <span class="co-m">n</span></span>                           <span class="co-c">Root</span>
     <span class="co-w">                             +</span>------------<span class="co-w">++</span>------------<span class="co-w">+</span>
  <span class="co-y">1       2      <span class="co-m">n</span>/2    </span><span class="co-c">          &#x25C9;                         &#x25C9;</span>
                           <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>            <span class="co-w">+</span>------<span class="co-w">+</span>------<span class="co-w">+</span>
  <span class="co-y"><span class="co-m">i</span>       2<sup class="co-m">i</sup>     <span class="co-m">n</span>/2<sup class="co-m">i</sup>      </span><span class="co-c">&#x25C9;             &#x25C9;           &#x25C9;            &#x25C9;</span>
                      <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>   <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
                      <span class="co-o">L         L   L         L  L         L   L         L</span>
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4">Comparing Sorting Algorithms</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="algoNotesPara col-12">
                <p>- Consider Time and Space complexity
                    <br>
                    - <span class="co-kg">In-place</span> algorithm requires only <span class="co-m">m + O(1)</span> space
                    <br>
                    - <span class="co-kg">Stability</span> means the algorithm preserves the original relative ordering of elems with equal value
                    <br>
                    - Example:
                    <br>
                    &emsp;Unsorted: <span class="co-c">(<strong class="co-o">B</strong>, <strong class="co-o">b</strong>, a, c)</span>. Suppose B <span class="co-y">=</span> b and a <span class="co-y">&lt;</span> b <span class="co-y">&lt;</span> c
                    <br>
                    &emsp;&emsp;<span class="co-kg">Stable Sorted</span>: <span class="co-c">(a, <strong class="co-o">B</strong>, <strong class="co-o">b</strong>, c)</span>
                    <br>
                    &emsp;&emsp;<span class="co-kg">Unstable Sorted</span>: <span class="co-c">(a, <strong class="co-o">b</strong>, <strong class="co-o">B</strong>, c)</span>
                    <br>
                    - Necessary if needing to sort repeatedly by different attributes (e,g, by first name then by last name)
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="algoNotesPara col-12">
                <p class="co-c text-center">Summary of Sorting Algorithms</p>
                <div class="row justify-content-center">
        			<div class="col-auto">
                        <table class="table-dark table-responsive" id="precTable" style="font-size: 1rem">
                            <thead class="text-center">
                                <th>Algorithm</th>
                                <th>Time</th>
                                <th>Notes</th>
                            </thead>
                            <tbody>
                                <tr class="co-c">
                                    <td>Selection Sort</td>
                                    <td class="p-3">O(n<sup>2</sup>)</td>
                                    <td><ul>
                                            <li>In place</li>
                                            <li>Not stable</li>
                                            <li>For small data sets (&lt; 1K)</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="co-kg">
                                    <td>Insertion Sort</td>
                                    <td class="p-3">O(n<sup>2</sup>)</td>
                                    <td><ul>
                                            <li>In place</li>
                                            <li>Stable</li>
                                            <li>For small data sets (&lt; 1K)</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="co-y">
                                    <td>Heap Sort</td>
                                    <td class="p-3">O(nlog(n))</td>
                                    <td><ul>
                                            <li>In place</li>
                                            <li>Not stable</li>
                                            <li>For large data sets (1K - 1M)</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="co-o">
                                    <td>Merge Sort</td>
                                    <td class="p-3">O(nlog(n))</td>
                                    <td><ul>
                                            <li>In place</li>
                                            <li>Stable</li>
                                            <li>Sequential data access</li>
                                            <li>For huge data sets (&gt; 1M)</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ml-4">Quick Select</h3>
                <hr>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="algoNotesPara col-12">
                <p class="co-c">Selection Problem</p>
                <pre>Given an integerl <span class="co-m">k</span> and <span class="co-m">n</span> elements <span class="co-m">x<sub>1</sub>, x<sub>2</sub>, ... ,x<sub>n</sub> taken from a total order:</pre>
                <pre>    Find the <span class="co-m">k<sup>th</sup></span> smallest element in this set</pre>
                <pre>Can order set in <span class="co-m">O(nlog(n))</span> time and index the  <span class="co-m">k<sup>th</sup></span> element</pre>
                <pre>However, the selection problem can be solved faster</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="algoNotesPara col-12">
                <h3 class="co-c">Quick Select</h3>
                <p>- A randomized selection algorithm based on the <span class="co-kg">prune-and-search</span> paradigm
                    <br>
                    &emsp;<span class="co-kg">Prune</span>: Pick a random element <span class="co-m">x</span> (called <span class="co-kg">pivot</span>) and partition <span class="co-c">S</span> into:
                    <br>
                    &emsp;&emsp;<span class="co-y">L</span> elements <span class="co-y">&lt;</span> <span class="co-m">x</span>
                    <br>
                    &emsp;&emsp;<span class="co-y">E</span> elements <span class="co-y">=</span> <span class="co-m">x</span>
                    <br>
                    &emsp;&emsp;<span class="co-y">L</span> elements <span class="co-y">&gt;</span> <span class="co-m">x</span>
                    <br>
                    - <span class="co-kg">Search</span>: Depending on <span class="co-m">k</span>, either answer is in <span class="co-y">E</span>, or it is necessary to recurse into <span class="co-y">L</span> or <span class="co-y">G</span>
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="algoNotesPara col-12">
                <p class="co-c">Partition</p>
                <pre>Partition the input sequence akin to <span class="co-kg">quick sort</span></pre>
                <pre>    Remove each element <span class="co-m">y</span> from <span class="co-c">S</span></pre>
                <pre>    Insert <span class="co-m">y</span> into <span class="co-y">L</span>, <span class="co-y">E</span>, or <span class="co-y">G</span></pre>
                <pre>        This depends upon the result of of the comparison with the pivot <span class="co-m">p</span></pre>
                <pre>Each insertion and removal takes <span class="co-m">O(1)</span> time</pre>
                <pre>Thus, the partition step of <span class="co-kg">quick select</span> takes <span class="co-m">O(n)</span> time</pre>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Partition Pseudocode</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">Partition</span>(<span class="co-c">S</span>,<span class="co-m">p</span>)
    <span class="co-w">Input</span>: Sequence <span class="co-c">S</span>, pivot <span class="co-m">p</span>
    <span class="co-w">Output</span>: Subsequences <strong class="co-o">L, E, G</strong> of the elements of <span class="co-c">S</span> <span class="co-y">&lt;, =, &gt;</span> the pivot (respectively)
    <strong class="co-o">L, E, G</strong> <span class="co-y">&lt;--</span> empty sequences
    <span class="co-r">while</span> NOT <span class="co-c">S</span>.<span class="co-y">isEmpty</span>( )
        <span class="co-m">y</span> <span class="co-y">&lt;--</span> <span class="co-c">S</span>.<span class="co-y">remove</span>(<span class="co-c">S</span>.<span class="co-y">first</span>( ))
        <span class="co-r">if</span> <span class="co-m">y</span> <span class="co-y">&lt;</span> <span class="co-m">p</span>
            <span class="co-o">L</span>.<span class="co-y">insertLast</span>(<span class="co-m">y</span>)
        <span class="co-r">else if</span> <span class="co-m">y</span> <span class="co-y">=</span> <span class="co-m">p</span>
            <span class="co-o">E</span>.<span class="co-y">insertLast</span>(<span class="co-m">y</span>)
        <span class="co-r">else</span>
            <span class="co-o">G</span>.<span class="co-y">insertLast</span>(<span class="co-m">y</span>)
    <span class="co-r">return</span> <strong class="co-o">L, E, G</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="text-center co-c">Example</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Start with the sequence: <span class="co-m">7  4  9  3  2  6  5  1  8</span>
<span class="co-r">Recall that k is the kth smallest element</span>
Let <span class="co-m">k</span> <span class="co-y">=</span> <span class="co-m">5</span> (fifth smallest element)

    Choose a random <span class="co-t">pivot</span> of <span class="co-t">3</span>
<span class="co-m">7  4  9  <span class="co-t">3</span>  2  6  5  1  8</span>

<span class="co-m">1  2</span>             is placed in <span class="co-o">L</span>
<span class="co-t">3</span>                is placed in <span class="co-o">E</span>
<span class="co-m">7  4  9  6  5  8</span> is placed in <span class="co-o">G</span>

Since <span class="co-m">k</span> <span class="co-y">&gt;</span> <span class="co-o">L</span> <span class="co-y">+</span> <span class="co-o">E</span>, focus on <span class="co-o">G</span>
<span class="co-m">k</span> <span class="co-y">-=</span>  <span class="co-o">L</span> <span class="co-y">+</span> <span class="co-o">E</span>, so <span class="co-m">k</span> <span class="co-y">=</span> <span class="co-m">2</span>

    Choose a random <span class="co-t">pivot</span> of <span class="co-t">8</span>
<span class="co-m">7  4  9  6  5</span>  <span class="co-t">8</span>

<span class="co-m">7  4  6  5</span> is placed in <span class="co-o">L</span>
<span class="co-t">8</span>          is placed in <span class="co-o">E</span>
<span class="co-m">9</span>          is placed in <span class="co-o">G</span>

Since <span class="co-m">k</span> <span class="co-y">&lt;=</span> <span class="co-o">L</span>, focus on <span class="co-o">L</span>
<span class="co-m">k</span> is still <span class="co-m">2</span>

    Choose a random <span class="co-t">pivot</span> of <span class="co-t">4</span>
<span class="co-m">7  <span class="co-t">4</span>  6  5</span>

<span class="co-m"></span>        is placed in <span class="co-o">L</span>
<span class="co-t">4</span>       is placed in <span class="co-o">E</span>
<span class="co-m">7  6  5</span> is placed in <span class="co-o">G</span>

Since <span class="co-m">k</span> <span class="co-y">&gt;</span> <span class="co-o">L</span> <span class="co-y">+</span> <span class="co-o">E</span>, focus on <span class="co-o">G</span>
<span class="co-m">k</span> <span class="co-y">-=</span>  <span class="co-o">L</span> <span class="co-y">+</span> <span class="co-o">E</span>, so <span class="co-m">k</span> <span class="co-y">=</span> <span class="co-m">1</span>

    Choose a random <span class="co-t">pivot</span> of <span class="co-t">5</span>
<span class="co-m">7  6  <span class="co-t">5</span></span>

<span class="co-m"></span>     is placed in <span class="co-o">L</span>
<span class="co-t">5</span>    is placed in <span class="co-o">E</span>
<span class="co-m">7  6</span> is placed in <span class="co-o">G</span>

Since <span class="co-m">k</span> <span class="co-y">=</span> <span class="co-o">L</span> <span class="co-y">+</span> <span class="co-o">E</span>, focus on <span class="co-o">E</span>
<span class="co-c">Therefore, the 5th smallest element is <span class="co-m">5</span></span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="algoNotesPara col-12">
                <p class="co-c text-center">Expected Running Time</p>
                <pre>Let <span class="co-m">s</span> be the sequence's size</pre>
                <pre><span class="co-kg">Good Call</span>: Sizes of <span class="co-y">L</span> and <span class="co-y">G</span> are each less than <span class="co-m">3/4 * s</span></pre>
                <pre><span class="co-kg">Bad  Call</span>: One of <span class="co-y">L</span> and <span class="co-y">G</span> has a size greater than <span class="co-m">3/4 * s</span></pre>
                <pre>A call is <span class="co-kg">good</span> with a probability of <span class="co-m">1/2</span></pre>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex mb-4 mt-5 pl-5 pr-5 justify-content-between">
                <a href="./RedBlackTrees.php" style="display: inline-block;">RedBlack Trees</a>
                <a href="#" style="display: inline-block;">##</a>
            </div>
        </div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
	?>

</body>
</html>

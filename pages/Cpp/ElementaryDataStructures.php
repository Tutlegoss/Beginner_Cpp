<?php

    session_start();

	$article = "Elem Data Struct";
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
			    <h2 class="col-12 heading mt-3 text-center">Elementary Data Structures</h2>
            </div>

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Stack ADT</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Container that stores arbitrary objects
                        <br>
                        - Insertions / Deletions follow <span class="co-kg">LIFO (Last In First Out)</span>
                    </p>
                    <h5 class="text-center co-c">Operations</h5>
<div class="exBoxKelly mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Main:
<span class="co-y">    push</span>(object): Insert element
<span class="co-y">    pop</span>(): Remove and return last element
Auxiliary:
<span class="co-y">    top</span>(): Returns last element
<span class="co-y">    size</span>(): Returns # elements stored
<span class="co-y">    isEmpty</span>(): Returns <span class="co-c">true</span> if 0 elements stored
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Applications</p>
                    <pre>    <span class="co-kg">Direct</span>:</pre>
                    <pre>        Page visited history (web browser)</pre>
                    <pre>        Undo sequence (text editor)</pre>
                    <pre>        Function Chaining (C++)</pre>
                    <pre>    <span class="co-kg">Indirect</span>:</pre>
                    <pre>        Auxiliary data structure</pre>
                    <pre>        Part of other data structures</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Array-Based Stack</p>
                    <pre>    Let <span class="co-m">S = array, N = array capacity, t = index of top element</span></pre>
                    <pre>    Add elements from beginning of <span class="co-m">S</span></pre>
                    <pre>    Size is <span class="co-m">t + 1</span><span class="co-r"> (start t = -1)</span></pre>
                    <pre>    Following functions run in <span class="co-m">O(1)</span></pre>
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="! co-o">1
2
3
4
5
6
7
8
9
10
11
12
13</pre></td>
<td><pre class="@ co-g">Algorithm <span class="co-y">push</span>(o):
    <span class="co-r">if</span> t <span class="co-y">=</span> N <span class="co-y">-</span> <span class="co-m">1</span> <span class="co-r">then</span>
        <span class="co-r">throw</span> FullStackException
    <span class="co-r">else</span>
        t <span class="co-y">&lt;--</span> t <span class="co-y">+</span> <span class="co-m">1</span>
        S[t] <span class="co-y">&lt;--</span> o

Algorithm <span class="co-y">pop</span>():
    <span class="co-r">if</span> <span class="co-y">isEmpty</span>() <span class="co-r">then</span>
        <span class="co-r">throw</span> FullStackException
    <span class="co-r">else</span>
        t <span class="co-y">&lt;--</span> t <span class="co-y">-</span> <span class="co-m">1</span>
        <span class="co-r">return</span> S[t <span class="co-y">+</span> <span class="co-m">1</span>]
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                    <pre>    <span class="co-kg">Extendable</span>:</pre>
                    <pre>        In <span class="co-m">push(o)</span>, when array is full, create a larger array, copy values, and reference the larger array</pre>
                    <pre>        Size of new array methods:</pre>
                    <pre>            <span class="co-kg">Incremental</span>: Increase size by a constant <span class="co-m">c</span></pre>
                    <pre>            <span class="co-kg">Doubling</span>: Double the size</pre>
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="! co-o">1
2
3
4
5
6
7
8
9</pre></td>
<td><pre class="@ co-g">Algorithm <span class="co-y">push</span>(o):
    N <span class="co-y">=</span> sizeOfNewArray
    <span class="co-r">if</span> t <span class="co-y">=</span> N <span class="co-y">-</span> <span class="co-m">1</span> <span class="co-r">then</span>
        A <span class="co-y">&lt;--</span> new array of size N
        <span class="co-r">for</span> i <span class="co-y">&lt;--</span> <span class="co-m">0</span> to t <span class="co-r">do</span>
            A[i] <span class="co-y">&lt--</span> S[i]
        S <span class="co-y">&lt;--</span> A
    t <span class="co-y">&lt;--</span> t <span class="co-y">+</span> <span class="co-m">1</span>
    S[t] <span class="co-y">&lt;--</span> o
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Strategies via Amortization</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4"><span class="co-kg">- Amortization</span>: Tool to understand running times of algorithms
                        that have steps with widely varying performance.
                        <br>
                        <br>
                        <span class="fontCode co-o">When an algorithm has the worst case time complexity occur once in a while besides a more common time complexity</span>
                        <br>
                        <br>
                        <span class="co-kg">- Amortized Time</span>: (of a push operation) The <span class="co-c">average time</span>
                            taken by a push over a <span class="co-c">series of operations</span>
                        <br>
                        <br>
                        <span class="co-kg">- Average Time</span>: <span class="co-m">T(n) / n</span>:
                            Analyzing the total time needed to perform a series of <span class="co-m">n</span> push operations
                        <br>
                        <br>
                        <span class="fontCode co-o">Operations are the primitives in the first lecture. A series is a collection of
                            the algorithm's worst case time complexity execution-by-execution. So, the first entry in a series is
                            the worst time complexity the first time the algorithm is run, then the rest follow suit.</span>
                        <br>
                        <br>
                        <span class="co-y">- Assume</span>: Empty stack represented by an empty array
                        <br>
                        <span class="co-y">- Note</span>: Instead of focusing on each operation, this considers the interactions between all opreations
                            by studying the running time of a series of these operations
                    </p>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Doubling Strategy</p>
                    <p class="mt-4 ml-4 fontCode co-o">So, for example, an array is doubled in size when its size is equal to its capacity,
                        which adds n operations to the algorithm. Only a few insertion operations will do this, so the worst case
                        scenerio is too pessimistic for larger inputs
                    </p>
                    <pre>    Replace the array <span class="co-m">k = log<sub>2</sub>(n)</span></pre>
                    <pre>    <span class="co-m">T(n) = n inserts into array + # of copies</span></pre>
                    <pre>    Total time <span class="co-m">T(n)</span> of a series of <span class="co-m">n</span> operations is proportional to:</pre>
                    <pre>        <span class="co-m">  n + 1 + 2 + 4 + 8 + ... + 2<sup>k</sup></span></pre>
                    <pre>        <span class="co-m">= n + 2<sup>k+1</sup> - 1</span></pre>
                    <pre>        <span class="co-m">= n + 2<sup>log(n) + 1</sup> - 1</span></pre>
                    <pre>        <span class="co-m">= n + 2<sup>log(n)</sup><span class="co-y">*</span>2 - 1</span></pre>
                    <pre>        <span class="co-m">= n + 2n - 1</span></pre>
                    <pre>        <span class="co-m">= 3n - 1</span></pre>
                    <pre>    Therefore, <span class="co-m">T(n)</span> is <span class="co-m">O(n)</span></pre>
                    <pre>    <span class="co-y">Amortized Time</span>: <span class="co-m">O(1)</span></pre>
                    <h5 class="co-c text-center">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="! co-o">


0
1
2
3
4
5
6
7
8</pre></td>
<td><pre class="@ co-g">Start with an empty array of size <span class="co-m">1</span>:

[ ]
[<span class="co-m">8</span>][ ] (<span class="co-y">Insert, Larger Array, Copy</span>)
[<span class="co-m">8</span>][<span class="co-m">1</span>][ ][ ]  (<span class="co-y">Insert, Larger Array, Copy</span>)
[<span class="co-m">8</span>][<span class="co-m">1</span>][<span class="co-m">6</span>][ ]  (<span class="co-y">Insert</span>)
[<span class="co-m">8</span>][<span class="co-m">1</span>][<span class="co-m">6</span>][<span class="co-m">0</span>][ ][ ][ ][ ]  (<span class="co-y">Insert, Larger Array, Copy</span>)
[<span class="co-m">8</span>][<span class="co-m">1</span>][<span class="co-m">6</span>][<span class="co-m">0</span>][<span class="co-m">5</span>][ ][ ][ ]  (<span class="co-y">Insert</span>)
[<span class="co-m">8</span>][<span class="co-m">1</span>][<span class="co-m">6</span>][<span class="co-m">0</span>][<span class="co-m">5</span>][<span class="co-m">3</span>][ ][ ]  (<span class="co-y">Insert</span>)
[<span class="co-m">8</span>][<span class="co-m">1</span>][<span class="co-m">6</span>][<span class="co-m">0</span>][<span class="co-m">5</span>][<span class="co-m">3</span>][<span class="co-m">2</span>][ ]  (<span class="co-y">Insert</span>)
[<span class="co-m">8</span>][<span class="co-m">1</span>][<span class="co-m">6</span>][<span class="co-m">0</span>][<span class="co-m">5</span>][<span class="co-m">3</span>][<span class="co-m">2</span>][<span class="co-m">9</span>][ ][ ][ ][ ][ ][ ][ ][ ]  (<span class="co-y">Insert, Larger Array, Copy</span>)
    <span class="co-r">The next 7 operations are <span class="co-y">Insert</span> only</span>
<span class="co-w">
Inserting 8 integers is shown above. So, <span class="co-m">n <span class="co-y">=</span> 8</span>
The number of <span class="co-y">copy</span> operations is seen on lines 1, 2, 4, 8
    Num of copies on each line corresponds to the line number
    This corresponds to <span class="co-m">2<sup>0</sup> <span class="co-y">+</span> 2<sup>1</sup> <span class="co-y">+</span> 2<sup>2</sup> <span class="co-y">+</span> 2<sup>3</sup> <span class="co-y">=</span> 15</span>
So, <span class="co-m">8 <span class="co-y">+</span> 15 <span class="co-y">=</span> 23 <span class="co-y">=</span> 3n <span class="co-y">-</span> 1</span></span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Incremental Strategy</p>

                    <pre>    Replace the array <span class="co-m">k = n/c</span></pre>
                    <pre>    <span class="co-m">T(n) = n inserts into array + # of copies</span></pre>
                    <pre>    Total time <span class="co-m">T(n)</span> of a series of <span class="co-m">n</span> operations is proportional to:</pre>
                    <pre>        <span class="co-m">  n + c + 2c + 3c + 4c + ... + kc</span></pre>
                    <pre>        <span class="co-m">= n + c(1 + 2 + 3 + ... + k)</span></pre>
                    <pre>        <span class="co-m">= n + ck(k+1)/2</span></pre>
                    <pre>    Since <span class="co-m">c</span> is constant, <span class="co-m">T(n)</span> is <span class="co-m">O(n+k<sup>2</sup>)</span>, which is <span class="co-m">O(n<sup>2</sup>)</span></pre>
                    <pre>        <span class="co-o">n + n(n/c + 1))/2</span></pre>
                    <pre>        <span class="co-o">n + 1/c * n<sup>2</sup> + n</span></pre>
                    <pre>        <span class="co-o">1/c * n<sup>2</sup> + 2n</span></pre>
                    <pre>    <span class="co-y">Amortized Time</span>: <span class="co-m">O(n)</span></pre>
                    <h5 class="co-c text-center">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Let n <span class="co-y">=</span> <span class="co-m">7</span>, c <span class="co-y">=</span> <span class="co-m">3</span>,
    k <span class="co-y">=</span> n/c <span class="co-y">=</span> <span class="co-m">7/3</span> <span class="co-y">=</span> <span class="co-m">2</span> (truncated)
    Start with [ ][ ][ ]

3 insertions are made before needing to expand
    [<span class="co-m">1</span>][<span class="co-m">2</span>][<span class="co-m">3</span>]
            <span class="co-y">==&gt; Copy ==&gt;</span>
    [<span class="co-m">1</span>][<span class="co-m">2</span>][<span class="co-m">3</span>][ ][ ][ ]

Three more insertions are made before needing to expand
    [<span class="co-m">1</span>][<span class="co-m">2</span>][<span class="co-m">3</span>][<span class="co-m">4</span>][<span class="co-m">5</span>][<span class="co-m">6</span>]
            <span class="co-y">==&gt; Copy ==&gt;</span>
    [<span class="co-m">1</span>][<span class="co-m">2</span>][<span class="co-m">3</span>][<span class="co-m">4</span>][<span class="co-m">5</span>][<span class="co-m">6</span>][ ][ ][ ]

Last insertion <span class="co-y">==&gt;</span> [<span class="co-m">1</span>][<span class="co-m">2</span>][<span class="co-m">4</span>][<span class="co-m">4</span>][<span class="co-m">5</span>][<span class="co-m">6</span>][<span class="co-m">7</span>][ ][ ]

<span class="co-m">7</span> insertions <span class="co-y">+</span> <span class="co-m">3</span> copied <span class="co-y">+</span> <span class="co-m">6</span> copied <span class="co-y">=</span> <span class="co-m">16</span> operations
    So,   <span class="co-m">7 <span class="co-y">+</span> 3<span class="co-y">*</span>2(2 <span class="co-y">+</span> 1)<span class="co-y">/</span>2
        <span class="co-y">=</span> 7 <span class="co-y">+</span> 9 <span class="co-y">=</span> 16</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Accounting Method Analysis</p>
                    <pre><span class="co-kg">Accounting Method</span>: Finding amortized running time via credits and debits</pre>
                    <pre>    One primitive operation = <span class="co-m">$1</span></pre>
                    <pre>    Must always have enough money to pay for operation in full</pre>
                    <pre>    Total Cost (of the series of operations) <= Total Amount Charged</pre>
                    <pre>        <span class="co-m">Amortized_Time &#x2264; Total_Charged / Num_Operations</span></pre>
                    <pre>    <span class="co-o">{ Can overcharge when few primitive operations are used to assist when many primitive operations are used }</span></pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Accounting Method Analysis: Doubling Strategy</p>
                    <pre> Find out how much to charge per push operation <span class="co-r">(Includes money for copying)</span></pre>
                    <pre>    Insert and Copy cost <span class="co-m">$1</span> apiece</pre>
                    <h5 class="co-c text-center">Strategy</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Charging <span class="co-m">$1</span>:
    Put in <span class="co-m">$1</span>:  <span class="co-m">$1</span> <span class="co-y">-</span> Insert <span class="co-y">-</span> <span class="co-m">1</span><span class="co-y">*</span>Copy <span class="co-y">=</span> <span class="co-m">$-1</span> credit
Charging <span class="co-m">$2</span>:
    Put in <span class="co-m">$2</span>:  <span class="co-m">$2</span> <span class="co-y">-</span> Insert <span class="co-y">-</span> <span class="co-m">1</span><span class="co-y">*</span>Copy <span class="co-y">=</span> <span class="co-m">$0</span>  credit
    Put in <span class="co-m">$2</span>:  <span class="co-m">$2</span> <span class="co-y">-</span> Insert <span class="co-y">-</span> <span class="co-m">2</span><span class="co-y">*</span>Copy <span class="co-y">=</span> <span class="co-m">$-1</span> credit
Charging <span class="co-m">$3</span>:
    Put in <span class="co-m">$3</span>:  <span class="co-m">$3</span> <span class="co-y">-</span> Insert <span class="co-y">-</span> <span class="co-m">1</span><span class="co-y">*</span>Copy <span class="co-y">=</span> <span class="co-m">$1</span> credit
    Put in <span class="co-m">$3</span>:  <span class="co-m">$4</span> <span class="co-y">-</span> Insert <span class="co-y">-</span> <span class="co-m">2</span><span class="co-y">*</span>Copy <span class="co-y">=</span> <span class="co-m">$1</span> credit
    Put in <span class="co-m">$3</span>:  <span class="co-m">$4</span> <span class="co-y">-</span> Insert          <span class="co-y">=</span> <span class="co-m">$3</span> credit
    Put in <span class="co-m">$3</span>:  <span class="co-m">$6</span> <span class="co-y">-</span> Insert <span class="co-y">-</span> <span class="co-m">4</span><span class="co-y">*</span>Copy <span class="co-y">=</span> <span class="co-m">$1</span> credit
    Put in <span class="co-m">$3</span>:  <span class="co-m">$4</span> <span class="co-y">-</span> Insert          <span class="co-y">=</span> <span class="co-m">$3</span> credit
    Put in <span class="co-m">$3</span>:  <span class="co-m">$6</span> <span class="co-y">-</span> Insert          <span class="co-y">=</span> <span class="co-m">$5</span> credit
    Put in <span class="co-m">$3</span>:  <span class="co-m">$8</span> <span class="co-y">-</span> Insert          <span class="co-y">=</span> <span class="co-m">$7</span> credit
    Put in <span class="co-m">$3</span>: <span class="co-m">$10</span> <span class="co-y">-</span> Insert <span class="co-y">-</span> <span class="co-m">8</span><span class="co-y">*</span>Copy <span class="co-y">=</span> <span class="co-m">$1</span> credit
    Put in <span class="co-m">$3</span>:  <span class="co-m">$4</span> <span class="co-y">-</span> Insert          <span class="co-y">=</span> <span class="co-m">$3</span> credit

<span class="co-y">Charge $3 per Push execution. You will always have at least $1 credit for the next execution.</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                    <pre>    Each execution runs in <span class="co-m">O(1)</span> amortized time</pre>
                    <pre>    For <span class="co-m">n</span> executions, runs in <span class="co-m">O(n)</span> time</pre>
                </div>
            </div>

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Queue ADT</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Container that stores objects
                        <br>
                        - Insertions / Deletions follow <span class="co-kg">FIFO (First In Last Out)</span>
                    </p>
                    <h5 class="text-center co-c">Operations</h5>
<div class="exBoxKelly mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Main:
<span class="co-y">    enqueue</span>(object): Insert element at the end
<span class="co-y">    dequeue</span>(): Remove and return front element
Auxiliary:
<span class="co-y">    front</span>(): Returns front element
<span class="co-y">    size</span>(): Returns # elements stored
<span class="co-y">    isEmpty</span>(): Returns <span class="co-c">true</span> if 0 elements stored
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Applications</p>
                    <pre>    <span class="co-kg">Direct</span>:</pre>
                    <pre>        Waiting lines</pre>
                    <pre>        Access to shared resources</pre>
                    <pre>        Multiprogramming</pre>
                    <pre>    <span class="co-kg">Indirect</span>:</pre>
                    <pre>        Auxiliary data structure</pre>
                    <pre>        Part of other data structures</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Queue Singly Linked List</p>
                    <pre>    Sequence of nodes</pre>
                    <pre>    Each node contains an element and a link to the next node</pre>
                    <pre>    First node is the front</pre>
                    <pre>    Last node is the end</pre>
                    <pre>    <span class="co-m">O(n)</span> space / <span class="co-m">O(1)</span> time</pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">List ADT</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Collection of objects ordered WRT their position
                        <br>
                        <span class="co-kg">- Position</span>: The node storing an element
                        <br>
                        - Insert and remove at any position
                    </p>
                    <h5 class="text-center co-c">Operations</h5>
<div class="exBoxKelly mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Query:
<span class="co-y">    isFirst</span>(p)
<span class="co-y">    isLast</span>(p)
Accessor:
<span class="co-y">    front</span>()
<span class="co-y">    back</span>()
<span class="co-y">    before</span>(p)
<span class="co-y">    after</span>(p)
Update:
<span class="co-y">    replaceElements</span>(p,e)
<span class="co-y">    swapElements</span>(p,q)
<span class="co-y">    insertBefore</span>(p,e)
<span class="co-y">    insertAfter</span>(p, e)
<span class="co-y">    insertFirst</span>(e)
<span class="co-y">    insertLast</span>(e)
<span class="co-y">    remove</span>(p)
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Doubly Linked List</p>
                    <pre>    Natural List ADT</pre>
                    <pre>    <span class="co-kg">Node</span>: Implements position / Stores element and links to prev/next nodes</pre>
                    <pre>    Special <span class="co-y">head</span> and <span class="co-y">tail</span> nodes</pre>
                    <pre>    Last node is the end</pre>
                    <pre>    <span class="co-m">O(n)</span> space / <span class="co-m">O(1)</span> time</pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Vector ADT</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Linear sequence
                        <br>
                        - Access to its elements by their rank
                        <br>
                        <span class="co-kg">- Rank</span>: Number of preceding elements
                        <br>
                        - Insert and remove at any position
                    </p>
                    <h5 class="text-center co-c">Operations</h5>
<div class="exBoxKelly mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Query:
<span class="co-y">    size</span>()
<span class="co-y">    isEmpty</span>()
<span class="co-y">    elemAtRank</span>(r)
<span class="co-y">    replaceAtRank</span>(r,e)
<span class="co-y">    insertAtRank</span>(r,e)
<span class="co-y">    removeAtRank</span>(r)
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Array-Based Vector</p>
                    <pre>    Array of size <span class="co-m">N</span> (who labels this stuff?)</pre>
                    <pre>    <span class="co-m">n</span> tracks the size (# elems stored)</pre>
                    <pre>    <span class="co-y">elemAtRank</span>(r) is <span class="co-m">O(1)</span> by returning <span class="co-m">vector[r]</span></pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Insertion</p>
                    <pre>    Shift forward <span class="co-m">n - r</span> elements</pre>
                    <pre>        <span class="co-m">vector[r], ..., vector[n-1]</span></pre>
                    <pre>    <span class="co-y">Worst Case</span>: <span class="co-m">r = 0 (O(n))</span></pre>
                    <pre>        If array is circular, insertion/removal when <span class="co-m">r = 0</span> is <span class="co-m">O(1)</span></pre>
                    <pre>    Extendable array</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Deletion</p>
                    <pre>    Shift backward <span class="co-m">n - r - 1</span> elements</pre>
                    <pre>        <span class="co-m">vector[r+1], ..., vector[n-1]</span></pre>
                    <pre>    <span class="co-y">Worst Case</span>: <span class="co-m">r = 0 (O(n))</span></pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Sequence</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Generalized ADT
                        <br>
                        - Includes all methods from <span class="co-y">vector</span> and <span class="co-y">list</span> ADTs
                        <br>
                        - Provides access to elements from <span class="co-y">rank</span> and <span class="co-y">position</span>
                        <br>
                        - Implemented via <span class="co-y">array</span> or <span class="co-y">doubly linked list</span>
                    </p>
                    <h5 class="text-center co-c">Operations / Runtime Comparison</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Operation                      Array  List
<span class="co-y">size, isEmpty               </span><span class="co-m">   O(1)   O(1)</span>
<span class="co-y">atRank, rankOf, elemAtRank  </span><span class="co-m">   O(1)   O(n)</span>
<span class="co-y">first, last, before, after  </span><span class="co-m">   O(1)   O(1)</span>
<span class="co-y">replaceElement, swapElements</span><span class="co-m">   O(1)   O(1)</span>
<span class="co-y">replaceAtRank               </span><span class="co-m">   O(1)   O(n)</span>
<span class="co-y">insertAtRank, removeAtRank  </span><span class="co-m">   O(n)   O(n)</span>
<span class="co-y">insertFirst, insertLast     </span><span class="co-m">   O(1)   O(1)</span>
<span class="co-y">insertAfter, insertBefore   </span><span class="co-m">   O(n)   O(1)</span>
<span class="co-y">remove                      </span><span class="co-m">   O(n)   O(1)</span>
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                    <pre>    Example:</pre>
                    <pre>        <span class="co-m">n<sup>2</sup></span> calls to <span class="co-y">replaceAtRank</span></pre>
                    <pre>        <span class="co-m">n</span> calls to <span class="co-y">insertAfter</span></pre>
                    <pre>        <span class="co-y">Array</span>: <span class="co-y">n<sup>2</sup>*O(1) + n*O(n<sup>2</sup>) = O(n<sup>2</sup>)</span></pre>
                    <pre>        <span class="co-y">List</span>: <span class="co-y">n<sup>2</sup>*O(n) + n*O(1) = O(n<sup>3</sup>)</span></pre>
                    <pre>    <span class="co-y">Array</span> is better</pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Tree</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Stores elements hierarchically
                        <br>
                        - Each node has parent/child relation
                        <br>
                        <span class="co-y">- Direct Applications</span>: Organizational Charts, File Systems, Programming Environments
                    </p>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Terms</p>
                    <pre>    <span class="co-kg">Root Node</span>: Top (first) element</pre>
                    <pre>    <span class="co-kg">Internal Node</span>: Elements with at least one child</pre>
                    <pre>        <span class="co-o">{Internal Nodes can contain NULLPTRs as children}</span></pre>
                    <pre>    <span class="co-kg">External Node/Leaves</span>: Elements with no children</pre>
                    <pre>        <span class="co-o">{External Nodes can be the NULLPTR itself}</span></pre>
                    <pre>    <span class="co-kg">Height</span>: Longest path from root to any leaf node <span class="co-r">(Don't count the root)</span></pre>
                    <pre>        <span class="co-c">Min</span>: <span class="co-y">floor</span>(<span class="co-m">log<sub>2</sub>(numOfNodes)</span>)</pre>
                    <pre>        <span class="co-c">Max</span>: <span class="co-m">numOfNodes - 1</span>  (Skewed left/right)</pre>
                    <pre>        numOfNodes From Height:</pre>
                    <pre>            <span class="co-c">Min</span>: <span class="co-m">Height + 1</span></pre>
                    <pre>            <span class="co-c">Max</span>: <span class="co-m">2<sup>Height + 1</sup> - 1</span></pre>
                    <pre>            <span class="co-c">Range</span>: {<span class="co-m">Height + 1</span>}&#x222A;[<span class="co-m">2<sup>Height</sup> , 2<sup>Height + 1</sup> - 1</span>]</pre>
                    <pre>    <span class="co-kg">Depth</span>: Same as Height</pre>
                    <pre>        <span class="co-o">{Overall. From a specific node, height may not be the same as depth}</span></pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Tree ADT</p>
                    <pre>    The positions in a tree are its nodes</pre>
                    <h5 class="text-center co-c">Operations</h5>
<div class="exBoxKelly mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Query:
    boolean <span class="co-y">isInternal</span>(p)
    boolean <span class="co-y">isExternal</span>(p)
    boolean <span class="co-y">isRoot</span>(p)
Accessor:
    position <span class="co-y">root</span>()
    position <span class="co-y">parent</span>(p)
    PositionList <span class="co-y">children</span>(p)
Generic:
    integer <span class="co-y">size</span>()
    boolean <span class="co-y">isEmpty</span>()
    ObjectList <span class="co-y">elements</span>()
    PositionList <span class="co-y">positions</span>()
    <span class="co-y">swapElements</span>(p,q)
    Object <span class="co-y">replaceElements</span>(p,o)
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Tree Traversal</p>
                    <pre>    <span class="co-kg">Traversal</span>: Visitation of the nodes in a defined order</pre>
                    <pre>       Start at root node</pre>
                    <pre>    <span class="co-kg">Preorder</span>: Node is visited <span class="co-y">before</span> its children</pre>
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Algorithm <span class="co-y">preOrder</span>(t)
    <span class="co-y">visit</span>(t)
    <span class="co-r">for each</span> <span class="co-t">child</span> c <span class="co-r">of</span> t
        <span class="co-y">preOrder</span>(c)

<span class="co-m">O(n)</span>
<span class="co-y">preOrder</span>(t): <span class="co-m">1  2  5  6  3  7  8  9  4</span>
              <span class="co-m">1</span>
     <span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">2</span>                 <span class="co-m">3</span>        <span class="co-m">4</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>       <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-m">5</span>         <span class="co-m">6</span>       <span class="co-m">7</span>    <span class="co-m">8</span>    <span class="co-m">9</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                    <pre>        Used for linear ordering (parents first)</pre>
                    <pre>    <span class="co-kg">Postorder</span>: Node is visited <span class="co-y">after</span> its children</pre>
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Algorithm <span class="co-y">postOrder</span>(t)
    <span class="co-r">for each</span> <span class="co-t">child</span> c <span class="co-r">of</span> t
        <span class="co-y">preOrder</span>(c)
    <span class="co-y">visit</span>(t)

<span class="co-m">O(n)</span>
<span class="co-y">postOrder</span>(t): <span class="co-m">5  6  2  7  8  9  3  4  1</span>
              <span class="co-m">1</span>
     <span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">2</span>                 <span class="co-m">3</span>        <span class="co-m">4</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>       <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-m">5</span>         <span class="co-m">6</span>       <span class="co-m">7</span>    <span class="co-m">8</span>    <span class="co-m">9</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                    <pre>        Used to determine space used by files in a dir and its subdirs</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">(Full) Binary Trees</p>
                    <pre>    <span class="co-kg">Binary Tree</span>: Tree with:</pre>
                    <pre>        Each internal node has <span class="co-c">two</span> children</pre>
                    <pre>        Children are an ordered pair (<span class="co-c">left child, right child</span>)</pre>
                    <pre>    Can be a single node</pre>
                    <pre>    Two binary trees connected by a root is a binary tree</pre>
                    <pre>    'Unhook' a child node, and said node and its children are a binary tree</pre>
                    <pre>    <span class="co-y">Applications</span>:</pre>
                    <pre>        Arithmetic Expressions (polish notation, infix, etc)</pre>
                    <pre>        Decision Processes</pre>
                    <pre>        Searching</pre>
                    <h5 class="text-center co-c">Properties</h5>
<div class="exBoxKelly mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g pb-1">Let n <span class="co-y">=</span> numOfNodes, e <span class="co-y">=</span>numOfExternalNodes,
    i <span class="co-y">=</span> numOfInternalNodes, h <span class="co-y">=</span> height

e <span class="co-y">=</span> i <span class="co-y">+</span> <span class="co-m">1</span>
n <span class="co-y">=</span> <span class="co-m">2</span>e <span class="co-y">-</span> <span class="co-m">1</span>
h <span class="co-y">&#x2264;</span> i
h <span class="co-y">&#x2264;</span> (n <span class="co-y">-</span> <span class="co-m">1</span>)<span class="co-y">/</span><span class="co-m">2</span>
e <span class="co-y">&#x2264;</span> 2<sup>h</sup>
h <span class="co-y">&#x2265; log<sub>2</sub></span>(e)
h <span class="co-y">&#x2265; log<sub>2</sub></span>(n <span class="co-y">+</span> <span class="co-m">1</span>) <span class="co-y">-</span> <span class="co-m">1</span>
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Arithmetic Expression Tree</p>
                    <pre>    Binary Tree representation of a math expression</pre>
                    <pre>    <span class="co-y">Internal Nodes</span>: Operators</pre>
                    <pre>    <span class="co-y">External Nodes</span>: Operands</pre>
                    <h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">(<span class="co-m">2</span> <span class="co-y">*</span> (a <span class="co-y">-</span> <span class="co-m">1</span>) <span class="co-y">+</span> (<span class="co-m">3</span> <span class="co-y">*</span> b))

              <span class="co-y">+</span>
     <span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-y">*                 *</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>       <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-m">2</span>         <span class="co-y">-</span>       <span class="co-m">3</span>         b
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     a         <span class="co-m">1</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Decision Tree</p>
                    <pre>    Binary Tree representation of decisions</pre>
                    <pre>    <span class="co-y">Internal Nodes</span>: Yes/No Questions</pre>
                    <pre>    <span class="co-c">External Nodes</span>: Decisions</pre>
                    <h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-y">
                  Want fast food?
           <span class="co-w">YES</span>                       <span class="co-w">NO</span>
         Burgers?                 Sit-down?
   <span class="co-w">YES</span>              <span class="co-w">NO</span>      <span class="co-w">YES</span>               <span class="co-w">NO</span>
  <span class="co-c">Wendys</span>           <span class="co-c">KFC</span>    <span class="co-c">Table 6</span>            <span class="co-c">Home</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Inorder Traversal of Binary Tree</p>
                    <pre>    <span class="co-kg">Inorder</span>: Node is visited <span class="co-y">after</span> its left subtree and <span class="co-y">before</span> its right subtree</pre>
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Algorithm <span class="co-y">inOrder</span>(n,t)
    <span class="co-r">if</span> n.<span class="co-y">isInternal</span>(t)
        <span class="co-y">inOrder</span>(n.<span class="co-y">leftChild</span>(t))
    <span class="co-y">visit</span>(t)
    <span class="co-r">if</span> n.<span class="co-y">isInternal</span>(t)
        <span class="co-y">inOrder</span>(n.<span class="co-y">rightChild</span>(t))

<span class="co-m">O(n)</span>
<span class="co-y">inOrder</span>(t): <span class="co-m">4  2  8  5  9  1  6  3  7</span>
              <span class="co-m">1</span>
     <span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     <span class="co-m">2                 3</span>
<span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>       <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
<span class="co-m">4         5       6        7</span>
     <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
     <span class="co-m">8         9</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Print Arithmetic Expressions</p>
                    <pre>    Uses Inorder Traversal</pre>
                    <pre>        Print operand/operator when visiting node</pre>
                    <pre>        Print <span class="co-y">(</span> before visiting left subtree</pre>
                    <pre>        Print <span class="co-y">)</span> after visiting right subtree</pre>
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Algorithm <span class="co-y">printExpression</span>(n,t)
    <span class="co-r">if</span> n.<span class="co-y">isInternal</span>(t)
        <span class="co-y">print</span>(<span class="co-m">&quot;(&quot;</span>)
        <span class="co-y">inOrder</span>(n.<span class="co-y">leftChild</span>(t))
    <span class="co-y">print</span>(t.<span class="co-y">element</span>())
    <span class="co-r">if</span> n.<span class="co-y">isInternal</span>(t)
        <span class="co-y">inOrder</span>(n.<span class="co-y">rightChild</span>(t))
        <span class="co-y">print</span>(<span class="co-m">&quot;)&quot;</span>)

Look at Arithmetic Expression Tree above for example
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Euler Tour Traversal</p>
                    <pre>    Generic traversal</pre>
                    <pre>    Includes Preorder, Postorder, Inorder</pre>
                    <pre>    Visit node 3 times while traversing left to right</pre>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
<span class="co-y">preorder</span> (left)      <span class="co-y">+ *</span> <span class="co-m">2</span> <span class="co-y">-</span> <span class="co-m">5 1</span> <span class="co-y">*</span> <span class="co-m">3 2</span>
<span class="co-y">inorder</span>  (bottom)    <span class="co-m">2</span> <span class="co-y">*</span> <span class="co-m">5</span> <span class="co-y">-</span> <span class="co-m">1</span> <span class="co-y">+</span> <span class="co-m">3</span> <span class="co-y">*</span> <span class="co-m">2</span>
<span class="co-y">postorder</span> (right)    <span class="co-m">2 5 1</span> <span class="co-y">- *</span> <span class="co-m">3 2</span> <span class="co-y">* +</span>

START left   <span class="co-y">+</span>
      left   <span class="co-y">*</span>
      left   <span class="co-m">2</span>
      bottom <span class="co-m">2</span>
      right  <span class="co-m">2</span>
      bottom <span class="co-y">*</span>
      left   <span class="co-y">-</span>
      left   <span class="co-m">5</span>
      bottom <span class="co-m">5</span>
      right  <span class="co-m">5</span>
      bottom <span class="co-y">-</span>              START -&gt; <span class="co-y">+</span> <span class="co-r">&lt;- END</span>
      left   <span class="co-m">1</span>              <span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
      bottom <span class="co-m">1</span>              <span class="co-y">*                 *</span>
      right  <span class="co-m">1</span>         <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>       <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
      right  <span class="co-y">-</span>         <span class="co-m">2</span>         <span class="co-y">-</span>       <span class="co-m">3</span>         <span class="co-m">2</span>
      right  <span class="co-y">*</span>              <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
      bottom <span class="co-y">+</span>              <span class="co-m">5</span>         <span class="co-m">1</span>
      left   <span class="co-y">*</span>
      left   <span class="co-m">3</span>
      bottom <span class="co-m">3</span>
      right  <span class="co-m">3</span>
      bottom <span class="co-y">*</span>
      left   <span class="co-m">2</span>
      bottom <span class="co-m">2</span>
      right  <span class="co-m">2</span>
      right  <span class="co-y">*</span>
<span class="co-r">END</span>   right  <span class="co-y">+</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Linked Data Structure for (Binary) Trees</p>
                    <pre>    Linked List representation</pre>
                    <pre>    A general tree node contains:</pre>
                    <pre>        <span class="co-y">Element</span></pre>
                    <pre>        <span class="co-y">Parent Node</span></pre>
                    <pre>        <span class="co-y">Sequence of Children Nodes</span></pre>
                    <pre>    A binary tree node contains:</pre>
                    <pre>        <span class="co-y">Element</span></pre>
                    <pre>        <span class="co-y">Parent Node</span></pre>
                    <pre>        <span class="co-y">Left Node</span></pre>
                    <pre>        <span class="co-y">Right Node</span></pre>
                    <pre>    For binary trees:</pre>
                    <pre>       <span class="co-m">O(n)</span> storage</pre>
                    <pre>       <span class="co-m">O(1)</span> for almost all operations</pre>
                    <pre>           Getting list of all elements/positions is <span class="co-m">O(n)</span></pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Array-Based Binary Trees</p>
                    <pre>    Nodes are stored in array</pre>
                    <pre>    <span class="co-y">rank</span>(root) <span class="co-y">=</span> <span class="co-m">1</span></pre>
                    <pre>    <span class="co-r">if</span> (<span class="co-y">rank</span>(root) <span class="co-y">=</span> i)</pre>
                    <pre>       <span class="co-y">rank</span>(leftChild) <span class="co-y">=</span> <span class="co-m">2</span> <span class="co-y">*</span> i</pre>
                    <pre>       <span class="co-y">rank</span>(rightChild) <span class="co-y">=</span> <span class="co-m">2</span> <span class="co-y">*</span> i <span class="co-y">+</span> <span class="co-m">1</span></pre>
                    <pre>    Element <span class="co-m">0</span> may be used for size of Binary Tree</pre>
                    <h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan mb-4 ml-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">
        <span class="co-c">+---++---++---++---++---++---++---+</span>
        <span class="co-c">|</span> B <span class="co-c">||</span> A <span class="co-c">||</span> D <span class="co-c">||</span>   <span class="co-c">||</span>   <span class="co-c">||</span> C <span class="co-c">||</span> E <span class="co-c">|</span>
        <span class="co-c">+---++---++---++---++---++---++---+</span>
<span class="co-y">rank</span>:     <span class="co-m">1    2    3    4    5    6    7</span>

              B
     <span class="co-w">+</span>--------<span class="co-w">+</span>--------<span class="co-w">+</span>
     A                 D</span>
                  <span class="co-w">+</span>----<span class="co-w">+</span>----<span class="co-w">+</span>
                  C         E

A is left child of B:
    <span class="co-y">rank</span>(A) <span class="co-m">2</span> <span class="co-y">* rank</span>(B)
            <span class="co-y">= <span class="co-m">2</span> * <span class="co-m">1</span>
            =</span> <span class="co-m">1</span>

E is right child of D:
    <span class="co-y">rank</span>(E) <span class="co-m">2</span> <span class="co-y">* rank</span>(D) <span class="co-y">+</span> <span class="co-m">1</span>
            <span class="co-y">= <span class="co-m">2</span> * <span class="co-m">3</span> + <span class="co-m">1</span>
            <span class="co-y">=</span> <span class="co-m">7</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex mb-4 pl-5 pr-5 justify-content-between">
                    <a href=".\AlgoNotes.php" style="display: inline-block;">Algorithm Notes</a>
                    <a href=".\DictionaryHashTable.php" style="display: inline-block;">Dictionary Hash Table</a>
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

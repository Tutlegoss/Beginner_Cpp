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
                    <p class="ml-4">Container that stores arbitrary objects
                        <br>
                        Insertions / Deletions follow <span class="co-kg">LIFO (Last In First Out)</span>
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
                    <p class="ml-4"><span class="co-kg">Amortization</span>: Tool to understand running times of algorithms
                        that have steps with widely varying performance.
                        <br>
                        <br>
                        <span class="fontCode co-o">When an algorithm has the worst case time complexity occur once in a while besides a more common time complexity</span>
                        <br>
                        <br>
                        <span class="co-kg">Amortized Time</span>: (of a push operation) The <span class="co-c">average time</span>
                            taken by a push over a <span class="co-c">series of operations</span>
                        <br>
                        <br>
                        <span class="co-kg">Average Time</span>: <span class="co-m">T(n) / n</span>:
                            Analyzing the total time needed to perform a series of <span class="co-m">n</span> push operations
                        <br>
                        <br>
                        <span class="fontCode co-o">Operations are the primitives in the first lecture. A series is a collection of
                            the algorithm's worst case time complexity execution-by-execution. So, the first entry in a series is
                            the worst time complexity the first time the algorithm is run, then the rest follow suit.</span>
                        <br>
                        <br>
                        <span class="co-y">Assume</span>: Empty stack represented by an empty array
                        <br>
                        <span class="co-y">Note</span>: Instead of focusing on each operation, this considers the interactions between all opreations
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
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
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
                    <pre>    <span class="co-y">Amortized Time</span>: <span class="co-m">O(n)</span></pre>
                    <h5 class="co-c text-center">Example</h5>
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
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
<div class="exBoxPurple mb-4 ml-4" style="margin: auto;">
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

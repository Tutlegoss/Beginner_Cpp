<?php

    session_start();

	$article = "Algo Notes";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid mt-4">
		<div class="row">
		    <div class="col-12">
			    <h2 class="heading mt-3 text-center">Notes: Algorithms Class</h2>
            </div>
        </div>

		<div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading">Pseudocode Primitives</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
<div class="exBoxKelly ">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">Expressions</span>: &lt;-- is assignment and = is equality
<span class="co-y">Method Declarations</span>: Algorithm function(param1, param2, ...)
<span class="co-y">Decision Structures</span>: if / then / else
<span class="co-y">Looping</span>: While / Repeat / For
<span class="co-y">Array Indexing</span>: Array[i]
<span class="co-y">Method Calls</span>: Object.method(args)
<span class="co-y">Method Returns</span>: return
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
                <h5 class="co-c text-center">Example</h5>
<div class="exBoxPurple">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="! co-o">1
2
3
4
5
6
7</pre></td>
<td><pre class="@ co-g">Algorithm <span class="co-y">arrayMax</span>(A, n)
    currentMax <span class="co-y">&lt;--</span> A[<span class="co-m">0</span>]
    <span class="co-r">for</span> i <span class="co-y">&lt;--</span> <span class="co-m">1</span> to n <span class="co-y">-</span> <span class="co-m">1</span> <span class="co-r">do</span>
        <span class="co-r">if</span> A[i] <span class="co-y">&gt;</span> currentMax <span class="co-r">then</span>
            currentMax <span class="co-y">&lt;--</span> A[i]
        <span class="co-w">{ increment counter i }</span>
    <span class="co-r">return</span> <span class="co-m">currentMax</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-12">
                <ol class="mt-4">
                    <li class="co-c"># of Operations (by line)
                        <ol class="co-o">
                            <li value="2">&nbsp;2</li>
                            <li>&nbsp;2 + n</li>
                            <li>&nbsp;2(n - 1)</li>
                            <li>&nbsp;2(n - 1)</li>
                            <li>&nbsp;2(n - 1)</li>
                            <li>&nbsp;1</li>
                        </ol>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row mb-4 pl-md-4">
            <div class="algoNotesPara col-12">
                <h5 class="co-c text-center">Analysis of Example</h5>
                <br>
                <pre>The total number of operations: <span class="co-c">7n - 1</span></pre>
                <pre><span class="co-kg">Estimating Running Time</span>:</pre>
                <pre><span class="co-y">Worst Case</span>: <span class="co-c">7n - 1</span></pre>
                <pre><span class="co-y">Best Case</span>: <span class="co-c">5n + 1</span></pre>

                <p class="pl-4">
                    - Loop executes 0 times
                    <br>
                    - If loop executes, best case is when the inner <span class="co-r">if</span> statement always returns false. Therefore, <span class="co-c">5n + 1</span> is the best case
                    <br>
                    - Why: Line 5 is excluded
                </p>
                <pre>Equation: Let <span class="co-c">a</span> be fastest operation time and <span class="co-c">b</span> be the slowest operation time:</pre>
                <pre><span class="co-c">a(7n - 1) &#x2264; T(n) &#x2264; b(7n - 1)</span></pre>
                <pre>Therefore, <span class="co-c">T(n)</span> is bounded by linear functions</pre>
            </div>
        </div>

		<div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ">Growth Rates</h3>
        		<hr>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-auto">
<div class="exBoxKelly  mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">Constant</span>: <span class="co-m">1</span>
<span class="co-y">Logarithmic</span>: <span class="co-m">log(n)</span>  <span class="co-w">/* log base = 2 */</span>
<span class="co-y">Linear</span>: <span class="co-m">n</span>
<span class="co-y">Quadratic</span>: <span class="co-m">n<sup>2</sup></span>
<span class="co-y">Cubic</span>: <span class="co-m">n<sup>3</sup></span>
<span class="co-y">Polynomial</span>: <span class="co-m">n<sup>k</sup></span>  <span class="co-w">/* k &#x2265; 1 */</span>
<span class="co-y">Exponential</span>: <span class="co-m">a<sup>n</sup></span>  <span class="co-w">/* a &gt; 1 */</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>
        <div class="row pl-md-4">
            <div class="col-12">
                <p>Growth rate is not affected by constant factors or lower-order terms</p>
            </div>
        </div>

		<div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading">Asymptotic Complexity</h3>
        		<hr>
            </div>
        </div>

        <div class="row pl-md-4">
            <div class="col-12">
                <p>Worst case running time of an algorithm
                    <br>
                    Do not express as exact time, just the highest-order term
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <h5 class="co-c text-center">Asymptotic Notation</h5>
<div class="exBoxKelly mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">Big Oh</span>: O(n) -&gt; Has upper bound / <span class="co-c">0 &#x2264; f(n) &#x2264; cg(n) &#x2200; n &#x2265; n<sub>0</sub></span>
<span class="co-y">Big Omega</span>: &#x1D76E;(n) -&gt; Has lower bound / <span class="co-c">0 &#x2264; cg(n) &#x2264; f(n) &#x2200; n &#x2265; n<sub>0</sub></span>
<span class="co-y">Big Theta</span>: &#x1D767;(n) -&gt; Has both bounds / <span class="co-c">0 &#x2264; c<sub>1</sub>g(n) &#x2264; f(n) &#x2264; c<sub>2</sub>g(n) &#x2200; n &#x2265; n<sub>0</sub></span>
<span class="co-y">Little Oh</span>: o(n) -&gt; Has upper bound (exclusive)
<span class="co-y">Little Omega</span>: &#x1D788;(n) -&gt; Has lower bound (exclusive)
</pre></td>
</tr></tbody></table>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
            </div>
        </div>
        <div class="row pl-md-4">
            <div class="col-12">
                <p>Big implies inclusive bounds
                    <br>
                    Little implies exclusive bounds
                    <br>
                    These are rate-of-growth relations (RoG)
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
<div class="exBoxKelly mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">Big Oh</span>: RoG -&gt; same as or lower than <span class="co-c">cg(n)</span>
<span class="co-y">Big Omega</span>: &#x1D76E;(n) RoG -&gt; same as or higher than <span class="co-c">cg(n)</span>
<span class="co-y">Big Theta</span>: &#x1D767;(n) RoG -&gt; same as or between <span class="co-c">c<sub>1</sub>g(n) and c<sub>2</sub>g(n)</span>
<span class="co-y">Little Oh</span>: o(n) RoG -&gt; strictly lower <span class="co-c">cg(n)</span>
<span class="co-y">Little Omega</span>: &#x1D788;(n) RoG -&gt; strictly higher than <span class="co-c">cg(n)</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="co-auto">
                <h5 class="co-c text-center">Examples</h5>
<div class="exBoxPurple mb-4">
<figure class="code">
<table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">O(n)
<span class="co-m">    f(n) = 2n + 10</span>
<span class="co-m">    f(n) = n + 1</span>
<span class="co-m">    f(n) = 20000n</span>
O(n<sup>2</sup>)
<span class="co-m">    f(n) = 2n<sup>2</sup> + 10</span>
<span class="co-m">    f(n) = 2n<sup>2</sup> + 30n + 10</span>
<span class="co-m">    f(n) = n<sup>1.99</sup> + 10</span>
</pre></td>
</tr></tbody></table>
</figure>
</div>
            </div>
        </div>
        <div class="row pl-md-4">
            <div class="col-12">
                <p class=" co-c">n<sup>2</sup> <span class="co-w">is not</span>
                    O(n) <span class="co-w">as</span> n<sup>2</sup> &#x2270; <span class="co-w">n (not lt or eq to)</span>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4 mb-4">
                <h3 class="heading ">Math Review Topics</h3>
        		<hr>
            </div>
        </div>

		<div class="row pl-md-4">
            <div class="col-12 mb-4">
                <p>Summations
                    <br>
                    Logarithms and Exponents
                    <br>
                    Proof Techniques
                    <br>
                    Basic Probability
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex mb-4 pl-5 pr-5 justify-content-between">
                <a href="/index.php" style="display: inline-block;">Home</a>
                <a href="./ElementaryDataStructures.php" style="display: inline-block;">Elementary Data Structures</a>
            </div>
        </div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
	?>

</body>

</html>

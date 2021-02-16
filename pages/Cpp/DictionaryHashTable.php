<?php

    session_start();

	$article = "Dict Hash Table";
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
			    <h2 class="col-12 heading mt-3 text-center">Dictionaries and Hash Tables</h2>
            </div>

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Dictionary ADT</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="ml-4">- Searchable collection of <span class="co-y">key-element</span> entries
                        <br>
                        - Keys can be unsorted or sorted
                    </p>
                    <h5 class="text-center co-c">Main Operations</h5>
<div class="exBoxKelly ml-4 mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-m">Let k = key, o = object</span>
<span class="co-y">    findElement</span>(k)
<span class="co-y">    insertItem</span>(k, o)
<span class="co-y">    removeElement</span>(k)
<span class="co-y">    size</span>()
<span class="co-y">    isEmpty</span>()
<span class="co-y">    keys</span>()
<span class="co-y">    elements</span>()
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                    <pre><span class="co-kg">Log File</span>: Dictionary implemented by storing items in an <span class="co-c">unsorted sequence</span></pre>
                    <pre class="co-kg">    insertItem: <span class="co-m">O(n)</span></pre>
                    <pre class="co-kg">    findElement / removeElement: <span class="co-m">O(n)</span> (worst case)</pre>
                    <pre>    Effective for dictionaries that are of small size / insertions are the main operation while searches / removales are rare</pre>
                </div>
            </div>

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Hash Table-Based Dictionaries</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Hash Functions and Hash tables</p>
                    <br>
                    <pre><span class="co-kg">Hash Table</span>: for some key type consists of</pre>
                    <pre>    1] Array of size <span class="co-m">N</span></pre>
                    <pre>    2] Hash function <span class="co-m">h</span></pre>
                    <pre><span class="co-kg">Hash Function</span>: <span class="co-m">h</span> maps keys of a given type to integers in the interval <span class="co-m">[0, N-1]</span></pre>
                    <pre>    <span class="co-m">h(x) = x mod N</span> is a hash function for <span class="co-c">int</span> keys, and <span class="co-m">h(x)</span> is the <span class="co-kg">hash value</span> of key <span class="co-m">x</span></pre>
                    <pre>Store item <span class="co-c">(key, value)</span> at index <span class="co-m">i = h(k)</span></pre>
                    <pre>Each index should have the same probability to be mapped to an item</pre>
                    <h5 class="text-center co-c">Example</h5>
<div class="exBoxPurple mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">Basic Hash Table Dictionary for <span class="co-c">(SSN, Name)</span>:
<span class="co-c">    (853-23-0001, Landen), (877-76-9998, Adam)</span>
<span class="co-y">    h</span>(x) <span class="co-y">=</span> <span class="co-c">Last 4 of x</span>
<span class="co-r">    where</span> x <span class="co-y"> = </span><span class="co-c">SSN</span>

<span class="co-m">    583-23-0001</span> <span class="co-y">--&gt;</span> <span class="co-m">1</span>       hashTable[<span class="co-m">1</span>] <span class="co-y">=</span> <span class="co-c">Landen</span>
<span class="co-m">    877-76-9998</span> <span class="co-y">--&gt;</span> <span class="co-m">9998</span>    hashTable[<span class="co-m">9998</span>] <span class="co-y">=</span> <span class="co-c">Adam</span>
</pre></td>
</tr></tbody></table></pre>
<p class="% ml-2 mb-2"></p>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Hash Functions</p>
                    <br>
                    <pre><span class="co-kg">Hash Code Map</span>: h<sub>1</sub>: keys --&gt;  <span class="co-c">ints</span></pre>
                    <pre><span class="co-kg">Compression Map</span>: h<sub>2</sub>:  <span class="co-c">ints</span> --&gt; <span class="co-m">[0, N-1]</span></pre>
                    <pre>Together, they can be expressed as <span class="co-m">h(x) = h<sub>2</sub>(h<sub>1</sub>(x))</span></pre>
                    <pre>Goal: Disperse keys in a &apos;random&apos; way / minimal collision / &apos;random&apos; placement</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Hash Code Maps</p>
                    <br>
                    <pre>Recall: keys --&gt;  <span class="co-c">ints</span></pre>
                    <pre><span class="co-kg">Memory Address</span>: Memory address of key object is converted into an <span class="co-c">int</span>, but 2 key objects with same value have different hash codes <span class="co-y">(Java uses this)</span></pre>
                    <pre><span class="co-kg">Integer Cast</span>: Bits of the key is converted into an <span class="co-c">int</span> / good for small keys (Num of bits at most # of bits in an <span class="co-c">int</span>) </pre>
                    <pre><span class="co-kg">Component Sum</span>: Good for large keys / bits of the key are split up in groups of equal size and <span class="co-y">sum components</span>. However, many strings have same sum</pre>
                    <pre><span class="co-kg">Polynomial Accumulation</span>: Good for strings / bits of the key are split up in groups of equal size and <span class="co-y">evaluate the polynomial (synthetic division)</span>.</pre>
                    <pre>Useful for storing passwords</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Compression Maps:</p>
                    <br>
                    <pre>Recall: <span class="co-c">ints</span> --&gt; <span class="co-m">[0, N-1]</span></pre>
                    <pre><span class="co-kg">Division</span>: <span class="co-m">h<sub>2</sub>(y) = y mod N</span>, but repeated keys of the form <span class="co-m">iN + j</span> cause collisions:</pre>
                    <pre>    Ex] <span class="co-o">N = 11 and iN+j where j is fixed and i is varying</span></pre>
                    <pre>        <span class="co-o">y = 1 --&gt; 0(11) + 1 --&gt; 1 mod 11 = 1</span></pre>
                    <pre>        <span class="co-o">y = 12 --&gt; 1(11) + 1 --&gt; 12 mod 11 = 1</span></pre>
                    <pre><span class="co-kg">Multiply, Add, and Divide (MAD)</span>: <span class="co-m">h<sub>2</sub>(y) = ((ay+b) mod p) mod N</span>, and is a good function</pre>
                    <pre>    Good functions guarantee small collision probability</pre>
                    <pre>    <span class="co-m">N</span> is prime to prevent collisions:</pre>
                    <pre>    Ex] <span class="co-o">N = 11 and ((2y + 3) mod 13) mod 11</span></pre>
                    <pre>        <span class="co-o">y = 1 --&gt; ((2*1 + 3) mod 13) mod 11 = (5 mod 13) mod 11 = 5</span></pre>
                    <pre>        <span class="co-o">y = 12 --&gt; ((2*12 + 3) mod 13) mod 11 = (27 mod 13) mod 11 = 1</span></pre>
                    <pre>Useful for storing passwords</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Universal Hashing:</p>
                    <br>
                    <pre><span class="co-kg">Universal</span>: Family of hash functions such that for any</pre>
                    <pre>    <span class="co-m">0 &#x2264; j,k &#x2264; M-1</span></pre>
                    <pre>    <span class="co-m"><span class="co-y">Pr</span>( <span class="co-y">h</span>(j)=<span class="co-y">h</span>(k) ) &#x2264; 1/N</span></pre>
                    <h5 class="co-c text-center">Theorem</h5>
<div class="exBoxCyan mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">The set of all functions, <span class="co-y">h</span>
<span>    Choose <span class="co-c">p</span> as a prime between <span class="co-c">M</span> and <span class="co-c">2M</span></span>
<span class="co-m">    <span class="co-g">Randomly select</span> 0 <span class="co-y">&lt;</span> a <span class="co-y">&lt;</span> p <span class="co-g">and</span> 0 <span class="co-y">&#x2264;</span> b <span class="co-y">&lt;</span> p</span>
<span>    <span class="co-m">a, b</span> are nonnegative <span class="co-c">ints</span> such that <span class="co-m">a <span class="co-y">mod</span> N <span class="co-y">&#x2260;</span> 0</span></span>
<span>        (Otherwise every <span class="co-c">int</span> would map to the same value <span class="co-m">b</span>)</span>
    Define <span class="co-y">h</span>(k) <span class="co-y">=</span> ((ak <span class="co-y">+</span> b) <span class="co-y">mod</span> p) <span class="co-y">mod</span> N
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                <pre><span class="co-kg">Takeaway</span>:</pre>
                <pre>    There exists a hash function that guarantees keys are evenly distributed, so any 2 distinct keys have a probability no more than <span class="co-m">1/N</span> of mapping to the same hash value</pre>
                <pre>    <span class="co-kg">Multiply, Add, and Divide</span> is universal and runs in <span class="co-m">O(1)</span></pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="heading ml-4">Collision Handling</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <pre><span class="co-kg">Collisions</span>: When different elements map to the same cell</pre>
                    <pre><span class="co-kg">Chaining</span>: Each cell of the table points to a linked list of elements, so collisions can exist at the same hash. Requires additional memory</pre>
                    <pre><span class="co-kg">Open Addressing</span>: Colliding item is placed elsewhere in the table. No additional memory but complex searching/removing</pre>
                    <pre>    Common Types: <span class="co-kg">Linear Probing, Quadratic Probing, Double Hashing</span></pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Linear Probing</p>
                    <br>
                    <pre>Place the colliding item in the next available cell</pre>
                    <pre><span class="co-m">A[(h(k) + i) mod N]</span> for <span class="co-m">i = 0, 1, 2, ...</span></pre>
                    <pre>Colliding items cluster causing future collisions a longer sequence of probes (searches)</pre>
                    <h5 class="text-center co-c">Example</h5>
<div class="exBoxCyan ml-4 mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g"><span class="co-y">h</span>(x) <span class="co-y">=</span> x <span class="co-y">mod</span> <span class="co-m">13</span>
<span>    Insert keys <span class="co-m">18, 41, 22, 44, 49, 32, 31, 73</span> using <span class="co-y">h</span>(x)</span>
<span class="co-y">    h</span>(<span class="co-m">18</span>) <span class="co-y">=</span> <span class="co-m">5</span>
<span class="co-y">    h</span>(<span class="co-m">41</span>) <span class="co-y">=</span> <span class="co-m">2</span>
<span class="co-y">    h</span>(<span class="co-m">22</span>) <span class="co-y">=</span> <span class="co-m">9</span>
<span class="co-y">    h</span>(<span class="co-m">44</span>) <span class="co-y">=</span> <span class="co-c">5 --&gt; 6</span>
<span class="co-y">    h</span>(<span class="co-m">59</span>) <span class="co-y">=</span> <span class="co-m">7</span>
<span class="co-y">    h</span>(<span class="co-m">32</span>) <span class="co-y">=</span> <span class="co-c">6 --&gt; 7 --&gt; 8</span>
<span class="co-y">    h</span>(<span class="co-m">31</span>) <span class="co-y">=</span> <span class="co-c">5 --&gt; 6 --&gt; 7 --&gt; 8 --&gt; 9 --&gt; 10</span>
<span class="co-y">    h</span>(<span class="co-m">73</span>) <span class="co-y">=</span> <span class="co-c">8 --&gt; 9 --&gt; 10 --&gt; 11</span>
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                    <pre><span class="co-kg">Searching</span>: Uses <span class="co-y">findElement(k)</span></pre>
                    <pre>    1] Start at cell <span class="co-m">h(k)</span></pre>
                    <pre>    2] Check consecutive locations until:</pre>
                    <pre>        An item with key <span class="co-m">k</span> is found OR</pre>
                    <pre>        An empty cell is found OR</pre>
                    <pre>        <span class="co-m">N</span> cells have been unsuccessfully probed</pre>
                    <pre><span class="co-kg">Removing</span>: Uses <span class="co-y">removeElement(k)</span></pre>
                    <pre>    <span class="co-r">An object called <span class="co-c">AVAILABLE</span> replaces deleted elements</span></pre>
                    <pre>    1] Search for item with key <span class="co-m">k</span></pre>
                    <pre>    2] found ? replace with <span class="co-c">AVAILABLE</span> and return element : return <span class="co-c">NO_SUCH_KEY</span></pre>
                    <pre><span class="co-kg">Insertion</span>: Uses <span class="co-y">insertItem(k, o)</span></pre>
                    <pre>    Throw exception if table is full</pre>
                    <pre>    1] Start at cell <span class="co-m">h(k)</span></pre>
                    <pre>    2] Search consecutive cells until a cell <span class="co-m">i</span> is found that's empty or contzains <span class="co-c">AVAILABLE</span></pre>
                    <pre>    3] Store item <span class="co-m">(k, o)</span> in cell <span class="co-m">i</span></pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Double Hashing</p>
                    <br>
                    <pre><span class="co-kg">Secondary Hash Function</span> <span class="co-m">d(k)</span> used to place items in first free cell</pre>
                    <pre>    <span class="co-m">A[(h(k) + id(k)) mod N]</span> for <span class="co-m">i = 0, 1, 2, ...</span></pre>
                    <pre><span class="co-m">d(k)</span> cannot have zero values <span class="co-r">(This is the interval function)</span></pre>
                    <pre>The table size <span class="co-m">N</span> must be prime to allow probing of all cells</pre>
                    <pre>Works like <span class="co-kg">Linear Probing</span>, but the interval to the next cell is not always 1</pre>
                    <pre>    The interval depends on the incoming data <span class="co-t">(ex] Check every 3 cells after the original placement)</span></pre>
                    <pre>    This makes it such that values mapping to the same location will have different intervals</pre>
                    <h5 class="co-c text-center">Example</h5>
<div class="exBoxCyan ml-4 mb-4" style="margin: auto;">
<figure class="code">
<pre><table class="table borderless my-auto">
<tbody><tr>
<td><pre class="@ co-g">N <span class="co-y">=</span> <span class="co-m">13</span>
<span class="co-y">h</span>(k) <span class="co-y">=</span> k <span class="co-y">mod</span> <span class="co-m">13</span>
<span class="co-y">d</span>(k) <span class="co-y">=</span> <span class="co-m">1</span> <span class="co-y">+</span> (k <span class="co-y">mod</span> <span class="co-m">7</span>)
    Insert keys <span class="co-m">18, 41, 22, 44, 49, 32, 31, 73</span> using <span class="co-y">h</span>(k) then <span class="co-y">d</span>(k)
<span class="co-y">    h(<span class="co-m">18</span>) = <span class="co-m">5</span> | d(<span class="co-m">18</span>) = <span class="co-m">5</span> | probes: <span class="co-m">5</span></span>
<span class="co-y">    h(<span class="co-m">41</span>) = <span class="co-m">2</span> | d(<span class="co-m">41</span>) = <span class="co-m">7</span> | probes: <span class="co-m">2</span></span>
<span class="co-y">    h(<span class="co-m">22</span>) = <span class="co-m">9</span> | d(<span class="co-m">22</span>) = <span class="co-m">2</span> | probes: <span class="co-m">9</span></span>
<span class="co-y">    h(<span class="co-m">44</span>) = <span class="co-m">5</span> | d(<span class="co-m">44</span>) = <span class="co-m">3</span> | probes: <span class="co-c">5 --&gt; 8</span></span>
<span class="co-y">    h(<span class="co-m">59</span>) = <span class="co-m">7</span> | d(<span class="co-m">59</span>) = <span class="co-m">4</span> | probes: <span class="co-m">7</span></span>
<span class="co-y">    h(<span class="co-m">32</span>) = <span class="co-m">6</span> | d(<span class="co-m">32</span>) = <span class="co-m">5</span> | probes: <span class="co-m">6</span></span>
<span class="co-y">    h(<span class="co-m">31</span>) = <span class="co-m">5</span> | d(<span class="co-m">31</span>) = <span class="co-m">4</span> | probes: <span class="co-c">5 --&gt; 9 --&gt; 0</span></span>
<span class="co-y">    h(<span class="co-m">73</span>) = <span class="co-m">8</span> | d(<span class="co-m">73</span>) = <span class="co-m">4</span> | probes: <span class="co-c">8 --&gt; 12</span></span>
</pre></td>
</tr></tbody></table></pre>
</figure>
</div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Performance of Hashing</p>
                    <br>
                    <pre><span class="co-y">Worst Case</span>: (when all keys collide) Searches, insertions, removals are <span class="co-m">O(n)</span></pre>
                    <pre><span class="co-y">Load Factor</span>: (expected size of each cell (bucket))<span class="co-m">a = n/N</span> affects performance</pre>
                    <pre><span class="co-y"># Probes for Insertion</span>: </pre>
                    <pre>    open addressing is <span class="co-m">1/(1-a)</span></pre>
                    <pre>    chaining is <span class="co-m">O(1+a)</span></pre>
                    <pre><span class="co-y">Expected Running Time</span>: <span class="co-m">O(1)</span></pre>
                    <pre>Hashing is fast as long as load factor isn't near 100%</pre>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="algoNotesPara col-12 col-md-10">
                    <p class="co-c text-center">Chaining vs Open Addressing</p>
                    <br>
                    <pre><span class="co-y">Chaining</span></pre>
                    <pre>    Less sensitive to hashing and loaf factor</pre>
                    <pre>    Supports <span class="co-m">a &gt; 100%</span></pre>
                    <pre><span class="co-y">Open Addressing</span></pre>
                    <pre>    Careful selection of hashing to avoid clustering</pre>
                    <pre>    Degrades past <span class="co-m">a &gt; 70%</span></pre>
                    <pre>    Can't support <span class="co-m">a &gt; 100%</span></pre>
                    <pre>    Better memory usage</pre>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex mb-4 pl-5 pr-5 justify-content-between">
                    <a href=".\ElementaryDataStructures.php" style="display: inline-block;">Elementary Data Structures</a>
                    <a href=".\PriorityQueuesHeap.php" style="display: inline-block;">Priority Queues / Heaps</a>
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

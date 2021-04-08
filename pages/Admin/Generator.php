<?php

    session_start();

    if(!($_SESSION) || empty($_SESSION) || ($_SESSION['Privilege'] == "Student"))
        header("Location: ../../index.php");

	$article = "Code Generator";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>

    <?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div class="container-fluid mb-4">
	    <div class="row">
	        <div class="col-12">
		        <h2 class="heading mt-3 text-center">Code Generator - V2.0</h2>
                <h5 class="mt-3 text-center">TODO: OUTPUT whitespace/color, toggle output / insert line where needed / handle many multiple lines so line and output visible</h5>
		    </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-12 col-md-9">
<div class="exBoxPurple" id="result">
<figure class="code">
<table class="table borderless my-auto">
<tr>
<td><pre id="lineNum" class="! co-o">
</pre></td>
<td><pre class="@ co-g" id="sourceCode">
</pre></td>
</tr></table>
<p class="% ml-2 mb-2" id="output"></p>
</figure>
</div>
            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-1 ml-auto">
                        <h6 class="">Ln #</h6>
                    </div>
                    <div class="col-9 mx-auto">
                        <h6 class="">Code</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-12 col-md-10 ">
		        <form>
        			<div class="form-group form-row">
                        <div class="col-1 ml-auto">
        				    <textarea class="form-control ln" rows="1"></textarea>
                        </div>
                        <div class="col-9 mx-auto">
        				    <textarea class="form-control sc" rows="1"></textarea>
                        </div>
        			</div>
		        </form>
            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-12 col-md-6 text-center">
    			<button class="btn btn-primary" id="update">Update/Copy</button>
    			<button class="btn btn-success" id="add">New Row</button>
    			<button class="btn btn-danger" id="del">Del Row</button>
		    </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-12 align-items-center">
			    <textarea class="form-control col-6 mx-auto" id="out" rows="3">OUTPUT: </textarea>
            </div>
		</div>

        <div class="row mt-4">
            <div class="col-12">
        		<h3 class="heading ml-4">Instructions</h3>
        		<hr>
        		<ul class="inst">
                    <li>First field is line number</li>
                    <li>Second field is code</li>
        			<li>Code: Whitespace is verbatim</li>
        			<li>Update/Copy: Change the example code box (purple border) and copy the code to clipboard</li>
        			<li>New Row: Add a new line of code</li>
        			<li>Del Row: Delete a row of code (currently deletes the last row per click)</li>
        			<li>Colors (can be uppercase or lowercase):
        				<ul>
        					<li class="co-c">``C is cyan
        						<ul>
        							<li>Primitive data types</li>
        							<li>struct, class, union</li>
        							<li>namespace</li>
        						</ul>
        					</li>
        					<li class="co-g">``G is green
        						<ul>
        							<li>Standard text color (already implemented)</li>
        						</ul>
        					</li>
        					<li class="co-m">``M is magenta
        						<ul>
        							<li>Literals</li>
        						</ul>
        					</li>
        					<li class="co-o">``O is orange
        						<ul>
        							<li>Line numbers (already implemented)</li>
        						</ul>
        					</li>
        					<li class="co-r">``R is red
        						<ul>
        							<li>Labels</li>
        							<li>Most keywords</li>
        							<li>Flow control (if, switch, for, while)</li>
        							<li>using</li>
        							<li>continue, break</li>
        						</ul>
        					</li>
        					<li class="co-t">``T is teal
        						<ul>
        							<li>string</li>
        							<li>User-defined types (e.g. class name)</li>
        						</ul>
        					</li>
        					<li class="co-w">``W is white
        						<ul>
        							<li>Comments</li>
        						</ul>
        					</li>
        					<li class="co-y">``Y is yellow
        						<ul>
        							<li>Operators</li>
        						</ul>
        					</li>
        					<li>`~ is &lt;/span&gt; (e.g. end current color)</li>
        				</ul>
        			</li>
                </ul>
                <p class="text-justify ml-2 mr-2 mt-3 inst">
        			EX) ``Cint`~ x = ``M1`~; <em>produces</em> <br> &emsp;&emsp; <span class="co-g"><span class="co-c">int</span> x = <span class="co-m">1</span>;</span><br>
        		</p>
                <ul class="inst">
        			<li>OUTPUT: Results of the program
                        <ul>
                            <li>``N is a newline for multi-line output</li>
                            <li>Output is by default white and has no additional colors</li>
                        </ul>
                    </li>
        		</ul>
        		<p class="text-justify ml-2 mr-2 mt-3 inst">
                    EX) OUTPUT: ``N 1 ``N 2 ``N 3 <em>produces</em> <br> &ensp; &ensp; OUTPUT:<br> &ensp; &ensp; 1<br> &ensp; &ensp; 2<br> &ensp; &ensp; 3
        		</p>
            </div>
        </div>
    </div>

    <?php
        require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
    ?>

    <script src="<?php echo $headerData['Path']; ?>inc/js/codeGenerator.js"></script>

</body>
</html>

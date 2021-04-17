<?php

    session_start();

	$article = "C++ Topics";
	require_once("../../inc/php/fringes/header.inc.php");

    $pdfLocation = "window.location.href='$headerData[Path]inc/cppPDF/";
    $idNum = 0;
?>

</head>

<body id="topicsBkgnd">

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
		<div class="row">
		    <div id="cppTopics" class="col-12">
			    <h2 class="heading mt-3 text-center">C++ PDFs - Needs Reviewed/Updated</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="ml-4">
                    <li><a href="#BASICS">Basics</a></li>
                    <li><a href="#OOP">Object-Oriented</a></li>
                    <li><a href="#DS">Data Structures</a></li>
                    <li><a href="#MISC">Miscellaneous</a></li>
                </ul>
            </div>
        </div>

        <div id="linkTopicsBkgnd">
    		<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 id="BASICS" class="heading ml-4">Basics</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4">
    			<div class="col-12">
                    <p class="ml-2">Primitives</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Types.pdf';">Types
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Variable.pdf';">Variables
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>ConstVariable.pdf';">Const Variables
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Branching and Looping</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>IfElseIfElse.pdf';">If/Else If/Else
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Switch.pdf';">Switch
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>WhileLoop.pdf';">While Loop
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>DoWhileLoop.pdf';">Do While Loop
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>ForLoop.pdf';">For Loop
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>NestedFORLoops.pdf';">Nested For Loops
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
    			<div class="col-12">
                    <p class="ml-2">Functions</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Functions.pdf';">Functions
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>CallByValue.pdf';">Call by Value
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>CallByReference.pdf';">Call by Reference
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>FunctionOverloading.pdf';">Function Overloading
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Visibility</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Scope.pdf';">Variable Scope
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Namespaces.pdf';">Namespaces
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>StandardNamespace.pdf';">Standard Namespace
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
    			<div class="col-12">
                    <p class="ml-2">Numerical</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Math.pdf';">Math
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Srand.pdf';">Pseudorandom Numbers
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Files</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>IFiles.pdf';">Input Files
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>OFiles.pdf';">Output Files
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Arrays and Strings</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>Array.pdf';">Arrays
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>TwoDArray.pdf';">2D Arrays
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>C-Strings.pdf';">C-strings
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>String.pdf';">String Class
                            </button>
                        </li>
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-grn mb-3"
                                onclick="<?php echo $pdfLocation; ?>StringMembers.pdf';">String Member Functions
                            </button>
                        </li>
                    </ol>
    			</div>
    		</div>

            <div class="row">
                <div class="col-12 mt-5 mb-4">
                    <h3 id="OOP" class="heading ml-4">Object-Oriented</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Primitives</p>
                </div>
    			<div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>Struct.pdf';">Structs
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Class Basics</p>
                </div>
    			<div class="col-12">
                    <ol class="pl-5">
    					<li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>ClassTerms.pdf';">Class Terms
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>Classes.pdf';">Classes
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Class Functions</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>Constructors.pdf';">Constructors
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>Destructor.pdf';">Destructors
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>MemberFunctions.pdf';">Member Functions
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>AccessorMutator.pdf';">Accessors and Mutators
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>FriendFunctions.pdf';">Friend Functions
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>OverloadedOperator.pdf';">Operator Overloading
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Rules</p>
                </div>
    			<div class="col-12">
                    <ol class="pl-5">

                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>RuleOfThree.pdf';">Role of Three (OLD)
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Inheritance</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>Inheritance.pdf';">Inheritance
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-cyan mb-3"
                                onclick="<?php echo $pdfLocation; ?>VirtualFunctions.pdf';">Virtual Functions
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5 mb-4">
                    <h3 id="DS" class="heading ml-4">Data Structures</h3>
            		<hr>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Basics</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>Templates.pdf';">Templates
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>Recursion.pdf';">Recursion
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>Pointers.pdf';">Pointers
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>Iterators.pdf';">Iterators
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Structures</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>Vector.pdf';">Vector
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>LinkedList.pdf';">Linked List
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>Stack.pdf';">Stack
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>Queue.pdf';">Queue
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Trees and Hash</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>BinaryTreeTerms.pdf';">Binary Tree Terms
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>BinarySearchTree.pdf';">Binary Search Tree
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>TreeTraversals.pdf';">Binary Tree Traversals
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>MaxHeap.pdf';">Maximum Heap
                            </button>
                        </li>
                        <li>
                            <button id="<?php echo "btn" . strval($idNum++) ?>" class="btn-push btn-push-ylw mb-3"
                                onclick="<?php echo $pdfLocation; ?>HashTable.pdf';">Hash Table
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5 mb-4">
                    <h3 id="MISC" class="heading ml-4">Miscellaneous</h3>
                    <hr>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="ml-2">Primitives</p>
                </div>
                <div class="col-12">
                    <ol class="pl-5">
                        <li>
                            <button id="<?php echo "btn" . strval($idNum) ?>" class="btn-push btn-push-prpl mb-3"
                                onclick="<?php echo $pdfLocation; ?>SyntacticSugar.pdf';">Syntactic Sugar
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
	?>

</body>
</html>

<?php

    session_start();

	$article = "Algorithm Dir";
	require_once("../../inc/php/fringes/header.inc.php");

    $idNum = 0;
?>

</head>

<body id="topicsBkgnd">

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
		<div class="row">
			<h2 class="col-12 heading mt-3 text-center">Algorithms Class Notes Directory</h2>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./AlgoNotes.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnGrn btn-push btn-push-grn mb-4" role="button">
                    Pseudocode <br>
                    Growth <br>
                    Analysis <br>
                    Math Review
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./ElementaryDataStructures.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnYlw btn-push btn-push-ylw mb-4">
                    Elementary Data Structures <br>
                    Stack <br>
                    Amortization <br>
                    Queue <br>
                    List <br>
                    Vector <br>
                    Sequence <br>
                    Tree
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./DictionaryHashTable.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnCyan btn-push btn-push-cyan mb-4">
                    Dictionary <br>
                    Hash Table (Dictionary) <br>
                    Collision Handling <br>
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./PriorityQueuesHeap.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnGrn btn-push btn-push-grn mb-4">
                    Priority Queues <br>
                    Selection Sort <br>
                    Insertion Sort <br>
                    Heap-Based Priority Queue <br>
                    Misc Heap Info
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./BinaryTreeOrdDict.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnYlw btn-push btn-push-ylw mb-4">
                    Ordered Dictionaries <br>
                    Binary Tree Operations <br>
                    Worst-Case Compare (unordered / ordered)
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./RedBlackTrees.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnCyan btn-push btn-push-cyan mb-4">
                    (2,4) Trees <br>
                    Red-Black Trees <br>
                    Fixing Double Red <br>
                    Fixing Double Black <br>
                    Reorganization
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./MergeQuickSelection.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnGrn btn-push btn-push-grn mb-4">
                    Sets <br>
                    Merge Sort <br>
                    Selection Sort <br>
                    Quick Sort
                </a>
            </div>
        </div>
    </div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
	?>

</body>
</html>

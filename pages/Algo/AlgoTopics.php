<?php

    session_start();

	$article = "Algorithm Dir";
	require_once("../../inc/php/Fringes/header.inc.php");

    $idNum = 0;
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

		<div class="container-fluid">
		<div class="row">
		<div id="cppTopics" class="col-12">
            <div class="row mt-3">
			    <h2 class="col-12 heading mt-3 text-center">Algorithms Class Notes Directory</h2>
            </div>
            <div class="container mt-4 mb-4">

                <div class="d-flex justify-content-center">
                    <a href="./AlgoNotes.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnGrn btn-push btn-push-grn mb-5" role="button">
                            Pseudocode <br>
                            Growth <br>
                            Analysis <br>
                            Math Review
                    </a>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="./ElementaryDataStructures.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnYlw btn-push btn-push-ylw mb-5">
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

                <div class="d-flex justify-content-center">
                    <a href="./DictionaryHashTable.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnCyan btn-push btn-push-cyan mb-5">
                        Dictionary <br>
                        Hash Table (Dictionary) <br>
                        Collision Handling <br>
                    </a>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="./PriorityQueuesHeap.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnGrn btn-push btn-push-grn mb-5">
                        Priority Queues <br>
                        Selection Sort <br>
                        Insertion Sort <br>
                        Heap-Based Priority Queue <br>
                        Misc Heap Info
                    </a>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="./BinaryTreeOrdDict.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnYlw btn-push btn-push-ylw mb-5">
                        Ordered Dictionaries <br>
                        Binary Tree Operations <br>
                        Worst-Case Compare (unordered / ordered)
                    </a>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="./RedBlackTrees.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnCyan btn-push btn-push-cyan mb-5">
                        (2,4) Trees <br>
                        Red-Black Trees <br>
                        Fixing Double Red <br>
                        Fixing Double Black <br>
                        Reorganization
                    </a>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="./MergeQuickSelection.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnGrn btn-push btn-push-grn mb-5">
                        Sets <br>
                        Merge Sort <br>
                        Selection Sort <br>
                        Quick Sort
                    </a>
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

<?php

    session_start();

	$article = "Algorithm Dir";
	require_once("../../inc/php/Fringes/header.inc.php");

    $pdfLocation = "window.location.href='$headerData[Path]cppPDF/";
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
                    <button id="<?php echo "btn" . strval($idNum++) ?>" class="algoDirBtnSize algoBtnInlnBk btn-push btn-push-grn mb-5"
                        onclick="window.location.href='AlgoNotes.php';">Pseudocode <br>
                        Growth <br>
                        Analysis <br>
                        Math Review
                    </button>
                </div>

                <div class="d-flex justify-content-center">
                    <button id="<?php echo "btn" . strval($idNum++) ?>" class="algoDirBtnSize algoBtnInlnBk btn-push btn-push-ylw mb-5"
                        onclick="window.location.href='ElementaryDataStructures.php';">Elementary Data Structures <br>
                        Stack <br>
                        Amortization <br>
                        Queue <br>
                        List <br>
                        Vector <br>
                        Sequence <br>
                        Tree
                    </button>
                </div>

                <div class="d-flex justify-content-center">
                    <button id="<?php echo "btn" . strval($idNum++) ?>" class="algoDirBtnSize algoBtnInlnBk btn-push btn-push-cyan mb-5"
                        onclick="window.location.href='DictionaryHashTable.php';">Dictionary <br>
                        Hash Table (Dictionary) <br>
                        Collision Handling <br>
                    </button>
                </div>

                <div class="d-flex justify-content-center">
                    <button id="<?php echo "btn" . strval($idNum++) ?>" class="algoDirBtnSize algoBtnInlnBk btn-push btn-push-grn mb-5"
                        onclick="window.location.href='PriorityQueuesHeap.php';">Priority Queues <br>
                        Selection Sort <br>
                        Insertion Sort <br>
                        Heap-Based Priority Queue <br>
                        Misc Heap Info
                    </button>
                </div>

                <div class="d-flex justify-content-center">
                    <button id="<?php echo "btn" . strval($idNum++) ?>" class="algoDirBtnSize algoBtnInlnBk btn-push btn-push-ylw mb-5"
                        onclick="window.location.href='BinaryTreeOrdDict.php';">Ordered Dictionaries <br>
                        Binary Tree Operations <br>
                        Worst-Case Compare (unordered / ordered)
                    </button>
                </div>

                <div class="d-flex justify-content-center">
                    <button id="<?php echo "btn" . strval($idNum++) ?>" class="algoDirBtnSize algoBtnInlnBk btn-push btn-push-cyan mb-5"
                        onclick="window.location.href='RedBlackTrees.php';"> (2,4) Trees <br>
                        Red-Black Trees <br>
                        Fixing Double Red <br>
                        Fixing Double Black <br>
                        Reorganization
                    </button>
                </div>

                <div class="d-flex justify-content-center">
                    <button id="<?php echo "btn" . strval($idNum++) ?>" class="algoDirBtnSize algoBtnInlnBk btn-push btn-push-grn mb-5"
                        onclick="window.location.href='MergeQuickSelection.php';"> Merge Sort <br>
                        Quick Sort <br>
                        Selection Sort
                    </button>
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

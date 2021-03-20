//BinarySearchTree.cpp
#include <iostream>
#include <fstream>
#include <iomanip>
#include <stack>

using std::cout; using std::endl;
using std::setw; using std::left;
using std::ifstream; using std::stack;

struct Node
{
    int data;
    Node *left = nullptr;
    Node *right = nullptr;
};

//Function to read operation code and values from file
void readFile(Node* &nodePtr);

//Function to insert data from file by creating new node
Node* insertNode(Node* &nodePtr, int d);

//Function to delete node if present
Node* deleteNode(Node* &nodePtr, int d);

//Display functions
//Numerical order from least to greatest
void displayInorder(Node* nodePtr);

//Numerical order from greatest to least
void displayRev(Node* nodePtr);

//Display parent node before children
void displayPreorder(Node* nodePtr);

//Display parent node after children
void displayPostorder(Node* nodePtr);

int main()
{
	Node* trial = nullptr;

	readFile(trial);

	cout << "\nIn-order Display:\n";
	displayInorder(trial);

    cout << "\nReverse Display:\n";
    displayRev(trial);

    cout << "\nPre-order Display:\n";
    displayPreorder(trial);

    cout << "\nPost-order Display:\n";
    displayPostorder(trial);
}

void readFile(Node* &nodePtr)
{
    //Open file and check to make sure it open successfully
	ifstream dataFile("BinaryTreeData.txt");
	if(!dataFile) {
		cout << "File Failed To Open\n";
		exit(1);
	}

    //Variables to read from file
	char opCode;
	int fileData;

	cout << setw(4) << left; //Output formatting
    //Loop as long as there is data to be read from file
	while(dataFile >> opCode >> fileData)
	{
		switch(opCode) {
            //I = Insert data
			case 'I': { if(nodePtr == nullptr)
						    cout << fileData << " Is Original Root\n";
						insertNode(nodePtr, fileData);
						break;
					  }
            //D = Delete data
			case 'D': { if(nodePtr == nullptr)
						    cout << "Empty Tree. Nothing To Delete\n";
						deleteNode(nodePtr, fileData);
						  break;
					  }
            //Case for any other OpCode          
			default: cout << "Invalid OpCode. Ignoring Line\n";
		}
	}

	dataFile.close();
}

//Function to insert node
Node* insertNode(Node* &nodePtr, int d)
{
    //Base case ... Create node
	if(nodePtr == nullptr) {
		nodePtr = new Node;
        nodePtr->data = d;
		return nodePtr;
	}

	cout << setw(4) << left;
    //If incoming data is less than or equal to node
	if(d <= nodePtr->data) {
        //If no other nodes to be compared
		if(nodePtr->left == nullptr) {
            //Recursive call to create left child
			nodePtr->left = insertNode(nodePtr->left, d);
            //Display insertion
			cout << nodePtr->left->data << " Inserted As Left  Child. "
				 << "Parent Node: " << nodePtr->data << endl;
        //More nodes to be compared / Recursive call         
		} else {
			nodePtr->left = insertNode(nodePtr->left, d);
		}
    //If incoming data is more than node    
	} else {
        //If no other nodes to be compared
		if(nodePtr->right == nullptr) {
            //Recursive call to create right child
			nodePtr->right = insertNode(nodePtr->right, d);
            //Display insertion
			cout << nodePtr->right->data << " Inserted As Right Child. "
				 << "Parent Node: " << nodePtr->data << endl;
        //More nodes to be compared / Recursive call
		} else {
			nodePtr->right = insertNode(nodePtr->right, d);
		}
    }

	return nodePtr;
}

//Function to delete node if it exists
Node* deleteNode(Node* &nodePtr, int d)
{
    //Node not found in tree
	if(nodePtr == nullptr) {
		cout << setw(4) << d << " Not Found In Tree\n";
		return nodePtr;
	}
	
    //Move left if input is less than node data
	if(d < nodePtr->data) {
		nodePtr->left = deleteNode(nodePtr->left, d);
    //Move right if input is more than node data
	} else if (d > nodePtr->data) {
		nodePtr->right = deleteNode(nodePtr->right, d);
    //If input is equal to node data    
	} else {
        //If node only has left child
        if(nodePtr->left && nodePtr->right == nullptr) {
            //Temporary Node pointer to left child
            Node* temp = nodePtr->left;
            //Delete node
            delete nodePtr;
            cout << setw(4) << d << " Deleted From Tree\n";
            //Return node pointer to be returned to reconnect binary tree
            return temp;
        //If node only has right child    
        } else if(nodePtr->left == nullptr && nodePtr->right) {
            //Temporary Node pointer to right child
            Node* temp = nodePtr->right;
            //Delete node
            delete nodePtr;
            cout << setw(4) << d << " Deleted From Tree\n";
            //Return node pointer to be returned to reconnect binary tree
            return temp;
        //If the node is a leaf    
        } else if(nodePtr->left == nullptr && nodePtr->right == nullptr) {
            //Delete node 
            delete nodePtr;
            cout << setw(4) << d << " Deleted From Tree\n";
            return nullptr;
        //If node has both left child and right child    
        } else {
            //Traverse right subtree to find smallest node
            Node* findSmallest = nodePtr->right;
            while(findSmallest->left)
                findSmallest = findSmallest->left;
            //Swap current node's data with smallest node's data from the
            //right subtree. The swap is to ensure proper display of which 
            //node is actually being deleted. Without the swap of the data, 
            //the moved node would display as being deleted (findSmallest).
            int temp = nodePtr->data;
            nodePtr->data = findSmallest->data;
            findSmallest->data = temp;
            //Delete right subtree's smallest node
            nodePtr->right = deleteNode(nodePtr->right, findSmallest->data);
		}
	}

	return nodePtr;
}

void displayInorder(Node* nodePtr)
{
    //As long as there is a valid node...
	if(nodePtr) {
        //Traverse left subtree
		displayInorder(nodePtr->left);
        //Display node data
		cout << left;
		cout << setw(4) << "Node: " << setw(4) << nodePtr->data << endl;
        //Traverse right subtree
		displayInorder(nodePtr->right);
	}
}

void displayRev(Node* nodePtr)
{
    //As long as there is a valid node...
	if(nodePtr) {
        //Traverse right subtree
		displayRev(nodePtr->right);
        //Display node data
        cout << left;
		cout << setw(4) << "Node: " << setw(4) << nodePtr->data << endl;
        //Traverse left subtree
		displayRev(nodePtr->left);
	}
}

void displayPreorder(Node* nodePtr)
{
    //As long as there is a valid node...
	if(nodePtr) {
        //Display node data
        cout << left;
		cout << setw(4) << "Node: " << setw(4) << nodePtr->data << endl;
        //Traverse left subtree
		displayPreorder(nodePtr->left);
        //Traverse right subtree
		displayPreorder(nodePtr->right);
	}
}

void displayPostorder(Node* nodePtr)
{
    //As long as there is a valid node...
	if(nodePtr) {
        //Traverse left subtree
		displayPostorder(nodePtr->left);
        //Traverse right subtree
		displayPostorder(nodePtr->right);
        //Display node data
        cout << left;
		cout << setw(4) << "Node: " << setw(4) << nodePtr->data << endl;
	}
}

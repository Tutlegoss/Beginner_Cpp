//Heap.cpp
#include <iostream>
#include <fstream>
#include <cstdlib>
#include <iomanip>
#include <algorithm>
using std::cout; using std::endl;
using std::ifstream; using std::setw;
using std::left; using std::max;

//Function to insert data into MaxHeap.
//Will make MaxHeap larger if needed.
void insertNumber(int* &maxHeap, size_t &maxHeapSize, int number);

//Function to delete the root element
//(highest priority element)
int deleteNumber(int* &maxHeap);

//Function to print MaxHeap in Pre-order style
void print(int* maxHeap, int index);

int main()
{
    //Initial MaxHeap of size 10
    int* maxHeap = new int [10];
    //First element houses total number of elements in MaxHeap
    maxHeap[0] = 0; //# of elements
    //Size is one less than total array size (elements 1 - 9)
    size_t maxHeapSize = 9;

    //Open file and make sure it opened correctly
    ifstream dataFile("Heap.DAT");
    if(!dataFile) {
        cout << "File Failed To Open\n";
        perror("Heap.DAT");
        exit(1);
    }

    //Variables to read from file
    char opCode;
    int number;
    cout << setw(4) << left;
    //While there is data to be read from file
    while(dataFile >> opCode) {
        //If there is an OpCode I, read in the data on same line
        if(opCode == 'I')
            dataFile >> number;

        switch(opCode) {
            //OpCode I = Insert
            case 'I' : insertNumber(maxHeap, maxHeapSize, number);
                       cout << "Inserted: " << number << '\n';
                       break;
            //OpCode D = Delete
            //{ } are needed because of a local variable (del)
            case 'D' : {if(maxHeap[0] == 0)
                           cout << "Empty Heap. No Deletion\n";
                       int del = deleteNumber(maxHeap);
                       cout << "Deleted: " << del << endl;
                       break;}
            //OpCode P = Print           
            case 'P' : cout << "\nCurrent Preorder Heap Tree\n";
                       print(maxHeap, 1);
                       cout << endl;
                       break;
            //Invalid OpCodes
            default  : cout << "Bad OpCode. Reading Next Line.\n";
        }
    }
}

void insertNumber(int* &maxHeap, size_t &maxHeapSize, int number)
{
    //Increment count by one
    maxHeap[0]++;
    //Place number in first available array element
    maxHeap[maxHeap[0]] = number;

    //Nothing left to do if first entry
    if(maxHeap[0] == 1)
        return;

    //C = Child, P = Parent
    //C = 2P and C = 2P+1
    //P = C/2 and P = (C-1)/2
    //Even children and Odd children
    int parent;
    //Find parent of newly inserted number
    if(maxHeap[0] % 2 == 0)
        parent = maxHeap[0]/2; //Even child
    else
        parent = (maxHeap[0]-1)/2; //Odd child

    int newEntry = maxHeap[0]; //Index to follow new Entry for reheap up
    //Loop for reheapification upward. Remember element 0 is num elems in heap
    while(maxHeap[parent] < maxHeap[newEntry] && parent != 0) {
        //Swap parent/child 
        int temp = maxHeap[parent];
        maxHeap[parent] = maxHeap[newEntry];
        maxHeap[newEntry] = temp;
        //newEntry is now parent
        newEntry = parent;

        //Find new parent
        if(parent % 2 == 0)
            parent /= 2;
        else
            parent = (parent-1)/2;
    }

    //Make heap larger if needed
    if(maxHeap[0] == maxHeapSize) {
        //Increment size by 5
        maxHeapSize += 5;
        //Dynamically create new MaxHeap
        int* temp = new int [maxHeapSize];
        //Copy over contents of old MaxHeap
        for(int i=0; i <= maxHeap[0]; ++i)
            temp[i] = maxHeap[i];
        //Delete old MaxHeap
        delete [] maxHeap;
        //set maxHeap to new MaxHeap
        maxHeap = temp;
   }
}

int deleteNumber(int* &maxHeap)
{
    //To be deleted/returned
    int root = maxHeap[1];
    
    //Last entry copied to root
    maxHeap[1] = maxHeap[maxHeap[0]];

    //Reduce heap size by one
    maxHeap[0]--;

    //C = Child, P = Parent
    //C = 2P and C = 2P+1
    //Left children and Right children
    int parent = 1;
    int leftChild = 2*parent;
    int rightChild = 2*parent + 1;

    //If leftChild dne, rightChild dne
    //If leftChild exists, maybe rightChild exists
    while(leftChild <= maxHeap[0]) {
        int highest;
        //Choose highest child
        if(rightChild <= maxHeap[0])
            //max function returns higher of two entries
            highest = max(maxHeap[leftChild], maxHeap[rightChild]);
        else
            //If rightChild doesn't exist, left is highest
            highest = maxHeap[leftChild];
        
        //Reheapification downward
        //If the leftChild is the highest of the two children and the 
        //parent is less than the leftChild, swap parent and leftChild
        if(maxHeap[parent] < maxHeap[leftChild] && 
           maxHeap[leftChild] == highest)         {
            maxHeap[leftChild] = maxHeap[parent];
            maxHeap[parent] = highest;
            parent = leftChild;
        //If the rightchild is the highest of the two children and the 
        //parent is less than the rightChild, swap parent and rightChild
        } else if (maxHeap[parent] < maxHeap[rightChild] && 
                   maxHeap[rightChild] == highest)         {
            maxHeap[rightChild] = maxHeap[parent];
            maxHeap[parent] = highest;
            parent = rightChild;
        //Leave loop if no child is less than parent
        } else 
            break;
        
        //Recalculate children
        leftChild = 2*parent;
        rightChild = 2*parent + 1;
    }

    return root;
}

void print(int* maxHeap, int index)
{
    if(index > maxHeap[0]) //Empty heap
        cout << "Cannot Print. Empty Heap.\n";
    
    //Display first element
    cout << maxHeap[index] << ' ';
    
    //Move to leftChild
    index = 2*index;
    //If leftChild is a node, recursive call
    if(index <= maxHeap[0])
        print(maxHeap, index);
    //Move to rightChild
    index++;
    //If rightChild is a node, resursive call
    if(index <= maxHeap[0])
        print(maxHeap, index);
} 

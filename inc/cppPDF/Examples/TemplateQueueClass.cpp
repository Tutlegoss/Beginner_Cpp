//TemplateQueue.cpp
#include <iostream>
using std::cout; using std::endl;

//Templated struct for each node of the Queue
//Type is whatever is specified when declaring
//an object of Queue as seen in main
template<typename Type>
struct QueueNode
{
    //Single piece of data per node
    Type data;
    //Link to next node in Queue
    QueueNode* link;
};

template<typename Type>
class Queue
{
    public:
        //Default Constructor
        Queue() : Front(nullptr), Back(nullptr), queueSize(0) {}
        //Copy Constructor
        Queue(const Queue<Type> &Copy);
        //Destructor
        ~Queue();
        //Function to check if the Queue is empty
        bool isEmpty() const;
        //Function to obtain size of Queue
        size_t size() const;
        //Function to insert data into Queue
        void push(Type insert);
        //Function to remove data that's first in Queue
        void pop();
        //Function to display data what's first in Queue
        void displayFront() const;
        //Function to display data that's last in Queue
        void displayBack() const;
        //Function to display whole Queue
        void displayAll() const;
    private:
        QueueNode<Type>* Front;
        QueueNode<Type>* Back;
        size_t queueSize;
};

int main()
{
    Queue<int> TrialQueue;

    //Queue will have 75(first)
    //                80(second)
    //                100(last)
    TrialQueue.push(75);
    TrialQueue.push(80);
    TrialQueue.push(100);
    cout << "Inserted 75, 80, 100 into Queue \n\n"; 

    //Displays last node (100)
    TrialQueue.displayBack();

    //Queue will have 75(first)
    //                80(second)
    //                100(third)
    //                -99(last)
    TrialQueue.push(-99);
    cout << "\nPushed -99 into Queue \n\n";
    
    //Get rid of 75
    TrialQueue.pop();
    cout << "Popped the front of the Queue (75) \n\n"; 

    //Display 80 as 75 has been popped
    TrialQueue.displayFront();
    
    //Will display 80 100 -99
    cout << endl << "Here is what's in Queue:\n";
    TrialQueue.displayAll();

    //Size is currently 3
    cout << endl << "Queue size: " << TrialQueue.size() << endl;

    //Copy over TrialQueue's Queue to TestCopy's Queue
    Queue<int> TestCopy(TrialQueue);
    
    //Display TestCopy's Queue
    cout << endl << "Copied over TrialQueue's Queue. Testing copy constructor:\n";
    TestCopy.displayAll();
}

template<typename Type>
Queue<Type>::Queue(const Queue<Type> &Copy)
{
    //If Copy's Queue is empty, initialize
    //both pointers to nullptr
    if(Copy.Front == nullptr) {
        Front = nullptr;
        Back = nullptr;
        queueSize = 0;
    } else {
        queueSize = Copy.queueSize;

        //Create Traverse pointer to point to the front
        //of Copy's Queue. Traverse will traverse Copy's
        //Queue and copy over each node
        QueueNode<Type>* Traverse = Copy.Front;
        //Dynamically create new node for Front of Queue
        Front = new QueueNode<Type>;
        //Copy over data of front node of Copy's Queue
        Front->data = Traverse->data;
        //Set link to nullptr
        Front->link = nullptr;
        //Since only one node has been copied, set Back
        //pointer to point to Front node
        Back = Front;
    
        //Move Traverse to next node in Copy's Queue
        //if a node exists
        Traverse = Traverse->link;
        //Create new nodes and copy over rest of Queue
        //if Copy's Queue has more nodes
        QueueNode<Type>* NewNode;
        while(Traverse) {
            //Dynamically create new node
            NewNode = new QueueNode<Type>;
            //Copy over data from Copy's current QueueNode
            NewNode->data = Traverse->data;
            NewNode->link = nullptr;
            //New nodes get added to back of Queue
            Back->link = NewNode;
            //Move Back to point to NewNode
            Back = NewNode;
            //Move Traverse to point to next Node (or nullptr) if empty
            //nullptr will terminate while loop
            Traverse = Traverse->link;
			//Increase queueSize by one
			++queueSize;
        }
		//Increase queueSize by one
		++queueSize;
    }
}

template<typename Type>
Queue<Type>::~Queue()
{
    //Delete each node until Queue is empty
    //This will reset Front and Back to nullptr
    while(!isEmpty())
        pop();
}

template<typename Type>
bool Queue<Type>::isEmpty() const
{
    if(Front == nullptr)
        return true;
    else
        return false;
}

template<typename Type>
size_t Queue<Type>::size() const
{
    return queueSize;
}

template<typename Type>
void Queue<Type>::push(Type insert)
{
    //If new Queue, create one
    if(isEmpty()) {
        //Dynamic allocation
        Front = new QueueNode<Type>;
        Front->data = insert;
        //Last node's link is always nullptr
        Front->link = nullptr;
        //Only one node in Queue, so Back points to same node
        Back = Front;
        //Increment size by one
        ++queueSize;
        return;
    }

    //Create new node and link to existing Queue in the back
    QueueNode<Type>* Temp = new QueueNode<Type>;
    Temp->data = insert;
    Temp->link = nullptr;
    Back->link = Temp;
    //Back is now pointing to the very last node (newest created)
    Back = Temp;
    //Increment size by one
    ++queueSize;
}

template<typename Type>
void Queue<Type>::pop()
{ 
    //Check to see if there is something in Queue
    if(!isEmpty()) {
        //Set new QueueNode pointer to Front
        QueueNode<Type>* Temp = Front;
        //If last node in Queue is going to be deleted,
        //Front and Back are equal and set Back to nullptr
        if(Front == Back)
            Back = nullptr;
        //Move Front to next node in line 
        //or nullptr (whichever is there)
        Front = Front->link;
        //Delete the fist node in Queue
        delete Temp;
        //Decrement size by one
        --queueSize;
    }
}

template<typename Type>
void Queue<Type>::displayFront() const
{
    if(!isEmpty())
        cout << "Front of Queue: " << Front->data << endl;
}

template<typename Type>
void Queue<Type>::displayBack() const
{
    if(!isEmpty())
        cout << "Back of Queue: " << Back->data << endl;
}

template<typename Type>
void Queue<Type>::displayAll() const
{
    if(!isEmpty()) {
        cout << "Front of Queue: " << Front ->data << endl;

        //Create pointer for Queue traversal
        const QueueNode<Type>* Traverse = Front->link;
        //Loop until Traverse is pointing to last node
        while(Traverse) {
            //Last node of Queue
            if(Traverse->link == nullptr) {
                cout << "Back of Queue: " << Traverse->data << endl;
                return;
            }
            //Display data during traversal
            cout << "\t\t" << Traverse->data << endl;
            //Move Traverse to next node
            Traverse = Traverse->link;
        }
    } else {
        cout << "Queue is empty\n";
    }
}

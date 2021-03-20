//Queue.cpp
#include <iostream>
using std::cout; using std::endl;

//Templated struct for each node of the Queue.
//Type is whatever is specified when declaring
//an object of Queue as seen in main.
template<typename Type>
struct Queue
{
    //Single piece of data per node
    Type data;
    //Link to next node in Queue
    Queue* link;
};

//Function to check if the Queue is empty
template<typename Type>
bool isEmpty(const Queue<Type>* Front);

//Function to obtain size of Queue
template<typename Type>
void size(Queue<Type>* Front);

//Function to insert data into Queue.
//Pass by reference to alter Front pointer.
template<typename Type>
void push(Queue<Type>* &Front, Queue<Type>* &Back, Type insert);

//Function to remove data that's first in Queue.
//Pass by reference to alter Front pointer.
template<typename Type>
void pop(Queue<Type>* &Front);

//Function to display data what's first in Queue
template<typename Type>
void displayFront(const Queue<Type>* Front);

//Function to display data that's last in Queue
template<typename Type>
void displayBack(const Queue<Type>* Front);

//Function to display whole Queue
template<typename Type>
void displayAll(const Queue<Type>* Front);

int main()
{
    //nullptr indicates empty Queue
    Queue<int>* Front = nullptr;
    Queue<int>* Back  = nullptr;

    //Queue will have 75(first)
    //                80(second)
    //                100(last)
    cout << "Inserted 75, 80, 100 into the Queue\n\n";
    push(Front, Back, 75);
    push(Front, Back, 80);
    push(Front, Back, 100);

    //Displays last node (100)
    displayBack(Back);

    //Queue will have 75(first)
    //                80(second)
    //                100(third)
    //                -99(last)
    cout << "\nPushed -99 into the Queue \n\n";
    push(Front, Back, -99);

    //Get rid of 75
    cout << "Popped the front of the Queue (75) \n\n";
    pop(Front);

    //Display 80 as 75 has been popped
    displayFront(Front);

    //Will display 80 100 -99
    cout << endl << "Here is what's in Queue: \n";
    displayAll(Front);

    //Size is currently 3
    cout << endl << "Queue size:\n";
    size(Front);
}

template<typename Type>
bool isEmpty(const Queue<Type>* Front)
{
    if(Front == nullptr)
        return true;
    else
        return false;
}

template<typename Type>
void size(Queue<Type>* Front)
{
    if(isEmpty(Front))
        cout << "Size: 0 \n";
    else {
        //Create new pointer for easier-to-read code
        Queue<int>* Traverse = Front;
        //Count is one, due to Traverse pointing to first node
        int count = 1;
        
        //Loop to move Traverse to the end.
        //When it reaches nullptr, loop terminates.
        while(Traverse->link) {
            //Actively count each node Traverse passes
            ++count;
            //Move Traverse to next node
            Traverse = Traverse->link;
        }
        
        cout << "Size: " << count << endl;
    }
}

template<typename Type>
void push(Queue<Type>* &Front, Queue<Type>* &Back, Type insert)
{
    //If new Queue, create one
    if(isEmpty(Front)) {
        //Dynamic allocation
        Front = new Queue<Type>;
        Front->data = insert;
        //Last node's link is always nullptr
        Front->link = nullptr;
        //Only one node in Queue, so Back points to same node
        Back = Front;
        return;
    }

    //Create new node and link to existing Queue in the back
    Queue<Type>* Temp = new Queue<Type>;
    Temp->data = insert;
    Temp->link = nullptr;
    Back->link = Temp;
    //Back is now pointing to the very last node (newest created)
    Back = Temp;
}

template<typename Type>
void pop(Queue<Type>* &Front)
{ 
    //Check to see if there is something in Queue
    if(!isEmpty(Front)) {
        //Set new Queue pointer to Front
        Queue<Type>* Temp = Front;
        //Move Front to next node in line 
        //or nullptr (whichever is there)
        Front = Front->link;
        //Delete the fist node in Queue
        delete Temp;
    }
}

template<typename Type>
void displayFront(const Queue<Type>* Front)
{
    if(!isEmpty(Front))
        cout << "Front of Queue: " << Front->data << endl;
}

template<typename Type>
void displayBack(const Queue<Type>* Back)
{
    cout << "Back of Queue: " << Back->data << endl;
}

template<typename Type>
void displayAll(const Queue<Type>* Front)
{
    if(!isEmpty(Front)) {
        cout << "Front of Queue: " << Front ->data << endl;

        //Create pointer for easier-to-read code
        const Queue<Type>* Traverse = Front->link;
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

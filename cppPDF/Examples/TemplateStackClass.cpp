//TemplateStack.cpp
#include <iostream>
using std::cout; using std::endl;

//Templated struct for each node of the Stack
//Type is whatever is specified when declaring
//and object of Stack as seen in main
template<typename Type>
struct StackNode
{
    //Single piece of data per node
    Type data;
    //Link to next node in Stack
    StackNode* link;
};

template<typename Type>
class Stack
{
    public:
        //Default Constructor
        Stack() : Top(nullptr), stackSize(0) {}
        //Copy Constructor
        Stack(const Stack<Type> &Copy);
        //Destructor
        ~Stack();
        //Function to check if the Stack is empty
        bool isEmpty() const;
        //Function to obtain size of Stack
        size_t size() const;
        //Function to insert data into Stack
        void push(Type insert);
        //Function to remove data that's last in Stack
        void pop();
        //Function to display data what's on top of Stack
        void displayTop() const;
        //Function to display what's on bottom of Stack
        void displayBottom() const;
        //Function to display whole Stack
        void displayAll() const;
    private:
        StackNode<Type>* Top;
        size_t stackSize;
};

template<typename Type>
Stack<Type>::Stack(const Stack<Type> &Copy)
{
    //If Copy's Stack is empty, initialize
    //Top to nullptr and size to 0
    if(Copy.Top == nullptr) {
        Top = nullptr;
        stackSize = 0;
    } else {
        stackSize = Copy.stackSize;

        //Create Traverse pointer to point to the Top
        //of Copy's Stack. Traverse will traverse Copy's
        //Stack and copy over each node
        StackNode<Type>* Traverse = Copy.Top;
        //Create StackNode pointer for creation of nodes
        //that will house the copied over contents from
        //Copy's Stack
        StackNode<Type>* Bottom;

        //Dynamically create new node for Stack
        Bottom = new StackNode<Type>;
        //Copy over data of first node of Copy's Stack
        Bottom->data = Traverse->data;
        //Bottom->link will be set either in the while
        //loop or to nullptr after the while loop

        //Top pointer points to Bottom
        Top = Bottom;

        //Move Traverse to next node in Copy's Stack
        //if a node exists
        Traverse = Traverse->link;
        //Create new nodes and copy over rest of Stack
        //if Copy's Stack has more nodes
        while(Traverse) {
            //Dynamically create new Node connecting
            //to the bottom of the Stack
            Bottom->link = new StackNode<Type>;
            //Move Bottom to bottom node of stack
            Bottom = Bottom->link;
            //Copy over data from Copy's current StackNode
            Bottom->data = Traverse->data;
            //Move Traverse to next node in Copy's Stack
            //or nullptr if empty (nullptr terminates loop)
            Traverse = Traverse->link;
			//Increase stackSize by one
			stackSize++;
        }
        //Increase stackSize by one
		stackSize++;
        //Last step in making sure the last node of the Stack
        //always points to nullptr
        Bottom->link = nullptr;
    }
}       

template<typename Type>
Stack<Type>::~Stack()
{
    //Delete each node until Stack is empty
    //This will reset Top to nullptr
    while(!isEmpty())
        pop();
    
}

template<typename Type>
bool Stack<Type>::isEmpty() const
{
    if(Top == nullptr)
        return true;
    else
        return false;
}

template<typename Type>
size_t Stack<Type>::size() const
{
    return stackSize;
}

template<typename Type>
void Stack<Type>::push(Type insert)
{
    //Create new node
    StackNode<Type>* Temp = new StackNode<Type>;
    Temp->data = insert;
    //Special case for first node in Stack
    if(isEmpty())
        Temp->link = nullptr;
    //Otherwise link new node to rest of Stack
    else
        Temp->link = Top;
    //New node is always first node
    Top = Temp;
    //Increment size by one
    ++stackSize;
}

template<typename Type>
void Stack<Type>::pop()
{
    //Check to see if there is something in Stack
    if(!isEmpty()) {
        //Set new StackNode pointer to Top
        StackNode<Type>* Temp = Top;
        //Move Top to next node in line
        //or nullptr (whichever is there)
        Top = Top->link;
        //Delete the first node in Stack
        delete Temp;
        //Decrement size by one
        --stackSize;
    }
}

template<typename Type>
void Stack<Type>::displayTop() const
{
    if(!isEmpty())
        cout << "Top of Stack: " << Top->data << endl;
}

template<typename Type>
void Stack<Type>::displayBottom() const
{
    if(!isEmpty()) {
        //Create pointer for Stack traversal
        const StackNode<Type>* Traverse = Top;
        //Loop until Traverse is pointing to last node
        while(Traverse->link)
            Traverse = Traverse->link;
        cout << "Bottom of Stack: " << Traverse->data << endl;
    }
}

template<typename Type>
void Stack<Type>::displayAll() const
{
    if(!isEmpty()) {
        cout << "Top of Stack:    " << Top->data << endl;
        
        //Create pointer for Stack traversal
        const StackNode<Type>* Traverse = Top->link;
        //Loop until Traverse is pointing to last node
        while(Traverse) {
            if(Traverse->link == nullptr) {
                cout << "Bottom of Stack: " << Traverse->data << endl;
                return;
            }
            //Display data during traversal
            cout << "\t\t " << Traverse->data << endl;
            //Move to next node
            Traverse = Traverse->link;
        }
    } else
        cout << "Stack is empty\n";
}

int main()
{
    Stack<int> TrialStack;

    //Stack will have 100(top)
    //                80(middle)
    //                75(bottom)
    TrialStack.push(75);
    TrialStack.push(80);
    TrialStack.push(100);
    cout << "Inserted 75, 80, 100 into the Stack \n\t"
         << "100 = top, 80 = middle, 75 = bottom \n\n";

    //Displays bottom node (75)
    TrialStack.displayBottom();

    //Queue will have -99(top)
    //                100(middle)
    //                80(middle)
    //                75(bottom)
    TrialStack.push(-99);
    cout << "\nPushed -99 into the Stack \n\n";

    //Get rid of -99
    TrialStack.pop();
    cout << "Popped the top of the Stack (-99) \n\n";
    
    //Display 100 as -99 has been popped
    TrialStack.displayTop();

    //Will display 100 80 75
    cout << endl << "Here is what's in Stack:\n";
    TrialStack.displayAll();

    //Size is currently 3
    cout << endl << "Stack size: " << TrialStack.size() << endl;

    //Copy over TrialStack's Stack to TestCopy's Stack
    Stack<int> TestCopy(TrialStack);

    //Display TestCopy's Stack
    cout << endl << "Copied over TrialStack's Stack. Testing copy constructor:\n";
    TestCopy.displayAll();
}

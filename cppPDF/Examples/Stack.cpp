//Stack.cpp
#include <iostream>
using std::cout; using std::endl;

//Templated struct for each node of the Stack.
//Type is whatever is specified when declaring
//and object of Stack as seen in main.
template<typename Type>
struct Stack
{
    //Single piece of data per node
    Type data;
    //Link to next node in Stack
    Stack* link;
};

//Function to check if the Stack is empty
template<typename Type>
bool isEmpty(const Stack<Type>* Front);

//Function to obtain size of Stack
template<typename Type>
void size(Stack<Type>* Front);

//Function to insert data into Stack.
//Pass by reference to alter Front pointer.
template<typename Type>
void push(Stack<Type>* &Front, Type insert);

//Function to remove data that's last in Stack.
//Pass by reference to alter Front pointer.
template<typename Type>
void pop(Stack<Type>* &Front);

//Function to display data what's on top of Stack
template<typename Type>
void displayTop(const Stack<Type>* Front);

//Function to display what's on bottom of Stack
template<typename Type>
void displayBottom(const Stack<Type>* Front);

//Function to display whole Stack
template<typename Type>
void displayAll(const Stack<Type>* Front);

int main()
{
    //nullptr indicates empty Stack
    Stack<int>* Front = nullptr;

    //Stack will have 100(top)
    //                80(middle)
    //                75(bottom)
    push(Front, 75);
    push(Front, 80);
    push(Front, 100);
    cout << "Inserted 75, 80, 100 into the Stack \n\t"
         << "100 = top, 80 = middle, 75 = bottom \n\n";

    //Displays bottom node (75)
    displayBottom(Front);

    //Stack will have -99(top)
    //                100(middle)
    //                80(middle)
    //                75(bottom)
    push(Front, -99);
    cout << "\nPushed -99 into the Stack \n\n";

    //Get rid of -99
    pop(Front);
    cout << "Popped the top of the Stack (-99) \n\n";

    //Display 100 as -99 has been popped
    displayTop(Front);

    //Will display 100 80 75
    cout << endl << "Here is what's in Stack:\n";
    displayAll(Front);

    //Size is currently 3
    cout << endl << "Stack size:\n";
    size(Front);
}

template<typename Type>
bool isEmpty(const Stack<Type>* Front)
{
    if(Front == nullptr)
        return true;
    else
        return false;
}

template<typename Type>
void size(Stack<Type>* Front)
{
    if(isEmpty(Front))
        cout << "Size: 0\n";
    else {
        //Create new pointer for easier-to-read code
        Stack<Type>* Traverse = Front;
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
void push(Stack<Type>* &Front, Type insert)
{
    //Create new node
    Stack<Type>* Temp = new Stack<Type>;
    Temp->data = insert;
    //Special case for first node in Stack
    if(isEmpty(Front))
        Temp->link = nullptr;
    //Otherwise link new node to rest of Stack
    else
        Temp->link = Front;
    //New node is always first node
    Front = Temp;
}

template<typename Type>
void pop(Stack<Type>* &Front)
{
    //Check to see if there is something in Stack
    if(!isEmpty(Front)) {
        //Set new Stack pointer to Front
        Stack<Type>* Temp = Front;
        //Move Front to next node in line
        //or nullptr (whichever is there)
        Front = Front->link;
        //Delete the first node in Stack
        delete Temp;
    }
}

template<typename Type>
void displayTop(const Stack<Type>* Front)
{
    if(!isEmpty(Front))
        cout << "Top of Stack: " << Front->data << endl;
}

template<typename Type>
void displayBottom(const Stack<Type>* Front)
{
    if(!isEmpty(Front)) {
        //Create Stack pointer for easier-to-read code
        const Stack<Type>* Traverse = Front;
        //Loop until Traverse is pointing to last node
        while(Traverse->link)
            Traverse = Traverse->link;
        cout << "Bottom of Stack: " << Traverse->data << endl;
    }
}

template<typename Type>
void displayAll(const Stack<Type>* Front)
{
    if(!isEmpty(Front)) {
        cout << "Top of Stack:    " << Front->data << endl;
        
        //Create pointer for easier-to-read code
        const Stack<Type>* Traverse = Front->link;
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

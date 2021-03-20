//Rule.cpp
#include <iostream>
#include <algorithm>
using std::cout; using std::endl;
using std::max; using std::min;

class Rule
{
    public:
        //Default Constructor
        Rule() : array(nullptr), size(0), used(0) {}
        //Constructor
        Rule(int size);
        //Copy Constructor
        Rule(const Rule &Obj);

        //Destructor
        ~Rule();

        //Overloaded assignment operator
        Rule& operator =(const Rule &Rhs);

        //Add two arrays together and place in new object
        Rule operator +(const Rule &Rhs) const;

        //Add element to array
        void addElem(int x);

        //Display private member variables
        void display() const;

    private:
        int *array;
        int size;
        int used;
};

//Using initializer list/curly bracket hybrid
Rule::Rule(int size) : size(size), used(0)
{
    array = new int [size];
}

Rule::Rule(const Rule &Obj) : size(Obj.size), used(Obj.used)
{ 
    cout << "Copy Constructor Invoked \n";
    array = new int [size];
    //Deep copy array elements
    for(int i = 0; i < used; ++i)
        array[i] = Obj.array[i];
}

Rule::~Rule()
{
    cout << "Destructor Invoked \n";
    //Cannot delete a nullptr
    if(array != nullptr)
        //Delete object's array contents
        delete [] array;
    //Reset array for safety
    array = nullptr;
}

Rule& Rule::operator =(const Rule &Rhs)
{
    cout << "Overloaded assignment operator invoked \n";
    //Check for self-assignment
    if(this != &Rhs) {
        //Call calling object's destructor as to prevent
        //a memory leak. It could already be currently
        //pointing to dynamically allocated data.
        //this operator used for clarity.
        this->~Rule();
        //Set private member variables to Rhs's
        size = Rhs.size;
        used = Rhs.used;
        array = new int [size];
        //Deep copy over array
        for(int i = 0; i < used; ++i)
            array[i] = Rhs.array[i];
    }
    return *this;
}

Rule Rule::operator +(const Rule &Rhs) const
{
    //Find largest array size
    int largestSize = max(size, Rhs.size);
    //Find smallest used size
    int smallestUsed = min(used, Rhs.used);
    
    //Set up temporary object to house data
    Rule Temp(largestSize);

    //Add elements together (as many as possible)
    //and increment temporary object's used variable
    for(int i = 0; i < smallestUsed; ++i) {
        Temp.array[i] = array[i] + Rhs.array[i];
        Temp.used++;
    }
    //All possible elements have been added. If an array
    //has more elements than the other, just put the data
    //directly into the temporary object. This is like the
    //smaller array having zeros in these elements.
    if(used > Rhs.used) {
        for(int i = smallestUsed; i < used; ++i) {
            Temp.array[i] = array[i];
            Temp.used++;
        }
    } else if(Rhs.used > used) {
        for(int i = smallestUsed; i < Rhs.used; ++i) {
            Temp.array[i] = Rhs.array[i];
            Temp.used++;
        }
    }
    
    //This is where the assignment operator is necessary!
    //You are returning an object created in this function, 
    //so it is a local object and WILL be deleted with the 
    //destructor once this function terminates. Without the
    //assignment operator, the object in main will have a 
    //pointer pointing to the same data as Temp. Temp's data
    //has been deleted causing invalid results.
    return Temp;
}

void Rule::addElem(int x)
{
    if(size <= used)
        cout << "Array Full. No insertion. \n\n";
    else 
        array[used++] = x;
}


void Rule::display() const
{
    cout << "\t Size: " << size << endl;
    cout << "\t Used: " << used << endl;
    cout << "\t Contents: \n\t\t";
    for(int i = 0; i < used; ++i)
        cout << array[i] << ' ';
    cout << "\n\n";
}

int main()
{
    //Invoke Rule(int size) constructor
    cout << " Creating Original object \n";
    Rule Original(10);
    //Adding 1 2 3 to Original's dynamic array
    cout << "Adding elements 1 2 3 to Original object \n";
    Original.addElem(1);
    Original.addElem(2);
    Original.addElem(3);

    //Invoke default constructor
    cout << "\n Creating Copy object \n";
    Rule Copy;
    //Invoke overloaded assignment operator
    cout << "Setting Copy equal to Original \n";
    Copy = Original;
    cout << "Display Copy's contents \n";
    //Display newly copied over contents
    Copy.display();
    
    //Adding 2 elements (4 5) to Copy's dynamic array
    cout << "Adding elements 4 5 to Copy object \n";
    Copy.addElem(4);
    Copy.addElem(5);

    //Creating Add object to house added arrays of Original/Copy
    cout << "\n Creating Add object to house added arrays \n";
    Rule Add;
    cout << "Adding Original's + Copy's arrays \n";
    //Without the assignment operator, this statement does not
    //work as intended.
    Add = Original + Copy;
    //Display Add object's array
    cout << "Display Add's contents \n";
    Add.display();

    //Invoke destructor for all three objects
    cout << "\n End of program \n";
}

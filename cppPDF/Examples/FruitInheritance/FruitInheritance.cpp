//FruitInheritance.cpp
#include <iostream>
#include <string>
#include <vector>
#include "FruitParentClass.hpp" //Need to include class header files
#include "FruitChildClass.hpp"

using std::cout; using std::endl;
using std::string; using std::vector;

int main()
{
    //This first part is for students in CSII with knowledge of vectors/pointers

    //Slicing Problem with pointers (and dynamic memory). Lines 27-29.
    //Create a vector of Fruit pointers with the first element being of type Fruit
    //and the second element being of type Apple.
    vector<Fruit *> FruitVector{new Fruit, 
                    new Apple("HoneyCrisp", "Red/Yellow", 3283, 1.99, "Sweet")};

    //Displays Fruit's display function
    FruitVector[0]->display();
    //Displays Apple's display function (since the function is virtual, the 
    //pointer will utilize the appropriate function at run-time). Keep in mind
    //this method does NOT work with objects, only pointers.
    FruitVector[1]->display();
    //Therefore, since memberFunction() is not a virtual function 
    //the following is NOT allowed:
    //FruitVector[1]->memberFunction();
    
    //To delete dynamic data, you must delete each individual element then 
    //clear the vector
    cout << "Deleting FruitVector[0] \n";
    delete FruitVector[0];
    //Will call Apple and Fruit destructors since they are virtual
    cout << "\nDeleting FruitVector[1] \n";
    delete FruitVector[1];
    FruitVector.clear();

    //Since there are NO pure virtual functions, objects of type Fruit are
    //allowed to be created. This class is therefore not abstract.
    Fruit Default;
    Apple GrannySmith("Granny Smith", "Green", 4017, 1.5, "Tart");

    cout << "\n\tPutting GrannySmith into Fruit object: \n";
    //This is allowed, but will only access members of the Fruit class (parent).
    //This is the difference between pointers and objects.
    Default = GrannySmith; //Putting Child object into Parent object
    Default.display(); //Invokes Parent function even though it is virutal
    //Fruit object cannot access anything from child classes

    cout << "\tGrannySmith functions examples: \n";
    //If there is a public virtual function in the Fruit class, and it is not
    //overridden in the Apple class, the Fruit class' function will be used.
    GrannySmith.parentDefinedOnly(); //Virtual function not defined in Apple class
    //Remember, protected functions/variables in the Fruit class may be
    //accessed via functions in the child classes directly. An example of 
    //this is the virtual display() function.
    GrannySmith.display(); //Look at function implementation
    //Apple object may invoke any public member function of the Fruit class
    GrannySmith.publicFunction();

    //Destructors are invoked at the end of a function automatically
    cout << "Invoking destructors. End of program. \n";
}

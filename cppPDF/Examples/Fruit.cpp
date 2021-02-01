//Fruit.cpp 
#include <iostream>
using std::cin; using std::cout; using std::endl;

class Fruits
{
    //By default a class is private. However, convention lists public: 
    //first in a class. This means you have to specify public: as shown
    public:
        Fruits() : apple(0), orange(0), banana(0), strawberry(0) {}
        void fruitCount();        //const functions do not alter object contents
        void displayTotals() const; //const objects do not alter object contents
        void compareApples(const Fruits &Emily) const;
    //Specifying private. Variables/Functions can only be accessed via public functions
    private:
        int apple;
        int orange;
        int banana;
        int strawberry;
        //Helper Function
        void message(int &choice) const;
        
}; //Don't forget the semicolon!

//Function to ask user to input how many of each fruit was purchased or returned.
//              General model of a class function
//Return type | Class name | Scope Resolution operator | Function
void Fruits::fruitCount()
{
    //Represent fruit as integers
    int choice;

    cout << "Fruit Selection:\n";

    //Do this as many times as needed
    do {
        //Helper function invocation to display fruit to integer message
        //and obtain cashier's fruit choice
        message(choice);

        //Variable to capture how many of the specified fruit there are
        int quantity;
         
        //Branching to correct fruit or quit. Default case for mis-entered number.
        switch(choice) {

            case 1: cout << "How many apples?: ";
                    cin >> quantity;
                    apple += quantity; //Add to private variable
                    break;

            case 2: cout << "How many oranges?: ";
                    cin >> quantity;
                    orange += quantity;
                    break;

            case 3: cout << "How many bananas?: ";
                    cin >> quantity;
                    banana += quantity;
                    break;

            case 4: cout << "How many Strawberries: ";
                    cin >> quantity;
                    strawberry += quantity;
                    break;

            case 0: break; //Exit (Nothing to be done in switch)

            default: cout << "Invalid input\n";
        }

        cout << endl;

      //Officially exit with an input of 0
    } while(choice != 0);
}

//This function simply displays all of the fruit totals from the transaction
void Fruits::displayTotals() const
{
    cout << "Here are the total number of fruits customer bought. \n"
         << "Negative number means customer returned the fruit. \n";
    cout << "\tApples:        " << apple << endl
         << "\tOranges:       " << orange << endl
         << "\tBananas:       " << banana << endl
         << "\tStrawberries:  " << strawberry << "\n\n";
}

//This function displays how many apples Emily bought vs Thomas
void Fruits::compareApples(const Fruits &Emily) const
{
    cout << "Emily purchased " << Emily.apple << " apple(s) \n";
    cout << "Thomas purchased " << apple << " apple(s) \n";
    if((Emily.apple + apple) == 0) {
        cout << "No apples sold. Cannot do comparison. \n\n";
        return;
    }
    cout << "\tTherefore, Emily purchased " 
         << static_cast<double>(Emily.apple)/(Emily.apple + apple) * 100 << '%'
         << " of the apples! \n\n";
}

//This function is a helper function for the fruitCount() function.
//No return type as choice is passed in by reference.
void Fruits::message(int &choice) const
{    
    //Display for user
    cout << "1 = Apples, 2 = Oranges\n"
         << "3 = Bananas, 4 = Strawberries\n"
         << "0 = Quit\n";
    //Input from user
    cin >> choice;
}

int main()
{
    //Initializing objects (instances) of class
    Fruits Thomas, Emily;   

    //Invoking public class functions with the dot operator
    cout << "Enter Thomas's fruit purchase data: \n";
    //Class object | Dot operator | Function
    Thomas.fruitCount();
    cout << "Enter Emily's fruit purchase data: \n";
    Emily.fruitCount();

    //Compare results/Display results
    Thomas.compareApples(Emily);
    cout << "Total number of fruits Emily purchased: \n";
    Emily.displayTotals();
}

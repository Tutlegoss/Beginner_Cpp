//MultiArrayMain.cpp
//                  Program to show overloaded class functions,
//                  Rule of Three, a dynamic member variable,
//                  and a friend function (that isn't used but
//                  here for reference/understanding)
#include <iostream>
#include <string>
#include "MultiArray.hpp" //Header file for Multi class

//Using only specific aspects of using namespace std;
using std::cin; using std::cout;
using std::string; using std::endl;
using std::getline;

//This function will set the values of each matrix via user input
void setValues(Multi &Object);

int main()
{
    //Objects of type Multi for addition
    Multi Add1(3,3);
    Multi Add2(3,3);

    //Setting values for both objects
    setValues(Add1);
    setValues(Add2);

    //Adding matrices together and putting result into new object.
    //This uses the overloaded + operator and = operator.
    Multi AddTotal;
    AddTotal = Add1 + Add2;
    
    //If you wanted to use the friend function to add matricies, 
    //the assignment statement would look like this:
    //AddTotal = add(Add1, Add2);

    //Display the added matrix
    cout << "\nHere is the added matrix: \n";
    AddTotal.display();
    
    cout << endl;

    //Objects of type Multi for multiplication
    Multi Mult1(3,3);
    Multi Mult2(3,2);

    //Setting values for both objects
    setValues(Mult1);
    setValues(Mult2);

    //Multiplying matrices together and putting result into new object.
    //This uses the overloaded * operator and = operator.
    Multi MultTotal;
    MultTotal = Mult1 * Mult2;

    //Display the multiplied matrix
    cout << "\nHere is the multiplied matrix: \n";
    MultTotal.display();

    cout << endl;

    //Objects of type Multi for overlapping
    Multi Overlap1(3,2);
    Multi Overlap2(2,4);

    //Setting values for both objects
    setValues(Overlap1);
    setValues(Overlap2);

    //Overlapping matrices together and putting result into new object.
    //This uses the overlap member function.
    Multi OverlapTotal = Overlap1.overlap(Overlap2);

    //Display the overlapped matrix
    cout << "\nHere is the overlapped matrix: \n";
    OverlapTotal.display();
}

void setValues(Multi &Object)
{
    //Telling user what to enter
	cout << "Enter a " << Object.getRow() << " by "
		 << Object.getCol() << " matrix: \n";

    //Input variable
	int value;

    //Nested for loops for multidimensional positioning
	for(int i = 0; i < Object.getRow(); i++) {
		for(int j = 0; j < Object.getCol(); j++) {
            //Obtain value from user
			cin >> value;
            //Member function to set the value
			Object.setVal(i,j,value);
		}
	}

    //If user enters more numbers than spots in matrix, discard
    //or else it will carry over to the next input session
	string discard;
	getline(cin, discard, '\n');
}

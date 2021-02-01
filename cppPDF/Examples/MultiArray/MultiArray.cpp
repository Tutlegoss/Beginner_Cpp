//MultiArray.cpp
#include "MultiArray.hpp" //Header file for Multi class (function declarations)
#include <iostream>
#include <iomanip> //Library for setw function
#include <algorithm> //Library for min/max functions

//Using only specific aspects of using namespace std;
using std::cout; using std::setw;
using std::endl; using std::min;
using std::max;

//Copy constructor. 
//Uses initializer list for row and col.
//Creates dynamically allocated multidimensional array.
Multi::Multi(int r, int c): row(r), col(c)
{
    //Create a pointer to an array of integer pointers
	array2D = new int* [r];
    //Loop to create an array for each of the integer pointers
    //allocated above
	for(int i = 0; i < r; i++) {
		array2D[i] = new int [c];
        //Loop it initialize each element to zero versus having
        //each element contain garbage values
		for(int j = 0; j < c; j++) {
			array2D[i][j] = 0;
		}
	}
}

//Copy constructor to copy another object.
//Uses member initialization list for cow and col.
//Creates dynamically allocated multidimensional array.
Multi::Multi(const Multi &Copy): row(Copy.row), col(Copy.col)
{
    //Create a pointer to an array of integer pointers
	array2D = new int* [row];
    //Loop to create an array for each of the integer pointers
    //allocated above
	for(int i = 0; i < row; i++) {
		array2D[i] = new int [col];
	}
    //Nested loop to copy over values from Copy object into 
    //calling object's newly allocated multidimensional array
	for(int i = 0; i < row; i++) {
		for(int j = 0; j < col; j++) {
			array2D[i][j] = Copy.array2D[i][j];
		}
	}
}

//Destructor.
//Frees memory by deleting the multidimensional array.
Multi::~Multi() 
{
    //Check to see if the multidimensional array exists.
    //You cannot delete a nullptr.
	if(array2D != nullptr) {
        //Loop to delete each integer pointer
		for(int i = 0; i < row; i++) {
			delete [] array2D[i];
		}
        //Delete pointer to the multidimensional array
        //which is the pointer pointing to the array of
        //integer pointers
		delete [] array2D;
		array2D = nullptr;
	}
}

//Output the dimensions of the multidimensional array
void Multi::getSize() const
{
    //Simple cout statement
	cout << "ROWS: " << row << ' ' << "COLS: " << col << endl;
}

//Set the value of an individual element of the multidimensional array
void Multi::setVal(int r, int c, int v)
{
    //Element indexes must be valid
	if((r < row) && (c < col)) {
        //Put value into element
		array2D[r][c] = v;
    //If invalid, tell user
	} else {
		cout << "\nCannot set Value -Out of range-\n\n";
	}
}

//Overloaded plus operator for easier readability in program as
//you can now use the + operator on objects as you would an int
Multi Multi::operator +(const Multi Rhs)
{
    //Finding minimum value of rows/columns, because to add
    //matricies you need the same size matricies
	int tRow = min(row, Rhs.row);
	int tCol = min(col, Rhs.col);
    //Create a temporary object of the appropriate size
	Multi Temp(tRow, tCol);
    //Nested for loops to add matricies and put in temporary object
	for(int i = 0; i < tRow; i++) {
		for(int j = 0; j < tCol; j++) {
            //Add the same elements and put into same element
			Temp.array2D[i][j] = array2D[i][j] + Rhs.array2D[i][j];
		}
	}
    //Return the object so AddTotal can house the added up matrix.
    //Overloaded operator extends the life of Temp so it can be properly used.
    return Temp;
}

//Overloaded multiplication operator for easier readability in program
//as you can now use the * operator on objects are you would an int
Multi Multi::operator *(const Multi Rhs)
{
    //Local variable to house the sum of the multiplied elements
    int multTotal = 0;
    //Create a temporary object of the appropriate size, which is
    //the row of the calling object and the column of the argument object
    Multi Temp(row, Rhs.col);
    //Nested for loops for multiplying elements appropriately.
    //For loop for row of calling object.
    for(int i = 0; i < row; i++) {
        //For loop for column of passed in object
        for(int j = 0; j < Rhs.col; j++) {
            //For loop for multiplying appropriate rows/columns
            for(int k = 0; k < col; k++) {
                //Whole column of calling object's matrix gets multiplied
                //with whole row of passed in object's matrix.
                //Each multiplication instances gets added to multTotal.
                multTotal += array2D[i][k] * Rhs.array2D[k][j];
            }
            //Put the value of the total multiplied row/column into the
            //temporary array element
            Temp.array2D[i][j] = multTotal;
            //Reset multTotal for next multiplication sequence
            multTotal = 0;
        }
    }
    //Return the object so MultTotal can house the multiplied matrix.
    //Overloaded operator extends the life of Temp so it can be properly used.
    return Temp;
}

//Overlapping two matricies where the passed in object takes precedence
Multi Multi::overlap(Multi Object)
{
    //Find the max of both matricies as any element that does not 
    //exist will have zero put in its place
	int tRow = max(row, Object.row);
	int tCol = max(col, Object.col);
    //Create a temporary object of the appropriate size
	Multi Temp(tRow, tCol);
    //Nexted for loops to figure out which element to put into temporary object
	for(int i = 0; i < tRow; i++) {
		for(int j = 0; j < tCol; j++) {
            //If there exists an element in the passed in object, use that
			if((i < Object.getRow()) && (j < Object.getCol())) {
				Temp.array2D[i][j] = Object.array2D[i][j];
            //If the above fails, if there exists an element in the calling
            //object, use that
			} else if((i < getRow()) && (j < getCol())) {
				Temp.array2D[i][j] = array2D[i][j];
            //If both fail, fill the element with zero
			} else {
				Temp.array2D[i][j] = 0;
			}
		}
	}
    //Return the object so OverlapTotal can house the overlapped matrix.
    //Uses the copy constructor as OverlapTotal is declared and initialized
    //on the same line.
	return Temp;
}

//Overloaded equals operator (aka assignment operator) to be used when 
//utilizing the = operator outside of declaring and initializing on the same line
Multi& Multi::operator =(const Multi &Rhs)
{
    //Rhs stands for Right Hand Side of the = sign, 
    //which is the value to be copied over

    //Have to make sure you aren't equalling the same objects,
    //otherwise you will delete the object and this would not work
	if(this != &Rhs) {
        //Deleting previous dynamic allocation (if allocated previously)
        this->~Multi();
        //Reset the object on the left side of the = sign's matrix dimensions
		row = Rhs.row;
		col = Rhs.col;
        //Initialize a new multidimensional array
		array2D = new int* [row];
		for(int i = 0; i < row; i++) {
			array2D[i] = new int [col];
		}
        //Nested for loops to properly set the values
		for(int i = 0; i < row; i++) {
			for(int j = 0; j < col; j++) {
				setVal(i,j,Rhs.array2D[i][j]);
			}
		}
	}
    //Return the dereferenced this pointer 
    //(which means you are returning a reference).
    //Now the object on the left side of the = sign will be the same as the RHS.
	return *this;
}

//Display the matrix
void Multi::display()
{	
    //Nested for loops to display each element
	for(int i = 0; i < row; i++) {
		for(int j = 0; j < col; j++) {
            //setw for a neater output (fills with whitespace)
			cout << setw(4) << array2D[i][j] << ' ';
		}
		cout << endl;
	}
}

//Friend function example of adding two matricies. 
//May use versus overloading + operator.
Multi add(Multi Obj1, Multi Obj2)
{
    //Finding minimum value of rows/columns, because to add
    //matricies you need the same size matricies
	int tRow = min(Obj1.row, Obj2.row);
	int tCol = min(Obj1.col, Obj2.col);
    //Create a temporary object of the appropriate size
	Multi Temp(tRow, tCol);
    //Nested for loops to add matricies and put in temporary object
	for(int i = 0; i < tRow; i++) {
		for(int j = 0; j < tCol; j++) {
            //Add same elements and put into same element
			Temp.array2D[i][j] = Obj1.array2D[i][j] + Obj2.array2D[i][j];
		}
	}
    //Return the object so AddTotal can house the added up matrix
	return Temp;
}

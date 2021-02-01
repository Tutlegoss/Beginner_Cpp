//OverloadingFriends.cpp
#include <iostream>
using std::cout; using std::endl;
using std::cin;
using std::istream; using std::ostream;

class Int
{
    public:
        //Constructors Implemented here for brevity
        Int() : x(0) {}
        Int(int x) : x(x) {}
        Int(const Int &Copy) : x(Copy.x) {}

        //Overloading Operators - Friends/Members
        //Assignment operator (Must be member). Kept in this program
        //so it can operate properly in main().
        Int& operator =(const Int &Rhs);

        //Plus operator Friend/Member (Binary operator)
        friend Int operator +(const Int &Obj1, const Int &Obj2);
        
        //Conjoined binary operator
        friend Int& operator +=(Int &Obj1, const Int &Obj2);

        //Negation operator Friend/Member (Unary operator)
        friend Int operator -(Int &Obj);

        //Equality operator Friend/Member (Comparison operator)
        friend bool operator ==(const Int &Obj1, const Int &Obj2);

        //Input operator Friend function only (Return reference).
        //Needs to be a friend function of this class.
        friend istream& operator >>(istream &input, Int &Obj);

        //Output operator Friend function only (Return reference)
        //Needs to be a friend function of this class.
        friend ostream& operator <<(ostream &input, const Int &Obj);

        //Prefix Increment operator
        friend Int operator ++(Int &Obj);

        //Postfix Increment operator
        //int argument to distinguish between prefix/postfix
        friend Int operator ++(Int &Obj, int);

        //Function operator and Bracket operator has to be a 
        //non-static member function. Cannot be a friend function.
        //See Overloading.cpp for these functions.

    private:
        int x;

};

//Assignment Operator
Int& Int::operator =(const Int &Rhs)
{
    //Check for self-assignment.
    //This is important when dealing with dynamically
    //allocated data (arrays, linked lists, etc).
    if(this != &Rhs)
        x = Rhs.x;
    //Return reference to Lhs object Lhs = Rhs
    return *this;
}

//Plus operator
Int operator +(const Int &Obj1, const Int &Obj2)
{
    //Create temporary object to house added objects
    Int Temp;
    //Add the objects together
    Temp.x = Obj1.x + Obj2.x;
    //Return Temp object
    return Temp;
}

//Conjoined binary operator
Int& operator +=(Int &Obj1, const Int &Obj2)
{
    Obj1 = operator +(Obj1, Obj2);
    return Obj1;
}

//Negation operator
Int operator -(Int &Obj)
{
    //Create a Temp object
    Int Temp;
    //Negate calling object's x and place into Temp's x
    Obj.x = -Obj.x;
    Temp.x = Obj.x;
    //Return Temp object so you can do a statement like:
    //Object = -Object1;
    return Temp;
}

//Equality operator
bool operator ==(const Int &Obj1, const Int &Obj2)
{
    if(Obj1.x == Obj2.x)
        return true;
    else 
        return false;
}

//Input operator
istream& operator >>(istream &input, Int &Obj)
{
    cout << "Please enter a new value for calling Object: ";
    input >> Obj.x;
    //Return input to chain inputs together.
    //Ex) cin >> Object1 >> Object2
    return input;
}

//Output operator
ostream& operator <<(ostream &output, const Int &Obj)
{
    output << "Object's x is: " << Obj.x << endl;
    //Return output to chain outputs together.
    //Ex) cout << "String" << Object << endl;
    return output;
}

//Prefix Increment operator
Int operator ++(Int &Obj)
{
    //Create a Temp object
    Int Temp;
    //Increment x
    ++Obj.x;
    //Set Temp object's x to pre-incremented object's x
    Temp.x = Obj.x;
    //Return Temp so you can do a statement such as:
    //Object = ++Object1;
    return Temp;
}

//Postfix Increment operator
Int operator ++(Int &Obj, int)
{
    //Create a Temp object
    Int Temp;
    //Set temp object's x to post-incremented object's x
    Temp.x = Obj.x;
    //Increment x
    Obj.x++;
    //Return Temp so you can do a statement such as:
    //Object = Object1++;
    return Temp;
}

int main()
{
    //Declare three objects, two with values and one without
    Int A(40), B(20), C;

    //Utilization of the << operator
    cout << endl << "Object A: " << A << "Object B: " << B 
         << "Object C: " << C << endl;

    //Using the plus operator as well as the
    //assignment operator. C's x = 40 + 20.
    C = A + B;
    cout << "C = A + B -- Object C: " << C << endl;

    A += B; //Conjoined binary operator
    cout << "A += B -- Object A: " << A << endl;

    //Negate C's x
    A = -C;
    cout << "Negating object C: " << C << endl;
    cout << "Object A: " << A << endl;

    //Set B's x to 40 using the >> operator
    cin >> B;
    cout << "Object B: " << B << endl;

    //Testing out the == operator with objects A and B
    if(A == B)
        cout << "Object A and B are equal \n\n";
    else {
        cout << "Object A and B are not equal \n\t";
        cout << "Object A: " << A << '\t'
             << "Object B: " << B << endl;
    }

    //Preincrement operator
    ++C;
    cout << "Pre-incrementing object C: " << C << endl;

    //Postincrement operator
    //Set value of object A to C then increment C
    A = C++;
    cout << "A = C++ -- Post-incrementing object C \n"
         << "Object A: " << A << "Object C: " << C;
}

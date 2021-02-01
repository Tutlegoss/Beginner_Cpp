//Overloading.cpp
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
        //Assignment operator (Must be member)
        Int& operator =(const Int &Rhs);

        //Plus operator Friend/Member (Binary operator)
        Int operator +(const Int &Rhs);

        //Conjoined binary operator (must return by reference)
        Int& operator +=(const Int &Rhs);

        //Negation operator Friend/Member (Unary operator)
        Int operator -();

        //Equality operator Friend/Member (Comparison operator)
        bool operator ==(const Int &Rhs);

        //Input operator Friend function only (Return reference)
        //Must be friend function of this class
        friend istream& operator >>(istream &input, Int &Obj);

        //Output operator Friend function only (Return reference)
        //Must be friend function of this class
        friend ostream& operator <<(ostream &input, const Int &Obj);

        //Prefix Increment operator
        Int operator ++();

        //Postfix Increment operator
        //int argument to distinguish between prefix/postfix
        Int operator ++(int);

        //Function operator (Can have formal parameters),
        //such as void operator ()(int x, int y);
        void operator ()();

        //Bracket operator (Must have one formal parameter).
        //Useful for arrays. Shown here only for syntax.
        void operator [](int x);

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
Int Int::operator +(const Int &Rhs)
{
    //Create temporary object to house added objects
    Int Temp;
    //Add the objects together. The x corresponds to the object
    //on the Lhs of the + as in AddedObject = LhsObj + RhsObj;
    Temp.x = x + Rhs.x;
    return Temp;
}

//Conjoined binary operator
Int& Int::operator +=(const Int &Rhs)
{
    *this = operator +(Rhs); //LhsObj += RhsObj
    return *this;
}

//Negation operator
Int Int::operator -()
{
    Int Temp; //Create Temp object
    x = -x; //Negate calling object's x and place into Temp's x
    Temp.x = x;
    //Return Temp object so you can do a statement like: Object = -Object1;
    return Temp;
}

//Equality operator
bool Int::operator ==(const Int &Rhs)
{
    if(x == Rhs.x)
        return true;
    else
        return false;
}

//Input operator
istream& operator >>(istream &input, Int &Obj)
{
    cout << "Please enter a new value for calling Object: ";
    input >> Obj.x;
    //Return input to chain inputs together. Ex) cin >> Object1 >> Object2
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
Int Int::operator ++()
{
    Int Temp;
    ++x; //Increment first then set
    Temp.x = x;
    //Return Temp so you can do a statement such as: Object = ++Object1
    return Temp;
}

//Postfix Increment operator
Int Int::operator ++(int)
{
    Int Temp;
    Temp.x = x; //Set first then increment
    x++;
    //Return Temp so you can do a statement such as: Object = Object1++;
    return Temp;
}

//Function operator
void Int::operator ()()
{
    cout << "Invoked the function operator \n";
}

void Int::operator [](int x)
{
    cout << "Invoked the bracket operator \n";
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

    A += B; //Conjoined Binary Operator
    cout << "A += B -- Object A: " << A << endl;

    -C; //Negate C's x
    cout << "Negating object C: " << C << endl;

    //Set B's x to 40 using the >> operator
    cin >> B;
    cout << "Object B: " << B << endl;

    //Testing out the == operator with objects A and B
    if(A == B)
        cout << "Object A and B are equal \n\n";

    //Preincrement operator
    ++C;
    cout << "Pre-incrementing object C: " << C << endl;

    //Postincrement operator
    //Set value of object A to C then increment C
    A = C++;
    cout << "A = C++ -- Post-incrementing object C \n"
         << "Object A: " << A << "Object C: " << C << endl;

    A(); //Function operator
    cout << endl;
    B[1]; //Bracket operator
}

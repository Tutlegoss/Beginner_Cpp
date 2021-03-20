//FruitParentClass.cpp
//Fruit class implementation (Parent class)

//Need to include header file for class
#include "FruitParentClass.hpp"
#include <iostream>
using std::cout;

//Default constructor
Fruit::Fruit()
{
    name = "Default";
    color = "Default";
    plu = 0;
    price = 0.0;
}

//Constructor with formal parameters
Fruit::Fruit(string n, string c, short pl, double p)
{
    setName(n);
    setColor(c);
    setPlu(pl);
    setPrice(p);
}

//Copy constructor
Fruit::Fruit(const Fruit &Obj)
{
    name = Obj.name;
    color = Obj.color;
    plu = Obj.plu;
    price = Obj.price;
}

//Destructor
Fruit::~Fruit()
{
    cout << "Fruit Class Destructor Invoked \n";
}

//Overloaded assignment operator
Fruit& Fruit::operator =(const Fruit& Rhs)
{
    //No need to check if this != &Rhs as there
    //are no arrays/dynamic data
    name = Rhs.name;
    color = Rhs.color;
    plu = Rhs.plu;
    price = Rhs.price;
    
    //Return reference to calling object
    //(Lhs of equals sign)
    return *this;
}

//Accessors (all constant functions)
string Fruit::getName() const
{
    return name;
}

string Fruit::getColor() const
{
    return color;
}

short Fruit::getPlu() const
{
    return plu;
}

double Fruit::getPrice() const
{
    return price;
}

//Mutators
void Fruit::setName(string newName)
{
    name = newName;
}

void Fruit::setColor(string newColor)
{
    color = newColor;
}

void Fruit::setPlu(short newPlu)
{
    plu = newPlu;
}

void Fruit::setPrice(double newPrice)
{
    price = newPrice;
}

void Fruit::display() const
{
    cout << "Default display message!"
         << " No specific fruit defined with this object \n\n";
}

void Fruit::parentDefinedOnly() const
{
    cout << "This function is virtual but not defined in its \n"
         << "child class. The child object invokes this function. \n\n";
}

void Fruit::publicFunction() const
{
    cout << "This function is a non-virtual public member function \n"
         << "but can be used by its child class. \n\n";
}

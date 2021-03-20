//FruitChildClass.cpp
//Apple class implementation (child class)
#include "FruitChildClass.hpp"

using std::cout; using std::endl;
using std::string;

Apple::Apple() : sweetTart("Default")
{
    //Invokes the Fruit class' default constructor first
    //then initializes Apple's member variable
}

Apple::Apple(string n, string c, short pl, double p, string sT)
{
    //Using protected member functions of parent class
    setName(n);
    setColor(c);
    setPlu(pl);
    setPrice(p);
    sweetTart = sT;
}

Apple::Apple(const Apple &Object) : Fruit(Object), sweetTart(Object.sweetTart)
{
 //The Object passed into the Fruit class must be initialized
 //in the initializer list.
 //If Apple has private variables, initialize those here or in
 //the above initializer list. 
}

Apple::~Apple()
{
    cout << "Apple Class Destructor Invoked \n";
}

Apple& Apple::operator =(const Apple &Rhs)
{
    //No need to check of this != *Rhs as there are no arrays/dynamic data.
    //To invoke the Parent class' overloaded = operator, use the
    //type qualifier and scope resolution operator. This is to properly set
    //the data in the Fruit class.
    Fruit::operator =(Rhs);
    sweetTart = Rhs.sweetTart;
    return *this;
}

void Apple::display() const
{
    //An example of using the protected functions of the Fruit class
    cout << "Here is the data of " << getName() << " fruit: \n";
    cout << "\tColor: " << getColor() << endl;
    cout << "\tType : " << sweetTart << endl;
    cout << "\tPlu  : " << getPlu() << endl;
    cout << "\tPrice: $" << getPrice() << "/lb \n\n";
}

void Apple::memberFunction() const
{
    cout << "This function cannot be seen by the parent class. \n\n";
}

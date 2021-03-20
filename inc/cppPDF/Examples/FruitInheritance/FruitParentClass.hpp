//FruitParentClass.hpp

#ifndef FRUITPARENTCLASS_H //Header guards to prevent multiple
#define FRUITPARENTCLASS_H //definitions of the class

#include <string>
#include <iostream>
using std::string;

class Fruit
{
    //Available from any function
    public:
        //Constructors
        Fruit();
        Fruit(string n, string c, short pl, double p);
        Fruit(const Fruit &Obj);
        //Virtual Destructor
        virtual ~Fruit();
        //Assignment Operator
        Fruit& operator =(const Fruit& Rhs);
        //Virtual Function
        virtual void display() const;
        virtual void parentDefinedOnly() const;
        //Member Function
        void publicFunction() const;

    //Avilable directly from this class and the child classes
    protected:
        //Accessors
        string getName() const;
        string getColor() const;
        short getPlu() const;
        double getPrice() const;
        //Mutators
        void setName(string newName);
        void setColor(string newColor);
        void setPlu(short newPlu);
        void setPrice(double newPrice);

    //Accessible only from functions of this class
    private:
        string name;
        string color;
        short plu;
        double price;
};
#endif

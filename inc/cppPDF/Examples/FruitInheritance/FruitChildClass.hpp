//FruitChildClass.hpp

#ifndef FRUITCHILDCLASS_H
#define FRUITCHILDCLASS_H

#include "FruitParentClass.hpp" //Connect parent class file

using std::string;

class Apple : public Fruit
{
    public:
        //Constructors
        Apple();
        Apple(string n, string c, short pl, double p, string sT);
        Apple(const Apple &Object);
        //Virtual Destructor
        virtual ~Apple() override;
        //Assignment Operator
        Apple& operator =(const Apple &Rhs);
        //Virtual (Overridden) Functions
        virtual void display() const override;
        //Member function
        void memberFunction() const;
    //Accessible only from functions of this class
    private:
        string sweetTart;
};
#endif

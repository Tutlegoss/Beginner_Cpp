//PureFruitInheritance
#include <iostream>
#include <string>

using std::cout; using std::endl; using std::cin;
using std::string; using std::getline;

class Fruit
{
    protected:
        //Constructors invoked via child constructors
        Fruit() : name(""), plu(0), price(0.0) {}
        Fruit(const Fruit &Obj);
        //Destructor
        virtual ~Fruit();
        //Pure Virtual member functions (none defined in parent class)
        virtual void display() const = 0;
        virtual void change() = 0;
        //Member variables
        string name;
        short plu;
        double price;
};

Fruit::Fruit(const Fruit &Obj)
{ 
    name = Obj.name;
    plu = Obj.plu;     
    price = Obj.price;
}

Fruit::~Fruit()
{
    cout << "Fruit destructor invoked \n";
}

class BloodOrange : public Fruit
{
    public:
        BloodOrange() {} //Constructor invoke Fruit constructors
        BloodOrange(string n, short pl, double p);
        BloodOrange(const BloodOrange &Obj) : Fruit(Obj) {}
        virtual ~BloodOrange() override; //Destructor
        virtual void display() const override; //(Pure) Virtual functions
        virtual void change() override;
};

BloodOrange::BloodOrange(string n, short pl, double p)
{
    name = n;
    plu = pl;
    price = p;
}

BloodOrange::~BloodOrange()
{
    cout << "BloodOrange destructor invoked \n";
}

void BloodOrange::display() const
{
    cout << "Name : " << name << endl;
    cout << "PLU  : " << plu << endl;
    cout << "Price: " << price << " EACH" << endl;
    cout << "Description: \n\t";
    cout << "The Blood Orange has a crimson-colored flesh. This comes about \n"
         << "during the development stage during the night with low temps. \n"
         << "It is a natural mutation of the orange and the skin can be \n"
         << "tougher than other oranges. They also have a unique flavor. \n\n";
}

void BloodOrange::change()
{
    int change;
    string changeName;
    short changePlu;
    double changePrice;
    cout << "Changing data for Blood Orange type \n";
    cout << "1 = YES, 0 = NO \n";

    cout << "\nChange name?: ";
    cin >> change;
    cin.ignore(1000, '\n');
    if(change) {
        cout << "New name: ";
        getline(cin, changeName);
        name = changeName;
    }

    cout << "\nChange PLU?: ";
    cin >> change;
    if(change) {
        cout << "New PLU: ";
        cin >> changePlu;
        plu = changePlu;
    }

    cout << "\nChange price?: ";
    cin >> change;
    if(change) {
        cout << "New price: ";
        cin >> changePrice;
        price = changePrice;
    }
}

class Pear : public Fruit
{
    public:
        Pear() {} //Constructors invoke Fruit constructors
        Pear(string n, short pl, double p);
        Pear(const Pear &Obj) : Fruit(Obj) {}
        virtual ~Pear() override; //Destructor
        virtual void display() const override; //(Pure) virtual functions
        virtual void change() override;
};

Pear::Pear(string n, short pl, double p)
{
    name = n;
    plu = pl;
    price = p;
}

Pear::~Pear()
{
    cout << "Pear destructor invoked \n";
}

void Pear::display() const
{
    cout << "Name : " << name << endl;
    cout << "PLU  : " << plu << endl;
    cout << "Price: " << price << " EACH" << endl;
    cout << "Description: \n\t";
    cout << "The pear is native to the old world and is a pome. The shape of \n"
         << "most pears are a teardrop with some having the same shape as an \n"
         << "apple. Best eaten chilled and ripen in room temperature. \n\n";

}

void Pear::change()
{
    int change;
    string changeName;
    short changePlu;
    double changePrice;
    cout << "Changing data for Pear type \n";
    cout << "1 = YES, 0 = NO \n";

    cout << "\nChange name?: ";
    cin >> change;
    cin.ignore(1000, '\n');
    if(change) {
        cout << "New name: ";
        getline(cin, changeName);
        name = changeName;
    }

    cout << "\nChange PLU?: ";
    cin >> change;
    if(change) {
        cout << "New PLU: ";
        cin >> changePlu;
        plu = changePlu;
    }

    cout << "\nChange price?: ";
    cin >> change;
    if(change) {
        cout << "New price: ";
        cin >> changePrice;
        price = changePrice;
    }
}

int main()
{
    //Invokes Fruit default constructor/BloodOrange default constructor
    BloodOrange *Moro = new BloodOrange;
    //Invokes Fruit default constructor/Pear constructor
    Pear AsianPear("Asian Pear", 4408, 2.99);

    //Fruit Object; Fruit *Object = new Fruit;  <-- CANNOT DO/ABSTRACT CLASS

    //Invoking BloodOrange's pure virtual functions
    Moro->change();
    cout << endl;
    Moro->display();

    //Invoking Pear's pure virtual functions
    AsianPear.change();
    cout << endl;
    AsianPear.display();

    //Delete BloodOrange dynamic data (must do this to invoke destructors).
    //Need to do this also because Moro is a pointer, not an object.
    delete Moro;
    //Destructors are called at the end of scope for objects, so AsianPear
    //will also invoke the Pear and Fruit destructors.
}

//Customer.cpp
#include <iostream>
#include <string>
using std::cout; using std::endl;
using std::string; using std::cin;

//struct consisting of 2 strings and 1 int
struct Person
{
    string firstName;
    string lastName;
    int customerID;
}; //Don't forget the semicolon!

//Input function with a parameter of type Person (struct)
//and it is being called by reference for manipulation
void input(Person &Customer)
{
    //Obtaining input from user and storing
    //into the struct variables
    cout << "Enter First Name: ";
    //Dot operator is needed to access struct variables
    cin >> Customer.firstName;

    cout << "Enter Last Name:  ";
    cin >> Customer.lastName;

    cout << "Enter ID:         ";
    cin >> Customer.customerID;

    cout << endl;
}

//Display function with a paramter of type person
//and it is being labeled at const, which means that
//it cannot be manipulated. It is also being called by
//reference as this is a standard way to save on memory
//(const reference)
void display(const Person &Customer)
{
    cout << "NAME: ";
    cout << Customer.firstName << ' ' <<Customer.lastName << endl;
    cout << "ID  : " << Customer.customerID << "\n\n";
}

int main()
{
    //Declaring objects of type Person (our struct)
    Person Customer1, Customer2, Customer3;

    //Input for three customers
    //Each customer will have their own unique struct variables
    input(Customer1);
    input(Customer2);
    input(Customer3);

    //Display each customer's unique information
    display(Customer1);
    display(Customer2);
    display(Customer3);
}

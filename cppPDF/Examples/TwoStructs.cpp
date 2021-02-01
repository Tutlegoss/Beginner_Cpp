//TwoStrings.cpp
#include <iostream>
#include <string>
using std::cout; using std::endl;
using std::string;

//Struct to be used inside another struct.
//Must be declared first or it will be an
//unknown type inside struct Person.
struct Birthday
{
    int day;
    int month;
    int year;
};

//Main struct with 2 strings and 1 Birthday
struct Person
{
    string firstName;
    string lastName;
    Birthday BDay;
};

int main()
{   
    //Declaring object of type Person
    Person Customer;

    //Hardcoding information for example purposes.
    //Notice dot operator for firstName and lastName.
    Customer.firstName = "Cynthia";
    Customer.lastName = "Bordeaux";

    //Notice two dot operators to access Birthday struct.
    //First dot operator accesses bDay in Person.
    //Second dot operator accesses types in Birthday.
    Customer.BDay.day = 21;
    Customer.BDay.month = 12;
    Customer.BDay.year = 1996;

    //Displaying using the same accessing methods as above
    cout << Customer.firstName << ' ' <<Customer.lastName << endl;
    cout << "Birthday: " << Customer.BDay.month << "/" 
         << Customer.BDay.day << "/" << Customer.BDay.year << endl;
}

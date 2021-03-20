//StringMemberFunctions.cpp
//    Full member function explanations are on the
//    String Member Functions page. It is advised
//    to have that page while studying this program
#include <iostream>
#include <string>
using std::cout; using std::cin;
using std::string; using std::endl;

int main()
{
    //String initialization
    string string1 = "This is my string";

    cout << "Original String: " << string1 << "\n\n";
    
    //length()
    cout << "String size (length): " << string1.length() << "\n\n";

    //resize(int)
    string1.resize(10);
    cout << "String resized to length 10: " << string1 << "\n\n";

    //clear()
    string1.clear();
    cout << "String cleared to empty string: " << string1 << "\n\n";
    
    //empty()
    if(string1.empty())
        cout << "String is empty\n\n";
    else
        cout << "String is not empty\n\n";
    
    //Reinitialize
    string1 = "Hello World";
    cout << "Reinitialized string1 to: " << string1 << "\n\n";

    //Element/Index
    cout << "Accessing the third element in string1: " << string1[2] << "\n\n";

    //at()
    cout << "Using .at() member function to display string: ";
    for(int i=0; i<string1.length(); ++i)
        cout << string1.at(i);
    cout << "\n\n";
    
    //front()
    cout << "Accessing first character: " << string1.front() << "\n\n";

    //back()
    cout << "Accessing last character : " << string1.back() << "\n\n";

    //append(string)
    string1.append("! How are you");
    cout << "Appended to string1: " <<  string1 << "\n\n";

    //push_back(char)
    string1.push_back('?');
    cout << "Added a character to the end of string1: " << string1 << "\n\n";

    //insert(index, string)
    string1.insert(12, "!");
    cout << "Inserted a '!' at index 12: " << string1 << "\n\n";

    //erase(starting index, number of elements to delete)
    string1.erase(11,15);
    cout << "Erased from index 11 to end of string (15 positions): "
         << string1 << "\n\n";



    //replace(starting index, number of elements to override, string)
    string string2 = "User";
    string1.replace(6, 5, string2);
    cout << "Replaced string1 from index 6 for 5 positions: "
         << string1 << "\n\n";

    //swap(string)
    string1.swap(string2);
    cout << "Swapped string1 and string2. Showing string1: "
         << string1 << "\n\n";

    //find(string)
    cout << "Checking to see if string2 is in string1: ";
    if(string1.find(string2) == std::string::npos)
        cout << "Not found. Returned npos\n\n";
    else
        cout << "Found starting at index: " << string2.find(string1) << "\n\n";
    
    //find_first_of(string)
    cout << "Finding first occurrence of a vowel in string2: ";
    int vowelIndex = string2.find_first_of("aeiou");
    if(vowelIndex == std::string::npos)
        cout << "No vowel found. Returned npos\n\n";
    else
        cout << "Found at index: " << vowelIndex << "\n\n";
}

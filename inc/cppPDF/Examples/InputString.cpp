///InputString.cpp
#include <iostream>
#include <string>
using std::cout; using std::cin;
using std::endl; using std::string;
using std::getline;

int main()
{
    string string1;

    cout << "Enter in a word to place in string1 \n";
    cout << "Warning! If you enter more than one word it will stay in \n"
         << "the cin buffer and be inputted into the next cin variable!"
         << "\n\t";
    //First input: one word
    cin >> string1;

    //This is to prevent the user from not following the warning above.
    //This ignores the first 1000 characters of the cin buffer or
    //when it comes to a newline.
    //Without this, the program will not behave correctly if the user
    //does input more than one word
    cin.ignore(1000, '\n');

    //Output of first input
    cout << "Here is your entered word: " << string1 << "\n\n";
    
    //Second input: Captures all words up until a newline
    string string2;
    cout << "Enter as much as you want then press enter: \n\t";
    //Input stream, string to hold input
    getline(cin, string2);

    //Output of second input
    cout << "Here is your entered jargon: " << string2 << "\n\n";

    //Third input: Once it reaches 'a', input stops 
    //This does NOT include the a in the string
    string string3;
    cout << "Enter a word or phrase with the letter 'a' \n\t";
    //Input stream, string to hold input, delimiter
    getline(cin, string3, 'a');

    cout << "\nHere is your entered word/phrase until the a: " 
         << string3 << "\n\n";
}

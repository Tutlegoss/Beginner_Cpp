/* Program to display a calendar year given the first day of the year 0 = SUN, 6 = SAT (like an enumeration)
   and the year. I wrote this because someone pissed me off at school (he talked over me while tutoring and 
   became the 'tutor' himself and didn't even answer the tutee's question right) and I wanted to write a more 
   concise program than they did. They used over 90 lines, and I know LOC is a stupid measure, but 
   I got my point across. Sometimes frustration leads to critical thinking. That's all this is about. */

#include <iostream>
#include <string>
using std::cout; using std::cin; using std::string; using std::endl;

int main() {
	string month[] = {"January", "February", "March", "April", "May", "June",
	        	"July", "August", "September", "October", "November", "December"};
	int day, year, daysMonth[] = {31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31};
	cout << "Enter the year followed by the first day of January: ";
	cin >> year >> day;
    if ((year % 400 == 0) || (year % 4 == 0 && year % 100 != 0))
			daysMonth[1] = 29;
	for(int i = 0; i < 12; ++i) {
		cout << '\n' << month[i] << "\nSun\tMon\tTue\tWed\tThu\tFri\tSat\n";
		for(int j = 0; j < (day % 7); ++j)
			cout << '\t';
		for(int k = 1; k <= daysMonth[i]; ++k)
			((++day % 7 == 0) || (k == daysMonth[i])) ? cout << k << "\t\n" : cout << k << '\t';
	}
}

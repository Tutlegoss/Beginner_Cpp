#include <iostream>
using namespace std;


void seven(int &i)
{
	i += 7;
}

void apply(void f(int& x), int data[], size_t n)
{
	for(size_t i=0; i < n; ++i)
		f(data[i]);
}

int main()
{
	int array[10] = {0};
	apply(seven,array,10);
	for(auto e : array)
		cout << e << endl;
}

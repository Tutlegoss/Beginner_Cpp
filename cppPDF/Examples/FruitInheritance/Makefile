# Makefile For FruitInheritance

#****************************************
# Variables to control Makefile operation

CXX = clang++

CXXFLAGS = -std=c++11 -Wall -g

#**************************************************
# Targets needed to bring the executable up to date

Inheritance:	Main.o Parent.o Child.o
	$(CXX) $(CXXFLAGS) Main.o Parent.o Child.o -o Inheritance

Child.o:	FruitChildClass.hpp FruitChildClass.cpp
	$(CXX) $(CXXFLAGS) -c FruitChildClass.cpp -o Child.o

Parent.o:	FruitParentClass.hpp FruitParentClass.cpp
	$(CXX) $(CXXFLAGS) -c FruitParentClass.cpp -o Parent.o

Main.o:	FruitInheritance.cpp	
	$(CXX) $(CXXFLAGS) -c FruitInheritance.cpp -o Main.o

#***********************************************
# Remove the executable and object files

clean:
	rm Inheritance
	rm *.o



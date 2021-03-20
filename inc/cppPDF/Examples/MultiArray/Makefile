#Makefile for Multidimensional Array Program
#Landen Marchand

#Variables
CXX = clang++
CXXFLAGS = -std=c++14 -Wall -g

Program:	MultiArrayMain.o MultiArray.o
	${CXX} ${CXXFLAGS} MultiArrayMain.o MultiArray.o -o Program

MultiArray.o:	MultiArray.hpp MultiArray.cpp
	${CXX} ${CXXFLAGS} -c MultiArray.cpp -o MultiArray.o

MultiArrayMain.o:	MultiArrayMain.cpp
	${CXX} ${CXXFLAGS} -c MultiArrayMain.cpp -o MultiArrayMain.o

clean:
	rm Program
	rm *.o

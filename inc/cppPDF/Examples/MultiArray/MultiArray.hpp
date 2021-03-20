//MultiArray.hpp
#ifndef MULTIARRAY_H //Header guards to only define this file once
#define MULTIARRAY_H //Usually named same as filename underscore H

//Important Note:
//               If you are dealing with pointers/dynamic memory,
//               you must implement a Copy Constructor
//                                    Destructor
//                                    Assignment Operator
//               This is to ensure proper copying of data and this
//               is also known as the Rule of Three
class Multi
{
    //Public: Class interface for user
	public:
        //CONSTRUCTORS
        //Default constructor
		Multi(): row(0), col(0), array2D(nullptr) {}
        //Constructor for matrix dimensions
		Multi(int r, int c);
        //Copy constructor
		Multi(const Multi &Copy);
        //Destructor
		~Multi();

        //ACCESSORS
		int getRow() const {return row;}
		int getCol() const {return col;}
		void getSize() const;

        //MUTATOR
		void setVal(int r, int c, int v);

        //OVERLOADED OPERATORS
		Multi operator +(const Multi Rhs);
        Multi operator *(const Multi Rhs);
		Multi& operator =(const Multi &Rhs);

        //MEMBER FUNCTIONS
        //Overlap function
		Multi overlap(Multi Object);
        //Display contents of Matrix
		void display();

        //FRIEND FUNCTION (Only for show - not used)
		friend Multi add(Multi Obj1, Multi Obj2);

    //Private: Member Variables
	private:
		int row;
		int col;
		int* *array2D;
};

#endif //End header guard

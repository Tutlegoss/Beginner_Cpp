//CircularQueue.cpp
#include<iostream>
using std::cout; using std::endl;

template<typename Type>
class CircularQueue
{
    //Max size of Circular Queue.
    //All instances of this class will have SIZE be 5.
    static const size_t SIZE = 5;

    public:
        //Constructor
        CircularQueue();
        //Function to see if Circular Queue is empty
        bool isEmpty();
        //Function to see if Circular Queue is full
        bool isFull();
        //Function to insert data into Circular Queue
        void push(Type data);
        //Function to remove data from Circular Queue
        void pop();
        //Function to return front data of Circular Queue
        Type front();
        //Function to return back data of Circular Queue
        Type back();
        //Funtions to return private attributes
        size_t getFront() { return frontElem; }
        size_t  getBack()  { return backElem;  }
        size_t  getSize()  { return size;      }

    private:
        Type queue[SIZE]; //Array for Circular Queue
        size_t frontElem; //Index for front of Circular Queue
        size_t backElem; //Index for back of Circular Queue
        size_t size; //Number of elements containing data
        //Helper function to calculate the next index in the
        //Circular Queue
        size_t nextIndex(size_t i) const; 
};

template<typename Type>
size_t CircularQueue<Type>::nextIndex(size_t i) const
{
    //SIZE == 5, so the possible indexes of the Circular Queue
    //are 0 1 2 3 4.
    //When i == 4, the next index is 0 -> (4+1) % 5.
    //This is what makes the Queue Circular.
    return (i+1) % SIZE;
}

template<typename Type>
CircularQueue<Type>::CircularQueue()
{
    frontElem = 0;
    //backElem is initially set to the element before the 
    //front as when you insert data, you move backElem ahead
    //one spot first. This makes the first insertion both the
    //front and back element.
    backElem = SIZE-1;
    size = 0;
}

template<typename Type>
bool CircularQueue<Type>::isEmpty()
{
    return size == 0;
}

template<typename Type>
bool CircularQueue<Type>::isFull()
{
    //backElem will be one spot behind frontElem with
    //an active size count (showing a different way of thinking).
    //This function could just say: return size == 5.
    if (nextIndex(backElem) == frontElem && !isEmpty())
        return true;
    else
        return false;
}

template<typename Type>
void CircularQueue<Type>::push(Type data)
{
    if(isFull()) {
        cout << "Cannot insert " << data << '.'
             << " Circular Queue is full.\n";
    } else {
        //Move backElem ahead one index
        backElem = nextIndex(backElem);
        //Insert data
        queue[backElem] = data;
        //Increment active size of Circular Queue
        ++size;
    }
}

template<typename Type>
void CircularQueue<Type>::pop()
{
    if(!isEmpty()) {
        //Move frontElem to next index as the front
        //of the Circular Queue is being popped.
        //The next element in line will be the new front.
        frontElem = nextIndex(frontElem);
        //Decrement size
        --size;
    }
}

template<typename Type>
Type CircularQueue<Type>::front()
{
    if(!isEmpty())
        return queue[frontElem];
    else
        //Throwing an exception because this function returns
        //Type and nothing can be returned if the Circular
        //Queue is empty. Look at chapter 16 of your CSI book.
        throw "No front element. Queue empty \n\n";
}

template<typename Type>
Type CircularQueue<Type>::back()
{
    if(!isEmpty())
        return queue[backElem];
    else
        //Throwing an exception because this function returns
        //Type and nothing can be returned if the Circular
        //Queue is empty. Look at chapter 16 of your CSI book.
        throw "No back element. Queue empty \n\n";
}

int main()
{
    CircularQueue<char> Queue;
    
    //Example of exception handling.
    //Try to access front of empty Circular Queue.
    try {
        cout << Queue.front() << endl;
    //If you cannot access, display throw message
    } catch (const char* msg) {
        cout << msg;
    }
 
    //Queue will look like this:
    //  Queue[0] = f (front of queue)
    //  Queue[1] = b
    //  Queue[2] = c
    //  Queue[3] = d
    //  Queue[4] = r (back of queue)
    cout << "Pushing to Circular Queue: f b c d r \n\n";
    Queue.push('f');
    Queue.push('b');
    Queue.push('c');
    Queue.push('d');
    Queue.push('r');

    cout << "Popping front element of Circular Queue: f \n\n";
    Queue.pop();
    //Queue now looks like this:
    //  Queue[0] = Doesn't matter as it was popped
    //  Queue[1] = b (new front of queue)
    //  Queue[2] = c
    //  Queue[3] = d
    //  Queue[4] = r (back of queue)

    cout << "Pushing to Circular Queue: y x \n\n";
    Queue.push('y');
    Queue.push('x');
    //Queue now looks like this:
    //  Queue[0] = y (back of queue)
    //  Queue[1] = b (front of queue)
    //  Queue[2] = c
    //  Queue[3] = d
    //  Queue[4] = r
    
    cout << endl;
    cout << "FRONT: " << Queue.front() << endl;
    cout << "BACK : " << Queue.back() << endl;
    cout << "SIZE : " << Queue.getSize() << endl;
    cout << "FIRST INDEX: " << Queue.getFront() << endl;
    cout << "LAST INDEX : " << Queue.getBack() << endl;
}

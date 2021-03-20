//HashTable.cpp
//Adapted from Data Structures and Other Objects Using
//             C++ by Michael Main and Walter Savitch

#include <iostream>
#include <string>
using std::cout; using std::endl;
using std::string;

struct PLU
{
    int pluKey; //Product Look-Up code (Key)
    string name; //Name of fruit/veggie
    double cost; //Price
};

template<typename RecordType>
class HashTable
{
    public:
        //Maximum size of HashTable array: 811
        //811 is used as it is a prime number as well as
        //809. This is aka Twin Primes (Two prime numbers
        //separated by 2).
        static const size_t CAPACITY = 811;

        //Constructor
        HashTable();
        //Modification Member Functions
        void insert(const RecordType &entry);
        void remove(int key);
        //Constant Member Functions
        bool isPresent(int key) const;
        void find(int key, RecordType &result) const;
        size_t size() const {return used;}
        void displayInfo(int key) const;

    private:
        /*Member Constants (Used in key field of special records)

          NEVER_USED code is used for searching to see if an entry
          exists. If the findIndex function comes across this code 
          in the pluKey, that means the entry is not in the array.
          PREVIOUSLY_USED code is used for removal of an entry. 
          If the findIndex function comes across this code in the
          pluKey, that means to keep searching as an entry existed
          there, but it may not have been the entry being searched. */
        static const int NEVER_USED = -1;
        static const int PREVIOUSLY_USED = -2;
        //Member variables
        RecordType data[CAPACITY];
        size_t used;
        //Helper Functions
        size_t hash(int key) const;
        size_t nextIndex(size_t index) const;
        void findIndex(int key, bool &found, size_t &index) const;
        bool neverUsed(size_t index) const;
        bool isVacant(size_t index) const;
};

template<typename RecordType>
HashTable<RecordType>::HashTable()
{
    used = 0;
    //Set all keys in array to -1 (NEVER_USED)
    for(size_t i=0; i<CAPACITY; ++i)
        data[i].pluKey = NEVER_USED;
}
template<typename RecordType>
void HashTable<RecordType>::insert(const RecordType &entry)
{
    //True if entry.pluKey is in HashTable
    bool alreadyPresent;
    //data[index] = location for new entry
    size_t index;

    //Check to see if pluKey is already in hash table.
    //This manipulates alreadyPresent to true if the index 
    //is in the hash table and false if it is not. 
    //This manipulates index to the present location of the entry,
    //to an index that was never used, or to the original index if
    //the hash table is full and cannot have any insertions.
    findIndex(entry.pluKey, alreadyPresent, index);

    //If key was not present, obtain location for new entry
    if(!alreadyPresent) {
        //Without this, the while loop below would be infinite
        if(size () >= CAPACITY) {
            cout << "HashTable is full. No new insertions allowed. \n\n";
            return;
        }
        cout << "Inserting: " << entry.name << "\n\n";
        //Obtain index for entry using hash function. Cannot use index from
        //the findIndex function, because that index may be an index past
        //the closest true insertion index
        index = hash(entry.pluKey);
        //Linear Probing to find next available element spot if
        //index already contains an entry
        while(!isVacant(index))
            index = nextIndex(index);
        //Once inserted, increment used by one
        ++used;
    //HashTable will not store duplicate entries    
    } else {
        cout << entry.name << " is already in HashTable. No new insertion. \n\n";
        //Allows for updating name and/or cost versus deleting and reinserting entry
        if(entry.cost != data[index].cost) {
            cout << "The cost for " << entry.name << " has been updated from:\n";
            cout << "OLD COST: " << data[index].cost << endl;
            cout << "NEW COST: " << entry.cost << "\n\n";
        }
        if(entry.name != data[index].name) {
            cout << "The previous name for PLU " << entry.pluKey
                 << " has been changed from: \n";
            cout << "OLD NAME: " << data[index].name << endl;
            cout << "NEW NAME: " << entry.name << "\n\n";
        }
    }
    //(New) house for incoming entry. If entry was already in HashTable, 
    //the contents will still be copied over into the index as the name or
    //cost may have been updated.
    data[index] = entry;
}

template<typename RecordType>
void HashTable<RecordType>::remove(int key)
{
    //True if key is somewhere in HashTable
    bool found;
    //Place where data[index].key == key
    size_t index;

    //Valid keys are never negative
    if(key >= 0) {
        findIndex(key, found, index);
        //Key was found, so remove record by setting key to
        //PREVIOUSLY_USED and decrementing used by one
        if(found) {
            cout << "PLU KEY: " << key << " has been removed from HashTable\n\n";
            data[index].pluKey = PREVIOUSLY_USED;
            --used;
        } else
            cout << "PLU KEY: " << key << " was not removed from HashTable\n\n";
    }
}

template<typename RecordType>
bool HashTable<RecordType>::isPresent(int key) const
{
    //True if key is present
    bool found = false;
    //Needed for findIndex function (not really used)
    size_t index;
    //key needs to be positive
    if(key >= 0)
        //found will be modified in function
        findIndex(key, found, index);
    return found;
}

template<typename RecordType>
void HashTable<RecordType>::find(int key, RecordType &result) const
{
    //True if key is present
    bool found;
    //Potential index of element with matching key
    size_t index;
    //key needs to be positive
    if(key >= 0) {
        //found and index will be modified in function
        findIndex(key, found, index);
        if(found) {
            //Make copy of found data into result
            result = data[index];
            cout << "Found " << result.name << " at index: " << index << "\n\n";
        } else
            cout << "PLU KEY: " << key << " not found \n\n";
    }
}

template<typename RecordType>
void HashTable<RecordType>::displayInfo(int key) const
{
    //True if key is present
    bool found;
    //Potential index of element with matching key
    size_t index;
    //key needs to be positive
    if(key >= 0) {
        //found and index will be modified in function
        findIndex(key, found, index);
        if(found) {
            cout << "Here is the data for the PLU key " << key << ":\n";
            cout << "\tNAME: " << data[index].name << endl;
            cout << "\tCOST: " << data[index].cost << "\n\n";
        } else
            cout << "No data found for the PLU key " << key << "\n\n";
    }
}

template<typename RecordType>
size_t HashTable<RecordType>::hash(int key) const
{
    //Hash value for pluKey (key)
    return (key % CAPACITY);
}

template<typename RecordType>
size_t HashTable<RecordType>::nextIndex(size_t index) const
{
    //Next index in sequence of original Hash value
    //If original Hash value is 810, next in sequence will be 0
    //since (810+1) % 811 = 0
    return ((index+1) % CAPACITY);
}

template<typename RecordType>
void HashTable<RecordType>::findIndex(int key, bool &found, size_t &index) const
{
    //Number of entries that have been checked
    size_t count = 0;
    //Hash value for pluKey (key)
    index = hash(key);

    //(count < CAPACITY) To traverse potentially all elements of the HashTable
    //(!neverUsed(index)) If a key was already in HashTable, it would be placed
    //                    in the same index as the hash function would always
    //                    display the same result for the incoming key. If that index
    //                    is filled with another key and data, then the next index
    //                    in sequence would try to be utilized, etc. Therefore,
    //                    if the key exists, it would be in the first index searched
    //                    or in one of the subsequent indexes. If the program comes
    //                    across an index that was NEVER_USED, then the key was never
    //                    in the HashTable previously.
    //(data[index].key != key) Search until keys are identical 
    while((count < CAPACITY) && (!neverUsed(index)) && (data[index].pluKey != key)) {
        ++count;
        index = nextIndex(index);
    }
    
    //found is true if keys match
    found = (data[index].pluKey == key);
}

template<typename RecordType>
bool HashTable<RecordType>::neverUsed(size_t index) const
{
    //Used for findIndex function
    return (data[index].pluKey == NEVER_USED);
}

template<typename RecordType>
bool HashTable<RecordType>::isVacant(size_t index) const
{
    //Used for insert function.
    //pluKey will always be less than 0 if NEVER_USED
    //or PREVIOUSLY_USED value is in pluKey (meaning empty).
    return (data[index].pluKey < 0);
}

int main()
{ 
    //Creating HashTable entries for Banana and Red Pepper
    //and a Test entry for collision
    PLU Banana;
    Banana.pluKey = 4011;
    Banana.name = "Banana";
    Banana.cost = 0.50;

    PLU RedPepper;
    RedPepper.pluKey = 4088;
    RedPepper.name = "Red Pepper";
    RedPepper.cost = 1.50;

    PLU Test;
    Test.pluKey = 767;
    Test.name = "Test";
    Test.cost = 10;

    //Creation of HashTable
    HashTable<PLU> PLURecords;

    //Insertion of Banana and Red Pepper
    //Testing insert function
    PLURecords.insert(Banana);
    PLURecords.insert(RedPepper);
    PLURecords.insert(Test);
    //Trying to add duplicate
    PLURecords.insert(Banana);
    //Add duplicate but with different cost
    Banana.cost = 0.75;
    PLURecords.insert(Banana); 

    //Display info for RedPepper
    PLURecords.displayInfo(4088);

    //Find in HashTable via PLU 
    //Testing find function
    PLU Find, Find2, Find3;
    //Finding Banana
    PLURecords.find(4011, Find);
    //Testing to see if found at index 768 as Banana
    //is stored at location 767
    PLURecords.find(767, Find2);
    //Finding Beets (not in HashTable)
    PLURecords.find(4539, Find3);

    //Testing isPresent function false outcome
    bool inHashTable = PLURecords.isPresent(4539);
    cout << "Beets are ";
    if(inHashTable)
        cout << "present in HashTable\n\n";
    else
        cout << "not present in HashTable\n\n";
    //Testing isPresent function true outcome
    inHashTable = PLURecords.isPresent(4088);
    cout << "Red Peppers are ";
    if(inHashTable)
        cout << "present in HashTable\n\n";
    else
        cout << "not present in HashTable\n\n";
    
    //Testing remove function true removal
    PLURecords.remove(767);
    //Testing remove function no removal
    PLURecords.remove(4539);

    //Testing size
    cout << "Current size of HashTable: " << PLURecords.size() << "\n\n";
}

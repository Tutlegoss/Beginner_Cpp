// MADE BY: LANDEN! 

#include <iostream>
#include <string>
#include <vector>
using std::cout; using std::cin;
using std::endl; using std::vector;
using std::string; using std::getline;
using game = vector<vector<char>>; //typedef

//Player information
struct Player
{
    string playerName;
    char playerToken;
};

//Display opening message
void greeting();
//Obtain name and token for player
void playerInfo(Player &player);
//Draw board to screen
void drawBoard(const game &Board);
//Player chooses where to place next token
void chooseSpot(const game &Board, const Player &player, int &choice);
//Insert token to chosen spot
void markSpot(game &Board, const Player &player, const int &choice);
//Check to see if player won
bool checkWin(const game &Board, const Player &player);

int main()
{
    //Akin to 2-D array of type char
    vector<vector<char>> Board;
    //Creation of 2-D vector
    //Each row has 7 spots denoted by O (empty spot)
    //There are 6 rows, so 6x7 board
    for(int i=0; i<6; ++i)
        Board.push_back(vector<char>(7, 'O'));

    greeting();

    Player One, Two;
    playerInfo(One);
    playerInfo(Two);

    //count to tally total number of moves as only max 42 moves possible
    //Odd turns are player One and even turns are player Two
    int count = 1;
    //choice is which column player chooses to drop token into
    int choice;
    bool won = false;
    
    while(count <= 42 && !won ) {
        drawBoard(Board);
        //Player One's turn
        if(count % 2 == 1) {
            chooseSpot(Board, One, choice);
            markSpot(Board, One, choice);
            won = checkWin(Board, One);
            if(won) {
                drawBoard(Board);
                cout << endl << One.playerName << " Connected 4 and won\n";
            }
        //Player Two's turn
        } else {
            chooseSpot(Board, Two, choice);
            markSpot(Board, Two, choice);
            won = checkWin(Board, Two);
            if(won) {
                drawBoard(Board);
                cout << endl << Two.playerName << " Connected 4 and won\n";
            }
        }
        ++count;
     }
     if(count > 42) {
        drawBoard(Board);
        cout << "No winner. Draw\n";
     }

}

void greeting()
{
    cout << "\t   CONNECT 4" << endl;
    cout << "Place 4 of your characters in a row:" << endl;
    cout << "\t Horizontally ----" << endl;
    cout << "\t Vertically   |" << endl;
    cout << "\t Diagnally    \\ or /" << endl << endl;
}

void playerInfo(Player &player)
{
    //static variable to separate player One and Two's info
    //static retains value between function invocations. 
    //static is defined below, but will not be reinitialized
    //with every function invocation
    static int oneTwo = 1;
    if(oneTwo == 1) {
        cout << "Enter Player One's Name: ";
        ++oneTwo;
    } else
        cout << "Enter Player Two's Name: ";
    cin >> player.playerName;
    cout << "Enter Character For Play: ";
    cin >> player.playerToken;
    //This is just in case they enter more than one char for
    //the token. It will ignore the rest of the input
    string throwaway;
    getline(cin, throwaway);
    cout << endl;
}

void drawBoard(const game &Board)
{
    //Display columns
    cout << "   ";
    for(int i=0; i<7; ++i)
        cout << i << "  ";
    cout << endl;
    for(int i=0; i<6; ++i) {
        //Display rows
        cout << i << ' ';
        //Draw spots on board with appropriate token or empty O
        for(int j=0; j<7; ++j)
            cout << '|' << Board[i][j] << '|';
        cout << endl;
    }
}

void chooseSpot(const game &Board, const Player &player, int &choice)
{
    //Only 7 columns to choose from
    do {
        cout << endl << player.playerName << " Choose a column 0 - 6: ";
        cin >> choice;
    } while(choice < 0 || choice > 6);

    //Repeat if column entered is full of tokens
    while(Board[0][choice] != 'O') {
        cout << "Column full. Choose another column: ";
        do {
            cin >> choice;
            if(choice < 0 || choice > 6)
                cout << "Invalid column. Choose again: ";
        } while(choice < 0 || choice > 6);
    }
    cout << endl;
}

void markSpot(game &Board, const Player &player, const int &choice) 
{
    //Replace O with appropriate token
    for(int i=5; i>=0; --i) {
        //Replace first instance of O from bottom up
        if(Board[i][choice] == 'O') {
            Board[i][choice] = player.playerToken;
            break;
        }
    }
}

bool checkWin(const game &Board, const Player &player)
{
// If the below commend grid is weird, you need to use Courier New/Consolas font.
/*    0  1  2  3  4  5  6
   0  O  O  O  O  O  O  O
   1  O  O  O  O  O  O  O
   2  O  O  O  O  O  O  O
   3  O  O  O  O  O  O  O
   4  O  O  O  O  O  O  O
   5  O  O  O  O  O  O  O
*/
 
    char token = player.playerToken;

    //Traverse board and look for 4 of the same token in a row
    for(int i=0; i<6; ++i) {
        for(int j=0; j<7; ++j) {
            //Vertical checking
            if(i < 3) {
                if(Board[i]  [j] == token &&
                   Board[i+1][j] == token &&
                   Board[i+2][j] == token &&
                   Board[i+3][j] == token   )
                    return true;                
            }
            //Horizontal checking
            if(j < 4) {
                if(Board[i][j]   == token &&
                   Board[i][j+1] == token &&
                   Board[i][j+2] == token &&
                   Board[i][j+3] == token   )
                    return true;
            }
            //Backward diagonal checking
            //Starting positions for win:
            // 0,0 0,1 0,2 0,3
            // 1,0 1,1 1,2 1,3
            // 2,0 2,1 2,2 2,3
            if(i < 3 && j < 4) {
                if(Board[i]  [j]   == token &&
                   Board[i+1][j+1] == token &&
                   Board[i+2][j+2] == token &&
                   Board[i+3][j+3] == token   )
                    return true;
            }
            //Forward diagonal checking
            //Starting positions for win:
            // 3,0 3,1 3,2 3,3
            // 4,0 4,1 4,2 4,3
            // 5,0 5,0 5,2 5,3
            if(i > 2 && j < 4) {
                if(Board[i]  [j]   == token &&
                   Board[i-1][j+1] == token &&
                   Board[i-2][j+2] == token &&
                   Board[i-3][j+3] == token   )
                    return true;
            }
        }
    }  
    return false;
}


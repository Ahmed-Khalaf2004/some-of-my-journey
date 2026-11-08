#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;

void solve()
{
    int t;
    cin >> t;

    while (t--){
        char arr[8][8];

        for (int i = 0; i < 8; ++i){
            for (int j = 0; j < 8; ++j){
                cin >> arr[i][j];
            }
        }

        bool forR = false;
        bool forB = false;

        // Test rows
        for (int i = 0; i < 8; ++i){
            bool testR = true;

            for (int j = 0; j < 8; ++j){
                if (arr[i][j] != 'R'){
                    testR = false;
                    break;
                }
            }

            if (testR){
                forR = true;
                break;
            }
        }

        // Test columns
        for (int j = 0; j < 8; ++j){
            bool testB = true;

            for (int i = 0; i < 8; ++i){
                if (arr[i][j] != 'B'){
                    testB = false;
                    break;
                }
            }

            if (testB) {
                forB = true;
                break;
            }
        }

        if (forR){
            cout << "R" << endl;
        }
        else{
            cout << "B" << endl;
        }
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);

    solve();

    return 0;
}

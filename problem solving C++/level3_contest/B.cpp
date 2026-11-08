#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin >> t;

    while (t--) {
        int n;
        cin >> n;

        vector<int> v(n);
        for (int i = 0; i < n; i++) {
            cin >> v[i];
        }
        int indexEleToSwap = 1e6;
        int indexEleToSwapWith = 1e6;

        for (int i = 0; i < n; i++){
            int maxValue = *max_element(v.begin() + i, v.end());
            if (v[i] != maxValue){
                indexEleToSwap = i;

                auto maxPosition = max_element(v.begin() + i, v.end());

                // it => index
                indexEleToSwapWith = maxPosition - v.begin();

                break;
            }
        }
        // swap 
        if (indexEleToSwap != 1e6){
            reverse(v.begin() + indexEleToSwap, v.begin() + indexEleToSwapWith + 1);
        }

        for (int i = 0; i < n; i++)
        {
            cout<<v[i]<<' ';
        }

        cout<<endl;
        
        
        
        

    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
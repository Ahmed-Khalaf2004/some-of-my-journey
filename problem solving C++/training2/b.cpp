#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin>>t;
    while(t--){
        int n;
        cin>>n;
        vector<int> v(n);
        for(int i=0; i<n; i++){
            cin>>v[i];
        }
        bool test = true;
        for(int i =0; i<n; i++){
            for(int j=i+1; j<n; j++){
                if(v[i] == v[j]){
                    test = false;
                break;
                }
            }
                if (!test) {
                    break;
                }
        }
        if (test) {
            cout << "YES" << endl;
        } else {
            cout << "NO"<< endl;
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
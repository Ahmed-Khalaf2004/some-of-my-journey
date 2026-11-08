#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin>>t;
    while (t--)
    {
        int n;
        cin>>n;
        vector<int> a(n),b(n);
        for(int i =0; i<n; i++){
            cin>>a[i];
        }
        for(int i =0; i<n; i++){
            cin>>b[i];
        }

        vector<int> aRev = a;
        reverse(aRev.begin(), aRev.end());

        if( b == a|| b == aRev){
            cout<<"Bob"<<endl;
        }else{
            cout<<"Alice"<<endl;

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

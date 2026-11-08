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
        int a,b,c;
        cin>>a>>b>>c;
        if((a + b) == c){
            cout<<"YES"<<endl;
        }else if ((a + c) == b)
        {
            cout<<"YES"<<endl;
        }else if ((b + c) == a)
        {
            cout<<"YES"<<endl;
        }else{
            cout<<"NO"<<endl;

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
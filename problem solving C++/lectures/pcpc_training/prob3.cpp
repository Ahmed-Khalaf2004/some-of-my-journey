#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    string group1;
    cin>>group1;
    int x;
    cin>>x;

    string group2;
    cin>>group2;
    int y;
    cin>>y;

    if(x> y){
        cout << group2<< "  " << y<<endl;
    }else if (x< y)
    {
        cout << group1<< "  " << x<<endl;
    }else{
        cout<<"Tie"<<endl;
    }
    
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
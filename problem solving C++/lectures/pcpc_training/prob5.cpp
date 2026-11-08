#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int x;
    cin>>x;


    int y;
    cin>>y;

    if(x> y){
        cout << "Max num is:"<< x<<endl;
        cout << "Min num is:"<< y<<endl;
    }else if (x< y)
    {
        cout << "Max num is:"<< y<<endl;
        cout << "Min num is:"<< x<<endl;
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
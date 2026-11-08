#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
 int t;
 cin>>t;
 while(t){
    t--;
    int n,x;
    cin >>n>>x;
    int sum = 0;
    for(int i = 0; i<n; i++){
        x = -x;
        sum+=x;
    }
    cout<<sum<<endl;
 }
    
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
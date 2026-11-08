#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;

void solve()
{
    int n;
    cin >> n;
    vector<vector<int>> brothers(n);
    int l(1), r(n * n);
    int i =0;
    while (1<n)
    {
        brothers[i%n].push_back(l);
        brothers[i%n].push_back(r);
        l++;
        r--;
        i++;
    }

    for (int i = 0; i < n; i++)
    {
        for (int j : brothers[i])
        {
            cout<<j<<" ";
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
#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
using namespace std;

void solve()
{
    // https://codeforces.com/problemset/problem/230/A
    int t;
    cin >> t;
    while (t--)
    {
        // string x;
        // cin>>x;
        // int res;
        // for (int i = 0; i < x.size(); i++)
        // {
        //     int num = x[i] - '0';
        //     res+=num;
        // }
        int x;
        cin >> x;
        cout << 8 * x << '\n';
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
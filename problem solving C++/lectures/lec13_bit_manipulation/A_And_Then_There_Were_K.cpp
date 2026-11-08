#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int t;
    cin >> t;
    while (t--)
    {
        int n;
        cin >> n;
        // 101
        // 011
        // for (int i = 0; i <= __lg(n); i++)
        // {
        //     cout << 1;
        // }
        cout << (1 << (__lg(n))) - 1 << endl;
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
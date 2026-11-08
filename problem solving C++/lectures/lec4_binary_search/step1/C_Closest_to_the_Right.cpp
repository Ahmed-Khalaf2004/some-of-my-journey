#include <iostream>
#include <vector>
#include <algorithm>
#define all(x) x.begin(), x.end()
using namespace std;

void solve()
{
    int n, k;
    cin >> n >> k;
    vector<int> v(n);
    for (int i = 0; i < n; i++)
    {
        cin >> v[i];
    }
    for (int i = 0; i < k; i++)
    {
        int q;
        cin >> q;
        auto it = lower_bound(v.begin(), v.end(), q);
        cout << (it - v.begin() + 1) << endl;
    }
}

int main()
{
    solve();
}
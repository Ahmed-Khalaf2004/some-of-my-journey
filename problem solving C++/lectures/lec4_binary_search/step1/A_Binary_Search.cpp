#include <iostream>
#include <vector>
#include <algorithm>
#define all(x) x.begin(), x.end()
using namespace std;
void solve()
{
    int l, n;
    cin >> l >> n;
    vector<int> v(l);
    for (int i = 0; i < l; i++)
    {
        cin >> v[i];
    }
    for (int i = 0; i < n; i++)
    {
        int k;
        cin >> k;
        auto it = lower_bound(v.begin(), v.end(), k);
        // if (*result == k && result != v.end())
        // {
        //     printf("YES\n");
        // }
        // else
        // {
        //     printf("NO\n");
        // }
        cout << (*it == k ? "YES" : "NO") << endl;
    }
}
int main()
{
    solve();
}
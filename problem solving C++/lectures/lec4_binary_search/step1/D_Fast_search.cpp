#include <iostream>
#include <vector>
#include <algorithm>
#define all(x) x.begin(), x.end()
using namespace std;

void solve()
{
    int l;
    cin >> l;
    vector<int> v(l);
    for (int i = 0; i < l; i++)
    {
        cin >> v[i];
    }
    sort(all(v));
    int n;
    cin >> n;
    for (int i = 0; i < n; i++)
    {
        int l, r;
        cin >> l >> r;
        int sum = upper_bound(v.begin(), v.end(), r) - lower_bound(v.begin(), v.end(), l);
        cout << sum << endl;
    }
}

int main()
{
    solve();
}
#include <bits/stdc++.h>
using namespace std;
#define ll long long

void fast()
{
    ios::sync_with_stdio(false);
    cin.tie(nullptr);
}

void solve()
{
    int n, m;
    cin >> n >> m;

    vector<int> v(n);
    for (int i = 0; i < n; i++)
        cin >> v[i];
    ll sum = 0;
    while (m--)
    {
        int l, r;
        cin >> l >> r;
        sum += min(v[l - 1], v[r - 1]);
    }
    cout << sum;
}

int main()
{
    fast();
    solve();
}
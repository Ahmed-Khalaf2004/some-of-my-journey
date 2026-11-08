#include <iostream>
#include <bits/stdc++.h>
#include <cmath>
using namespace std;

#define ll long long

void fast()
{
    ios_base::sync_with_stdio(0);
    cin.tie(0);
    cout.tie(0);
#ifndef ONLINE_JUDGE
    freopen("input.txt", "r", stdin);
    freopen("output.txt", "w", stdout);
#endif
}

void solve()
{
    int n;
    cin >> n;
    vector<int> v(n);
    int min = 0;
    for (int i = 0; i < n; i++)
    {
        cin >> v[i];
    }
    int cnt = 0;
    for (int i = n; i >= 1; i--)
    {
        cnt++;
        if (v[i] == n)
        {
            break;
        }
    }
    int to = n - cnt;
    for (int i = to; i >= 1; i--)
    {
        if (v[i + 1] != v[i] + 1)
        {
            cnt++;
        }
    }

    cout << cnt << endl;
}

int main()
{
    fast();
    int _;

    cin >> _;
    while (_--)
    {
        solve();
    }

    return 0;
}
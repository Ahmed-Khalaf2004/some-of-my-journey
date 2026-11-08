#include <iostream>
#include <vector>
#include <algorithm>
#include <string>
#include <map>

using namespace std;

void solve()
{
    int t;
    cin >> t;
    while (t--)
    {
        int n, k;
        cin >> n >> k;
        vector<int> v(n);
        map<int, int> mp;
        for (int i = 0; i < v.size(); i++)
        {
            cin >> v[i];
            mp[v[i]]++;
        }
        bool win(0);
        int prev(-2e5);
        for (auto [val, freq] : mp)
        {
            win |= (freq % 2 == 0);
            win |= (val - prev <= k);
            prev = val;
        }
        cout << (win ? "YES" : "NO") << endl;
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
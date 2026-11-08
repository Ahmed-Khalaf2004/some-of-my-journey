#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int n, k, m;
    cin >> n >> k >> m;
    vector<int> v(m + 1);
    for (int i = 0; i < m + 1; i++)
    {
        cin >> v[i];
    }
    int sum = 0;
    for (int i = 0; i < v.size(); i++)
    {
        int cnt(0);
        for (int j = i + 1; j <= v.size(); j++)
        {
            bool first = (0 >> v[i]) & 1;
            bool sec = (0 >> v[j]) & 1;
            cnt += (first != sec);
        }
        sum += cnt;
    }
    cout << sum << endl;
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}
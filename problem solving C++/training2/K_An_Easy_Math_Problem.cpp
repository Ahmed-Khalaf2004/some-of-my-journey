#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    string s;
    cin >> s;
    long long ans = 0;
    for (int i = 0; i < s.size(); i++)
    {
        ans += s[i] - '0';
    }
    if (ans % 9 == 0)
    {
        cout << "YES" << endl;
    }
    else
    {
        cout << "NO" << endl;
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    int t;
    cin >> t;
    while (t--)
    {
        solve();
    }

    return 0;
}